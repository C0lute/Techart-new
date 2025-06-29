<?php
$uri = $_SERVER['REQUEST_URI'];
preg_match('{\/news\/(page-)?(\d+)?}', $uri, $matches);
if (($uri === '/') || ($uri === '/news/')) {
    include './app/Controllers/NewsController.php';
    $obj = new app\Controllers\NewsController();
    $obj->actionList(1);
} elseif ($uri === '/news/page-'.$matches[2].'/') {
    include './app/Controllers/NewsController.php';
    $obj = new app\Controllers\NewsController();
    $obj->actionList($matches[2]);
} elseif ($uri === '/news/'.$matches[2].'/') {
    include './app/Controllers/NewsController.php';
    $obj = new app\Controllers\NewsController();
    $obj->Detail($matches[2]);
} else {
    include './app/Controllers/NewsController.php';
    $obj = new app\Controllers\NewsController();
    $obj->Error404();
}
