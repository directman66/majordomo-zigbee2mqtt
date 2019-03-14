# Module for integrating zigbee devices into the [MAJORDOMO](https://majordomohome.com/) using [zigbee2mqtt](https://www.zigbee2mqtt.io)




It has long been known that with zigbee devices you can work not only through the MiHome gateway. There are many other solutions through which you can receive data and control devices (deconz, athom hommey, samsung smartthings, philips hue, Smart home Hommyn Zigbee Hub (HU-20-Z) etc). In my opinion, the most interesting and budgetary option is the zigbee2mqtt project https://www.zigbee2mqtt.io

# To work with the project, you need a stitched stick and a computer on Linux (any single-raspberry type will work)


Stick https://ru.aliexpress.com/store/product/Wireless-Zigbee-CC2531-Sniffer-Bare-Board-Packet-Protocol-Analyzer-Module-USB-Interface-Dongle-Capture-Packet-Module/2182011_32852226435.html

debugger https://ru.aliexpress.com/store/product/Smart-RF04E-Smart-RF04EB-CC1110-CC2530-CC2531-CC2540-ZigBee-Module-Target-Zigbee-Emulator-CC-Debugger-Bluetooth/2182011_32950422195.

Lace https://aliexpress.com/store/product/Downloader-Cable-Bluetooth-4-0-CC2540-zigbee-CC2531-Sniffer-USB-Programmer-Wire-Download-Programming-Connector-Board/2182011_32853531081.html


It is advisable to order everything from one seller, then there will be one track for all products. I had the imprudence to order from different vendors, in the end, the lace waited about 3 months without punching the track.

The stitched stick can be ordered from the spart https://sprut.ai/client/projects/105 (press the button to help the project, select the stitched stick and indicate the price of 1000 rubles.)

# It is possible to flash Arduino stick

https://github.com/kirovilya/ioBroker.zigbee/wiki/%D0%9F%D1%80%D0%BE%D1%88 %D0BB% D0%B2%D0%BA%D0%B0-% D1% 87% D0% B5% D1% 80% D0% B5% D0% B7-Arduino, but this is a very long process and takes about 5 hours. Moreover, it is very difficult to flash without a cable-cord. I refused this flashing option.

You can also flash the stick from colleagues in your city, for example, in Yekaterinburg, I can flash the stick for a nominal fee of 500 rubles)

In the mqtt module from @SergeJey, only reading parameters is available, so I started writing a new module, zigbee2mqtt, for device management

Instructions for flashing the stick:

It took a driver for debugger https://github.com/kirovilya/files/blob/master/swrc212a.zip
Stitched on this instruction: https://www.zigbee2mqtt.io/getting_started/flashing_the_cc2531.html
More instruction https://github.com/kirovilya/ioBroker.zigbee/wiki/%D0%9F%D1%80%D0%BE%D1%88 %D0BB% D0%B2%D0BA0%B0
The flasher https://yadi.sk/d/RxIVtu3YTCBDyw
The latest firmware versions can be found here https://github.com/Koenkk/Z-Stack-firmware/tree/dev/coordinator/


# Installation instructions for zigbee2mqtt for linux:
https://www.zigbee2mqtt.io/getting_started/running_zigbee2mqtt.html

If you need the support of the hardware that is currently being developed, you can install the developer branch. Then instead

`` bash
sudo git clone https://github.com/Koenkk/zigbee2mqtt.git / opt / zigbee2mqtt
sudo chown -R pi: pi / opt / zigbee2mqtt
cd / opt / zigbee2mqtt
npm install
`` `

need to perform
`` bash
sudo git clone - single-branch - branch dev https://github.com/Koenkk/zigbee2mqtt/ / opt / zigbee2mqtt
sudo chown -R pi: pi / opt / zigbee2mqtt
cd / opt / zigbee2mqtt
npm install
`` `

# Installing zigbee2mqtt for windows
1) Install the mqtt broker, if you do not already have it according to the instructions http://www.steves-internet-guide.com/install-mosquitto-broker/

