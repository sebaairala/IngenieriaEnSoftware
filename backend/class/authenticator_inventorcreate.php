<?php
include_once "authenticatorbase.php";
include_once "helper.php";
include_once "inventordao.php";
include_once "tokendao.php";
class AuthenticatorInventorCreate extends AuthenticatorBase
{
  private $apellido;
  private $nombre;
  private $direccion;
  private $token;

	private $data_loaded = false;
	private $data_validated = false;
	public function ValidateInputData()
	{
		$ret_val = false;
		if(true == $this->data_loaded)
		{
			if(true == helper::is_alphanumeric($this->apellido)
        && true == helper::is_alphanumeric($this->nombre)
        && true == helper::is_alphanumeric($this->token))
			{
				$ret_val = true;
				$this->data_validated = true;
			}
		}
		return $ret_val;
	}

	public function SetValues($id, $value)
	{
		if("lastname" == $id)
		{
			$this->apellido = $value;
		}
    else if("name" == $id)
		{
			$this->nombre = $value;
		}
    else if("address" == $id)
		{
			$this->direccion = $value;
		}
    else if("token" == $id)
		{
			$this->token = $value;
		}

		if("" != $this->apellido && "" != $this->nombre && "" != $this->direccion && "" != $this->token)
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
        $inventor = ModelFactory::Create("inventor");
        $inventor->SetLastName($this->apellido);
        $inventor->SetName($this->nombre);
        $inventor->SetAddress($this->direccion);
        $user = ModelFactory::Create("user");
        $user->SetId($token_instance->GetIdUser());
        $inventor->SetCreateUser($user);

        if(null != InventorDao::InsertInventor($inventor))
        {
  					$ret_val = array('status' => true, 'inventor' => $inventor->GetName()." ".$inventor->GetLastName());
        }
      }
		}
		return $ret_val;
	}
}
