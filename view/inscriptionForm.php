<?php if(isset($inscrit)&&($inscrit=='oui')){ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="robots" content="noindex">
    <link href="style.css" rel="stylesheet" /> 
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous">			  	
	</script>
	<title>météo</title>
	<meta name="description" content="Site Météo dans le cadre d'un projet OpenClassRooms" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<form action="index.php?action=option" method="post" class="my-2 my-lg-0 col-sm-offset-4 col-sm-4 container">
		<div class="row">
			<legend class="col-form-label col-sm-2 pt-0">temperature:</legend>
			<div class="col-sm-10">
				<div class="form-check form-check-inline">
			  		<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
			  		<label class="form-check-label" for="inlineRadio1">en C°</label>
				</div>
				<div class="form-check form-check-inline">
				    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
				    <label class="form-check-label" for="inlineRadio2">en F°</label>
				</div>
				<div class="form-check form-check-inline">
				    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
				    <label class="form-check-label" for="inlineRadio3">Ne pas afficher</label>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Valider</button>
	</form>

<script src="script.js"></script>	
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
</body>
</html>
	
<?php }else{ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="robots" content="noindex">
    <link href="style.css" rel="stylesheet" /> 
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous">			  	
	</script>
	<title>météo</title>
	<meta name="description" content="Site Météo dans le cadre d'un projet OpenClassRooms" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<form action="index.php?action=inscription" method="post" class="my-2 my-lg-0 col-sm-offset-4 col-sm-4 container">
		<div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputLastName">Nom</label>
		      <input type="text" class="form-control" name="inputLastName" placeholder="Nom" required>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputFirstName">Prénom</label>
		      <input type="text" class="form-control" name="inputFirstName" placeholder="Prénom" required>
		    </div>
  		</div>	
  		<div class="form-group">
    		<label for="inputIdentifiant">Identifiant</label>
    		<input type="text" class="form-control" name="inputIdentifiant" aria-describedby="emailHelp" placeholder="Identifiant" required>    
  		</div>
		<div class="form-group">
    		<label for="inputEmai1">Adresse Email</label>
    		<input type="email" class="form-control" name="inputEmail" aria-describedby="emailHelp" placeholder="Email" required>    
  		</div>
  		<div class="form-group">
    		<label for="inputPassword">Mot de passe</label>
    		<input type="password" class="form-control" name="inputPassword" placeholder="Mot de passe" required>
  		</div>    	
    	<button type="submit" class="btn btn-primary">Valider</button>		
	</form>

<script src="script.js"></script>	
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
</body>
</html>
<?php } ?>