<?php
include_once "db.php";
include_once "model_factory.php";
include_once "museum.php";
class MuseumDao
{


  public static function GetMuseums()
  {
    $result = DB::GetInstance()->connection->select("Museo", [
      "Id",
      "Horario",
      "Nombre",
      "Direccion",
      "IdUsuarioCarga"
    ]);
    return $result;
  }

  public static function InsertMuseum($museum)
  {
    $ret_val = false;
    $result = DB::GetInstance()->connection->insert("Museo", [
      "Horario" => $museum->GetHour(),
      "Nombre" => $museum->GetName(),
      "Direccion" => $museum->GetAddress(),
      "IdUsuarioCarga" => $museum->GetCreateUserID()
    ]);

    if(1 == $result->rowCount())
    {
      $ret_val = true;
    }
    return $ret_val;
  }
}
