<?php
require_once('model/UserManager.php');
function isIdentify(){
    if (isset($_SESSION['pseudo'])){
        return true;
    }
    return false;
}
function verifyPass(){
    $userManager = new UserManager();
    $userInfo = $userManager->userInfo($_POST['identifiant']);
    /*$isPasswordCorrect = password_verify($_POST['pass'], $userInfo['pass']);*/
   
	if ($_POST['password']==$userInfo['password']) { 
	   		$_SESSION['pseudo'] = $userInfo['identifiant'];	
	   		meteo();		
	    }   
	           
	else {
	    	throw new Exception('Mauvais identifiant ou mot de passe !');
	}
}
function deco(){
	session_destroy();
    header('Location: index.php');
}
function validInscription(){

	if (empty($_POST['inputEmail'])||empty($_POST['inputPassword'])) {
		throw new Exception('Tous les champs ne sont pas remplis !');		
	}
	$userManager = new UserManager();	
	if ($userManager->verifyMail($_POST['inputEmail'])) {
		throw new Exception('l\'Email est déjà existant');	
	}
	$affectedLines = $userManager->addUser($_POST['inputEmail'],$_POST['inputPassword']);
	if ($affectedLines === false) {
        throw new Exception('Impossible de vous ajouter');
    }    
    meteo();
    
}
