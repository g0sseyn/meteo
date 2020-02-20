<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="robots" content="noindex">
    <link href="public/css/style.css" rel="stylesheet" /> 	
	<title>météo</title>
	<meta name="description" content="Site Météo dans le cadre d'un projet OpenClassRooms" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>	
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous">			  	
	</script>
    </head>
<body>
	<?php if (isset($menuNav)) {
		echo $menuNav;
	} ?>
	<?php if (isset($meteoComplete)) {
		echo $meteoComplete;
	} ?>	
	<?php if (isset($form)) {
		echo $form;
	} ?>
	<?php if (isset($formInscription)) {
		echo $formInscription;
	} ?>
	<?php if (isset($adminContent)) {
		echo $adminContent;
	} ?>
	
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="public/js/script.js"></script>	
<script src="public/js/tinymce.js"></script>
<script src="public/js/apicall.js"></script>
<script src="public/js/titleday.js"></script>
<script src="public/js/meteocompletefivedays.js"></script>
<script src="public/js/meteocomplete.js"></script>
<script src="public/js/complementation.js"></script>	
<script src="public/js/meteoScript.js"></script>
</body>
</html>