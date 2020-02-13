<?php
require_once('model/PostManager.php');

function listPosts(){
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    return $posts;
}
function deletePost(){
    if (!isAdmin()) {
        throw new Exception('Veuillez vous identifier');
    }
    if (isset($_GET['id']) && $_GET['id'] > 0) {
	$postManager = new PostManager();	
	$postManager->deletePost($_GET['id']);
    }
	header('Location: index.php?action=admin');
}