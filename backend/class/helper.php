<?php
class Helper {

  static function is_alphanumeric($value)
  {
    return ctype_alnum($value);
  }

  static function is_valid_email($email)
  {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
  }

  static function GetTextHash($string)
  {
      return md5($string);
  }

}
