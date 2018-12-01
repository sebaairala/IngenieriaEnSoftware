<?php
include_once "authenticatorbase.php";
include_once "helper.php";
include_once "userdao.php";
include_once "tokendao.php";
class AuthenticatorToken extends AuthenticatorBase
{
	private $token = "";
	private $data_loaded = false;
	private $data_validated = false;
	public function ValidateInputData()
	{
		$ret_val = false;
		if(true == $this->data_loaded)
		{
			if(true == helper::is_alphanumeric($this->token))
			{
				$ret_val = true;
				$this->data_validated = true;
			}
		}
		return $ret_val;
	}

	public function SetValues($id, $value)
	{
		if("token" == $id)
		{
			$this->token = $value;
		}

		if("" != $this->token)
		{
			$this->data_loaded = true;
		}
	}

	public function ValidateData()
	{
		$ret_val = array( 'status' => false);
		if($this->data_validated)
		{
			$token_instance = TokenDao::GetIdUserByToken($this->token);
			if(null != $token_instance)
			{
				$user = UserDao::GetUserDataById($token_instance->GetIdUser());
				if(null != $user)
				{
					$ret_val = array('status' => true, 'token' => $token_instance->GetToken(), 'user' => $user->GetUser());
				}
			}
		}
		return $ret_val;
	}
}
