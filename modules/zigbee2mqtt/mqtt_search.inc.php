<?php
/*
* @version 0.1 (wizard)
*/

//global $location_id;
///$vm=$location_id;
// echo "<script type='text/javascript'>";
// echo "alert('$vm');";
// echo "</script>";






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
  $out['GROUP_LISTS']=SQLSelect("SELECT * FROM zigbee2mqtt_grouplist ORDER BY TITLE");

//  $out['ZIGBEE2MQTTTYPE']=SQLSelect("SELECT distinct TYPE 'TYPE' FROM zigbee2mqtt_devices_list");
  $out['ZIGBEE2MQTTTYPE']=SQLSelect("SELECT @i:=@i+1 AS ID, t.* FROM (SELECT distinct TYPE 'TYPE' FROM zigbee2mqtt_devices_list where TYPE<>'group') AS t, (SELECT @i:=0) AS foo");

  $out['VENDORARRAY']=SQLSelect("SELECT @i:=@i+1 AS ID, t.* FROM (SELECT distinct VENDOR 'TYPE' FROM zigbee2mqtt_devices_list, zigbee2mqtt_devices where zigbee2mqtt_devices.SELECTVENDOR=zigbee2mqtt_devices_list.vendor and VENDOR<>'group' ) AS t, (SELECT @i:=0) AS foo");






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
//  $res=SQLSelect('select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.*,LOCATION from zigbee2mqtt_devices  left join (select ID LOCID, TITLE LOCATION from locations) locations ON  zigbee2mqtt_devices.LOCATION_ID=locations.LOCID order by MANUFACTURE ' );
//  $res=SQLSelect('select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.*,LOCATION from zigbee2mqtt_devices  left join (select ID LOCID, TITLE LOCATION from locations) locations ON  zigbee2mqtt_devices.LOCATION_ID=locations.LOCID order by FIND  DESC' );







if (!isset($_GET['group_list_id'])) { 
$req_vid=' and SELECTVENDOR <>"group" '; 
}



if (isset($_GET['group_list_id'])&&($_GET['group_list_id']<>'100500')) { 

$group_list_id=$_GET['group_list_id'];

if ($group_list_id) 
{
$req_group=" and GROUPLIST RLIKE  \"^$group_list_id$|^$group_list_id,|,$group_list_id,|,$group_list_id$\"" ; 
$out['group_list_id']=(int)$group_list_id;
//  '^1$|^1,|,1,|,1$'

} else 
{
$req_group=" ";
$out['group_list_id']=(int)$group_list_id;
$req_vid=' and SELECTVENDOR <>"group" '; 

}
}

if (isset($_GET['group_list_id'])&&$_GET['group_list_id']=='100500') { 
$group_list_id=$_GET['group_list_id'];
$req_vid=' and SELECTVENDOR ="group" '; 
$out['group_list_id']=(int)$group_list_id;
}





if (isset($_GET['vendor_id'])&&$_GET['vendor_id']<>'0') { 

$vendor_id=$_GET['vendor_id'];

if ($vendor_id) 
$vendor_name=SQLSelectOne('select * from ( SELECT @i:=@i+1 AS ID, t.* FROM (SELECT distinct VENDOR "TYPE" FROM zigbee2mqtt_devices_list, zigbee2mqtt_devices where zigbee2mqtt_devices.SELECTVENDOR=zigbee2mqtt_devices_list.vendor ) AS t, (SELECT @i:=0) AS foo ) a where a.ID='.$vendor_id)['TYPE'];

$req_vendor=' and SELECTVENDOR="'.$vendor_name.'" '; 

$out['VENDOR']=(int)$vendor_id;
$out['VENDORNAME']=$vendor_name;
} else 
{
$req_vendor=' '; 
$out['VENDOR']='0';
$out['VENDORNAME']='';
$req_vendor=' '; 


}
/*
$this->getConfig();
if ($this->config['VID_ID']) {}
*/
/*
if (isset($_GET['vid_id'])&&$_GET['vid_id']<>'0') { 
$vid_id=$_GET['vid_id'];
//if ($vid_id==1) $	req_vid=' and TITLE not like "%group%"'; 
//if ($vid_id==2) $req_vid=' and TITLE like "%group%"'; 

if ($vid_id==1)  $req_vid=' and SELECTVENDOR <>"group" '; 
if ($vid_id==2)  $req_vid=' and SELECTVENDOR ="group" '; 


$this->config['VID_ID']=$vid_id;
$this->saveConfig();

$out['VID']=(int)$vid_id;
} else 
{
$req_vid=' '; 
$out['VID']='0';
//$req_vid=' and SELECTVENDOR <>"group" '; 

}

*/


