<?php
include_once "user.php";

class View
{
  private $id;
  private $usuario;
  private $fecha;
  private $invento;
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
    function GetDate()
    {
      return $this->fecha;
    }
    function SetDate($fecha)
    {
      $this->fecha = $fecha;
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
