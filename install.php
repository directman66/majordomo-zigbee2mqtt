<?php
/**
 * Установка пакета Zigbee2MQTT через Маркет дополнений MajorDoMo.
 *
 * MARKET подключает этот файл из распакованной временной папки ДО копирования
 * файлов в корень MajorDoMo, поэтому пути указаны относительно __DIR__.
 * Конструктор модуля сам вызывает checkInstalled() и регистрирует модуль
 * в системе. После этого MARKET копирует остальные файлы и удаляет install.php.
 */
if (class_exists('module') && is_file(__DIR__ . '/modules/zigbee2mqtt/zigbee2mqtt.class.php')) {
    include_once(__DIR__ . '/modules/zigbee2mqtt/zigbee2mqtt.class.php');
    $zigbee2mqttInstaller = new zigbee2mqtt();
}
