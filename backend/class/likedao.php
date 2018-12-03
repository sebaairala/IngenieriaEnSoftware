<?php
include_once "db.php";
include_once "model_factory.php";
include_once "like.php";
class LikeDao
{
  public static function GetLikesByInvention($id)
  {
    $result = DB::GetInstance()->connection->count("Invento", [
      "[>]Likes" => ["Id" => "IdInvento"]
    ],[
      "Likes.Id(Id)"
    ], [
      "Invento.Id" => $id
    ]);

    return $result;
  }

  public static function InsertLike($like)
  {
    $ret_val = false;
    $result = DB::GetInstance()->connection->insert("Likes", [
    	"Id" => $like->GetId(),
      "IdInvento" => $like->GetInvention()->GetId(),
      "IdUsuario" => $like->GetUser()->GetID(),
      "Activado" => $like->GetIsEnabled(),
    ]);

    if(1 == $result->rowCount())
    {
      $ret_val = true;
    }
    return $ret_val;
  }
}
