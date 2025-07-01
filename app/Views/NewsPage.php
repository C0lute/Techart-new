<?php
?>
<div class="logo" style="background-image: url('/img/<?= $row['image'] ?>');">
    <div class="logo_text container">
        <h1 class="h1"><?= strip_tags($row['title']) ?></h1>
        <p class="logo_p"><?= strip_tags($row['announce']) ?></p>
    </div>
</div>
<?php
?>
<div class="container">
    <h2 class="h2">Новости</h2>
    <div class="news">
        <?php
        if ($rows) {
            while ($row = $rows->fetch()) {
        ?>
        <a class="news-item" href="/news/<?= $row['id'] ?>/">
            <span class="news-date"><?= $row['date_fmt'] ?></span>
            <h3 class="news-title"><?= strip_tags($row['title']) ?></h3>
            <p class="news-content"><?= strip_tags($row['announce']) ?></p>
            <button class="news-button" href="/<?= $row['id'] ?>">ПОДРОБНЕЕ
                <svg height='25px' width='32px' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'>
                    <g fill='none' fill-rule='evenodd'>
                        <path
                        d='m9.88528137 7.48578644 l1.41421353 1.41421356 l-6.0994949 6.0997864
                        l25.4426407.0002136 v2 l-25.4286407-.0002136 l6.0854949 6.085495
                        l-1.41421353 1.4142135 l-8.48528137-8.4852813 l.022-.0214272
                        l-.022-.0217186 z'
                        fill='#841844'
                        transform='matrix(-1 0 0 -1 32.04264 31.985282)' />
                    </g>
                </svg>
            </button>
        </a>
        <?php
            }
        }
        ?>
    </div>
    <div class="btn-menu"> <!-- кнопки навигации -->
    <?php 
    for ($p = 1; $p <= self::getPages(); $p++) {
    ?>
    <a href="/news/page-<?=$p?>/" class="btn-item"><?=$p?></a>
    <?php
    }
    ?>
    </div>