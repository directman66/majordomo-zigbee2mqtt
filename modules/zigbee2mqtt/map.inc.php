<?php
//$maparray=SQLSelectOne ('select * from zigbee2mqtt where value like "digraph%"');
$maparray=SQLSelectOne ('select * from zigbee2mqtt where path like "zigbee2mqtt/bridge/networkmap/raw"');

$out['map_array']=$maparray['VALUE'];

$nodess=json_decode($maparray['VALUE'],true);

//debmes ($maparray['VALUE'],'zigbee2mqtt');
//debmes ($nodess,'zigbee2mqtt');
/*
        foreach($nodess as $k=>$v) { 
//        {id: 11, font:{size:30}, size:40, label: 'coordinator', shape: 'circularImage', image: '/templates/zigbee2mqtt/img/cc2531.jpg', shapeProperties: {borderDashes:[15,5]}},	
	if (is_array($v))
 	        foreach($v as $kk=>$vv)
		{}

echo $k.":".$v;
 }

*/
  $nodes = <<<EOD
        {id: 1, font:{size:30},          label: 'circle',  shape: 'circle' , shapeProperties:{borderDashes:[5,5]}},
        {id: 11, font:{size:30}, size:40, label: 'coordinator', shape: 'circularImage', image: '/templates/zigbee2mqtt/img/cc2531.jpg', shapeProperties: {borderDashes:[15,5]}},	
EOD;

$out['NODES']=$nodes




?>

