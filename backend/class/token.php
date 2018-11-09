<?php
class Token extends User
{
  private $token;
  private $user;
  private $initialized = false;

    public function initialize($token)
    {
      $ret_val = false;
      $stmt = DB::GetInstance()->prepare("SELECT * FROM Usuario where Usuario = :username; FALTA");
      $stmt->bindValue(':username', $name, PDO::PARAM_STR);
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if($stmt->rowCount() == 1)
      {
        $this->user = $result[0]["Usuario"];
        $this->token = $result[0]["Token"];
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
