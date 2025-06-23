<?php
include 'php/Database.php';
include "Querys.php";

class NewsModel {
    public $limit = 4;
    private $offset;
    private $db;
    public $Querry;
    public function __construct(){
            
        $this->db = new Database;
        $this->Querry = new Querys;
    }

    function getCount() {
        $cnt = $this->db->Db()->query($this->Querry->querryCountPages());
        $cntFetch = $cnt->fetch();
        return $pages = ceil($cntFetch['cnt'] / $this->limit);
    }

    function getRows($offset, $limit){
        
        $querryOtherNews = $this->db->Db()->prepare($this->Querry->querryOtherNews());
        $querryOtherNews->bindValue(1, ($offset - 1) * $limit, PDO::PARAM_INT);
        $querryOtherNews->bindValue(2, $limit, PDO::PARAM_INT);
        $querryOtherNews->execute();
        return $querryOtherNews; //запрос на 4 новости
    }

    function getItem($id){
        return $querryDetalPage = $this->db->Db()->query($this->Querry->querryDetalPage()); //запрос на детальную страницу
    }

    function getMainNew(){
        $querryMainNews = $this->db->Db()->prepare($this->Querry->querryMainNews());
        $querryMainNews->bindValue(1, 1, PDO::PARAM_INT);
        $querryMainNews->execute(); 
        return $querryMainNews;
        

    }
    
}

