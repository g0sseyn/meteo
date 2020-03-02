<?php ob_start(); ?>
	<form onsubmit='return false;' class="my-2 my-lg-0 col-sm-offset-4 col-sm-4 container formInscription">		
		<div class="form-group">
    		<label for="recupEmail">Adresse Email</label>
    		<input type="email" id="recupEmail" class="form-control" name="recupEmail" placeholder="Email" required>
  		</div>   	
    	<button type="submit" class="btn btn-primary recupBtn">Valider</button>
    	<div id="error"></div>    
	</form>
<?php $form = ob_get_clean(); ?>