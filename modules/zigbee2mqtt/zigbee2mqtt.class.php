<?php
/**
* MQTT 
*
* Mqtt
*
* @package project
* @author Serge J. <jey@tut.by>
* @copyright http://www.atmatic.eu/ (c)
* @version 0.1 (wizard, 13:07:08 [Jul 19, 2013])
*/
//
//
ini_set ('display_errors', 'off');

class zigbee2mqtt extends module {
/**
* mqtt
*
* Module class constructor
*
* @access private
*/
function zigbee2mqtt() {
  $this->name="zigbee2mqtt";
  $this->title="zigbee2mqtt";
  $this->module_category="<#LANG_SECTION_DEVICES#>";
  $this->checkInstalled();
}
/**
* saveParams
*
* Saving module parameters
*
* @access public
*/
function saveParams($data=0) {
 $p=array();
 if (IsSet($this->id)) {
  $p["id"]=$this->id;
 }
 if (IsSet($this->view_mode)) {
  $p["view_mode"]=$this->view_mode;
 }
 if (IsSet($this->edit_mode)) {
  $p["edit_mode"]=$this->edit_mode;
 }
 if (IsSet($this->tab)) {
  $p["tab"]=$this->tab;
 }
 return parent::saveParams($p);
}
/**
* getParams
*
* Getting module parameters from query string
*
* @access public
*/
function getParams() {
  global $id;
  global $ieee;

  global $mode;
  global $view_mode;
  global $edit_mode;
  global $tab;
  global $viz;
  if (isset($id)) {
   $this->id=$id;
  }

  if (isset($ieee)) {
   $this->ieee=$ieee;
  }

  if (isset($mode)) {
   $this->mode=$mode;
  }
  if (isset($view_mode)) {
   $this->view_mode=$view_mode;
  }
  if (isset($edit_mode)) {
   $this->edit_mode=$edit_mode;
  }
  if (isset($tab)) {
   $this->tab=$tab;
  }

  if (isset($viz)) {
   $this->viz=$viz;
  }

}
/**
* Run
*
* Description
*
* @access public
*/
function run() {
 global $session;

define("ZMQTT_DEBUG", "1");

  $out=array();
  if ($this->action=='admin') {

//print_r ($_GET);

   $this->admin($out);



  } else {
   $this->usual($out);
  }
  if (IsSet($this->owner->action)) {
   $out['PARENT_ACTION']=$this->owner->action;
  }
  if (IsSet($this->owner->name)) {
   $out['PARENT_NAME']=$this->owner->name;
  }
  $out['VIEW_MODE']=$this->view_mode;
  $out['EDIT_MODE']=$this->edit_mode;
  $out['MODE']=$this->mode;
  $out['ACTION']=$this->action;
  $out['TAB']=$this->tab;
  $out['VIZ']=$this->viz;
  if (IsSet($this->location_id)) {
   $out['IS_SET_LOCATION_ID']=1;
  }
  if ($this->single_rec) {
   $out['SINGLE_REC']=1;
  }
  $this->data=$out;
  $p=new parser(DIR_TEMPLATES.$this->name."/".$this->name.".html", $this->data, $this);
  $this->result=$p->result;
}

  function prepareQueueTable() {
   //SQLExec ("DROP TABLE IF EXISTS `mqtt_queue`;");
   $sqlQuery = "CREATE TABLE IF NOT EXISTS `zigbee2mqtt_queue`
               (`ID`  int(10) unsigned NOT NULL auto_increment,
                `PATH` varchar(255) NOT NULL,
                `VALUE` varchar(255) NOT NULL,
                 PRIMARY KEY (`ID`)
               ) ENGINE = MEMORY DEFAULT CHARSET=utf8;";
    SQLExec ( $sqlQuery );   
  }

    function pathToTree($array){
        $tree = array();
        foreach($array AS $item) {
            $pathIds = explode("/", ltrim($item["PATH"], "/") .'/'. $item["ID"]);
            $current = &$tree;
            $cp='';
            foreach($pathIds AS $id) {
                if(!isset($current["CHILDS"][$id])) {
                    $current["CHILDS"][$id] = array('CP'=>$cp);
                }
                $current = &$current["CHILDS"][$id];
                if($id == $item["ID"]) {
                    $current = $item;
                }
            }
        }
        return ($this->childsToArray($tree['CHILDS']));
    }

    function childsToArray($items,$prev_path='') {
        $res=array();
        foreach($items as $k=>$v) {  
            if (!$v['PATH']) {
                $v['TITLE']=$k.' '.$v['CP'];
                $pp = $k; 
            }
            else {
                $v['TITLE'] = '';
                $pp = '';
            }
            if (isset($v['CHILDS'])) {
                $items=$this->childsToArray($v['CHILDS'],$prev_path!='' ? $prev_path.'/'.$pp : $pp);
                if (count($items)==1) {
                    $v=$items[0];     
                    $v['TITLE'] = $pp.($v['TITLE']!='' ? '/'.$v['TITLE'] : '');
                } else {
                    $v['RESULT']=$items;
                }
                unset($v['CHILDS']);
            }
            $res[]=$v;
        }
        return $res;
    }

/**
* Title
*
* Description
*
* @access public
*/
 function setProperty($id, $value, $set_linked=0) {
// debmes('Нужно изменить значение id='.$id.' на '.$value, 'zigbee2mqtt_setproperty');

//debmes("SELECT * FROM zigbee2mqtt WHERE ID='".$id."'", 'zigbee2mqtt_setproperty');
  $rec=SQLSelectOne("SELECT * FROM zigbee2mqtt WHERE ID='".$id."'");

//$rec2=SQLSelectOne('select * from zigbee2mqtt where dev_id='.$rec['DEV_ID'].' and metrika="state"');


// debmes('Нужно изменить значение id='.$id.' на '.$value .' для устройства DEV_ID='.$rec['DEV_ID']. '('.$rec2['TITLE'].')', 'zigbee2mqtt_setproperty');


  if ($rec['ID'] && $rec['METRIKA']=='rgbcolor') {
$rec2=SQLSelectOne('select * from zigbee2mqtt where dev_id='.$rec['DEV_ID'].' and metrika="state"');
$mqttsendpath=$rec2['PATH_WRITE'];
//if ($value='000000' ) {$br=0;} else {$br=255; }
$br=255; 
if ($value=='000000' ) {
//$st='OFF';
$mqttsendvalue='{"state": "OFF"}';
} else {$mqttsendvalue='{"state": "'.$st.'",  "brightness": '.$br.',  "color": {"hex": "#'.$value.'"}}';}
//debmes("публикую ".$mqttsendpath.' '.$mqttsendvalue, 'zigbee2mqtt_setproperty');
  $this->sendcommand($mqttsendpath, $mqttsendvalue);
}
  if (!$rec['ID'] || !$rec['PATH']) {
//debmes('Не хватает данных', 'zigbee2mqtt_setproperty');
   return 0;
  }


     if ($rec['REPLACE_LIST']!='') {
         $list=explode(',',$rec['REPLACE_LIST']);
         foreach($list as $pair) {
             $pair=trim($pair);
             list($new,$old)=explode('=',$pair);
             if ($value==$old) {
                 $value=$new;
                 break;
             }
         }
     }
  //if ($new_connection) {

//  include_once("./lib/mqtt/phpMQTT.php");
  include_once(ROOT . "3rdparty/phpmqtt/phpMQTT.php");

   $this->getConfig();
   if ($mqtt->config['MQTT_CLIENT']) {
    $client_name=$mqtt->config['MQTT_CLIENT'];
   } else {
    $client_name="MajorDoMo MQTT";
   }


   if ($mqtt->config['MQTT_DEBUG']) {
    $debug=$mqtt->config['MQTT_DEBUG'];
   } else {
    $debug="0";
   }




   if ($this->config['MQTT_AUTH']) {
    $username=$this->config['MQTT_USERNAME'];
    $password=$this->config['MQTT_PASSWORD'];
   }
   if ($this->config['MQTT_HOST']) {
    $host=$this->config['MQTT_HOST'];
   } else {
    $host='127.0.0.1';
   }
   if ($this->config['MQTT_PORT']) {
    $port=$this->config['MQTT_PORT'];
   } else {
    $port=1883;
   }


   if ($this->config['Z2M_HIST']) {
    $hist=$this->config['Z2M_HIST'];
   } else {
    $hist=30;
   }



//    $loglevel=$this->config['Z2M_LOGMODE'];
    $loglevel='deb';

//   if ($this->config['Z2M_LOGMODE']) {
//    $loglevel=$this->config['Z2M_LOGMODE'];
//   } else {
//    $leglevel='debug';
//   }


//      $mqtt_client = new phpMQTT($host, $port, $client_name.' Client');
        $mqtt_client = new Bluerhinos\phpMQTT($host, $port, $client_name . ' Client');

   if(!$mqtt_client->connect(true, NULL,$username,$password))
   {
debmes('Ошибка подключения к mqtt', 'zigbee2mqtt');
    return 0;
   }

/*
if ($rec['CONVERTONOFF']=='1') {
if ($value=='1')  $json=array( $rec['METRIKA']=> 'ON');
if ($value=='0')  $json=array( $rec['METRIKA']=> 'OFF');
$jsonvalue=json_encode($json) ;

**/


if (($rec['PAYLOAD_ON'])||$rec['PAYLOAD_OFF']) {
//debmes('Подменяем '.$value. " на ". $rec['PAYLOAD_ON']."/".$rec['PAYLOAD_OFF'], 'zigbee2mqtt');

//if (($rec['PAYLOAD_ON'])&& ($value=="1"))  $json=array( $rec['METRIKA']=> $rec['PAYLOAD_ON']);
//if (($rec['PAYLOAD_OFF'])&& ($value=="0"))  $json=array( $rec['METRIKA']=> $rec['PAYLOAD_OFF']);

if  ($value=="1") {$json=array( $rec['COMMAND_VALUE']=> $rec['PAYLOAD_ON']); SQLExec('update zigbee2mqtt_devices set state="1" where ID="'.$rec['DEV_ID'].'"');}
if ($value=="0")  {$json=array( $rec['COMMAND_VALUE']=> $rec['PAYLOAD_OFF']); SQLExec('update zigbee2mqtt_devices set state="0" where ID="'.$rec['DEV_ID'].'"');}
$jsonvalue=json_encode($json) ;

//if (ZMQTT_DEBUG=="1" ) debmes('Заменили  '.$value. "  на ". $jsonvalue, 'zigbee2mqtt');


} else 
{
$json=array( $rec['COMMAND_VALUE']=> $value);
$jsonvalue=json_encode($json) ;
}
//if (ZMQTT_DEBUG=="1" ) debmes('Публикую zigbee2mqqtt '.$rec['PATH_WRITE'].":".$jsonvalue, 'zigbee2mqtt');


   if ($rec['PATH_WRITE']) {

   $mqtt_client->publish($rec['PATH_WRITE'],$jsonvalue, (int)$rec['QOS'], (int)$rec['RETAIN']);
       
   }

// else {    $mqtt_client->publish($rec['PATH']."/",$jsonvalue, (int)$rec['QOS'], (int)$rec['RETAIN']);   }
   $mqtt_client->close();

  /*
  } else {

   $this->prepareQueueTable();
   $data=array();
   $data['PATH']=$rec['PATH'];
   $data['VALUE']=$value;
   SQLInsert('mqtt_queue', $data);

  }
  */

  $rec['VALUE']=$value.'';
  $rec['UPDATED']=date('Y-m-d H:i:s');
  SQLUpdate('zigbee2mqtt', $rec);


  if ($set_linked && $rec['LINKED_OBJECT'] && $rec['LINKED_PROPERTY']) {
$oldvalue=getGlobal($rec['LINKED_OBJECT'].'.'.$rec['LINKED_PROPERTY']);

if ($value<>$oldvalue)    setGlobal($rec['LINKED_OBJECT'].'.'.$rec['LINKED_PROPERTY'], $value, array($this->name=>'0'));
  }

 }


 function setPropertyfn($fn,$command,  $value, $set_linked=0) {

//debmes($fn, 'zz2mm');
//debmes($command, 'zz2mm');
//debmes($value, 'zz2mm');
        include_once(ROOT . "3rdparty/phpmqtt/phpMQTT.php");

   $this->getConfig();
   if ($mqtt->config['MQTT_CLIENT']) {
    $client_name=$mqtt->config['MQTT_CLIENT'];
   } else {
    $client_name="MajorDoMo MQTT";
   }



   if ($mqtt->config['MQTT_DEBUG']) {
    $debug=$mqtt->config['MQTT_DEBUG'];
   } else {
    $debug="0";
   }





   if ($this->config['MQTT_AUTH']) {
    $username=$this->config['MQTT_USERNAME'];
    $password=$this->config['MQTT_PASSWORD'];
   }
   if ($this->config['MQTT_HOST']) {
    $host=$this->config['MQTT_HOST'];
   } else {
    $host='localhost';
   }
   if ($this->config['MQTT_PORT']) {
    $port=$this->config['MQTT_PORT'];
   } else {
    $port=1883;
   }

   if ($this->config['Z2M_LOGMODE']) {
    $loglevel=$this->config['Z2M_LOGMODE'];
   } else {
    $loglewel='debug';
   }


   if ($this->config['Z2M_HIST']) {
    $hist=$this->config['Z2M_HIST'];
   } else {
    $hist=30;
   }



//   $mqtt_client = new phpMQTT($host, $port, $client_name.' Client');
   $mqtt_client = new Bluerhinos\phpMQTT($host, $port, $client_name . ' Client');

   if(!$mqtt_client->connect(true, NULL,$username,$password))
   {
//if (ZMQTT_DEBUG=="1" ) debmes('Ошибка подключения к mqtt', 'zigbee2mqtt');
    return 0;
   }

if ($this->isJSON22($value)) 	{
				$jsonvalue=$value;
				} 

				else 
				{
				$json=array( $command=> $value);
				$jsonvalue=json_encode($json) ;
				}

if ($jsonvalue!='null') { 
//if (ZMQTT_DEBUG=="1" ) debmes('Публикую zigbee2mqqtt '.$rec[$i]['PATH_WRITE'].":".$jsonvalue, 'zigbee2mqtt1');

//debmes('publish', 'zz2mm');
//debmes($fn, 'zz2mm');
//debmes($jsonvalue, 'zz2mm');
$mqtt_client->publish($fn,$jsonvalue, (int)$rec[$i]['QOS'], (int)$rec[$i]['RETAIN']);
      
   }

   $mqtt_client->close();




}


