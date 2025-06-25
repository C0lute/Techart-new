<?php 
include './app/Views/Header.php';

$lastNews = $NewsController->NewsModel->getLastNews();
$rows = $NewsController->getOffset();
$pages = $NewsController->getPages();


include './app/Views/LastNews.php';?>
<div class="container">
    <h2 class="h2">Новости</h2>
    <?php
    include __DIR__.'/./app/Views/News.php';
    include __DIR__.'/./app/Views/Pagination.php';
    include __DIR__.'/./app/Views/Footer.php';
    ?>
