<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'UserManager.php';
function isIdentify(){
    if (isset($_SESSION['id'])){
        return true;
    }
    return false;
}
function isAdmin(){
	if (isset($_SESSION['is_admin'])){
        return true;
    }
    return false;
}
function verifyPass(){
    $userManager = new UserManager();
    $userInfo = $userManager->userInfo($_POST['email']);
    $isPasswordCorrect = password_verify($_POST['password'], $userInfo['password']);
    if ($userInfo['is_admin']==1) {
    	$_SESSION['is_admin']=$userInfo['is_admin'];
    }   
	if ($isPasswordCorrect) { 
	   		$_SESSION['id'] = $userInfo['mail'];	
	   		return 'ok';		
	    }   
	           
	else {
	    	return 'false';
	}
}
function addFav($town){
	if (!isIdentify()) {
		throw new Exception('il faut s\'identifier pour faire cela');		
	}
	$userManager = new UserManager();
	$userInfo = $userManager->userInfo($_SESSION['id']);
	if ($town==$userInfo['favori1']||$town==$userInfo['favori2']||$town==$userInfo['favori3']||$town==$userInfo['favori4']||$town==$userInfo['favori5']) {
		return 'already';
	}
	$rep=$userManager->addFavori($town,$userInfo['favori1'],$userInfo['favori2'],$userInfo['favori3'],$userInfo['favori4'],$_SESSION['id']);
	if ($rep) {
		return 'ok';
	}else {
		return 'wrong' ;
	}

}
function deco(){
	session_destroy();
    header('Location: index.php?action=meteo');
}
function validMail($email,$pass,$hidden){	
	if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $email)){
        return 'mail non valide';
    }
    if (!empty($hidden)) {
    	return 'error';
    }
	$userManager = new UserManager();	
	if ($userManager->verifyMail($email)) {
		return 'mail existant';	
	}
	$affectedLines = $userManager->addUser($email,password_hash($pass, PASSWORD_DEFAULT)); 
	if ($affectedLines === false) {
        return 'Impossible de vous ajouter';
    }
    return 'ok';	
}
function giveFav(){
	if (!isset($_SESSION['id'])) {
		return;
	}
	$userManager = new UserManager();
    $userInfo = $userManager->userInfo($_SESSION['id']);
    $fav=array();
    for ($i=1; $i < 6 ; $i++) { 
    	if (isset($userInfo['favori'.$i])) {
    		array_push($fav, $userInfo['favori'.$i]);
    	}
    }
    return $fav;
}