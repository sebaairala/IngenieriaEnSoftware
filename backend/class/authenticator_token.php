<?php
include_once "authenticatorbase.php";
include_once "helper.php";
class AuthenticatorToken extends AuthenticatorBase
{
	private $user = "";
	private $data_loaded = false;
	private $data_validated = false;
	public function ValidateInputData()
	{
		$ret_val = false;
		if(true == $this->data_loaded)
		{
			if(true == helper::is_alphanumeric($this->user))
			{
				$ret_val = true;
				$data_validated = true;
			}
		}
		return $ret_val;
	}

	public function SetValues($id, $value)
	{
		if("token" == $id)
		{
			$this->user = $value;
		}

		if("" != $this->user)
		{
			$this->data_loaded = true;
		}
	}

	public function ValidateData()
	{
		$ret_val = array( 'status' => false);
		if($this->data_validated)
		{
			$input_password_hash = helper::GetTextHash($this->password);
			if("" != $input_password_hash)
			{
				$token_nstance = ModelFactory::Create("token");
				if($token_Instance->initialize($this->token))
				{
					$ret_val = array('token' => $token_Instance->GetToken(), 'user' => $token_Instance->GetUser());
				}
			}
		}
		return $ret_val;
	}
}
