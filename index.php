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
			$userController = new \Adrien\Meteo\Controller\UserController();
			$userController->deco();
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
			$postController = new \Adrien\Meteo\Controller\PostController();
			$postController->addPost();
		}else if ($_GET['action']=='deletePost'){
			$postController = new \Adrien\Meteo\Controller\PostController();
			$postController->deletePost();
		}else if ($_GET['action']=='updatePost'){
			$postController = new \Adrien\Meteo\Controller\PostController();
			$postController->updatePost();
		}else if ($_GET['action']=='updateComment'){
			$commentController = new \Adrien\Meteo\Controller\CommentController();
			$commentController->updateComment();
		}else if ($_GET['action']=='deleteComment'){
			$commentController = new \Adrien\Meteo\Controller\CommentController();
			$commentController->deleteComment();
		}else if ($_GET['action']=='addComment'){
			$commentController = new \Adrien\Meteo\Controller\CommentController();
			$commentController->addComment();
		}else if ($_GET['action']=='signalComment'){
			$commentController = new \Adrien\Meteo\Controller\CommentController();
			$commentController->signalComment();
		}else if ($_GET['action']=='parametre'){
			parametre();
		}else if ($_GET['action']=='recup'){
			recup();
		}
	}	
	else {
	    meteo();	   
	}
}
catch(Exception $e) {
	echo 'Erreur : ' .$e->getMessage();
}
