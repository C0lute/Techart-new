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
            $lastNews = $this->newsModel->getLastNews();
            $rows = self::getOffset();
            ob_start();
            include './app/Views/LastNews.php';
            include './app/Views/News.php';
            include './app/Views/Pagination.php';
            $content = ob_get_contents();
            ob_end_clean();
            include './app/Views/Layout.php';
        }
    }

    public function detail($id)
    {
        ob_start();
        include './app/Views/DetalPage.php';
        $content = ob_get_contents();
        ob_end_clean();
        self::getPages();
        if (($id > $this->newsCount) || ($id <= 0)) {
            self::error404();
        } else {
            $this->id = $id;
            $querryDetalPage = self::checkPage();
            while ($row = $querryDetalPage->fetch()) {
                if ($id == $row['id']) {
                    include './app/Views/Layout.php';
                }
            }
        }
    }

    public function error404()
    {
        ob_start();
        include './app/Views/Page404.php';
        $content = ob_get_contents();
        ob_end_clean();
        include './app/Views/Layout.php';
    }
}
