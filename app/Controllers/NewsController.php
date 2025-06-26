<?php
namespace app\Controllers;


include __DIR__.'/../Models/NewsModel.php';

class NewsController
{
    private $limit;
    private $offset;
    public $NewsModel;
    public function __construct()
    {
        $this->offset = (int) ($_GET['page'] ?? 1);
        $this->limit = 4;
        $this->NewsModel = new \app\Models\NewsModel();
    }

    public function getPages()
    {
        $pages = $this->NewsModel->getCount();
        return $pages = ceil($pages / $this->limit);
    }

    public function getOffset()
    {
        $this->offset = ($this->offset - 1) * $this->limit;
        return $this->NewsModel->getRows($this->offset, $this->limit);
    }

    public function getCheckPage()
    {
        if (isset($_GET['id'])) {
            return $this->NewsModel->getItem(['id']);
        }
    }

    public function actionList()
    {
        include './app/Views/Header.php';
        $lastNews = $this->NewsModel->getLastNews();
        $rows = self::getOffset();
        $pages = self::getPages();
        include './app/Views/LastNews.php';
        include __DIR__.'/../Views/News.php';
        include __DIR__.'/../Views/Pagination.php';
        include __DIR__.'/../Views/Footer.php';
    }

    public function Detail($id)
    {
        include './app/Views/Header.php';
        $querryDetalPage = self::getCheckPage();
        while ($row = $querryDetalPage->fetch()) {
            if ($_GET['id'] == $row['id']) {
                 include __DIR__.'/../Views/DetalPage.php';  
            }
        }
        ?>
        </div>
        <?php include './app/Views/Footer.php';

    }
    public function Error404()
    {
        include './app/Views/Header.php';
        echo "<h1>404</h1>";
        include __DIR__.'/../Views/Footer.php';

    }
}
