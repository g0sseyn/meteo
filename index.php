<?php
session_start();
require_once __DIR__ . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'controller.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'userController.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'postController.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'commentController.php';
try {
	if (isset($_GET['action'])) {   
		if ($_GET['action'] == 'home') {
	        meteo();	    
		}else if ($_GET['action']=='deco'){
			deco();
		}else if ($_GET['action']=='meteo'){
			meteo();
		}else if ($_GET['action']=='singlePost'){
			singlePost();
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
		}else if ($_GET['action']=='updatePost'){
			updatePost();
		}else if ($_GET['action']=='updateComment'){
			updateComment();
		}else if ($_GET['action']=='deleteComment'){
			deleteComment();
		}else if ($_GET['action']=='addComment'){
			addComment();
		}else if ($_GET['action']=='signalComment'){
			signalComment();
		}
	}	
	else {
	    meteo();	   
	}
}
catch(Exception $e) {
	echo 'Erreur : ' .$e->getMessage();
}
