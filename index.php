<?php 
use app\Controllers\NewsController;
$uri = $_SERVER['REQUEST_URI'];
preg_match('/\d+/', $uri, $matches);
spl_autoload_register();
$obj = new NewsController();
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
