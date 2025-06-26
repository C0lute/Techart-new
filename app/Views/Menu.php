<?php
if (self::getCheckPage()) {
?>
    <hr style="margin: 2% auto;">
    <div class="nav-menu">
    <?php
    $menu=["/"=>"Главная"];
    while ($row = $querryDetalPage->fetch()) {
        if ($_GET['id'] == $row['id']) {
            $menu += [$row['title']];
            break;
        }
    }
    foreach ($menu as $item => $value) {
        echo '<a class="atest"href="' . $item . '">' . $value . '</a>';
    }
}
    ?>
    </div>
