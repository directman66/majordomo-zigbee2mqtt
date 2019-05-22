<?php
/*
* @version 0.1 (wizard)
*/


 global $session;
  if ($this->owner->name=='panel') {
   $out['CONTROLPANEL']=1;
  }
  $qry="1";
  // search filters
  //searching 'TITLE' (varchar)
  global $title;
  if ($title!='') {
   $qry.=" AND (TITLE LIKE '%".DBSafe($title)."%' OR VALUE LIKE '%".DBSafe($title)."%' OR PATH LIKE '%".DBSafe($title)."%')";
   $out['TITLE']=$title;
  }

  $out['LOCATIONS']=SQLSelect("SELECT * FROM locations ORDER BY TITLE");

  $out['ZIGBEE2MQTTTYPE']=SQLSelect("SELECT distinct TYPE 'TYPE' FROM zigbee2mqtt_devices_list");




   //deviles
//  $res=SQLSelect("SELECT * FROM zigbee2mqtt_devices WHERE $qry ORDER BY ".$sortby_mqtt);
//if ($this->view_mode==''||$this->view_mode=='device')

//  $res=SQLSelect("SELECT *  FROM (select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.* from zigbee2mqtt_devices )zigbee2mqtt_devices LEFT JOIN zigbee2mqtt_devices_list ON zigbee2mqtt_devices_list.zigbeeModel like '%'||zigbee2mqtt_devices.MODEL||'%' ");
//  $res=SQLSelect('SELECT *  FROM (select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.* from zigbee2mqtt_devices  WHERE MODEL<>"" )zigbee2mqtt_devices LEFT JOIN zigbee2mqtt_devices_list ON zigbee2mqtt_devices_list.zigbeeModel like CONCAT("%",zigbee2mqtt_devices.MODEL,"%") ');
//  $res=SQLSelect('SELECT *  FROM (select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.* from zigbee2mqtt_devices  WHERE MODEL<>"" )zigbee2mqtt_devices LEFT JOIN zigbee2mqtt_devices_list ON zigbee2mqtt_devices_list.zigbeeModel=zigbee2mqtt_devices.MODEL ');
//  $res=SQLSelect('SELECT *  FROM (select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.* from zigbee2mqtt_devices  WHERE MODEL<>"" )zigbee2mqtt_devices LEFT JOIN zigbee2mqtt_devices_list ON zigbee2mqtt_devices_list.zigbeeModel like CONCAT(zigbee2mqtt_devices.MODEL,"%") ');
//  $res=SQLSelect('SELECT *  FROM (select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.* from zigbee2mqtt_devices  WHERE MODEL<>"" ) zigbee2mqtt_devices LEFT JOIN zigbee2mqtt_devices_list ON zigbee2mqtt_devices_list.zigbeeModel=zigbee2mqtt_devices.SELECTTYPE');
//  $res=SQLSelect('SELECT *  FROM (select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.* from zigbee2mqtt_devices  WHERE MODEL<>"" ) zigbee2mqtt_devices ');
//  $res=SQLSelect('SELECT *  FROM (select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.* from zigbee2mqtt_devices  WHERE MODEL<>"" )zigbee2mqtt_devices LEFT JOIN zigbee2mqtt_devices_list ON zigbee2mqtt_devices_list.zigbeeModel=zigbee2mqtt_devices.MODELID order by 1' );
  //$res=SQLSelect('select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.* from zigbee2mqtt_devices   order by MANUFACTURE' );
//  $res=SQLSelect('select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.*,LOCATION from zigbee2mqtt_devices, (select ID LOCID, TITLE LOCATION from locations) locations where locations.LOCID=zigbee2mqtt_devices.LOCATION_ID order by MANUFACTURE' );
  $res=SQLSelect('select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.*,LOCATION from zigbee2mqtt_devices  left join (select ID LOCID, TITLE LOCATION from locations) locations ON  zigbee2mqtt_devices.LOCATION_ID=locations.LOCID order by MANUFACTURE ' );
