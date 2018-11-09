<?php
class Helper {

  static function is_alphanumeric($value) {
    if(ctype_alnum($value))
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  static function GetTextHash($string)
  {
      return md5($string);
  }

}
