<?php ob_start(); ?>	
		<nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
			<a class="navbar-brand" href="#">Meteo</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" 	aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
	    		<span class="navbar-toggler-icon"></span>
	  		</button>  		
	  			<div class="collapse navbar-collapse" id="navbarTogglerDemo03">

				  	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					    <li class="nav-item ">
					      <a class="nav-link" href="#">Link</a>
					    </li>
					    <li class="nav-item">
					      <a class="nav-link" href="#">Link</a>
					    </li>
					    <li class="nav-item">
					      <a class="nav-link" href="#">Link</a>
					    </li>
					    <li class="nav-item">
					      <a class="nav-link" href="#">Link</a>
					    </li>
				  	</ul>
				  	<?php if (isIdentify()){ ?>
				  		<form action="index.php?action=deco" method="post">
				  			<button type="submit" class="btn btn-danger">se déconnecter</button>
				  		</form>
				  	<?php } else { ?>
					<form action="index.php?action=login" method="post" class="form-inline my-2 my-lg-0">
		     			<input class="form-control mr-sm-2" type="text" name="pseudo" placeholder="Identifiant" required>
		     			<input class="form-control mr-sm-2" type="password" name="pass" placeholder="Mot de passe" required>
		      			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">valider</button>
		    		</form>
		    		<?php }?>
				</div>
		</nav>
<?php $menuNav = ob_get_clean(); ?>