if (isset($_GET['location'])&&$_GET['location']<>'0') { 
$location_id=$_GET['location'];
$req_location=' and LOCATION_ID='.$location_id; 
$out['LOCATION_ID']=(int)$location_id;
} else 
{
$req_location=' '; 
$out['LOCATION_ID']='0';

}



if (isset($_GET['type_id'])&&($_GET['type_id']<>'0')) { 
$type_id=$_GET['type_id'];

$type_name=SQLSelectOne('select * from ( SELECT @i:=@i+1 AS ID, t.* FROM (SELECT distinct TYPE "TYPE" FROM zigbee2mqtt_devices_list) AS t, (SELECT @i:=0) AS foo ) a where a.ID='.$type_id)['TYPE'];
$req_type=' and SELECTTYPE IN (select model from zigbee2mqtt_devices_list where type="'.$type_name.'")'; 
   $out['ZIGBEE2MQTTDEV']=$type_id;
} else 
{
$req_type=' ';   
$out['ZIGBEE2MQTTDEV']='0'; 
}





//if (($req_type=' ')&&($req_vendor=' '))    $req_vid=' and SELECTVENDOR <>"group" '; 
//if (($req_type==' ')&&($req_vendor==' '))    $req_vid=' and SELECTVENDOR <>"group" '; 

//  $res=SQLSelect('select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.*,LOCATION from zigbee2mqtt_devices  left join (select ID LOCID, TITLE LOCATION from locations) locations ON  zigbee2mqtt_devices.LOCATION_ID=locations.LOCID  where  TITLE<>"bridge"  '.$req_location.' '. $req_type. ' order by  FIND  DESC' );
$sql='select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.TYPE , zigbee2mqtt_devices.*,LOCATION from zigbee2mqtt_devices  left join (select ID LOCID, TITLE LOCATION from locations) locations ON  zigbee2mqtt_devices.LOCATION_ID=locations.LOCID  where  TITLE<>"bridge" and selecttype<>"cc2531" '.$req_location.' '. $req_type.' '.$req_vendor. ' '.$req_vid. ' '.$req_group. ' order by  DATE(FIND) DESC, SELECTVENDOR ';
//debmes($sql, 'zigbee2mqtt');
  $res=SQLSelect( $sql);

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


$lnk="";
$sql="SELECT *  FROM  zigbee2mqtt where LENGTH(LINKED_PROPERTY)>2  and DEV_ID='".$res[$i]['DEVID']."'";

  $res2=SQLSelect($sql);
   $total2=count($res2);

//debmes($sql.'count : '.$total2,'zigbee2mqtt');
 for($j=0;$j<$total2;$j++) {

//if ($res2[$j]['LINKED_PROPERTY']) $prpr='.'.$res2[$j]['LINKED_PROPERTY']; else $prpr="";

if (
($res2[$j]['METRIKA']=='state')||
($res2[$j]['METRIKA']=='occupancy')||
($res2[$j]['METRIKA']=='brightness')||
($res2[$j]['METRIKA']=='click')||
($res2[$j]['METRIKA']=='action')||
($res2[$j]['METRIKA']=='state_left')||
($res2[$j]['METRIKA']=='state_right')||
($res2[$j]['METRIKA']=='contact')||
($res2[$j]['METRIKA']=='temperature')||
($res2[$j]['METRIKA']=='humidity')||
($res2[$j]['METRIKA']=='state_l1')||
($res2[$j]['METRIKA']=='state_l2')



)

 if ($res2[$j]['LINKED_PROPERTY']) $lnk.=$res2[$j]['VALUE'].';  ';

//$lnk.=$res2[$j]['LINKED_OBJECT'].$prpr.":".$res2[$j]['VALUE'].';  ';

if  ($res2[$j]['METRIKA']=='battery')   $bat= $res2[$j]['VALUE'];

}

//if (strlen($lnk) >2) $lnk='('. substr($lnk, 0, -3).')';
$res[$i]['LINKED']=$lnk;

