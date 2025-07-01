<?php
namespace App\Controllers;

use App\Models\NewsModel;

class NewsController
{
    // private $limit;
    // private $offset;
    // private $id;
    // private $newsCount;
    // private $pages;
    // private $lastNews;
    // private $rows;
    // private $row;
    // private $tpl;

    public $newsModel;
    public  $uri;
    public function __construct()
    {
        $this->limit = 4;
        $this->newsModel = new NewsModel();
    }

    public function getPages()
    {
        $this->newsCount = $this->newsModel->getCount();
        return $this->pages = ceil($this->newsCount / $this->limit);
    }

    public function getRows()
    {
        $this->offset = ($this->offset - 1) * $this->limit;
        return $this->newsModel->getRows($this->offset, $this->limit);
    }

    public function render($tpl, $context)
    {
        define('VIEWS', './app/Views/');
        ob_start();
        include VIEWS.$tpl.'.php';
        $context = ob_get_contents();
        ob_end_clean();
        return $context;

    }

    public function actionList($page)
    {
        self::getPages();
        if (($page > $this->pages) || ($page <= 0)) {
            self::error404();
        } else {
            $this->offset = (int) ($page ?? 1);
            $this->lastNews = $this->newsModel->getLastNews();
            $this->rows = self::getRows();
            $this->tpl = 'NewsPage';
            $context = [$this->rows, $this->lastNews, $this->offset];
            $content = self::render($this->tpl, $context);
            include './app/Views/Layout.php';
        }
    }

    public function detail($id)
    {
        self::getPages();
        if (($id > $this->newsCount) || ($id <= 0)) {
            self::error404();
        } else {
            $this->id = $id;
            $rows = $this->newsModel->getItem(['id']);
            while ($this->row = $rows->fetch()) {
                if ($id == $this->row['id']) {
                    $this->tpl = 'DetalPage';
                    $context = [$this->row];
                    $content = self::render($this->tpl, $context);
                    include './app/Views/Layout.php';
                }
            }
        }
    }

    public function error404()
    {
        $this->tpl = 'Page404';
        $context = [];
        $content = self::render($this->tpl, $context);
        include './app/Views/Layout.php';
    }
}