 function setPropertyDevice($id, $value, $set_linked=0) {
//if (ZMQTT_DEBUG=="1" ) debmes('Нужно изменить значение id='.$id.' на '.$value, 'zigbee2mqtt');

$sql="SELECT * FROM zigbee2mqtt WHERE DEV_ID='".$id."' and length(PATH_WRITE)>2";

//if (ZMQTT_DEBUG=="1" ) debmes($sql, 'zigbee2mqtt');
//  $rec=SQLSelectOne("SELECT * FROM zigbee2mqtt WHERE DEV_ID='".$id."' and PATH_WRITE is not null");
  $rec=SQLSelect($sql);
$cnt=count($rec);

//if (ZMQTT_DEBUG=="1" ) debmes("Найдено $cnt свойств, которые можно изменить", 'zigbee2mqtt');
//if (ZMQTT_DEBUG=="1" ) debmes($rec,'zigbee2mqtt');
  for($i=0;$i<$cnt;$i++) {

  if ($rec[$i]['ID'] || $rec[$i]['PATH_WRITE']) {
//if (ZMQTT_DEBUG=="1" ) debmes('Не хватает данных, устройство '.$rec['ID'].' или путь управления '.$rec['PATH'].' не найдены', 'zigbee2mqtt');
//   return 0;




//if (ZMQTT_DEBUG=="1" ) debmes('Данных  хватает, параметр '.$rec[$i]['ID'].' путь управления '.$rec[$i]['PATH'], 'zigbee2mqtt');

//if (ZMQTT_DEBUG=="1" ) debmes('Поехали дальше', 'zigbee2mqtt');


     if ($rec[$i]['REPLACE_LIST']!='') {
         $list=explode(',',$rec[$i]['REPLACE_LIST']);
         foreach($list as $pair) {
             $pair=trim($pair);
             list($new,$old)=explode('=',$pair);
             if ($value==$old) {
                 $value=$new;
                 break;
             }
         }
     }
  //if ($new_connection) {

//  include_once("./lib/mqtt/phpMQTT.php");
        include_once(ROOT . "3rdparty/phpmqtt/phpMQTT.php");

   $this->getConfig();
   if ($mqtt->config['MQTT_CLIENT']) {
    $client_name=$mqtt->config['MQTT_CLIENT'];
   } else {
    $client_name="MajorDoMo MQTT";
   }



   if ($mqtt->config['MQTT_DEBUG']) {
    $debug=$mqtt->config['MQTT_DEBUG'];
   } else {
    $debug="0";
   }





   if ($this->config['MQTT_AUTH']) {
    $username=$this->config['MQTT_USERNAME'];
    $password=$this->config['MQTT_PASSWORD'];
   }
   if ($this->config['MQTT_HOST']) {
    $host=$this->config['MQTT_HOST'];
   } else {
    $host='localhost';
   }
   if ($this->config['MQTT_PORT']) {
    $port=$this->config['MQTT_PORT'];
   } else {
    $port=1883;
   }

   if ($this->config['Z2M_LOGMODE']) {
    $loglevel=$this->config['Z2M_LOGMODE'];
   } else {
    $loglewel='debug';
   }


   if ($this->config['Z2M_HIST']) {
    $hist=$this->config['Z2M_HIST'];
   } else {
    $hist=30;
   }



//   $mqtt_client = new phpMQTT($host, $port, $client_name.' Client');
   $mqtt_client = new Bluerhinos\phpMQTT($host, $port, $client_name . ' Client');

   if(!$mqtt_client->connect(true, NULL,$username,$password))
   {
//if (ZMQTT_DEBUG=="1" ) debmes('Ошибка подключения к mqtt', 'zigbee2mqtt');
    return 0;
   }

/*
if ($rec['CONVERTONOFF']=='1') {
if ($value=='1')  $json=array( $rec['METRIKA']=> 'ON');
if ($value=='0')  $json=array( $rec['METRIKA']=> 'OFF');
$jsonvalue=json_encode($json) ;

**/

if (strpos($value,'vice')>0) {
$json=null;

//if (ZMQTT_DEBUG=="1" ) debmes('Требуется включить или выключить устройство', 'zigbee2mqtt1');
//if (ZMQTT_DEBUG=="1" ) debmes($value.' $rec[$i][METRIKA]='.$rec[$i]['METRIKA']. ' PATH_WRITE='.$rec[$i]['PATH_WRITE'].' strpos='.strpos($rec[$i]['PATH_WRITE'],'right'), 'zigbee2mqtt');

/*
if  (($value=="device_togle")&&(strpos($rec[$i]['METRIKA'],"tate")>0))  {

$cstate=SQLSelectOne('select * from zigbee2mqtt_devices where ID='.$rec[$i]['METRIKA'])['STATE'];

if ($cstate=="1") { $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_ON']); }
else 
{$json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_OFF']);  }

}

*/

if  (($value=="device_on_single")&&(strpos($rec[$i]['METRIKA'],"tate")>0)) $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_ON']);
if (($value=="device_off_single")&&(strpos($rec[$i]['METRIKA'],"tate")>0))  $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_OFF']);


if  (($value=="device_on_l1")&&(strpos($rec[$i]['METRIKA'],"tate")>0)&&(strpos($rec[$i]['PATH_WRITE'],'l1')>0)) $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_ON']);
if (($value=="device_off_l1")&&(strpos($rec[$i]['METRIKA'],"tate")>0)&&(strpos($rec[$i]['PATH_WRITE'],'l1')>0))  $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_OFF']);

if  (($value=="device_on_l2")&&(strpos($rec[$i]['METRIKA'],"tate")>0)&&(strpos($rec[$i]['PATH_WRITE'],'l2')>0)) $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_ON']);
if (($value=="device_off_l2")&&(strpos($rec[$i]['METRIKA'],"tate")>0)&&(strpos($rec[$i]['PATH_WRITE'],'l2')>0))  $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_OFF']);

if  (($value=="device_on_l3")&&(strpos($rec[$i]['METRIKA'],"tate")>0)&&(strpos($rec[$i]['PATH_WRITE'],'l3')>0)) $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_ON']);
if (($value=="device_off_l3")&&(strpos($rec[$i]['METRIKA'],"tate")>0)&&(strpos($rec[$i]['PATH_WRITE'],'l3')>0))  $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_OFF']);


if  (($value=="device_on_l4")&&(strpos($rec[$i]['METRIKA'],"tate")>0)&&(strpos($rec[$i]['PATH_WRITE'],'l4')>0)) $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_ON']);
if (($value=="device_off_l4")&&(strpos($rec[$i]['METRIKA'],"tate")>0)&&(strpos($rec[$i]['PATH_WRITE'],'l4')>0))  $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_OFF']);




if  (($value=="device_on_left")&&(strpos($rec[$i]['METRIKA'],"tate")>0)&&(strpos($rec[$i]['PATH_WRITE'],'left')>0)) $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_ON']);
if (($value=="device_off_left")&&(strpos($rec[$i]['METRIKA'],"tate")>0)&&(strpos($rec[$i]['PATH_WRITE'],'left')>0))  $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_OFF']);



if (($value=="device_open")&&(strpos($rec[$i]['METRIKA'],"tate")>0)&&(strpos($rec[$i]['PATH_WRITE'],'state')>0)) $json=array( 'state'=> 'open');
if (($value=="device_stop")&&(strpos($rec[$i]['METRIKA'],"tate")>0)&&(strpos($rec[$i]['PATH_WRITE'],'state')>0))  $json=array( 'state'=> 'stop');
if (($value=="device_close")&&(strpos($rec[$i]['METRIKA'],"tate")>0)&&(strpos($rec[$i]['PATH_WRITE'],'state')>0))  $json=array('state'=> 'close');





if  (($value=="device_on_right")&&(strpos($rec[$i]['METRIKA'],"tate")>0) &&(strpos($rec[$i]['PATH_WRITE'],'right')>0)) $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_ON']);
if (($value=="device_off_right")&&(strpos($rec[$i]['METRIKA'],"tate")>0) &&(strpos($rec[$i]['PATH_WRITE'],'right')>0)) $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_OFF']);
} else {

if (($rec[$i]['PAYLOAD_ON'])||$rec[$i]['PAYLOAD_OFF']) {
///if (ZMQTT_DEBUG=="1" ) debmes('Подменяем '.$value. " на ". $rec[$i]['PAYLOAD_ON']."/".$rec[$i]['PAYLOAD_OFF'], 'zigbee2mqtt1');

//if (($rec['PAYLOAD_ON'])&& ($value=="1"))  $json=array( $rec['METRIKA']=> $rec['PAYLOAD_ON']);
//if (($rec['PAYLOAD_OFF'])&& ($value=="0"))  $json=array( $rec['METRIKA']=> $rec['PAYLOAD_OFF']);

if  ($value=="1") {$json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_ON']); SQLExec('update zigbee2mqtt_devices set state="1" where ID="'.$rec['DEV_ID'].'"');}
if  ($value=="0") { $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_OFF']); SQLExec('update zigbee2mqtt_devices set state="0" where ID="'.$rec['DEV_ID'].'"');}
//if (ZMQTT_DEBUG=="1" ) debmes('Заменили  '.$value. "  на ". $jsonvalue, 'zigbee2mqtt1');
}

else 
{
$json=array( $rec[$i]['COMMAND_VALUE']=> $value);
}
}
$jsonvalue=json_encode($json) ;
if ($jsonvalue!='null') { 
//if (ZMQTT_DEBUG=="1" ) debmes('Публикую zigbee2mqqtt '.$rec[$i]['PATH_WRITE'].":".$jsonvalue, 'zigbee2mqtt1');
   if ($rec[$i]['PATH_WRITE']) {

   $mqtt_client->publish($rec[$i]['PATH_WRITE'],$jsonvalue, (int)$rec[$i]['QOS'], (int)$rec[$i]['RETAIN']);
       
   }} else 

//if (ZMQTT_DEBUG=="1" ) debmes('Публиковать не требуется  '.$rec[$i]['PATH_WRITE'].":".$jsonvalue, 'zigbee2mqtt1');

// else {    $mqtt_client->publish($rec['PATH']."/",$jsonvalue, (int)$rec['QOS'], (int)$rec['RETAIN']);   }
   $mqtt_client->close();

  /*
  } else {

   $this->prepareQueueTable();
   $data=array();
   $data['PATH']=$rec['PATH'];
   $data['VALUE']=$value;
   SQLInsert('mqtt_queue', $data);

  }
  */

  $rec[$i]['VALUE']=$value.'';
  $rec[$i]['UPDATED']=date('Y-m-d H:i:s');
  SQLUpdate('zigbee2mqtt', $rec[$i]);


//  if ($set_linked && $rec['LINKED_OBJECT'] && $rec['LINKED_PROPERTY']) {
//   setGlobal($rec['LINKED_OBJECT'].'.'.$rec['LINKED_PROPERTY'], $value, array($this->name=>'0'));
//  }
 }
 } 
//else if (ZMQTT_DEBUG=="1" ) debmes('Не хватает данных, устройство '.$rec['ID'].' или путь управления '.$rec['PATH'].' не найдены', 'zigbee2mqtt');

// $this->redirect("?tab=");

  }



/**
* Title
*
* Description
*
* @access public
*/


function processSubscription($event_name, $details='') {
  if ($event_name=='HOURLY') {



  $this->clearloghourly();
  }
 }	


    function clearloghourly() {


   $this->getConfig();
   if ($this->config['Z2M_HIST']) {
    $hist=$this->config['Z2M_HIST'];
   } else {
    $hist=30;
   }

sqlexec('delete from zigbee2mqtt_log where  FIND<(CURDATE()- INTERVAL '.$hist.' DAY)');

}


    function api($params) {

// debmes('Сработал api  ','zigbee2mqtt');
// debmes($params,'zigbee2mqtt_api');
// debmes($_REQUEST,'zigbee2mqtt_api');

        if ($_REQUEST['topic']) {
            $this->processMessage($_REQUEST['topic'], $_REQUEST['msg']);
        }
    }


 function processMessage($path, $value) {




// debmes('Сработал processMessage :'.$path." value:". $value.' strpos:'. strpos($path,"set"),'zigbee2mqtt');
// debmes('Сработал processMessage :'.$path." value:". $value.' strpos:'. strpos($path,"set"),'zigbee2mqtt2');
//if (ZMQTT_DEBUG=="1" ) debmes('Сработал processMessage :'.$path." value:". $value,'zigbee2mqtt');

   if (preg_match('/\#$/', $path)) {
    return 0;
   }

   if (preg_match('/^{/',$value)) {

// debmes('Полученное сообщение содержит json:'.$value ,'zigbee2mqtt2');
       $ar=json_decode($value,true);
       ksort($ar);
//       debmes($ar,'zigbee2mqtt2');
//       arsort($ar);
//       debmes($ar,'zigbee2mqtt2');
       foreach($ar as $k=>$v) {
if (!$v) {$v="0"; }

//debmes('$k:'.$k.'    $v:'.$v, 'zigbee2mqtt');
           if (is_array($v))
           $v = json_encode($v);
  	   //debmes('jsondecode($v):'.$v, 'zigbee2mqtt');


   if (preg_match('/^{/',$v)) {
       $arr=json_decode($v,true);
       ksort($arr);
//       debmes($arr,'zigbee2mqtt2');
       foreach($arr as $kk=>$vv) {
           if (is_array($vv))   $vv = json_encode($vv);
           if (!$vv) {$vv="0"; }
//       	   debmes('Передаем $vv в processMessage2 '.$vv.' в '. $path.'/'.$kk,'zigbee2mqtt2');
           $this->processMessage2($path.'/'.$kk,$vv);
}}




//    	  debmes('Передаем $v в processMessage2 '.$v.' в '. $path.'/'.$k,'zigbee2mqtt2');
          $this->processMessage2($path.'/'.$k,$v);
           }
           } 

//else 
//оставить, если нужно сохранять основную метрику, например 
	   $this->processMessage2($path,$value);

}




 function processMessage2($path, $value) {

//debmes('Получено  в processMessage2 '.$path. 'value '.$value,'zigbee2mqtt2');

unset($msgtype);

$this->getConfig();
//$zz=substr(explode('/',$this->config['MQTT_QUERY'])[0],1);

$gw=explode('/',$path)[0];


if (strpos($path,'/bridge/state')>0) {$msgtype='bridge_state';}
else if (strpos($path,'/bridge/config')>0) {$msgtype='bridge_config';}
else if (strpos($path,'/bridge/networkmap/raw')>0) {$msgtype='raw_map';}
else if (strpos($path,'/bridge/networkmap')>0) {$msgtype='graphwiz';}
else if (strpos($path,'/bridge/networkmap/raw/nodes')>0) {$msgtype='rawnodes';}
else if (strpos($path,'/bridge/log')>0) {$msgtype='log';}
else {$msgtype='device_state';}



//if ($path=='zigbee2mqtt/bridge/log') {$msgtype=$json->{'type'};}



//if (($path=='zigbee2mqtt/bridge/log')||($msgtype))             	
//if ($msgtype)
//if ($path=='zigbee2mqtt/bridge/state')

//debmes('zz:'.$zz, 'zzz222');
//debmes($path, 'zzz222');
//debmes('$msgtype: '.$msgtype, 'zzz222');
//debmes($value, 'zzz222');
if ($msgtype=='rawnodes') {$this->parse_rawnodes($json, $gw);}


if (($msgtype)&&($this->isJSON22($value))
||$path=='/bridge/log'
||$path=='/bridge/config'
||$path=='/bridge/networkmap'
||$path=='/bridge/networkmap/raw'
||$path=='/bridge/networkmap/graphviz'
)
{
$json=json_decode($value);
$msgtype=$json->{'type'};
//debmes('Пришло важное сообщение, поместим его в журнал :'.$path." value:". $value." type:".$json->{'type'},'zigbee2mqtt');
//список исключений, по которым лог не храним
	$arr2=sqlselect('select IEEEADDR from  zigbee2mqtt_devices  where HISTORY="0"');
	$cntt=count($arr2);
	for($i=0;$i<$cntt;$i++) {
	$arr3[]= $arr2[$i]['IEEEADDR'];
        	                   }

//        debmes($arr3, 'zm2');

	//$need = array_search(explode('/',$path)[1], $arr2); 
	if (is_array(explode('/',$path)[1]))	
	{$need = in_array(explode('/',$path)[1], $arr3); }
        //debmes($path, 'zm2');
	//debmes(explode('/',$path)[1], 'zm2');
	//debmes('need '.$need, 'zm2');
	//if (!$need) {debmes('no need '.$need, 'zm2'); } 
	//else {debmes('need '.$need, 'zm2'); } 


   $this->getConfig();
      $hist=$this->config['Z2M_HIST'];
    



if ((!$need)&&($hist)&&($hist<>"0")) {
//{"type":"groups","message":{"1":{"friendly_name":"232323"},"2":{"friendly_name":"group1"},"3":{"friendly_name":"group1"},"4":{"friendly_name":"group1"}}}
$arr=sqlselectone('select * from  zigbee2mqtt_log  where TITLE="dummy"');
$arr['TITLE']= $path;
if ($msgtype=='device_state'||$msgtype=='raw'||$msgtype=='graphviz' ) {$arr['MESSAGE']= $path.":".$value; } else  {$arr['MESSAGE']= $value;}
$arr['TYPE']= $msgtype;
$arr['FIND']= date('Y-m-d H:i:s');

//if (ZMQTT_DEBUG=="1" ) debmes($arr , 'zigbee2mqtt');
$ok=SQLInsert('zigbee2mqtt_log', $arr);
}

}
//////////////////////
//////////////////////
//////////////////////
//////////////////////

//if (ZMQTT_DEBUG=="1" ) debmes('Поместили '.$ok , 'zigbee2mqtt');
//раскодируем

//parse_deviceinfo($ar)

//if (ZMQTT_DEBUG=="1" ) debmes($json,'zigbee2mqtt');
//if (ZMQTT_DEBUG=="1" ) debmes($json->{'type'},'zigbee2mqtt');


//////////////////////
//////////////////////
//////////////////////
if ($json->{'type'}=='devices') {

//if (ZMQTT_DEBUG=="1" ) debmes('справочник устройств:','zigbee2mqtt');

//$this->parse_deviceinfo($json->{'message'});
$this->parse_deviceinfo($json, $gw);
}

if ($json->{'type'}=='groups') {$this->update_groups($json);}

//добавляем в справочник устройств zigbee2mqtt_devices
//if (ZMQTT_DEBUG=="1" ) debmes('path='.$path,'zigbee2mqtt') ;

$dev_title=explode('/',$path)[1];

//if (ZMQTT_DEBUG=="1" ) debmes('$dev_title='.$dev_title,'zigbee2mqtt') ;

//if (strpos(substr($path,-3),"set")>0) debmes(substr($path,-3), 'z2m_settt');
//debmes($path.'        '.substr($path,-4).' strpos:'.strpos(substr($path,-4),"/set"), 'z2m_settt');

//debmes(strpos(substr($path)), 'z2m_settt')
//debmes(strpos(substr($path),"/set/"), 'z2m_settt')

if ((substr($path,-4)=="/set")||(strpos($path,"/set/")>0)) { debmes('путь содержит set, его мы записывать не будем, чтобы не было колизии', 'z2m_settt'); }
else 
{
////основной запрос
$this->update_default($path, $value);
}


}

////////////////////////////////////////////////////

function update_default($path, $value){

$dev_title=explode('/',$path)[1];
$gw=explode('/',$path)[0];

//debmes('path: '.$path .' value: '. $value, 'z2m_update_default');

//		    echo $cnt; 


     $sql="SELECT * FROM zigbee2mqtt_devices WHERE IEEEADDR LIKE '%".DBSafe($dev_title)."%'";
     $rec=SQLSelectOne($sql);

//if (ZMQTT_DEBUG=="1" ) debmes('апдейтим zigbee2mqtt_devices: '.$sql, 'zigbee2mqtt');
//                         $rec['TITLE']=$dev_title;
          if(!$rec['ID']) { $rec['TITLE']=$dev_title;}

     			$rec['IEEEADDR']=$dev_title;
     			$rec['FIND']=date('Y-m-d H:i:s');

                    if ($dev_title=='bridge' )
			{
//                    if (ZMQTT_DEBUG=="1" ) debmes('это шлюз',zigbee2mqtt);
                      $cnt=SQLSelectOne("SELECT count(*) cnt FROM zigbee2mqtt_devices WHERE TITLE ='bridge'")['cnt'];

	 	     $rec['FIND']=date('Y-m-d H:i:s');
                     if ($cnt==0) {SQLInsert('zigbee2mqtt_devices', $rec);} else 
                        {SQLUpdate('zigbee2mqtt_devices', $rec);}
//                       break;
			} 
///не бридж
else { 

     if(!$rec['ID']) { /* If path_write foud in db */


//проверяем, новая тема  по группе или устройству
$grl=SQLSelectOne('Select * from zigbee2mqtt_grouplist where TITLE="'.$dev_title.'"');
if ($grl['ID'])   {      $rec['SELECTTYPE']='group';$rec['SELECTVENDOR']='group';}


//if (ZMQTT_DEBUG=="1" ) debmes('устройство  новое, нужно создать новое устройство  zigbee2mqtt_devices: '.$sql, 'zigbee2mqtt');

     $gw=explode('/',$path)[0];
     $rec['TITLE']=$dev_title;
     $rec['GW']=$gw;
     $rec['IEEEADDR']=$dev_title;
     $rec['FIND']=date('Y-m-d H:i:s');
//if   ($rec['TITLE']=='bridge')  {      $rec['IEEEADDR']='bridge2';}
//if   (strpos($rec['TITLE'], 'group')>0)  {      $rec['SELECTTYPE']='group';$rec['SELECTVENDOR']='group';}
//print_r($rec);
      SQLInsert('zigbee2mqtt_devices', $rec);


//если устройство новое, запросим список устройств у контроллера
//     $this->refresh_db();
//     $this->refreshdb_mqtt();
$gw=explode('/',$path)[0];
//$this->getConfig();
//$query_list = explode(',', $this->config['MQTT_QUERY']);
//$total = count($query_list);
//for ($i = 0; $i < $total; $i++) {

//$zz=explode('/',$query_list[$i])[0];

//
SQLExec ("update  zigbee2mqtt set VALUE='' where TITLE='$gw/bridge/log'");
$this->sendcommand($gw.'/bridge/config/devices', '');
      }
      
else 
{
//обновляем дату время имеющегося устройства

//if (ZMQTT_DEBUG=="1" ) debmes('устройство уже зарегистрировано в системе   zigbee2mqtt_devices: '.$sql, 'zigbee2mqtt');
     $rec['IEEEADDR']=$dev_title;
     $rec['FIND']=date('Y-m-d H:i:s');
     $rec['GW']=$gw;
     SQLUPDATE('zigbee2mqtt_devices', $rec);
}

} 

//добавляем информацию в справочник топиков  zigbee2mqtt
//   $dev_id=SQLSelectOne("SELECT * FROM zigbee2mqtt_devices WHERE TITLE LIKE '%".DBSafe($dev_title)."%'")['ID'];


$sql="SELECT * FROM zigbee2mqtt_devices WHERE IEEEADDR LIKE '%".DBSafe($dev_title)."%'";
//if (ZMQTT_DEBUG=="1" ) debmes($sql, 'zigbee2mqtt');
   $dev_id=SQLSelectOne($sql)['ID'];

////////////////////////////////////
//$sql="SELECT * FROM zigbee2mqtt WHERE PATH LIKE '".DBSafe($path)."'";



//debmes($path, 'z2m_migration');
//debmes(stripos($path,'/'), 'z2m_migration');


$npath=substr($path,0,strrpos($path,'/'));
$nnpath=substr($path,stripos($path,'/',0));
$metrika=substr($path,strrpos($path,'/')+1); 

if (strrpos($path,'bridge')>0) { $sql="SELECT * FROM zigbee2mqtt WHERE PATH LIKE '%$npath%' and METRIKA='$metrika'";  }
else 
{$sql="SELECT * FROM zigbee2mqtt WHERE PATH LIKE '%$nnpath%' and METRIKA='$metrika'" ;}


//debmes($sql, 'zigbee2mqtt');
//debmes($sql, 'z2m_migration');
   $rec=SQLSelectOne($sql);

   
   if(!$rec['ID']){ /* If 'PATH' not found in db */
     /* New query to search 'PATH_WRITE' record in db *//*
     $rec=SQLSelectOne("SELECT * FROM zigbee2mqtt WHERE PATH LIKE '".DBSafe($path)."'");
     
     if($rec['ID']) { /* If path_write foud in db */      /*
       if($rec['DISP_FLAG']!="0"){ /* check disp_flag */    /*
         return 0; /* ignore message if flag checked */       /*
       }
     }

*/
     /* Insert new record in db */
     $rec['PATH']=$path;
     $rec['METRIKA']=substr($path,strrpos($path,'/')+1); 
     //$rec['PATH_WRITE']=substr($path,0,strrpos($path,'/')); 
     //$rec['METRIKA']="1"; 
     $rec['DEV_ID']=$dev_id;
     $rec['TITLE']=$path;
     //$rec['VALUE']=$value.'';
     $rec['VALUE']=$value;

     $rec['UPDATED']=date('Y-m-d H:i:s');
     $rec['ID']=null;
     //debmes($rec, 'zigbee2mqtt');
     //debmes('SQLInsert zigbee2mqtt', 'zigbee2mqtt');
     SQLInsert('zigbee2mqtt', $rec);
     }else{
     /* Update values in db */
     $rec['VALUE']=$value.'';
     $rec['DEV_ID']=$dev_id;
     $rec['UPDATED']=date('Y-m-d H:i:s');
     //debmes($rec, 'zigbee2mqtt');
     //debmes('SQupdate zigbee2mqtt', 'zigbee2mqtt');
     SQLUpdate('zigbee2mqtt', $rec);
     /* Update property in linked object if it exist */
     if($rec['LINKED_OBJECT'] && $rec['LINKED_PROPERTY']) {

         $value=$rec['VALUE'];
         if ($rec['REPLACE_LIST']!='') {
             $list=explode(',',$rec['REPLACE_LIST']);
             foreach($list as $pair) {
                 $pair=trim($pair);
                 list($new,$old)=explode('=',$pair);
                 if ($value==$new) {
                     $value=$old;
                     break;
                 }
             }
         }

if (($rec['PAYLOAD_ON'])||$rec['PAYLOAD_OFF']) {
if ($value==$rec['PAYLOAD_ON'])  {$newvalue=1; SQLExec('update zigbee2mqtt_devices set state="1" where ID="'.$rec['DEV_ID'].'"');}
if ($value==$rec['PAYLOAD_OFF']) {$newvalue=0; SQLExec('update zigbee2mqtt_devices set state="0" where ID="'.$rec['DEV_ID'].'"');}



//if ($value==$rec['PAYLOAD_ON'])  $newvalue=1;
//if ($value==$rec['PAYLOAD_OFF'])  $newvalue=0;

//if (ZMQTT_DEBUG=="1" ) debmes('Заменили  '.$value. "  на ". $newvalue, 'zigbee2mqtt');
} 
elseif 
 (($rec['PAYLOAD_TRUE'])||$rec['PAYLOAD_FALSE']) {
if ($value==$rec['PAYLOAD_TRUE'])  {$newvalue=1; SQLExec('update zigbee2mqtt_devices set state="1" where ID="'.$rec['DEV_ID'].'"');}
if ($value==$rec['PAYLOAD_FALSE']||$value=="") {$newvalue=0; SQLExec('update zigbee2mqtt_devices set state="0" where ID="'.$rec['DEV_ID'].'"');}
}

 else 
{$newvalue=$value;}


if ((!$newvalue) || (strlen($newvalue)==0)) {$newvalue=$value;}

if ($newvalue=='OFF') {$newvalue="0";}
if ($newvalue=='ON')  {$newvalue="1";}



//пишем в переменную
//       setGlobal($rec['LINKED_OBJECT'].'.'.$rec['LINKED_PROPERTY'], $newvalue, array($this->name=>'0'));

//if (ZMQTT_DEBUG=="1" ) debmes('Вызываю setglobal: value:'.$rec['LINKED_OBJECT'].'.'.$rec['LINKED_PROPERTY'].' value:'. $newvalue,'zigbee2mqtt');

$oldvalue=getGlobal($rec['LINKED_OBJECT'].'.'.$rec['LINKED_PROPERTY']);

if ($rec['ENABLE1']<>"1"){
setGlobal($rec['LINKED_OBJECT'].'.'.$rec['LINKED_PROPERTY'], $newvalue, array($this->name=>'0'));} 
else if ($newvalue<>$oldvalue)  
{setGlobal($rec['LINKED_OBJECT'].'.'.$rec['LINKED_PROPERTY'], $newvalue, array($this->name=>'0'));}
     }
     if ($rec['LINKED_OBJECT'] && $rec['LINKED_METHOD']) {
       callMethod($rec['LINKED_OBJECT'] . '.' . $rec['LINKED_METHOD'], array('VALUE'=>$rec['VALUE']));


$arr=sqlselectone('select * from  zigbee2mqtt_log  where TITLE="dummy"');
$arr['TITLE']= $path;
$arr['TYPE']= 'callMethod';
$arr['MESSAGE']= $rec['LINKED_OBJECT'] . '.' . $rec['LINKED_METHOD'];
$arr['FIND']= date('Y-m-d H:i:s');


     }


////////////
////////////

//дополнительная секция обработки 
//сюда пишем обработчик уровня сигнала

////////////
////////////

if ((substr($path,strrpos($path,'/')+1)=='linkquality'))
{
//$newvalue=str_replace(']','',str_replace('[','',$value));
$newvalue=$value;
SQLExec('update zigbee2mqtt_devices set LQI="'.$newvalue.'" where ID="'.$dev_id.'"');
}

//сюда пишем обработчик получения групп
if ((substr($path,strrpos($path,'/')+1)=='group_list'))
{
$newvalue=str_replace(']','',str_replace('[','',$value));
SQLExec('update zigbee2mqtt_devices set GROUPLIST="'.$newvalue.'" where ID="'.$dev_id.'"');
}

//////////////////////////////////////////////////
//////////////////////////////////////////////////

//сюда пишем обработчик xy color

//////////////////////////////////////////////////
//////////////////////////////////////////////////


if ((substr($path,strrpos($path,'/')+1)=='color'))
{
//debmes('получено сообщение '.substr($path,strrpos($path,'/')+1).' '.$value.' от rgb устройства, разберем возможные варианты','zigbee2mqtt');
$ar=json_decode($value);
$x=$ar->{'x'};
$y=$ar->{'y'};
$br=255;

//debmes('x:'.$x.', y:'.$y, 'zigbee2mqtt');
$hex=$this->xyBriToRgb($x,$y, $br);

$npath=substr($path,0,strrpos($path,'/'));
$metrika='rgbcolor';
$sql="SELECT * FROM zigbee2mqtt WHERE PATH LIKE '%$npath%' and METRIKA='$metrika'" ;

//debmes($sql, 'zigbee2mqtt');

   $rec1=SQLSelectOne($sql);
   $newvalue=$hex;


   if(!$rec1['ID']){ /* If 'PATH' not found in db */
//     if (ZMQTT_DEBUG=="1" ) 


     $rec1['PATH']=$path;
     $rec1['METRIKA']=$metrika;
     $rec1['DEV_ID']=$dev_id;
     $rec1['TITLE']=$path;
     $rec1['VALUE']=$newvalue;
     $rec1['UPDATED']=date('Y-m-d H:i:s');
     $rec1['ID']=null;
//debmes(   'SQLInsert zigbee2mqtt', 'zigbee2mqtt');
SQLInsert('zigbee2mqtt', $rec1);
   }
else
{
//     if (ZMQTT_DEBUG=="1" ) 

     $rec1['METRIKA']=$metrika;
//     $rec1['METRIKA']=$newvalue;
     $rec1['VALUE']=$newvalue;
//     $rec1['VALUE']=$value;
     $rec1['DEV_ID']=$dev_id;
     $rec1['UPDATED']=date('Y-m-d H:i:s');
//debmes(   'SQLUpdate zigbee2mqtt', 'zigbee2mqtt');
//debmes(   $rec1, 'zigbee2mqtt');

     SQLUpdate('zigbee2mqtt', $rec1);

}
//debmes('Проверяем, нужно ли вызвать setglobal: '.$rec1['LINKED_OBJECT'].'.'.$rec1['LINKED_PROPERTY'].' value:'. $newvalue,'zigbee2mqtt');


     if($rec1['LINKED_OBJECT'] && $rec1['LINKED_PROPERTY']) {
//debmes('Вызываю setglobal: value:'.$rec1['LINKED_OBJECT'].'.'.$rec1['LINKED_PROPERTY'].' value:'. $newvalue,'zigbee2mqtt');

$oldvalue=getGlobal($rec['LINKED_OBJECT'].'.'.$rec['LINKED_PROPERTY']);
if ($rec1['ENABLE1']<>"1"){
setGlobal($rec1['LINKED_OBJECT'].'.'.$rec1['LINKED_PROPERTY'], $newvalue, array($this->name=>'0'));} 
else if ($newvalue<>$oldvalue)  
{setGlobal($rec1['LINKED_OBJECT'].'.'.$rec1['LINKED_PROPERTY'], $newvalue, array($this->name=>'0'));}

}
//debmes('Проверяем, нужно ли вызвать метод : '.$rec1['LINKED_OBJECT'].'.'.$rec1['LINKED_METHOD'].' value:'. $newvalue,'zigbee2mqtt');

     if ($rec1['LINKED_OBJECT'] && $rec1['LINKED_METHOD']) {

//debmes('выполним метод '.$rec1['LINKED_OBJECT'] . '.' . $rec1['LINKED_METHOD'],'zigbee2mqtt');
//       callMethod($rec1['LINKED_OBJECT'] . '.' . $rec1['LINKED_METHOD'], $rec1['VALUE']);
        callMethod($rec1['LINKED_OBJECT'] . '.' . $rec1['LINKED_METHOD'], array('VALUE'=>$rec1['VALUE']));
	//запишем в лог событие
	$arr=sqlselectone('select * from  zigbee2mqtt_log  where TITLE="dummy"');
	$arr['TITLE']= $path;
	$arr['TYPE']= 'callMethod';
	$arr['MESSAGE']= $rec['LINKED_OBJECT'] . '.' . $rec['LINKED_METHOD'];
	$arr['FIND']= date('Y-m-d H:i:s');


     }
}





//////////////////////////////////////////////////
//////////////////////////////////////////////////

//сюда пишем обработчик click,   release,  action, contact

//////////////////////////////////////////////////
//////////////////////////////////////////////////
if ((substr($path,strrpos($path,'/')+1)=='click')||(substr($path,strrpos($path,'/')+1)=='release')||(substr($path,strrpos($path,'/')+1)=='action')||(substr($path,strrpos($path,'/')+1)=='contact'))
{
//if (ZMQTT_DEBUG=="1" ) 
//debmes('получено сообщение '.substr($path,strrpos($path,'/')+1).' от пульта, разберем возможные варианты','zigbee2mqtt');
//   $rec1=SQLSelectOne("SELECT * FROM zigbee2mqtt WHERE PATH LIKE '".DBSafe($path)." and METRIKA='$value'" );
     if ($value=="") {$value="null";}
$npath=substr($path,0,strrpos($path,'/'));
$sql="SELECT * FROM zigbee2mqtt WHERE PATH LIKE '%$npath%' and METRIKA='$value'" ;
//if (ZMQTT_DEBUG=="1" ) debmes($sql, 'zigbee2mqtt');
//debmes($sql, 'zigbee2mqtt');
   $rec1=SQLSelectOne($sql);
//   $newvalue='click';
   $newvalue=substr($path,strrpos($path,'/')+1);
//debmes(   $rec1, 'zigbee2mqtt');

   if(!$rec1['ID']){ /* If 'PATH' not found in db */
//     if (ZMQTT_DEBUG=="1" ) 
//debmes('кнопка click нажата первый раз', 'zigbee2mqtt');
     $rec1['PATH']=$path;
     $rec1['METRIKA']=$value;
     //$rec1['METRIKA']=$newvalue;
     $rec1['DEV_ID']=$dev_id;
     $rec1['TITLE']=$path;
//     $rec['VALUE']=$value.'';
     $rec1['VALUE']=$newvalue;
//     $rec1['VALUE']=$value;
     $rec1['UPDATED']=date('Y-m-d H:i:s');
     $rec1['ID']=null;
//debmes(   'SQLInsert zigbee2mqtt', 'zigbee2mqtt');
SQLInsert('zigbee2mqtt', $rec1);
   }
else
{
//     if (ZMQTT_DEBUG=="1" ) 
//debmes('кнопка click ранее уже нажималас, есть информация в базе данных', 'zigbee2mqtt');
     $rec1['METRIKA']=$value;
//     $rec1['METRIKA']=$newvalue;
     $rec1['VALUE']=$newvalue;
//     $rec1['VALUE']=$value;
     $rec1['DEV_ID']=$dev_id;
     $rec1['UPDATED']=date('Y-m-d H:i:s');
//debmes(   'SQLUpdate zigbee2mqtt', 'zigbee2mqtt');
//debmes(   $rec1, 'zigbee2mqtt');
     SQLUpdate('zigbee2mqtt', $rec1);
}
if ($newvalue=='OFF') {$newvalue="0";}
if ($newvalue=='ON')  {$newvalue="1";}
//debmes('Проверяем, нужно ли вызвать setglobal: '.$rec1['LINKED_OBJECT'].'.'.$rec1['LINKED_PROPERTY'].' value:'. $newvalue,'zigbee2mqtt');
     if($rec1['LINKED_OBJECT'] && $rec1['LINKED_PROPERTY']) {
//debmes('Вызываю setglobal: value:'.$rec1['LINKED_OBJECT'].'.'.$rec1['LINKED_PROPERTY'].' value:'. $newvalue,'zigbee2mqtt');
$oldvalue=getGlobal($rec['LINKED_OBJECT'].'.'.$rec['LINKED_PROPERTY']);
if ($newvalue<>$oldvalue) setGlobal($rec1['LINKED_OBJECT'].'.'.$rec1['LINKED_PROPERTY'], $newvalue, array($this->name=>'0'));
    }
//debmes('Проверяем, нужно ли вызвать метод : '.$rec1['LINKED_OBJECT'].'.'.$rec1['LINKED_METHOD'].' value:'. $newvalue,'zigbee2mqtt');
     if ($rec1['LINKED_OBJECT'] && $rec1['LINKED_METHOD']) {
//debmes('выполним метод '.$rec1['LINKED_OBJECT'] . '.' . $rec1['LINKED_METHOD'],'zigbee2mqtt');
//       callMethod($rec1['LINKED_OBJECT'] . '.' . $rec1['LINKED_METHOD'], $rec1['VALUE']);
       callMethod($rec1['LINKED_OBJECT'] . '.' . $rec1['LINKED_METHOD'], array('VALUE'=>$rec1['VALUE']));

	//запишем в лог событие
	$arr=sqlselectone('select * from  zigbee2mqtt_log  where TITLE="dummy"');
	$arr['TITLE']= $rec['DEV_ID'];
	$arr['TYPE']= 'callMethod';
	$arr['MESSAGE']= $rec['LINKED_OBJECT'] . '.' . $rec['LINKED_METHOD'];
	$arr['FIND']= date('Y-m-d H:i:s');


     }
}


//////////////////////////////////////////////////
//////////////////////////////////////////////////

//сюда пишем обработчик eurotronic_host_flags для  SPZB0001 Spirit Zigbee wireless heater thermostat

//////////////////////////////////////////////////
//////////////////////////////////////////////////
if ((substr($path,strrpos($path,'/')+1)=='eurotronic_host_flags')||(substr($path,strrpos($path,'/')+1)=='eurotronic_host_flags'))
{
           if ($this->isJSON22($value)) 	
{
	$items=json_decode($value,true);
//	debmes($items, 'zigbee2mqtt_spirit');
        foreach($items as $k=>$v) {  



$npath=substr($path,0,strrpos($path,'/'));
$sql="SELECT * FROM zigbee2mqtt WHERE PATH LIKE '%$npath%' and METRIKA='$value'" ;
//if (ZMQTT_DEBUG=="1" ) debmes($sql, 'zigbee2mqtt');
//debmes($sql, 'zigbee2mqtt');
   $rec1=SQLSelectOne($sql);

//	debmes($npath, 'zigbee2mqtt_spirit');
//	debmes($sql,   'zigbee2mqtt_spirit');
//	debmes($rec1,  'zigbee2mqtt_spirit');

/*
//   $newvalue='click';
   $newvalue=substr($path,strrpos($path,'/')+1);
//debmes(   $rec1, 'zigbee2mqtt');

   if(!$rec1['ID']){ 
//     if (ZMQTT_DEBUG=="1" ) 
//debmes('кнопка click нажата первый раз', 'zigbee2mqtt');
     $rec1['PATH']=$path;
     $rec1['METRIKA']=$value;
     //$rec1['METRIKA']=$newvalue;
     $rec1['DEV_ID']=$dev_id;
     $rec1['TITLE']=$path;
//     $rec['VALUE']=$value.'';
     $rec1['VALUE']=$newvalue;
//     $rec1['VALUE']=$value;
     $rec1['UPDATED']=date('Y-m-d H:i:s');
     $rec1['ID']=null;
//debmes(   'SQLInsert zigbee2mqtt', 'zigbee2mqtt');
SQLInsert('zigbee2mqtt', $rec1);
   }
else
{
//     if (ZMQTT_DEBUG=="1" ) 
//debmes('кнопка click ранее уже нажималас, есть информация в базе данных', 'zigbee2mqtt');
     $rec1['METRIKA']=$value;
//     $rec1['METRIKA']=$newvalue;
     $rec1['VALUE']=$newvalue;
//     $rec1['VALUE']=$value;
     $rec1['DEV_ID']=$dev_id;
     $rec1['UPDATED']=date('Y-m-d H:i:s');
//debmes(   'SQLUpdate zigbee2mqtt', 'zigbee2mqtt');
//debmes(   $rec1, 'zigbee2mqtt');
     SQLUpdate('zigbee2mqtt', $rec1);
}
*/


}}


///////////////////////////
//конец доп. обработчиков
///////////////////////////

}



}
}


function update_groups($json){

//if (ZMQTT_DEBUG=="1" ) debmes('обновим справочник групп','zigbee2mqtt');
//if (ZMQTT_DEBUG=="1" ) debmes($json->{'message'}, 'zigbee2mqtt');

foreach ($json->{'message'} as $key=> $value)

{

//if (ZMQTT_DEBUG=="1" ) debmes($key.":". $value, 'zigbee2mqtt');
//echo $key.":". $value->{'friendly_name'};
$sql="select * from zigbee2mqtt_grouplist  where Z2M_ID='$key'";
//if (ZMQTT_DEBUG=="1" ) debmes($sql, 'zigbee2mqtt');

$grs=SQLSElectOne($sql);
//if (ZMQTT_DEBUG=="1" ) debmes($grs, 'zigbee2mqtt');

if  (!$grs['ID']) 
{
    
$grs['Z2M_ID']=$key;
$grs['TITLE']=$value->{'friendly_name'};
$grs['ADDED']= date('Y-m-d H:i:s');
    
//if (ZMQTT_DEBUG=="1" ) debmes('SQLInsert zigbee2mqtt_grouplist' , 'zigbee2mqtt');
SQLInsert(  'zigbee2mqtt_grouplist',   $grs);
} else 

{
    
$grs['Z2M_ID']=$key;
$grs['TITLE']=$value->{'friendly_name'};
$grs['ADDED']= date('Y-m-d H:i:s');

//if (ZMQTT_DEBUG=="1" ) debmes('SQLUpdate zigbee2mqtt_grouplist' , 'zigbee2mqtt');
SQLUpdate(  'zigbee2mqtt_grouplist',   $grs);
}
}
}




// }

/**
* BackEnd
*
* Module backend
*
* @access public
*/
function admin(&$out) {
 if (isset($this->data_source) && !$_GET['data_source'] && !$_POST['data_source']) {
  $out['SET_DATASOURCE']=1;
 }

        if ((time() - gg('cycle_zigbee2mqttRun')) < 360*2 ) {
			$out['CYCLERUN'] = 1;
		} else {
			$out['CYCLERUN'] = 0;
		}


//$seen=SQLSelectOne("select max(FIND) FIND from zigbee2mqtt_log where MESSAGE='online'  ");
//$seen=SQLSelectOne("select max(FIND) FIND from zigbee2mqtt_log   ");

$this->getConfig();

if (!empty($this->config['SLSIP'])) {
  $slslist =(explode(',', $this->config['SLSIP']));
} else {
  $slslist=array();
}

$total = count($slslist);
for ($i = 0; $i < $total; $i++) {
$out['slsdev'][$i]['IP']=trim($slslist[$i]);
}


$query_list = explode(',', $this->config['MQTT_QUERY']);
$total = count($query_list);

for ($i = 0; $i < $total; $i++) {

$zz=explode('/',$query_list[$i])[0];
$sql="select * from zigbee2mqtt where TITLE='$zz/bridge/config/permit_join'  ";
$permit=SQLSelectOne($sql);
//debmes($sql, 'z2msql');

//if $permit['VALUE']=
$out['gwstatus'][$i]['PERMITNAME']=$zz;
$out['gwstatus'][$i]['PERMITSTATUS']=$permit['VALUE'];
//    $path = trim($query_list[$i]);
//    $topics[$path] = array("qos" => 0, "function" => "procmsg");
$seen=SQLSelectOne("select * from zigbee2mqtt_log where TITLE like '%$zz%' order by FIND DESC  limit 1  ");
$out['gwstatus'][$i]['SEEN']=$seen['FIND'];

if ((time()-strtotime($seen['FIND'])<3600)) {$out['gwstatus'][$i]['SEEN2']="1";}
else {$out['gwstatus'][$i]['SEEN2']="0";}


if ($seen['MESSAGE']=='offline')  {$out['gwstatus'][$i]['SEEN2']="0";
$out['gwstatus'][$i]['PERMIT']='false';

}

}

//print_r($_GET);
$slsipp=$_GET['slsipp'];
$out['SLSIPP']=trim($slsipp);


$out['ZIGBEE2MQTTPATH']=$this->config['ZIGBEE2MQTTPATH'];






 $this->getConfig();
 $out['MQTT_DEBUG']=$this->config['MQTT_DEBUG'];


//define("ZMQTT_DEBUG", $this->config['MQTT_DEBUG']);
define("ZMQTT_DEBUG", "1");



 $out['ZMQTT_DEBUG']=ZMQTT_DEBUG;

 $out['MQTT_CLIENT']=$this->config['MQTT_CLIENT'];
 $out['MQTT_HOST']=$this->config['MQTT_HOST'];
 $out['MQTT_PORT']=$this->config['MQTT_PORT'];
 $out['Z2M_HIST']=$this->config['Z2M_HIST'];
 $out['Z2M_LOGMODE']=$this->config['Z2M_LOGMODE'];
 $out['Z2M_VIEW']=$this->config['Z2M_VIEW'];
 $out['Z2M_NTILES']=$this->config['Z2M_NTILES'];
 $out['SLSIP']=$this->config['SLSIP'];

// $out['Z2M_LOGMODE']='deb';

 $out['ZIGBEE2MQTTPATH']=$this->config['ZIGBEE2MQTTPATH'];
 $out['MQTT_QUERY']=$this->config['MQTT_QUERY'];

 if (!$out['MQTT_HOST']) {
  $out['MQTT_HOST']='localhost';
 }


 if (!$out['MQTT_CLIENT']) {
  $out['MQTT_CLIENT']='md_zigbee2mqtt';
 }


/// if (!$out['ZIGBEE2MQTTPATH']) {
//  $out['ZIGBEE2MQTTPATH']='/opt/zigbee2mqtt';
/// }


 if (!$out['MQTT_PORT']) {
  $out['MQTT_PORT']='1883';
 }
 if (!$out['MQTT_QUERY']) {
  $out['MQTT_QUERY']='zigbee2mqtt/#';
 }

 $out['MQTT_USERNAME']=$this->config['MQTT_USERNAME'];
 $out['MQTT_PASSWORD']=$this->config['MQTT_PASSWORD'];
 $out['MQTT_AUTH']=$this->config['MQTT_AUTH'];


     if ($this->tab=='help') {
$res=SQLSelect("SELECT * FROM zigbee2mqtt_devices_list ");
$out['DEVICE_LIST']=$res;

}


     if ($this->tab=='edit_device'||$this->tab=='view_det'||$this->tab=='edit_parametrs' ||$this->tab=='device_log') {

//if ( $this->TAB=='edit_device') {
//$vm=$this->VIEW_MODE;
// echo "<script type='text/javascript'>";
// echo "alert('$vm');";
// echo "</script>";


//echo '123';

  $res=SQLSelectOne("SELECT * FROM zigbee2mqtt_devices where ID=".$this->id);



$out['ID']=$res['ID'];
$out['TITLE']=$res['TITLE'];
$out['MODEL']=$res['MODEL'];
$out['DEVICE_NAME']=$res['DEVICE_NAME'];
$out['MODELID']=$res['MODELID'];
$out['TYPE']=$res['TYPE'];
$out['GW']=$res['GW'];
$out['IEEEADDR']=$res['IEEEADDR'];
$out['NWKADDR']=$res['NWKADDR'];
$out['MANUFID']=$res['MANUFID'];
$out['MANUFNAME']=$res['MANUFNAME'];
$out['PARRENTIEEEADDR']=$res['PARRENTIEEEADDR'];
$out['LQI']=$res['LQI'];
$out['POWERSOURCE']=$res['POWERSOURCE'];
$out['MODELID']=$res['MODELID'];
$out['STATUS']=$res['STATUS'];
$out['DID']=$res['DID'];
$out['D_ID']=$res['D_ID'];
$out['FIND']=$res['FIND'];
$out['LOCATION_ID']=$res['LOCATION_ID'];
$out['SELECTTYPE']=$res['SELECTTYPE'];
$out['SELECTVENDOR']=$res['SELECTVENDOR'];
$out['GROUP']=$res['GROUP'];
$out['NEEDSAVE']="0";
$out['IEEEADDR']=$res['IEEEADDR'];
$out['HWVERSION']=$res['HWVERSION'];
$out['SWBUILDID']=$res['SWBUILDID'];
$out['HISTORY']=$res['HISTORY'];


$res1=SQLSelectOne("SELECT * FROM zigbee2mqtt_devices_list where model='".$res['SELECTTYPE']."'");
$out['MODELNAME']=$res1['model'];

//$out['SELECTVENDOR']=$res1['vendor'];

if (strlen($out['SELECTVENDOR'])=="0") {
//echo "123";
//$out['SELECTVEDNOR']=$res1['vendor'];
$out['NEEDSAVEVENDOR']="1";
//if (ZMQTT_DEBUG=="1" ) debmes("SELECTTYPE:".strlen($out['SELECTTYPE']).":".$out['SELECTTYPE'], 'zigbee2mqtt');
}

if (strlen($out['SELECTTYPE'])=="0") {
//echo "123";
$out['SELECTTYPE']=$res1['model'];
$out['NEEDSAVETYPE']="1";
//if (ZMQTT_DEBUG=="1" ) debmes("SELECTTYPE:".strlen($out['SELECTTYPE']).":".$out['SELECTTYPE'], 'zigbee2mqtt');
}


$out['VENDOR']=str_replace($res1['vendor'], '/', '-');
$out['DESCRIPTION']=$res1['description'];

//$out['DESCRIPTION']=SQLSelectOne("SELECT * FROM zigbee2mqtt_devices_list where zigbeeModel='".$res['MODELID']."'");

$out['EXTEND']=$res1['extend'];
$out['SUPPORTS']=$res1['supports'];
$out['FROMZIGBEE']=$res1['fromZigbee'];
$out['TOZIGBEE']=$res1['toZigbee'];


//$tmp=SQLSelect("SELECT distinct replace(vendor,'/','-') vendor FROM zigbee2mqtt_devices_list ");
$tmp=SQLSelect("SELECT distinct vendor FROM zigbee2mqtt_devices_list ");
$out['SELECTVENDORARRAY']=$tmp;


if ($out['SELECTVENDOR']) {

$tmp=SQLSelect("SELECT * FROM zigbee2mqtt_devices_list where vendor='".$out['SELECTVENDOR']."' order by vendor, zigbeeModel");
} else 

{
$tmp=SQLSelect("SELECT * FROM zigbee2mqtt_devices_list   order by vendor, zigbeeModel");
}
$out['SELECTTYPEARRAY']=$tmp;
//if (ZMQTT_DEBUG=="1" ) debmes($tmp, 'zigbee2mqtt');


  //options for 'LOCATION_ID' (select)
  $tmp=SQLSelect("SELECT ID, TITLE FROM locations ORDER BY TITLE");
  $locations_total=count($tmp);
  for($locations_i=0;$locations_i<$locations_total;$locations_i++) {
   $location_id_opt[$tmp[$locations_i]['ID']]=$tmp[$locations_i]['TITLE'];
  }
  for($i=0;$i<count($tmp);$i++) {
   if ($res['LOCATION_ID']==$tmp[$i]['ID']) $tmp[$i]['SELECTED']=1;
  }
  $out['LOCATION_ID_OPTIONS']=$tmp;
  
  

  $tmp=SQLSelect("SELECT ID, TITLE FROM zigbee2mqtt_grouplist ORDER BY TITLE");
  $locations_total=count($tmp);
  for($locations_i=0;$locations_i<$locations_total;$locations_i++) {
   $location_id_opt[$tmp[$locations_i]['ID']]=$tmp[$locations_i]['TITLE'];
  }
  for($i=0;$i<count($tmp);$i++) {
   if ($res['GROUP']==$tmp[$i]['TITLE']) $tmp[$i]['SELECTED']=1;
  }
  $out['GROUPS']=$tmp;

  $out['LOCATIONS']=SQLSelect("SELECT * FROM locations ORDER BY TITLE");
//  $out['GROUP_LISTS']=SQLSelect("SELECT * FROM locations ORDER BY TITLE");

//  $out['GROUP_LISTS']=SQLSelect("SELECT * FROM zigbee2mqtt_grouplist ORDER BY TITLE");



//if (ZMQTT_DEBUG=="1" ) debmes('location', 'zigbee2mqtt');
//if (ZMQTT_DEBUG=="1" ) debmes($tmp, 'zigbee2mqtt');


if ($this->tab=='device_log'){

  $sql0='SELECT *  FROM zigbee2mqtt_log where TITLE like "%'.$res['IEEEADDR'].'%"  order by FIND DESC LIMIT 100';
//  $sql0='SELECT *  FROM zigbee2mqtt_log where TITLE like "%'.$res['IEEEADDR'].'%" and TITLE not like "%'.$res['IEEEADDR'].'" order by FIND DESC LIMIT 100';
//  $sql0='SELECT *  FROM zigbee2mqtt_log where TITLE not like "%'.$res['IEEEADDR'].'" order by FIND DESC LIMIT 100';

//debmes($sql0,'zigbee2mqtt');

$ssql=SQLSelect($sql0);

$out['LOG2']=$ssql;


}



}

     if ($this->view_mode=='update_device') {
//$vm=$this->id;
// echo "<script type='text/javascript'>";
// echo "alert('$vm');";
// echo "</script>";


  $table_name='zigbee2mqtt_devices';
  $rec=SQLSelectOne("SELECT * FROM $table_name WHERE ID='".$this->id."'");

   global $dev_title;
   $rec['TITLE']=$dev_title;
   if ($rec['TITLE']=='') {
    $out['ERR_TITLE']=1;
    $ok=0;
   }







   global $devlocid;
   $rec['LOCATION_ID']=$devlocid;
   if ($rec['LOCATION_ID']=='') {
    $out['ERR_LOCATION_ID']=1;
    $ok=0;
   }
//   if (ZMQTT_DEBUG=="1" ) debmes('$dev_location_id='. $devlocid, 'zigbee2mqtt');


   global $selecttype;
   $rec['SELECTTYPE']=$selecttype;
   if ($rec['SELECTTYPE']=='') {
    $out['ERR_SELECTTYPE']=1;
    $ok=0;
   }

   global $selectvendor;
   $rec['SELECTVENDOR']=$selectvendor;
   if ($rec['SELECTVENDOR']=='') {
    $out['ERR_SELECTVENDOR']=1;
    $ok=0;
   }


   global $history;
   $rec['HISTORY']=$history;




   global $creategroup;


$this->getConfig();
$zz=explode('/',$this->config['MQTT_QUERY'])[0];


if (($creategroup)&&(strlen($creategroup)>0)&&($creategroup!='select')) {
//   $rec['GROUP']=$creategroup;
    $rec['GROUP']='';

$tmp=SQLSelectOne("SELECT * from zigbee2mqtt_grouplist where TITLE='$creategroup'");

if (!$tmp['ID'])  $this->sendcommand($zz.'/bridge/config/add_group', $creategroup);
  $this->sendcommand($zz.'/bridge/group/'.$creategroup.'/add', $dev_title);
} else $rec['GROUP']='';


   global $selectdevicegroup;
   
//   if (ZMQTT_DEBUG=="1" ) debmes('$selectdevicegroup='.$selectdevicegroup,'zigbee2mqtt');

if (($selectdevicegroup)&&(strlen($selectdevicegroup)>0)) {
//   $rec['GROUP']=$selectdevicegroup;
$rec['GROUP']='';

  $this->sendcommand($zz.'/bridge/group/'.$selectdevicegroup.'/add', $dev_title);
} else $rec['GROUP']=''; 


   
//$vm=$dev_location_id;
// echo "<script type='text/javascript'>";
// echo "alert('$vm');";
// echo "</script>";



  //UPDATING RECORD
  
    if ($rec['ID']) {
     SQLUpdate($table_name, $rec); // update
    } else {
     $new_rec=1;
     $rec['ID']=SQLInsert($table_name, $rec); // adding new record
    }
    

 $this->redirect("?view_mode=view_mqtt&id=".$this->id."&tab=edit_device");
}






// if (($this->view_mode=='update_log')&&($this->tab=='log')) {
 if ($this->tab=='log') {

// if ($this->update_log=='update_log') {
 $this->getConfig();

global $file;
global $limit;
$zigbee2mqttpath=$this->config['ZIGBEE2MQTTPATH'];
if ($this->view_mode=='update_log') {$filename=$zigbee2mqttpath.'/data/log/'.$file.'/log.txt';} 
else 

{

$zigbee2mqttpath=$this->config['ZIGBEE2MQTTPATH'];

            $path = $zigbee2mqttpath.'/data/log';


            if ($handle = opendir($path)) {
                $files = array();

                while (false !== ($entry = readdir($handle))) {
                    if ($entry == '.' || $entry == '..')
                        continue;

                    $files[] = array('TITLE' => $entry);
                }

                sort($files);
            }
$cnt=count($files);

//if (ZMQTT_DEBUG=="1" ) debmes($cnt,'zigbee2mqtt');
//if (ZMQTT_DEBUG=="1" ) debmes($files[$cnt-1]['TITLE'],'zigbee2mqtt');

$lastfile=$files[$cnt-1]['TITLE'];




            if ($handle = opendir($zigbee2mqttpath.'/data/log/'.$lastfile)) {
                $files = array();

                while (false !== ($entry = readdir($handle))) {
                    if ($entry == '.' || $entry == '..')
                        continue;

                    $files2[] = array('TITLE' => $entry);
                }

                sort($files2);
            }


$i=count($files2)-1;
//debmes($i, 'z2m');
//debmes($files2, 'z2m');
//debmes($files2[$i]['TITLE'], 'z2m');
//$filename=$zigbee2mqttpath.'/data/log/'.$lastfile.'/log8.txt';
$filename=$zigbee2mqttpath.'/data/log/'.$lastfile.'/'.$files2[$i]['TITLE'];



} 

$out['FN']=$filename;
//$out['FN']="1234";

//$a=file_get_contents ($filename, null,null,1000);


//$tmp=file($filename); 
//$tmp=file_get_contents ($filename, null,null,1000);
/*

if (filesize ($filename)>0) {

$fz=filesize ($filename);

$file = new SplFileObject($filename, 'r');



$file->seek(PHP_INT_MAX);

$last_line = $file->key();
debmes($last_line, 'zg1');

$max=500;
if  ($max>$last_line ) {$max=$last_line;}

$lines = new LimitIterator($file, $last_line - $max, $last_line);

$tmp=(iterator_to_array($lines));
}



$newtmp=array_reverse($tmp); 
$a="";
foreach ($newtmp as $value) 
{ 
$a.= $value; 
} 

$a =  str_replace( array("\r\n","\r","\n") , '<br>' , $a);
$out['LOG']=$a;
*/

            $path = $zigbee2mqttpath.'/data/log';

            if ($handle = opendir($path)) {
                $files = array();

                while (false !== ($entry = readdir($handle))) {
                    if ($entry == '.' || $entry == '..')
                        continue;

                    $files[] = array('TITLE' => $entry);
                }

                sort($files);
            }

            $out['FILES'] = $files;

//$this->search_mqtt($out);





                    

//$vm1=$filename;
// echo "<script type='text/javascript'>";
// echo "alert('$vm1');";
// echo "</script>";

// $this->redirect("?tab=log");

}





//$vm1=$this->view_mode;
// echo "<script type='text/javascript'>";
// echo "alert('$vm1');";
// echo "</script>";


 if ($this->view_mode=='cycle_start') {


   if ((time() - gg('cycle_zigbee2mqttRun')) > 360*30 ) {setGlobal('cycle_zigbee2mqttControl', 'start');}   
$this->redirect("?");
}


 if ($this->view_mode=='update_prop') {


global $id;

//$new_value = gr('new_value');
global $value2;
$new_value=$value2;


global $prop;
$property=$prop;


global $prop_id;
$property_id=$prop_id;


global $command_topik;
global $command_value;
//$property_id=$prop_id;



//debmes('update_prop id:'.$id.' new value:'.$new_value . ' property: '.$property. ' property_id: '.$property_id, 'zigbee2mqtt');

if ($property_id) {
$rec=SQLSelectOne('select * from zigbee2mqtt where ID='.$property_id);

//$topik=$rec['PATH_WRITE'].'/'.$rec['METRIKA'];
$topik=$rec['PATH_WRITE'];
} 

else 
{
$topik=$command_topik;
}




//  include_once("./lib/mqtt/phpMQTT.php");
        include_once(ROOT . "3rdparty/phpmqtt/phpMQTT.php");

   $this->getConfig();
   if ($mqtt->config['MQTT_CLIENT']) {
    $client_name=$mqtt->config['MQTT_CLIENT'];
   } else {
    $client_name="MajorDoMo MQTT";
   }



   if ($mqtt->config['MQTT_DEBUG']) {
    $debug=$mqtt->config['MQTT_DEBUG'];
   } else {
    $debug="0";
   }





   if ($this->config['MQTT_AUTH']) {
    $username=$this->config['MQTT_USERNAME'];
    $password=$this->config['MQTT_PASSWORD'];
   }
   if ($this->config['MQTT_HOST']) {
    $host=$this->config['MQTT_HOST'];
   } else {
    $host='localhost';
   }
   if ($this->config['MQTT_PORT']) {
    $port=$this->config['MQTT_PORT'];
   } else {
    $port=1883;
   }

   if ($this->config['Z2M_LOGMODE']) {
    $loglevel=$this->config['Z2M_LOGMODE'];
   } else {
    $loglewel='debug';
   }


//   $mqtt_client = new phpMQTT($host, $port, $client_name.' Client');
   $mqtt_client = new Bluerhinos\phpMQTT($host, $port, $client_name . ' Client');

   if(!$mqtt_client->connect(true, NULL,$username,$password))
   {
//if (ZMQTT_DEBUG=="1" ) debmes('Ошибка подключения к mqtt', 'zigbee2mqtt');
    return 0;
   }


//if ($new_value=='true')  {settype($new_value, 'bool');}
if ($new_value=='false') {$new_value=""; settype($new_value, 'bool');}



if ($rec['METRIKA']=='current_heating_setpoint') {$new_value=(int)$new_value;}

if ($property_id) {
$json_value=array($rec['METRIKA']=> $new_value);
} 
else 
{
$json_value=array($command_value=> $new_value);
}

$jsonvalue=json_encode($json_value) ;

   if ($topik) {

//debmes('публикуем '.$topik.":".$jsonvalue, 'zigbee2mqtt');

   $mqtt_client->publish($topik,$jsonvalue, (int)$rec['QOS'], (int)$rec['RETAIN']);
       
   }



 
$this->redirect("?view_mode=view_mqtt&id=".$id."&tab=edit_parametrs");
}






 if (substr($this->view_mode,0,11)=='setcolorhex') {
	$hex=substr($this->view_mode,12);
	$mqttsendvalue='{"state": "ON",  "brightness": 255,  "color": {"hex": "#'.$hex.'"}}';
//$id=$this->id;
/*
if ($property_id) {
        
	//$rec=SQLSelectOne('select * from zigbee2mqtt where dev_id='.$id.' and metrika="color"')
	$rec=SQLSelectOne('select * from zigbee2mqtt where dev_id='.$id.' and metrika="state"');
	$mqttsendpath=$rec['PATH_WRITE'];
        $this->sendcommand($mqttsendpath, $mqttsendvalue);
	} 
	else 

	{
*/
	$path=$_GET['gw'].'/'.$_GET['friendlyname'].'/set';
	$this->setPropertyfn($path, null,$mqttsendvalue);

/*}
*/



//$this->redirect("?");

$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];

$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");



}


 if ($this->view_mode=='updatevalues') {


$id=$this->id;

$rec=SQLSelectOne('select * from zigbee2mqtt_devices where id='.$id);

$fn=$rec['IEEEADDR'];

$mqttsendvalue='';

$this->getConfig();
$zz=explode('/',$this->config['MQTT_QUERY'])[0];
$this->sendcommand($zz.'/'.$fn, $mqttsendvalue);

$this->redirect("?view_mode=view_mqtt&id=".$id."&tab=edit_parametrs");



}


 if ($this->view_mode=='getdevicegroup') {


$id=$this->id;

$rec=SQLSelectOne('select * from zigbee2mqtt_devices where id='.$id);

$fn=$rec['IEEEADDR'];

$mqttsendvalue='';

$this->getConfig();
$zz=explode('/',$this->config['MQTT_QUERY'])[0];
$this->sendcommand($zz.'/bridge/device/'.$fn.'/get_group_membership', $mqttsendvalue);

$this->redirect("?view_mode=view_mqtt&id=".$id."&tab=edit_parametrs");



}


 if ($this->view_mode=='getalldevicegroup') {


//$id=$this->id;

SQLExec('update zigbee2mqtt_devices set GROUPLIST=""');

$tmp=SQLSelect("SELECT * from zigbee2mqtt_devices");
  for($i=0;$i<count($tmp);$i++) {

  //$this->sendcommand('zigbee2mqtt/bridge/config/device_group_remove_all',$tmp[$i]['TITLE']);
 
$fn=$tmp[$i]['IEEEADDR'];


$mqttsendvalue='';

$this->getConfig();
$zz=explode('/',$this->config['MQTT_QUERY'])[0];
$this->sendcommand($zz.'/bridge/device/'.$fn.'/get_group_membership', $mqttsendvalue);


}

//$this->redirect("?view_mode=view_mqtt&id=".$id."&tab=groups");
$this->redirect("?");



}





 if (substr($this->view_mode,0,12)=='setcolortemp') {
	$temp=substr($this->view_mode,13);
        switch   ($temp)
	{
	case 'hot':
      $itemp=500; break;
	case 'deff':      
      $itemp=255; break;
	case 'cold':   
      $itemp=0; break;
	}
	$mqttsendvalue='{"state": "ON",  "color_mode":3, "brightness": 255,  "color_temp":'.$itemp.' }';


//$id=$this->id;
if ($property_id) {
//$rec=SQLSelectOne('select * from zigbee2mqtt where dev_id='.$id.' and metrika="color"')
$rec=SQLSelectOne('select * from zigbee2mqtt where dev_id='.$id.' and metrika="state"');
$mqttsendpath=$rec['PATH_WRITE'];
//color_mode 
//$mqttsendvalue='{"state": "ON",  "brightness": 255,  "color_temp":'.$itemp.' }';
  $this->sendcommand($mqttsendpath, $mqttsendvalue);
} else 
	{
	$path=$_GET['gw'].'/'.$_GET['friendlyname'].'/set';
	$this->setPropertyfn($path, null,$mqttsendvalue);
	}



$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];

$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");



}




 if ($this->view_mode=='send_test_mqtt') {


global $mqttsendpath;
global $mqttsendvalue;
//if (ZMQTT_DEBUG=="1" ) debmes('send custom message topic: '.$mqttsendpath.' value:'.$mqttsendvalue, 'zigbee2mqtt');

  $this->sendcommand($mqttsendpath, $mqttsendvalue);
//  $this->sendcommand('zigbee2mqtt/bridge/config/devices', '');

$this->redirect("?tab=service");


}


 if ($this->tab=='service') {

$a=shell_exec("sudo systemctl status zigbee2mqtt");
$a =  str_replace( array("\r\n","\r","\n") , '<br>' , $a);
$out['status']=$a;


$stricta=sqlselectOne("SHOW VARIABLES LIKE 'sql_mode';")['Value'];

if ($stricta<>"") $out['strict']='disable'; else  $out['strict']='enable'; 
$out['stricta']=$stricta;


}

 if ($this->tab=='map') {

  require(DIR_MODULES.$this->name.'/map.inc.php');
//   $this-redirect("?tab=map");
//   $this->redirect("?tab=map");

//   $this->redirect("?data_source=&view_mode=&id=&tab=map");
}


// if ($this-tab=='map') {
//global $tab;
 if ($tab=='map') {

   $this->redirect("?tab=map");
}



 if ($this->view_mode=='srv_start') {
$a=shell_exec("sudo systemctl start zigbee2mqtt");
$a=shell_exec("sudo systemctl status zigbee2mqtt");
$a =  str_replace( array("\r\n","\r","\n") , '<br>' , $a);
$out['status']=$a;
   $this->redirect("?tab=service");

}


 if ($this->view_mode=='disablestrict') {
SQLExec ("set global sql_mode='';");
  $this->redirect("?tab=service");

}

if ($this->view_mode=='enablestrict') {
SQLExec ("set global sql_mode='STRICT_TRANS_TABLES';");
$this->redirect("?tab=service");

}



///////////////////////
///toggle
//////////////////////
 if ($this->view_mode=='device_togle') {
	$id=$this->id;
//	$this->setProperty($mqtt_properties[$i]['ID'], $value);
//if (ZMQTT_DEBUG=="1" ) debmes('!!!!!!!device_on','zigbee2mqtt');




$cstate=SQLSelectOne('select * from zigbee2mqtt_devices where ID='.$id)['STATE'];

if ($cstate=="0") { 	
$this->setPropertyDevice($id, 'device_on_single');	
}
else 
{	$this->setPropertyDevice($id, 'device_off_single');


}


$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];

$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");
}


///////////////////////
///device control
//////////////////////

