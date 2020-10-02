<?php

/**
 * @return ConfigObject
 */

class Config
{
  public $invalidsDDDs = array(10, 20, 23, 25, 26, 29, 30, 36, 39, 40, 50, 52, 56, 57, 58, 59, 60, 70, 72, 76, 78, 80, 90);
  public $phoneRegex = '/^(9[6-9]\d{3}\d{4})$/';
  public $blackListURL = "https://front-test-pg.herokuapp.com/blacklist/";
  public $blockedLocations = array(11, 12, 13, 14, 15, 16, 17, 18, 19);
  public $maxTime = "19:59:59";
  public $maxNumCharacters = 140;
  public $bdKeyName = "messages";
  public $brokers=  array('VIVO'=> 1, 'TIM' => 1,  'CLARO' => 2, 'OI' => 2, 'NEXTEL' => 3);
}
