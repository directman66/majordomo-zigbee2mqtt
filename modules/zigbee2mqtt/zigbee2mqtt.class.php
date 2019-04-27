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
  $out=array();
  if ($this->action=='admin') {
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
debmes('Нужно изменить значение id='.$id.' на '.$value, 'zigbee2mqtt');

debmes("SELECT * FROM zigbee2mqtt WHERE ID='".$id."'", 'zigbee2mqtt');
  $rec=SQLSelectOne("SELECT * FROM zigbee2mqtt WHERE ID='".$id."'");

  if (!$rec['ID'] || !$rec['PATH']) {
debmes('Не хватает данных', 'zigbee2mqtt');
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

  include_once("./lib/mqtt/phpMQTT.php");

   $this->getConfig();
   if ($mqtt->config['MQTT_CLIENT']) {
    $client_name=$mqtt->config['MQTT_CLIENT'];
   } else {
    $client_name="MajorDoMo MQTT";
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

   if ($this->config['Z2M_LOGMODE']) {
    $loglevel=$this->config['Z2M_LOGMODE'];
   } else {
    $leglevel='debug';
   }


   $mqtt_client = new phpMQTT($host, $port, $client_name.' Client');

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
debmes('Подменяем '.$value. " на ". $rec['PAYLOAD_ON']."/".$rec['PAYLOAD_OFF'], 'zigbee2mqtt');

//if (($rec['PAYLOAD_ON'])&& ($value=="1"))  $json=array( $rec['METRIKA']=> $rec['PAYLOAD_ON']);
//if (($rec['PAYLOAD_OFF'])&& ($value=="0"))  $json=array( $rec['METRIKA']=> $rec['PAYLOAD_OFF']);

if  ($value=="1") $json=array( $rec['COMMAND_VALUE']=> $rec['PAYLOAD_ON']);
if ($value=="0")  $json=array( $rec['COMMAND_VALUE']=> $rec['PAYLOAD_OFF']);
$jsonvalue=json_encode($json) ;

debmes('Заменили  '.$value. "  на ". $jsonvalue, 'zigbee2mqtt');


} else 
{
$json=array( $rec['COMMAND_VALUE']=> $value);
$jsonvalue=json_encode($json) ;
}
debmes('Публикую zigbee2mqqtt '.$rec['PATH_WRITE'].":".$jsonvalue, 'zigbee2mqtt');


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


//  if ($set_linked && $rec['LINKED_OBJECT'] && $rec['LINKED_PROPERTY']) {
//   setGlobal($rec['LINKED_OBJECT'].'.'.$rec['LINKED_PROPERTY'], $value, array($this->name=>'0'));
//  }

 }


 function setPropertyDevice($id, $value, $set_linked=0) {
debmes('Нужно изменить значение id='.$id.' на '.$value, 'zigbee2mqtt');

$sql="SELECT * FROM zigbee2mqtt WHERE DEV_ID='".$id."' and length(PATH_WRITE)>2";

debmes($sql, 'zigbee2mqtt');
//  $rec=SQLSelectOne("SELECT * FROM zigbee2mqtt WHERE DEV_ID='".$id."' and PATH_WRITE is not null");
  $rec=SQLSelect($sql);
$cnt=count($rec);

debmes("Найдено $cnt свойств, которые можно изменить", 'zigbee2mqtt');
debmes($rec,'zigbee2mqtt');
  for($i=0;$i<$cnt;$i++) {

  if ($rec[$i]['ID'] || $rec[$i]['PATH_WRITE']) {
//debmes('Не хватает данных, устройство '.$rec['ID'].' или путь управления '.$rec['PATH'].' не найдены', 'zigbee2mqtt');
//   return 0;




debmes('Данных  хватает, параметр '.$rec[$i]['ID'].' путь управления '.$rec[$i]['PATH'], 'zigbee2mqtt');

debmes('Поехали дальше', 'zigbee2mqtt');


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

  include_once("./lib/mqtt/phpMQTT.php");

   $this->getConfig();
   if ($mqtt->config['MQTT_CLIENT']) {
    $client_name=$mqtt->config['MQTT_CLIENT'];
   } else {
    $client_name="MajorDoMo MQTT";
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


   $mqtt_client = new phpMQTT($host, $port, $client_name.' Client');

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

if (strpos($value,'vice')>0) {
$json=null;

debmes('Требуется включить или выключить устройство', 'zigbee2mqtt1');
debmes($value.' $rec[$i][METRIKA]='.$rec[$i]['METRIKA']. ' PATH_WRITE='.$rec[$i]['PATH_WRITE'].' strpos='.strpos($rec[$i]['PATH_WRITE'],'right'), 'zigbee2mqtt');

if  (($value=="device_on_left")&&(strpos($rec[$i]['METRIKA'],"tate")>0)) $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_ON']);
if (($value=="device_off_left")&&(strpos($rec[$i]['METRIKA'],"tate")>0))  $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_OFF']);

if  (($value=="device_on_right")&&(strpos($rec[$i]['METRIKA'],"tate")>0) &&(strpos($rec[$i]['PATH_WRITE'],'right')>0)) $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_ON']);
if (($value=="device_off_right")&&(strpos($rec[$i]['METRIKA'],"tate")>0) &&(strpos($rec[$i]['PATH_WRITE'],'right')>0)) $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_OFF']);
} else {

if (($rec[$i]['PAYLOAD_ON'])||$rec[$i]['PAYLOAD_OFF']) {
debmes('Подменяем '.$value. " на ". $rec[$i]['PAYLOAD_ON']."/".$rec[$i]['PAYLOAD_OFF'], 'zigbee2mqtt1');

//if (($rec['PAYLOAD_ON'])&& ($value=="1"))  $json=array( $rec['METRIKA']=> $rec['PAYLOAD_ON']);
//if (($rec['PAYLOAD_OFF'])&& ($value=="0"))  $json=array( $rec['METRIKA']=> $rec['PAYLOAD_OFF']);

if  ($value=="1") $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_ON']);
if ($value=="0")  $json=array( $rec[$i]['COMMAND_VALUE']=> $rec[$i]['PAYLOAD_OFF']);
debmes('Заменили  '.$value. "  на ". $jsonvalue, 'zigbee2mqtt1');
}

else 
{
$json=array( $rec[$i]['COMMAND_VALUE']=> $value);
}
}
$jsonvalue=json_encode($json) ;
if ($jsonvalue!='null') { 
debmes('Публикую zigbee2mqqtt '.$rec[$i]['PATH_WRITE'].":".$jsonvalue, 'zigbee2mqtt1');
   if ($rec[$i]['PATH_WRITE']) {

   $mqtt_client->publish($rec[$i]['PATH_WRITE'],$jsonvalue, (int)$rec[$i]['QOS'], (int)$rec[$i]['RETAIN']);
       
   }} else 

debmes('Публиковать не требуется  '.$rec[$i]['PATH_WRITE'].":".$jsonvalue, 'zigbee2mqtt1');

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
//else debmes('Не хватает данных, устройство '.$rec['ID'].' или путь управления '.$rec['PATH'].' не найдены', 'zigbee2mqtt');
  }



/**
* Title
*
* Description
*
* @access public
*/
 function processMessage($path, $value) {

debmes('Сработал processMessage :'.$path." value:". $value.' strpos:'. strpos($path,"set"),'zigbee2mqtt');
//debmes('Сработал processMessage :'.$path." value:". $value,'zigbee2mqtt');
   if (preg_match('/\#$/', $path)) {
    return 0;
   }

   if (preg_match('/^{/',$value)) {
       $ar=json_decode($value,true);
       foreach($ar as $k=>$v) {
           if (is_array($v))
               $v = json_encode($v);
           $this->processMessage($path.'/'.$k,$v);
       }
   }

unset($msgtype);

if (strpos($path,'igbee2mqtt/0x')>0) {$msgtype='device_state';}
if (strpos($path,'igbee2mqtt/bridge/state')>0) {$msgtype='bridge_state';}


//if ($path=='zigbee2mqtt/bridge/log') {$msgtype=$json->{'type'};}



if (($path=='zigbee2mqtt/bridge/log')||($msgtype))
//if ($path=='zigbee2mqtt/bridge/state')

{
$json=json_decode($value);
$msgtype=$json->{'type'};

debmes('Пришло важное сообщение, поместим его в журнал :'.$path." value:". $value." type:".$json->{'type'},'zigbee2mqtt');


//{"type":"groups","message":{"1":{"friendly_name":"232323"},"2":{"friendly_name":"group1"},"3":{"friendly_name":"group1"},"4":{"friendly_name":"group1"}}}
$arr=sqlselectone('select * from  zigbee2mqtt_log  where TITLE="dummy"');
$arr['TITLE']= $path;
if ($msgtype=='device_state') {$arr['MESSAGE']= $path.":".$value; } else  {$arr['MESSAGE']= $value;}
$arr['TYPE']= $msgtype;
$arr['FIND']= date('Y-m-d H:i:s');

DEBMES($arr , 'zigbee2mqtt');

$ok=SQLInsert('zigbee2mqtt_log', $arr);

debmes('Поместили '.$ok , 'zigbee2mqtt');
//раскодируем




//parse_deviceinfo($ar)

debmes($json,'zigbee2mqtt');
debmes($json->{'type'},'zigbee2mqtt');



if ($json->{'type'}=='devices') {

debmes('справочник устройств:','zigbee2mqtt');

//$this->parse_deviceinfo($json->{'message'});
$this->parse_deviceinfo($json);
}



if ($json->{'type'}=='groups') {
debmes('обновим справочник групп','zigbee2mqtt');
debmes($json->{'message'}, 'zigbee2mqtt');

foreach ($json->{'message'} as $key=> $value)

{

//debmes($key.":". $value, 'zigbee2mqtt');
//echo $key.":". $value->{'friendly_name'};
$sql="select * from zigbee2mqtt_grouplist  where Z2M_ID='$key'";
debmes($sql, 'zigbee2mqtt');

$grs=SQLSElectOne($sql);




debmes($grs, 'zigbee2mqtt');

if  (!$grs['ID']) 
{
    
$grs['Z2M_ID']=$key;
$grs['TITLE']=$value->{'friendly_name'};
$grs['ADDED']= date('Y-m-d H:i:s');
    
debmes('SQLInsert zigbee2mqtt_grouplist' , 'zigbee2mqtt');
SQLInsert(  'zigbee2mqtt_grouplist',   $grs);
} else 

{
    
$grs['Z2M_ID']=$key;
$grs['TITLE']=$value->{'friendly_name'};
$grs['ADDED']= date('Y-m-d H:i:s');

debmes('SQLUpdate zigbee2mqtt_grouplist' , 'zigbee2mqtt');
SQLUpdate(  'zigbee2mqtt_grouplist',   $grs);
}
}

}


}

//добавляем в справочник устройств zigbee2mqtt_devices

   /* Search 'PATH' in database (db) */

debmes('path='.$path,'zigbee2mqtt') ;

$dev_title=explode('/',$path)[1];

debmes('$dev_title='.$dev_title,'zigbee2mqtt') ;



//if ($dev_title=='bridge')  {

//arr=sqlselectone('select * from  zigbee2mqtt_devices where TITLE="bridge"');

//if ($arr['IEEEADDR']) {$dev_title=$arr['IEEEADDR'];} else  {$dev_title='bridge';}

//}
//echo $path.":".$dev_title."<br>";

//if (strpos($dev_title,"/set/")==0)

//если нет в пути параметра set, управляющие свои значения нам не нужны
//if (strpos($path,"set")===false)

//debmes($path.' strpos:'. strpos($path,"set"), 'zigbee2mqtt');
if (strpos($path,"set")>0)
{
debmes('путь содержит set, его мы записывать не будем, чтобы не было колизии', 'zigbee2mqtt');
}
else 
{
     $sql="SELECT * FROM zigbee2mqtt_devices WHERE IEEEADDR LIKE '%".DBSafe($dev_title)."%'";
     $rec=SQLSelectOne($sql);

debmes('апдейтим zigbee2mqtt_devices: '.$sql, 'zigbee2mqtt');

     




     $rec['TITLE']=$dev_title;
     $rec['IEEEADDR']=$dev_title;
     $rec['FIND']=date('Y-m-d H:i:s');

                    if ($dev_title=='bridge' ){
                    debmes('это шлюз',zigbee2mqtt);

                    $cnt=SQLSelectOne("SELECT count(*) cnt FROM zigbee2mqtt_devices WHERE TITLE ='bridge'")['cnt'];
		    echo $cnt; 
	 	     $rec['FIND']=date('Y-m-d H:i:s');

                    if ($cnt==0) {SQLInsert('zigbee2mqtt_devices', $rec);} else 
                        {SQLUpdate('zigbee2mqtt_devices', $rec);}
//                       break;
} else { 

     if(!$rec['ID']) { /* If path_write foud in db */

debmes('устройство  новое, нужно создать новое устройство  zigbee2mqtt_devices: '.$sql, 'zigbee2mqtt');
     $rec['TITLE']=$dev_title;
     $rec['IEEEADDR']=$dev_title;
     $rec['FIND']=date('Y-m-d H:i:s');
//if   ($rec['TITLE']=='bridge')  {      $rec['IEEEADDR']='bridge2';}
print_r($rec);
      SQLInsert('zigbee2mqtt_devices', $rec);



//     $this->refresh_db();
//     $this->refreshdb_mqtt();

SQLExec ('update  zigbee2mqtt set VALUE="" where TITLE="zigbee2mqtt/bridge/log"');
$this->sendcommand('zigbee2mqtt/bridge/config/devices', '');




       }
else 
{
debmes('устройство уже зарегистрировано в системе   zigbee2mqtt_devices: '.$sql, 'zigbee2mqtt');
     $rec['IEEEADDR']=$dev_title;
     $rec['FIND']=date('Y-m-d H:i:s');
SQLUPDATE('zigbee2mqtt_devices', $rec);
}

} 

//добавляем в справочник топиков  zigbee2mqtt

//   $dev_id=SQLSelectOne("SELECT * FROM zigbee2mqtt_devices WHERE TITLE LIKE '%".DBSafe($dev_title)."%'")['ID'];
$sql="SELECT * FROM zigbee2mqtt_devices WHERE IEEEADDR LIKE '%".DBSafe($dev_title)."%'";
debmes($sql, 'zigbee2mqtt');
   $dev_id=SQLSelectOne($sql)['ID'];


   $rec=SQLSelectOne("SELECT * FROM zigbee2mqtt WHERE PATH LIKE '".DBSafe($path)."'");

   
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
//     $rec['PATH_WRITE']=substr($path,0,strrpos($path,'/')); 
//     $rec['METRIKA']="1"; 
     $rec['DEV_ID']=$dev_id;
     $rec['TITLE']=$path;
//     $rec['VALUE']=$value.'';
     $rec['VALUE']=$value;

     $rec['UPDATED']=date('Y-m-d H:i:s');
     $rec['ID']=null;
SQLInsert('zigbee2mqtt', $rec);
   }else{
     /* Update values in db */
     $rec['VALUE']=$value.'';
     $rec['DEV_ID']=$dev_id;
     $rec['UPDATED']=date('Y-m-d H:i:s');

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
if ($value==$rec['PAYLOAD_ON'])  $newvalue=1;
if ($value==$rec['PAYLOAD_OFF'])  $newvalue=0;
debmes('Заменили  '.$value. "  на ". $newvalue, 'zigbee2mqtt');
}  else 
{$newvalue=$value;}


if ((!$newvalue) || (strlen($newvalue)==0)) {$newvalue=$value;}

//пишем в переменную
//       setGlobal($rec['LINKED_OBJECT'].'.'.$rec['LINKED_PROPERTY'], $newvalue, array($this->name=>'0'));

debmes('Вызываю setglobal: value:'.$rec['LINKED_OBJECT'].'.'.$rec['LINKED_PROPERTY'].' value:'. $newvalue,'zigbee2mqtt');
       setGlobal($rec['LINKED_OBJECT'].'.'.$rec['LINKED_PROPERTY'], $newvalue, array('zigbee2mqtt'=>'0'));
     }
     if ($rec['LINKED_OBJECT'] && $cmd_rec['LINKED_METHOD']) {
       callMethod($rec['LINKED_OBJECT'] . '.' . $rec['LINKED_METHOD'], $rec['VALUE']);
     }

//сюда пишем обработчик click

//////////////////////////////////////////////////
//////////////////////////////////////////////////
//////////////////////////////////////////////////
//////////////////////////////////////////////////

//////////////////////////////////////////////////

//////////////////////////////////////////////////

if ((substr($path,strrpos($path,'/')+1)=='click')||(substr($path,strrpos($path,'/')+1)=='release')||(substr($path,strrpos($path,'/')+1)=='action'))
{
debmes('получено сообщение от пульта, разберем возможные варианты','zigbee2mqtt');


//   $rec1=SQLSelectOne("SELECT * FROM zigbee2mqtt WHERE PATH LIKE '".DBSafe($path)." and METRIKA='$value'" );
$sql="SELECT * FROM zigbee2mqtt WHERE PATH LIKE '%$path%' and VALUE='$value'" ;
debmes($sql, 'zigbee2mqtt');

   $rec1=SQLSelectOne($sql);
//   $newvalue='click';
   $newvalue=substr($path,strrpos($path,'/')+1);
   if(!$rec1['ID']){ /* If 'PATH' not found in db */
     debmes('кнопка click нажата первый раз', 'zigbee2mqtt');
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
SQLInsert('zigbee2mqtt', $rec1);
   }else{
     debmes('кнопка click ранее уже нажималас, есть информация в базе данных', 'zigbee2mqtt');
     $rec1['METRIKA']=$value;
//     $rec1['METRIKA']=$newvalue;
     $rec1['VALUE']=$newvalue;
//     $rec1['VALUE']=$value;
     $rec1['DEV_ID']=$dev_id;
     $rec1['UPDATED']=date('Y-m-d H:i:s');
     SQLUpdate('zigbee2mqtt', $rec1);

}

     if($rec1['LINKED_OBJECT'] && $rec1['LINKED_PROPERTY']) {
debmes('Вызываю setglobal: value:'.$rec1['LINKED_OBJECT'].'.'.$rec1['LINKED_PROPERTY'].' value:'. $newvalue,'zigbee2mqtt');
       setGlobal($rec1['LINKED_OBJECT'].'.'.$rec1['LINKED_PROPERTY'], $newvalue, array('zigbee2mqtt'=>'0'));
     }
     if ($rec1['LINKED_OBJECT'] && $cmd_rec1['LINKED_METHOD']) {
       callMethod($rec1['LINKED_OBJECT'] . '.' . $rec1['LINKED_METHOD'], $rec['VALUE']);
     }




}



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
$seen=SQLSelectOne("select max(FIND) FIND from zigbee2mqtt_log   ");


$out['SEEN']=$seen['FIND'];

if ((time()-strtotime($seen['FIND'])<3600)) {$out['SEEN2']="1";}
else {$out['SEEN2']="0";}






$permit=SQLSelectOne("select * from zigbee2mqtt where TITLE='zigbee2mqtt/bridge/config/permit_join'  ");

//if $permit['VALUE']=
$out['PERMIT']=$permit['VALUE'];



 $this->getConfig();
 $out['MQTT_CLIENT']=$this->config['MQTT_CLIENT'];
 $out['MQTT_HOST']=$this->config['MQTT_HOST'];
 $out['MQTT_PORT']=$this->config['MQTT_PORT'];
 $out['Z2M_LOGMODE']=$this->config['Z2M_LOGMODE'];
 $out['ZIGBEE2MQTTPATH']=$this->config['ZIGBEE2MQTTPATH'];
 $out['MQTT_QUERY']=$this->config['MQTT_QUERY'];

 if (!$out['MQTT_HOST']) {
  $out['MQTT_HOST']='localhost';
 }


 if (!$out['MQTT_CLIENT']) {
  $out['MQTT_CLIENT']='md_zigbee2mqtt';
 }


 if (!$out['ZIGBEE2MQTTPATH']) {
  $out['ZIGBEE2MQTTPATH']='/opt/zigbee2mqtt';
 }


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


     if ($this->tab=='edit_device'||$this->tab=='view_det'||$this->tab=='edit_parametrs') {

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
$out['TYPE']=$res['TYPE'];
$out['IEEADDR']=$res['IEEADDR'];
$out['NWKADDR']=$res['NWKADDR'];
$out['MANIFID']=$res['MANIFID'];
$out['MANUFNAME']=$res['MANUFNAME'];
$out['PARRENTIEEEADDR']=$res['PARRENTIEEEADDR'];
$out['LQI']=$res['LQI'];
$out['POWEDSOURCE']=$res['POWEDSOURCE'];
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


$res1=SQLSelectOne("SELECT * FROM zigbee2mqtt_devices_list where zigbeeModel='".$res['MODELID']."'");
$out['MODELNAME']=$res1['model'];

//$out['SELECTVENDOR']=$res1['vendor'];

if (strlen($out['SELECTVENDOR'])=="0") {
//echo "123";
//$out['SELECTVEDNOR']=$res1['vendor'];
$out['NEEDSAVEVENDOR']="1";
//debmes("SELECTTYPE:".strlen($out['SELECTTYPE']).":".$out['SELECTTYPE'], 'zigbee2mqtt');
}

if (strlen($out['SELECTTYPE'])=="0") {
//echo "123";
$out['SELECTTYPE']=$res1['model'];
$out['NEEDSAVETYPE']="1";
//debmes("SELECTTYPE:".strlen($out['SELECTTYPE']).":".$out['SELECTTYPE'], 'zigbee2mqtt');
}


$out['VENDOR']=$res1['vendor'];
$out['DESCRIPTION']=$res1['description'];
$out['EXTEND']=$res1['extend'];
$out['SUPPORTS']=$res1['supports'];
$out['FROMZIGBEE']=$res1['fromZigbee'];
$out['TOZIGBEE']=$res1['toZigbee'];


$tmp=SQLSelect("SELECT distinct vendor FROM zigbee2mqtt_devices_list ");
$out['SELECTVENDORARRAY']=$tmp;


if ($out['SELECTVENDOR']) {

$tmp=SQLSelect("SELECT * FROM zigbee2mqtt_devices_list where vendor='".$out['SELECTVENDOR']."' order by vendor, zigbeeModel");
} else 

{
$tmp=SQLSelect("SELECT * FROM zigbee2mqtt_devices_list   order by vendor, zigbeeModel");
}
$out['SELECTTYPEARRAY']=$tmp;
//debmes($tmp, 'zigbee2mqtt');


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
  
  
    //options for 'LOCATION_ID' (select)
  $tmp=SQLSelect("SELECT ID, TITLE FROM zigbee2mqtt_grouplist ORDER BY TITLE");
  $locations_total=count($tmp);
  for($locations_i=0;$locations_i<$locations_total;$locations_i++) {
   $location_id_opt[$tmp[$locations_i]['ID']]=$tmp[$locations_i]['TITLE'];
  }
  for($i=0;$i<count($tmp);$i++) {
   if ($res['GROUP']==$tmp[$i]['TITLE']) $tmp[$i]['SELECTED']=1;
  }
  $out['GROUPS']=$tmp;




//debmes('location', 'zigbee2mqtt');
//debmes($tmp, 'zigbee2mqtt');




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
   debmes('$dev_location_id='. $devlocid, 'zigbee2mqtt');


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


   global $creategroup;

if (($creategroup)&&(strlen($creategroup)>0)&&($creategroup!='select')) {
   $rec['GROUP']=$creategroup;

$tmp=SQLSelectOne("SELECT * from zigbee2mqtt_grouplist where TITLE='$creategroup'");

if (!$tmp['ID'])  $this->sendcommand('zigbee2mqtt/bridge/config/add_group', $creategroup);
  $this->sendcommand('zigbee2mqtt/bridge/group/'.$creategroup.'/add', $dev_title);
} else $rec['GROUP']='';


   global $selectdevicegroup;
   
   debmes('$selectdevicegroup='.$selectdevicegroup,'zigbee2mqtt');

if (($selectdevicegroup)&&(strlen($selectdevicegroup)>0)) {
   $rec['GROUP']=$selectdevicegroup;

  $this->sendcommand('zigbee2mqtt/bridge/group/'.$creategroup.'/add', $dev_title);
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

//debmes($cnt,'zigbee2mqtt');
debmes($files[$cnt-1]['TITLE'],'zigbee2mqtt');

$lastfile=$files[$cnt-1]['TITLE'];
$filename=$zigbee2mqttpath.'/data/log/'.$lastfile.'/log.txt';


} 

$out['FN']=$filename;
//$out['FN']="1234";

//$a=file_get_contents ($filename, null,null,1000);


$tmp=file($filename); 
$newtmp=array_reverse($tmp); 
$a="";
foreach ($newtmp as $value) 
{ 
$a.= $value; 
} 

$a =  str_replace( array("\r\n","\r","\n") , '<br>' , $a);
$out['LOG']=$a;


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
setGlobal('cycle_zigbee2mqttControl','start'); 
$this->redirect("?");
}


 if ($this->view_mode=='send_test_mqtt') {


global $mqttsendpath;
global $mqttsendvalue;
debmes('send custom message topic: '.$mqttsendpath.' value:'.$mqttsendvalue, 'zigbee2mqtt');

  $this->sendcommand($mqttsendpath, $mqttsendvalue);
//  $this->sendcommand('zigbee2mqtt/bridge/config/devices', '');

$this->redirect("?tab=log");


}


 if ($this->tab=='service') {

$a=shell_exec("sudo systemctl status zigbee2mqtt");
$a =  str_replace( array("\r\n","\r","\n") , '<br>' , $a);
$out['status']=$a;


}

 if ($this->tab=='map') {

  require(DIR_MODULES.$this->name.'/map.inc.php');
//   $this-redirect("?tab=map");
//   $this->redirect("?tab=map");

//   $this->redirect("?data_source=&view_mode=&id=&tab=map");
}


// if ($this-tab=='map') {
//global $tab;
 if (tab=='map') {

   $this->redirect("?tab=map");
}



 if ($this->view_mode=='srv_start') {
$a=shell_exec("sudo systemctl start zigbee2mqtt");
$a=shell_exec("sudo systemctl status zigbee2mqtt");
$a =  str_replace( array("\r\n","\r","\n") , '<br>' , $a);
$out['status']=$a;
   $this->redirect("?tab=service");

}


 if ($this->view_mode=='device_on') {
	$id=$this->id;
//	$this->setProperty($mqtt_properties[$i]['ID'], $value);
debmes('!!!!!!!device_on','zigbee2mqtt');
	$this->setPropertyDevice($id, 'device_on_left');
   $this->redirect("?");
}

 if ($this->view_mode=='device_off') {
	$id=$this->id;
debmes('!!!!!!!device_off','zigbee2mqtt');
//	$this->setProperty($mqtt_properties[$i]['ID'], $value);
	$this->setPropertyDevice($id, 'device_off_left');
   $this->redirect("?");
}

 if ($this->view_mode=='device_on_right') {
	$id=$this->id;
//	$this->setProperty($mqtt_properties[$i]['ID'], $value);
debmes('!!!!!!!device_on','zigbee2mqtt');
	$this->setPropertyDevice($id, 'device_on_right');
   $this->redirect("?");
}

 if ($this->view_mode=='device_off_right') {
	$id=$this->id;
debmes('!!!!!!!device_off','zigbee2mqtt');
//	$this->setProperty($mqtt_properties[$i]['ID'], $value);
	$this->setPropertyDevice($id, 'device_off_right');
   $this->redirect("?");
}



  if ($this->view_mode=='startpairing') {
  $this->sendcommand('zigbee2mqtt/bridge/config/permit_join', 'true');
//  $this->redirect("?tab=service");
  $this->redirect("?");
}

  if ($this->view_mode=='stoppairing') {
  $this->sendcommand('zigbee2mqtt/bridge/config/permit_join', 'false');
//  $this->redirect("?tab=service");
  $this->redirect("?");
}

  if ($this->view_mode=='resetznp') {
  $this->sendcommand('zigbee2mqtt/bridge/config/reset', '');
//  $this->redirect("?tab=service");
  $this->redirect("?");
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
   $this->redirect("?tab=map");
}

 if ($this->view_mode=='updatedb') {

   $this->updatedb();
   $this->redirect("?tab=service");
}





//$vm1=$this->view_mode;
// echo "<script type='text/javascript'>";
// echo "alert('$vm1');";
// echo "</script>";



 if ($this->view_mode=='update_settings') {



   global $mqtt_client;
   global $mqtt_host;
   global $mqtt_username;
   global $mqtt_password;
   global $mqtt_auth;
   global $mqtt_port;
   global $z2m_logmode;
   global $mqtt_query;
   global $zigbee2mqttpath;
//echo $zigbee2mqttpath;

//$vm1=$this->view_mode;
// echo "<script type='text/javascript'>";
// echo "alert('$z2m_logmode');";
// echo "</script>";


   $this->config['MQTT_CLIENT']=trim($mqtt_client);
   $this->config['ZIGBEE2MQTTPATH']=trim($zigbee2mqttpath);
   $this->config['MQTT_HOST']=trim($mqtt_host);
   $this->config['MQTT_USERNAME']=trim($mqtt_username);
   $this->config['MQTT_PASSWORD']=trim($mqtt_password);
   $this->config['MQTT_AUTH']=(int)$mqtt_auth;
   $this->config['MQTT_PORT']=(int)$mqtt_port;
   $this->config['MQTT_QUERY']=trim($mqtt_query);
   $this->config['Z2M_LOGMODE']=trim($z2m_logmode);

//  $this->sendcommand('zigbee2mqtt/bridge/config/log_level', $z2m_logmode);


   $this->saveConfig();

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

 if (!$this->config['ZIGBEE2MQTTPATCH']) {
  $this->config['ZIGBEE2MQTTPATCH']='/opt/zigbee2mqtt/';
  $this->saveConfig();
 }


 if (!$this->config['MQTT_QUERY']) {
  $this->config['MQTT_QUERY']='zigbee2mqtt/#';
  $this->saveConfig();
 }


 if ($this->data_source=='mqtt' || $this->data_source=='') {
//  if ($this->view_mode=='' || $this->view_mode=='search_mqtt') {
   $this->search_mqtt($out);
  }




  if ($this->view_mode=='edit_mqtt') {
   $this->edit_mqtt($out, $this->id);
  }




//echo $this->view_mode;
  if ($this->view_mode=='creategroup') {
//   $this->edit_mqtt($out, $this->id);
debmes('creategroup id:'.$this->id.' group:'.$this->groupname, 'zigbee2mqtt');

  }


  if ($this->view_mode=='delete_dev') {
   $this->delete_dev($this->id);
   $this->redirect("?");
  }


  if ($this->view_mode=='delete_dev_z2m') {
  $this->sendcommand('zigbee2mqtt/bridge/config/remove', $this->ieee);
   $this->delete_dev($this->id);
   $this->redirect("?");
  }


  if ($this->view_mode=='delete_group') {
  //$this->sendcommand('zigbee2mqtt/bridge/config/remove', $this->ieee);
  SQLExec("DELETE FROM zigbee2mqtt_grouplist WHERE ID='".$this->id."'");
   $this->redirect("?tab=groups");
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

  $this->sendcommand('zigbee2mqtt/bridge/config/groups', '');


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

  $this->sendcommand('zigbee2mqtt/bridge/config/device_group_remove_all',$tmp[$i]['TITLE']);
  //$this->sendcommand('zigbee2mqtt/bridge/group/'.$tmp[$i]['TITLE'].'/remove_all','');
  
}


$tmp=SQLSelect("SELECT * from zigbee2mqtt_grouplist");
  for($i=0;$i<count($tmp);$i++) {

  //$this->sendcommand('zigbee2mqtt/bridge/config/device_group_remove_all',$tmp[$i]['TITLE']);
  $this->sendcommand('zigbee2mqtt/bridge/group/'.$tmp[$i]['TITLE'].'/remove_all','');
  
}

SQLExec("DELETE FROM zigbee2mqtt_grouplist");
//  $this->sendcommand('zigbee2mqtt/bridge/group/group1', '');
  $this->redirect("?tab=groups");

}



     if ($this->view_mode=='refresh_mqtt') {
//         $this->refresh_db();
//  $this->sendcommand('zigbee2mqtt/bridge/log', 'zigbee2mqtt/bridge/config/devices');


SQLExec ('update  zigbee2mqtt set VALUE="" where TITLE="zigbee2mqtt/bridge/log"');

  $this->sendcommand('zigbee2mqtt/bridge/config/devices', '');
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
debmes($sql,'zigbee2mqtt');
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
//debmes('123', 'zigbee2mqtt');
}
*/
}


function refreshdb_mqtt() {

$log=SQLSelectOne ('select * from zigbee2mqtt where TITLE="zigbee2mqtt/bridge/log"');
$log1=$log['VALUE'];
debmes('log: '.$log1, 'zigbee2mqtt');
$json2=json_decode($log1);

//debmes($json, 'zigbee2mqtt');


$json=$json2->{'message'};
//debmes($json, 'zigbee2mqtt');

/*
foreach ( $json as $v)
{
debmes('****************', 'zigbee2mqtt');
debmes('ieeeAddr:'.$v, 'zigbee2mqtt');
}
*/


    $total = count($json);
//   debmes('total:'.$total, 'zigbee2mqtt');
    for ($i=0;$i<$total;$i++) {

$cdev=$json[$i]->{'ieeeAddr'};

if ($cdev){
debmes('cdev:'.$cdev, 'zigbee2mqtt');
$sql="SELECT * FROM zigbee2mqtt_devices where IEEEADDR='".$cdev."'";
debmes($sql, 'zigbee2mqtt');
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


$res2['SELECTTYPE']=    $json[$i]->{'model'};


$res2['SELECTVENDOR']=$temp['vendor'];
$res2['MANUFACTURE']=$temp['vendor'];
$res2['MODEL']=$json[$i]->{'model'};
$res2['DEVICE_NAME']=$temp['zigbeeModel'];
$res2['TYPE']=   	$json[$i]->{'type'};

//$res2['TYPE']=$temp['zigbeeModel'];
//$res2['MODEL']=$json[$i]->{'type'};


//$res2['IEEEADDR']=      $json[$i]->{'ieeeAddr'};
$res2['IEEEADDR']=$cdev;


     if ($res2['ID']) 
{
debmes('update', 'zigbee2mqtt');
debmes($res2, 'zigbee2mqtt');
SQLUPDATE('zigbee2mqtt_devices', $res2);
}
else 
{
debmes('insert', 'zigbee2mqtt');
if ($json[$i]->{'model'}) $res2['SELECTTYPE']=    $json[$i]->{'model'};

$res2['TITLE']=$res2['IEEEADDR'];
debmes($res2, 'zigbee2mqtt');
if (($res2['TITLE'])&&($res2['TYPE']!='Coordinator')&&($res2['TITLE']!='bridge')) 
SQLInsert('zigbee2mqtt_devices', $res2);
}


if ($res2['TYPE']=='Coordinator') SQLExec	('update zigbee2mqtt_devices set SELECTVENDOR="Texas Instruments", SELECTTYPE="cc2531", IEEEADDR="'.$res2['IEEEADDR'].'" where TITLE="bridge"', $res2);
}






}
/*
debmes($sql, 'zigbee2mqtt');
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

function parse_deviceinfo($ar) {

//$log=SQLSelectOne ('select * from zigbee2mqtt where TITLE="zigbee2mqtt/bridge/log"');
//$log1=$log['VALUE'];

$log1=$ar;
//debmes('log: '.$log1, 'zigbee2mqtt');
debmes($log1, 'zigbee2mqtt');
//$json2=json_decode($log1);
$json2=$log1;

//debmes($json, 'zigbee2mqtt');


$json=$json2->{'message'};

    $total = count($json);
//   debmes('total:'.$total, 'zigbee2mqtt');
    for ($i=0;$i<$total;$i++) {

$cdev=$json[$i]->{'ieeeAddr'};

if ($cdev){



debmes('cdev:'.$cdev, 'zigbee2mqtt');
$sql="SELECT * FROM zigbee2mqtt_devices where IEEEADDR='".$cdev."'";
debmes($sql, 'zigbee2mqtt');
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


$res2['SELECTTYPE']=    $json[$i]->{'model'};


$res2['SELECTVENDOR']=$temp['vendor'];
$res2['MANUFACTURE']=$temp['vendor'];
$res2['MODEL']=$json[$i]->{'model'};
$res2['DEVICE_NAME']=$temp['zigbeeModel'];
$res2['TYPE']=   	$json[$i]->{'type'};

//$res2['TYPE']=$temp['zigbeeModel'];
//$res2['MODEL']=$json[$i]->{'type'};


//$res2['IEEEADDR']=      $json[$i]->{'ieeeAddr'};
$res2['IEEEADDR']=$cdev;


     if ($res2['ID']) 
{
debmes('update', 'zigbee2mqtt');
debmes($res2, 'zigbee2mqtt');
SQLUPDATE('zigbee2mqtt_devices', $res2);
}
else 
{
debmes('insert', 'zigbee2mqtt');
if ($json[$i]->{'model'}) $res2['SELECTTYPE']=    $json[$i]->{'model'};

$res2['TITLE']=$res2['IEEEADDR'];
debmes($res2, 'zigbee2mqtt');
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
debmes($rec4[$ij], 'z2m');
SQLUpdate(  'zigbee2mqtt_devices',$rec4[$ij]); 
}


$maparray=SQLSelectOne ('select * from zigbee2mqtt where TITLE="zigbee2mqtt/bridge/networkmap/raw"');
$map=$maparray['VALUE'];
debmes($map, 'zigbee2mqtt');

$json1=json_decode($map);

    $total = count($json1);
debmes($total, 'zigbee2mqtt');

    for ($ij=0;$ij<$total;$ij++) {
//$str=$json1[$ij]['ieeeAddr'].":".$json1[$ij]['nwkAddr'];
$str=$json1[$ij];

$ieeeAddr=$str->{'ieeeAddr'};
$parent=$str->{'parent'};
$status=$str->{'status'};
$nwkAddr=$str->{'nwkAddr'};
$lqi=$str->{'lqi'};

debmes($ieeeAddr.":".$parent, 'zigbee2mqtt');

$defaultiee=SQLSelectOne ("select * from zigbee2mqtt_devices where TITLE='bridge'")['IEEEADDR'];

debmes('default:'.$defaultiee, 'zigbee2mqtt');

$rec3=SQLSelectOne ("select * from zigbee2mqtt_devices where IEEEADDR='$ieeeAddr'");
if   ($rec3) 
{
//if (strlen($parent)>3)  {$rec3['PARRENTIEEEADDR']=$parent;} else {   $rec3['PARRENTIEEEADDR']=$defaultiee; }
$rec3['PARRENTIEEEADDR']=$parent;
$rec3['LQI']=$lqi;
$rec3['STATUS']=$status;
$rec3['NWKADDR']=$nwkAddr;
SQLUpdate(  'zigbee2mqtt_devices',$rec3); 


}

//var_dump( $str);
// $json3= json_decode  ($str,true);

//foreach ( $json3 as $key=>$value)
//{debmes($key.":".$value, 'zigbee2mqtt');}



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
    if ($this->ajax) {
        global $op;
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
        echo json_encode($result);
        exit;
    }
 $this->admin($out);
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

debmes('Сработал propertySetHandle object:'.$object." property:". $property." value:". $value,  'zigbee2mqtt');
$sql="SELECT * FROM zigbee2mqtt WHERE LINKED_OBJECT LIKE '".DBSafe($object)."' AND LINKED_PROPERTY LIKE '".DBSafe($property)."'";
debmes($sql, 'zigbee2mqtt');


   $mqtt_properties=SQLSelect($sql);
   $total=count($mqtt_properties);
debmes($object.":". $property.":". $value. ' найдено результатов '. $total, 'zigbee2mqtt');

   if ($total) {
    for($i=0;$i<$total;$i++) {
     debmes('Запускаем setProperty '. $mqtt_properties[$i]['ID'].":".$value, 'zigbee2mqtt');
     $this->setProperty($mqtt_properties[$i]['ID'], $value);
    }
   }  
 }
    

/**
* mqtt delete record
*
* @access public
*/
 function delete_dev($id) {

//debmes("SELECT * FROM zigbee2mqtt WHERE DEV_ID='$id'",'zigbee2mqtt');
//  $rec=SQLSelectOne("SELECT * FROM zigbee2mqtt WHERE DEV_ID='$id'");
  // some action for related tables

//debmes("DELETE FROM zigbee2mqtt WHERE DEV_ID='".$rec['DEV_ID']."'",'zigbee2mqtt');

  SQLExec("DELETE FROM zigbee2mqtt_devices WHERE ID='".$id."'");

  SQLExec("DELETE FROM zigbee2mqtt WHERE DEV_ID='".$id."'");

 }


 function delete_mqtt($id) {

//debmes("SELECT * FROM zigbee2mqtt WHERE DEV_ID='$id'",'zigbee2mqtt');
//  $rec=SQLSelectOne("SELECT * FROM zigbee2mqtt WHERE DEV_ID='$id'");
  // some action for related tables

//debmes("DELETE FROM zigbee2mqtt WHERE DEV_ID='".$rec['DEV_ID']."'",'zigbee2mqtt');


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
 }
/**
* Uninstall
*
* Module uninstall routine
*
* @access public
*/




function get_map(){
  include_once("./lib/mqtt/phpMQTT.php");

   $this->getConfig();
   if ($mqtt->config['MQTT_CLIENT']) {
    $client_name=$mqtt->config['MQTT_CLIENT'];
   } else {
    $client_name="MajorDoMo MQTT";
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

   $mqtt_client = new phpMQTT($host, $port, $client_name.' Client');

   if(!$mqtt_client->connect(true, NULL,$username,$password))
   {
    return 0;
   }


debmes('Запрашиваем карту ', 'zigbee2mqtt');




//   $mqtt_client->publish('zigbee2mqtt/bridge/networkmap','graphviz');
   $mqtt_client->publish('zigbee2mqtt/bridge/networkmap','raw');
   //$mqtt_client->publish($rec['PATH_WRITE'].'/set',$jsonvalue, (int)$rec['QOS'], (int)$rec['RETAIN']);


   $mqtt_client->close();
}



function sendcommand($topic, $command){
  include_once("./lib/mqtt/phpMQTT.php");

   $this->getConfig();
   if ($mqtt->config['MQTT_CLIENT']) {
    $client_name=$mqtt->config['MQTT_CLIENT'];
   } else {
    $client_name="MajorDoMo MQTT";
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

   $mqtt_client = new phpMQTT($host, $port, $client_name.' Client');

   if(!$mqtt_client->connect(true, NULL,$username,$password))
   {
    return 0;
   }


debmes('Запрашиваем '.$topic.' '.$command, 'zigbee2mqtt');
   $mqtt_client->publish($topic,$command);
   $mqtt_client->close();
}


 function uninstall() {
  SQLExec('DROP TABLE IF EXISTS zigbee2mqtt');
  SQLExec('DROP TABLE IF EXISTS zigbee2mqtt_devices');
  SQLExec('DROP TABLE IF EXISTS zigbee2mqtt_devices_list');
  SQLExec('DROP TABLE IF EXISTS zigbee2mqtt_devices_command');
   
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
 zigbee2mqtt_devices: MODELID varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: STATUS varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: JOINTIME varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: DID varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: D_ID varchar(100) NOT NULL DEFAULT ''
 zigbee2mqtt_devices: FIND datetime
 zigbee2mqtt_devices: LOCATION_ID int(10) NOT NULL DEFAULT '0'

 zigbee2mqtt_devices_list: ID int(10) unsigned NOT NULL auto_increment
 zigbee2mqtt_devices_list: zigbeeModel varchar(100) NOT NULL DEFAULT ''
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



 zigbee2mqtt: ID int(10) unsigned NOT NULL auto_increment
 zigbee2mqtt: TITLE varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt: LOCATION_ID int(10) NOT NULL DEFAULT '0'
 zigbee2mqtt: UPDATED datetime
 zigbee2mqtt: VALUE longtext NOT NULL DEFAULT ''
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

 zigbee2mqtt_log: ID int(10) unsigned NOT NULL auto_increment
 zigbee2mqtt_log: TITLE varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt_log: MESSAGE varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt_log: TYPE varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt_log: FIND datetime

 zigbee2mqtt_grouplist: ID int(10) unsigned NOT NULL auto_increment
 zigbee2mqtt_grouplist: Z2M_ID varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt_grouplist: TITLE varchar(255) NOT NULL DEFAULT ''
 zigbee2mqtt_grouplist: ADDED datetime




EOD;
  parent::dbInstall($data);

  require(DIR_MODULES.$this->name.'/database1.inc.php');
  require(DIR_MODULES.$this->name.'/database2.inc.php');

}







 
// --------------------------------------------------------------------
}
/*
*
* TW9kdWxlIGNyZWF0ZWQgSnVsIDE5LCAyMDEzIHVzaW5nIFNlcmdlIEouIHdpemFyZCAoQWN0aXZlVW5pdCBJbmMgd3d3LmFjdGl2ZXVuaXQuY29tKQ==
*
*/
?>
