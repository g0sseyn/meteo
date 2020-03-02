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
    $userManager = new \Adrien\Meteo\Model\UserManager();
    $userInfo = $userManager->userInfo($_POST['email']);
    $isPasswordCorrect = password_verify($_POST['password'], $userInfo['password']);
	if ($isPasswordCorrect) { 
		if ($userInfo['is_admin']==1) {
    		$_SESSION['is_admin']=$userInfo['is_admin'];
    	} 
	   	$_SESSION['id'] = $userInfo['mail'];
	   	$_SESSION['defautTown']	= $userInfo['defautTown'];
	   	if (isset($userInfo['identifiant'])) {
	   		$_SESSION['pseudo']	= $userInfo['identifiant'];
	   	}else {
	   		$_SESSION['pseudo']	= $userInfo['mail'];
	   	}
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
	$userManager = new \Adrien\Meteo\Model\UserManager();
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
    header('Location: index.html');
}
function validMail($email,$pass,$hidden){	
	if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $email)){
        return 'mail non valide';
    }
    if (!empty($hidden)) {
    	return 'error';
    }
	$userManager = new \Adrien\Meteo\Model\UserManager();	
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
	$userManager = new \Adrien\Meteo\Model\UserManager();
    $userInfo = $userManager->userInfo($_SESSION['id']);
    $fav=array();
    for ($i=1; $i < 6 ; $i++) { 
    	if (isset($userInfo['favori'.$i])) {
    		array_push($fav, $userInfo['favori'.$i]);
    	}
    }
    return $fav;
}
function defautTown($town){
	if (!isIdentify()) {
		throw new Exception('il faut s\'identifier pour faire cela');		
	}
	$userManager = new \Adrien\Meteo\Model\UserManager();
	$rep = $userManager->addTown($town,$_SESSION['id']);
	if ($rep) {
		$_SESSION['defautTown']=$town;
		return 'ok';
	}else return 'wrong';
}
function updatePass(){
	if (!isIdentify()) {
		throw new Exception('il faut s\'identifier pour faire cela');		
	}
	if ((!isset($_POST['identifiant']))||(!isset($_POST['password']))) {
		throw new Exception("erreur : veuillez recommencez");		
	}
	$userManager = new \Adrien\Meteo\Model\UserManager();
	$rep = $userManager->updatePass($_POST['identifiant'],password_hash($_POST['password'], PASSWORD_DEFAULT));
	if ($rep) {
		return 'ok';
	}else return 'wrong';
}
function addPseudo(){
	if (!isIdentify()) {
		throw new Exception('il faut s\'identifier pour faire cela');		
	}
	if (!isset($_GET['pseudo'])) {
		throw new Exception("erreur : veuillez recommencez");		
	}
	$userManager = new \Adrien\Meteo\Model\UserManager();
	$rep=$userManager->addPseudo($_GET['pseudo'],$_SESSION['id']);
	if ($rep) {
		$_SESSION['pseudo']=$_GET['pseudo'];
		return 'ok';
	}else return 'wrong';
}
function recupMail($mail){
	$newPass=generePassword(10);
	$userManager = new \Adrien\Meteo\Model\UserManager();
    $userInfo = $userManager->userInfo($mail);
    if ($userInfo) {
    	$rep=$userManager->updatePass($mail,password_hash($newPass, PASSWORD_DEFAULT));
    	if ($rep) {
    		$mailRecup=mail($mail,'recuperation de mdp', 'votre nouveau mdp : '.$newPass);
    		if ($mailRecup) {
    			return 'oui';
    		}else return 'non';
    	}else return 'non';
    }else return 'non';

}
function generePassword($size){	
    $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
    $password='';
    for($i=0;$i<$size;$i++){
        $password .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
    }		
    return $password;
}