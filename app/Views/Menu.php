<?php
$menu=["/"=>"Главная"];
$querryDetalPage = $NewsController->getCheck();
while ($row = $querryDetalPage->fetch()) {
    if ($_GET['id'] == $row['id']) {
        $menu += [$args => $row['title']];
        break;
    }
}
