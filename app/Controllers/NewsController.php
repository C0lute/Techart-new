<?php
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
        $this->NewsModel = new NewsModel();
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

    public function getCheck()
    {
        $args = "$_SERVER[REQUEST_URI]";
        if (isset($_GET['id']) && $args == ("/detal.php?id=" . $_GET['id'])) {
            return $this->NewsModel->getItem(['id']);
        }
        else {
            // echo "net";      
        }
    }
}
