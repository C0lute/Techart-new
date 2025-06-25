<?php
include __DIR__.'/app/Views/Header.php';
$querryDetalPage = $NewsController->getCheck();
if ($NewsController->getCheck() == true) {
    // $NewsController->getCheck()->closeCursor();
    // $NewsController->getCheck()->execute();
    while ($row = $querryDetalPage) {
        var_dump($row['id']);
        echo $_GET['id'];
        if ($_GET['id'] == $row['id']) {
            echo "da da da";
            include __DIR__.'/app/Views/DetalPage.php';
            break;
        }
        

    }
}
?>
</div>
<?php include './app/Views/Footer.php'; ?>
