<?php include './app/Views/Header.php';
$lastNews = $NewsModel->getLastNews();
$offset = (int) ($_GET['page'] ?? 1);
$rows = $NewsModel->getRows($offset, $NewsModel->limit);
$pages = $NewsModel->getCount();

include './app/Views/LastNews.php';?>
<div class="container">
    <h2 class="h2">Новости</h2>
    <?php include __DIR__.'./app/Views/News.php'; ?>
    <?php include __DIR__.'./app/Views/Pagination.php'; ?>
    <?php include __DIR__.'/app/Views/Footer.php'; ?>
