<?php $nav=false ?>
<?php ob_start(); ?>
<div class="container col-sm-6">	
	<form action="index.php?action=login" method="post" class="form my-2 my-lg-0">
  		<div class="form-group row">   		
   			<label for="identifiant" class="col-sm-2 col-form-label">Email</label>
   			<div class="col-sm-10">
      			<input class="form-control mr-sm-2" type="text" name="pseudo" placeholder="Identifiant" id="identifiant" required>
    		</div>
  		</div>
  		<div class="form-group row">
    		<label for="password" class="col-sm-2 col-form-label">Password</label>
    		<div class="col-sm-10">
     			<input class="form-control mr-sm-2" type="password" name="pass" id="password" placeholder="Mot de passe" required>
    		</div>
  		</div>
  		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">valider</button>
	</form>
</div>
<?php $content = ob_get_clean(); ?>
