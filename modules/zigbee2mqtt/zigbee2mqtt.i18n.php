<?php
/**
 * Zigbee2MQTT: языковые строки, код языка голоса и голосовые фразы.
 *
 * Подключается из модуля, сценариев и правил:
 *   include_once(DIR_MODULES . 'zigbee2mqtt/zigbee2mqtt.i18n.php');
 *   echo z2m_tr('Z2M_VOICE_ON', array('Лампа'));
 *   z2m_say_device('ON', 'Лампа');
 */

if (!function_exists('z2m_language')) {

    /**
     * Каталог со словарями. Поддерживаются три варианта установки:
     * архив Маркета (ROOT/languages), ручная установка и локальная копия
     * внутри папки модуля.
     *
     * @return string путь с завершающим разделителем
     */
    function z2m_lang_dir()
    {
        $candidates = array();
        if (defined('ROOT')) {
            $candidates[] = rtrim(ROOT, '/\\') . '/languages/';
        }
        $candidates[] = dirname(__FILE__) . '/../../languages/';
        $candidates[] = dirname(__FILE__) . '/languages/';
        foreach ($candidates as $dir) {
            if (is_file($dir . 'zigbee2mqtt_default.php')) {
                return rtrim($dir, '/\\') . '/';
            }
        }
        return $candidates[0];
    }

    /**
     * Язык интерфейса: ru, uk или en. Ядро MajorDoMo использует код ua.
     *
     * @return string
     */
    function z2m_language()
    {
        $lang = defined('SETTINGS_SITE_LANGUAGE') ? strtolower(trim(SETTINGS_SITE_LANGUAGE)) : 'en';
        if ($lang === 'ua' || $lang === 'uk') {
            return 'uk';
        }
        if ($lang === 'ru' || $lang === 'by' || $lang === 'be') {
            return 'ru';
        }
        return 'en';
    }

    /**
     * Код языка для синтеза речи (BCP-47).
     *
     * @return string en-US, ru-RU или uk-UA
     */
    function z2m_lang_code()
    {
        $lang = z2m_language();
        if ($lang === 'ru') {
            return 'ru-RU';
        }
        if ($lang === 'uk') {
            return 'uk-UA';
        }
        return 'en-US';
    }

    /**
     * Массив строк текущего языка.
     *
     * @param string $lang явный код языка или пустая строка
     * @return array
     */
    function z2m_strings($lang = '')
    {
        static $cache = array();
        if ($lang === '') {
            $lang = z2m_language();
        }
        if (!isset($cache[$lang])) {
            $dir = z2m_lang_dir();
            $file = $dir . 'zigbee2mqtt_' . $lang . '.php';
            if (!is_file($file)) {
                $file = $dir . 'zigbee2mqtt_default.php';
            }
            $Z2M_STRINGS = array();
            include $file;
            $cache[$lang] = is_array($Z2M_STRINGS) ? $Z2M_STRINGS : array();
        }
        return $cache[$lang];
    }

    /**
     * Перевод с подстановкой параметров через sprintf.
     *
     * @param string $key ключ словаря
     * @param array|mixed $args аргументы подстановки
     * @return string пустая строка, если ключ не найден
     */
    function z2m_tr($key, $args = array())
    {
        $strings = z2m_strings();
        if (!isset($strings[$key])) {
            return '';
        }
        $text = $strings[$key];
        if ($args !== array() && $args !== '') {
            if (!is_array($args)) {
                $args = array($args);
            }
            $text = @vsprintf($text, $args);
        }
        return $text;
    }

    /**
     * Произнести фразу через стандартные функции MajorDoMo say()/sayTo().
     *
     * @param string $key ключ словаря
     * @param array|mixed $args аргументы подстановки
     * @param string $terminal имя терминала (необязательно)
     * @return string произнесённый текст
     */
    function z2m_say($key, $args = array(), $terminal = '')
    {
        $text = z2m_tr($key, $args);
        if ($text === '') {
            return '';
        }
        if (function_exists('say')) {
            if ($terminal !== '' && function_exists('sayTo')) {
                sayTo($text, $terminal);
            } else {
                say($text);
            }
        }
        return $text;
    }

    /**
     * Озвучить состояние устройства с учётом формата ON/OFF zigbee2mqtt.
     *
     * @param mixed $value значение метрики
     * @param string $title имя устройства
     * @param string $terminal имя терминала (необязательно)
     * @return string произнесённый текст
     */
    function z2m_say_device($value, $title, $terminal = '')
    {
        $normalized = strtoupper(trim((string)$value));
        if ($normalized === 'ON' || $normalized === '1' || $normalized === 'TRUE') {
            return z2m_say('Z2M_VOICE_ON', array($title), $terminal);
        }
        if ($normalized === 'OFF' || $normalized === '0' || $normalized === 'FALSE') {
            return z2m_say('Z2M_VOICE_OFF', array($title), $terminal);
        }
        return z2m_say('Z2M_VOICE_STATE', array($title, $value), $terminal);
    }
}
