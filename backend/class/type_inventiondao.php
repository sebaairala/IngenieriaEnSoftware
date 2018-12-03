<?php
include_once "db.php";
include_once "model_factory.php";
include_once "type_invention.php";
class TypeInventionsDao
{
  public static function GetInventionsType()
  {
    $result = DB::GetInstance()->connection->select("TipoInvento", [
      "Id",
      "Descripcion",
    ]);
    return $result;
  }
}
