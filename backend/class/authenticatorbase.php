<?php

abstract class AuthenticatorBase
{
	abstract protected function ValidateInputData();
	abstract protected function SetValues($id, $value);
	abstract protected function ValidateData();
}
