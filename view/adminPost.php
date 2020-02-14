<?php ob_start(); ?>      
    <form action="index.php?action=addPost" method="post" class='offset-md-2 col-md-8 well'>
        <legend id="articlesForm">Ajouter un article</legend>
        <div id="newArticleForm">
            <div class="form-group">
                <label for="title">Titre : </label>        
                <input type="text" name="title" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="imgURL">URL de l'image associée : </label>        
                <input type="text" name="imgURL" class="form-control" />
            </div>
            <div class="form-group">
                <label for="addContent">Contenu : </label>
                <textarea id="addContent" name='addContent' class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Poster l'article</button>
        </div>
    </form>
<?php $adminContent = ob_get_clean();  ?>