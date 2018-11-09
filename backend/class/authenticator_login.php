<?php
include_once "authenticatorbase.php";

class AuthenticatorLogin extends AuthenticatorBase
{
	private $user = "";
	private $password = "";
	private $data_loaded = false;
	private $data_validated = false;

	public function ValidateInputData()
	{
		$ret_val = false;
		if(true == $this->data_loaded)
		{
			if(helper::is_alphanumeric($usuario) && helper::is_alphanumeric($password))
			{
				$ret_val = true;
				$data_validated = true;
			}
		}
		return $ret_val;
	}

	public function SetValues($id, $value)
	{
		if("user" == $id)
		{
			$this->user = $value;
		}
		else if("password" == $id)
		{
			$this->password = $value;
		}

		if($this->password != "" && $this->user != "")
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
				$userinstance = ModelFactory::Create("user");
				if(null != $userinstance && $userinstance->initialize($this->user))
				{
					if($userinstance->GetPassword() == $input_password_hash)
					{
						$ret_val = array( 'user' => $token_Instance->GetUser());
					}
				}
			}
		}
		return $ret_val;

	}
}
