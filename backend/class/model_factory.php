<?php
include_once "user.php";
include_once "token.php";

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
		}
	}
}
