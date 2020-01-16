<?php
session_start();
require('controller/controller.php');
require('controller/userController.php');
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
		}else if (isset($_GET['s'])){
			require('view/test.php');
		}
	}
	
	else {
	    showHome();	   
	}
}
catch(Exception $e) {
	echo 'Erreur : ' .$e->getMessage();
}
