<?php
final class DB
{
  final $dsn = "";
  final $user = "";
  final $pass = "";
  final $options = "";

    public static function GetInstance()
    {
        static $inst = null;
        if ($inst === null) {
            $inst = new DB();
        }
        return $inst;
    }

    private function __construct()
    {
      $pdo = new PDO($dsn, $user, $pass, $options);
    }
}
