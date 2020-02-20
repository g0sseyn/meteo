<?php if(isset($_GET['id']) && $_GET['id'] > 0){
ob_start(); ?>      
    <form action="index.php?action=updatePost&amp;id=<?= $_GET['id']; ?>" method="post" class='offset-md-2 col-md-8 well'>
        <legend id="articlesForm">Modifier un article</legend>
        <div id="newArticleForm">
            <div class="form-group">
                <label for="title">Titre (150max): <span id="caracTitleLeft"></span></label>        
                <input id="titleContent" type="text" value="<?= nl2br($post['title_news']) ?>" name="title" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="imgURL">URL de l'image associée : </label>        
                <input type="text" value="<?php if (isset($post['img_url'])) { echo nl2br($post['img_url']); } ?>" name="imgURL" class="form-control" />
            </div>
            <div class="form-group">
                <label for="resumeContent"> extrait de la news (255max) : <span id="caracLeft"></span></label>
                <textarea id="resumeContent" name='resumeContent' class="form-control" required><?= htmlspecialchars($post['abstract_news']) ?></textarea>
            </div>
            <div class="form-group">
                <label for="addContent">Contenu : </label>
                <textarea id="addContent" name='addContent' class="form-control"><?= htmlspecialchars($post['content_news']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" id="addNewsBtn">Modifier l'article</button>
        </div>
    </form> 
    <div class="offset-md-2 col-md-8 table-responsive">   
        <table class="table table-bordered table-striped">
            <caption id="comment">
               <h3>Modifier ou supprimer un commentaire</h3>
            </caption> 
            <thead class="commentTable">
                <tr>
                    <th class="col-xs-9">Commentaires</th>
                    <th class="col-xs-1">Signalé</th>
                    <th class="col-xs-1">Modifier</th>
                    <th class="col-xs-1">Supprimer</th>               
                </tr>
            </thead>
            <tbody class="commentTable">
            <?php while ($com = $comments->fetch()) {  ?>
                <tr>
                    <td>
                         <?= nl2br(htmlspecialchars($com['comment'])); ?>
                    </td>
                    <?php if ($com['is_signaled']=='1') { ?>
                    <td class="center"><span class="btn btn-danger glyphicon glyphicon-ban-circle" title="commentaire signalé"></span></td><?php }else { ?>
                    <td class="center"><span class="btn btn-success glyphicon glyphicon-ok-circle" title="commentaire non signalé"></span></td><?php }?>        
                    <td class="center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?= $com['id']; ?>">Modifier</button></td>
                    <div class="modal fade" id="modal<?= $com['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="modalAuthor">Auteur</p>
                                    <h5 class="modal-title" id="modaltitle"><?= $com['author']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="index.php?action=updateComment&amp;id=<?= $com['id'] ?>&amp;news_id=<?= $_GET['id'] ?>" method="post">
                                    <div class="modal-body">
                                        <div>
                                            <label for="comment">Commentaire</label><br />
                                            <textarea id="comment" name="comment" class="form-control"><?= htmlspecialchars($com['comment']) ?></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="Modifier" class="btn btn-primary" />
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Annuler</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <td class="center"><a href="index.php?action=deleteComment&amp;id=<?= $com['id']; ?>&amp;news_id=<?= $_GET['id'] ?>" class="btn btn-danger">Supprimer</a></td>
                </tr>
     
<?php } $comments->closeCursor(); ?> 
            </tbody>  
        </table>
    </div>
<?php $adminContent = ob_get_clean();  } 
else{ ob_start(); ?>      
    <form action="index.php?action=addPost" method="post" class='offset-md-2 col-md-8 well'>
        <legend id="articlesForm">Ajouter un article</legend>
        <div id="newArticleForm">
            <div class="form-group">
                <label for="title">Titre (150max): <span id="caracTitleLeft"></span></label>        
                <input id="titleContent" type="text" name="title" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="imgURL">URL de l'image associée : </label>        
                <input type="text" name="imgURL" class="form-control" />
            </div>
            <div class="form-group">
                <label for="resumeContent"> extrait de la news (255max) : <span id="caracLeft"></span> </label>
                <textarea id="resumeContent" name='resumeContent' class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="addContent">Contenu : </label>
                <textarea id="addContent" name='addContent' class="form-control" ></textarea>
            </div>
            <button type="submit" class="btn btn-primary" id="addNewsBtn">Poster l'article</button>
        </div>
    </form>
<?php $adminContent = ob_get_clean(); } ?>