//  $res=SQLSelect('select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.*,LOCATION from zigbee2mqtt_devices  left join (select ID LOCID, TITLE LOCATION from locations) locations ON  zigbee2mqtt_devices.LOCATION_ID=locations.LOCID where  TITLE<>"bridge" order by MANUFACTURE ' );

  
  
  //SELECT ID, TITLE FROM locations ORDER BY TITLE
  

  if ($res[0]['ID']) {
   if (!$out['TREE']) {
    paging($res, 50, $out); // search result paging
   }
   $total=count($res);
   for($i=0;$i<$total;$i++) {
    // some action for every record if required
    //$tmp=explode(' ', $res[$i]['UPDATED']);
    //$res[$i]['UPDATED']=fromDBDate($tmp[0])." ".$tmp[1];
//    $res[$i]['VALUE']=str_replace('":','": ',$res[$i]['VALUE']);
$lnk="";
$bat="";
//    if ($res[$i]['TITLE']==$res[$i]['PATH'] && !$out['TREE']) $res[$i]['PATH']='';

$sql="SELECT *  FROM  zigbee2mqtt where LENGTH(LINKED_OBJECT)>2  and DEV_ID='".$res[$i]['DEVID']."'";

  $res2=SQLSelect($sql);
   $total2=count($res2);

//debmes($sql.'count : '.$total2,'zigbee2mqtt');
 for($j=0;$j<$total2;$j++) {
$lnk.=$res2[$j]['LINKED_OBJECT'].'.'.$res2[$j]['LINKED_PROPERTY'].":".$res2[$j]['VALUE'].';  ';

if  ($res2[$j]['METRIKA']=='battery')   $bat= $res2[$j]['VALUE'];

}

if (strlen($lnk) >2) $lnk='('. substr($lnk, 0, -3).')';
$res[$i]['LINKED']=$lnk;





if ($res[$i]['POWERSOURCE']=='Battery')
{

 $bat=SQLSelectOne($sql="SELECT *  FROM  zigbee2mqtt where METRIKA='battery'  and DEV_ID='".$res[$i]['DEVID']."'")['VALUE'];

                  $res[$i]['POWER_WARNING'] = 'success';
               if ($bat<= 40)
                  $res[$i]['POWER_WARNING'] = 'warning';
               if ($bat<= 20)
                  $res[$i]['POWER_WARNING'] = 'danger';

$res[$i]['BATTERY']=$bat;}

/*
 if (
(($res[$i]['type']=='bulb')||
($res[$i]['type']=='remote')||
($res[$i]['type']=='Router')||
($res[$i]['type']=='switch')
)
&&
($res[$i]['model']!='MFKZQ01LM')
)
*/


$sql="SELECT *  FROM  zigbee2mqtt_devices_list where model='".$res[$i]['SELECTTYPE']."'";
//echo "<br>".$sql;
$basa=SQLSelectOne($sql);
 $ttype=$basa['type'];
//echo "1".$ttype;

 if ($ttype=='bulb')  $res[$i]['CHANGEABLE']='1';

 if ($basa['model']=='KS-SM001')  $res[$i]['CHANGEABLE']='1';
 if ($basa['model']=='LLKZMK11LM')  $res[$i]['CHANGEABLE']='2';





 if ( ($ttype=='switch')) $res[$i]['CHANGEABLE']='1';
 if ( ($ttype=='switch') && (strpos($basa['description'],'double')>0)) $res[$i]['CHANGEABLE']='2';

//&&($res[$i]['model']!='MFKZQ01LM')




//echo time().":".strtotime($res[$i]['FIND'])."=".time()-strtotime($res[$i]['FIND'])."<br>";

 if (time()-strtotime($res[$i]['FIND'])>3000) {
  $res[$i]['LOST']='1';
}
//  $res[$i]['LOST']='1';



   }




// $bat=SQLSelectOne($sql="SELECT *  FROM  zigbee2mqtt_device_command  where METRIKA='battery'  and DEV_ID='".$res[$i]['DEVID']."'")['VALUE'];



   

//debmes('devid:'.$res[$i]['DEVID'].'count:'.$total2."::::".$lnk,'zigbee2mqtt');

//print_r($res);
//echo "<br>";
//echo "<br>";
   $out['DEVICES']=$res;


  }

//$vm=$res;
// echo "<script type='text/javascript'>";
// echo "alert('$vm');";
// echo "</script>";




//  $out['LOCATIONS']=SQLSelect("SELECT * FROM locations ORDER BY TITLE");
//  $out['ZIGBEE2MQTTDEV']=SQLSelect("SELECT @rownum := @rownum + 1 AS ID,t.* FROM (SELECT distinct SPLIT_STRING(TITLE, '/', 2) TITLE FROM zigbee2mqtt) t, (SELECT @rownum := 0) r");



  global $dev_id;

