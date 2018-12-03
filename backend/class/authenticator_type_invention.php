<?php
include_once "authenticatorbase.php";
include_once "helper.php";
include_once "type_inventiondao.php";
class AuthenticatorTypeInvention extends AuthenticatorBase
{
	private $data_loaded = false;
	private $data_validated = false;
	public function ValidateInputData()
	{
		$ret_val = true;
    $this->data_loaded = true;
    $this->data_validated = true;
		return $ret_val;
	}

	public function SetValues($id, $value)
	{
	}

	public function ValidateData()
	{
		$ret_val = array( 'status' => false);
		if($this->data_validated)
		{
      $result = TypeInventionsDao::GetInventionsType();
			$ret_val = array('status' => true, 'inventionstype' => $result);
		}
		return $ret_val;
	}
}