 if ($this->view_mode=='device_on') {
//	$id=$this->id;
	if ($id){	
        //	$this->setProperty($mqtt_properties[$i]['ID'], $value);
	//if (ZMQTT_DEBUG=="1" ) debmes('!!!!!!!device_on','zigbee2mqtt');
	$this->setPropertyDevice($id, 'device_on_single');}
	else 
	{
	$path=$_GET['gw'].'/'.$_GET['friendlyname'].'/set';
	$this->setPropertyfn($path, 'state','ON');
}


$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];

$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");

}

 if ($this->view_mode=='device_off') {

//	$id=$this->id;
	if ($id){	
	//if (ZMQTT_DEBUG=="1" ) debmes('!!!!!!!device_off','zigbee2mqtt');
	//	$this->setProperty($mqtt_properties[$i]['ID'], $value);
	$this->setPropertyDevice($id, 'device_off_single');
	}
	else 
	{
	$path=$_GET['gw'].'/'.$_GET['friendlyname'].'/set';
	$this->setPropertyfn($path, 'state','OFF');
}


$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];
$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");
}

 if ($this->view_mode=='device_on_right') {
//	$id=$this->id;
        if ($id){	
	//	$this->setProperty($mqtt_properties[$i]['ID'], $value);
	//if (ZMQTT_DEBUG=="1" ) debmes('!!!!!!!device_on','zigbee2mqtt');
	$this->setPropertyDevice($id, 'device_on_right');
	} else
	{
	$path=$_GET['gw'].'/'.$_GET['friendlyname'].'/set';
	$this->setPropertyfn($path, 'state_right','ON');
	}



$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];

