<?php

function validPhones($config)
{
  try {

    $t = time();
    $callbackFile = fopen("download/".$t . ".txt", "w");
    $rejected = fopen("download/" ."rejected". $t . ".csv", "w");


    $bd = $config->bdKeyName;
    $numbers = getSavedNumber($bd);
    $size = sizeof($numbers);
    for ($i = 0; $i < $size; $i++) {
      $ok = inABlackList($numbers[$i], $config);
      if ($ok) {
        $id = getAllValue($numbers[$i]);

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

