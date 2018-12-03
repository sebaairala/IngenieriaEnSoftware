<?php
include_once "authenticatorbase.php";
include_once "helper.php";
include_once "inventiondao.php";
class AuthenticatorInvention extends AuthenticatorBase
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
      $result = InventionDao::GetInventions();
			$ret_val = array('status' => true, 'inventions' => $result);
		}
		return $ret_val;
	}
}