$lnk2="";

//$sql="SELECT *  FROM  zigbee2mqtt where LENGTH(LINKED_METHOD)>2  and DEV_ID='".$res[$i]['DEVID']."' and PATH like '%ZigBeeCA20%'" ;
$sql="SELECT *  FROM  zigbee2mqtt where LENGTH(LINKED_METHOD)>2  and DEV_ID='".$res[$i]['DEVID']."'" ;

  $res2=SQLSelect($sql);
   $total2=count($res2);

//debmes($sql.'count : '.$total2,'zigbee2mqtt');
 for($j=0;$j<$total2;$j++) {

//if ($res2[$j]['LINKED_PROPERTY']) $prpr='.'.$res2[$j]['LINKED_PROPERTY']; else $prpr="";

if ($res2[$j]['LINKED_METHOD']) $lnk2.=$res2[$j]['LINKED_METHOD'].';  ';

//$lnk.=$res2[$j]['LINKED_OBJECT'].$prpr.":".$res2[$j]['VALUE'].';  ';



}

//if (strlen($lnk) >2) $lnk='('. substr($lnk, 0, -3).')';
$res[$i]['METHOD']=$lnk2;







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
 if ($ttype=='dimmer')  $res[$i]['CHANGEABLE']='1';
 if ($ttype=='openable')  $res[$i]['CHANGEABLE']='4';
 if ( ($ttype=='relay')) $res[$i]['CHANGEABLE']='1';
 if ( ($ttype=='plug')) $res[$i]['CHANGEABLE']='1';
 if ( ($ttype=='switch') && (strpos($basa['description'],'double')>0)) $res[$i]['CHANGEABLE']='2';
 if ( ($ttype=='switch')) $res[$i]['CHANGEABLE']='1';

 if ($basa['model']=='KS-SM001')    $res[$i]['CHANGEABLE']='1';
 if ($basa['model']=='group')       $res[$i]['CHANGEABLE']='1';
 if ($basa['model']=='GL-C-008')    $res[$i]['CHANGEABLE']='1';
 if ($basa['model']=='GL-C-007')    $res[$i]['CHANGEABLE']='1';
 if ($basa['model']=='LLKZMK11LM')  $res[$i]['CHANGEABLE']='3';
 if ($basa['model']=='DIYRuZ_R8_8') $res[$i]['CHANGEABLE']='R8';
 if ($basa['model']=='DIYRuZ_R4_4') $res[$i]['CHANGEABLE']='R4';
 if ($basa['model']=='DIYRuZ_R4_5') $res[$i]['CHANGEABLE']='R4';
 if ($basa['model']=='DIYRuZ_Flower_WS') $res[$i]['CHANGEABLE']='R3';
 if ($basa['model']=='TI0001')      $res[$i]['CHANGEABLE']='2';
 if ($basa['model']=='QBKG12LM')    $res[$i]['CHANGEABLE']='2';
 if ($basa['model']=='QBKG11LM')    $res[$i]['CHANGEABLE']='1';
 if ($basa['model']=='QBKG03LM')    $res[$i]['CHANGEABLE']='2';
 if ($basa['model']=='GDKES-02TZXD')$res[$i]['CHANGEABLE']='2';

 if ($basa['model']=='DIYRuZ_R8_8') {

 $s1=SQLSelectOne($sql="SELECT *  FROM  zigbee2mqtt where METRIKA='state_l1'  and DEV_ID='".$res[$i]['DEVID']."'")['VALUE'];
 if ($s1=="ON")   $res[$i]['CHANGEABLE1']='1';

 $s1=SQLSelectOne($sql="SELECT *  FROM  zigbee2mqtt where METRIKA='state_l2'  and DEV_ID='".$res[$i]['DEVID']."'")['VALUE'];
 if ($s1=="ON")   $res[$i]['CHANGEABLE2']='1';

 $s1=SQLSelectOne($sql="SELECT *  FROM  zigbee2mqtt where METRIKA='state_l3'  and DEV_ID='".$res[$i]['DEVID']."'")['VALUE'];
 if ($s1=="ON")   $res[$i]['CHANGEABLE3']='1';


 $s1=SQLSelectOne($sql="SELECT *  FROM  zigbee2mqtt where METRIKA='state_l4'  and DEV_ID='".$res[$i]['DEVID']."'")['VALUE'];
 if ($s1=="ON")   $res[$i]['CHANGEABLE4']='1';


 $s1=SQLSelectOne($sql="SELECT *  FROM  zigbee2mqtt where METRIKA='state_l5'  and DEV_ID='".$res[$i]['DEVID']."'")['VALUE'];
 if ($s1=="ON")   $res[$i]['CHANGEABLE5']='1';


 $s1=SQLSelectOne($sql="SELECT *  FROM  zigbee2mqtt where METRIKA='state_l6'  and DEV_ID='".$res[$i]['DEVID']."'")['VALUE'];
 if ($s1=="ON")   $res[$i]['CHANGEABLE6']='1';


 $s1=SQLSelectOne($sql="SELECT *  FROM  zigbee2mqtt where METRIKA='state_l7'  and DEV_ID='".$res[$i]['DEVID']."'")['VALUE'];
 if ($s1=="ON")   $res[$i]['CHANGEABLE7']='1';

 $s1=SQLSelectOne($sql="SELECT *  FROM  zigbee2mqtt where METRIKA='state_l8'  and DEV_ID='".$res[$i]['DEVID']."'")['VALUE'];
 if ($s1=="ON")   $res[$i]['CHANGEABLE8']='1';







}









 if ($basa['model']=='ZLED-TUNE9')      $res[$i]['COLOR_TEMP']='1';


 if ($basa['model']=='QBKG03LM')  $res[$i]['DISABLERED']='2';
 if ($basa['model']=='QBKG04LM')  $res[$i]['DISABLERED']='1';
 if ($basa['model']=='QBKG12LM')  $res[$i]['DISABLERED']='2';
 if ($basa['model']=='QBKG11LM')  $res[$i]['DISABLERED']='1';



 if ($basa['model']=='LTW010')  $res[$i]['COLOR_TEMP']='1';	
 if ($basa['model']=='LTW010')  $res[$i]['XY']='0';	

 if ($basa['model']=='8718696548738')  $res[$i]['COLOR_TEMP']='1';	
 if ($basa['model']=='8718696548738')  $res[$i]['XY']='0';	





 if ($basa['model']=='GL-C-008')  $res[$i]['COLOR_TEMP']='1';
 if ($basa['model']=='GL-C-008')  $res[$i]['XY']='1';
 if ($basa['model']=='GL-C-007')  $res[$i]['COLOR_TEMP']='1';
 if ($basa['model']=='GL-C-007')  $res[$i]['XY']='1';
 if ($basa['model']=='GL-C-007-2ID')  $res[$i]['COLOR_TEMP']='1';
 if ($basa['model']=='GL-C-007-2ID')  $res[$i]['XY']='1';


 if ($basa['model']=='LED1624G9')  $res[$i]['XY']='1';
 if ($basa['model']=='81809')  	   $res[$i]['XY']='1';
 if ($basa['model']=='group')      $res[$i]['XY']='1';
 if ($basa['model']=='ZLL-ExtendedColo')      $res[$i]['XY']='1';
 if ($basa['model']=='LED1624G9')  $res[$i]['COLOR_TEMP']='1';
 if ($basa['model']=='ZLL-ExtendedColo')      $res[$i]['COLOR_TEMP']='1';
 if ($basa['model']=='ZNLDP12LM')  $res[$i]['COLOR_TEMP']='1';
 if ($basa['model']=='81809')  	   $res[$i]['COLOR_TEMP']='1';
 if ($basa['model']=='group')      $res[$i]['COLOR_TEMP']='1';









