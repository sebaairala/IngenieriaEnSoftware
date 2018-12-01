<?php
include_once '../vendor/autoload.php';

// Using Medoo namespace
use Medoo\Medoo;

class DB
{
  private $database = "ingsoft";
  private $host = "127.0.0.1";
  private $user = "ingsoft";
  private $pass = "ingsoft123";
  private $options = "";
  public $connection;

    public static function GetInstance()
    {
        static $inst = null;
        if ($inst == null) {
            $inst = new DB();
        }
        return $inst;
    }

    private function __construct()
    {

      $this->connection = new Medoo([
      	// required
      	'database_type' => 'mysql',
      	'database_name' => $this->database,
      	'server' => $this->host,
      	'username' => $this->user,
      	'password' => $this->pass
      ]);
    }

}
