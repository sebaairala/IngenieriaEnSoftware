<?php
include_once "user.php";

class Inventor
{
  private $id;
  private $nombre;
  private $apellido;
  private $fechanacimiento;
  private $direccion;
  private $usuariocarga;


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

    function GetLastName()
    {
      return $this->apellido;
    }
    function SetLastName($apellido)
    {
      $this->apellido = $apellido;
    }

    function GetBirthDate()
    {
      return $this->fechanacimiento;
    }
    function SetBirthDate($fechanacimiento)
    {
      $this->fechanacimiento = $fechanacimiento;
    }

    function GetCreateUser()
    {
      return $this->usuariocarga;
    }
    function SetCreateUser($usuariocarga)
    {
      $this->usuariocarga = $usuariocarga;
    }

    function GetAddress()
    {
      return $this->direccion;
    }
    function SetAddress($direccion)
    {
      $this->direccion = $direccion;
    }

}