$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");

}


 if ($this->view_mode=='device_on_left') {
//	$id=$this->id;
	if ($id){	
	//	$this->setProperty($mqtt_properties[$i]['ID'], $value);
	//if (ZMQTT_DEBUG=="1" ) debmes('!!!!!!!device_on_left','zigbee2mqtt');
	$this->setPropertyDevice($id, 'device_on_left');
	}
	else
	{
	$path=$_GET['gw'].'/'.$_GET['friendlyname'].'/set';
	$this->setPropertyfn($path, 'state_left','ON');
	}


$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];

$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");
}


 if ($this->view_mode=='device_on_l1') {
//	$id=$this->id;
	if ($id){	
	//	$this->setProperty($mqtt_properties[$i]['ID'], $value);
	//if (ZMQTT_DEBUG=="1" ) debmes('!!!!!!!device_on_l1','zigbee2mqtt');
	$this->setPropertyDevice($id, 'device_on_l1');}
else
{
	$path=$_GET['gw'].'/'.$_GET['friendlyname'].'/set';
	$this->setPropertyfn($path, 'state_l1','ON');
}


	$location=$_GET['location'];
	$vendor_id=$_GET['vendor_id'];
	$type_id=$_GET['type_id'];
	$vid_id=$_GET['vid_id'];
	$group_list_id=$_GET['group_list_id'];
	
	$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");
}


 if ($this->view_mode=='device_open') {
//	$id=$this->id;

if ($id){	

	//	$this->setProperty($mqtt_properties[$i]['ID'], $value);
	//if (ZMQTT_DEBUG=="1" ) debmes('!!!!!!!device_on_l1','zigbee2mqtt');
	$this->setPropertyDevice($id, 'device_open');

}
else
{
	$path=$_GET['gw'].'/'.$_GET['friendlyname'].'/set';
	$this->setPropertyfn($path, 'state','open');
}


        $location=$_GET['location'];
	$vendor_id=$_GET['vendor_id'];
	$type_id=$_GET['type_id'];
	$vid_id=$_GET['vid_id'];
	$group_list_id=$_GET['group_list_id'];
        $this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");
}


 if ($this->view_mode=='device_close') {
//	$id=$this->id;

	if ($id){	
        //	$this->setProperty($mqtt_properties[$i]['ID'], $value);
	//if (ZMQTT_DEBUG=="1" ) debmes('!!!!!!!device_on_l1','zigbee2mqtt');
	$this->setPropertyDevice($id, 'device_close');
	}
	else
	{
	$path=$_GET['gw'].'/'.$_GET['friendlyname'].'/set';
	$this->setPropertyfn($path, 'state','close');
	}

        
        $location=$_GET['location'];
	$vendor_id=$_GET['vendor_id'];
	$type_id=$_GET['type_id'];
	$vid_id=$_GET['vid_id'];
	$group_list_id=$_GET['group_list_id'];
        $this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");
}

 if ($this->view_mode=='device_stop') {
//	$id=$this->id;
        if ($id){	
        //	$this->setProperty($mqtt_properties[$i]['ID'], $value);
	//if (ZMQTT_DEBUG=="1" ) debmes('!!!!!!!device_on_l1','zigbee2mqtt');
	$this->setPropertyDevice($id, 'device_stop');}
	else
	{
	$path=$_GET['gw'].'/'.$_GET['friendlyname'].'/set';
	$this->setPropertyfn($path, 'state','stop');
}


$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];

