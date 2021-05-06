<?php
//https://koenkk.github.io/zigbee2mqtt/integration/home_assistant.html
$par2=SQLSelectOne ("select * from zigbee2mqtt_devices_command where ID=1");

if (!$par2['ID']) {


//WXKG01LM;  1
$par2['zigbeeModel'] = 'WXKG01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "click";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//WXKG01LM;   2
$par2['zigbeeModel'] = 'WXKG01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//WXKG01LM;    3
$par2['zigbeeModel'] = 'WXKG01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//WXKG01LM;     4
$par2['zigbeeModel'] = 'WXKG01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//WXKG01LM;      5
$par2['zigbeeModel'] = 'WXKG01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "action";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//WXKG01LM;      6
$par2['zigbeeModel'] = 'WXKG01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "duration";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//WXKG12LM;
$par2['zigbeeModel'] = 'WXKG12LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "click";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//WXKG12LM;
$par2['zigbeeModel'] = 'WXKG12LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);
//WXKG12LM;
$par2['zigbeeModel'] = 'WXKG12LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);
//WXKG12LM;
$par2['zigbeeModel'] = 'WXKG12LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//WXKG12LM;
$par2['zigbeeModel'] = 'WXKG12LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "action";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//WXKG12LM;
$par2['zigbeeModel'] = 'WXKG12LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "duration";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//WXKG03LM;      1
$par2['zigbeeModel'] = 'WXKG03LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "click";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//WXKG03LM;      2
$par2['zigbeeModel'] = 'WXKG03LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);
//WXKG03LM;    3
$par2['zigbeeModel'] = 'WXKG03LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);
//WXKG03LM;    4
$par2['zigbeeModel'] = 'WXKG03LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);
//WXKG03LM;     5
$par2['zigbeeModel'] = 'WXKG03LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "action";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//WXKG03LM;     6
$par2['zigbeeModel'] = 'WXKG03LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "duration";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);




////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//WXKG02LM;
$par2['zigbeeModel'] = 'WXKG02LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "click";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//WXKG02LM;
$par2['zigbeeModel'] = 'WXKG02LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//WXKG02LM;
$par2['zigbeeModel'] = 'WXKG02LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//WXKG02LM;
$par2['zigbeeModel'] = 'WXKG02LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//WXKG02LM;
$par2['zigbeeModel'] = 'WXKG02LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "action";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//WXKG02LM;
$par2['zigbeeModel'] = 'WXKG02LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "both";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//WXKG02LM;
$par2['zigbeeModel'] = 'WXKG02LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "right";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//WXKG02LM;
$par2['zigbeeModel'] = 'WXKG02LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "left";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//WXKG02LM;
$par2['zigbeeModel'] = 'WXKG02LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "duration";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);     



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//QBKG04LM;
$par2['zigbeeModel'] = 'QBKG04LM';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////



//QBKG11LM;
$par2['zigbeeModel'] = 'QBKG11LM';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//QBKG11LM;
$par2['zigbeeModel'] = 'QBKG11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "Watt";
$par2['value_template'] = "power";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//QBKG11LM;
$par2['zigbeeModel'] = 'QBKG11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//QBKG11LM;
$par2['zigbeeModel'] = 'QBKG11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);




//QBKG11LM;
$par2['zigbeeModel'] = 'QBKG11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "temperature";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);




//QBKG11LM;
$par2['zigbeeModel'] = 'QBKG11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "consumption";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);




//QBKG11LM;
$par2['zigbeeModel'] = 'QBKG11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "current";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);




//QBKG11LM;
$par2['zigbeeModel'] = 'QBKG11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "power_factor";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//QBKG03LM;
$par2['zigbeeModel'] = 'QBKG03LM';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_left";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_left";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//QBKG03LM;
$par2['zigbeeModel'] = 'QBKG03LM';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_right";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_right";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//QBKG03LM;
$par2['zigbeeModel'] = 'QBKG03LM';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "button_right";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//QBKG03LM;
$par2['zigbeeModel'] = 'QBKG03LM';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "button_left";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////



//QBKG12LM;
$par2['zigbeeModel'] = 'QBKG12LM';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_left";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/left/set";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//QBKG12LM;
$par2['zigbeeModel'] = 'QBKG12LM';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_right";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/right/set"  ;
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//QBKG12LM;
$par2['zigbeeModel'] = 'QBKG12LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "Watt";
$par2['value_template'] = "power";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//QBKG12LM;
$par2['zigbeeModel'] = 'QBKG12LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//QBKG12LM;
$par2['zigbeeModel'] = 'QBKG12LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//QBKG12LM;
$par2['zigbeeModel'] = 'QBKG12LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "temperature";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//QBKG12LM;
$par2['zigbeeModel'] = 'QBKG12LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "consumption";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//QBKG12LM;
$par2['zigbeeModel'] = 'QBKG12LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "current";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//QBKG12LM;
$par2['zigbeeModel'] = 'QBKG12LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "power_factor";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);




////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//WSDCGQ01LM;
$par2['zigbeeModel'] = 'WSDCGQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "Р В Р’В Р вЂ™Р’В Р В Р вЂ Р В РІР‚С™Р РЋРЎв„ўР В Р’В Р В РІР‚В Р В Р’В Р Р†Р вЂљРЎв„ўР В Р Р‹Р Р†РІР‚С›РЎС›Р В Р’В Р вЂ™Р’В Р В Р вЂ Р В РІР‚С™Р Р†РІР‚С›РЎС›Р В Р’В Р Р†Р вЂљРІвЂћСћР В РІР‚в„ўР вЂ™Р’В°C";
$par2['device_class'] = "temperature";
$par2['value_template'] = "temperature";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//WSDCGQ01LM;
$par2['zigbeeModel'] = 'WSDCGQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "%";
$par2['value_template'] = "humidity";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//WSDCGQ01LM;
$par2['zigbeeModel'] = 'WSDCGQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "%";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//WSDCGQ01LM;
$par2['zigbeeModel'] = 'WSDCGQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "%";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//WSDCGQ01LM;
$par2['zigbeeModel'] = 'WSDCGQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "%";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////



//WSDCGQ11LM;
$par2['zigbeeModel'] = 'WSDCGQ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "Р В Р’В Р вЂ™Р’В Р В Р вЂ Р В РІР‚С™Р РЋРЎв„ўР В Р’В Р В РІР‚В Р В Р’В Р Р†Р вЂљРЎв„ўР В Р Р‹Р Р†РІР‚С›РЎС›Р В Р’В Р вЂ™Р’В Р В Р вЂ Р В РІР‚С™Р Р†РІР‚С›РЎС›Р В Р’В Р Р†Р вЂљРІвЂћСћР В РІР‚в„ўР вЂ™Р’В°C";
$par2['device_class'] = "";
$par2['value_template'] = "temperature";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//WSDCGQ11LM;
$par2['zigbeeModel'] = 'WSDCGQ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "%";
$par2['device_class'] = "";
$par2['value_template'] = "humidity";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//WSDCGQ11LM;
$par2['zigbeeModel'] = 'WSDCGQ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "hPa";
$par2['device_class'] = "";
$par2['value_template'] = "pressure";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//WSDCGQ11LM;
$par2['zigbeeModel'] = 'WSDCGQ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "hPa";
$par2['device_class'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//WSDCGQ11LM;
$par2['zigbeeModel'] = 'WSDCGQ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "hPa";
$par2['device_class'] = "";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//WSDCGQ11LM;
$par2['zigbeeModel'] = 'WSDCGQ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "hPa";
$par2['device_class'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//RTCGQ01LM;
$par2['zigbeeModel'] = 'RTCGQ01LM';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['payload_true'] = "true";
$par2['payload_false'] = "false";

$par2['value_template'] = "occupancy";
$par2['device_class'] = "";
$par2['command_topic'] = "";
$par2['json_attributes'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//RTCGQ01LM;
$par2['zigbeeModel'] = 'RTCGQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "battery";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['payload_true'] = "";
$par2['payload_false'] = "";

$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//RTCGQ01LM;
$par2['zigbeeModel'] = 'RTCGQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//RTCGQ01LM;
$par2['zigbeeModel'] = 'RTCGQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//RTCGQ01LM;
$par2['zigbeeModel'] = 'RTCGQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "action";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//RTCGQ01LM;
$par2['zigbeeModel'] = 'RTCGQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "sensitivity";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//RTCGQ11LM;
$par2['zigbeeModel'] = 'RTCGQ11LM';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['payload_true'] = "true";
$par2['payload_false'] = "false";
$par2['value_template'] = "occupancy";
$par2['device_class'] = "";
$par2['command_topic'] = "";
$par2['json_attributes'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//RTCGQ11LM;
$par2['zigbeeModel'] = 'RTCGQ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "lx" ;
$par2['device_class'] = ""   ;
$par2['value_template'] = "illuminance";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";

$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);
 
 
//RTCGQ11LM;
$par2['zigbeeModel'] = 'RTCGQ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

 
//RTCGQ11LM;
$par2['zigbeeModel'] = 'RTCGQ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

 
//RTCGQ11LM;
$par2['zigbeeModel'] = 'RTCGQ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

 
//RTCGQ11LM;
$par2['zigbeeModel'] = 'RTCGQ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "action";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

 
//RTCGQ11LM;
$par2['zigbeeModel'] = 'RTCGQ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "sensitivity";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//MCCGQ01LM;
$par2['zigbeeModel'] = 'MCCGQ01LM';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['payload_true'] = "true";
$par2['payload_false'] = "false";


$par2['value_template'] = "contact";
$par2['device_class'] = "door";
$par2['command_topic'] = "";    ;
$par2['json_attributes'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MCCGQ01LM;
$par2['zigbeeModel'] = 'MCCGQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "battery";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";    ;
$par2['payload_true'] = "";
$par2['payload_false'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MCCGQ01LM;
$par2['zigbeeModel'] = 'MCCGQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";    ;
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MCCGQ01LM;
$par2['zigbeeModel'] = 'MCCGQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";    ;
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MCCGQ01LM;
$par2['zigbeeModel'] = 'MCCGQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "action";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";    ;
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MCCGQ01LM;
$par2['zigbeeModel'] = 'MCCGQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "sensitivity";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";    ;
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//MCCGQ11LM;
$par2['zigbeeModel'] = 'MCCGQ11LM';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "false";
$par2['payload_off'] = "true";
$par2['value_template'] = "contact";
$par2['device_class'] = "door";
$par2['command_topic'] = "";
$par2['json_attributes'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MCCGQ11LM;
$par2['zigbeeModel'] = 'MCCGQ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "battery";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//SJCGQ11LM;
$par2['zigbeeModel'] = 'SJCGQ11LM';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "true";
$par2['payload_off'] = "false";
$par2['value_template'] = "water_leak";
$par2['device_class'] = "moisture";
$par2['command_topic'] = "";
$par2['json_attributes'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//SJCGQ11LM;
$par2['zigbeeModel'] = 'SJCGQ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "battery";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";    ;
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//SJCGQ11LM;
$par2['zigbeeModel'] = 'SJCGQ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";    ;
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//SJCGQ11LM;
$par2['zigbeeModel'] = 'SJCGQ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";    ;
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//SJCGQ11LM;
$par2['zigbeeModel'] = 'SJCGQ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "action";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";    ;
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//SJCGQ11LM;
$par2['zigbeeModel'] = 'SJCGQ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "sensitivity";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";    ;
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//MFKZQ01LM;
$par2['zigbeeModel'] = 'MFKZQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "action";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MFKZQ01LM;
$par2['zigbeeModel'] = 'MFKZQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MFKZQ01LM;
$par2['zigbeeModel'] = 'MFKZQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MFKZQ01LM;
$par2['zigbeeModel'] = 'MFKZQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MFKZQ01LM;
$par2['zigbeeModel'] = 'MFKZQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "angle";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MFKZQ01LM;
$par2['zigbeeModel'] = 'MFKZQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "side";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MFKZQ01LM;
$par2['zigbeeModel'] = 'MFKZQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "from_side";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MFKZQ01LM;
$par2['zigbeeModel'] = 'MFKZQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "to_side";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MFKZQ01LM;
$par2['zigbeeModel'] = 'MFKZQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "brightness";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MFKZQ01LM;
$par2['zigbeeModel'] = 'MFKZQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "angle_x_absolute";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MFKZQ01LM;
$par2['zigbeeModel'] = 'MFKZQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "angle_y_absolute";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MFKZQ01LM;
$par2['zigbeeModel'] = 'MFKZQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "angle_z";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MFKZQ01LM;
$par2['zigbeeModel'] = 'MFKZQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "angle_y";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MFKZQ01LM;
$par2['zigbeeModel'] = 'MFKZQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "angle_x";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MFKZQ01LM;
$par2['zigbeeModel'] = 'MFKZQ01LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "unknown_data";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//ZNCZ02LM;
$par2['zigbeeModel'] = 'ZNCZ02LM';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//ZNCZ02LM;
$par2['zigbeeModel'] = 'ZNCZ02LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "Watt";
$par2['value_template'] = "power";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//ZNCZ02LM;
$par2['zigbeeModel'] = 'ZNCZ02LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//ZNCZ02LM;
$par2['zigbeeModel'] = 'ZNCZ02LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//ZNCZ02LM;
$par2['zigbeeModel'] = 'ZNCZ02LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "temperature";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//ZNCZ02LM;
$par2['zigbeeModel'] = 'ZNCZ02LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "consumption";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//ZNCZ02LM;
$par2['zigbeeModel'] = 'ZNCZ02LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "current";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//ZNCZ02LM;
$par2['zigbeeModel'] = 'ZNCZ02LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "power_factor";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);




////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//QBCZ11LM;
$par2['zigbeeModel'] = 'QBCZ11LM';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//QBCZ11LM;
$par2['zigbeeModel'] = 'QBCZ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "Watt";
$par2['value_template'] = "power";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//QBCZ11LM;
$par2['zigbeeModel'] = 'QBCZ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//QBCZ11LM;
$par2['zigbeeModel'] = 'QBCZ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//QBCZ11LM;
$par2['zigbeeModel'] = 'QBCZ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "temperature";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//QBCZ11LM;
$par2['zigbeeModel'] = 'QBCZ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "consumption";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//QBCZ11LM;
$par2['zigbeeModel'] = 'QBCZ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "current";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//QBCZ11LM;
$par2['zigbeeModel'] = 'QBCZ11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "power_factor";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);





////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//JTYJ-GD-01LM/BW;
$par2['zigbeeModel'] = 'JTYJ-GD-01LM-BW';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "true";
$par2['payload_off'] = "false";
$par2['value_template'] = "smoke";
$par2['device_class'] = "smoke";
$par2['command_topic'] = "";
$par2['json_attributes'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//JTYJ-GD-01LM/BW;
$par2['zigbeeModel'] = 'JTYJ-GD-01LM-BW';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//JTYJ-GD-01LM/BW;
$par2['zigbeeModel'] = 'JTYJ-GD-01LM-BW';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//JTYJ-GD-01LM/BW;
$par2['zigbeeModel'] = 'JTYJ-GD-01LM-BW';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//JTYJ-GD-01LM/BW;
$par2['zigbeeModel'] = 'JTYJ-GD-01LM-BW';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "action";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//JTYJ-GD-01LM/BW;
$par2['zigbeeModel'] = 'JTYJ-GD-01LM-BW';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "sensitivity";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "sensitivity";
SQLInsert('zigbee2mqtt_devices_command', $par2);





//JTQJ-BF-01LM/BW;
$par2['zigbeeModel'] = 'JTQJ-BF-01LM-BW';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "true";
$par2['payload_off'] = "false";
$par2['value_template'] = "gas";
$par2['device_class'] = "gas";
$par2['command_topic'] = "";
$par2['json_attributes'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//JTQJ-BF-01LM/BW;
$par2['zigbeeModel'] = 'JTQJ-BF-01LM-BW';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "";
$par2['payload_on'] = "";
$par2['value_template'] = "sensitivity";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "sensitivity";
SQLInsert('zigbee2mqtt_devices_command', $par2);





////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//A6121;
$par2['zigbeeModel'] = 'A6121';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "inserted";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//A6121;
$par2['zigbeeModel'] = 'A6121';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//A6121;
$par2['zigbeeModel'] = 'A6121';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "forgotten";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//A6121;
$par2['zigbeeModel'] = 'A6121';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "keyerror";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//DJT11LM;
$par2['zigbeeModel'] = 'DJT11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "action";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//DJT11LM;
$par2['zigbeeModel'] = 'DJT11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//DJT11LM;
$par2['zigbeeModel'] = 'DJT11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//DJT11LM;
$par2['zigbeeModel'] = 'DJT11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//DJT11LM;
$par2['zigbeeModel'] = 'DJT11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "angle";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);





//DJT11LM;
$par2['zigbeeModel'] = 'DJT11LM';
$par2['type'] = "sensitivity";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "sensitivity";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['payload_on'] = "high";
$par2['payload_off'] = "low";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "sensitivity";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//DJT11LM;
$par2['zigbeeModel'] = 'DJT11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "angle_x_absolute";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//DJT11LM;
$par2['zigbeeModel'] = 'DJT11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "angle_y_absolute";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//DJT11LM;
$par2['zigbeeModel'] = 'DJT11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "angle_z";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//DJT11LM;
$par2['zigbeeModel'] = 'DJT11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "angle_y";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//DJT11LM;
$par2['zigbeeModel'] = 'DJT11LM';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "angle_x";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);








////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//LED1545G12;
$par2['zigbeeModel'] = 'LED1545G12';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//LED1545G12;
$par2['zigbeeModel'] = 'LED1545G12';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color_temp";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "color_temp";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//LED1546G12;
$par2['zigbeeModel'] = 'LED1546G12';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//LED1546G12;
$par2['zigbeeModel'] = 'LED1546G12';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color_temp";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "color_temp";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//LED1623G12;
$par2['zigbeeModel'] = 'LED1623G12';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//LED1623G12;
$par2['zigbeeModel'] = 'LED1623G12';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);






////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//LED1537R6;
$par2['zigbeeModel'] = 'LED1537R6';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "brightness";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//LED1537R6;
$par2['zigbeeModel'] = 'LED1537R6';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "color_temp";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "color_temp";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//LED1650R5;
$par2['zigbeeModel'] = 'LED1650R5';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";    ;
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//LED1536G5;
$par2['zigbeeModel'] = 'LED1536G5';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color_temp";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "color_temp";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//LED1536G5;
$par2['zigbeeModel'] = 'LED1536G5';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//LED1622G12;
$par2['zigbeeModel'] = 'LED1622G12';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "brightness";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//LED1624G9;
$par2['zigbeeModel'] = 'LED1624G9';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);


$par2['zigbeeModel'] = 'LED1624G9';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'LED1624G9';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "x";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "x";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'LED1624G9';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "y";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "y";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'LED1624G9';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "color";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'LED1624G9';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color_mode";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "color_mode";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//LED1649C5;
$par2['zigbeeModel'] = 'LED1649C5';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";    ;
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//LED1649C5;
$par2['zigbeeModel'] = 'LED1649C5';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//ZLED-TUNE9;
$par2['zigbeeModel'] = 'LED1649C5';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "transition";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "transition";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////
////////////////////////////////////////
////////////////////////////////////////
////////////////////////////////////////

//LED1732G11;
$par2['zigbeeModel'] = 'LED1732G11';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";    ;
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//LED1732G11;
$par2['zigbeeModel'] = 'LED1732G11';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//ICTC-G-1;
$par2['zigbeeModel'] = 'ICTC-G-1';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "brightness"   ;
$par2['value_template'] = "battery";
$par2['json_attributes'] = "linkquality" ;
$par2['command_topic'] = "brightness";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//ICTC-G-1;
$par2['zigbeeModel'] = 'ICTC-G-1';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "brightness"   ;
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "linkquality" ;
$par2['command_topic'] = "brightness";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//ICPSHC24-10EU-IL-1;
$par2['zigbeeModel'] = 'ICPSHC24-10EU-IL-1';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//ICPSHC24-10EU-IL-1;
$par2['zigbeeModel'] = 'ICPSHC24-10EU-IL-1';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//TRADFRI Driver 10W
$par2['zigbeeModel'] = 'TRADFRI Driver 10W';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//TRADFRI Driver 10W
$par2['zigbeeModel'] = 'TRADFRI Driver 10W';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//BASICZBR3
$par2['zigbeeModel'] = 'BASICZBR3';
$par2['type'] = "relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//SPZB0001
$par2['zigbeeModel'] = 'SPZB0001';
$par2['type'] = "thermostat";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "current_heating_setpoint";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "current_heating_setpoint";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//SPZB0001
$par2['zigbeeModel'] = 'SPZB0001';
$par2['type'] = "thermostat";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "eurotronic_system_mode";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "eurotronic_system_mode";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//SPZB0001
$par2['zigbeeModel'] = 'SPZB0001';
$par2['type'] = "thermostat";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "system_mode";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "system_mode";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//SPZB0001
$par2['zigbeeModel'] = 'SPZB0001';
$par2['type'] = "thermostat";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "pi_heating_demand";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "pi_heating_demand";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//SPZB0001
$par2['zigbeeModel'] = 'SPZB0001';
$par2['type'] = "thermostat";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "occupied_heating_setpoint";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "occupied_heating_setpoint";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//SPZB0001
$par2['zigbeeModel'] = 'SPZB0001';
$par2['type'] = "thermostat";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "unoccupied_heating_setpoint";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "unoccupied_heating_setpoint";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//ICPSHC24-30EU-IL-1;
$par2['zigbeeModel'] = 'ICPSHC24-30EU-IL-1';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//L1527;
$par2['zigbeeModel'] = 'L1527';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//L1527;
$par2['zigbeeModel'] = 'L1527';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color_temp";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "color_temp";
SQLInsert('zigbee2mqtt_devices_command', $par2);

////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//L1529;
$par2['zigbeeModel'] = 'L1529';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";    ;
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//L1529;
$par2['zigbeeModel'] = 'L1529';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color_temp";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";    ;
$par2['command_value'] = "color_temp";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//L1528;
$par2['zigbeeModel'] = 'L1528';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color_temp";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "color_temp";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//L1528;
$par2['zigbeeModel'] = 'L1528';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);

////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//L1531;
$par2['zigbeeModel'] = 'L1531';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//L1531;
$par2['zigbeeModel'] = 'L1531';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color_temp";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "color_temp";
SQLInsert('zigbee2mqtt_devices_command', $par2);





////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//E1603;
$par2['zigbeeModel'] = 'E1603';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//7299760PH;
$par2['zigbeeModel'] = '7299760PH';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//7146060PH;
$par2['zigbeeModel'] = '7146060PH';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//433714;
$par2['zigbeeModel'] = '433714';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//9290011370;
$par2['zigbeeModel'] = '9290011370';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//8718696449691;
$par2['zigbeeModel'] = '8718696449691';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//7299355PH;
$par2['zigbeeModel'] = '7299355PH';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//915005106701;
$par2['zigbeeModel'] = '915005106701';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//9290012573A;
$par2['zigbeeModel'] = '9290012573A';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//9290002579A;
$par2['zigbeeModel'] = '9290002579A';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//8718696485880;
$par2['zigbeeModel'] = '8718696485880';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//915005733701;
$par2['zigbeeModel'] = '915005733701';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//8718696695203;
$par2['zigbeeModel'] = '8718696695203';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = '8718696695203';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = '8718696695203';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color_temp";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "color_temp";
SQLInsert('zigbee2mqtt_devices_command', $par2);





////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//8718696548738;
$par2['zigbeeModel'] = '8718696548738';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = '8718696548738';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = '8718696548738';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color_temp";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "color_temp";
SQLInsert('zigbee2mqtt_devices_command', $par2);



$par2['zigbeeModel'] = '8718696548738';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "transition";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "transition";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////




//8718696598283;
$par2['zigbeeModel'] = '8718696598283';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//8718696548738;
$par2['zigbeeModel'] = '8718696548738';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//3261030P7;
$par2['zigbeeModel'] = '3261030P7';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//3216331P5;
$par2['zigbeeModel'] = '3216331P5';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//7199960PH;
$par2['zigbeeModel'] = '7199960PH';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//324131092621;
$par2['zigbeeModel'] = '324131092621';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "action";
$par2['json_attributes'] = "" ;
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//324131092621;
$par2['zigbeeModel'] = '324131092621';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "" ;
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//324131092621;
$par2['zigbeeModel'] = '324131092621';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "" ;
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//324131092621;
$par2['zigbeeModel'] = '324131092621';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "" ;
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//324131092621;
$par2['zigbeeModel'] = '324131092621';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "angle";
$par2['json_attributes'] = "" ;
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//324131092621;
$par2['zigbeeModel'] = '324131092621';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "side";
$par2['json_attributes'] = "" ;
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//324131092621;
$par2['zigbeeModel'] = '324131092621';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "from_side";
$par2['json_attributes'] = "" ;
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//324131092621;
$par2['zigbeeModel'] = '324131092621';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "to_side";
$par2['json_attributes'] = "" ;
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//324131092621;
$par2['zigbeeModel'] = '324131092621';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "brightness" ;
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//324131092621;
$par2['zigbeeModel'] = '324131092621';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "angle_x_absolute";
$par2['json_attributes'] = "" ;
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//324131092621;
$par2['zigbeeModel'] = '324131092621';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "angle_y_absolute";
$par2['json_attributes'] = "" ;
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//324131092621;
$par2['zigbeeModel'] = '324131092621';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "angle_z";
$par2['json_attributes'] = "" ;
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//324131092621;
$par2['zigbeeModel'] = '324131092621';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "angle_y";
$par2['json_attributes'] = "" ;
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//324131092621;
$par2['zigbeeModel'] = '324131092621';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "angle_x";
$par2['json_attributes'] = "" ;
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//324131092621;
$par2['zigbeeModel'] = '324131092621';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "unknown_data";
$par2['json_attributes'] = "" ;
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);




////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//9290012607;
$par2['zigbeeModel'] = '9290012607';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "true";
$par2['payload_off'] = "false";
$par2['value_template'] = "occupancy";
$par2['device_class'] = "motion";
$par2['command_topic'] = "";
$par2['json_attributes'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//9290012607;
$par2['zigbeeModel'] = '9290012607';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "Р В Р’В Р вЂ™Р’В Р В Р вЂ Р В РІР‚С™Р РЋРЎв„ўР В Р’В Р В РІР‚В Р В Р’В Р Р†Р вЂљРЎв„ўР В Р Р‹Р Р†РІР‚С›РЎС›Р В Р’В Р вЂ™Р’В Р В Р вЂ Р В РІР‚С™Р Р†РІР‚С›РЎС›Р В Р’В Р Р†Р вЂљРІвЂћСћР В РІР‚в„ўР вЂ™Р’В°C";
$par2['device_class'] = "temperature";
$par2['value_template'] = "temperature";
$par2['json_attributes'] = "linkquality,battery,voltage";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//9290012607;
$par2['zigbeeModel'] = '9290012607';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "lx" ;
$par2['device_class'] = "illuminance"   ;
$par2['value_template'] = "illuminance";
$par2['json_attributes'] = "linkquality,battery,voltage"  ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//9290012607;
$par2['zigbeeModel'] = '9290012607';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "battery";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "linkquality,voltage,action,sensitivity" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//F7C033;
$par2['zigbeeModel'] = 'F7C033';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//PLUG EDP RE:DY;
$par2['zigbeeModel'] = 'PLUG EDP RE:DY';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//PLUG EDP RE:DY;
$par2['zigbeeModel'] = 'PLUG EDP RE:DY';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['device_class'] = "connectivity";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "Watt";
$par2['value_template'] = "power";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'PLUG EDP RE:DY';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['device_class'] = "connectivity";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'PLUG EDP RE:DY';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['device_class'] = "connectivity";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'PLUG EDP RE:DY';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['device_class'] = "connectivity";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "temperature";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'PLUG EDP RE:DY';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['device_class'] = "connectivity";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "consumption";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'PLUG EDP RE:DY';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['device_class'] = "connectivity";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "current";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'PLUG EDP RE:DY';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['device_class'] = "connectivity";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "power_factor";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//CC2530.ROUTER;
$par2['zigbeeModel'] = 'CC2530.ROUTER';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "true";
$par2['payload_off'] = "false";
$par2['value_template'] = "state";
$par2['device_class'] = "connectivity";
$par2['command_topic'] = "";
$par2['json_attributes'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//CC2530.ROUTER;
$par2['zigbeeModel'] = 'CC2530.ROUTER';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "description,type,rssi" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'CC2530.ROUTER';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "description";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'CC2530.ROUTER';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "type";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'CC2530.ROUTER';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "rssi";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);





////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//DNCKATSW001;
$par2['zigbeeModel'] = 'DNCKATSW001';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//DNCKATSW002;
$par2['zigbeeModel'] = 'DNCKATSW002';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_left";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/left/set";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//DNCKATSW002;
$par2['zigbeeModel'] = 'DNCKATSW002';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_right";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//DNCKATSW002;
$par2['zigbeeModel'] = 'DNCKATSW002';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "linkquality";
$par2['command_topic'] = ""  ;
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//DNCKATSW002;
$par2['zigbeeModel'] = 'DNCKATSW002';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "button_right";
$par2['command_topic'] = ""  ;
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//DNCKATSW002;
$par2['zigbeeModel'] = 'DNCKATSW002';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "button_left";
$par2['command_topic'] = ""  ;
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);




////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////



//DNCKATSW003;
$par2['zigbeeModel'] = 'DNCKATSW003';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_left";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/left/set";
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//DNCKATSW003;
$par2['zigbeeModel'] = 'DNCKATSW003';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_right";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//DNCKATSW003;
$par2['zigbeeModel'] = 'DNCKATSW003';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_center";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/center/set";
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//DNCKATSW003;
$par2['zigbeeModel'] = 'DNCKATSW003';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "linkquality";
$par2['command_topic'] = "";
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//DNCKATSW003;
$par2['zigbeeModel'] = 'DNCKATSW003';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "button_center";
$par2['command_topic'] = "";
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//DNCKATSW003;
$par2['zigbeeModel'] = 'DNCKATSW003';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "button_right";
$par2['command_topic'] = "";
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//DNCKATSW003;
$par2['zigbeeModel'] = 'DNCKATSW003';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "button_left";
$par2['command_topic'] = "";
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);




////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//DNCKATSW004;
$par2['zigbeeModel'] = 'DNCKATSW004';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_bottom_left";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/bottom_left/set";
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//DNCKATSW004;
$par2['zigbeeModel'] = 'DNCKATSW004';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_bottom_right";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/bottom_right/set";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//DNCKATSW004;
$par2['zigbeeModel'] = 'DNCKATSW004';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_top_left";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/top_left/set";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//DNCKATSW004;
$par2['zigbeeModel'] = 'DNCKATSW004';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_top_right";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/top_right/set";
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//DNCKATSW004;
$par2['zigbeeModel'] = 'DNCKATSW004';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "linkquality";
$par2['command_topic'] = "";
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//DNCKATSW004;
$par2['zigbeeModel'] = 'DNCKATSW004';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "button_top_right";
$par2['command_topic'] = "";
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//DNCKATSW004;
$par2['zigbeeModel'] = 'DNCKATSW004';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "button_top_left";
$par2['command_topic'] = "";
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//DNCKATSW004;
$par2['zigbeeModel'] = 'DNCKATSW004';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "button_bottom_right";
$par2['command_topic'] = "";
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//DNCKATSW004;
$par2['zigbeeModel'] = 'DNCKATSW004';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "button_bottom_left";
$par2['command_topic'] = "";
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);




////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

//4058075816718;
$par2['zigbeeModel'] = '4058075816718';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//AA69697;
$par2['zigbeeModel'] = 'AA69697';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//AC03645;
$par2['zigbeeModel'] = 'AC03645';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//AC03642;
$par2['zigbeeModel'] = 'AC03642';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//AA70155;
$par2['zigbeeModel'] = 'AA70155';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////



//AA68199;
$par2['zigbeeModel'] = 'AA68199';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//AB32840;
$par2['zigbeeModel'] = 'AB32840';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//4058075816794;
$par2['zigbeeModel'] = '4058075816794';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//AC03641;
$par2['zigbeeModel'] = 'AC03641';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//4052899926158;
$par2['zigbeeModel'] = '4052899926158';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//AB401130055;
$par2['zigbeeModel'] = 'AB401130055';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//AB3257001NJ;
$par2['zigbeeModel'] = 'AB3257001NJ';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//4052899926110;
$par2['zigbeeModel'] = '4052899926110';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//4058075036185;
$par2['zigbeeModel'] = '4058075036185';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//4058075036147;
$par2['zigbeeModel'] = '4058075036147';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////



//AB35996;
$par2['zigbeeModel'] = 'AB35996';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);




////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//AC08562;
$par2['zigbeeModel'] = 'AC08562';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//AC01353010G;
$par2['zigbeeModel'] = 'AC01353010G';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "true";
$par2['payload_off'] = "false";
$par2['value_template'] = "occupancy";
$par2['device_class'] = "motion";
$par2['json_attributes'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//AC01353010G;
$par2['zigbeeModel'] = 'AC01353010G';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "Р В Р’В Р вЂ™Р’В Р В Р вЂ Р В РІР‚С™Р РЋРЎв„ўР В Р’В Р В РІР‚В Р В Р’В Р Р†Р вЂљРЎв„ўР В Р Р‹Р Р†РІР‚С›РЎС›Р В Р’В Р вЂ™Р’В Р В Р вЂ Р В РІР‚С™Р Р†РІР‚С›РЎС›Р В Р’В Р Р†Р вЂљРІвЂћСћР В РІР‚в„ўР вЂ™Р’В°C";
$par2['device_class'] = "";
$par2['value_template'] = "temperature";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//AC01353010G;
$par2['zigbeeModel'] = 'AC01353010G';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['device_class'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//AC01353010G;
$par2['zigbeeModel'] = 'AC01353010G';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['device_class'] = "";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//AC01353010G;
$par2['zigbeeModel'] = 'AC01353010G';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['device_class'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////



//HALIGHTDIMWWE27;
$par2['zigbeeModel'] = 'HALIGHTDIMWWE27';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//RB 185 C;
$par2['zigbeeModel'] = 'RB 185 C';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////



//BY 185 C;
$par2['zigbeeModel'] = 'BY 185 C';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//RB 285 C';
$par2['zigbeeModel'] = 'RB 285 C';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////



//RB 165;
$par2['zigbeeModel'] = 'RB 165';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//RB 175 W;
$par2['zigbeeModel'] = 'RB 175 W';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//RS 125;
$par2['zigbeeModel'] = 'RS 125';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//RS 128 T;
$par2['zigbeeModel'] = 'RS 128 T';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//RB 145;
$par2['zigbeeModel'] = 'RB 145';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//RB 248 T;
$par2['zigbeeModel'] = 'RB 248 T';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//BY 165;
$par2['zigbeeModel'] = 'BY 165';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//PL 110;
$par2['zigbeeModel'] = 'PL 110';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//ST 110;
$par2['zigbeeModel'] = 'ST 110';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//UC 110;
$par2['zigbeeModel'] = 'UC 110';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//DL 110 N;
$par2['zigbeeModel'] = 'DL 110 N';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//DL 110 W;
$par2['zigbeeModel'] = 'DL 110 W';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//SL 110 N;
$par2['zigbeeModel'] = 'SL 110 N';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//SL 110 M;
$par2['zigbeeModel'] = 'SL 110 M';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//SL 110nfr ;
$par2['zigbeeModel'] = 'SL 110 W';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//SP 120;
$par2['zigbeeModel'] = 'SP 120';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//SP 120;
$par2['zigbeeModel'] = 'SP 120';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "Watt";
$par2['value_template'] = "power";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'SP 120';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'SP 120';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'SP 120';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "temperature";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'SP 120';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "consumption";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'SP 120';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "current";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'SP 120';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "power_factor";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);




////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//73742;
$par2['zigbeeModel'] = '73742';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////



//73740;
$par2['zigbeeModel'] = '73740';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);




////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//73693;
$par2['zigbeeModel'] = '73693';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////



//74283;
$par2['zigbeeModel'] = '74283';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//74696;
$par2['zigbeeModel'] = '74696';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//72922-A;
$par2['zigbeeModel'] = '72922-A';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//74282;
$par2['zigbeeModel'] = '74282';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////



//22670;
$par2['zigbeeModel'] = '22670';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//45852GE;
$par2['zigbeeModel'] = '45852GE';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//45857GE;
$par2['zigbeeModel'] = '45857GE';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////



//E11-G13;
$par2['zigbeeModel'] = 'E11-G13';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//E11-G23/E11-G33;
$par2['zigbeeModel'] = 'E11-G23-E11-G33';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//Z01-CIA19NAE26;
$par2['zigbeeModel'] = 'Z01-CIA19NAE26';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//Z01-A19NAE26;
$par2['zigbeeModel'] = 'Z01-A19NAE26';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);




////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//E11-N1EA;
$par2['zigbeeModel'] = 'E11-N1EA';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);




////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//K2RGBW01;
$par2['zigbeeModel'] = 'K2RGBW01';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//Z809A;
$par2['zigbeeModel'] = 'Z809A';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//Z809A;
$par2['zigbeeModel'] = 'Z809A';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "Watt";
$par2['value_template'] = "power";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//Z809A;
$par2['zigbeeModel'] = 'Z809A';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "Watt";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//Z809A;
$par2['zigbeeModel'] = 'Z809A';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//Z809A;
$par2['zigbeeModel'] = 'Z809A';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "temperature";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//Z809A;
$par2['zigbeeModel'] = 'Z809A';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "consumption";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//Z809A;
$par2['zigbeeModel'] = 'Z809A';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "current";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//Z809A;
$par2['zigbeeModel'] = 'Z809A';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "power_factor";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////



//NL08-0800;
$par2['zigbeeModel'] = 'NL08-0800';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//FB56+ZSW05HG1.2;
$par2['zigbeeModel'] = 'FB56+ZSW05HG1.2';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//MG-AUWS01;
$par2['zigbeeModel'] = 'MG-AUWS01';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "linkquality";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/left/set";
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//MG-AUWS01;
$par2['zigbeeModel'] = 'MG-AUWS01';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "button_right";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/right/set";
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//MG-AUWS01;
$par2['zigbeeModel'] = 'MG-AUWS01';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "button_left";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/left/set";
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//MG-AUWS01;
$par2['zigbeeModel'] = 'MG-AUWS01';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_right";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//MG-AUWS01;
$par2['zigbeeModel'] = 'MG-AUWS01';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_left";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "" ;
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//GL-C-007-2ID;
$par2['zigbeeModel'] = 'GL-C-007-2ID';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "true";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//GL-C-007-2ID;
$par2['zigbeeModel'] = 'GL-C-007-2ID';
$par2['type'] = "white";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/white/set";
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state_white";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//GL-C-007-2ID;
$par2['zigbeeModel'] = 'GL-C-007-2ID';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "color";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//GL-C-007-2ID;
$par2['zigbeeModel'] = 'GL-C-007-2ID';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//GL-C-007-2ID;
$par2['zigbeeModel'] = 'GL-C-007-2ID';
$par2['type'] = "white";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "false";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/white/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness_white";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//GL-C-007-2ID;
$par2['zigbeeModel'] = 'GL-C-007-2ID';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color_temp";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "color_temp";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//GL-C-007-2ID;
$par2['zigbeeModel'] = 'GL-C-007-2ID';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "xy";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "xy";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//GL-C-007;
$par2['zigbeeModel'] = 'GL-C-007';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);




