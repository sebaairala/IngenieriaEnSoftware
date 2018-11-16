<?php
include_once "db.php";
class Token extends User
{
  private $token;
  private $user;
  private $initialized = false;

    public function initialize($token)
    {
      $ret_val = false;
      $result = DB::GetInstance()->connection->select("TokenUsuario", [
        "[>]Usuario" => ["Id" => "IdUsuario"]
      ], [
        "Usuario.Usuario(Usuario)"
      ], [
        "TokenUsuario.Token" => $token
      ]);

      if(1 == count($result))
      {
        $this->user = $result[0]["Usuario"];
        $this->token = $token;
        if(parent::initialize($this->user))
        {
          $this->initialized = true;
          $ret_val = true;
        }
      }
      return $ret_val;
    }

    function __construct()
    {
    }
    function isInitialized()
    {
      return $initialized;
    }
    function GetToken()
    {
      return $this->token;
    }
    function GetUser()
    {
      return $this->user;
    }
}
