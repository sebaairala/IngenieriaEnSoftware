<?php
include_once "authenticator_token.php";
include_once "authenticator_login.php";

class AuthenticatorFactory{
	public static function Create($type)
	{
		switch($type)
		{
		case "token":
			return new AuthenticatorToken();
			break;
		case "login":
			return new AuthenticatorLogin();
			break;
		}
	}
}
