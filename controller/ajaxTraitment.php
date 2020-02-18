<?php
session_start();
if (!empty($_POST['mail'])){
  	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'userController.php';
    $response=validMail($_POST['mail'],$_POST['pass'],$_POST['hidden']);
    echo ($response);
}; 
if (!empty($_POST['email'])){
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'userController.php';
	$rep=verifyPass();
	echo ($rep);
};
if (!empty($_GET['town'])) {
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'userController.php';
	$rep=addFav($_GET['town']);
	echo ($rep);
}
if (!empty($_GET['fav'])) {
	require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'userController.php';
	$rep=giveFav();
	if (empty($rep)) {
		return;	
	}
	echo implode('|', $rep);
}
if (isset($_GET['s'])){
	$data = json_decode(file_get_contents('../city.json'));
	$dataLen = count($data);
	$results = array();
	for ($i = 0 ; $i < $dataLen && count($results) < 30 ; $i++) {
		if (stripos($data[$i]->name, $_GET['s']) === 0) {
			array_push($results, $data[$i]->name);
		    array_push($results, $data[$i]->stat->population);
		    array_push($results, $data[$i]->id); 
		}
	}
	array_push($results,'');
	echo implode('|', $results);
}