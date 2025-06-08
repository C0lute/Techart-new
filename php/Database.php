<?php
class Database {
    private $user;
    private $pass;
    private $dsn;
    private $db;

    function Db(){
        $this->user = "root";
        $this->pass = "";
        $this->dsn = "mysql:host=localhost;dbname=mysite;charset=utf8";
        return $this->db = new PDO($this->dsn, $this->user, $this->pass);
    }
}

$db = new Database();
$db->Db();

