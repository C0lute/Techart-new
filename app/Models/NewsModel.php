<?php
include __DIR__.'/./DataBase.php';

class NewsModel
{
    private $connection;

    public function __construct()
    {
        $this->connection = (new Database)->connection();
    }

    public function getCount()
    {
        $cnt = $this->connection->query('select count(*) cnt from news');
        $cntFetch = $cnt->fetch();
        return $cntFetch['cnt'];
    }

    public function getRows($offset, $limit)
    {
        $queryOtherNews = $this->connection->prepare("select *, DATE_FORMAT(`date`, '%d.%m.%Y') date_fmt from `news` order by `date` desc limit ?,?");
        $queryOtherNews->bindValue(1, $offset, PDO::PARAM_INT);
        $queryOtherNews->bindValue(2, $limit, PDO::PARAM_INT);
        $queryOtherNews->execute();
        return $queryOtherNews; //запрос на 4 новости
    }

    public function getItem($id)
    {
        $queryDetalPage = $this->connection->query("select *, DATE_FORMAT(`date`, '%d.%m.%Y') date_fmt from `news` order by `date` desc"); //запрос на детальную страницу
        $queryDetalPage = $queryDetalPage->fetch();
        return $queryDetalPage;
    }

    public function getLastNews()
    {
        $queryLastNews = $this->connection->prepare("select *, DATE_FORMAT(`date`, '%d.%m.%Y') date_fmt from `news` order by `date` desc limit ?");
        $queryLastNews->bindValue(1, 1, PDO::PARAM_INT);
        $queryLastNews->execute();
        return $queryLastNews;
    }
}
