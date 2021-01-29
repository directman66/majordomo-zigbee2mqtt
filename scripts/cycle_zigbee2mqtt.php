<?php
chdir(dirname(__FILE__) . '/../');

include_once("./config.php");
include_once("./lib/loader.php");
include_once("./lib/threads.php");

set_time_limit(0);

// connecting to database
$db = new mysql(DB_HOST, '', DB_USER, DB_PASSWORD, DB_NAME);

include_once("./load_settings.php");
include_once(DIR_MODULES . "control_modules/control_modules.class.php");

set_time_limit(0);

include_once(ROOT . "3rdparty/phpmqtt/phpMQTT.php");
include_once(DIR_MODULES . "zigbee2mqtt/zigbee2mqtt.class.php");

$zigbee2mqtt = new zigbee2mqtt();

//$mqtt->prepareQueueTable();
$zigbee2mqtt->getConfig();

if ($zigbee2mqtt->config['MQTT_CLIENT']) {
    $client_name = $zigbee2mqtt->config['MQTT_CLIENT'];
} else {
    $client_name = "MajorDoMo MQTT Cycle";
}
$client_name = $client_name . ' (#' . uniqid() . ')';

if ($zigbee2mqtt->config['MQTT_AUTH']) {
    $username = $zigbee2mqtt->config['MQTT_USERNAME'];
    $password = $zigbee2mqtt->config['MQTT_PASSWORD'];
}

$host = 'localhost';

if ($zigbee2mqtt->config['MQTT_HOST']) {
    $host = $zigbee2mqtt->config['MQTT_HOST'];
}

if ($zigbee2mqtt->config['MQTT_PORT']) {
    $port = $zigbee2mqtt->config['MQTT_PORT'];
} else {
    $port = 1883;
}

if ($zigbee2mqtt->config['MQTT_QUERY']) {
    $query = $zigbee2mqtt->config['MQTT_QUERY'];
} else {
    $query = '/var/now/#';
}

$zigbee2mqtt_client = new Bluerhinos\phpMQTT($host, $port, $client_name);

if ($zigbee2mqtt->config['MQTT_AUTH']) {
    if (!$zigbee2mqtt_client->connect(true, NULL, $username, $password)) {
        exit(1);
    }
} else {
    if (!$zigbee2mqtt_client->connect()) {
        exit(1);
    }
}

$query_list = explode(',', $query);
$total = count($query_list);
echo date('H:i:s') . " Topics to watch: $query (Total: $total)\n";
for ($i = 0; $i < $total; $i++) {
    $path = trim($query_list[$i]);
    echo date('H:i:s') . " Path: $path\n";
    $topics[$path] = array("qos" => 0, "function" => "procmsg");
}
foreach ($topics as $k => $v) {
    echo date('H:i:s') . " Subscribing to: $k  \n";
    $rec = array($k => $v);
    $zigbee2mqtt_client->subscribe($rec, 0);
}
$previousMillis = 0;
$cycleVarName='ThisComputer.'.str_replace('.php', '', basename(__FILE__)).'Run';

while ($zigbee2mqtt_client->proc()) {

    /*
    $tmp=SQLSelect("SELECT * FROM mqtt_queue ORDER BY ID");
    if ($tmp[0]['ID']) {
     $total=count($tmp);
     for($i=0;$i<$total;$i++) {
      SQLExec('DELETE FROM mqtt_queue WHERE ID='.$tmp[$i]['ID']);
      $mqtt_client->publish($tmp[$i]['PATH'],$tmp[$i]['VALUE']);
     }
    }
    */

    $currentMillis = round(microtime(true) * 10000);

    if ($currentMillis - $previousMillis > 10000) {
        $previousMillis = $currentMillis;

        //setGlobal((str_replace('.php', '', basename(__FILE__))) . 'Run', time(), 1);
        if ($latest_check_cycle + 30 < time())
           {
       $latest_check_cycle = time();
       setGlobal((str_replace('.php', '', basename(__FILE__))) . 'Run', time(), 1);
           }

        if (file_exists('./reboot') || IsSet($_GET['onetime'])) {
            $zigbee2mqtt_client->close();
            $db->Disconnect();
            exit;
        }
    }
}

$zigbee2mqtt_client->close();

/**
 * Process message
 * @param mixed $topic Topic
 * @param mixed $msg Message
 * @return void
 */
function procmsg($topic, $msg) {
    //$url = BASE_URL . '/ajax/mqtt.html?op=process&topic='.urlencode($topic)."&msg=".urlencode($msg);
    //getURLBackground($url);

debmes($topic.":".$msg, 'z2m');

    if (!isset($topic) || !isset($msg)) return false;

    echo date("Y-m-d H:i:s") . " Topic:{$topic} $msg\n";
    if (function_exists('callAPI')) {
//        callAPI('/api/module/zigbee2mqtt','GET',array('topic'=>$topic,'msg'=>$msg));
      callAPI('/api/module/zigbee2mqtt','POST',array('topic'=>$topic,'msg'=>$msg));
    } else {
        global $zigbee2mqtt;
        $zigbee2mqtt->processMessage($topic, $msg);
    }
}

$db->Disconnect(); // closing database connection
