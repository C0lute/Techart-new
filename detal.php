<?php
include __DIR__.'/app/Views/Header.php';
if ($queryDetalPage) {
    $queryDetalPage->closeCursor();
    $queryDetalPage->execute();
    while ($row = $queryDetalPage->fetch()) {
        if ($_GET['id'] == $row['id']) {
?>
<div class="container">
    <h2 class="h2"><?= $row['title'] ?></h2>
    <div class="news" style="flex-wrap: nowrap; margin: 5% 0;">
        <div class="news-item">
            <span class="news-date"><?= $row['date_fmt'] ?></span>
            <h3 class="news-title"><?= $row['announce'] ?></h3>
            <p class="news-content"><?= strip_tags($row['content']) ?></p>
            <a class="news-button" style="order:2" ; href="/index.php">
                <svg height='25px' width='32px' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg' style="transform: rotate(180deg);">
                    <g fill='none' fill-rule='evenodd'>
                        <path
                        d='m9.88528137 7.48578644 l1.41421353 1.41421356 l-6.0994949 6.0997864
                        l25.4426407.0002136 v2 l-25.4286407-.0002136 l6.0854949 6.085495
                        l-1.41421353 1.4142135 l-8.48528137-8.4852813 l.022-.0214272
                        l-.022-.0217186 z'
                        fill='#841844'
                        transform='matrix(-1 0 0 -1 32.04264 31.985282)'
                        />
                    </g>
                </svg>
                <span>НАЗАД К НОВОСТЯМ</span>
            </a>
        </div>
        <div class="logo" style="background-image: url('/img/<?= $row['image'] ?>'); height: 767px; margin: 0; width:50%">
        </div>
        <?php
        }
    }
}
        ?>
</div>
<?php include './app/Views/Footer.php'; ?>
