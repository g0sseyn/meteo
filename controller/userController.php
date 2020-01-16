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
    $userInfo = $userManager->userInfo($_POST['pseudo']);
    /*$isPasswordCorrect = password_verify($_POST['pass'], $userInfo['pass']);*/
   
	if ($_POST['pass']==$userInfo['password']) { 
	   		$_SESSION['pseudo'] = $userInfo['identifiant'];	
	   		header('Location: index.php?action=meteo');		
	    }   
	           
	else {
	    	throw new Exception('Mauvais identifiant ou mot de passe !');
	}
}
function deco(){
	session_destroy();
    header('Location: index.php');
}
