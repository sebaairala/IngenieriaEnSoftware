<?php
class TypeInventions
{
  private $id;
  private $descripcion;

    function __construct()
    {
    }
    function GetId()
    {
      return $this->id;
    }
    function SetId($id)
    {
      $this->id = $id;
    }
    function GetDescription()
    {
      return $this->descripcion;
    }
    function SetDescription($descripcion)
    {
      $this->descripcion = $descripcion;
    }
}
