<?php
session_start();
require_once('e:/wamp64/www/meteo/controller/controller.php');
require_once('e:/wamp64/www/meteo/controller/userController.php');
require_once('e:/wamp64/www/meteo/controller/postController.php');
try {
	if (isset($_GET['action'])) {   
		if ($_GET['action'] == 'home') {
	        meteo();	    
		}else if ($_GET['action']=='deco'){
			deco();
		}else if ($_GET['action']=='meteo'){
			meteo();
		}else if ($_GET['action']=='inscription'){
			inscription();
		}else if ($_GET['action']=='admin'){
			admin();			
		}else if ($_GET['action']=='adminPost'){
			adminPost();
		}else if ($_GET['action']=='addPost'){
			addPost();
		}else if ($_GET['action']=='deletePost'){
			deletePost();
		}
	}	
	else {
	    meteo();	   
	}
}
catch(Exception $e) {
	echo 'Erreur : ' .$e->getMessage();
}
