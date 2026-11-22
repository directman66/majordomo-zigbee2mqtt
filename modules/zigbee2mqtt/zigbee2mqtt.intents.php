<?php
/**
 * Zigbee2MQTT: разбор голосовых команд и интеграция с «Простыми устройствами».
 *
 * Подключение:
 *   include_once(DIR_MODULES . 'zigbee2mqtt/zigbee2mqtt.intents.php');
 *   $res = z2m_intent_handle('включи лампу');
 *   $res = z2m_provision_simple_device();
 */

if (!function_exists('z2m_intent_handle')) {

    /**
     * Определить язык фразы по алфавиту.
     *
     * @param string $phrase
     * @return string ru, uk или en
     */
    function z2m_intent_language($phrase)
    {
        if (preg_match('/[іїєґ]/iu', $phrase) || preg_match('/(спряж|увімк|вимк|закрий|покажи)/iu', $phrase)) {
            return 'uk';
        }
        if (preg_match('/[а-яё]/iu', $phrase)) {
            return 'ru';
        }
        return 'en';
    }

    /**
     * Локальное сообщение без зависимости от словарей модуля.
     */
    function z2m_intent_message($key, $lang, $arg = '')
    {
        $messages = array(
            'on' => array('ru' => 'Включено: %s', 'uk' => 'Увімкнено: %s', 'en' => 'Turned on: %s'),
            'off' => array('ru' => 'Выключено: %s', 'uk' => 'Вимкнено: %s', 'en' => 'Turned off: %s'),
            'status' => array('ru' => '%s', 'uk' => '%s', 'en' => '%s'),
            'temp' => array('ru' => 'Температура: %s', 'uk' => 'Температура: %s', 'en' => 'Temperature: %s'),
            'join_on' => array('ru' => 'Сопряжение разрешено', 'uk' => 'Спряження дозволено', 'en' => 'Pairing enabled'),
            'join_off' => array('ru' => 'Сопряжение запрещено', 'uk' => 'Спряження заборонено', 'en' => 'Pairing disabled'),
            'no_device' => array('ru' => 'Устройство не найдено: %s', 'uk' => 'Пристрій не знайдено: %s', 'en' => 'Device not found: %s'),
            'no_value' => array('ru' => 'Нет данных: %s', 'uk' => 'Немає даних: %s', 'en' => 'No data: %s'),
            'unknown' => array('ru' => 'Неизвестная команда', 'uk' => 'Невідома команда', 'en' => 'Unknown command'),
            'done' => array('ru' => 'Команда выполнена', 'uk' => 'Команду виконано', 'en' => 'Command completed'),
        );
        $template = isset($messages[$key][$lang]) ? $messages[$key][$lang] : $messages[$key]['en'];
        return $arg === '' ? $template : @sprintf($template, $arg);
    }

    /**
     * Привести фразу к нижнему регистру и убрать лишние символы.
     */
    function z2m_intent_normalize($phrase)
    {
        $text = (string)$phrase;
        if (function_exists('mb_strtolower')) {
            $text = mb_strtolower($text, 'UTF-8');
        } else {
            $text = strtolower($text);
        }
        $text = str_replace(array('“', '”', '«', '»', '"', "'", ',', '!'), ' ', $text);
        $text = preg_replace('/\s+/u', ' ', $text);
        return trim($text);
    }

    /**
     * Поиск устройства в таблице zigbee2mqtt_devices по имени, DRIVER_NAME
     * или IEEE-адресу. Допускается сокращение окончания («лампу» -> «лампа»).
     */
    function z2m_intent_find_device($query)
    {
        $needle = z2m_intent_normalize($query);
        if ($needle === '') {
            return false;
        }
        if (!function_exists('SQLSelect')) {
            return false;
        }
        $rows = SQLSelect('SELECT ID, TITLE, DEVICE_NAME, IEEEADDR, TYPE, ONLINE FROM zigbee2mqtt_devices');
        if (!is_array($rows)) {
            return false;
        }

        $variants = array($needle);
        if (strlen($needle) >= 4) {
            $variants[] = substr($needle, 0, -1);
            $variants[] = substr($needle, 0, -2);
            $variants[] = substr($needle, 0, -3);
        }

        $exact = array();
        foreach ($rows as $row) {
            foreach (array($row['TITLE'], $row['DEVICE_NAME'], $row['IEEEADDR']) as $name) {
                $normalized = z2m_intent_normalize($name);
                if ($normalized !== '' && in_array($normalized, $variants, true)) {
                    $exact[] = $row;
                    break 2;
                }
            }
        }
        if ($exact) {
            return $exact[0];
        }

        foreach ($rows as $row) {
            $normalized = z2m_intent_normalize($row['TITLE']);
            if ($normalized === '') {
                continue;
            }
            foreach ($variants as $variant) {
                if (strlen($variant) >= 4 && strpos($normalized, $variant) !== false) {
                    return $row;
                }
            }
        }
        return false;
    }

    /**
     * Отправить команду устройству через MQTT-клиент модуля.
     */
    function z2m_intent_send($device, $payload)
    {
        if (!defined('DIR_MODULES') || !function_exists('SQLSelectOne')) {
            return false;
        }
        include_once(DIR_MODULES . 'zigbee2mqtt/zigbee2mqtt.class.php');
        $z2m = new zigbee2mqtt();
        $z2m->getConfig();
        $base = 'zigbee2mqtt';
        if (!empty($z2m->config['MQTT_QUERY'])) {
            $base = explode('/', $z2m->config['MQTT_QUERY'])[0];
        }
        $topic = $base . '/' . $device['TITLE'] . '/set';
        $z2m->sendcommand($topic, $payload);
        return true;
    }

    /**
     * Включить или выключить сопряжение (permit_join).
     */
    function z2m_intent_permit_join($enable)
    {
        if (!defined('DIR_MODULES')) {
            return false;
        }
        include_once(DIR_MODULES . 'zigbee2mqtt/zigbee2mqtt.class.php');
        $z2m = new zigbee2mqtt();
        $z2m->getConfig();
        $base = 'zigbee2mqtt';
        if (!empty($z2m->config['MQTT_QUERY'])) {
            $base = explode('/', $z2m->config['MQTT_QUERY'])[0];
        }
        $z2m->sendcommand($base . '/bridge/config/permit_join', $enable ? 'true' : 'false');
        return true;
    }

    /**
     * Прочитать числовое или строковое значение метрики устройства.
     */
    function z2m_intent_metric($device, $metric)
    {
        if (!function_exists('SQLSelectOne')) {
            return '';
        }
        $title = addslashes((string)$device['TITLE']);
        $object = SQLSelectOne("SELECT ID FROM objects WHERE TITLE LIKE '%" . $title . "%' ORDER BY ID LIMIT 1");
        if (empty($object['ID'])) {
            return '';
        }
        $value = SQLSelectOne(
            "SELECT pv.VALUE FROM pvalues pv JOIN properties p ON pv.PROPERTY_ID=p.ID "
            . "WHERE pv.OBJECT_ID=" . (int)$object['ID'] . " AND p.TITLE='" . addslashes($metric) . "' LIMIT 1"
        );
        return isset($value['VALUE']) ? $value['VALUE'] : '';
    }

    /**
     * Разобрать фразу и выполнить действие.
     *
     * @return array('ok', 'message', 'action', 'device', 'lang')
     */
    function z2m_intent_handle($phrase)
    {
        $lang = z2m_intent_language($phrase);
        $text = z2m_intent_normalize($phrase);
        $result = array('ok' => false, 'message' => z2m_intent_message('unknown', $lang), 'action' => '', 'device' => '', 'lang' => $lang);

        // Управление сопряжением: отдельная ветка, имя устройства не нужно.
        if (preg_match('/(разреши|разрешить|открой|открыть|дозволь|дозволити|enable|allow|open).*(сопряж|спряж|pairing|join|мереж|network)/u', $text)) {
            $result['ok'] = z2m_intent_permit_join(true);
            $result['action'] = 'join_on';
            $result['message'] = z2m_intent_message('join_on', $lang);
            return $result;
        }
        if (preg_match('/(запрети|запретить|закрой|закрити|disable|deny|close).*(сопряж|спряж|pairing|join)/u', $text)) {
            $result['ok'] = z2m_intent_permit_join(false);
            $result['action'] = 'join_off';
            $result['message'] = z2m_intent_message('join_off', $lang);
            return $result;
        }

        // Температура.
        if (preg_match('/(температур|temperature)/u', $text)) {
            $name = preg_replace('/^.*?(температур[а-яёіїє]*|temperature)\s*(в|у|of|for|внутри)?\s*/iu', '', $text);
            $device = z2m_intent_find_device($name);
            if (!$device) {
                $result['message'] = z2m_intent_message('no_device', $lang, trim($name));
                return $result;
            }
            $value = z2m_intent_metric($device, 'temperature');
            $result['device'] = $device['TITLE'];
            $result['action'] = 'temperature';
            $result['ok'] = ($value !== '');
            $result['message'] = $result['ok']
                ? z2m_intent_message('temp', $lang, $device['TITLE'] . ' ' . $value)
                : z2m_intent_message('no_value', $lang, $device['TITLE']);
            return $result;
        }

        // Включение / выключение устройства.
        $action = '';
        if (preg_match('/^(включи|включить|увімкни|увімкнути|turn on|switch on)\s+(.+)$/iu', $text, $m)) {
            $action = 'on';
            $name = $m[2];
        } elseif (preg_match('/^(выключи|выключить|вимкни|вимкнути|turn off|switch off)\s+(.+)$/iu', $text, $m)) {
            $action = 'off';
            $name = $m[2];
        }

        if ($action !== '') {
            $name = trim($name);
            $device = z2m_intent_find_device($name);
            if (!$device) {
                $result['message'] = z2m_intent_message('no_device', $lang, $name);
                $result['action'] = $action;
                return $result;
            }
            $state = $action === 'on' ? 'ON' : 'OFF';
            z2m_intent_send($device, '{"state":"' . $state . '"}');
            $result['ok'] = true;
            $result['action'] = $action;
            $result['device'] = $device['TITLE'];
            $result['message'] = z2m_intent_message($action, $lang, $device['TITLE']);
            return $result;
        }

        // Запрос состояния.
        if (preg_match('/(статус|состояние|стан|status of|state of|status)\s*(.*)$/iu', $text, $m)) {
            $device = z2m_intent_find_device(trim($m[2]));
            if (!$device) {
                $result['message'] = z2m_intent_message('no_device', $lang, trim($m[2]));
                return $result;
            }
            $online = !empty($device['ONLINE']) ? $device['ONLINE'] : 'unknown';
            $result['ok'] = true;
            $result['action'] = 'status';
            $result['device'] = $device['TITLE'];
            $result['message'] = z2m_intent_message('status', $lang, $device['TITLE'] . ' — ' . $online);
            return $result;
        }

        return $result;
    }

    /**
     * Создать или обновить «Простое устройство» шлюза Zigbee2MQTT.
     */
    function z2m_provision_simple_device()
    {
        $out = array('ok' => false, 'object' => 'Z2MGateway', 'device_id' => 0, 'message' => '');
        if (!function_exists('SQLInsert') || !function_exists('addClass') || !function_exists('addClassObject')) {
            $out['message'] = 'MajorDoMo core functions are not available';
            return $out;
        }

        $object = 'Z2MGateway';
        addClass('SZ2MGateway');
        foreach (array('STATUS', 'status', 'LAST_INTENT', 'LAST_ERROR', 'DEVICE') as $property) {
            addClassProperty('SZ2MGateway', $property);
        }

        $boot = "if (!function_exists('z2m_intent_handle') && defined('DIR_MODULES')) "
            . "include_once(DIR_MODULES . 'zigbee2mqtt/zigbee2mqtt.intents.php');\n";

        addClassMethod('SZ2MGateway', 'intent',
            $boot
            . "\$phrase = isset(\$params['phrase']) ? (string)\$params['phrase'] : '';\n"
            . "if (\$phrase === '' && isset(\$params['message'])) \$phrase = (string)\$params['message'];\n"
            . "\$res = z2m_intent_handle(\$phrase);\n"
            . "\$this->setProperty('LAST_INTENT', \$phrase);\n"
            . "\$this->setProperty('LAST_ERROR', \$res['message']);\n"
            . "\$this->setProperty('STATUS', \$res['ok'] ? 1 : 0);\n"
            . "\$this->setProperty('status', \$res['ok'] ? 1 : 0);\n"
            . "\$this->setProperty('DEVICE', \$res['device']);\n"
            . "return \$res['ok'] ? 1 : 0;",
            'zigbee2mqtt');

        addClassMethod('SZ2MGateway', 'turnOn',
            $boot
            . "z2m_intent_permit_join(true);\n"
            . "\$this->setProperty('STATUS', 1);\n"
            . "\$this->setProperty('status', 1);\n"
            . "return 1;",
            'zigbee2mqtt');

        addClassMethod('SZ2MGateway', 'turnOff',
            $boot
            . "z2m_intent_permit_join(false);\n"
            . "\$this->setProperty('STATUS', 0);\n"
            . "\$this->setProperty('status', 0);\n"
            . "return 1;",
            'zigbee2mqtt');

        $objectId = addClassObject('SZ2MGateway', $object);
        if (!$objectId) {
            $out['message'] = 'Cannot create object ' . $object;
            return $out;
        }

        $existing = SQLSelectOne("SELECT ID FROM devices WHERE LINKED_OBJECT='" . addslashes($object) . "' ORDER BY ID LIMIT 1");
        $rec = array(
            'TYPE' => 'relay',
            'TITLE' => 'Шлюз Zigbee',
            'LINKED_OBJECT' => $object,
            'ALT_TITLES' => 'zigbee, zigbee2mqtt, шлюз зигби, зигби шлюз, zigbee gateway',
        );
        if (is_array($existing) && !empty($existing['ID'])) {
            $rec['ID'] = $existing['ID'];
            SQLUpdate('devices', $rec);
            $deviceId = $existing['ID'];
        } else {
            $deviceId = SQLInsert('devices', $rec);
        }

        $out['ok'] = $deviceId ? true : false;
        $out['device_id'] = $deviceId;
        $out['message'] = $out['ok'] ? 'OK' : 'Cannot create simple device';
        return $out;
    }
}