$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");
}


 if ($this->view_mode=='device_off_l1') {
//	$id=$this->id;

	if ($id){	
        //	$this->setProperty($mqtt_properties[$i]['ID'], $value);
	//if (ZMQTT_DEBUG=="1" ) debmes('!!!!!!!device_off_l1','zigbee2mqtt');
	$this->setPropertyDevice($id, 'device_off_l1');}
        else
{
	$path=$_GET['gw'].'/'.$_GET['friendlyname'].'/set';
	$this->setPropertyfn($path, 'state_l1','OFF');
}



$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];

$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");
}

 if ($this->view_mode=='device_on_l2') {
//	$id=$this->id;

if ($id){	

//	$this->setProperty($mqtt_properties[$i]['ID'], $value);
//if (ZMQTT_DEBUG=="1" ) debmes('!!!!!!!device_on_l2','zigbee2mqtt');
	$this->setPropertyDevice($id, 'device_on_l2');
	}
	else
	{
	$path=$_GET['gw'].'/'.$_GET['friendlyname'].'/l2/set';
	$this->setPropertyfn($path, 'state_l2','ON');
	}



$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];


$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");

}

 if ($this->view_mode=='device_off_l2') {
//	$id=$this->id;

if ($id){	

//	$this->setProperty($mqtt_properties[$i]['ID'], $value);
//if (ZMQTT_DEBUG=="1" ) debmes('!!!!!!!device_off_l2','zigbee2mqtt');
	$this->setPropertyDevice($id, 'device_off_l2');}

else
{
	$path=$_GET['gw'].'/'.$_GET['friendlyname'].'/l2/set';
	$this->setPropertyfn($path, 'state_l2','OFF');
}


$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$group_list_id=$_GET['group_list_id'];

$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");

}

 if ($this->view_mode=='device_off_left') {
//	$id=$this->id;

	if ($id){	

//	$this->setProperty($mqtt_properties[$i]['ID'], $value);
//if (ZMQTT_DEBUG=="1" ) debmes('!!!!!!!device_off_left','zigbee2mqtt');
	$this->setPropertyDevice($id, 'device_off_left');}

else
{
	$path=$_GET['gw'].'/'.$_GET['friendlyname'].'/set';
	$this->setPropertyfn($path, 'state_left','OFF');
}


$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];


$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");

}


 if ($this->view_mode=='device_off_right') {
//	$id=$this->id;

	if ($id){	

	//if (ZMQTT_DEBUG=="1" ) debmes('!!!!!!!device_off','zigbee2mqtt');
	//	$this->setProperty($mqtt_properties[$i]['ID'], $value);
	$this->setPropertyDevice($id, 'device_off_right');}

	else
	{
	$path=$_GET['gw'].'/'.$_GET['friendlyname'].'/set';
	$this->setPropertyfn($path, 'state_right','OFF');
}


$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];

$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");
}



  if ($this->view_mode=='startpairing') {

//$this->getConfig();
//$zz=explode('/',$this->config['MQTT_QUERY'])[0];

$zz=$_GET['gw'];
$this->sendcommand($zz.'/bridge/config/permit_join', 'true');



//  $this->redirect("?tab=service");
$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];

//$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id");
$this->redirect("?");

}


  if ($this->view_mode=='touchlink') {

//$this->getConfig();
//$zz=explode('/',$this->config['MQTT_QUERY'])[0];

$zz=$_GET['gw'];
$this->sendcommand($zz.'/bridge/config/touchlink/factory_reset', '');



//  $this->redirect("?tab=service");
$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];

//$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id");
$this->redirect("?");

}



  if ($this->view_mode=='stoppairing') {
//$this->getConfig();
//$zz=explode('/',$this->config['MQTT_QUERY'])[0];
$zz=$_GET['gw'];
$this->sendcommand($zz.'/bridge/config/permit_join', 'false');
//  $this->redirect("?tab=service");
$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];

//$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id");
$this->redirect("?");

}

  if ($this->view_mode=='resetznp') {


$this->getConfig();
$query_list = explode(',', $this->config['MQTT_QUERY']);
$total = count($query_list);

for ($i = 0; $i < $total; $i++) {

$zz=explode('/',$query_list[$i])[0];


//$zz=explode('/',$this->config['MQTT_QUERY'])[0];
$this->sendcommand($zz.'/bridge/config/reset', '');
//  $this->redirect("?tab=service");

}

$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];

//$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id");
$this->redirect("?");

}


  if ($this->view_mode=='leftbutton_disable') {
  $id=$this->id;

$fn=SQLSelectOne('select * from zigbee2mqtt_devices where ID='.$id)['IEEEADDR'];

$payload='
{
"operation_mode": {
"button": "left",
"state": "decoupled"
}
}';



$this->getConfig();
$query_list = explode(',', $this->config['MQTT_QUERY']);
$total = count($query_list);

for ($i = 0; $i < $total; $i++) {

$zz=explode('/',$query_list[$i])[0];


  $this->sendcommand($zz.'/'.$fn.'/system/set', $payload);
  $this->sendcommand($zz.'/'.$fn.'/set', $payload);
}

$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];

$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");


}

  if ($this->view_mode=='leftbutton_enable') {
  $id=$this->id;

$fn=SQLSelectOne('select * from zigbee2mqtt_devices where ID='.$id)['IEEEADDR'];

$payload='
{
"operation_mode": {
"button": "left",
"state": "control_left_relay"
}
}';

$this->getConfig();
$query_list = explode(',', $this->config['MQTT_QUERY']);
$total = count($query_list);

for ($i = 0; $i < $total; $i++) {

$zz=explode('/',$query_list[$i])[0];


  $this->sendcommand($zz.'/'.$fn.'/system/set', $payload);
  $this->sendcommand($zz.'/'.$fn.'/set', $payload);
}
//  $this->redirect("?tab=service");
$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];

$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");
//$this->redirect("?");

}
/////////////////////
  if ($this->view_mode=='rightbutton_disable') {
  $id=$this->id;

$fn=SQLSelectOne('select * from zigbee2mqtt_devices where ID='.$id)['IEEEADDR'];

$payload='
{
"operation_mode": {
"button": "right",
"state": "decoupled"
}
}';

$this->getConfig();
$query_list = explode(',', $this->config['MQTT_QUERY']);
$total = count($query_list);

for ($i = 0; $i < $total; $i++) {

$zz=explode('/',$query_list[$i])[0];
$this->sendcommand($zz.'/'.$fn.'/system/set', $payload);
$this->sendcommand($zz.'/'.$fn.'/set', $payload);
}
//  $this->redirect("?tab=service");
$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];

$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");
}

  if ($this->view_mode=='rightbutton_enable') {
  $id=$this->id;

$fn=SQLSelectOne('select * from zigbee2mqtt_devices where ID='.$id)['IEEEADDR'];

$payload='
{
"operation_mode": {
"button": "right",
"state": "control_right_relay"
}
}';

$this->getConfig();
$query_list = explode(',', $this->config['MQTT_QUERY']);
$total = count($query_list);

for ($i = 0; $i < $total; $i++) {

$zz=explode('/',$query_list[$i])[0];
$this->sendcommand($zz.'/'.$fn.'/system/set', $payload);
$this->sendcommand($zz.'/'.$fn.'/set', $payload);
}
//  $this->redirect("?tab=service");
$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];

$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");
}
///////////////////////

  if ($this->view_mode=='singlebutton_disable') {
  $id=$this->id;

$fn=SQLSelectOne('select * from zigbee2mqtt_devices where ID='.$id)['IEEEADDR'];

$payload='
{
"operation_mode": {
"button": "single",
"state": "decoupled"
}
}';

$this->getConfig();
$query_list = explode(',', $this->config['MQTT_QUERY']);
$total = count($query_list);

for ($i = 0; $i < $total; $i++) {

$zz=explode('/',$query_list[$i])[0];
$this->sendcommand($zz.'/'.$fn.'/system/set', $payload);
$this->sendcommand($zz.'/'.$fn.'/set', $payload);
}
//  $this->redirect("?tab=service");
$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];

