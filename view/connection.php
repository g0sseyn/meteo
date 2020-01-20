<?php $nav=false ?>
<?php ob_start(); ?>

  <form action="index.php?action=login" method="post" class="my-2 my-lg-0 col-sm-offset-4 col-sm-4 container formConnection">   
    <div class="form-group">
        <label for="identifiant">Adresse Email</label>
        <input type="email" id="identifiant" class="form-control" name="identifiant" aria-describedby="emailHelp" placeholder="Email" required>    
      </div>
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
      </div>      
      <button type="submit" class="btn btn-primary formInscriptionBtn">Valider</button>   
  </form>
<?php $formConnection = ob_get_clean(); ?>
