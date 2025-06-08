<?php
include 'php/Database.php';
include "Querys.php";
$Querry = new Querys();


 
$querryMainNews = $db->Db()->prepare($Querry->querryMainNews());
$querryMainNews->bindValue(1, 1, PDO::PARAM_INT);
$querryMainNews->execute(); // запрос на последнюю новость



$limit = 4;
$page = (int) ($_GET['page'] ?? 1);

$querryOtherNews = $db->Db()->prepare($Querry->querryOtherNews());
$querryOtherNews->bindValue(1, ($page - 1) * $limit, PDO::PARAM_INT);
$querryOtherNews->bindValue(2, $limit, PDO::PARAM_INT);
$querryOtherNews->execute(); //запрос на 4 новости


$cnt = $db->Db()->query($Querry->querryCountPages());
$cntFetch = $cnt->fetch();
$pages = ceil($cntFetch['cnt'] / $limit); //запрос на количество страниц


$querryDetalPage = $db->Db()->query($Querry->querryDetalPage()); //запрос на детальную страницу


