<?php

$redis = new Redis();

function openRedisConnection($hostName, $port)
{
  global $redis;

  $redis->connect($hostName, $port);
  return $redis;
}

function getAllValue($key)
{
  try {
    global $redis;
    $allValues = $redis->hGetAll($key);
    deleteKey($key);
    return $allValues;
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

function saveObject($key, $array)
{
  try {
    global $redis;
    return $redis->hMSet($key, $array);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}
function getObject($key)
{
  try {
    global $redis;
    $array = $redis->hGetAll($key);
    return $array;
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}
function saveHash($key, $hashKey, $value)
{
  try {
    global $redis;
    return $redis->hSetNx($hashKey, $key, $value);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

function updateHash($key, $hashKey, $value)
{
  try {
    global $redis;
    return $redis->hset($hashKey, $key, $value);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

function keyExists($key)
{
  try {
    global $redis;
    return $redis->exists($key);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

function deleteKey($key)
{
  try {
    global $redis;
    $redis->del($key);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}