//GL-C-007;
$par2['zigbeeModel'] = 'GL-C-007';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "color";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//GL-C-007;
$par2['zigbeeModel'] = 'GL-C-007';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//GL-C-007;
$par2['zigbeeModel'] = 'GL-C-007';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color_temp";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "color_temp";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//GL-C-007;
$par2['zigbeeModel'] = 'GL-C-007';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "xy";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "xy";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//GL-C-008;
$par2['zigbeeModel'] = 'GL-C-008';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);




//GL-C-008;
$par2['zigbeeModel'] = 'GL-C-008';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "color";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//GL-C-008;
$par2['zigbeeModel'] = 'GL-C-008';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//GL-C-008;
$par2['zigbeeModel'] = 'GL-C-008';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color_temp";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "color_temp";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//GL-C-008;
$par2['zigbeeModel'] = 'GL-C-008';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "xy";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "xy";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//STSS-MULT-001;
$par2['zigbeeModel'] = 'STSS-MULT-001';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "false";
$par2['payload_off'] = "true";
$par2['value_template'] = "contact";
$par2['device_class'] = "door";
$par2['command_topic'] = "";
$par2['json_attributes'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//STSS-MULT-001;
$par2['zigbeeModel'] = 'STSS-MULT-001';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "battery";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "linkquality,voltage,action,sensitivity" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//STSS-MULT-001;
$par2['zigbeeModel'] = 'STSS-MULT-001';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//STSS-MULT-001;
$par2['zigbeeModel'] = 'STSS-MULT-001';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//STSS-MULT-001;
$par2['zigbeeModel'] = 'STSS-MULT-001';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "action";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//STSS-MULT-001;
$par2['zigbeeModel'] = 'STSS-MULT-001';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "sensitivity";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);




