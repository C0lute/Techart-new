<?php
if (self::checkPage()) {
?>
<hr style="margin: 2% auto;">
<div class="nav-menu">
    <a class="atest"href="/news/">Главная</a>
    <a class="atest" href="/news/<?php echo $id; ?>/"><?php echo $row['title']; ?></a>
    <?php
}
    ?>
</div>
