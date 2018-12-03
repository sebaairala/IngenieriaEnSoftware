<?php
include_once "authenticator_token.php";
include_once "authenticator_login.php";
include_once "authenticator_user.php";
include_once "authenticator_usercreate.php";
include_once "authenticator_usermodify.php";
include_once "authenticator_museum.php";
include_once "authenticator_museumcreate.php";
include_once "authenticator_inventor.php";
include_once "authenticator_inventorcreate.php";
include_once "authenticator_invention.php";
include_once "authenticator_inventioncreate.php";
include_once "authenticator_invention_state.php";
include_once "authenticator_type_invention.php";

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
		case "inventorcreate":
			return new AuthenticatorInventorCreate();
			break;
		case "inventor":
			return new AuthenticatorInventor();
			break;
		case "user":
			return new AuthenticatorUser();
			break;
		case "invention":
			return new AuthenticatorInvention();
			break;
		case "inventioncreate":
			return new AuthenticatorInventionCreate();
			break;
		case "inventionstate":
			return new AuthenticatorInventionState();
			break;
		case "typeinvention":
			return new AuthenticatorTypeInvention();
			break;
		}
	}
}
