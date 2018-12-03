<?php
include_once "user.php";
include_once "invention.php";

class TypeInvention
{
  private $id;
  private $usuario;
  private $invento;
  private $activado;

    function __construct()
    {
    }
    function GetId()
    {
      return $this->id;
    }
    function SetId($id)
    {
      $this->id = $id;
    }
    function GetUser()
    {
      return $this->usuario;
    }
    function SetUser($usuario)
    {
      $this->usuario = $usuario;
    }
    function GetIsEnabled()
    {
      return $this->activado;
    }
    function SetIsEnabled($activado)
    {
      $this->activado = $activado;
    }
    function GetInvention()
    {
      return $this->invento;
    }
    function SetInvention($invento)
    {
      $this->invento = $invento;
    }
}
