<?php

include_once "type_invention.php";
include_once "inventor.php";
include_once "museum.php";
include_once "user.php";
include_once "invention_state.php";

class Invention
{
  private $id;
  private $nombre;
  private $fechacreado;
  private $tipo;
  private $usuariocarga;
  private $inventor;
  private $estadoinvento;
  private $inventodescarte;
  private $museo;

    function __construct()
    {

    }
    function GetId()
    {
      return $this->id;
    }
    public function SetId($id)
    {
      $this->id = $id;
    }

    function GetName()
    {
      return $this->nombre;
    }
    public function SetName($nombre)
    {
      $this->nombre = $nombre;
    }

    function GetCreateDate()
    {
      return $this->fechacreado;
    }
    function SetCreateDate($fechacreado)
    {
      $this->fechacreado = $fechacreado;
    }

    function GetType()
    {
      return $this->tipo;
    }
    function SetType($tipo)
    {
      $this->tipo = $tipo;
    }

    function GetCreateUser()
    {
      return $this->usuariocarga;
    }
    function SetCreateUser($usuariocarga)
    {
      $this->usuariocarga = $usuariocarga;
    }

    function GetInventor()
    {
      return $this->inventor;
    }
    function SetInventor($inventor)
    {
      $this->inventor = $inventor;
    }

    function GetMuseum()
    {
      return $this->museo;
    }
    function SetMuseum($museo)
    {
      $this->museo = $museo;
    }

    function GetState()
    {
      return $this->estadoinvento;
    }
    function SetState($estadoinvento)
    {
      $this->estadoinvento = $estadoinvento;
    }
    function GetIsInGarbage()
    {
      return $this->inventodescarte;
    }
    function SetIsInGarbage($inventodescarte)
    {
      $this->inventodescarte = $inventodescarte;
    }
}