// echo "<script type='text/javascript'>";
// echo "alert('$dev_id');";
// echo "</script>";



  if ($dev_id!='') {
   $qry.=" AND (TITLE LIKE '%".DBSafe($dev_id)."%' OR VALUE LIKE '%".DBSafe($dev_id)."%' OR PATH LIKE '%".DBSafe($dev_id)."%')";
   $out['ZIGBEE2MQTTDEV']=$dev_id;
  }



  global $location_id;
  if ($location_id) {
   $qry.=" AND LOCATION_ID='".(int)$location_id."'";
   $out['LOCATION_ID']=(int)$location_id;
  }

  if (IsSet($this->location_id)) {
   $location_id=$this->location_id;
   $qry.=" AND LOCATION_ID='".$this->location_id."'";
  } else {
   global $location_id;
  }
  // QUERY READY
  global $save_qry;
  if ($save_qry) {
   $qry=$session->data['mqtt_qry'];
  } else {
   $session->data['mqtt_qry']=$qry;
  }
  if (!$qry) $qry="1";
  // FIELDS ORDER
  global $sortby_mqtt;
  if (!$sortby_mqtt) {
   $sortby_mqtt=$session->data['mqtt_sort'];
  } else {
   if ($session->data['mqtt_sort']==$sortby_mqtt) {
    if (Is_Integer(strpos($sortby_mqtt, ' DESC'))) {
     $sortby_mqtt=str_replace(' DESC', '', $sortby_mqtt);
    } else {
     $sortby_mqtt=$sortby_mqtt." DESC";
    }
   }
   $session->data['mqtt_sort']=$sortby_mqtt;
  }
  //if (!$sortby_mqtt) $sortby_mqtt="ID DESC";
  $sortby_mqtt="UPDATED DESC";
  $out['SORTBY']=$sortby_mqtt;

  global $tree;
  if (!isset($tree)) {
   $tree=(int)$session->data['MQTT_TREE_VIEW'];
  } else {
   $session->data['MQTT_TREE_VIEW']=$tree;
  }

  if (isset($_GET['tree'])) {
   $tree=(int)$_GET['tree'];
   $this->config['TREE_VIEW']=$tree;
   $this->saveConfig();
  } else {
   $tree = $this->config['TREE_VIEW'];
  }

  if ($tree) {
   $out['TREE']=1;
  }

  // SEARCH RESULTS
  if ($out['TREE']) {
   $sortby_mqtt='PATH';
  }
//echo $this->view_mode;
//$vm=$this->view_mode;
// echo "<script type='text/javascript'>";
// echo "alert('$vm');";
// echo "</script>";


if ($this->tab=='groups'){

  $sql0='SELECT *  FROM zigbee2mqtt_grouplist';

debmes($sql0,'zigbee2mqtt');

$ssql=SQLSelect($sql0);

$out['GROUPS']=$ssql;


}

if ($this->tab=='log2'){

  $sql0='SELECT *  FROM zigbee2mqtt_log order by FIND DESC LIMIT 100';

debmes($sql0,'zigbee2mqtt');

$ssql=SQLSelect($sql0);

$out['LOG2']=$ssql;


}



