<?php
include './vendor/autoload.php';

use App\Controllers\NewsController;

$uri = $_SERVER['REQUEST_URI'];
if (($uri === '/') || ($uri === '/news/')) {
    $obj = new NewsController();
    $obj->actionList(1);
} elseif (preg_match('{^/news/page-(\d+)/$}', $uri, $matches)) {
    $obj = new NewsController();
    $obj->actionList($matches[1]);
} elseif (preg_match('{^/news/(\d+)/$}', $uri, $matches)) {
    $obj = new NewsController();
    $obj->detail($matches[1]);
} else {
    $obj = new NewsController();
    $obj->error404();
}