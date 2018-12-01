<?php
class Token extends User
{
  private $token;
  private $idusuario;

    function __construct()
    {
    }
    function GetToken()
    {
      return $this->token;
    }
    function GetIdUser()
    {
      return $this->idusuario;
    }

    function SetToken($token)
    {
      $this->token = $token;
    }
    function SetIdUser($idusuario)
    {
      $this->idusuario = $idusuario;
    }
}
