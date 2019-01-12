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



   //deviles
//  $res=SQLSelect("SELECT * FROM zigbee2mqtt_devices WHERE $qry ORDER BY ".$sortby_mqtt);
//if ($this->view_mode==''||$this->view_mode=='device')

  $res=SQLSelect("SELECT * FROM zigbee2mqtt_devices ");
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

    if ($res[$i]['TITLE']==$res[$i]['PATH'] && !$out['TREE']) $res[$i]['PATH']='';
   }
   $out['DEVICES']=$res;


  }

//$vm=$res;
// echo "<script type='text/javascript'>";
// echo "alert('$vm');";
// echo "</script>";




  $out['LOCATIONS']=SQLSelect("SELECT * FROM locations ORDER BY TITLE");
  $out['ZIGBEE2MQTTDEV']=SQLSelect("SELECT @rownum := @rownum + 1 AS ID,t.* FROM (SELECT distinct SPLIT_STRING(TITLE, '/', 2) TITLE FROM zigbee2mqtt) t, (SELECT @rownum := 0) r");



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


if ($this->view_mode=='view_mqtt'){

$vm=$this->id;
// echo "<script type='text/javascript'>";
// echo "alert('$vm');";
// echo "</script>";

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



                if ($this->tab == 'log') {

                    global $limit;
                    if (!$limit) {
                        $limit = 50;
                    }

                    global $file;
                    if (!$file  ) {
//                        $file = date('Y-m-d') . '.log';

//            $path = ROOT . 'cms/debmes';
            $path = '/opt/zigbee2mqtt/data/log';

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
                    $filename = ROOT . 'cms/debmes/' . $file;
                    if (!file_exists($filename)) {
                        $file = date('Y-m-d') . '_' . $file . '.log';
                        $filename = ROOT . 'cms/debmes/' . $file;
                    }
                    $data = LoadFile($filename);
                    $lines = explode("\n", $data);
                    //$lines=array_reverse($lines);
                    $lines = array_slice($lines, -1 * ($limit), $limit);
                    $res_lines = array();
                    $total = count($lines);
                    $added = 0;
                    for ($i = 0; $i < $total; $i++) {

                        if (trim($lines[$i]) == '') {
                            continue;
                        }

                        if ($filter && preg_match('/' . preg_quote($filter) . '/is', $lines[$i])) {
                            $res_lines[] = htmlspecialchars($lines[$i]);
                            $added++;
                        } elseif (!$filter) {
                            if (!preg_match('/^\d+:\d+:\d+/is', $lines[$i]) && $added > 0) {
                                $res_lines[$added - 1] .= "\n" . htmlspecialchars($lines[$i]);
                            } else {
                                $line = htmlspecialchars($lines[$i]);
                                if (preg_match('/^(\d+:\d+:\d+ [\d\.]+)/', $line)) {
                                    $line = preg_replace('/^(\d+:\d+:\d+ [\d\.]+)/is', '<b>\1</b>', $line);
                                } elseif (preg_match('/^(\d+:\d+:\d+)/', $line)) {
                                    $line = preg_replace('/^(\d+:\d+:\d+)/is', '<b>\1</b>', $line);
                                }
                                $res_lines[] = $line;
                                $added++;
                            }
                        }
                        if ($added >= $limit) {
                            break;
                        }
                    }

                    $total = count($res_lines);
                    for ($i = 0; $i < $total; $i++) {
                        $line = $res_lines[$i];
                        $line = str_replace('Warning:', '<font color="#b8860b">Warning:</font>', $line);
                        $res_lines[$i] = nl2br($line);
                    }

                    $res_lines = array_reverse($res_lines);

//                    echo implode("<br/>", $res_lines);

                }







?>

