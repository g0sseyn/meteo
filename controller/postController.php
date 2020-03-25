<?php
namespace Adrien\Meteo\Controller;
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'PostManager.php';

class PostController {

    public function listPosts(){
        $postManager = new \Adrien\Meteo\Model\PostManager();
        $posts = $postManager->getPosts();
        return $posts;
    }
    public function deletePost(){
        if (!isAdmin()) {
            throw new Exception('Veuillez vous identifier');
        }
        if (isset($_GET['id']) && $_GET['id'] > 0) {
    	$postManager = new \Adrien\Meteo\Model\PostManager();	
    	$postManager->deletePost($_GET['id']);
        }
    	header('Location: index.php?action=admin');
    }
    public function addPost(){
        if (!isAdmin()) {
            throw new Exception('Veuillez vous identifier');
        }
        if (empty($_POST['title']) || empty($_POST['addContent']) || empty($_POST['resumeContent'])) {
            throw new Exception('Tous les champs ne sont pas remplis !');
        }
        $postManager = new \Adrien\Meteo\Model\PostManager();
        $affectedLines = $postManager->addPost($_POST['title'], $_POST['addContent'],$_POST['imgURL'],$_POST['resumeContent']);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter l\'article !');
        }    
        header('Location: index.php?action=admin');    
    }
    public function updatePost(){
        if (!isAdmin()) {
            throw new Exception('Veuillez vous identifier');
        }
        if (isset($_GET['id']) && $_GET['id'] > 0) {
           $postManager = new \Adrien\Meteo\Model\PostManager();
           $postManager->updatePost($_GET['id'],$_POST['title'],$_POST['addContent'],$_POST['imgURL'],$_POST['resumeContent']);
        }
        header('Location: index.php?action=admin');
    }
}