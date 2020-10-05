<?php

function validPhones($config)
{
  try {

    $t = time();
    $callbackFile = fopen("download/".$t . ".txt", "w");

    $bd = $config->bdKeyName;
    $numbers = getSavedNumber($bd);
    $size = sizeof($numbers);

    for ($i = 0; $i < $size; $i++) {
      $ok = inABlackList($numbers[$i], $config);
      $id = getAllValue($numbers[$i]);
      if ($ok) {
        fwrite($callbackFile, $id["id"]."\n");
        yield  array( "id"=>$id["id"],  "i" => $i, "size" =>$size );
      }
    }

    fclose($callbackFile);

    yield array("id" => "Process complete", "file" =>  "src/download/".$t . ".txt");
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

