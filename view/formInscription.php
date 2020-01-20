<?php ob_start(); ?>
	<form action="index.php?action=validInscription" method="post" class="my-2 my-lg-0 col-sm-offset-4 col-sm-4 container formInscription">		
		<div class="form-group">
    		<label for="inputEmai1">Adresse Email</label>
    		<input type="email" id="inputEmail" class="form-control" name="inputEmail" aria-describedby="emailHelp" placeholder="Email" required>    
  		</div>
  		<div class="form-group">
    		<label for="inputPassword">Mot de passe</label>
    		<input type="password" class="form-control" name="inputPassword" placeholder="Mot de passe" required>
  		</div>    	
    	<button type="submit" class="btn btn-primary formInscriptionBtn">Valider</button>		
	</form>
<?php $formInscription = ob_get_clean(); ?>
