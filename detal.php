<?php
include __DIR__.'/app/Views/Header.php';
$querryDetalPage = $NewsController->getCheck();

while ($row = $querryDetalPage->fetch()) {
    if ($_GET['id'] == $row['id']) {
         include __DIR__.'/app/Views/DetalPage.php';  
    }
}
?>
</div>
<?php include './app/Views/Footer.php'; ?>
