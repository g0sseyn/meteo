<?php ob_start(); ?>

    <div class="news offset-sm-2 col-sm-8 center">
        <h3>
            <a href="index.php?action=singlePost&id=<?= $post['id'] ?>"><?= htmlspecialchars($post['title_news']); ?></a>
            <br/>
            <em>le <?= $post['creation_date_news_fr'] ?></em>
        </h3>
        <?php if (isset($post['img_url'])&&$post['img_url']!=='0') { ?>       
            <div class="image"><img src="<?= $post['img_url']?>"></div>
        <?php ;} ?>
            
       
        <?= nl2br($post['content_news']) ?>
        
    </div>

    <h2 class="col-sm-12 center">Commentaires</h2>

    <?php
    while ($comment = $comments->fetch())
    {
    ?>
    <?php if ($comment['is_signaled']=='1') {
       
     ?>
    <p class="offset-sm-4 col-sm-4 offset-sm-4"><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?>   <a class="btn btn-danger" title="commentaire deja signalé" >O</span></a> </p>
    <p class="offset-sm-4 col-sm-4 offset-sm-4"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
}else { ?>
    <p class="offset-sm-4 col-sm-4 offset-sm-4"><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?>   <a class="btn btn-success" title="signaler le commentaire" href="index.php?action=signalComment&amp;id=<?= $comment['id'] ?>&amp;postId=<?= $post['id'] ?>">X</a> </p>
    <p class="offset-sm-4 col-sm-4 offset-sm-4"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>


<?php }} ?>
<?php if (isIdentify()) {?>
    <div class="offset-sm-4 col-sm-4 offset-sm-4 container">
        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post" >
            <div class="form-group">
                <label for="author" class="col-2 col-form-label">auteur </label><br />
                <input type="text" id="author" name="author" class="form-control" readonly value="<?= $_SESSION['id'] ?>" />
            </div>
            <div class="form-group">
                <label for="comment" class="col-2 col-form-label">Commentaire</label><br />
                <textarea id="comment" name="comment" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success col-form-label" type="submit">Envoyer</button>
            </div>
        </form>
    </div>
<?php }else {?>
    <div class="offset-sm-4 col-sm-4 offset-sm-4 container">
        <i>veuillez vous identifiez pour poster un commentaire</i>
    </div>
<?php } $newsContent = ob_get_clean(); ?>