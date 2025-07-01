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

    // public $newsModel;
    // public  $uri;
    // public function __construct()
    // {
    //     $this->limit = 4;
    //     $this->newsModel = new NewsModel();
    // }

    public function getPages()
    {
        $limit = 4;
        $newsCount = (new NewsModel())->getCount();
        return $pages = ceil($newsCount / $limit);
    }

    public function getRows($offset)
    {
        $limit = 4;
        $offset = ($offset - 1) * $limit;
        return (new NewsModel())->getRows($offset, $limit);
    }

    public function render($tpl, $context)
    {
        extract($context, EXTR_PREFIX_SAME, "wddx");
        $rows = $rows;
        $row = $row;
        define('VIEWS', './app/Views/');
        ob_start();
        include VIEWS.$tpl.'.php';
        $context = ob_get_contents();
        ob_end_clean();
        return $context;

    }

    public function actionList($page)
    {
        if (($page > self::getPages()) || ($page <= 0)) {
            self::error404();
        } else {
            $offset = (int) ($page ?? 1);
            $lastNews = (new NewsModel())->getLastNews(); //запрос на последнюю новость
            $rows = self::getRows($offset); //запрос на 4 новости с учетом оффсета и лимита
            $row = $lastNews->fetch();
            $tpl = 'NewsPage';
            $context = ['rows' => $rows, 'row' => $row];
            $content = self::render($tpl, $context);
            include './app/Views/Layout.php';
        }
    }

    public function detail($id)
    {
        self::getPages();
        if (($id > (new NewsModel())->getCount()) || ($id <= 0)) {
            self::error404();
        } else {
            $rows = (new NewsModel())->getItem(['id']);
            while ($row = $rows->fetch()) {
                if ($id == $row['id']) {
                    $tpl = 'DetalPage';
                    $context = ['row' => $row];
                    $content = self::render($tpl, $context);
                    include './app/Views/Layout.php';
                }
            }
        }
    }

    public function error404()
    {
        $tpl = 'Page404';
        $context = [];
        $content = self::render($tpl, $context);
        include './app/Views/Layout.php';
    }
}
