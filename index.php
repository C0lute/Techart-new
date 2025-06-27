<?php
$uri = $_SERVER['REQUEST_URI'];
preg_match('{(\/(news\/)?)(page-)?(\d+)?}', $uri, $matches);
if ($uri === '/') {
    include './app/Controllers/NewsController.php';
    $obj = new app\Controllers\NewsController();
    $obj->actionList($matches);
} elseif ($uri === '/news/') {
    include './app/Controllers/NewsController.php';
    $obj = new app\Controllers\NewsController();
    var_dump($matches);
    $obj->actionList($page = 1);
} elseif ($uri === '/news/page-'.$matches[4].'/') {
    include './app/Controllers/NewsController.php';
    $obj = new app\Controllers\NewsController();
    $obj->actionList($matches[4]);
} elseif ($uri === '/news/'.$matches[4].'/') {
    include './app/Controllers/NewsController.php';
    $obj = new app\Controllers\NewsController();
    $obj->Detail($matches[4]);
}
