<?php
include_once "db.php";
include_once "model_factory.php";
include_once "token.php";
class TokenDao
{
  public static function GetIdUserByToken($token)
  {
    $result = DB::GetInstance()->connection->select("TokenUsuario", [
      "TokenUsuario.IdUsuario(IdUsuario)"
    ], [
      "TokenUsuario.Token" => $token
    ]);

    if(1 == count($result))
    {
      $tokeninstance = ModelFactory::Create("token");
      $tokeninstance->SetIdUser($result[0]["IdUsuario"]);
      $tokeninstance->SetToken($token);
    }
    return $tokeninstance;
  }

  public static function InsertToken($token)
  {
    $ret_val = false;
    $result = DB::GetInstance()->connection->insert("TokenUsuario", [
    	"IdUsuario" => $token->GetIdUser(),
    	"Token" => $token->GetToken()
    ]);

    if(1 == $result->rowCount())
    {
      $ret_val = true;
    }
    return $ret_val;
  }
}
