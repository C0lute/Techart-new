<?php
namespace App\Controllers;


include './app/Models/NewsModel.php';

class NewsController
{
    private $limit;
    private $offset;
    private $id;
    private $countNews;
    public $newsModel;
    public  $uri;
    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->limit = 4;
        $this->newsModel = new \App\Models\NewsModel();
    }

    public function getPages()
    {
        $this-> countNews = $this->newsModel->getCount();
        return $pages = ceil($this->countNews / $this->limit);
    }

    public function getOffset()
    {
        $this->offset = ($this->offset - 1) * $this->limit;
        return $this->newsModel->getRows($this->offset, $this->limit);
    }

    public function getCheckPage()
    {
        if ($this->id) {
            return $this->newsModel->getItem(['id']);
        }
    }

    public function actionList($page)
    {
        $pages = self::getPages();
        if (($page > $pages) || ($page <= 0)) {
            self::Error404();
        } else {
            $this->offset = (int) ($page ?? 1);
            include './app/Views/Header.php';
            $lastNews = $this->newsModel->getLastNews();
            $rows = self::getOffset();
            include './app/Views/LastNews.php';
            include './app/Views/News.php';
            include './app/Views/Pagination.php';
            include './app/Views/Footer.php';
        }
    }

    public function Detail($id)
    {
        $pages = self::getPages();
        if (($id > $this->countNews) || ($id <= 0)) {
            self::Error404();
        } else {
            $this->id = $id;
            $querryDetalPage = self::getCheckPage();
            while ($row = $querryDetalPage->fetch()) {
                if ($id == $row['id']) {
                    include './app/Views/Header.php';
                    include './app/Views/DetalPage.php';
                }
            }
            include './app/Views/Footer.php';
        }
    }

    public function Error404()
    {
        include './app/Views/Header.php';
        echo "<h1>404</h1>";
        include './app/Views/Footer.php';
    }
}
