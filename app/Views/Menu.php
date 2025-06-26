<?php
if (self::getCheckPage()) {
?>
    <hr style="margin: 2% auto;">
    <div class="nav-menu">
        <a class="atest"href="/index.php">Главная</a>
        <a class="atest" href="/detal.php?id=<?php echo $_GET['id']; ?>"><?php echo $row['title']; ?></a>
        <?php
        // var_dump($_GET);
}
        ?>
    </div>
