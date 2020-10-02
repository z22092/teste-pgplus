<?php

require('mensagem.php');
require('rules.php');
require('controller.php');
require("sendData.php");

function parseData($file)
{
  try {
    $config  = new Config;

    $handle = fopen($file, "r");

    while (($line = fgets($handle)) !== false) {
      $arr  = explode(";", $line);
      $mensagem =  (array) new Mensagem($arr, $config);
      if ($mensagem["valid"]) {
        if (!saveRedis($mensagem, $config)) {
          checkDuplicity($mensagem, $config);
        }
      }
    }
    fclose($handle);
    return validPhones($config);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}



