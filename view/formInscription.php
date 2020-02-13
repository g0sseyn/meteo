
<?php ob_start(); ?>

	<form onsubmit='return false;' class="my-2 my-lg-0 col-sm-offset-4 col-sm-4 container formInscription">		
		<div class="form-group">
    	<label for="inputEmai1">Adresse Email</label>
    	<input type="email" id="inputEmail" class="form-control" name="inputEmail" aria-describedby="emailHelp" placeholder="Email" required>   

  	</div>
  	<div class="form-group">
    	<label for="inputPassword">Mot de passe</label>
    	<input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Mot de passe" required>
  	</div>    	
    <button type="submit" class="btn btn-primary formInscriptionBtn">Valider</button>
    <div id="error"></div>	
    <input type="text" name="hidden" id="hidden" style="display: none">	
    
	</form>

<?php $formInscription = ob_get_clean(); ?>