$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");
}

  if ($this->view_mode=='singlebutton_enable') {
  $id=$this->id;

$fn=SQLSelectOne('select * from zigbee2mqtt_devices where ID='.$id)['IEEEADDR'];

$payload='
{
"operation_mode": {
"button": "single",
"state": "control_relay"
}
}';

$this->getConfig();
$query_list = explode(',', $this->config['MQTT_QUERY']);
$total = count($query_list);

for ($i = 0; $i < $total; $i++) {

$zz=explode('/',$query_list[$i])[0];
$this->sendcommand($zz.'/'.$fn.'/system/set', $payload);
$this->sendcommand($zz.'/'.$fn.'/set', $payload);
//  $this->redirect("?tab=service");
}
$location=$_GET['location'];
$vendor_id=$_GET['vendor_id'];
$type_id=$_GET['type_id'];
$vid_id=$_GET['vid_id'];
$group_list_id=$_GET['group_list_id'];

$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");
}








 if ($this->view_mode=='srv_stop') {
$a=shell_exec("sudo systemctl stop zigbee2mqtt");
$a=shell_exec("sudo systemctl status zigbee2mqtt");
$a =  str_replace( array("\r\n","\r","\n") , '<br>' , $a);
$out['status']=$a;
   $this->redirect("?tab=service");

}

 if ($this->view_mode=='srv_restart') {
$a=shell_exec("sudo systemctl restart zigbee2mqtt");
$a=shell_exec("sudo systemctl status zigbee2mqtt");
$a =  str_replace( array("\r\n","\r","\n") , '<br>' , $a);
$out['status']=$a;


   $this->redirect("?tab=service");
}


 if ($this->view_mode=='get_map') {

   $this->get_map();
   $this->updateparrent();
   $this->redirect("?tab=map&viz=1");
}

 if ($this->view_mode=='get_map_graph') {

   $this->get_map_graphwiz();
//   $this->updateparrent();
   $this->redirect("?tab=map&viz=2");
}


 if ($this->view_mode=='get_map_graph_req') {

//   $this->get_map_graphwiz();
//   $this->updateparrent();
//   $this->redirect("?tab=map");


$graph=SQLSelectOne ('select * from zigbee2mqtt where value like "digraph%"');
$graphdata=$graph['VALUE'];

   $this->redirect("http://www.webgraphviz.com/?tab=map");


}





 if ($this->view_mode=='updatedb') {

   $this->updatedb();
   $this->redirect("?tab=service");
}



 if ($this->view_mode=='bind') {


global $target;
global $endpoint;

//$target=$target1;

//$target=$_POST['target1'];
global $source;
//$source=$source1;
global $key;

//debmes('view_mode: '.$this->view_mode.' $id:'.$id." target: ".$target." source:".$source." key:".$key, 'zigbee2mqtt'); 

$targettemp=SQLSelectOne('select * from zigbee2mqtt_devices where TITLE="'.$target.'"');
$sourcetemp=SQLSelectOne('select * from zigbee2mqtt_devices where TITLE="'.$source.'"');


$rec=SQLSelectOne('select * from zigbee2mqtt_bind where KEYY="123"' );

$rec['SOURCE']=$source;
$rec['SOURCETYPE']=$sourcetemp['SELECTTYPE'];

$rec['TARGET']=$target;
$rec['TARGETTYPE']=$targettemp['SELECTTYPE'];
$rec['TARGETENDPOINT']=$endpoint;
$rec['KEYY']=$key;
$rec['ADDED']=date('Y-m-d H:i:s');
if (!$rec['ID']) SQLInsert('zigbee2mqtt_bind', $rec);

$this->getConfig();
$zz=explode('/',$this->config['MQTT_QUERY'])[0];
$this->sendcommand($zz.'/bridge/bind/'.$target, $source);


  $this->redirect("?tab=bind");
}


 if ($this->view_mode=='cleardevicelog') {


$id=$this->id;


$rec=SQLSelectOne('select * from zigbee2mqtt_devices where ID="'.$id.'"' );
$ieee=$rec['IEEEADDR'];

sqlexec('delete from zigbee2mqtt_log where TITLE like "%'.$ieee.'%"');
//debmes('delete from zigbee2mqtt_log where TITLE like "%'.$ieee.'%"', 'z2m');

  $this->redirect("?view_mode=view_mqtt&id=".$id."&tab=device_log");


}

 if ($this->view_mode=='clearlog') {






sqlexec('delete from zigbee2mqtt_log where TITLE like "%'.$ieee.'%"');


  $this->redirect("?view_mode=&id=".$id."&tab=log2");


}


 if ($this->view_mode=='unbind') {


$id=$this->id;


$target=$_POST['target'];
$source=$_POST['source'];

//debmes('view_mode: '.$this->view_mode.' $id:'.$id." target: ".$target." source:".$source, 'zigbee2mqtt'); 

$this->getConfig();
$zz=explode('/',$this->config['MQTT_QUERY'])[0];
$this->sendcommand($zz.'/bridge/unbind/'.$target, $source);


sqlexec('delete from zigbee2mqtt_bind where ID='.$id);


  $this->redirect("?tab=bind");

}





//$vm1=$this->view_mode;
// echo "<script type='text/javascript'>";
// echo "alert('$vm1');";
// echo "</script>";



 if ($this->view_mode=='update_settings') {



   global $mqtt_client;
   global $mqtt_debug;
   global $mqtt_host;
   global $mqtt_username;
   global $mqtt_password;
   global $mqtt_auth;
   global $mqtt_port;
   global $z2m_logmode2;
   global $mqtt_query;
   global $zigbee2mqttpath;
   global $z2m_view;
   global $z2m_ntiles;
   global $z2m_hist;
   global $slsip;
//echo $zigbee2mqttpath;

//$vm1=$this->view_mode;
// echo "<script type='text/javascript'>";
// echo "alert('$z2m_logmode');";
// echo "</script>";


   $this->config['MQTT_CLIENT']=trim($mqtt_client);
   $this->config['MQTT_DEBUG']=trim($mqtt_debug);
   $this->config['ZIGBEE2MQTTPATH']=trim($zigbee2mqttpath);
   $this->config['MQTT_HOST']=trim($mqtt_host);
   $this->config['MQTT_USERNAME']=trim($mqtt_username);
   $this->config['MQTT_PASSWORD']=trim($mqtt_password);
   $this->config['MQTT_AUTH']=(int)$mqtt_auth;
   $this->config['MQTT_PORT']=(int)$mqtt_port;
   $this->config['MQTT_QUERY']=trim($mqtt_query);
   $this->config['Z2M_LOGMODE']=trim($z2m_logmode2);
   $this->config['Z2M_VIEW']=trim($z2m_view);
   $this->config['Z2M_HIST']=trim($z2m_hist);
   $this->config['SLSIP']=trim($slsip);
   $this->config['Z2M_NTILES']=trim($z2m_ntiles);




// $this->sendcommand('zigbee2mqtt/bridge/config/log_level', $z2m_logmode);


$cmd='
include_once(DIR_MODULES . "zigbee2mqtt/zigbee2mqtt.class.php");
$z2m= new zigbee2mqtt();
$z2m->getConfig();
$zz=explode("/",$z2m->config["MQTT_QUERY"])[0];
$z2m->sendcommand($zz."/bridge/config/log_level", "'.$z2m_logmode2.'");';
//debmes($cmd, 'z2mdebug');
SetTimeOut('z2m_set_dubug',$cmd, '1'); 




   $this->saveConfig();

//        if ((time() - gg('cycle_zigbee2mqttRun')) > 360*30 ) {setGlobal('cycle_zigbee2mqttControl', 'restart');}
setGlobal('cycle_zigbee2mqttControl', 'restart');

   



   $this->redirect("?tab=settings");
 }

 if (!$this->config['MQTT_HOST']) {
  $this->config['MQTT_HOST']='localhost';
  $this->saveConfig();
 }
 if (!$this->config['MQTT_PORT']) {
  $this->config['MQTT_PORT']='1883';
  $this->saveConfig();
 }

// if (!$this->config['ZIGBEE2MQTTPATCH']) {
//  $this->config['ZIGBEE2MQTTPATCH']='/opt/zigbee2mqtt/';
//  $this->saveConfig();
// }


 if (!$this->config['MQTT_QUERY']) {
  $this->config['MQTT_QUERY']='zigbee2mqtt/#';
  $this->saveConfig();
 }


// if ($this->data_source=='mqtt' || $this->data_source==''|| $this->data_source=='multiple_z2m' ) {
 if ($this->data_source=='mqtt' || $this->data_source=='' ) {
//  if ($this->view_mode=='' || $this->view_mode=='search_mqtt') {
   $this->search_mqtt($out);
  }




  if ($this->view_mode=='multiple_z2m') {
//echo "13";

//$vm=$this->view_mode;
// echo "<script type='text/javascript'>";
// echo "alert('$vm');";
// echo "</script>";


global $location_id;
$vm=$location_id;


global $type_id;
global $vendor_id;
global $vid_id;
global $group_list_id;


// echo "<script type='text/javascript'>";
// echo "alert('$vm');";
// echo "</script>";




   $this->search_mqtt($out);
   $this->redirect("?location=".$vm.'&type_id='.$type_id.'&vendor_id='.$vendor_id.'&vid_id='.$vid_id."&group_list_id=$group_list_id");

  }


  if ($this->view_mode=='edit_mqtt') {
   $this->edit_mqtt($out, $this->id);

  }




//echo $this->view_mode;
  if ($this->view_mode=='creategroup') {
//   $this->edit_mqtt($out, $this->id);
//if (ZMQTT_DEBUG=="1" ) debmes('creategroup id:'.$this->id.' group:'.$this->groupname, 'zigbee2mqtt');

  }


  if ($this->view_mode=='delete_dev') {
   $this->delete_dev($this->id);
   $this->redirect("?");
  }


  if ($this->view_mode=='delete_dev_z2m') {
$this->getConfig();
$query_list = explode(',', $this->config['MQTT_QUERY']);
$total = count($query_list);

for ($i = 0; $i < $total; $i++) {
$zz=explode('/',$query_list[$i])[0];
$this->sendcommand($zz.'/bridge/config/remove', $this->ieee);
$this->sendcommand($zz.'/bridge/config/force_remove', $this->ieee);
}
   $this->delete_dev($this->id);
   $this->redirect("?");
  }

  if ($this->view_mode=='delete_dev_z2m_only') {
$this->getConfig();
//$zz=explode('/',$this->config['MQTT_QUERY'])[0];
$zz=$_GET['gw'];

$this->sendcommand($zz.'/bridge/config/remove', $this->ieee);
$this->sendcommand($zz.'/bridge/config/force_remove', $this->ieee);
  $this->redirect("?");
  }


  if ($this->view_mode=='delete_group') {

$rec=SQLSElectOne('select * from zigbee2mqtt_grouplist where ID='.$this->id);
$fn=$rec['TITLE'];
$id=$this->id;

$this->getConfig();
$zz=explode('/',$this->config['MQTT_QUERY'])[0];
$this->sendcommand($zz.'/bridge/group/'.$fn.'/remove', $this->ieee);


  SQLExec("DELETE FROM zigbee2mqtt_grouplist WHERE ID='".$id."'");
   $this->redirect("?tab=groups");
  }


  if ($this->view_mode=='deletefromallgroup') {
$id=$this->id;
//$rec=SQLSElectOne('select * from zigbee2mqtt_grouplist where ID='.$id);
$rec=SQLSElectOne('select * from zigbee2mqtt_devices where ID='.$id);
$fn=$rec['IEEEADDR'];

$this->getConfig();
$zz=explode('/',$this->config['MQTT_QUERY'])[0];
$this->sendcommand($zz.'/bridge/group/remove_all', $this->ieee);

   $this->redirect("?view_mode=view_mqtt&id=$id&tab=edit_parametrs");
  }






  if ($this->view_mode=='delete_mqtt') {
   $this->delete_mqtt($this->id);
//   $this->redirect("?");

   $this->redirect("?tab=edit_parametrs&view_mode=view_mqtt&id=".$_REQUEST['redirectid']);
  }


     if ($this->view_mode=='clear_trash') {
         $this->clear_trash();
         $this->redirect("?");
     }

     if ($this->view_mode=='refresh_db') {
         $this->refresh_db();

         $this->redirect("?");
     }


     if ($this->view_mode=='getgroupslist') {

  SQLExec ('update  zigbee2mqtt set VALUE="" where TITLE="zigbee2mqtt/bridge/log"');
  //SQLExec("DELETE FROM zigbee2mqtt_grouplist WHERE ID='".$this->id."'");
//  SQLExec("DELETE FROM zigbee2mqtt_grouplist");
//zigbee2mqtt/bridge/device/[friendly_name]/get_group_membership
//https://www.zigbee2mqtt.io/information/mqtt_topics_and_message_structure.html

//  $this->sendcommand('zigbee2mqtt/bridge/device/0x00158d0002c65d56/get_group_membership', '');
//  $this->sendcommand('zigbee2mqtt/bridge/device/0x00158d0002c65d56/grouplist', '');
//  $this->sendcommand('zigbee2mqtt/bridge/device/0x00158d0002c65d56/get_group_membership', 'grouplist');

$this->getConfig();
$zz=explode('/',$this->config['MQTT_QUERY'])[0];
$this->sendcommand($zz.'/bridge/config/groups', '');


//  $this->sendcommand('zigbee2mqtt/bridge/group/group1', '');
  $this->redirect("?tab=groups");

}


 if ($this->view_mode=='clearallgroups') {

  SQLExec ('update  zigbee2mqtt set VALUE="" where TITLE="zigbee2mqtt/bridge/log"');
  //SQLExec("DELETE FROM zigbee2mqtt_grouplist WHERE ID='".$this->id."'");
  
//zigbee2mqtt/bridge/device/[friendly_name]/get_group_membership
//https://www.zigbee2mqtt.io/information/mqtt_topics_and_message_structure.html

//  $this->sendcommand('zigbee2mqtt/bridge/device/0x00158d0002c65d56/get_group_membership', '');
//  $this->sendcommand('zigbee2mqtt/bridge/device/0x00158d0002c65d56/grouplist', '');
//  $this->sendcommand('zigbee2mqtt/bridge/device/0x00158d0002c65d56/get_group_membership', 'grouplist');

$tmp=SQLSelect("SELECT * from zigbee2mqtt_devices");
  for($i=0;$i<count($tmp);$i++) {

$this->getConfig();
$zz=explode('/',$this->config['MQTT_QUERY'])[0];
$this->sendcommand($zz.'/bridge/config/device_group_remove_all',$tmp[$i]['TITLE']);
  //$this->sendcommand('zigbee2mqtt/bridge/group/'.$tmp[$i]['TITLE'].'/remove_all','');
  
}


$tmp=SQLSelect("SELECT * from zigbee2mqtt_grouplist");
  for($i=0;$i<count($tmp);$i++) {

  //$this->sendcommand('zigbee2mqtt/bridge/config/device_group_remove_all',$tmp[$i]['TITLE']);
$this->getConfig();
$zz=explode('/',$this->config['MQTT_QUERY'])[0];
$this->sendcommand($zz.'/bridge/group/'.$tmp[$i]['TITLE'].'/remove_all','');
  
}

SQLExec("DELETE FROM zigbee2mqtt_grouplist");
//  $this->sendcommand('zigbee2mqtt/bridge/group/group1', '');
  $this->redirect("?tab=groups");

}



     if ($this->view_mode=='refresh_mqtt') {
//         $this->refresh_db();
//  $this->sendcommand('zigbee2mqtt/bridge/log', 'zigbee2mqtt/bridge/config/devices');

//$this->getConfig();
//$zz=explode('/',$this->config['MQTT_QUERY'])[0];


$this->getConfig();
$query_list = explode(',', $this->config['MQTT_QUERY']);
$total = count($query_list);

for ($i = 0; $i < $total; $i++) {

$zz=explode('/',$query_list[$i])[0];
SQLExec ('update  zigbee2mqtt set VALUE="" where TITLE="'.$zz.'/bridge/log"');
$this->sendcommand($zz.'/bridge/config/devices', '');

}
//  $this->sendcommand('zigbee2mqtt/bridge/config/devices/get', '');


//$cmd='
//include_once(DIR_MODULES . "zigbee2mqtt/zigbee2mqtt.class.php");
//$z2m= new zigbee2mqtt();
//$z2m->refreshdb_mqtt(); 
//
//';
// SetTimeOut('z2m_refresh_mqtt',$cmd, '10'); 

         $this->redirect("?");
     }



 }



function clear_trash() {
    $res=SQLSelect("SELECT ID FROM zigbee2mqtt WHERE LINKED_OBJECT='' AND LINKED_PROPERTY=''");
//    $res=SQLSelect("SELECT ID FROM zigbee2mqtt_devices WHERE LINKED_OBJECT='' AND LINKED_PROPERTY=''");
    $total = count($res);
    for ($i=0;$i<$total;$i++) {
        $this->delete_mqtt($res[$i]['ID']);
    }
}

function updatedb() {
  SQLExec('DROP TABLE IF EXISTS zigbee2mqtt_devices_list');
  SQLExec('DROP TABLE IF EXISTS zigbee2mqtt_devices_command');
   $this->createdb();


}


function refresh_db() {
/*
 $this->getConfig();
$zigbee2mqttpath=$this->config['ZIGBEE2MQTTPATH'];
$filename=$zigbee2mqttpath.'/data/database.db';

//echo 'hello';
$a=file_get_contents ($filename);

$settings = explode("\n", $a);

    $total = count($settings);
    for ($i=0;$i<$total;$i++) {
	$json=json_decode($settings[$i]);
        foreach ($json as $key=> $value) {if ($key=='type') {$type=$value;}}

if ($type=='Coordinator') 
{
$sql="SELECT * FROM zigbee2mqtt_devices where TITLE='bridge'";
    $res2=SQLSelectOne($sql);
   foreach (json_decode($settings[$i]) as $key=> $value)
{
if ($key=='ieeeAddr') $res2['IEEEADDR']=$value;
if ($key=='type') $res2['TYPE']=$value;
$res2['MODEL']='cc2531';
$res2['TYPE']='cc2531';
$res2['MODELID']='cc2531';

if ($key=='nwkAddr') $res2['NWKADDR']=$value;
if ($key=='manufId') $res2['MANUFID']=$value;
if ($key=='manufacturerName') $res2['MANUFNAME']=$value;
if ($key=='powerSource') $res2['POWERSOURCE']=$value;
if ($key=='modelId') $res2['MODEL']=$value;
if ($key=='modelId') $res2['MODELID']=$value;
if ($key=='status') $res2['STATUS']=$value;
if ($key=='devId') $res2['DID']=$value;
if ($key=='_id') $res2['D_ID']=$value;
}
//print_r($res2);
SQLUPDATE('zigbee2mqtt_devices', $res2);
}
        foreach ($json as $key=> $value) {if ($key=='ieeeAddr') $cdev=$value;	  }
//devices
$sql="SELECT * FROM zigbee2mqtt_devices where IEEEADDR='$cdev'";
if (ZMQTT_DEBUG=="1" ) debmes($sql,'zigbee2mqtt');
    $res=SQLSelectOne($sql);
     if($res['ID']) 
{ /* If path_write foud in db */
/*
        foreach ($json as $key=> $value) {
if ($key=='type') $res['TYPE']=$value;
if ($key=='nwkAddr') $res['NWKADDR']=$value;
if ($key=='manufId') $res['MANUFID']=$value;
if ($key=='manufName') $res['MANUFNAME']=$value;
if ($key=='powerSource') $res['POWERSOURCE']=$value;
if ($key=='modelId') $res['MODEL']=$value;
if ($key=='modelId') $res['MODELID']=$value;
if ($key=='status') $res['STATUS']=$value;
if ($key=='devId') $res['DID']=$value;
if ($key=='_id') $res['D_ID']=$value;
}
SQLUPDATE('zigbee2mqtt_devices', $res);
      }
$this->updateparrent();
//if (ZMQTT_DEBUG=="1" ) debmes('123', 'zigbee2mqtt');
}
*/
}


