<?php

require(__DIR__ . "/../vendor/autoload.php");
require("redis.php");
openRedisConnection(getenv("REDIS_URL"), 6379);

use Symfony\Component\HttpClient\HttpClient;

function checkDuplicity($mensagem, $config)
{
  try {
    $key = $mensagem["fullNumber"];
    $savedValue = getAllValue($key);
    if (Date($mensagem["horarioEnvio"]) < Date($savedValue["horarioEnvio"])) {
      updateRedis($mensagem, $config);
    }
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

function saveRedis($mensagem, $config)
{
  try {
    $key  = $mensagem["fullNumber"];
    $text = $mensagem["texto"];
    $hashKey = $config->bdKeyName;
    if (saveHash($key, $hashKey, $text)) {
      return saveObject($key, $mensagem);
    } else {
      return FALSE;
    }
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

function updateRedis($mensagem, $config)
{
  try {
    $key  = $mensagem["fullNumber"];
    $text = $mensagem["texto"];
    $hashKey = $config->bdKeyName;
    updateHash($key, $hashKey, $text);
    saveObject($key, $mensagem);
    return TRUE;
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

function getSavedNumber($key)
{
  try {
    $allValue = getAllValue($key);
    return array_keys($allValue);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

function fatality($path)
{
  try {
    flushDb();
    unlink($path);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

function inABlackList($number, $config)
{
  try {
    $url = $config->blackListURL . $number;
    $response = get($url);
    return ($response->getStatusCode() !== 200)  ? TRUE : FALSE;
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

function get($url)
{
  try {
    $httpClient = HttpClient::create();
    return  $httpClient->request('GET',  $url, ['timeout' => 5]);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}
