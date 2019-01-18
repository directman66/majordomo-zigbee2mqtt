<?php          
//$maparray=SQLSelectOne ('select * from zigbee2mqtt where value like "digraph%"');
$maparray=SQLSelect('SELECT *  FROM (select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.* from zigbee2mqtt_devices )zigbee2mqtt_devices LEFT JOIN zigbee2mqtt_devices_list ON zigbee2mqtt_devices_list.zigbeeModel=zigbee2mqtt_devices.MODEL ');

//$out['map_array']=$maparray['VALUE'];
 $nodes="";
$egdes="";

$defaultiee=SQLSelectOne ("select * from zigbee2mqtt_devices where TITLE='bridge'")['IEEEADDR'];
    $total = count($maparray);
    for ($i=0;$i<$total;$i++) {

if (!$maparray[$i]['IEEEADDR']) {$idd=$defaultiee;} else {$idd=$maparray[$i]['IEEEADDR'];}
if (!$maparray[$i]['PARRENTIEEEADDR']) {$parrentieee=$defaultiee;} else {$parrentieee=$maparray[$i]['PARRENTIEEEADDR'];}

//   $nodes .= "{id: ".$idd.", font:{size:10}, size:40,   label: '".$maparray[$i]['description']."',  group: 0,  shape: 'circularImage', image: '/templates/zigbee2mqtt/img/".$maparray[$i]['model'].".jpg', shapeProperties:{borderDashes:[5,5]},},";
   $nodes.= "{id: ".$idd.", font:{size:10}, size:40,   label: '".$maparray[$i]['description']."',  group: 0,  shape: 'circularImage', image: '/templates/zigbee2mqtt/img/".$maparray[$i]['model'].".jpg', },";
// if ($idd!=$defaultiee)   $edges.= "{from: $defaultiee, to: ".$idd."},";
 if ($idd!=$defaultiee)   $edges.= "{from: $parrentieee, to: ".$idd."},";
}    

//   $edges.= '{"id": "7","from": "7","to": "0},{"id": "9","from": "9","to": "0" },{"id": "4","from": "2","to": "0"},{"id": "5","from": "3","to": "0" },';
//   $edges.= '{from: 0, to: 7},';



$out['map_array']=$nodes;
//$out['EDGES']=$edges;


//$nodess=json_decode($maparray['VALUE'],true);

//debmes ($maparray['VALUE'],'zigbee2mqtt');
//debmes ($nodess,'zigbee2mqtt');

//        foreach($nodess as $k=>$v) { 
//        {id: 11, font:{size:30}, size:40, label: 'coordinator', shape: 'circularImage', image: '/templates/zigbee2mqtt/img/cc2531.jpg', shapeProperties: {borderDashes:[15,5]}},	
//	if (is_array($v))
// 	        foreach($v as $kk=>$vv)
//		{}

//echo $k.":".$v;
// }

/*
  $nodes = <<<EOD
        {id: 1, font:{size:30},          label: 'circle',  shape: 'circle' , shapeProperties:{borderDashes:[5,5]}},
        {id: 12, font:{size:30}, size:40, label: 'coordinator', shape: 'circularImage', image: '/templates/zigbee2mqtt/img/cc2531.jpg', shapeProperties: {borderDashes:[15,5]}},	
EOD;

//        {id: 7, font:{size:30}, label: 'Aqara single key wired wall switch', shape: 'circle', image: '/templates/zigbee2mqtt/img/QBKG04LM.jpg', shapeProperties:{borderDashes:[5,5]},
//        {id: 7, font:{size:30}, , size:40, label: 'Aqara single key wired wall switch', shape: 'circle', image: '/templates/zigbee2mqtt/img/QBKG04LM.jpg', shapeProperties:{borderDashes:[5,5]}},
  $nodes = <<<EOD
        {id: 7, font:{size:30},  size:40, label: 'Aqara single key wired wall switch', shape: 'circle', image: '/templates/zigbee2mqtt/img/QBKG04LM.jpg', shapeProperties:{borderDashes:[5,5]}},
        {id: 1, font:{size:30}, size:40, label: 'coordinator', shape: 'circularImage', image: '/templates/zigbee2mqtt/img/cc2531.jpg', shapeProperties: {borderDashes:[15,5]}},	
        {id: 12, font:{size:30}, size:40, label: 'coordinator', shape: 'circularImage', image: '/templates/zigbee2mqtt/img/cc2531.jpg', shapeProperties: {borderDashes:[15,5]}},	
EOD;
*/
//$nodes="{id: 7, font:{size:10}, size:40, label: 'Aqara single key wired wall switch', shape: 'circle', image: '/templates/zigbee2mqtt/img/QBKG04LM.jpg', shapeProperties:{borderDashes:[5,5]}},";
//$nodes="{id: 7, font:{size:10}, size:40, label: 'Aqara single key wired wall switch', shape: 'circularImage', image: '/templates/zigbee2mqtt/img/cc2531.jpg', shapeProperties:{borderDashes:[5,5]}},";

$out['NODES']=$nodes;
$out['EDGES']=$edges;




?>

