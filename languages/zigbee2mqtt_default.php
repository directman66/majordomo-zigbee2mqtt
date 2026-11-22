<?php
/**
 * Zigbee2MQTT: словарь строк по умолчанию (английский язык).
 *
 * Файл копируется в ROOT/languages/zigbee2mqtt_default.php.
 * Ключи имеют префикс Z2M_, чтобы не пересекаться со словарями ядра
 * и других модулей. Одновременно объявляются константы LANG_Z2M_*,
 * которые подставляются в шаблоны через <#LANG_Z2M_...#>.
 */

$Z2M_STRINGS = array(

    // Названия языка.
    'Z2M_LANG_NAME'              => 'English',

    // Заголовки и подписи страницы настроек.
    'Z2M_SETTINGS_MQTT'          => 'MQTT settings',
    'Z2M_LABEL_SUBSCRIPTION'     => 'Subscription path',
    'Z2M_HINT_GATEWAYS'          => 'Use a comma to add several gateways, for example: ZigBeeCA20/#,zigbee2mqtt/#',
    'Z2M_LABEL_AUTH'             => 'Authorization',
    'Z2M_LOGIN'                  => 'Login',
    'Z2M_PASSWORD'               => 'Password',
    'Z2M_SETTINGS_Z2M'           => 'Zigbee2MQTT settings',
    'Z2M_LABEL_FOLDER'           => 'Folder path',
    'Z2M_HINT_FOLDER'            => 'For example: /opt/zigbee2mqtt',
    'Z2M_LABEL_LOGLEVEL'         => 'Log level',
    'Z2M_SETTINGS_SLS'           => 'SLS Zigbee gateway settings',
    'Z2M_LABEL_SLS_IP'           => 'SLS gateway IP address',
    'Z2M_HINT_SLS'               => 'Use a comma to add several gateways, for example: 192.168.1.35,192.168.1.36',
    'Z2M_SETTINGS_SYSTEM'        => 'MajorDoMo settings',
    'Z2M_LABEL_HISTORY'          => 'History retention period (days)',
    'Z2M_HINT_HISTORY'           => '0 disables the log and clears the table completely',
    'Z2M_LABEL_VIEW'             => 'View mode',
    'Z2M_VIEW_TILES'             => 'tiles',
    'Z2M_VIEW_TABLE'             => 'table (old)',
    'Z2M_LABEL_NTILES'           => 'Number of tiles',
    'Z2M_LABEL_DEBUG'            => 'Enable debmes messages',

    // Голосовые фразы. %s заменяется на имя устройства или значение.
    'Z2M_VOICE_ON'               => 'Turned on: %s',
    'Z2M_VOICE_OFF'              => 'Turned off: %s',
    'Z2M_VOICE_STATE'            => '%s: %s',
    'Z2M_VOICE_ADDED'            => 'Device added: %s',
    'Z2M_VOICE_LOST'             => 'Device lost: %s',
    'Z2M_VOICE_BRIDGE_ONLINE'    => 'Zigbee gateway connected',
    'Z2M_VOICE_BRIDGE_OFFLINE'   => 'Zigbee gateway disconnected',
    'Z2M_VOICE_UNKNOWN_COMMAND'  => 'Unknown command',
    'Z2M_VOICE_COMMAND_DONE'     => 'Command completed',
    'Z2M_VOICE_LOG_CLEARED'      => 'Zigbee log cleared',
);

foreach ($Z2M_STRINGS as $key => $value) {
    if (!defined('LANG_' . $key)) {
        @define('LANG_' . $key, $value);
    }
}