//&&($res[$i]['model']!='MFKZQ01LM')




//echo time().":".strtotime($res[$i]['FIND'])."=".time()-strtotime($res[$i]['FIND'])."<br>";

 if (time()-strtotime($res[$i]['FIND'])>18000) {
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

//debmes($sql0,'zigbee2mqtt');

$ssql=SQLSelect($sql0);

$out['GROUPS']=$ssql;


}

if ($this->tab=='log2'){

  $sql0='SELECT *  FROM zigbee2mqtt_log order by FIND DESC LIMIT 100';

//debmes($sql0,'zigbee2mqtt');

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

//debmes($sql0,'zigbee2mqtt');

$ssql=SQLSelectOne($sql0);

//$zm=$ssql['model'];
$zm=$ssql['SELECTTYPE'];
$gw=$ssql['GW'];

//$sql="SELECT * FROM (select * from zigbee2mqtt_devices_command  WHERE zigbeeModel='".$zm."') zigbee2mqtt_devices_command  LEFT JOIN zigbee2mqtt ON zigbee2mqtt.PATH like CONCAT('%','".$ssql['IEEEADDR']."','%')" ;

//$sql="SELECT * FROM (select * from zigbee2mqtt_devices_command WHERE zigbeeModel='".$zm."') zigbee2mqtt_devices_command LEFT JOIN (select * from zigbee2mqtt where PATH like CONCAT('%','".$ssql['IEEEADDR']."','%') ) zigbee2mqtt ON zigbee2mqtt.METRIKA=zigbee2mqtt_devices_command.value_template  ";


//$sql="select * from (select *,zigbee2mqtt.ID zmID  from zigbee2mqtt where PATH like CONCAT('%','".$ssql['IEEEADDR']."','%')  )zigbee2mqtt left join (select * from zigbee2mqtt_devices_command WHERE zigbeeModel='".$zm."') zigbee2mqtt_devices_command ON zigbee2mqtt.METRIKA=zigbee2mqtt_devices_command.value_template ";
//////////////
//////////////

$sql="select  zigbee2mqtt.*, zigbee2mqtt_devices_command.*  from (select *,zigbee2mqtt.ID zmID  from zigbee2mqtt where PATH like CONCAT('%','".$ssql['IEEEADDR']."','%')  )zigbee2mqtt left join (select * from zigbee2mqtt_devices_command WHERE zigbeeModel='".$zm."') zigbee2mqtt_devices_command ON zigbee2mqtt.METRIKA=zigbee2mqtt_devices_command.value_template WHERE  PATH like '%$gw%' 
union
select  zigbee2mqtt.*, zigbee2mqtt_devices_command.*  from (select * from zigbee2mqtt_devices_command WHERE zigbeeModel='".$zm."') zigbee2mqtt_devices_command left join (select *,zigbee2mqtt.ID zmID  from zigbee2mqtt where PATH like CONCAT('%','".$ssql['IEEEADDR']."','%')   )zigbee2mqtt ON zigbee2mqtt.METRIKA=zigbee2mqtt_devices_command.value_template 
";

//$sql="select  zigbee2mqtt_devices.*, zigbee2mqtt_devices_command.*  from (select *,zigbee2mqtt.ID zmID  from zigbee2mqtt_devices where PATH like CONCAT('%','".$ssql['IEEEADDR']."','%')  )zigbee2mqtt left join (select * from zigbee2mqtt_devices_command WHERE zigbeeModel='".$zm."') zigbee2mqtt_devices_command ON zigbee2mqtt.METRIKA=zigbee2mqtt_devices_command.value_template 
//union
//select  zigbee2mqtt.*, zigbee2mqtt_devices_command.*  from (select * from zigbee2mqtt_devices_command WHERE zigbeeModel='".$zm."') zigbee2mqtt_devices_command left join (select *,zigbee2mqtt.ID zmID  from zigbee2mqtt where PATH like CONCAT('%','".$ssql['IEEEADDR']."','%')  )zigbee2mqtt ON zigbee2mqtt.METRIKA=zigbee2mqtt_devices_command.value_template
//";




debmes($sql,'zigbee2mqtt2323');

 $res=SQLSelect($sql);

  if (!$res[0]['ID1']) {

   $total=count($res);
   for($i=0;$i<$total;$i++) {

//    $res[$i]['VALUE']=str_replace('":','": ',$res[$i]['VALUE']);
$this->getConfig();
//$zz=explode('/',$this->config['MQTT_QUERY'])[0];
$zz=$gw;

//$res[$i]['state_topic']=str_replace('<FRIENDLY_NAME>',$ssql['IEEEADDR'],$res[$i]['state_topic']);
$res[$i]['state_topic']=str_replace('<Z2M_PATH>', $zz,str_replace('<FRIENDLY_NAME>',$ssql['IEEEADDR'],$res[$i]['state_topic']));
//$res[$i]['state_topic']=str_replace('<FRIENDLY_NAME>',"123",$res[$i]['state_topic']);
//$res[$i]['state_topic']="123";
//$res[$i]['availability_topic']=str_replace('<FRIENDLY_NAME>',$ssql['IEEEADDR'],$res[$i]['availability_topic']);
$res[$i]['availability_topic']=str_replace('<Z2M_PATH>', $zz,str_replace('<FRIENDLY_NAME>',$ssql['IEEEADDR'],$res[$i]['availability_topic']));
//$res[$i]['command_topic']=str_replace('<FRIENDLY_NAME>',$ssql['IEEEADDR'],$res[$i]['command_topic']);
$res[$i]['command_topic']=str_replace('<Z2M_PATH>', $zz,str_replace('<FRIENDLY_NAME>',$ssql['IEEEADDR'],$res[$i]['command_topic']));

//if (($res[$i]['command_topic'])&& (!$res[$i]['PATH_WRITE'])) 
if ($res[$i]['command_topic']) 
{
//$sql="update zigbee2mqtt set PATH_WRITE='".$res[$i]['command_topic']."/".$res[$i]['value_template']."' where ID='".$res[$i]['zmID']."'";
$sql="update zigbee2mqtt set PATH_WRITE='".$res[$i]['command_topic']."' where ID='".$res[$i]['zmID']."'";
//debmes($sql, 'zigbee2mqtt');
SQLExec ($sql);
}


if (($res[$i]['payload_on'])&& (!$res[$i]['PAYLOAD_ON'])) 
{
//$sql="update zigbee2mqtt set PATH_WRITE='".$res[$i]['command_topic']."/".$res[$i]['value_template']."' where ID='".$res[$i]['zmID']."'";
$sql="update zigbee2mqtt set PAYLOAD_ON='".$res[$i]['payload_on']."' where ID='".$res[$i]['zmID']."'";
//debmes($sql, 'zigbee2mqtt');
SQLExec ($sql);
}

if (($res[$i]['payload_off'])&& (!$res[$i]['PAYLOAD_OFF'])) 
{
//$sql="update zigbee2mqtt set PATH_WRITE='".$res[$i]['command_topic']."/".$res[$i]['value_template']."' where ID='".$res[$i]['zmID']."'";
$sql="update zigbee2mqtt set PAYLOAD_OFF='".$res[$i]['payload_off']."' where ID='".$res[$i]['zmID']."'";
//debmes($sql, 'zigbee2mqtt');
SQLExec ($sql);
}


if ($res[$i]['command_value']) 
{
//$sql="update zigbee2mqtt set PATH_WRITE='".$res[$i]['command_topic']."/".$res[$i]['value_template']."' where ID='".$res[$i]['zmID']."'";
$sql="update zigbee2mqtt set COMMAND_VALUE='".$res[$i]['command_value']."' where ID='".$res[$i]['zmID']."'";
//debmes($sql, 'zigbee2mqtt');
SQLExec ($sql);
}




//$res[$i]['value']="123";





//    if ($res[$i]['TITLE']==$res[$i]['PATH'] && !$out['TREE']) $res[$i]['PATH']='';   }
   $out['RESULT']=$res;

//   if ($out['TREE']) {    $out['RESULT']=$this->pathToTree($res);   }

  }

}
}




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

                if ($this->tab == 'bind') {

 $res=SQLSelect('SELECT * FROM zigbee2mqtt_bind '); 

$out['BIND'] =  $res;


 $res=SQLSelect('SELECT * FROM zigbee2mqtt_devices WHERE SELECTTYPE IN (select model from zigbee2mqtt_devices_list where type="REMOTE")'); 

$out['SOURCE'] =  $res;


// $res=SQLSelect('SELECT * FROM zigbee2mqtt_devices WHERE SELECTTYPE IN (select model from zigbee2mqtt_devices_list where type="REMOTE")'); 
$res=array("TITLE"=>"Single");
$out['KEY'] =  $res;


 $res=SQLSelect('SELECT * FROM zigbee2mqtt_devices WHERE SELECTTYPE IN (select model from zigbee2mqtt_devices_list where type="BULB")'); 

$out['TARGET'] =  $res;

$res=array();
$res[]=array("TITLE"=>"Single");
$res[]=array("TITLE"=>"Left")  ;
$res[]=array("TITLE"=>"Right") ;

$out['ENDPOINT'] =  $res;



}



?>
