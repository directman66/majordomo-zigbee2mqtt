<?php          
//$maparray=SQLSelectOne ('select * from zigbee2mqtt where value like "digraph%"');
//$maparray=SQLSelect('SELECT *  FROM (select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.* from zigbee2mqtt_devices )zigbee2mqtt_devices LEFT JOIN zigbee2mqtt_devices_list ON zigbee2mqtt_devices_list.zigbeeModel=zigbee2mqtt_devices.MODEL ');
//$maparray=SQLSelect("SELECT * FROM (select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.* from zigbee2mqtt_devices )zigbee2mqtt_devices LEFT JOIN zigbee2mqtt_devices_list ON zigbee2mqtt_devices_list.zigbeeModel like concat('%',zigbee2mqtt_devices.MODEL,'%') ");
$maparray=SQLSelect("select * from zigbee2mqtt_devices   ");



//$out['map_array']=$maparray['VALUE'];
 $nodes="";
$egdes="";

$defaultiee=SQLSelectOne ("select * from zigbee2mqtt_devices where TITLE='bridge'")['IEEEADDR'];
    $total = count($maparray);
    for ($i=0;$i<$total;$i++) {

if (!$maparray[$i]['IEEEADDR']) {$idd=$defaultiee;} else {$idd=$maparray[$i]['IEEEADDR'];}
if (!$maparray[$i]['PARRENTIEEEADDR']) {$parrentieee=$defaultiee;} else {$parrentieee=$maparray[$i]['PARRENTIEEEADDR'];}

//   $nodes.= "{id: ".$idd.", font:{size:10}, size:40,   label: '".$maparray[$i]['description']."',  group: 0,  shape: 'circularImage', image: '/templates/zigbee2mqtt/img/".$maparray[$i]['model'].".jpg', },";
   $nodes.= "{id: ".$idd.",  size:60, color:'white', font:{color:'black', size:10},  label: '".$maparray[$i]['TITLE']."',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/".$maparray[$i]['SELECTTYPE'].".jpg', },";



// if ($idd!=$defaultiee)   $edges.= "{from: $defaultiee, to: ".$idd."},";
 if ($idd!=$defaultiee)   $edges.= "{from: $parrentieee, to: ".$idd.', label: "'.$maparray[$i]['LQI'].'"},';
}    

//   $edges.= '{"id": "7","from": "7","to": "0},{"id": "9","from": "9","to": "0" },{"id": "4","from": "2","to": "0"},{"id": "5","from": "3","to": "0" },';
//   $edges.= '{from: 0, to: 7},';



$out['map_array']=$nodes;


$graph=SQLSelectOne ('select * from zigbee2mqtt where value like "digraph%"');

$mygaph=str_replace(array("\r\n", "\r", "\n"), '',  strip_tags($graph['VALUE']));

$out['GRAPH']=$mygaph;


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



$map='
  <script type="text/javascript">
    var nodes = null;
    var edges = null;
    var network = null;

 

    function draw() {
      nodes = [
'.$nodes.'        

      ];

      edges = [
'.$edges.'

      ];

      // create a network
      var container = document.getElementById(\'mynetwork\');
      var data = {
        nodes: nodes,
        edges: edges
      };
      var options = {physics:{barnesHut:{gravitationalConstant:-4000}}};
      network = new vis.Network(container, data, options);
    }
  </script>

<br>
  

<body onload="draw()">

<div id="mynetwork"></div>

<div id="info"></div>
</body>

';

$out['SCRIPT']=$map;

//debmes($map, 'zigbee2mqtt');




///   $this->redirect("?tab=map");
//   $this->redirect("?data_source=&view_mode=&id=&tab=map");

?>

