<?php $nav=false ?>
<?php ob_start(); ?>

  <form onsubmit='return false;' method="post" class="my-2 my-lg-0 col-sm-offset-4 col-sm-4 container formConnection">   
    <div class="form-group">
        <label for="email">Adresse Email</label>
        <input type="email" id="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email" required>    
      </div>
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id='password' name="password" placeholder="Mot de passe" required>
      </div>      
      <button type="submit" class="btn btn-primary formConnectionBtn">Valider</button>   
      <div id="errorConnection"></div>
  </form>
<?php $formConnection = ob_get_clean(); ?>
