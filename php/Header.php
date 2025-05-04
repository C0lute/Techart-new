<?php
include 'php/Bd.php';
$args = "$_SERVER[REQUEST_URI]";
//echo "<p style ='padding:0 0 0 20px;'>".$args."</p>";
///echo "<br><p style ='padding:0 0 0 20px;'>".$_GET['id']."</p>";    
?>
<!DOCTYPE html>
<html lang="ru">
<html>

<head>
    <title>Тестовое задание Techart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/normalize.css">
    <link rel="stylesheet" href="/styles/style.css">
</head>

<body>
    <header class="header container">
        <a href="/">
            <img src="/img/logo.svg" alt="Логотип">
        </a>
        <?php
        if (isset($_GET['id']) && $args == ("/detal.php?id=" . $_GET['id'])) {
        ?>
            <hr style="margin: 2% auto;">
            <div class="nav-menu">
            <?php
            include 'Menu.php';
            if ($res) {
                while ($row = $res->fetch()) {
                    if ($_GET['id'] == $row['id']) {
                        $menu += [$args => $row['title']];
                        break;
                    }
                }
            }
            foreach ($menu as $item => $value) {
                echo '<a class="atest"href="' . $item . '">' . $value . '</a>';
            }
        }
            ?>
            </div>


    </header>