<?php
include_once "db.php";
include_once "model_factory.php";
include_once "invention_state.php";
class InventionStateDao
{
  public static function GetInventionsState()
  {
    $result = DB::GetInstance()->connection->select("TipoEstado", [
      "Id",
      "Descripcion",
    ]);

    return $result;
  }
}
