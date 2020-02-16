<?php ob_start(); ?>
<?php 
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3 class="center">
            <a href="index.php?action=singlePost&id=<?= $data['id']?>"><?= htmlspecialchars($data['title_news']); ?></a>
            <br/>
            <em>le <?= $data['creation_date_news_fr']; ?></em>
        </h3>
        <?php if (isset($data['img_url'])&&$data['img_url']!=='0') { ?>       
            <div class="image center"><img src="<?= $data['img_url']?>"></div>
        <?php ;} ?>
       
        <?= nl2br($data['content_news']) ?>
        <br /> 
     </div>
     <hr>

<?php
} 
$posts->closeCursor();
?>
<?php $newsContent = ob_get_clean(); ?>