function refreshdb_mqtt() {
/*
$log=SQLSelectOne ('select * from zigbee2mqtt where TITLE="zigbee2mqtt/bridge/log"');
$log1=$log['VALUE'];
//if (ZMQTT_DEBUG=="1" ) debmes('log: '.$log1, 'zigbee2mqtt');
$json2=json_decode($log1);

//if (ZMQTT_DEBUG=="1" ) debmes($json, 'zigbee2mqtt');


$json=$json2->{'message'};
//if (ZMQTT_DEBUG=="1" ) debmes($json, 'zigbee2mqtt');

/*
foreach ( $json as $v)
{
if (ZMQTT_DEBUG=="1" ) debmes('****************', 'zigbee2mqtt');
if (ZMQTT_DEBUG=="1" ) debmes('ieeeAddr:'.$v, 'zigbee2mqtt');
}
*/
/*

    $total = count($json);
//   if (ZMQTT_DEBUG=="1" ) debmes('total:'.$total, 'zigbee2mqtt');
    for ($i=0;$i<$total;$i++) {

$cdev=$json[$i]->{'ieeeAddr'};

if ($cdev){
//if (ZMQTT_DEBUG=="1" ) debmes('cdev:'.$cdev, 'zigbee2mqtt');
$sql="SELECT * FROM zigbee2mqtt_devices where IEEEADDR='".$cdev."'";
//if (ZMQTT_DEBUG=="1" ) debmes($sql, 'zigbee2mqtt');
$res2=SQLSelectOne($sql);


$temp=sqlselectone ("SELECT * FROM zigbee2mqtt_devices_list where model='".$json[$i]->{'model'}."'");

if ($res2['TITLE']=='bridge') {
$res2['MODEL']='cc2531';
$res2['TYPE']='cc2531';
$res2['MODELID']='cc2531';
$res2['MANUFACTURE']='TI';
$res2['SELECTVENDOR']='TI';
$res2['MODELID']='cc2531';
}

//проверяем, может нам вместо model пришел modelid

$tempmodel=str_replace($temp['model'], '/', '-');
$model=$tempmodel;

debmes('$tempmodel '.$tempmodel, 'z2mtempmodel');


$res44=sqlselectone("select * from zigbee2mqtt_devices_list where zigbeeModel='$tempmodel'");

if ($res44['model']) {$model=$res44['model'];} 

debmes('$model '.$model, 'z2mtempmodel');





if (!$res2['SELECTTYPE']) $res2['SELECTTYPE']=$model;

if (!$res2['SELECTVENDOR']) $res2['SELECTVENDOR']=$temp['vendor'];

$res2['MANUFACTURE']=$temp['vendor'];
//$res2['MODEL']=$json[$i]->{'model'};
$res2['MODEL']=$temp['model'];

//$res2['DEVICE_NAME']=$temp['zigbeeModel'];
$res2['DEVICE_NAME']=$model;



$res2['TYPE']= 	$json[$i]->{'type'};


$res2['MODELID']=$json[$i]->{'modelId'};
$res2['NWKADDR']=$json[$i]->{'nwkAddr'};
$res2['HWVERSION']=$json[$i]->{'hwVersion'};
$res2['SWBUILDID']=$json[$i]->{'swBuildId'};

//$res2['TYPE']=$temp['zigbeeModel'];
//$res2['MODEL']=$json[$i]->{'type'};


//$res2['IEEEADDR']=      $json[$i]->{'ieeeAddr'};
$res2['IEEEADDR']=$cdev;
//debmes($res2, 'zigbee2mqtt1');

     if ($res2['ID']) 
{
// debmes('update', 'zigbee2mqtt1');

SQLUPDATE('zigbee2mqtt_devices', $res2);
}
else 
{
// debmes('insert', 'zigbee2mqtt1');
//if ($json[$i]->{'model'}) $res2['SELECTTYPE']=    $json[$i]->{'model'};
if ($json[$i]->{'model'}) $res2['SELECTTYPE']= $model;




$res2['TITLE']=$res2['IEEEADDR'];
//debmes($res2, 'zigbee2mqtt1');
if (($res2['TITLE'])&&($res2['TYPE']!='Coordinator')&&($res2['TITLE']!='bridge')) 
SQLInsert('zigbee2mqtt_devices', $res2);
}


if ($res2['TYPE']=='Coordinator') SQLExec	('update zigbee2mqtt_devices set SELECTVENDOR="Texas Instruments", SELECTTYPE="cc2531", IEEEADDR="'.$res2['IEEEADDR'].'" where TITLE="bridge"', $res2);
}






}
/*
if (ZMQTT_DEBUG=="1" ) debmes($sql, 'zigbee2mqtt');
$res2=SQLSelectOne($sql);

     if($res['ID']) 
{
$res2['TYPE']=   	$json[$i]->{'type'};
$res2['SELECTTYPE']=    $json[$i]->{'model'};
SQLUPDATE('zigbee2mqtt_devices', $res2);
}
else 
{
$res2['TITLE']=     $json[$i]->{'ieeeAddr'};
$res2['IEEEADDR']=   $json[$i]->{'ieeeAddr'};
$res2['TYPE']=   	$json[$i]->{'type'};
$res2['SELECTTYPE']=    $json[$i]->{'model'};
SQLIsert('zigbee2mqtt_devices', $res2);
}
}
//$this->updateparrent();
*/

}

function parse_deviceinfo($ar, $gw) {

//$log=SQLSelectOne ('select * from zigbee2mqtt where TITLE="zigbee2mqtt/bridge/log"');
//$log1=$log['VALUE'];

$log1=$ar;
//if (ZMQTT_DEBUG=="1" ) debmes('log: '.$log1, 'zigbee2mqtt');
//if (ZMQTT_DEBUG=="1" ) debmes($log1, 'zigbee2mqtt');
//$json2=json_decode($log1);
$json2=$log1;

//if (ZMQTT_DEBUG=="1" ) 
//debmes($json, 'zigbee2mqttparse');


$json=$json2->{'message'};
//debmes($json, 'zigbee2mqttparse');

    $total = count($json);
//   if (ZMQTT_DEBUG=="1" ) debmes('total:'.$total, 'zigbee2mqtt');
    for ($i=0;$i<$total;$i++) {

$cdev=$json[$i]->{'ieeeAddr'};

if ($cdev){
$model="";

//debmes('start '.$i, 'zigbee2mqttparse');

//if (ZMQTT_DEBUG=="1" ) debmes('cdev:'.$cdev, 'zigbee2mqtt');
$sql="SELECT * FROM zigbee2mqtt_devices where IEEEADDR='".$cdev."'";
//if (ZMQTT_DEBUG=="1" ) debmes($sql, 'zigbee2mqtt');
$res2=SQLSelectOne($sql);

//debmes($res2, 'zigbee2mqttparse');

if ($json[$i]->{'model'}) 
{$tempmodel=str_replace(   '/', '-',$json[$i]->{'model'});
//debmes('$tempmodel '.$tempmodel, 'zigbee2mqttparse');
$model=$tempmodel;
$res44=sqlselectone("select * from zigbee2mqtt_devices_list where zigbeeModel='$tempmodel'");
if ($res44['model']) {$model=$res44['model'];} 
}

//debmes('$model '.$model, 'zigbee2mqttparse');





$temp=sqlselectone ("SELECT * FROM zigbee2mqtt_devices_list where model='".$model."'");

if ($res2['TITLE']=='bridge') {
$res2['MODEL']='cc2531';
$res2['TYPE']='cc2531';
$res2['MODELID']='cc2531';
$res2['MANUFACTURE']='TI';
$res2['SELECTVENDOR']='TI';
$res2['MODELID']='cc2531';
}


//if (!$res2['SELECTTYPE']) $res2['SELECTTYPE']=str_replace(  $json[$i]->{'model'}, '/', '-');
if (!$res2['SELECTTYPE']) $res2['SELECTTYPE']=$model;
//$res2['SELECTTYPE']=$model;
if (!$res2['SELECTVENDOR']) $res2['SELECTVENDOR']=$temp['vendor'];

$res2['MANUFACTURE']=$temp['vendor'];
//$res2['MODEL']=$json[$i]->{'model'};
$res2['MODEL']=$json[$i]->{'model'};


//$res2['DEVICE_NAME']=$temp['zigbeeModel'];
//$res2['DEVICE_NAME']=str_replace(   '/', '-',$json[$i]->{'modelID'});
$res2['DEVICE_NAME']=$json[$i]->{'modelID'};
$res2['POWERSOURCE']=$json[$i]->{'powerSource'};
$res2['TYPE']=   	$json[$i]->{'type'};

$res2['MANUFID']=   	$json[$i]->{'manufId'};
$res2['MODELID']=$json[$i]->{'modelId'};
$res2['NWKADDR']=$json[$i]->{'nwkAddr'};
$res2['HWVERSION']=$json[$i]->{'hwVersion'};
$res2['SWBUILDID']=$json[$i]->{'swBuildId'};
$res2['MANUFNAME']=$json[$i]->{'manufName'};

$res2['GW']=$gw;




//$res2['TYPE']=$temp['zigbeeModel'];
//$res2['MODEL']=$json[$i]->{'type'};


//$res2['IEEEADDR']=      $json[$i]->{'ieeeAddr'};
$res2['IEEEADDR']=$cdev;


     if ($res2['ID']) 
{
//if (ZMQTT_DEBUG=="1" ) debmes('update', 'zigbee2mqtt');
//if (ZMQTT_DEBUG=="1" ) debmes($res2, 'zigbee2mqtt');
SQLUPDATE('zigbee2mqtt_devices', $res2);
}
else 
{
//if (ZMQTT_DEBUG=="1" ) debmes('insert', 'zigbee2mqtt');
//if ($json[$i]->{'model'}) $res2['SELECTTYPE']=    $json[$i]->{'model'};
if ($json[$i]->{'model'}) $res2['SELECTTYPE']= $model;



$res2['TITLE']=$res2['IEEEADDR'];
//if (ZMQTT_DEBUG=="1" ) debmes($res2, 'zigbee2mqtt');
if (($res2['TITLE'])&&($res2['TYPE']!='Coordinator')&&($res2['TITLE']!='bridge')&&($res2['TYPE']!='bridge') ) 




SQLInsert('zigbee2mqtt_devices', $res2);
}


if ($res2['TYPE']=='Coordinator') SQLExec	('update zigbee2mqtt_devices set MANUFNAME="parse_deviceinfo", SELECTVENDOR="Texas Instruments", SELECTTYPE="cc2531", IEEEADDR="'.$res2['IEEEADDR'].'" where TITLE="bridge"', $res2);
}






}

}


function updateparrent()
{

$rec4=SQLSelect ("select * from zigbee2mqtt_devices ");
    $total = count($rec4);
    for ($ij=0;$ij<$total;$ij++) 
{
$rec4[$ij]['LQI']='';
$rec4[$ij]['STATUS']='';
$rec4[$ij]['PARRENTIEEEADDR']='';
//if (ZMQTT_DEBUG=="1" ) debmes($rec4[$ij], 'z2m');
SQLUpdate(  'zigbee2mqtt_devices',$rec4[$ij]); 
}

$allieee="";
$maparray=SQLSelectOne ('select * from zigbee2mqtt where TITLE="zigbee2mqtt/bridge/networkmap/raw"');
$map=$maparray['VALUE'];
//if (ZMQTT_DEBUG=="1" ) debmes($map, 'zigbee2mqtt');

//$json1=json_decode($map);
$json1 = json_decode($map, JSON_OBJECT_AS_ARRAY);

    $total = count($json1);
//if (ZMQTT_DEBUG=="1" ) debmes($total, 'zigbee2mqtt');

    for ($ij=0;$ij<$total;$ij++) {
//$str=$json1[$ij]['ieeeAddr'].":".$json1[$ij]['nwkAddr'];
$str=$json1[$ij];

$ieeeAddr=$str->{'ieeeAddr'};
$parent=$str->{'parent'};
$status=$str->{'status'};
$nwkAddr=$str->{'nwkAddr'};
$lqi=$str->{'lqi'};

//if (ZMQTT_DEBUG=="1" ) debmes($ieeeAddr.":".$parent, 'zigbee2mqtt');

$defaultiee=SQLSelectOne ("select * from zigbee2mqtt_devices where TITLE='bridge'")['IEEEADDR'];

//if (ZMQTT_DEBUG=="1" ) debmes('default:'.$defaultiee, 'zigbee2mqtt');

$rec3=SQLSelectOne ("select * from zigbee2mqtt_devices where IEEEADDR='$ieeeAddr'");
if   ($rec3) 
{
//if (strlen($parent)>3)  {$rec3['PARRENTIEEEADDR']=$parent;} else {   $rec3['PARRENTIEEEADDR']=$defaultiee; }
$rec3['PARRENTIEEEADDR']=$parent;
$rec3['LQI']=$lqi;
$rec3['STATUS']=$status;
$rec3['NWKADDR']=$nwkAddr;
if (strpos($allieee,$ieeeAddr)==0)  SQLUpdate(  'zigbee2mqtt_devices',$rec3); 


}

$allieee.=$ieeeAddr.";";


//var_dump( $str);
// $json3= json_decode  ($str,true);

//foreach ( $json3 as $key=>$value)
//{if (ZMQTT_DEBUG=="1" ) debmes($key.":".$value, 'zigbee2mqtt');}



}


}




function parse_rawnodes($json, $gw)
{

//debmes('parse_rawnodes', 'z2mmap');
///clear
$rec4=SQLSelect ("select * from zigbee2mqtt_devices ");
    $total = count($rec4);
    for ($ij=0;$ij<$total;$ij++) 
{
$rec4[$ij]['LQI']='';
$rec4[$ij]['STATUS']='';
$rec4[$ij]['PARRENTIEEEADDR']='';
//if (ZMQTT_DEBUG=="1" ) debmes($rec4[$ij], 'z2m');
SQLUpdate(  'zigbee2mqtt_devices',$rec4[$ij]); 
}

$defaultiee=SQLSelectOne ("select * from zigbee2mqtt_devices where TITLE='bridge'")['IEEEADDR'];

//$allieee="";
//$maparray=SQLSelectOne ('select * from zigbee2mqtt where TITLE="zigbee2mqtt/bridge/networkmap/raw"');
//$map=$maparray['VALUE'];
//if (ZMQTT_DEBUG=="1" ) debmes($map, 'zigbee2mqtt');

//$json1=json_decode($map);
$json1 = json_decode($json, JSON_OBJECT_AS_ARRAY);

    $total = count($json1);
//if (ZMQTT_DEBUG=="1" ) debmes($total, 'zigbee2mqtt');

    for ($ij=0;$ij<$total;$ij++) {
//$str=$json1[$ij]['ieeeAddr'].":".$json1[$ij]['nwkAddr'];
$str=$json1[$ij];

$ieeeAddr=$str->{'sourceIeeeAddr'};
$parent=$str->{'targetIeeeAddr'};
$status=$str->{'status'};
$nwkAddr=$str->{'sourceNwkAddr'};
$lqi=$str->{'lqi'};

//if (ZMQTT_DEBUG=="1" ) debmes($ieeeAddr.":".$parent, 'zigbee2mqtt');



//if (ZMQTT_DEBUG=="1" ) debmes('default:'.$defaultiee, 'zigbee2mqtt');

$rec3=SQLSelectOne ("select * from zigbee2mqtt_devices where IEEEADDR='$ieeeAddr'");
if   ($rec3) 
{
//if (strlen($parent)>3)  {$rec3['PARRENTIEEEADDR']=$parent;} else {   $rec3['PARRENTIEEEADDR']=$defaultiee; }
$rec3['PARRENTIEEEADDR']=$parent;
$rec3['LQI']=$lqi;
$rec3['STATUS']=$status;
$rec3['NWKADDR']=$nwkAddr;
if (strpos($allieee,$ieeeAddr)==0)  SQLUpdate(  'zigbee2mqtt_devices',$rec3); 


}

$allieee.=$ieeeAddr.";";


//var_dump( $str);
// $json3= json_decode  ($str,true);

//foreach ( $json3 as $key=>$value)
//{if (ZMQTT_DEBUG=="1" ) debmes($key.":".$value, 'zigbee2mqtt');}



}


}

/**
* FrontEnd
*
* Module frontend
*
* @access public
*/
function usual(&$out) {


        $device = $_GET['device'];
        $command = $_GET['command'];



        if ($device && $command) {

        $val = $_GET['value'];
        $settt = $_GET['settt'];
        if ($settt=="") { $sett='set';} else {$sett=$settt;}
	$path=$_GET['gw'].'/'.$_GET['friendlyname'].'/'.$sett;


///////////////
 if ($command=='setcolortemp') {
	
        switch   ($val)
	{
	case 'hot':
      $itemp=500; break;
	case 'deff':      
      $itemp=255; break;
	case 'cold':   
      $itemp=0; break;
	}
	$val='{"state": "ON",  "color_mode":3, "brightness": 255,  "color_temp":'.$itemp.' }';
	$command="";	
        }

 if ($command=='setcolor') {
	
        switch   ($val)
	{
	case 'hot':
      $itemp=500; break;
	case 'deff':      
      $itemp=255; break;
	case 'cold':   
      $itemp=0; break;
	}
	$val='{"state": "ON",  "brightness": 255,  "color": {"hex": "#'.$val.'"}}';
	$command=null;	
        }

///////////////

        $result=$this->setPropertyfn($path, $command,$val);


//$location=$_GET['location'];
//$vendor_id=$_GET['vendor_id'];
//$type_id=$_GET['type_id'];
//$vid_id=$_GET['vid_id'];
//$group_list_id=$_GET['group_list_id'];
//$this->redirect("?&location=$location&type_id=$type_id&vendor_id=$vendor_id&vid_id=$vid_id&group_list_id=$group_list_id");



}







    if ($this->ajax) {
//print_r($_GET);

        global $op;
        global $fn;
        global $slsipp;
//$slsipp=$_GET['slsipp'];
//echo $slsipp;
//        global $slsipp;
//echo $slsipp;

        $result=array();
        if ($op=='getvalues') {
            global $ids;
            if (!is_array($ids)) {
                $ids=array(0);
            } else {
                $ids[]=0;
            }
            $data=SQLSelect("SELECT ID,VALUE FROM zigbee2mqtt WHERE ID IN (".implode(',',$ids).")");
            $total = count($data);
            for($i=0;$i<$total;$i++) {
                $data[$i]['VALUE']=str_replace('":','": ',$data[$i]['VALUE']);
            }
            $result['DATA']=$data;
        }

            if ($op == 'viewlog'  ) {
print_r(time().": ". $fn."<hr>");
if (filesize ($fn)>0) {
$fz=filesize ($fn);
$file = new SplFileObject($fn, 'r');
$file->seek(PHP_INT_MAX);
$last_line = $file->key();
//debmes($last_line, 'zg1');

$max=500;
if  ($max>$last_line ) {$max=$last_line;}

$lines = new LimitIterator($file, $last_line - $max, $last_line);

$tmp=(iterator_to_array($lines));
//echo $tmp;

$newtmp=array_reverse($tmp); 
$a="";
foreach ($newtmp as $value) 
{ 
$a.= $value; 
} 

$a =  str_replace( array("\r\n","\r","\n") , '<br>' , $a);
//$out['LOG']=$a;
//print_r($a);
echo $a;

//print_r(time().": ". $fn);
        }
        }

            if ($op == 'viewslslog'  ) {

   $this->getConfig();
//   $logurl='http://'.$this->config['SLSIP'].'/log?get=raw';
//   $logurl='http://'.$this->config['SLSIP'].'/api/log?action=getBuffer';
//   $logurl='http://'.$this->config['SLSIP'].'/api/log?action=message-history';
//$logurl='http://'.$this->config['SLSIP'].'/api/messages-history?action=getBuffer';



$logurl='http://'.$slsipp.'/api/messages-history?action=getBuffer';


//print_r(time().": ". $logurl.' <a href="http://'.$this->config['SLSIP'].'" target="_blank"> Open</a> <br>');
print_r(time().": ". $logurl.' <a href="http://'.$slsipp.'" target="_blank"> Open</a> <br>');



//$a='SLS ZGW LOG......comming son';

$a=geturl($logurl);

//$tmp=explode( '\r\n', $a);
//$tmp=explode( PHP_EOF, $a);
$tmp=preg_split('/\\r\\n?|\\n/',$a);

//echo $tmp;

//$tmp=(iterator_to_array($a));

//$newtmp=($tmp); 

$newtmp=array_reverse($tmp); 

//print_r($newtmp);
//echo "<hr>";
$a="";
foreach ($newtmp as $value) 
{ 
$a.= $value.'<br>'; 
} 



//$a =  str_replace( array("\r\n","\r","\n") , '<br>' , $a);
//$out['LOG']=$a;
//print_r($a);
echo $a;

//print_r(time().": ". $fn);

        }




//        echo json_encode($result);
        exit;
    }


 if ($this->owner->action=='apps') {
  $this->redirect(ROOTHTML."module/".$this->name.".html");
//  $this->redirect(ROOTHTML."module/nick7zmail.html");
 }  else {
 $this->admin($out);}

}
/**
* mqtt search
*
* @access public
*/
 function search_mqtt(&$out) {
  require(DIR_MODULES.$this->name.'/mqtt_search.inc.php');
 }
