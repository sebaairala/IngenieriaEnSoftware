<?php
include_once "authenticatorbase.php";
include_once "helper.php";
include_once "userdao.php";
class AuthenticatorUserModify extends AuthenticatorBase
{
  private $usuario;
  private $nombre;
  private $email;
  private $password;
	private $data_loaded = false;
	private $data_validated = false;
	public function ValidateInputData()
	{
		$ret_val = false;
		if(true == $this->data_loaded)
		{
				if(true == helper::is_alphanumeric($this->password)
          && true == helper::is_alphanumeric($this->nombre)
          && true == helper::is_alphanumeric($this->usuario)
          && true == helper::is_valid_email($this->email))
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
			$this->usuario = $value;
		}
    else if("name" == $id)
		{
			$this->nombre = $value;
		}
    else if("email" == $id)
		{
			$this->email = $value;
		}
    else if("password" == $id)
		{
			$this->password = $value;
		}

		if("" != $this->usuario && "" != $this->nombre && "" != $this->email && "" != $this->password)
		{
			$this->data_loaded = true;
		}
	}

	public function ValidateData()
	{
		$ret_val = array( 'status' => false);
    //check cookie

		if($this->data_validated)
		{
      $user = ModelFactory::Create("user");
      $user->SetUser($this->usuario);
      $user->SetPassword(helper::GetTextHash($this->password));
      $user->SetEmail($this->email);
      $user->SetName($this->nombre);

			$user_instance = UserDao::UpdateUser($user);

			if(null != $user_instance)
			{
					$ret_val = array('status' => true, 'user' => $user->GetUser());
			}
		}
		return $ret_val;
	}
}
