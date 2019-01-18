<br>
   <a href="?view_mode=get_map" class="btn btn-default" title="Get network map" ><i class="glyphicon glyphicon-dashboard"></i> Get network map</a>
<br>

[#map_array#]
<br>
[#EDGES#]


<hr>
<!doctype html>
<html>
<head>
  <title>Network | Shapes</title>

  <style type="text/css">
    #mynetwork {
      width: 1000px;
      height: 800px;
      border: 1px solid lightgray;
    }
  </style>

  <script type="text/javascript" src="/templates/zigbee2mqtt/vis-4.21.0/dist/vis.js"></script>
  <link href="/templates/zigbee2mqtt/vis-network.min.css" rel="stylesheet" type="text/css" />



  <script type="text/javascript">
    var nodes = null;
    var edges = null;
    var network = null;

    function draw() {
      nodes = [
        
[#NODES#]
//        {id: 1, font:{size:30},          label: 'circle',  shape: 'circle' , shapeProperties:{borderDashes:[5,5]}},
//        {id: 2, font:{size:30},          label: 'ellipse', shape: 'ellipse', shapeProperties:{borderDashes:[5,5]}},
//        {id: 3, font:{size:30},          label: 'database',shape: 'database', shapeProperties:{borderDashes:[5,5]}},
//        {id: 4, font:{size:30},          label: 'box',     shape: 'box'    , shapeProperties:{borderDashes:[5,5]}},
//        {id: 5, font:{size:30}, size:40, label: 'diamond', shape: 'diamond', shapeProperties:{borderDashes:[5,5]}},
//        {id: 6, font:{size:30}, size:40, label: 'dot',     shape: 'dot', shapeProperties:{borderDashes:[5,5]}},
//        {id: 7, font:{size:30}, size:40, label: 'square',  shape: 'square', shapeProperties:{borderDashes:[5,5]}},
//        {id: 8, font:{size:30}, size:40, label: 'triangle',shape: 'triangle', shapeProperties:{borderDashes:[5,5]}},
//        {id: 9, font:{size:30}, size:40, label: 'triangleDown', shape: 'triangleDown', shapeProperties:{borderDashes:[5,5]}},
//        {id: 10, font:{size:30}, size:40, label: 'star',    shape: 'star', shapeProperties:{borderDashes:true}},
//        {id: 11, font:{size:30}, size:40, label: 'coordinator', shape: 'circularImage', image: '/templates/zigbee2mqtt/img/cc2531.jpg', shapeProperties: {borderDashes:[15,5]}},	
      ];

      edges = [
[#EDGES#]

      ];

      // create a network
      var container = document.getElementById('mynetwork');
      var data = {
        nodes: nodes,
        edges: edges
      };
      var options = {physics:{barnesHut:{gravitationalConstant:-4000}}};
      network = new vis.Network(container, data, options);
    }
  </script>
  

<body onload="draw()">

<div id="mynetwork"></div>

<div id="info"></div>
</body>
</html>





