<?php
include 'config.php';
// namespace Vendor\Model;

class DataBase
{
    // private $user;
    // private $pass;
    private $config;
    private $dsn;
    private $connection;

    public function __construct(array $config) {
        $this->config = $config;
    }

    public function connection()
    {
        $this->user = $this->config['DB_HOST'];
        $this->pass = $this->config['DB_HOST'];
        $this->host = $this->config['DB_HOST'];
        $this->database = $this->config['DB_DATABASE'];
        //$this->dsn = "mysql:host=localhost;dbname=workspace__test;charset=utf8";
        $this->dsn = "mysql:host=$host;dbname=$database;charset=utf8";
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

// <?php
// include 'config.php';
// try
// {
//     $host=$config['DB_HOST'];
//     $dbname=$config['DB_DATABASE'];
// $conn= new PDO("mysql:host=$host;dbname=$dbname",$config['DB_USERNAME'],$config['DB_PASSWORD']);
// //new PDO("mysql:host=$hostname;dbname=mysql", $username, $password);
// }
// catch(PDOException $e)
// {
//     echo "Error:".$e->getMessage();
// }
// ?>