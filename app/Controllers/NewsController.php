<?php
namespace App\Controllers;

use App\Models\NewsModel;

class NewsController
{
    public function getPages()
    {
        global $limit, $newsModel;
        $limit = 4;
        $newsModel = new NewsModel();
        $newsCount = $newsModel->getCount();
        return ceil($newsCount / $limit);
    }

    public function getRows($offset)
    {
        global $limit, $newsModel;
        $offset = ($offset - 1) * $limit;
        return $newsModel->getRows($offset, $limit);
    }

    public function render($tpl, $context=[])
    {
        extract($context);
        define('VIEWS', './app/Views/');
        ob_start();
        include VIEWS.$tpl.'.php';
        $content = ob_get_contents();
        ob_end_clean();
        include VIEWS.'Layout.php';
    }

    public function actionList($page)
    {
        if (($page > self::getPages()) || ($page <= 0)) {
            self::error404();
        } else {
            global $newsModel;
            $rows = self::getRows($page); //запрос на 4 новости
            $lastNews = $newsModel->getLastNews(); //запрос на последнюю новость
            $row = $lastNews->fetch();
            self::render('NewsPage', $context = ['rows' => $rows, 'row' => $row]);
        }
    }

    public function detail($id)
    {
        $newsModel = new NewsModel();
        if (($id > $newsModel->getCount()) || ($id <= 0)) {
            self::error404();
        } else {
            $rows = $newsModel->getItem(['id']);
            while ($row = $rows->fetch()) {
                if ($id == $row['id']) {
                    self::render('DetalPage', $context = ['row' => $row, 'id' => $id]);
                }
            }
        }
    }

    public function error404()
    {
        self::render('Page404');
    }
}
