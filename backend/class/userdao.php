<?php
include_once "db.php";
include_once "model_factory.php";
include_once "user.php";
class UserDao
{
  public static function GetUserData($user)
  {
    $userinstance = null;
    $result = DB::GetInstance()->connection->select("Usuario", [
      "[>]RolUsuario" => ["RolId" => "Id"]
    ], [
      "Usuario.Id(Id)",
      "Usuario.Usuario(Usuario)",
      "Usuario.Nombre(Nombre)",
      "Usuario.Email(Email)",
      "Usuario.FechaCreado(FechaCreado)",
      "Usuario.Password(Password)",
      "Usuario.Activado(Activado)",
      "RolUsuario.Descripcion(RolDescripcion)",
      "RolUsuario.Administrador(RolAdministrador)"
    ], [
      "Usuario.Usuario" => $user
    ]);
    if(count($result) == 1)
    {
      $userinstance = ModelFactory::Create("user");
      $userinstance->SetId($result[0]["Id"]);
      $userinstance->SetUser($result[0]["Usuario"]);
      $userinstance->SetName($result[0]["Nombre"]);
      $userinstance->SetEmail($result[0]["Email"]);
      $userinstance->SetCreateDate($result[0]["FechaCreado"]);
      $userinstance->SetPassword($result[0]["Password"]);
      $userinstance->SetIsActive($result[0]["Activado"]);
      $userinstance->SetRolDescription($result[0]["RolDescripcion"]);
      $userinstance->SetIsAdmin($result[0]["RolAdministrador"]);
    }
    return $userinstance;
  }

  public static function GetUserDataById($id)
  {
    $userinstance = null;
    $result = DB::GetInstance()->connection->select("Usuario", [
      "[>]RolUsuario" => ["RolId" => "Id"]
    ], [
      "Usuario.Id(Id)",
      "Usuario.Usuario(Usuario)",
      "Usuario.Nombre(Nombre)",
      "Usuario.Email(Email)",
      "Usuario.FechaCreado(FechaCreado)",
      "Usuario.Password(Password)",
      "Usuario.Activado(Activado)",
      "RolUsuario.Descripcion(RolDescripcion)",
      "RolUsuario.Administrador(RolAdministrador)"
    ], [
      "Usuario.Id" => $id
    ]);
    if(count($result) == 1)
    {
      $userinstance = ModelFactory::Create("user");
      $userinstance->SetId($result[0]["Id"]);
      $userinstance->SetUser($result[0]["Usuario"]);
      $userinstance->SetName($result[0]["Nombre"]);
      $userinstance->SetEmail($result[0]["Email"]);
      $userinstance->SetCreateDate($result[0]["FechaCreado"]);
      $userinstance->SetPassword($result[0]["Password"]);
      $userinstance->SetIsActive($result[0]["Activado"]);
      $userinstance->SetRolDescription($result[0]["RolDescripcion"]);
      $userinstance->SetIsAdmin($result[0]["RolAdministrador"]);
    }
    return $userinstance;
  }

  public static function InsertUser($user)
  {
    $ret_val = false;
    $result = DB::GetInstance()->connection->insert("Usuario", [
      "Usuario" => $user->GetUser(),
      "Nombre" => $user->GetName(),
      "Email" => $user->GetEmail(),
      "FechaCreado" => date('Y-m-d H:i:s'),
      "Password" => $user->GetPassword(),
      "Activado" => true
    ]);

    if(1 == $result->rowCount())
    {
      $ret_val = true;
    }
    return $ret_val;
  }

  public static function UpdateUser($user)
  {
    $ret_val = false;
    $result = DB::GetInstance()->connection->Update("Usuario", [
      "Nombre" => $user->GetName(),
      "Email" => $user->GetEmail(),
      "Password" => $user->GetPassword()
    ], [
    	"Usuario" => $user->GetUser()
    ]);

    if(1 == $result->rowCount())
    {
      $ret_val = true;
    }
    return $ret_val;
  }

}
