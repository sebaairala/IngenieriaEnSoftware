<?php
include_once "db.php";
include_once "model_factory.php";
include_once "view.php";
class ViewDao
{
  public static function GetViewsByInvention($id)
  {
    $result = DB::GetInstance()->connection->count("Invento", [
      "[>]Vista" => ["Id" => "IdInvento"]
    ],[
      "Vista.Id(Id)"
    ], [
      "Invento.Id" => $id
    ]);

    return $result;
  }

  public static function InsertView($view)
  {
    $ret_val = false;
    $result = DB::GetInstance()->connection->insert("Vista", [
    	"Id" => $view->GetId(),
      "IdInvento" => $view->GetInvention()->GetId(),
      "IdUsuario" => $view->GetUser()->GetID(),
      "FechaVista" => $view->GetDate(),
    ]);

    if(1 == $result->rowCount())
    {
      $ret_val = true;
    }
    return $ret_val;
  }
}
