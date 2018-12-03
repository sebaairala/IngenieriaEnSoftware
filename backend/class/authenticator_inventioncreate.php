<?php
include_once "authenticatorbase.php";
include_once "helper.php";
include_once "inventiondao.php";
include_once "tokendao.php";
class AuthenticatorInventionCreate extends AuthenticatorBase
{
  private $idmuseo;
  private $idinventor;
  private $idtipo;
  private $idestado;
  private $nombre;
  private $enalmacendescarte;
  private $token;

	private $data_loaded = false;
	private $data_validated = false;
	public function ValidateInputData()
	{
		$ret_val = false;
		if(true == $this->data_loaded)
		{
			if(true == helper::is_alphanumeric($this->idmuseo)
        && true == helper::is_alphanumeric($this->idinventor)
        && true == helper::is_alphanumeric($this->idtipo)
        && true == helper::is_alphanumeric($this->idestado)
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
		if("idmuseo" == $id)
		{
			$this->idmuseo = $value;
		}
    else if("idinventor" == $id)
		{
			$this->idinventor = $value;
		}
    else if("idtipo" == $id)
		{
			$this->idtipo = $value;
		}
    else if("idestado" == $id)
		{
			$this->idestado = $value;
		}
    else if("nombre" == $id)
		{
			$this->nombre = $value;
		}
    else if("enalmacendescarte" == $id)
		{
			$this->enalmacendescarte = $value;
		}
    else if("token" == $id)
		{
			$this->token = $value;
		}

		if("" != $this->idmuseo && "" != $this->idinventor && "" != $this->idtipo && "" != $this->idestado && "" != $this->nombre && "" != $this->enalmacendescarte && "" != $this->token)
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
        $user = ModelFactory::Create("user");
        $user->SetId($token_instance->GetIdUser());
        $museum = ModelFactory::Create("museum");
        $museum->SetId($this->idmuseo);
        $inventor = ModelFactory::Create("inventor");
        $inventor->SetId($this->idinventor);
        $invention_type = ModelFactory::Create("invention_type");
        $invention_type->SetId($this->idtipo);
        $inventionstate = ModelFactory::Create("invention_state");
        $inventionstate->SetId($this->idestado);
        $invention = ModelFactory::Create("invention");
        $invention->SetCreateDate(null);
        $invention->SetName($this->nombre);
        $invention->SetIsInGarbage($this->enalmacendescarte);
        $invention->SetCreateUser($user);
        $invention->SetInventor($inventor);
        $invention->SetMuseum($museum);
        $invention->SetType($invention_type);
        $invention->SetState($inventionstate);

        if(null != InventionDao::InsertInvention($invention))
        {
  					$ret_val = array('status' => true, 'inventor' => $invention->GetName());
        }
      }
		}
		return $ret_val;
	}
}
