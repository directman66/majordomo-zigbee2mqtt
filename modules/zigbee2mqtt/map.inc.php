<?php          
//$maparray=SQLSelectOne ('select * from zigbee2mqtt where value like "digraph%"');
//$maparray=SQLSelect('SELECT *  FROM (select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.* from zigbee2mqtt_devices )zigbee2mqtt_devices LEFT JOIN zigbee2mqtt_devices_list ON zigbee2mqtt_devices_list.zigbeeModel=zigbee2mqtt_devices.MODEL ');
//$maparray=SQLSelect("SELECT * FROM (select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.* from zigbee2mqtt_devices )zigbee2mqtt_devices LEFT JOIN zigbee2mqtt_devices_list ON zigbee2mqtt_devices_list.zigbeeModel like concat('%',zigbee2mqtt_devices.MODEL,'%') ");
$maparray=SQLSelect("select * from zigbee2mqtt_devices  where LENGTH(TITLE)>0 and LENGTH(SELECTTYPE)>0 and SELECTTYPE<>'group'");



//$out['map_array']=$maparray['VALUE'];
 $nodes="";
$egdes="";

$defaultiee=SQLSelectOne ("select * from zigbee2mqtt_devices where TITLE='bridge'")['IEEEADDR'];
    $total = count($maparray);
    for ($i=0;$i<$total;$i++) {

if (!$maparray[$i]['IEEEADDR']) {$idd=$defaultiee;} else {$idd=$maparray[$i]['IEEEADDR'];}
if (!$maparray[$i]['PARRENTIEEEADDR']) {$parrentieee=$defaultiee;} else {$parrentieee=$maparray[$i]['PARRENTIEEEADDR'];}

//   $nodes.= "{id: ".$idd.", font:{size:10}, size:40,   label: '".$maparray[$i]['description']."',  group: 0,  shape: 'circularImage', image: '/templates/zigbee2mqtt/img/".$maparray[$i]['model'].".jpg', },";
if ($maparray[$i]['STATUS']) {$status=" (".$maparray[$i]['STATUS'].")";} else  {$status="";} 
   $nodes.= "{id: ".$idd.",  size:40, color:'white', font:{color:'black', size:10},  label: '".$maparray[$i]['TITLE'].$status. "',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/".$maparray[$i]['SELECTTYPE'].".jpg', },";



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
/*

$nodes="
{id: 0x000b57fffeb86106,  size:40, color:'white', font:{color:'black', size:10},  label: '0x000b57fffeb86106',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/E1524.jpg', },
{id: 0x01124b001baea534,  size:40, color:'white', font:{color:'black', size:10},  label: '0x01124b001baea534',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/KS-SM001.jpg', },
{id: 0x000d6ffffe20387e,  size:40, color:'white', font:{color:'black', size:10},  label: '0x000d6ffffe20387e',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/LED1624G9.jpg', },
{id: 0x00158d0001a24770,  size:40, color:'white', font:{color:'black', size:10},  label: '0x00158d0001a24770',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/LLKZMK11LM.jpg', },
{id: 0x00158d0002c65d56,  size:40, color:'white', font:{color:'black', size:10},  label: '0x00158d0002c65d56',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/ZNLDP12LM.jpg', },
{id: 0x00158d0001a2e891,  size:40, color:'white', font:{color:'black', size:10},  label: '0x00158d0001a2e891',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/WSDCGQ01LM.jpg', },
{id: 0x00158d0001150114,  size:40, color:'white', font:{color:'black', size:10},  label: '0x00158d0001150114',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/MFKZQ01LM.jpg', },
{id: 0x00158d0002afd713,  size:40, color:'white', font:{color:'black', size:10},  label: '0x00158d0002afd713',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/DJT11LM.jpg', },
{id: 0x00158d0002b76411,  size:40, color:'white', font:{color:'black', size:10},  label: '0x00158d0002b76411',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/RTCGQ11LM.jpg', },
{id: 0x00158d00026ea90d,  size:40, color:'white', font:{color:'black', size:10},  label: '0x00158d00026ea90d',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/WXKG02LM.jpg', },
{id: 0x00158d0001560da8,  size:40, color:'white', font:{color:'black', size:10},  label: '0x00158d0001560da8',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/WXKG01LM.jpg', },
{id: 0x00158d00022bc3ab,  size:40, color:'white', font:{color:'black', size:10},  label: '0x00158d00022bc3ab',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/QBKG03LM.jpg', },
{id: 0x00158d00029b4352,  size:40, color:'white', font:{color:'black', size:10},  label: '0x00158d00029b4352',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/QBKG04LM.jpg', },
{id: 0x000b57fffed4f6d4,  size:40, color:'white', font:{color:'black', size:10},  label: '0x000b57fffed4f6d4',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/LED1649C5.jpg', },
{id: 0x00158d00017394dd,  size:40, color:'white', font:{color:'black', size:10},  label: '0x00158d00017394dd',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/LXZB-02A.jpg', },
{id: 0x00158d0001a044d8,  size:40, color:'white', font:{color:'black', size:10},  label: '0x00158d0001a044d8',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/MCCGQ01LM.jpg', },
{id: 0x00158d0001a9e374,  size:40, color:'white', font:{color:'black', size:10},  label: '0x00158d0001a9e374',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/RTCGQ01LM.jpg', },
{id: 0x00158d0001bb383a,  size:40, color:'white', font:{color:'black', size:10},  label: '0x00158d0001bb383a',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/SJCGQ11LM.jpg', },
{id: 0x00124b001ba6e3c0,  size:40, color:'white', font:{color:'black', size:10},  label: '0x00124b001ba6e3c0',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/GL-C-008.jpg', },
{id: 0x00124b001938dc6d,  size:40, color:'white', font:{color:'black', size:10},  label: 'bridge',              group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/cc2531.jpg', },
{id: 0x00124b000bf07241,  size:40, color:'white', font:{color:'black', size:10},  label: '0x00124b000bf07241',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/TI0001.jpg', },
{id: 0x0017880104f2abb5,  size:40, color:'white', font:{color:'black', size:10},  label: '0x0017880104f2abb5',  group: 0,  shape: 'image', image: '/templates/zigbee2mqtt/img/324131092621.jpg', },  ";






$edges='
{from: 0x00124b001938dc6d, to: 0x000b57fffeb86106, label: ""},
{from: 0x00124b001938dc6d, to: 0x01124b001baea534, label: "0"},
{from: 0x00124b001938dc6d, to: 0x000d6ffffe20387e, label: "92"},
{from: 0x00124b001938dc6d, to: 0x00158d0001a24770, label: "68"},
{from: 0x00124b001938dc6d, to: 0x00158d0002c65d56, label: ""},
{from: 0x00124b001938dc6d, to: 0x00158d0001a2e891, label: ""},
{from: 0x00124b001938dc6d, to: 0x00158d0001150114, label: ""},
{from: 0x00124b001938dc6d, to: 0x00158d0002afd713, label: ""},
{from: 0x00124b001938dc6d, to: 0x00158d0002b76411, label: ""},
{from: 0x00124b001938dc6d, to: 0x00158d00026ea90d, label: ""},
{from: 0x00124b001938dc6d, to: 0x00158d0001560da8, label: ""},
{from: 0x00124b001938dc6d, to: 0x00158d00022bc3ab, label: ""},
{from: 0x00124b001938dc6d, to: 0x00158d00029b4352, label: ""},
{from: 0x00124b001938dc6d, to: 0x000b57fffed4f6d4, label: "56"},
{from: 0x00124b001938dc6d, to: 0x00158d00017394dd, label: ""},
{from: 0x00124b001938dc6d, to: 0x00158d0001a044d8, label: ""},
{from: 0x00124b001938dc6d, to: 0x00158d0001a9e374, label: ""},
{from: 0x00124b001938dc6d, to: 0x00158d0001bb383a, label: ""},
{from: 0x00124b001938dc6d, to: 0x00124b001ba6e3c0, label: ""},
{from: 0x00124b001938dc6d, to: 0x00124b000bf07241, label: ""},
{from: 0x00124b001938dc6d, to: 0x0017880104f2abb5, label: ""},
';

*/

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

