# Более подробная инструкция находится [тут](https://slsys.github.io/Gateway/int_majordomo_rus.html)











___________________________________________________

# Модуль для интеграции устройств zigbee в систему [MAJORDOMO](https://mjdm.ru/) c использованием [zigbee2mqtt](https://www.zigbee2mqtt.io)

Давно известно, что с zigbee устройствами можно работать не только через шлюз MiHome. Имеется множество других решений, через которые можно получать данные и управлять устройствами (deconz, athom hommey, samsung smartthings, philips hue, Smart home Hommyn Zigbee Хаб (HU-20-Z) etc). По моему мнению,  самым интересным и бюджетным вариантом является проект zigbee2mqtt https://www.zigbee2mqtt.io  

# Для работы c проектом  нужен прошитый стик и компьютер на линукс (подойдет любой одноплатник типа малины)


стик https://ru.aliexpress.com/store/product/Wireless-Zigbee-CC2531-Sniffer-Bare-Board-Packet-Protocol-Analyzer-Module-USB-Interface-Dongle-Capture-Packet-Module/2182011_32852226435.html

дебаггер https://ru.aliexpress.com/store/product/Smart-RF04E-Smart-RF04EB-CC1110-CC2530-CC2531-CC2540-ZigBee-Module-Target-Zigbee-Emulator-CC-Debugger-Bluetooth/2182011_32950422195.html

шнурок https://ru.aliexpress.com/store/product/Downloader-Cable-Bluetooth-4-0-CC2540-zigbee-CC2531-Sniffer-USB-Programmer-Wire-Download-Programming-Connector-Board/2182011_32853531081.html


Желательно все заказывать у одного продавца, тогда будет один трек на все товары. Я имел неосторожность заказать у разных продавцов, в итоге шнурок ждал около 3 месяцев без пробивания трека. 

Прошитый стик можно заказать у спрута https://sprut.ai/client/projects/105 (нажать кнопку помочь проекту, выбрать прошитый стик и указать  цену 1000 руб.) 

# Есть возможность прошить стик через ардуино 

https://github.com/kirovilya/ioBroker.zigbee/wiki/%D0%9F%D1%80%D0%BE%D1%88%D0%B8%D0%B2%D0%BA%D0%B0-%D1%87%D0%B5%D1%80%D0%B5%D0%B7-Arduino, но это очень долгий  процесс и занимает около 5 часов. К тому-же очень сложно прошивать, не имея кабель-шнурок. От этого варианта прошивания я отказался.

Также стик можно прошить у коллег в  вашем городе, например в Екате я могу прошить стик за символическую плату в размере 500 руб )

В модуле mqtt от @SergeJey доступно только чтение параметров, поэтому для управления устройствами начал писать новый модуль zigbee2mqtt

# Инструкция по перепрошивке стика:

Понадобился драйвер для дебагера https://github.com/kirovilya/files/blob/master/swrc212a.zip
Прошивал по этой инструкции: https://www.zigbee2mqtt.io/getting_started/flashing_the_cc2531.html
Еще инструкция https://github.com/kirovilya/ioBroker.zigbee/wiki/%D0%9F%D1%80%D0%BE%D1%88%D0%B8%D0%B2%D0%BA%D0%B0
Прошивальщик https://yadi.sk/d/RxIVtu3YTCBDyw
Последние версии прошивок можно взять тут https://github.com/Koenkk/Z-Stack-firmware/tree/dev/coordinator/


# Инструкция по установке zigbee2mqtt для linux:
https://www.zigbee2mqtt.io/getting_started/running_zigbee2mqtt.html

Если вам нужна поддержка разрабатываемого в данный момент железа, можно установить девелоперскую ветку. Тогда вместо 

```bash
sudo git clone https://github.com/Koenkk/zigbee2mqtt.git /opt/zigbee2mqtt 
sudo chown -R pi:pi /opt/zigbee2mqtt
cd /opt/zigbee2mqtt
npm install
```

нужно выполнить 
```bash
sudo git clone --single-branch --branch dev  https://github.com/Koenkk/zigbee2mqtt/   /opt/zigbee2mqtt
sudo chown -R pi:pi /opt/zigbee2mqtt
cd /opt/zigbee2mqtt
npm install
```

# Установка zigbee2mqtt для windows 
1) Устанавливаем брокер mqtt, если у вас его еще нет по инструкции http://www.steves-internet-guide.com/install-mosquitto-broker/

Кому лениво устанавливать или держать у себя брокер, а также пользователям windows, у которых нет брокера, при наличии платной подписки на connect (200р.), вы можете использовать адрес http://connect.smartliving.ru в качестве брокера mqtt.

