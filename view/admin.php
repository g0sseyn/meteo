<?php ob_start(); ?>   
  <div class="offset-md-2 col-md-8">
    <a href="index.php?action=adminPost" class="btn btn-primary btn-block">Ajouter un nouvelle article</a>
  </div>
  <h2 class="center">Supprimer ou modifier un article</h2>
  <div class="offset-md-2 col-md-8 table-responsive">
    <table class="table table-bordered table-striped table-hover">            
      <thead class="articleTable thead-dark">
        <tr>
          <th class="col-sm-10">Titre</th>
          <th class="col-sm-1">Modifier</th>
          <th class="col-sm-1">Supprimer</th>  
        </tr>
      </thead>
      <tbody class="articleTable">
        <?php while ($data = $posts->fetch()){ ?>
        <tr>
          <td>
            <a href="<?= $data['id']; ?>-<?php $title = str_replace(' ', '-', $data['title_news']);echo $title; ?>"><?= htmlspecialchars($data['title_news']); ?></a>
          </td>
          <td class="center"><a href="index.php?action=adminPost&id=<?= $data['id']; ?>" class="btn btn-primary">Modifier</a></td>
          <td class="center"><a href="index.php?action=deletePost&id=<?= $data['id']; ?>" class="btn btn-danger">Supprimer</a></td>
        </tr>
        <?php } $posts->closeCursor(); ?>      
      </tbody>
    </table>
  </div>
  <h2 class="center">Supprimer ou modifier un commentaire signalé</h2>
  <div class="offset-md-2 col-md-8 table-responsive">
    <table class="table table-bordered table-striped">
      
      <thead class="commentSignaledTable">
        <tr>
          <th class="col-sm-10">Commentaires</th>
          <th class="col-sm-1">Modifier</th>
          <th class="col-sm-1">Supprimer</th>               
        </tr>
      </thead>
      <tbody class="commentSignaledTable">              
        <?php /* while ($com = $signaledComments->fetch()) { ?>    
        <tr>
          <td>
            <?= nl2br(htmlspecialchars($com['comment'])); ?>
          </td>
          <td class="center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?= $com['id']; ?>">Modifier</button>
          </td>
          <div class="modal fade" id="modal<?= $com['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <p class="modalAuthor">Auteur</p>
                  <h5 class="modal-title" id="modaltitle"><?= htmlspecialchars($com['author']); ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="index.php?action=updateComment&amp;id=<?= $com['id'] ?>" method="post">
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
          <td class="center">
            <a href="deleteComment-<?= $com['id']; ?>" class="btn btn-danger">Supprimer</a>
          </td>
        </tr>     
        <?php } $signaledComments->closeCursor(); */?> 
      </tbody>    
    </table> 
  </div>
<?php $adminContent = ob_get_clean(); ?>