if ($this->tab=='edit_parametrs'){

$vm=$this->id;
// echo "<script type='text/javascript'>";
// echo "alert('$vm');";
// echo "</script>";
  $out['ID']=$this->id;



//$zm=SQLSelect("SELECT * FROM zigbee2mqtt_devices_command WHERE zigbeeModel=".$this->id);

//$sql0='SELECT *  FROM (select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.* from zigbee2mqtt_devices where ID="'.$vm.'" ) zigbee2mqtt_devices LEFT JOIN zigbee2mqtt_devices_list ON zigbee2mqtt_devices_list.zigbeeModel like CONCAT("%",zigbee2mqtt_devices.MODEL,"%")  ';

//  $sql0='SELECT *  FROM (select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.* from zigbee2mqtt_devices where ID="'.$vm.'" ) zigbee2mqtt_devices LEFT JOIN zigbee2mqtt_devices_list ON zigbee2mqtt_devices_list.zigbeeModel like CONCAT("%",zigbee2mqtt_devices.MODEL,"%") ';
  $sql0='SELECT *  FROM (select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.* from zigbee2mqtt_devices where ID="'.$vm.'" ) zigbee2mqtt_devices LEFT JOIN zigbee2mqtt_devices_list ON zigbee2mqtt_devices_list.zigbeeModel like CONCAT("%",zigbee2mqtt_devices.MODELID,"%") ';

debmes($sql0,'zigbee2mqtt');

$ssql=SQLSelectOne($sql0);

//$zm=$ssql['model'];
$zm=$ssql['SELECTTYPE'];

//$sql="SELECT * FROM (select * from zigbee2mqtt_devices_command  WHERE zigbeeModel='".$zm."') zigbee2mqtt_devices_command  LEFT JOIN zigbee2mqtt ON zigbee2mqtt.PATH like CONCAT('%','".$ssql['IEEEADDR']."','%')" ;

//$sql="SELECT * FROM (select * from zigbee2mqtt_devices_command WHERE zigbeeModel='".$zm."') zigbee2mqtt_devices_command LEFT JOIN (select * from zigbee2mqtt where PATH like CONCAT('%','".$ssql['IEEEADDR']."','%') ) zigbee2mqtt ON zigbee2mqtt.METRIKA=zigbee2mqtt_devices_command.value_template  ";


//$sql="select * from (select *,zigbee2mqtt.ID zmID  from zigbee2mqtt where PATH like CONCAT('%','".$ssql['IEEEADDR']."','%')  )zigbee2mqtt left join (select * from zigbee2mqtt_devices_command WHERE zigbeeModel='".$zm."') zigbee2mqtt_devices_command ON zigbee2mqtt.METRIKA=zigbee2mqtt_devices_command.value_template ";
//////////////
//////////////

$sql="select  zigbee2mqtt.*, zigbee2mqtt_devices_command.*  from (select *,zigbee2mqtt.ID zmID  from zigbee2mqtt where PATH like CONCAT('%','".$ssql['IEEEADDR']."','%')  )zigbee2mqtt left join (select * from zigbee2mqtt_devices_command WHERE zigbeeModel='".$zm."') zigbee2mqtt_devices_command ON zigbee2mqtt.METRIKA=zigbee2mqtt_devices_command.value_template 
union
select  zigbee2mqtt.*, zigbee2mqtt_devices_command.*  from (select * from zigbee2mqtt_devices_command WHERE zigbeeModel='".$zm."') zigbee2mqtt_devices_command left join (select *,zigbee2mqtt.ID zmID  from zigbee2mqtt where PATH like CONCAT('%','".$ssql['IEEEADDR']."','%')  )zigbee2mqtt ON zigbee2mqtt.METRIKA=zigbee2mqtt_devices_command.value_template
";

//$sql="select  zigbee2mqtt_devices.*, zigbee2mqtt_devices_command.*  from (select *,zigbee2mqtt.ID zmID  from zigbee2mqtt_devices where PATH like CONCAT('%','".$ssql['IEEEADDR']."','%')  )zigbee2mqtt left join (select * from zigbee2mqtt_devices_command WHERE zigbeeModel='".$zm."') zigbee2mqtt_devices_command ON zigbee2mqtt.METRIKA=zigbee2mqtt_devices_command.value_template 
//union
//select  zigbee2mqtt.*, zigbee2mqtt_devices_command.*  from (select * from zigbee2mqtt_devices_command WHERE zigbeeModel='".$zm."') zigbee2mqtt_devices_command left join (select *,zigbee2mqtt.ID zmID  from zigbee2mqtt where PATH like CONCAT('%','".$ssql['IEEEADDR']."','%')  )zigbee2mqtt ON zigbee2mqtt.METRIKA=zigbee2mqtt_devices_command.value_template
//";




debmes($sql,'zigbee2mqtt');

 $res=SQLSelect($sql);

  if (!$res[0]['ID1']) {

   $total=count($res);
   for($i=0;$i<$total;$i++) {

//    $res[$i]['VALUE']=str_replace('":','": ',$res[$i]['VALUE']);

$res[$i]['state_topic']=str_replace('<FRIENDLY_NAME>',$ssql['IEEEADDR'],$res[$i]['state_topic']);
//$res[$i]['state_topic']=str_replace('<FRIENDLY_NAME>',"123",$res[$i]['state_topic']);
//$res[$i]['state_topic']="123";
$res[$i]['availability_topic']=str_replace('<FRIENDLY_NAME>',$ssql['IEEEADDR'],$res[$i]['availability_topic']);
$res[$i]['command_topic']=str_replace('<FRIENDLY_NAME>',$ssql['IEEEADDR'],$res[$i]['command_topic']);

//if (($res[$i]['command_topic'])&& (!$res[$i]['PATH_WRITE'])) 
if ($res[$i]['command_topic']) 
{
//$sql="update zigbee2mqtt set PATH_WRITE='".$res[$i]['command_topic']."/".$res[$i]['value_template']."' where ID='".$res[$i]['zmID']."'";
$sql="update zigbee2mqtt set PATH_WRITE='".$res[$i]['command_topic']."' where ID='".$res[$i]['zmID']."'";
debmes($sql, 'zigbee2mqtt');
SQLExec ($sql);
}


if (($res[$i]['payload_on'])&& (!$res[$i]['PAYLOAD_ON'])) 
{
//$sql="update zigbee2mqtt set PATH_WRITE='".$res[$i]['command_topic']."/".$res[$i]['value_template']."' where ID='".$res[$i]['zmID']."'";
$sql="update zigbee2mqtt set PAYLOAD_ON='".$res[$i]['payload_on']."' where ID='".$res[$i]['zmID']."'";
debmes($sql, 'zigbee2mqtt');
SQLExec ($sql);
}

if (($res[$i]['payload_off'])&& (!$res[$i]['PAYLOAD_OFF'])) 
{
//$sql="update zigbee2mqtt set PATH_WRITE='".$res[$i]['command_topic']."/".$res[$i]['value_template']."' where ID='".$res[$i]['zmID']."'";
$sql="update zigbee2mqtt set PAYLOAD_OFF='".$res[$i]['payload_off']."' where ID='".$res[$i]['zmID']."'";
debmes($sql, 'zigbee2mqtt');
SQLExec ($sql);
}


if ($res[$i]['command_value']) 
{
//$sql="update zigbee2mqtt set PATH_WRITE='".$res[$i]['command_topic']."/".$res[$i]['value_template']."' where ID='".$res[$i]['zmID']."'";
$sql="update zigbee2mqtt set COMMAND_VALUE='".$res[$i]['command_value']."' where ID='".$res[$i]['zmID']."'";
debmes($sql, 'zigbee2mqtt');
SQLExec ($sql);
}




//$res[$i]['value']="123";





//    if ($res[$i]['TITLE']==$res[$i]['PATH'] && !$out['TREE']) $res[$i]['PATH']='';   }
   $out['RESULT']=$res;

//   if ($out['TREE']) {    $out['RESULT']=$this->pathToTree($res);   }

  }

}}




