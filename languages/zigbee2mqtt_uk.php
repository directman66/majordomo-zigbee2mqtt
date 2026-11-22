<?php
/**
 * Zigbee2MQTT: українська мова.
 *
 * Файл копіюється у ROOT/languages/zigbee2mqtt_uk.php. Оскільки ядро
 * MajorDoMo використовує код ua, додатково передбачено файл-посилання
 * zigbee2mqtt_ua.php.
 */

$Z2M_STRINGS = array(

    // Назва мови.
    'Z2M_LANG_NAME'              => 'Українська',

    // Заголовки та підписи сторінки налаштувань.
    'Z2M_SETTINGS_MQTT'          => 'Налаштування MQTT',
    'Z2M_LABEL_SUBSCRIPTION'     => 'Шлях підписки',
    'Z2M_HINT_GATEWAYS'          => 'Розділювач — кома, кілька шлюзів: ZigBeeCA20/#,zigbee2mqtt/#',
    'Z2M_LABEL_AUTH'             => 'Авторизація',
    'Z2M_LOGIN'                  => 'Логін',
    'Z2M_PASSWORD'               => 'Пароль',
    'Z2M_SETTINGS_Z2M'           => 'Налаштування Zigbee2MQTT',
    'Z2M_LABEL_FOLDER'           => 'Шлях до папки',
    'Z2M_HINT_FOLDER'            => 'Наприклад: /opt/zigbee2mqtt',
    'Z2M_LABEL_LOGLEVEL'         => 'Рівень журналювання',
    'Z2M_SETTINGS_SLS'           => 'Налаштування шлюзу SLS Zigbee',
    'Z2M_LABEL_SLS_IP'           => 'IP-адреса шлюзу SLS',
    'Z2M_HINT_SLS'               => 'Розділювач — кома, кілька шлюзів: 192.168.1.35,192.168.1.36',
    'Z2M_SETTINGS_SYSTEM'        => 'Налаштування MajorDoMo',
    'Z2M_LABEL_HISTORY'          => 'Термін зберігання журналу (днів)',
    'Z2M_HINT_HISTORY'           => '0 вимикає журнал і повністю очищує таблицю',
    'Z2M_LABEL_VIEW'             => 'Режим відображення',
    'Z2M_VIEW_TILES'             => 'плитки',
    'Z2M_VIEW_TABLE'             => 'таблиця (стара)',
    'Z2M_LABEL_NTILES'           => 'Кількість плиток',
    'Z2M_LABEL_DEBUG'            => 'Увімкнути повідомлення debmes',

    // Голосові фрази. %s замінюється на назву пристрою або значення.
    'Z2M_VOICE_ON'               => 'Увімкнено: %s',
    'Z2M_VOICE_OFF'              => 'Вимкнено: %s',
    'Z2M_VOICE_STATE'            => '%s: %s',
    'Z2M_VOICE_ADDED'            => 'Додано пристрій: %s',
    'Z2M_VOICE_LOST'             => 'Пристрій втрачено: %s',
    'Z2M_VOICE_BRIDGE_ONLINE'    => 'Шлюз Zigbee підключено',
    'Z2M_VOICE_BRIDGE_OFFLINE'   => 'Шлюз Zigbee відключено',
    'Z2M_VOICE_UNKNOWN_COMMAND'  => 'Невідома команда',
    'Z2M_VOICE_COMMAND_DONE'     => 'Команду виконано',
    'Z2M_VOICE_LOG_CLEARED'      => 'Журнал Zigbee очищено',
);

foreach ($Z2M_STRINGS as $key => $value) {
    if (!defined('LANG_' . $key)) {
        @define('LANG_' . $key, $value);
    }
}
