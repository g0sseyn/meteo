<?php
session_start();
require_once('e:/wamp64/www/meteo/controller/controller.php');
require_once('e:/wamp64/www/meteo/controller/userController.php');
try {
	if (isset($_GET['action'])) {   
		if ($_GET['action'] == 'home') {
	        showHome();
	    }else if ($_GET['action']=='login'){
			verifyPass();
		}else if ($_GET['action']=='deco'){
			deco();
		}else if ($_GET['action']=='inscription'){
			inscription();
		}else if ($_GET['action']=='connection'){
			connection();
		}else if ($_GET['action']=='meteo'){
			meteo();
		}else if ($_GET['action']=='free'){
			meteo();
		}else if ($_GET['action']=='validInscription'){
			validInscription();
		}
	}	
	else {
	    showHome();	   
	}
}
catch(Exception $e) {
	echo 'Erreur : ' .$e->getMessage();
}
