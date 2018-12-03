<?php
include_once "db.php";
include_once "model_factory.php";
include_once "invention.php";
class InventionDao
{


  public static function GetInventions()
  {
    $museumarray = array();
    $result = DB::GetInstance()->connection->select("Invento", [
      "[>]Usuario" => ["IdUsuarioCarga" => "Id"],
      "[>]Inventor" => ["IdInventor" => "Id"],
      "[>]Museo" => ["IdMuseo" => "Id"],
      "[>]TipoInvento" => ["IdTipo" => "Id"],
      "[>]TipoEstado" => ["IdEstado" => "Id"]
    ],[
      "Invento.FechaCreado(FechaCreado)",
      "Invento.Nombre(Nombre)",
      "Invento.IdUsuarioCarga(IdUsuarioCarga)",
      "Usuario.Nombre(UsuarioNombre)",
      "Invento.IdInventor(IdInventor)",
      "Inventor.Nombre(InventorNombre)",
      "Inventor.Apellido(InventorApellido)",
      "Invento.IdMuseo(IdMuseo)",
      "Museo.Nombre(MuseoNombre)",
      "Invento.IdTipo(IdTipo)",
      "TipoInvento.Descripcion(TipoDescripcion)",
      "TipoEstado.Descripcion(EstadoDescripcion)",
      "Invento.EnAlmacenDescarte(EnAlmacenDescarte)"
    ]);

    return $result;
  }

  public static function GetInvention($id)
  {
    $inventor = array();
    $result = DB::GetInstance()->connection->select("Invento", [
      "[>]Usuario" => ["IdUsuarioCarga" => "Id"],
      "[>]Inventor" => ["IdInventor" => "Id"],
      "[>]Museo" => ["IdMuseo" => "Id"],
      "[>]TipoInvento" => ["IdTipo" => "Id"],
      "[>]TipoEstado" => ["IdEstado" => "Id"]
    ],[
      "Invento.FechaCreado(FechaCreado)",
      "Invento.Nombre(Nombre)",
      "Invento.IdUsuarioCarga(IdUsuarioCarga)",
      "Usuario.Nombre(UsuarioNombre)",
      "Invento.IdInventor(IdInventor)",
      "Inventor.Nombre(InventorNombre)",
      "Inventor.Apellido(InventorApellido)",
      "Invento.IdMuseo(IdMuseo)",
      "Museo.Nombre(MuseoNombre)",
      "Invento.IdTipo(IdTipo)",
      "TipoInvento.Descripcion(TipoDescripcion)",
      "TipoEstado.Descripcion(EstadoDescripcion)",
      "Invento.EnAlmacenDescarte(EnAlmacenDescarte)"
    ], [
      "Id" => $id
    ]);

    if(1 == count($result))
    {
      $user = ModelFactory::Create("user");
      $user->SetId($result[0]["IdUsuarioCarga"]);
      $user->SetName($result[0]["UsuarioNombre"]);
      $museum = ModelFactory::Create("museum");
      $museum->SetId($result[0]["IdMuseo"]);
      $museum->SetName($result[0]["MuseoNombre"]);
      $inventor = ModelFactory::Create("inventor");
      $inventor->SetId($result[0]["IdInventor"]);
      $inventor->SetName($result[0]["InventorNombre"]);
      $inventor->SetLastName($result[0]["InventorApellido"]);
      $invention_type = ModelFactory::Create("invention_type");
      $invention_type->SetId($result[0]["IdTipo"]);
      $invention_type->SetDescription($result[0]["TipoDescripcion"]);
      $inventionstate = ModelFactory::Create("inventionstate");
      $inventionstate->SetDescription($result[0]["EstadoDescripcion"]);
      $invention = ModelFactory::Create("invention");
      $invention->SetCreateDate($result[0]["FechaCreado"]);
      $invention->SetName($result[0]["Nombre"]);
      $invention->SetEnAlmacenDescarte($result[0]["EnAlmacenDescarte"]);
      $invention->SetCreateUser($user);
      $invention->SetInventor($inventor);
      $invention->SetMuseum($museum);
      $invention->SetType($invention_type);
      $invention->SetState($inventionstate);

    }
    return $inventor;
  }

  public static function InsertInvention($invention)
  {
    $ret_val = false;
    $result = DB::GetInstance()->connection->insert("Invento", [
      "IdTipo" => $invention->GetType()->GetId(),
      "IdUsuarioCarga" => $invention->GetCreateUser()->GetId(),
      "IdInventor" => $invention->GetInventor()->GetId(),
      "IdMuseo" => $invention->GetMuseum()->GetId(),
      "IdEstado" => $invention->GetState()->GetId(),
      "EnAlmacenDescarte" => $invention->GetIsInGarbage(),
      "Nombre" => $invention->GetName(),
      "FechaCreado" => $invention->GetCreateDate()
    ]);

    if(1 == $result->rowCount())
    {
      $ret_val = true;
    }
    return $ret_val;
  }
}
