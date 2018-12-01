<?php
class User
{
  private $usuario;
  private $nombre;
  private $email;
  private $password;
  private $activado;
  private $rol;
  private $administrador;
  private $fecha_creacion;
  private $id;

    function __construct()
    {

    }
    function GetId()
    {
      return $this->id;
    }
    function GetUser()
    {
      return $this->usuario;
    }
    function GetName()
    {
      return $this->nombre;
    }
    function GetEmail()
    {
      return $this->email;
    }
    function GetPassword()
    {
      return $this->password;
    }
    function IsActive()
    {
      return $this->activado;
    }
    function GetRolDescription()
    {
      return $this->rol;
    }
    function IsAdmin()
    {
      return $this->administrador;
    }
    function GetCreateDate()
    {
      return $this->fecha_creacion;
    }

    public function SetId($id)
    {
      $this->id = $id;
    }
    public function SetUser($usuario)
    {
      $this->usuario = $usuario;
    }
    function SetName($nombre)
    {
      $this->nombre = $nombre;
    }
    function SetEmail($email)
    {
      $this->email = $email;
    }
    function SetPassword($password)
    {
      $this->password = $password;
    }
    function SetIsActive($activado)
    {
      $this->activado = $activado;
    }
    function SetRolDescription($rol)
    {
      $this->rol = $rol;
    }
    function SetIsAdmin($administrador)
    {
      $this->administrador = $administrador;
    }
    function SetCreateDate($fecha_creacion)
    {
      $this->fecha_creacion = $fecha_creacion;
    }
}