if ($this->view_mode=='view_mqtt'&&$this->tab=='edit_data'){

$vm=$this->id;
// echo "<script type='text/javascript'>";
// echo "alert('$vm');";
// echo "</script>";
  $out['ID']=$this->id;
  $res=SQLSelect("SELECT * FROM zigbee2mqtt WHERE dev_id=".$this->id);
  if ($res[0]['ID']) {
   if (!$out['TREE']) {
    paging($res, 50, $out); // search result paging
   }
   $total=count($res);
   for($i=0;$i<$total;$i++) {
    // some action for every record if required
    //$tmp=explode(' ', $res[$i]['UPDATED']);
    //$res[$i]['UPDATED']=fromDBDate($tmp[0])." ".$tmp[1];
    $res[$i]['VALUE']=str_replace('":','": ',$res[$i]['VALUE']);

    if ($res[$i]['TITLE']==$res[$i]['PATH'] && !$out['TREE']) $res[$i]['PATH']='';
   }
   $out['RESULT']=$res;

   if ($out['TREE']) {
    $out['RESULT']=$this->pathToTree($res);
   }

  }
}



                if ($this->tab == 'log'||$this->view_mode == 'update_log') {

                    global $limit;
                    if (!$limit) {
                        $limit = 50;
                    }

                    global $file;
                    if (!$file  ) {
//                        $file = date('Y-m-d') . '.log';

//            $path = ROOT . 'cms/debmes';

$this->getConfig();
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

            $out['FILES'] = $files;



                    }






                }



?>