2) Качаем и устанавливаем git 
https://git-scm.com/download/win
3) Качаем и устанавливаем node.js для windows
https://nodejs.org/en/download/


Далее процесс идентичен установке под linux https://www.zigbee2mqtt.io/getting_started/running_zigbee2mqtt.html

Пока только не понятно, как управлять и перезагружать сервис под виндой.

# Настраиваем конфигурационный файл /opt/zigbee2mqtt/data/configuration.yaml
пример вариантов настроек конфигурационного файла https://www.zigbee2mqtt.io/configuration/configuration.html
```bash
homeassistant: false
permit_join: true
advanced:
  channel: 26
  log_level: debug
mqtt:
  base_topic: zigbee2mqtt
   #   server: 'mqtt://192.168.178.32:1900'
   server: 'mqtt://192.168.1.39'
  
serial:
  port: /dev/ttyACM1
  ```

26 канал выбран для livolo выключателя (работают только на 26 канале https://github.com/Koenkk/zigbee2mqtt/issues/592). При отсутствии ливоло выключателей,  можно удалить эту строку.

Если вы настраиваете систему под windows,  порт необходимо указать в следующем формате:
```bash
serial:
  port: COM4[/code]
```

Запускаем командой sudo systemctl start zigbee2mqtt

#Обновление локального zigbee2mqtt до актуальной версии:

```bash
# Stop zigbee2mqtt and go to directory
sudo systemctl stop zigbee2mqtt
cd /opt/zigbee2mqtt

# Backup configuration
cp -R data data-backup

# Update
git checkout HEAD -- npm-shrinkwrap.json
git pull
rm -rf node_modules
npm install

# Restore configuration
cp -R data-backup/* data
rm -rf data-backup

# Start zigbee2mqtt
sudo systemctl start zigbee2mqtt


```


Чтобы сервис стартовал автоматически, не забудьте после  п. 5  (Optional) Running as a daemon with systemctl выполнить 
```bash
sudo systemctl enable zigbee2mqtt
```
(сервис будет запускаться автоматически при старте системы)

#Список поддерживаемого оборудования:
https://www.zigbee2mqtt.io/information/supported_devices.html

# Текущий статус модуля: бетта

# Реализовано:
1) подписка на канал zigbee2mqtt/#
2) автоматическое создание устройств;
3) автоматическое заполнение метрик устройств;
4) привязка метрик к объектам.
5) просмотр логов zigbee2mqtt;
6) конвертирование привязанных переменных в стандартный для мажордомо формат (вместо 1/0 в zigbee2mqtt используется ON/OFF);
7) управление устройствами;
8) создание карты устройств.
9) Добавлено управление и просмотр режимами сопряжения.
10) Добавлено управление (ON OFF) устройствами с главного окна модуля.
11)Подсвечиваются серым потерянные устройства.




# Что планируется:

1) Работа с группами https://www.zigbee2mqtt.io/information/groups.html
2) Заведение отсутствующих метрик, чтобы можно было привязать не описанные события)
3) Отладить работу. Поступают противоречивые данные, у кого-то не отображаются выпадающие списки с картинками и тд.
4) Отладить работу, когда мажордомо и zigbee2mqtt находятся на разных устройствах. Запросил информацию для отвязки от конфигов https://github.com/Koenkk/zigbee2mqtt/issues/1236
5) Настройка прямого управления устройствами 


Ссылка на интересный тематический канал в телеграм: https://t.me/zigbeer
Ссылка на репозиторий модуля zigbee2mqtt: http://github.com/directman66/majordomo-zigbee2mqtt/
Топики для управления устройствами через mqtt   https://www.zigbee2mqtt.io/integration/home_assistant.html
Топики для управления  шлюзом через mqtt https://www.zigbee2mqtt.io/information/mqtt_topics_and_message_structure.html#zigbee2mqttbridgelog


Драйвера для smartRF04EB начинаются на swrc* есть в репозитории Кирова Ильи https://github.com/kirovilya/files
Огромная благодарность  Илье @goofyk за помощь в освоении материала )

Последние версии прошивок можно взять тут https://github.com/Koenkk/Z-Stack-firmware/tree/dev/coordinator/

Обсуждение умных ламп http://majordomo.smartliving.ru/forum/viewtopic.php?f=8&t=6016&p=95733#p95733

# Более подробная информация содержится на форуме  https://mjdm.ru/forum/viewtopic.php?f=5&t=6011 
