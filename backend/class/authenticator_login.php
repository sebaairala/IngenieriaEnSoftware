<?php
include_once "authenticatorbase.php";
include_once "userdao.php";
include_once "tokendao.php";

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
			if(helper::is_alphanumeric($this->user) && helper::is_alphanumeric($this->password))
			{
				$ret_val = true;
				$this->data_validated = true;
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
				$userinstance = UserDao::GetUserData($this->user);
				if(null != $userinstance)
				{
					if($userinstance->GetPassword() == $input_password_hash)
					{
						$token = ModelFactory::Create("token");
						$token->SetToken(md5(uniqid(rand(), true)));
						$token->SetIdUser($userinstance->GetId());
						if(TokenDao::InsertToken($token))
						{
							$ret_val = array( 'status' => true, 'token' => $token->GetToken(), 'user' => $userinstance->GetUser(), 'name' => $userinstance->GetName(), 'email' => $userinstance->GetEmail(), 'rol' => $userinstance->GetRolDescription(), 'createdate' => $userinstance->GetCreateDate());
						}
					}
				}
			}
		}
		return $ret_val;

	}
}
