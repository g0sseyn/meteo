<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'UserManager.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'CommentManager.php';
function meteo(){
	$admin=false;
	$posts=listPosts();
	require('view/nav.php');
	require('view/allPost.php');
	require('view/meteoComplete.php');
	require('view/template.php');
}
function singlePost(){
	if (!isset($_GET['id'])){
		throw new Exception('identifiant de news incorrect');
	}
	$admin=false;

	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$post=$postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);  
	require('view/nav.php');
	require('view/singlePost.php');
	require('view/meteoComplete.php');
	require('view/template.php');
}
function admin(){
	if (!isAdmin()) {
        throw new Exception('Veuillez vous identifier');
    } 
	$admin=true;
	$posts=listPosts();
	$signaledComments=getAllSignaledComments();
	require('view/nav.php');
	require('view/admin.php');
	require('view/template.php');
}
function adminPost(){
	if (!isAdmin()) {
        throw new Exception('Veuillez vous identifier');
    }
    if (isset($_GET['id'])){
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);        
    }
	$admin=true;
	require('view/nav.php');
	require('view/adminPost.php');
	require('view/template.php');
}
function inscription(){
	$admin=false;
	require('view/formInscription.php');
	require('view/template.php');
}