/**
* mqtt edit/add
*
* @access public
*/
 function edit_mqtt(&$out, $id) {
  require(DIR_MODULES.$this->name.'/mqtt_edit.inc.php');
 }

 function propertySetHandle($object, $property, $value) {

// debmes('Сработал propertySetHandle object:'.$object." property:". $property." value:". $value,  'zigbee2mqtt_sethandle');
$sql="SELECT * FROM zigbee2mqtt WHERE LINKED_OBJECT LIKE '".DBSafe($object)."' AND LINKED_PROPERTY LIKE '".DBSafe($property)."'";
// debmes($sql, 'zigbee2mqtt_sethandle');
// debmes($object.":". $property.":". $value, 'zigbee2mqtt_11');
   $mqtt_properties=SQLSelect($sql);
//debmes($mqtt_properties, 'zigbee2mqtt_sethandle');

   $total=count($mqtt_properties);
// debmes($total, 'zigbee2mqtt_11');
// debmes($object.":". $property.":". $value. ' найдено результатов '. $total, 'zigbee2mqtt_sethandle');

   if ($total) {
    for($i=0;$i<$total;$i++) {
//debmes('Проверяем setProperty '. $mqtt_properties[$i]['ID'].":".$value, 'zigbee2mqtt_sethandle');

     //определяем,на каком шлюзе сейчас девайс

// debmes($mqtt_properties[$i], 'zigbee2mqtt_11');
     $devid=$mqtt_properties[$i]['DEV_ID'];
     $gw=SQLSelectOne('select * FROM zigbee2mqtt_devices where ID='.$devid)['GW'];

//debmes('select * FROM zigbee2mqtt_devices where ID='.$devid, 'zigbee2mqtt_sethandle');
//debmes('$gw='.$gw, 'zigbee2mqtt_sethandle');
//debmes("mqtt_properties[$i]['PATH']=".$mqtt_properties[$i]['PATH'], 'zigbee2mqtt_sethandle');

     $pos=strripos($mqtt_properties[$i]['PATH'], $gw);

// debmes($devid.":". $gw.":". $pos, 'zigbee2mqtt_11');
     
//if ($pos === false) {

//проверяем, есть ли данный девайс на другом шлюзе
//if (strlen($gw)>0) {
//$sql='update zigbee2mqtt_devices  set GW="'.$gw." where ID=".$devid;
//     $gw=SQLExec($sql	);
//}


//    echo "К сожалению, ($needle) не найдена в ($haystack)";
//debmes('$pos='.strripos($mqtt_properties[$i]['PATH']).'='.$pos. ' '. $gw, 'zigbee2mqtt_sethandle');
//debmes("К сожалению, ($needle) не найдена в ($haystack)", 'zigbee2mqtt_sethandle');
// debmes('запись с другого шлюза', 'zigbee2mqtt_11');

//} else
 {
// debmes('запись с нашего шлюза', 'zigbee2mqtt_11');
//debmes('Запускаем setProperty '. $mqtt_properties[$i]['ID'].":".$value, 'zigbee2mqtt_sethandle');
     $this->setProperty($mqtt_properties[$i]['ID'], $value);
}

    }
   }  
 }
    

/**
* mqtt delete record
*
* @access public
*/
 function delete_dev($id) {

//if (ZMQTT_DEBUG=="1" ) debmes("SELECT * FROM zigbee2mqtt WHERE DEV_ID='$id'",'zigbee2mqtt');
//  $rec=SQLSelectOne("SELECT * FROM zigbee2mqtt WHERE DEV_ID='$id'");
  // some action for related tables

//if (ZMQTT_DEBUG=="1" ) debmes("DELETE FROM zigbee2mqtt WHERE DEV_ID='".$rec['DEV_ID']."'",'zigbee2mqtt');

  SQLExec("DELETE FROM zigbee2mqtt_devices WHERE ID='".$id."'");

  SQLExec("DELETE FROM zigbee2mqtt WHERE DEV_ID='".$id."'");

 }


 function delete_mqtt($id) {

//if (ZMQTT_DEBUG=="1" ) debmes("SELECT * FROM zigbee2mqtt WHERE DEV_ID='$id'",'zigbee2mqtt');
//  $rec=SQLSelectOne("SELECT * FROM zigbee2mqtt WHERE DEV_ID='$id'");
  // some action for related tables

//if (ZMQTT_DEBUG=="1" ) debmes("DELETE FROM zigbee2mqtt WHERE DEV_ID='".$rec['DEV_ID']."'",'zigbee2mqtt');


  SQLExec("DELETE FROM zigbee2mqtt WHERE ID='".$id."'");

 }


/**
* Install
*
* Module installation routine
*
* @access private
*/
 function install($data='') {
  parent::install();

 subscribeToEvent($this->name, 'HOURLY');
 }
/**
* Uninstall
*
* Module uninstall routine
*
* @access public
*/




function get_map(){


SQLExec('update zigbee2mqtt_devices set PARRENTIEEEADDR="", LQI="", STATUS="" ');

//  include_once("./lib/mqtt/phpMQTT.php");
        include_once(ROOT . "3rdparty/phpmqtt/phpMQTT.php");

   $this->getConfig();
   if ($mqtt->config['MQTT_CLIENT']) {
    $client_name=$mqtt->config['MQTT_CLIENT'];
   } else {
    $client_name="MajorDoMo MQTT";
   }

   if ($mqtt->config['MQTT_DEBUG']) {
    $debug=$mqtt->config['MQTT_DEBUG'];
   } else {
    $debug="0";
   }


   if ($this->config['MQTT_AUTH']) {
    $username=$this->config['MQTT_USERNAME'];
    $password=$this->config['MQTT_PASSWORD'];
   }
   if ($this->config['MQTT_HOST']) {
    $host=$this->config['MQTT_HOST'];
   } else {
    $host='localhost';
   }
   if ($this->config['MQTT_PORT']) {
    $port=$this->config['MQTT_PORT'];
   } else {
    $port=1883;
   }

//      $mqtt_client = new phpMQTT($host, $port, $client_name.' Client');
        $mqtt_client = new Bluerhinos\phpMQTT($host, $port, $client_name . ' Client');

   if(!$mqtt_client->connect(true, NULL,$username,$password))
   {
    return 0;
   }


//if (ZMQTT_DEBUG=="1" ) debmes('Запрашиваем карту ', 'zigbee2mqtt');




//   $mqtt_client->publish('zigbee2mqtt/bridge/networkmap','graphviz');

$this->getConfig();
$query_list = explode(',', $this->config['MQTT_QUERY']);
$total = count($query_list);

for ($i = 0; $i < $total; $i++) {

$zz=explode('/',$query_list[$i])[0];

   $mqtt_client->publish("$zz/bridge/networkmap",'raw');
}

   //$mqtt_client->publish($rec['PATH_WRITE'].'/set',$jsonvalue, (int)$rec['QOS'], (int)$rec['RETAIN']);


   $mqtt_client->close();
}

function get_map_graphwiz(){
//  include_once("./lib/mqtt/phpMQTT.php");
        include_once(ROOT . "3rdparty/phpmqtt/phpMQTT.php");

   $this->getConfig();
   if ($mqtt->config['MQTT_CLIENT']) {
    $client_name=$mqtt->config['MQTT_CLIENT'];
   } else {
    $client_name="MajorDoMo MQTT";
   }

   if ($mqtt->config['MQTT_DEBUG']) {
    $debug=$mqtt->config['MQTT_DEBUG'];
   } else {
    $debug="0";
   }


   if ($this->config['MQTT_AUTH']) {
    $username=$this->config['MQTT_USERNAME'];
    $password=$this->config['MQTT_PASSWORD'];
   }
   if ($this->config['MQTT_HOST']) {
    $host=$this->config['MQTT_HOST'];
   } else {
    $host='localhost';
   }
   if ($this->config['MQTT_PORT']) {
    $port=$this->config['MQTT_PORT'];
   } else {
    $port=1883;
   }

//   $mqtt_client = new phpMQTT($host, $port, $client_name.' Client');
     $mqtt_client = new Bluerhinos\phpMQTT($host, $port, $client_name . ' Client');

   if(!$mqtt_client->connect(true, NULL,$username,$password))
   {
    return 0;
   }


//if (ZMQTT_DEBUG=="1" ) debmes('Запрашиваем карту ', 'zigbee2mqtt');



$this->getConfig();
$query_list = explode(',', $this->config['MQTT_QUERY']);
$total = count($query_list);

for ($i = 0; $i < $total; $i++) {

$zz=explode('/',$query_list[$i])[0];
$mqtt_client->publish("$zz/bridge/networkmap",'graphviz');
}


//   $mqtt_client->publish('zigbee2mqtt/bridge/networkmap','raw');
   //$mqtt_client->publish($rec['PATH_WRITE'].'/set',$jsonvalue, (int)$rec['QOS'], (int)$rec['RETAIN']);


   $mqtt_client->close();
}



function sendcommand($topic, $command){
//  include_once("./lib/mqtt/phpMQTT.php");
        include_once(ROOT . "3rdparty/phpmqtt/phpMQTT.php");

   $this->getConfig();
   if ($mqtt->config['MQTT_CLIENT']) {
    $client_name=$mqtt->config['MQTT_CLIENT'];
   } else {
    $client_name="MajorDoMo MQTT";
   }

   if ($mqtt->config['MQTT_DEBUG']) {
    $debug=$mqtt->config['MQTT_DEBUG'];
   } else {
    $MQTT_DEBUG="0";
   }




   if ($this->config['MQTT_AUTH']) {
    $username=$this->config['MQTT_USERNAME'];
    $password=$this->config['MQTT_PASSWORD'];
   }
   if ($this->config['MQTT_HOST']) {
    $host=$this->config['MQTT_HOST'];
   } else {
    $host='localhost';
   }
   if ($this->config['MQTT_PORT']) {
    $port=$this->config['MQTT_PORT'];
   } else {
    $port=1883;
   }

//   $mqtt_client = new phpMQTT($host, $port, $client_name.' Client');
   $mqtt_client = new Bluerhinos\phpMQTT($host, $port, $client_name . ' Client');

   if(!$mqtt_client->connect(true, NULL,$username,$password))
   {
    return 0;
   }


//if (ZMQTT_DEBUG=="1" ) debmes('Запрашиваем '.$topic.' '.$command, 'zigbee2mqtt');
   $mqtt_client->publish($topic,$command);
   $mqtt_client->close();
}


 function uninstall() {
  SQLExec('DROP TABLE IF EXISTS zigbee2mqtt');
  SQLExec('DROP TABLE IF EXISTS zigbee2mqtt_devices');
  SQLExec('DROP TABLE IF EXISTS zigbee2mqtt_devices_list');
  SQLExec('DROP TABLE IF EXISTS zigbee2mqtt_devices_command');
  SQLExec('DROP TABLE IF EXISTS zigbee2mqtt_bind');
  SQLExec('DROP TABLE IF EXISTS zigbee2mqtt_grouplist');
  SQLExec('DROP TABLE IF EXISTS zigbee2mqtt_log');


   
  parent::uninstall();
 }
/**
* dbInstall
*
* Database installation routine
*
* @access private
*/
 function dbInstall($data) {
/*
mqtt - MQTT
*/





$this->createdb();

}


function xyBriToRgb($x,$y,$bri)
{
    $z = 1.0 - $x - $y;
    $Y = $bri / 255.0;
    $X = ($Y / $y) * $x;
    $Z = ($Y / $y) * $z;

    $r = $X * 1.612 - $Y * 0.203 - $Z * 0.302;
    $g = ($X * -1) * 0.509 + $Y * 1.412 + $Z * 0.066;
    $b = $X * 0.026 - $Y * 0.072 + $Z * 0.962;

    $r = $r <= 0.0031308 ? 12.92 * $r : (1.0 + 0.055) * pow($r, (1.0 / 2.4)) - 0.055;
    $g = $g <= 0.0031308 ? 12.92 * $g : (1.0 + 0.055) * pow($g, (1.0 / 2.4)) - 0.055;
    $b = $b <= 0.0031308 ? 12.92 * $b : (1.0 + 0.055) * pow($b, (1.0 / 2.4)) - 0.055;

    $maxValue = max( $r , $g, $b );

    $r = $r / $maxValue;
    $g = $g / $maxValue;
    $b = $b / $maxValue;

    $r = $r * 255; if ($r < 0) $r = 255;
    $g = $g * 255; if ($g < 0) $g = 255;
    $b = $b * 255; if ($b < 0) $b = 255;

    $r = dechex(round($r));
    $g = dechex(round($g));
    $b = dechex(round($b));

    if (strlen($r) < 2)     $r = "0" + $r;
    if (strlen($g) < 2)     $g = "0" + $g;
    if (strlen($b) < 2)     $b = "0" + $b;

    return $r.$g.$b;
}

function createdb()
{


// SQLExec("DROP PROCEDURE IF EXISTS SPLIT_STRING") ;
// SQLExec("CREATE FUNCTION IF NOT EXISTS  SPLIT_STRING(str VARCHAR(255), delim VARCHAR(12), pos INT) RETURNS VARCHAR(255) RETURN REPLACE(SUBSTRING(SUBSTRING_INDEX(str, delim, pos),        LENGTH(SUBSTRING_INDEX(str, delim, pos-1)) + 1),        delim, '');");



  $data = <<<EOD
 zigbee2mqtt_devices: ID int(10) unsigned NOT NULL auto_increment
 zigbee2mqtt_devices: TITLE varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: ONLINE varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: MANUFACTURE varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: DEVICE_NAME varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: MODEL varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: GROUP varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: TYPE varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: SELECTTYPE varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: SELECTVENDOR varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: LASTPING varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: IEEEADDR varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: PARRENTIEEEADDR varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: LQI varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: NWKADDR varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: MANUFID varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: MANUFNAME varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: POWERSOURCE varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: HWVERSION varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: SWBUILDID varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: MODELID varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: STATUS varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: STATE varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: JOINTIME varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: DID varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: D_ID varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: FIND datetime
 zigbee2mqtt_devices: LOCATION_ID varchar(4) NOT NULL DEFAULT '0'
 zigbee2mqtt_devices: GROUPLIST varchar(100) NOT NULL DEFAULT '0'
 zigbee2mqtt_devices: HISTORY varchar(1) NOT NULL DEFAULT '1'
 zigbee2mqtt_devices: GW varchar(100) NOT NULL DEFAULT ''


 zigbee2mqtt_devices_list: ID int(10) unsigned NOT NULL auto_increment
 zigbee2mqtt_devices_list: zigbeeModel varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_list: model varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_list: vendor varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_list: type varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_list: description varchar(300) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_list: extend varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_list: supports varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_list: fromZigbee varchar(300) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_list: toZigbee varchar(300) NOT NULL DEFAULT ''

 zigbee2mqtt_devices_command: ID int(10) unsigned NOT NULL auto_increment
 zigbee2mqtt_devices_command: zigbeeModel varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_command: type varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_command: device_class varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_command: value_template varchar(300) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_command: command_value varchar(300) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_command: json_attributes varchar(300) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_command: state_topic varchar(300) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_command: availability_topic varchar(300) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_command: command_topic varchar(300) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_command: payload_on varchar(300) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_command: payload_off varchar(300) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_command: force_update varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_command: brightness varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_command: color_temp varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_command: xy varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_command: unit_of_measurement varchar(300) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_command: PAYLOAD_TRUE varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt_devices_command: PAYLOAD_FALSE varchar(255) NOT NULL DEFAULT ''




 zigbee2mqtt: ID int(10) unsigned NOT NULL auto_increment
 zigbee2mqtt: TITLE varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt: LOCATION_ID int(10) NOT NULL DEFAULT '0'
 zigbee2mqtt: UPDATED datetime
 zigbee2mqtt: VALUE longtext 
 zigbee2mqtt: PATH varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt: METRIKA varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt: PATH_WRITE varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt: COMMAND_VALUE varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt: REPLACE_LIST varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt: LINKED_OBJECT varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt: LINKED_PROPERTY varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt: LINKED_METHOD varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt: QOS int(3) NOT NULL DEFAULT '0'
 zigbee2mqtt: RETAIN int(3) NOT NULL DEFAULT '0'
 zigbee2mqtt: CONVERTONOFF int(3) NOT NULL DEFAULT '0'
 zigbee2mqtt: DEV_ID int(5) NOT NULL DEFAULT '0'
 zigbee2mqtt: DISP_FLAG int(3) NOT NULL DEFAULT '0'
 zigbee2mqtt: PAYLOAD_ON varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt: PAYLOAD_OFF varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt: PAYLOAD_TRUE varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt: PAYLOAD_FALSE varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt: ENABLE1 varchar(1) NOT NULL DEFAULT ''

 zigbee2mqtt_log: ID int(10) unsigned NOT NULL auto_increment
 zigbee2mqtt_log: TITLE varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt_log: MESSAGE longtext 
 zigbee2mqtt_log: TYPE varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt_log: FIND datetime

 zigbee2mqtt_grouplist: ID int(10) unsigned NOT NULL auto_increment
 zigbee2mqtt_grouplist: Z2M_ID varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt_grouplist: TITLE varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt_grouplist: ADDED datetime


 zigbee2mqtt_bind: ID int(10) unsigned NOT NULL auto_increment
 zigbee2mqtt_bind: SOURCE varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt_bind: SOURCETYPE varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt_bind: KEYY varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt_bind: TARGET varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt_bind: TARGETTYPE varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt_bind: TARGETENDPOINT varchar(255) NOT NULL DEFAULT ''

 zigbee2mqtt_bind: ADDED datetime
 zigbee2mqtt_bind: RESULT varchar(255) NOT NULL DEFAULT ''





EOD;
  parent::dbInstall($data);

  require(DIR_MODULES.$this->name.'/database1.inc.php');
  require(DIR_MODULES.$this->name.'/database2.inc.php');

}


function isJSON22($string) {
    return ((is_string($string) && (is_object(json_decode($string)) || is_array(json_decode($string))))) ? true : false;
}






 
// --------------------------------------------------------------------
}
/*
*
* TW9kdWxlIGNyZWF0ZWQgSnVsIDE5LCAyMDEzIHVzaW5nIFNlcmdlIEouIHdpemFyZCAoQWN0aXZlVW5pdCBJbmMgd3d3LmFjdGl2ZXVuaXQuY29tKQ==

*
*/

?>
