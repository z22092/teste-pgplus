<?php

require("parser.php");

if (!file_exists('uploads')) {
  mkdir('uploads', 0777, true);
}

if (!file_exists('download')) {
  mkdir('download', 0777, true);
}

header('Content-Type: text/octet-stream');
header('Cache-Control: no-cache');

$file = $_FILES["file"];
$ret = [];

if (move_uploaded_file($file['tmp_name'], 'uploads/' . $file['name'])) {
  $ret["path"] = 'uploads/' . $file['name'];
  $ret["name"] = $file['name'];
  foreach (parseData($ret["path"]) as $id){
    echo(json_encode($id)) . PHP_EOL;
    ob_flush();
    flush();
  } 
  unlink($ret["path"]);
} else {
  $ret["status"] = "error";
}