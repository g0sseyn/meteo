<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'UserManager.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'CommentManager.php';
function meteo(){
	$searchTown=true;
	$postController = new \Adrien\Meteo\Controller\PostController();
	$posts=$postController->listPosts();
	require('view/frontend/nav.php');
	require('view/frontend/allPost.php');
	require('view/frontend/meteoComplete.php');
	require('view/frontend/template.php');
}
function singlePost(){
	if (!isset($_GET['id'])){
		throw new Exception('identifiant de news incorrect');
	}
	$searchTown=true;

	$postManager = new \Adrien\Meteo\Model\PostManager();
	$commentManager = new \Adrien\Meteo\Model\CommentManager();

	$post=$postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);  
	require('view/frontend/nav.php');
	require('view/frontend/singlePost.php');
	require('view/frontend/meteoComplete.php');
	require('view/frontend/template.php');
}
function admin(){
	if (!isAdmin()) {
        throw new Exception('Veuillez vous identifier');
    } 
	$searchTown=false;
	$postController = new \Adrien\Meteo\Controller\PostController();
	$posts=$postController->listPosts();
	$commentController = new \Adrien\Meteo\Controller\CommentController();
	$signaledComments=$commentController->getAllSignaledComments();
	require('view/frontend/nav.php');
	require('view/backend/admin.php');
	require('view/frontend/template.php');
}
function adminPost(){
	if (!isAdmin()) {
        throw new Exception('Veuillez vous identifier');
    }
    if (isset($_GET['id'])){
        $postManager = new \Adrien\Meteo\Model\PostManager();
        $commentManager = new \Adrien\Meteo\Model\CommentManager();
        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);        
    }
	$searchTown=false;
	require('view/frontend/nav.php');
	require('view/backend/adminPost.php');
	require('view/frontend/template.php');
}
function inscription(){
	$searchTown=false;	
	require('view/frontend/nav.php');
	require('view/frontend/formInscription.php');
	require('view/frontend/template.php');
}
function parametre(){
	$searchTown=false;	
	require('view/frontend/nav.php');
	require('view/frontend/parametre.php');
	require('view/frontend/template.php');
}
function recup(){
	$searchTown=false;	
	require('view/frontend/nav.php');
	require('view/frontend/recup.php');
	require('view/frontend/template.php');
}