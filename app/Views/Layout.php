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
        <a href="/news/">
            <img src="/img/logo.svg" alt="Логотип">
        </a>
        <?php
        if ($id) {
        ?>
        <hr style="margin: 2% auto;">
        <div class="nav-menu">
            <a class="atest"href="/news/">Главная</a>
            <a class="atest" href="/news/<?php echo $id; ?>/"><?php echo $row['title']; ?></a>
            <?php
        }
            ?>
        </div>
    </header>
    <?= $content; ?>
    <footer class="footer-copyright">
    <hr>
    <span>© 2023 — 2412 «Галактический вестник»</span>
    </footer>
</div>
</body>
</html>
