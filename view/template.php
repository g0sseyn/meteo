<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="robots" content="noindex">
    <link href="style.css" rel="stylesheet" /> 	
	<title>météo</title>
	<meta name="description" content="Site Météo dans le cadre d'un projet OpenClassRooms" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
	<?php if (isset($meteoComplete)) {
		echo $meteoComplete;
	} ?>	
	<?php if (isset($form)) {
		echo $form;
	} ?>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous">			  	
	</script>
<script src="script.js"></script>	
<script src="meteoScript.js"></script>
</body>
</html>