Who is lazy to install or hold a broker, as well as windows users who do not have a broker, if you have a connect connect subscription ($ 200), you can use http://connect.smartliving.ru as the mqtt broker.

2) Download and install git
https://git-scm.com/download/win
3) Download and install node.js for windows
https://nodejs.org/en/download/


Further, the process is identical to the installation under linux https://www.zigbee2mqtt.io/getting_started/running_zigbee2mqtt.html

So far, it is not clear how to manage and restart the service under Windows.

# Set up the configuration file /opt/zigbee2mqtt/data/configuration.yaml
example configuration options for the https://www.zigbee2mqtt.io/configuration/configuration.html configuration file
``` bash
homeassistant: false
permit_join: true
advanced:
  channel: 26
  log_level: debug
mqtt:
  base_topic: zigbee2mqtt
   # server: 'mqtt: //192.168.178.32: 1900'
   server: 'mqtt: //192.168.1.39'
  
serial:
  port: / dev / ttyACM1
```

Channel 26 is selected for the livolo switch (only work on channel 26 https://github.com/Koenkk/zigbee2mqtt/issues/592). If there are no switches, you can delete this line.

If you configure the system under windows, the port must be specified in the following format:
``` bash
serial:
  port: COM4 [/ code]
```


# Updating local zigbee2mqtt to the current version:

Run the command
``` bashsudo systemctl start zigbee2mqtt```

# Updating local zigbee2mqtt to the current version:

``` bash
# Stop zigbee2mqtt and go to directory
sudo systemctl stop zigbee2mqtt
cd / opt / zigbee2mqtt

# Backup configuration
cp -R data data-backup

# Update
git checkout HEAD - npm-shrinkwrap.json
git pull
rm -rf node_modules
npm install

# Restore configuration
cp -R data-backup / * data
rm -rf data-backup

# Start zigbee2mqtt
sudo systemctl start zigbee2mqtt
```


To start the service automatically, do not forget after step 5 (Optional) Running as a daemon with systemctl
``` bash
sudo systemctl enable zigbee2mqtt
```
(the service will start automatically when the system starts)

# List of supported hardware:
https://www.zigbee2mqtt.io/information/supported_devices.html

# Current module status: betta

# Implemented:
1) Subscribe to the channel zigbee2mqtt / #
2) automatic device creation;
3) automatic filling of device metrics;
4) binding of metrics to objects.
5) view logs zigbee2mqtt;
6) conversion of the attached variables to the standard for major format (instead of 1/0 in zigbee2mqtt ON / OFF is used);
7) device management;
8) create a map of devices.
9) Added management and viewing pairing modes.
10) Added control (ON OFF) of devices from the main window of the module.
11) Lost gray devices are highlighted.




# What is planned:

1) Working with groups https://www.zigbee2mqtt.io/information/groups.html
2) Establishment of missing metrics so that events not described can be linked)
3) Debug work. There are conflicting data, someone does not display drop-down lists with pictures and so on.
4) Debug work when majordomo and zigbee2mqtt are on different devices. Requested information to unbind from configs https://github.com/Koenkk/zigbee2mqtt/issues/1236
5) Configure direct device control


Link to an interesting subject channel in telegrams: https://t.me/zigbeer
Link to the repository of the zigbee2mqtt module: http://github.com/directman66/majordomo-zigbee2mqtt/
Topics for device management via mqtt https://www.zigbee2mqtt.io/integration/home_assistant.html
Topics for managing the gateway via mqtt https://www.zigbee2mqtt.io/information/mqtt_topics_and_message_structure.html#zigbee2mqttbridgelog


Drivers for smartRF04EB begin with swrc * are in the repository of Ilya Kiraova https://github.com/kirovilya/files
Many thanks to Ilya @ goofyk for help in mastering the material)

The latest firmware versions can be found here https://github.com/Koenkk/Z-Stack-firmware/tree/dev/coordinator/

Discussion of smart lamps http://majordomo.smartliving.ru/forum/viewtopic.php?f=8&t=6016&p=95733#p95733
