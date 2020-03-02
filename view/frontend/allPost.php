<?php ob_start(); while ($data = $posts->fetch()){ ?>
    <article class="news">
        <?php if (isset($data['img_url'])&&$data['img_url']!=='0') { ?> 
        <a href="<?= $data['id']?>-<?= $data['title_news']?>">      
            <div class="image center imageNews"><img src="<?= $data['img_url']?>" alt="image titre de la news"></div>
        </a>
        <?php ;} ?>
        <div class="resume">        
            <h3 class="center">
                <a href="<?= $data['id']?>-<?= $data['title_news']?>"><?= htmlspecialchars($data['title_news']);?></a>
                <em class="date_news">le <?= $data['creation_date_news_fr']; ?></em>
            </h3>        
            <div class="abstract">
                <?= nl2br($data['abstract_news']) ?>
            </div>
        </div>
    </article>
<?php } $posts->closeCursor();$newsContent = ob_get_clean(); ?>