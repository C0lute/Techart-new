<?php
namespace App\Controllers;

use App\Models\NewsModel;

class NewsController
{
    private $limit;
    private $offset;
    private $id;
    private $newsCount;
    private $pages;
    public $newsModel;
    public  $uri;
    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->limit = 4;
        $this->newsModel = new NewsModel();
    }

    public function getPages()
    {
        $this->newsCount = $this->newsModel->getCount();
        return $this->pages = ceil($this->newsCount / $this->limit);
    }

    public function getOffset()
    {
        $this->offset = ($this->offset - 1) * $this->limit;
        return $this->newsModel->getRows($this->offset, $this->limit);
    }

    public function checkPage()
    {
        if ($this->id) {
            return $this->newsModel->getItem(['id']);
        }
    }

    public function actionList($page)
    {
        self::getPages();
        if (($page > $this->pages) || ($page <= 0)) {
            self::error404();
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

    public function detail($id)
    {
        self::getPages();
        if (($id > $this->newsCount) || ($id <= 0)) {
            self::error404();
        } else {
            $this->id = $id;
            $querryDetalPage = self::checkPage();
            while ($row = $querryDetalPage->fetch()) {
                if ($id == $row['id']) {
                    include './app/Views/Header.php';
                    include './app/Views/DetalPage.php';
                }
            }
            include './app/Views/Footer.php';
        }
    }

    public function error404()
    {
        include './app/Views/Header.php';
        include './app/Views/Page404.php';
        include './app/Views/Footer.php';
    }
}
