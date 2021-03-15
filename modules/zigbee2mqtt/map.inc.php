<?php          
//$maparray=SQLSelectOne ('select * from zigbee2mqtt where value like "digraph%"');
//$maparray=SQLSelect('SELECT *  FROM (select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.* from zigbee2mqtt_devices )zigbee2mqtt_devices LEFT JOIN zigbee2mqtt_devices_list ON zigbee2mqtt_devices_list.zigbeeModel=zigbee2mqtt_devices.MODEL ');
//$maparray=SQLSelect("SELECT * FROM (select zigbee2mqtt_devices.ID DEVID, zigbee2mqtt_devices.* from zigbee2mqtt_devices )zigbee2mqtt_devices LEFT JOIN zigbee2mqtt_devices_list ON zigbee2mqtt_devices_list.zigbeeModel like concat('%',zigbee2mqtt_devices.MODEL,'%') ");
$maparray=SQLSelect("select * from zigbee2mqtt_devices  where LENGTH(TITLE)>0 and LENGTH(SELECTTYPE)>0 and SELECTTYPE<>'group'");

$raws=SQLSelect("select * from zigbee2mqtt_log where TITLE='zigbee2mqtt/bridge/networkmap/raw' order by FIND desc");
$raw = json_decode($raws[0]["MESSAGE"], true);

$total = count($raw["nodes"]);
$rn = [];
for ($i=0;$i<$total;$i++) {
    foreach ($maparray as $k => $val) {
       if ($val["IEEEADDR"] == $raw['nodes'][$i]["friendlyName"]) {
           $dev = $val;
       }
    }
    $node = [];
    $node["id"] = $raw['nodes'][$i]["ieeeAddr"];
    $node["size"] = 40;
    $node["group"] = $dev['GROUP'];
    $node["font"] = array("color"=>'black', "size"=>10);
    $node["shape"] = "image";
    if ($raw['nodes'][$i]["type"] == "Coordinator")
    {
        $node["label"] = "Coordinator";
        $node["image"] = "/templates/zigbee2mqtt/img/cc2531.jpg";
        $node["color"] = "red";
    }
    else
    {
        $node["label"] = $dev['TITLE'];
        $node["image"] = "/templates/zigbee2mqtt/img/".$dev['SELECTTYPE'].".jpg";
    }
    if ($raw['nodes'][$i]["type"] == "Router")
        $node["color"] = "blue";
    
    if ($raw['nodes'][$i]["friendlyName"] != $raw['nodes'][$i]["ieeeAddr"]) $node["label"] .= "\n".$raw['nodes'][$i]["friendlyName"];
    $node["label"] .= "\n".$raw['nodes'][$i]["ieeeAddr"];
        
    $rn[] = $node;
}
$total = count($raw["links"]);
$re = [];
for ($i=0;$i<$total;$i++) {
    $link = [];
    $link["to"] = $raw['links'][$i]["target"]["ieeeAddr"];
    $link["from"] = $raw['links'][$i]["source"]["ieeeAddr"];
    $link["label"] = strval($raw['links'][$i]["lqi"]);
    $link["arrows"] = "to";
    $link["length"] =  300 - $raw['links'][$i]["lqi"];
    $link["font"] = array("color"=>'black', "size"=>10);
    $re[] = $link;
}

//$out['map_array']=$maparray['VALUE'];
$nodes = json_encode($rn);
$edges = json_encode($re);

$out['map_array']=$nodes;

$graph=SQLSelectOne ('select * from zigbee2mqtt where value like "digraph%"');

$mygaph=str_replace(array("\r\n", "\r", "\n"), '',  strip_tags($graph['VALUE']));
$mygaph=str_replace("'", '`',  $mygaph);
$out['GRAPH']=$mygaph;

$out['NODES']=$nodes;
$out['EDGES']=$edges;

$map='
  <script type="text/javascript">
    var nodes = null;
    var edges = null;
    var network = null;

 

    function draw() {
      nodes = '.$nodes.';
      edges = '.$edges.';

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

//   $this->redirect("?tab=map");
//   $this->redirect("?data_source=&view_mode=&id=&tab=map");

?>

