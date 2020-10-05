<?php

/**
 * @return Validator
 */
class Valid
{
  public $isInvalidPhone;
  public $isInvalidDDD;
  public $inBlackList;
  public $locationBlocked;
  public $timeBlocked;
  public $overCharacters;
  public $valid;

  function validateMessage($config)
  {
    $this->isInvalidPhone = preg_match($config->phoneRegex, $this->celular)  ? FALSE : TRUE;
    $this->isInvalidDDD = in_array($this->ddd, $config->invalidsDDDs);
    $this->locationBlocked = in_array($this->ddd, $config->blockedLocations);
    $this->timeBlocked = $this->horarioEnvio > $config->maxTime;
    $this->overCharacters = strlen($this->texto) >= $config->maxNumCharacters;
    if (
      $this->isInvalidPhone     ||
      $this->isInvalidDDD      ||
      $this->locationBlocked  ||
      $this->timeBlocked        ||
      $this->overCharacters
    ) {
      $this->valid = FALSE;
    } else {
      $this->valid = TRUE;
    }
  }
}

/**
 * @return MensagemObject
 */
class Mensagem extends Valid
{
  public $idMensagem;
  public $ddd;
  public $celular;
  public $operadora;
  public $horarioEnvio;
  public $texto;
  public $idBroker;

  function __construct($mensagem, $config)
  {
      $this->idMensagem = $mensagem[0];
      $this->ddd = preg_replace('/(^[0:])/', '', $mensagem[1]);
      $this->celular = preg_replace('/(?!\d).?(?!\d )/', '', $mensagem[2]);
      $this->fullNumber = $this->getFullNumber();
      $this->operadora = $mensagem[3];
      $this->horarioEnvio = date($mensagem[4]);
      $this->texto = $mensagem[5];
      $this->idBroker = $config->brokers[$this->operadora];
      $this->id = $this->getId();
      $this->validateMessage($config);
  }
  function getFullNumber()
  {
    return $this->ddd . $this->celular;
  }
  function getId()
  {
    return $this->idMensagem . ";" . $this->idBroker;
  }
}
