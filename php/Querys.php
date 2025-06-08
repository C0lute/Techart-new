<?php
class Querys {
    private $sql;
    private $sql1;
    private $sql2;
    private $countPages;

    function querryMainNews(){
        return $this->sql = "select *, DATE_FORMAT(`date`, '%d.%m.%Y') date_fmt from `news` order by `date` desc limit ?";
    }
    function querryOtherNews(){
        return $this->sql1 = "select *, DATE_FORMAT(`date`, '%d.%m.%Y') date_fmt from `news` order by `date` desc limit ?,?";
    }
    function querryDetalPage(){
        return $this->sql2 = "select *, DATE_FORMAT(`date`, '%d.%m.%Y') date_fmt from `news` order by `date` desc";
    }
    function querryCountPages(){
        return $this->countPages = "select count(*) cnt from news";
    }
}

