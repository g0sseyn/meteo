<?php
require_once('e:/wamp64/www/meteo/model/UserManager.php');
function isIdentify(){
    if (isset($_SESSION['id'])){
        return true;
    }
    return false;
}
function verifyPass(){
    $userManager = new UserManager();
    $userInfo = $userManager->userInfo($_POST['email']);
    /*$isPasswordCorrect = password_verify($_POST['pass'], $userInfo['pass']);*/
   
	if ($_POST['password']==$userInfo['password']) { 
	   		$_SESSION['id'] = $userInfo['mail'];	
	   		return 'ok';		
	    }   
	           
	else {
	    	return 'false';
	}
}
function verifyPassOld(){
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
function validMail($email,$pass){
	if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $email)){
        return 'mail non valide';
    }
	$userManager = new UserManager();	
	if ($userManager->verifyMail($email)) {
		return 'mail existant';	
	}
	$affectedLines = $userManager->addUser($email,$pass); 
	if ($affectedLines === false) {
        return 'Impossible de vous ajouter';
    } 
    $_SESSION['id'] = $email;
    return 'ok';	
}