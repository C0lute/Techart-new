<?php
include __DIR__.'/../../config/DataBase.php';

// namespace Vendor\Model;

class NewsModel
{
    public $limit = 4;
    private $offset;
    private $connection;
    public function __construct()
    {
        $this->connection = (new Database)->connection();
    }

    public function getCount()
    {
        $cnt = $this->connection->query('select count(*) cnt from news');
        $cntFetch = $cnt->fetch();
        return $pages = ceil($cntFetch['cnt'] / $this->limit);
    }

    public function getRows($offset, $limit)
    {
        $queryOtherNews = $this->connection->prepare("select *, DATE_FORMAT(`date`, '%d.%m.%Y') date_fmt from `news` order by `date` desc limit ?,?");
        $queryOtherNews->bindValue(1, ($offset - 1) * $limit, PDO::PARAM_INT);
        $queryOtherNews->bindValue(2, $limit, PDO::PARAM_INT);
        $queryOtherNews->execute();
        return $queryOtherNews; //запрос на 4 новости
    }

    public function getItem($id)
    {
        return $queryDetalPage = $this->connection->query("select *, DATE_FORMAT(`date`, '%d.%m.%Y') date_fmt from `news` order by `date` desc"); //запрос на детальную страницу
    }

    public function getLastNews()
    {
        $queryLastNews = $this->connection->prepare("select *, DATE_FORMAT(`date`, '%d.%m.%Y') date_fmt from `news` order by `date` desc limit ?");
        $queryLastNews->bindValue(1, 1, PDO::PARAM_INT);
        $queryLastNews->execute();
        return $queryLastNews;
    }
}
