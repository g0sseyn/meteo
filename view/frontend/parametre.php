<?php ob_start();if (!isIdentify()) {
  throw new Exception("veuillez vous identifiez pour acceder a cette page");  
} ?>
  <h2 class="center col-sm-12">De quel ville souhaitez-vous avoir la météo par defaut sur votre page ?</h2>
  <form onsubmit='return false;' class="offset-sm-2 col-sm-8 center formFavoriteTown">
    <div class="center" id="choiceFavoriteTown">
      <div class="btn btn-info">
        <input type="radio" id="geolocalisationDefaut" name="defautTown" value="geolocalisation" checked="checked">
        <label for="geolocalisationDefaut">Par géolocalisation</label>
      </div>
    </div>
    <div class="col-sm-12">
      <button type="submit" class="btn btn-primary" id="defautTownBtn">Valider</button>  
    </div>
    <div id="messageDefautTown">
    </div>
  </form>
  <hr>
  <h2 class="center col-sm-12">Utilisez un pseudo pour vos commentaires</h2>
  <div class="flex">
    <div class="container offset-sm-4 col-sm-4">
      <div class="form-group col-sm-12">
        <label for="pseudo">Pseudo à utiliser , par défaut c'est votre email qui est utilisé</label>
        <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="pseudo" required value="<?php echo($_SESSION['pseudo']) ?>">    
      </div>  
      <div class="col-sm-2">
        <button type="submit" class="btn btn-primary" id="pseudoBtn">Valider</button>
      </div>
    </div>
    <div class="col-sm-4" id="pseudoMsg"></div>
  </div>
  <hr>
  <h2 class="center col-sm-12">changement de mot de passe</h2>
  <div class="flex" style="align-items: center;">  
    <form onsubmit='return false;' class="my-2 my-lg-0 offset-sm-4 col-sm-4 formInscription">   
      <div class="form-group">
        <label for="inputEmail">Adresse Email</label>
        <input type="email" id="inputEmail" class="form-control" name="inputEmail" placeholder="Email" required value="<?php echo($_SESSION['id']) ?>" readonly>  
      </div>
      <div class="form-group">
        <label for="inputPassword">Mot de passe actuel</label>
        <input type="password" class="form-control" name="actualPassword" id="actualPassword" placeholder="Mot de passe actuel" required>
      </div>  
      <div class="form-group">
        <label for="newPassword1">nouveau mot de passe</label>
        <input type="password" class="form-control" name="newPassword1" id="newPassword1" placeholder="nouveau mot de passe" required>
      </div>  
      <div class="form-group">
        <label for="newPassword2">Confirmation du nouveau mot de passe</label>
        <input type="password" class="form-control" name="newPassword2" id="newPassword2" placeholder="nouveau mot de passe" required>
      </div>  
      <button type="submit" class="btn btn-primary" id="newPassBtn">Valider</button>    
    </form>
    <div class="col-sm-2" id="newPassMsg"></div>
  </div>
<?php $formInscription = ob_get_clean(); ?>
