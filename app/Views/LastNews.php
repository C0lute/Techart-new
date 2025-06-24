<?php if ($lastNews) {
    while ($row1 = $lastNews->fetch()) {
?>
<div class="logo" style="background-image: url('/img/<?= $row1['image'] ?>');">
    <div class="logo_text container">
        <h1 class="h1"><?= strip_tags($row1['title']) ?></h1>
        <p class="logo_p"><?= strip_tags($row1['announce']) ?></p>
    </div>
</div>
<?php
    }
}
?>