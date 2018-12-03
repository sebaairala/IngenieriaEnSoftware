<?php
include_once "authenticatorbase.php";
include_once "helper.php";
include_once "invention_statedao.php";
class AuthenticatorInventionState extends AuthenticatorBase
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
      $result = InventionStateDao::GetInventionsState();
			$ret_val = array('status' => true, 'inventionsstate' => $result);
		}
		return $ret_val;
	}
}
