<?php
$user = "root";
$pass = "";
$dsn = "mysql:host=localhost;dbname=mysite;charset=utf8";
$db = new PDO($dsn, $user, $pass);
$sql = "select *, DATE_FORMAT(`date`, '%d.%m.%Y') date_fmt from `news` order by `date` desc limit ?,?";
$sql1 = "select *, DATE_FORMAT(`date`, '%d.%m.%Y') date_fmt from `news` order by `date` desc limit ?";
$sql2 = "select *, DATE_FORMAT(`date`, '%d.%m.%Y') date_fmt from `news` order by `date` desc";
$count = "select count(*) cnt from news";
$cnt = $db->query($count);
$cnt1 = $cnt->fetch();
$limit = 4;
$pages = ceil($cnt1['cnt'] / $limit);
$page = (int) ($_GET['page'] ?? 1);
$res = $db->query($sql2);
$query = $db->prepare($sql);
$query->bindValue(1, ($page - 1) * $limit, PDO::PARAM_INT);
$query->bindValue(2, $limit, PDO::PARAM_INT);
$query->execute();

$query1 = $db->prepare($sql1);
$query1->bindValue(1, 1, PDO::PARAM_INT);
$query1->execute();
