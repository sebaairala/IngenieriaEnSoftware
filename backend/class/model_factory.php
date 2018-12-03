<?php
include_once "user.php";
include_once "token.php";
include_once "museum.php";
include_once "inventor.php";
include_once "like.php";
include_once "view.php";
include_once "invention.php";
include_once "type_invention.php";

class ModelFactory{
	public static function Create($type)
	{
		switch($type)
		{
		case "token":
			return new Token();
			break;
		case "user":
			return new User();
			break;
		case "museum":
			return new Museum();
			break;
		case "like":
			return new Like();
			break;
		case "view":
			return new View();
			break;
		case "inventor":
			return new Inventor();
			break;
		case "invention":
			return new Invention();
			break;
		case "invention_state":
			return new InventionState();
			break;
		case "invention_type":
			return new TypeInventions();
			break;
		}
	}
}
