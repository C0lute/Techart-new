<?php 
$uri = $_SERVER['REQUEST_URI'];
preg_match('/\d+/', $uri, $matches);
require_once __DIR__.'/app/Controllers/NewsController.php';
$obj = new \app\Controllers\NewsController();
if ($matches == null) {
    if ($uri === '/index.php') {
        $obj->actionList();
    }
    else {
        $obj->Error404();
    }
}
elseif ($uri === '/index.php?page='.trim($matches[0])) {
    $obj->actionList();
}
elseif ($uri === '/detal.php?id='.trim($matches[0])) {
    $obj->Detail(trim($matches[0]));
}
