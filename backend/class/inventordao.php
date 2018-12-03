<?php
include_once "db.php";
include_once "model_factory.php";
include_once "inventor.php";
class InventorDao
{
  public static function GetInventors()
  {
    $inventorarray = array();
    $result = DB::GetInstance()->connection->select("Inventor", [
      "[>]Usuario" => ["IdUsuarioCarga" => "Id"]
    ],[
      "Inventor.Id(Id)",
      "Inventor.Nombre(Nombre)",
      "Inventor.Apellido(Apellido)",
      "Inventor.FechaNacimiento(FechaNacimiento)",
      "Inventor.Direccion(Direccion)",
      "Usuario.Usuario(UsuarioCarga)"
    ]);

    for($i = 0; $i < count($result); ++$i)
    {
      $inventor = ModelFactory::Create("inventor");
      $inventor->SetId($result[$i]["Id"]);
      $inventor->SetName($result[$i]["Nombre"]);
      $inventor->SetLastName($result[$i]["Apellido"]);
      $inventor->SetBirthDate($result[$i]["FechaNacimiento"]);
      $inventor->SetAddress($result[$i]["Direccion"]);
      $user = ModelFactory::Create("user");
      $user->SetUser($result[$i]["UsuarioCarga"]);
      $inventor->SetCreateUser($user);
      array_push($inventorarray, array('Id' => $inventor->GetId(),'Nombre' => $inventor->GetName()." ".$inventor->GetLastName(),'FechaNacimiento' => $inventor->GetBirthDate(),'Direccion' => $inventor->GetAddress(),'CargaUsuario' => $inventor->GetCreateUser()->GetUser()));
    }
    return $inventorarray;
  }
  public static function GetInventor($id)
  {
    $result = DB::GetInstance()->connection->select("Inventor", [
      "[>]Usuario" => ["IdUsuarioCarga" => "Id"]
    ],[
      "Inventor.Id(Id)",
      "Inventor.Nombre(Nombre)",
      "Inventor.Apellido(Apellido)",
      "Inventor.FechaNacimiento(FechaNacimiento)",
      "Inventor.Direccion(Direccion)",
      "Usuario.Usuario(UsuarioCarga)"
    ], [
      "Inventor.Id" => $id
    ]);

    if(1 == count($result))
    {
      $inventor = ModelFactory::Create("inventor");
      $inventor->SetId($result[0]["Id"]);
      $inventor->SetName($result[0]["Nombre"]);
      $inventor->SetLastName($result[0]["Apellido"]);
      $inventor->SetBirthDate($result[0]["FechaNacimiento"]);
      $inventor->SetAddress($result[0]["Direccion"]);
      $user = ModelFactory::Create("user");
      $user->SetUser($result[0]["UsuarioCarga"]);
      $inventor->SetCreateUser($user);
    }
    return $inventor;
  }

  public static function InsertInventor($inventor)
  {
    $ret_val = false;
    $result = DB::GetInstance()->connection->insert("Inventor", [
    	"Id" => $inventor->GetId(),
      "Nombre" => $inventor->GetName(),
      "Apellido" => $inventor->GetLastName(),
      "FechaNacimiento" => $inventor->GetBirthDate(),
      "IdUsuarioCarga" => $inventor->GetCreateUser()->GetID(),
    	"Direccion" => $inventor->GetAddress()
    ]);

    if(1 == $result->rowCount())
    {
      $ret_val = true;
    }
    return $ret_val;
  }
}
