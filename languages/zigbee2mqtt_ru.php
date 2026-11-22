<?php
/**
 * Zigbee2MQTT: русский язык.
 *
 * Файл копируется в ROOT/languages/zigbee2mqtt_ru.php и подключается
 * ядром MajorDoMo для текущего языка интерфейса.
 */

$Z2M_STRINGS = array(

    // Названия языка.
    'Z2M_LANG_NAME'              => 'Русский',

    // Заголовки и подписи страницы настроек.
    'Z2M_SETTINGS_MQTT'          => 'Настройки MQTT',
    'Z2M_LABEL_SUBSCRIPTION'     => 'Путь подписки',
    'Z2M_HINT_GATEWAYS'          => 'Разделитель — запятая, несколько шлюзов: ZigBeeCA20/#,zigbee2mqtt/#',
    'Z2M_LABEL_AUTH'             => 'Авторизация',
    'Z2M_LOGIN'                  => 'Логин',
    'Z2M_PASSWORD'               => 'Пароль',
    'Z2M_SETTINGS_Z2M'           => 'Настройки Zigbee2MQTT',
    'Z2M_LABEL_FOLDER'           => 'Путь к папке',
    'Z2M_HINT_FOLDER'            => 'Например: /opt/zigbee2mqtt',
    'Z2M_LABEL_LOGLEVEL'         => 'Уровень журналирования',
    'Z2M_SETTINGS_SLS'           => 'Настройки шлюза SLS Zigbee',
    'Z2M_LABEL_SLS_IP'           => 'IP-адрес шлюза SLS',
    'Z2M_HINT_SLS'               => 'Разделитель — запятая, несколько шлюзов: 192.168.1.35,192.168.1.36',
    'Z2M_SETTINGS_SYSTEM'        => 'Настройки MajorDoMo',
    'Z2M_LABEL_HISTORY'          => 'Срок хранения журнала (дней)',
    'Z2M_HINT_HISTORY'           => '0 отключает журнал и полностью очищает таблицу',
    'Z2M_LABEL_VIEW'             => 'Режим отображения',
    'Z2M_VIEW_TILES'             => 'плитки',
    'Z2M_VIEW_TABLE'             => 'таблица (старая)',
    'Z2M_LABEL_NTILES'           => 'Количество плиток',
    'Z2M_LABEL_DEBUG'            => 'Включить сообщения debmes',

    // Голосовые фразы. %s заменяется на имя устройства или значение.
    'Z2M_VOICE_ON'               => 'Включено: %s',
    'Z2M_VOICE_OFF'              => 'Выключено: %s',
    'Z2M_VOICE_STATE'            => '%s: %s',
    'Z2M_VOICE_ADDED'            => 'Добавлено устройство: %s',
    'Z2M_VOICE_LOST'             => 'Устройство потеряно: %s',
    'Z2M_VOICE_BRIDGE_ONLINE'    => 'Шлюз Zigbee подключён',
    'Z2M_VOICE_BRIDGE_OFFLINE'   => 'Шлюз Zigbee отключён',
    'Z2M_VOICE_UNKNOWN_COMMAND'  => 'Неизвестная команда',
    'Z2M_VOICE_COMMAND_DONE'     => 'Команда выполнена',
    'Z2M_VOICE_LOG_CLEARED'      => 'Журнал Zigbee очищен',
);

foreach ($Z2M_STRINGS as $key => $value) {
    if (!defined('LANG_' . $key)) {
        @define('LANG_' . $key, $value);
    }
}
