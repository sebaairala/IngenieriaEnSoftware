<?php
class Museum
{
  private $horario;
  private $direccion;
  private $nombre;
  private $idusuario;
  private $id;

    function __construct()
    {

    }
    function GetId()
    {
      return $this->id;
    }
    function GetHour()
    {
      return $this->horario;
    }
    function GetAddress()
    {
      return $this->direccion;
    }
    function GetName()
    {
      return $this->nombre;
    }
    function GetCreateUserID()
    {
      return $this->idusuario;
    }

    public function SetId($id)
    {
      $this->id = $id;
    }
    public function SetHour($horario)
    {
      $this->horario = $horario;
    }
    function SetAddress($direccion)
    {
      $this->direccion = $direccion;
    }
    function SetName($nombre)
    {
      $this->nombre = $nombre;
    }
    function SetCreateUserID($idusuario)
    {
      $this->idusuario = $idusuario;
    }
}
