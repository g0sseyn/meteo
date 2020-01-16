<?php ob_start(); ?>	
	<div id="meteo" class=<?php if (isset($_POST['id'])) {echo($_POST['id']);}
	else echo '3119841' ?>></div>
	<div id="infoMeteo">
		<div id="cloud"></div>
		<div id="temperature"></div>
		<div id="humidity"></div>
		<div id="pressure"></div>
		<div id="sunrise"></div>
		<div id="sunset"></div>
		<div id="cloudiness"></div>
		<div id="windspeed"></div>
		<div id="winddeg"></div>
		<div id="coord"></div>
	</div>
<?php $meteo = ob_get_clean(); ?>