////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//STS-PRS-251;
$par2['zigbeeModel'] = 'STS-PRS-251';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "true";
$par2['payload_off'] = "false";
$par2['value_template'] = "presence";
$par2['device_class'] = "presence";
$par2['command_topic'] = "";
$par2['json_attributes'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//STS-PRS-251;
$par2['zigbeeModel'] = 'STS-PRS-251';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "battery";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//STS-PRS-251;
$par2['zigbeeModel'] = 'STS-PRS-251';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//STS-PRS-251;
$par2['zigbeeModel'] = 'STS-PRS-251';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//STS-PRS-251;
$par2['zigbeeModel'] = 'STS-PRS-251';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "action";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//STS-PRS-251;
$par2['zigbeeModel'] = 'STS-PRS-251';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "sensitivity";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//ZLED-2709;


//LED1624G9;
$par2['zigbeeModel'] = 'ZLED-2709';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);


$par2['zigbeeModel'] = 'ZLED-2709';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//ZLED-2709;
$par2['zigbeeModel'] = 'ZLED-2709';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "transition";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "transition";
SQLInsert('zigbee2mqtt_devices_command', $par2);




////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//50045;
$par2['zigbeeModel'] = '50045';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//50049;
$par2['zigbeeModel'] = '50049';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//AV2010/22;
$par2['zigbeeModel'] = 'AV2010-22';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "true";
$par2['payload_off'] = "false";
$par2['value_template'] = "occupancy";
$par2['device_class'] = "motion";
$par2['command_topic'] = "";
$par2['json_attributes'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//AV2010/22;
$par2['zigbeeModel'] = 'AV2010-22';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "battery";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//AV2010/22;
$par2['zigbeeModel'] = 'AV2010-22';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//AV2010/22;
$par2['zigbeeModel'] = 'AV2010-22';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//AV2010/22;
$par2['zigbeeModel'] = 'AV2010-22';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "action";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//AV2010/22;
$par2['zigbeeModel'] = 'AV2010-22';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['device_class'] = "";
$par2['value_template'] = "sensitivity";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////



//3210-L;
$par2['zigbeeModel'] = '3210-L';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//3326-L;
$par2['zigbeeModel'] = '3326-L';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "true";
$par2['payload_off'] = "false";
$par2['value_template'] = "occupancy";
$par2['device_class'] = "motion";
$par2['command_topic'] = "";
$par2['json_attributes'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////



//3326-L;
$par2['zigbeeModel'] = '3326-L';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "Р В Р’В Р вЂ™Р’В Р В Р вЂ Р В РІР‚С™Р РЋРЎв„ўР В Р’В Р В РІР‚В Р В Р’В Р Р†Р вЂљРЎв„ўР В Р Р‹Р Р†РІР‚С›РЎС›Р В Р’В Р вЂ™Р’В Р В Р вЂ Р В РІР‚С™Р Р†РІР‚С›РЎС›Р В Р’В Р Р†Р вЂљРІвЂћСћР В РІР‚в„ўР вЂ™Р’В°C";
$par2['device_class'] = "temperature";
$par2['value_template'] = "temperature";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//3326-L;
$par2['zigbeeModel'] = '3326-L';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['device_class'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//3326-L;
$par2['zigbeeModel'] = '3326-L';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['device_class'] = "";
$par2['value_template'] = "battery";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//3326-L;
$par2['zigbeeModel'] = '3326-L';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['device_class'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//3320-L;
$par2['zigbeeModel'] = '3320-L';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "false";
$par2['payload_off'] = "true";
$par2['value_template'] = "contact";
$par2['device_class'] = "door";
$par2['command_topic'] = "";
$par2['json_attributes'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//KS-SM001;
$par2['zigbeeModel'] = 'KS-SM001';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//53170161;
$par2['zigbeeModel'] = '53170161';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//900008-WW;
$par2['zigbeeModel'] = '900008-WW';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////



//Mega23M12;
$par2['zigbeeModel'] = 'Mega23M12';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['color_temp'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//4256251-RZHAC;
$par2['zigbeeModel'] = '4256251-RZHAC';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = ""; 
$par2['color_temp'] = "";
$par2['xy'] = ""; 
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////



//4256251-RZHAC;
$par2['zigbeeModel'] = '4256251-RZHAC';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "Watt";
$par2['value_template'] = "power";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//4256251-RZHAC;
$par2['zigbeeModel'] = '4256251-RZHAC';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//4256251-RZHAC;
$par2['zigbeeModel'] = '4256251-RZHAC';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//4256251-RZHAC;
$par2['zigbeeModel'] = '4256251-RZHAC';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "temperature";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//4256251-RZHAC;
$par2['zigbeeModel'] = '4256251-RZHAC';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "consumption";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//4256251-RZHAC;
$par2['zigbeeModel'] = '4256251-RZHAC';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "current";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//4256251-RZHAC;
$par2['zigbeeModel'] = '4256251-RZHAC';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "power_factor";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//PSS-23ZBS;
$par2['zigbeeModel'] = 'PSS-23ZBS';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//HS1SA;
$par2['zigbeeModel'] = 'HS1SA';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "true";
$par2['payload_off'] = "false";
$par2['value_template'] = "smoke";
$par2['device_class'] = "smoke";
$par2['command_topic'] = "";
$par2['json_attributes'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//HS3SA;
$par2['zigbeeModel'] = 'HS3SA';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "true";
$par2['payload_off'] = "false";
$par2['value_template'] = "smoke";
$par2['device_class'] = "smoke";
$par2['command_topic'] = "";
$par2['json_attributes'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);




////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//HS1DS;
$par2['zigbeeModel'] = 'HS1DS';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "false";
$par2['payload_off'] = "true";
$par2['value_template'] = "contact";
$par2['device_class'] = "door";
$par2['command_topic'] = "";
$par2['json_attributes'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//HS1WL;
$par2['zigbeeModel'] = 'HS1WL';
$par2['type'] = "binary_sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_on'] = "true";
$par2['payload_off'] = "false";
$par2['value_template'] = "water_leak";
$par2['device_class'] = "moisture";
$par2['command_topic'] = "";
$par2['json_attributes'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);




////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//421786;
$par2['zigbeeModel'] = '421786';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//ZNLDP12LM ;
$par2['zigbeeModel'] = 'ZNLDP12LM';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//ZNLDP12LM ;
$par2['zigbeeModel'] = 'ZNLDP12LM';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//ZNLDP12LM ;
$par2['zigbeeModel'] = 'ZNLDP12LM';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//ZNLDP12LM ;
$par2['zigbeeModel'] = 'ZNLDP12LM';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color_temp";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "color_temp";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//ZNLDP12LM ;
$par2['zigbeeModel'] = 'ZNLDP12LM';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "" ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "last_seen ";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//livolo ;
$par2['zigbeeModel'] = 'VL-C701Z-11';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/right/set" ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state_right";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//livolo ;
$par2['zigbeeModel'] = 'TI0001';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/left/set" ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state_left";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//livolo ;
$par2['zigbeeModel'] = 'TI0001';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/right/set" ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state_right";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//LLKZMK11LM;
$par2['zigbeeModel'] = 'LLKZMK11LM';
$par2['type'] = "relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_l1";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/l1/set";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//LLKZMK11LM;
$par2['zigbeeModel'] = 'LLKZMK11LM';
$par2['type'] = "relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_l2";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/l2/set";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


$par2['zigbeeModel'] = 'LLKZMK11LM';
$par2['type'] = "interlock";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "false"  ;
$par2['payload_on'] = "true"  ;
$par2['value_template'] = "interlock";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "interlock";
SQLInsert('zigbee2mqtt_devices_command', $par2);



 
//LXZB-02A;
$par2['zigbeeModel'] = 'LXZB-02A';
$par2['type'] = "relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "state";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//LXZB-02A;
$par2['zigbeeModel'] = 'LXZB-02A';
$par2['type'] = "relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "brightness";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "brightness";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//trust
//ZLED-TUNE9;
$par2['zigbeeModel'] = 'ZLED-TUNE9';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//ZLED-TUNE9;
$par2['zigbeeModel'] = 'ZLED-TUNE9';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "transition";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "transition";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//trust
//ZLED-TUNE9;
$par2['zigbeeModel'] = 'ZLED-TUNE9';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color_temp";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "color_temp";
SQLInsert('zigbee2mqtt_devices_command', $par2);


$par2['zigbeeModel'] = 'ZLED-TUNE9';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);






/////////////////


//trust
//ZLED-TUNE9;




$par2['zigbeeModel'] = '81809';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//trust
//ZLED- rgb bulb
$par2['zigbeeModel'] = '81809';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color_temp";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "color_temp";
SQLInsert('zigbee2mqtt_devices_command', $par2);


$par2['zigbeeModel'] = '81809';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = '81809';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "x";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "x";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = '81809';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "y";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "y";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = '81809';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color_mode";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "color_mode";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = '81809';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "color";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//ZLED-TUNE9;
$par2['zigbeeModel'] = '81809';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "transition";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "transition";
SQLInsert('zigbee2mqtt_devices_command', $par2);


/////////////////

//ZLL-ExtendedColo
$par2['zigbeeModel'] = 'ZLL-ExtendedColo';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "brightness";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//trust
//ZLL-ExtendedColo
$par2['zigbeeModel'] = 'ZLL-ExtendedColo';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color_temp";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "color_temp";
SQLInsert('zigbee2mqtt_devices_command', $par2);


$par2['zigbeeModel'] = 'ZLL-ExtendedColo';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = '81809';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "x";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "x";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'ZLL-ExtendedColo';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "y";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "y";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'ZLL-ExtendedColo';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color_mode";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "color_mode";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'ZLL-ExtendedColo';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "color";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "color";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//ZLED-TUNE9;
$par2['zigbeeModel'] = 'ZLL-ExtendedColo';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "true";
$par2['xy'] = "true";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['value_template'] = "transition";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['command_value'] = "transition";
SQLInsert('zigbee2mqtt_devices_command', $par2);


/////////////////






//V3-BTZB;
$par2['zigbeeModel'] = 'V3-BTZB';
$par2['type'] = "door_lock";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "LOCK"  ;
$par2['payload_on'] = "UNLOCK"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "state";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//GROUP;
$par2['zigbeeModel'] = 'group';
$par2['type'] = "group";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "state";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//GROUP;
$par2['zigbeeModel'] = 'group';
$par2['type'] = "group";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "brightness";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "brightness";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//GROUP;
$par2['zigbeeModel'] = 'group';
$par2['type'] = "group";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "color";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "color";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "color";
SQLInsert('zigbee2mqtt_devices_command', $par2);

////ZNCLDJ11LM
$par2['zigbeeModel'] = 'ZNCLDJ11LM';
$par2['type'] = "ZNCLDJ11LM";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "position";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "position";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "position";
SQLInsert('zigbee2mqtt_devices_command', $par2);


$par2['zigbeeModel'] = 'ZNCLDJ11LM';
$par2['type'] = "ZNCLDJ11LM";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "CLOSE"  ;
$par2['payload_on'] = "OPEN"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "state";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////ZNCLDJ12LM
$par2['zigbeeModel'] = 'ZNCLDJ12LM';
$par2['type'] = "ZNCLDJ11LM";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "position";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "position";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "position";
SQLInsert('zigbee2mqtt_devices_command', $par2);


$par2['zigbeeModel'] = 'ZNCLDJ12LM';
$par2['type'] = "ZNCLDJ11LM";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "CLOSE"  ;
$par2['payload_on'] = "OPEN"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "state";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//DIYRuZ_R4_5
$par2['zigbeeModel'] = 'DIYRuZ_R4_5';
$par2['type'] = "Relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/bottom_left/set";
$par2['json_attributes'] = "state";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//DIYRuZ_R4_5
$par2['zigbeeModel'] = 'DIYRuZ_R4_5';
$par2['type'] = "Relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/bottom_right/set";
$par2['json_attributes'] = "state";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//DIYRuZ_R4_5
$par2['zigbeeModel'] = 'DIYRuZ_R4_5';
$par2['type'] = "Relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/top_left/set";
$par2['json_attributes'] = "state";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//DIYRuZ_R4_5
$par2['zigbeeModel'] = 'DIYRuZ_R4_5';
$par2['type'] = "Relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/top_right/set";
$par2['json_attributes'] = "state";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//DIYRuZ_R4_5
$par2['zigbeeModel'] = 'DIYRuZ_R4_5';
$par2['type'] = "Relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "state";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//DIYRuZ_R8_8
$par2['zigbeeModel'] = 'DIYRuZ_R8_8';
$par2['type'] = "Relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_l1";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "state_l1";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_l1";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//DIYRuZ_R8_8
$par2['zigbeeModel'] = 'DIYRuZ_R8_8';
$par2['type'] = "Relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_l2";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "state_l2";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_l2";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//DIYRuZ_R8_8
$par2['zigbeeModel'] = 'DIYRuZ_R8_8';
$par2['type'] = "Relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_l3";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "state_l3";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_l3";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//DIYRuZ_R8_8
$par2['zigbeeModel'] = 'DIYRuZ_R8_8';
$par2['type'] = "Relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_l4";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "state_l4";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_l4";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//DIYRuZ_R8_8
$par2['zigbeeModel'] = 'DIYRuZ_R8_8';
$par2['type'] = "Relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_l5";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "state_l5";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_l5";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//DIYRuZ_R8_8
$par2['zigbeeModel'] = 'DIYRuZ_R8_8';
$par2['type'] = "Relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_l6";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "state_l6";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_l6";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//DIYRuZ_R8_8
$par2['zigbeeModel'] = 'DIYRuZ_R8_8';
$par2['type'] = "Relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;                       
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_l7";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "state_l7";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_l7";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//DIYRuZ_R8_8
$par2['zigbeeModel'] = 'DIYRuZ_R8_8';
$par2['type'] = "Relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_l8";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "state_l8";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_l8";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//DIYRuZ_rspm	
$par2['zigbeeModel'] = 'DIYRuZ_rspm';
$par2['type'] = "DIYRuZ_rspm";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "state";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//BASICZBR3
$par2['zigbeeModel'] = 'BASICZBR3';
$par2['type'] = "BASICZBR3";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "state";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//BASICZBR3
$par2['zigbeeModel'] = 'S31ZB';
$par2['type'] = "S31ZB";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "state";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//WXCJKG13LM

////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//WXCJKG13LM;
$par2['zigbeeModel'] = 'WXCJKG13LM';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "operation_mode";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "operation_mode";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//GDKES-02TZXD
$par2['zigbeeModel'] = 'GDKES-02TZXD';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['value_template'] = "click";
$par2['json_attributes'] = "";
$par2['force_update'] = "true";
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);
////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////



//GDKES-02TZXD
$par2['zigbeeModel'] = 'GDKES-02TZXD';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_left";
//$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_left";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//GDKES-02TZXD;
$par2['zigbeeModel'] = 'GDKES-02TZXD';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_right";
//$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_right";
SQLInsert('zigbee2mqtt_devices_command', $par2);



////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


//TS0001;
$par2['zigbeeModel'] = 'TS0001';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////

 
 ////////////////////////////////////////////////
// _TZ3000_zmy1waw6 (TS011F), _TYZB01_iuepbmpv (TS0121)
$par2['zigbeeModel'] = 'MS-104Z';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);
////////////////////////////////////////////////
 

//TS0012;
$par2['zigbeeModel'] = 'TS0012';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_left";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/left/set";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_left";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//TS0012;
$par2['zigbeeModel'] = 'TS0012';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_right";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/right/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_right";
SQLInsert('zigbee2mqtt_devices_command', $par2);
 
 
///////////////////////////
//TS0121;
$par2['zigbeeModel'] = 'TS0121';
$par2['type'] = "relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//TS0121;
$par2['zigbeeModel'] = 'TS0121';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "Watt";
$par2['value_template'] = "power";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//TS0121;
$par2['zigbeeModel'] = 'TS0121';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//TS0121;
$par2['zigbeeModel'] = 'TS0121';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//TS0121;
$par2['zigbeeModel'] = 'TS0121';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "current";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//TS0121;
$par2['zigbeeModel'] = 'TS0121';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "energy";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);


 
 

/////////////////////
//GDKES-03TZXD;
$par2['zigbeeModel'] = 'GDKES-03TZXD';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_left";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_left";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//GDKES-03TZXD;
$par2['zigbeeModel'] = 'GDKES-03TZXD';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_right";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_right";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//GDKES-03TZXD;
$par2['zigbeeModel'] = 'GDKES-03TZXD';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_center";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_center";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//GDKES-01TZXD;
$par2['zigbeeModel'] = 'GDKES-01TZXD';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//RICI01
$par2['zigbeeModel'] = 'RICI01';
$par2['type'] = "plug";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//X711A;     https://www.zigbee2mqtt.io/devices/X711A.html
$par2['zigbeeModel'] = 'X711A';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//X712A;     https://www.zigbee2mqtt.io/devices/X712A.html
$par2['zigbeeModel'] = 'X712A';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_l1";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/l1/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_l1";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//X712A;     https://www.zigbee2mqtt.io/devices/X712A.html
$par2['zigbeeModel'] = 'X712A';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_l2";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/l2/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_l2";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//X712A     https://www.zigbee2mqtt.io/devices/X703A.html
$par2['zigbeeModel'] = 'X703A';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_l1";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/l1/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_l1";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//X712A  https://www.zigbee2mqtt.io/devices/X703A.html
$par2['zigbeeModel'] = 'X703A';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_l2";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/l2/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_l2";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//X712A  https://www.zigbee2mqtt.io/devices/X703A.html
$par2['zigbeeModel'] = 'X703A';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_l3";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/l3/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_l3";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//DIYRuZ_Flower_WS
$par2['zigbeeModel'] = 'DIYRuZ_Flower_WS';
$par2['type'] = "controller";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "pump_1";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "pump_1";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//DIYRuZ_Flower_WS
$par2['zigbeeModel'] = 'DIYRuZ_Flower_WS';
$par2['type'] = "controller";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "pump_2";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "pump_2";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//DIYRuZ_Flower_WS
$par2['zigbeeModel'] = 'DIYRuZ_Flower_WS';
$par2['type'] = "controller";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "pump_3";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "pump_3";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//DIYRuZ_Flower_WS
$par2['zigbeeModel'] = 'DIYRuZ_Flower_WS';
$par2['type'] = "controller";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "pump_timeout_1";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "pump_timeout_1";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//DIYRuZ_Flower_WS
$par2['zigbeeModel'] = 'DIYRuZ_Flower_WS';
$par2['type'] = "controller";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "pump_timeout_2";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "pump_timeout_2";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//DIYRuZ_Flower_WS
$par2['zigbeeModel'] = 'DIYRuZ_Flower_WS';
$par2['type'] = "controller";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "pump_timeout_3";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "pump_timeout_3";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//BHT-002-GCLZB
$par2['zigbeeModel'] = 'BHT-002-GCLZB';
$par2['type'] = "thermostat";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "LOCK"  ;
$par2['payload_on'] = "UNLOCK"  ;
$par2['value_template'] = "child_lock";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "child_lock";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//BHT-002-GCLZB
$par2['zigbeeModel'] = 'BHT-002-GCLZB';
$par2['type'] = "thermostat";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "current_heating_setpoint";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "current_heating_setpoint";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//BHT-002-GCLZB
$par2['zigbeeModel'] = 'BHT-002-GCLZB';
$par2['type'] = "thermostat";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "heat";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "heat";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//livolo switch (new);
$par2['zigbeeModel'] = 'TI0001-switch';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/left/set" ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state_left";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//livolo socket;
$par2['zigbeeModel'] = 'TI0001-socket';
$par2['type'] = "light";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['brightness'] = "";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/left/set" ;
$par2['payload_on'] = "ON";
$par2['payload_off'] = "OFF";
$par2['value_template'] = "state_left";
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//QBKG25LM
$par2['zigbeeModel'] = 'QBKG25LM';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "heat";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/left/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//QBKG25LM
$par2['zigbeeModel'] = 'QBKG25LM';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "heat";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/center/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//QBKG25LM
$par2['zigbeeModel'] = 'QBKG25LM';
$par2['type'] = "switch";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "heat";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/right/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


////////////////////////////////////////////////
//TuYa TS0121_plug  https://www.zigbee2mqtt.io/devices/TS0121_plug.html
////////////////////////////////////////////////


//TS0121_plug;
$par2['zigbeeModel'] = 'TS0121_plug';
$par2['type'] = "relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//TS0121_plug;
$par2['zigbeeModel'] = 'TS0121_plug';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "Watt";
$par2['value_template'] = "power";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//TS0121_plug;
$par2['zigbeeModel'] = 'TS0121_plug';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "linkquality";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//TS0121_plug;
$par2['zigbeeModel'] = 'TS0121_plug';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "voltage";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//TS0121_plug;
$par2['zigbeeModel'] = 'TS0121_plug';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "current";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//TS0121_plug;
$par2['zigbeeModel'] = 'TS0121_plug';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['unit_of_measurement'] = "";
$par2['value_template'] = "energy";
$par2['json_attributes'] = "" ;
$par2['command_topic'] = "";
$par2['payload_on'] = "";
$par2['payload_off'] = "";
$par2['device_class'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "";
SQLInsert('zigbee2mqtt_devices_command', $par2);



//HS2SK;
$par2['zigbeeModel'] = 'HS2SK';
$par2['type'] = "relay";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//HS2WD-E;
$par2['zigbeeModel'] = 'HS2WD-E';
$par2['type'] = "warning";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "warning";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//HS2WD-E;
$par2['zigbeeModel'] = 'HS2WD-E';
$par2['type'] = "warning";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "mode";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "mode";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//HS2WD-E;
$par2['zigbeeModel'] = 'HS2WD-E';
$par2['type'] = "warning";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "level";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "level";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//HS2WD-E;
$par2['zigbeeModel'] = 'HS2WD-E';
$par2['type'] = "warning";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "duration";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "duration";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//HS2WD-E;
$par2['zigbeeModel'] = 'HS2WD-E';
$par2['type'] = "warning";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "strobe";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "strobe";
SQLInsert('zigbee2mqtt_devices_command', $par2);

//JTYJ-GD-01LM_BW;
$par2['zigbeeModel'] = 'JTYJ-GD-01LM_BW';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "sensitivity";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "sensitivity";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//JTYJ-GD-01LM_BW;
$par2['zigbeeModel'] = 'JTYJ-GD-01LM_BW';
$par2['type'] = "sensor";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "state";
$par2['command_topic'] = ""  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);

/////////////////////////
/////////////////////////
/////////////////////////

//TS0110F
$par2['zigbeeModel'] = 'TS0110F';
$par2['type'] = "dimmer";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_l1";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_l1";
SQLInsert('zigbee2mqtt_devices_command', $par2);


//TS0110F
$par2['zigbeeModel'] = 'TS0110F';
$par2['type'] = "dimmer";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state_l2";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state_l2";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'TS0110F';
$par2['type'] = "dimmer";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "brightness_l1";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "brightness_l1";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness_l1";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'TS0110F';
$par2['type'] = "dimmer";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "brightness_l2";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "brightness_l2";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness_l2";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'TS0110F';
$par2['type'] = "dimmer";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "transition_l1";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "transition_l1";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "transition_l1";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'TS0110F';
$par2['type'] = "dimmer";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "transition_l2";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "transition_l2";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "transition_l2";
SQLInsert('zigbee2mqtt_devices_command', $par2);

/////////////////////////
/////////////////////////
/////////////////////////

//TS110F
$par2['zigbeeModel'] = 'TS110F';
$par2['type'] = "dimmer";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = "OFF"  ;
$par2['payload_on'] = "ON"  ;
$par2['value_template'] = "state";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set"  ;
$par2['json_attributes'] = "";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "state";
SQLInsert('zigbee2mqtt_devices_command', $par2);



$par2['zigbeeModel'] = 'TS110F';
$par2['type'] = "dimmer";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "brightness";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "brightness";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "brightness";
SQLInsert('zigbee2mqtt_devices_command', $par2);

$par2['zigbeeModel'] = 'TS110F';
$par2['type'] = "dimmer";
$par2['state_topic'] =  "<Z2M_PATH>/<FRIENDLY_NAME>";
$par2['availability_topic'] = "<Z2M_PATH>/bridge/state";
$par2['payload_off'] = ""  ;
$par2['payload_on'] = ""  ;
$par2['value_template'] = "transition";
$par2['command_topic'] = "<Z2M_PATH>/<FRIENDLY_NAME>/set";
$par2['json_attributes'] = "transition";
$par2['device_class'] = "";
$par2['unit_of_measurement'] = "";
$par2['brightness'] = "";
$par2['color_temp'] = "";
$par2['xy'] = "";
$par2['command_value'] = "transition";
SQLInsert('zigbee2mqtt_devices_command', $par2);


}






