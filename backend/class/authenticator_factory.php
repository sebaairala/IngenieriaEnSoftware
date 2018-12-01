<?php
include_once "authenticator_token.php";
include_once "authenticator_login.php";
include_once "authenticator_usercreate.php";
include_once "authenticator_usermodify.php";
include_once "authenticator_museum.php";
include_once "authenticator_museumcreate.php";

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
		case "usercreate":
			return new AuthenticatorUserCreate();
			break;
		case "userupdate":
			return new AuthenticatorUserModify();
			break;
		case "museumcreate":
			return new AuthenticatorMuseumCreate();
			break;
		case "museum":
			return new AuthenticatorMuseum();
			break;
		}
	}
}
