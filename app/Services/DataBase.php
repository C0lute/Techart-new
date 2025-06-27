<?php
namespace App\DataBase;

use PDO;

class DataBase
{
    private $host;
    private $user;
    private $pass;
    private $database;
    private $dsn;
    private $connection;

    public function __construct() {
        $config = include './config/config.php';
        $this->host = $config['DB_HOST'];
        $this->user = $config['DB_USERNAME'];
        $this->pass = $config['DB_PASSWORD'];
        $this->database = $config['DB_DATABASE']; 
    }

    public function connection()
    {
        $this->dsn = "mysql:host=$this->host;dbname=$this->database;charset=utf8";
        if ($this->connection === null) {
            try {
                $this->connection = new PDO($this->dsn, $this->user, $this->pass);
            }    catch (Exception $e) {
                     echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
        return $this->connection;
    }
}
