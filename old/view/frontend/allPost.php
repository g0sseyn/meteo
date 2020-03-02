<?php ob_start(); ?>
<?php 
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <?php if (isset($data['img_url'])&&$data['img_url']!=='0') { ?> 
        <a href="index.php?action=singlePost&id=<?= $data['id']?>">      
            <div class="image center imageNews"><img src="<?= $data['img_url']?>"></div>
        </a>
        <?php ;} ?>
        <div class="resume">        
            <h3 class="center">
                <a href="index.php?action=singlePost&id=<?= $data['id']?>"><?= htmlspecialchars($data['title_news']); ?></a>
                <em class="date_news">le <?= $data['creation_date_news_fr']; ?></em>
            </h3>        
            <div class="abstract">
                <?= nl2br($data['abstract_news']) ?>
            </div>
        </div>
    </div>

<?php
} 
$posts->closeCursor();
?>
<?php $newsContent = ob_get_clean(); ?>