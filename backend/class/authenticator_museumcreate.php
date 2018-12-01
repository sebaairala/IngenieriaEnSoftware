<?php
include_once "authenticatorbase.php";
include_once "helper.php";
include_once "museumdao.php";
include_once "tokendao.php";
class AuthenticatorMuseumCreate extends AuthenticatorBase
{
  private $horario;
  private $direccion;
  private $nombre;
  private $token;
	private $data_loaded = false;
	private $data_validated = false;
	public function ValidateInputData()
	{
		$ret_val = false;
		if(true == $this->data_loaded)
		{
			if(true == helper::is_alphanumeric($this->horario)
        && true == helper::is_alphanumeric($this->direccion)
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
		if("hour" == $id)
		{
			$this->horario = $value;
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

		if("" != $this->horario && "" != $this->nombre && "" != $this->direccion && "" != $this->token)
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
        $museum = ModelFactory::Create("museum");
        $museum->SetHour($this->horario);
        $museum->SetName($this->nombre);
        $museum->SetAddress($this->direccion);
        $museum->SetCreateUserID($token_instance->GetIdUser());

        if(null != MuseumDao::InsertMuseum($museum))
        {
  					$ret_val = array('status' => true, 'museum' => $museum->GetName());
        }
      }
		}
		return $ret_val;
	}
}
