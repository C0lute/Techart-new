<div class="btn-menu"> <!-- кнопки навигации -->
    <?php 
    for ($p = 1; $p <= $this->pages; $p++) {
    ?>
    <a href="/news/page-<?=$p?>/" class="btn-item"><?=$p?></a>
    <?php
    }
    ?>
</div>