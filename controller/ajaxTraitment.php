<?php
session_start();
$res='';
$rep='';
if (!empty($_POST['mail'])){
  	require_once('e:/wamp64/www/meteo/controller/userController.php');
    $res=validMail($_POST['mail'],$_POST['pass']);
    echo ($res);
}; 
if (!empty($_POST['email'])){
	require_once('e:/wamp64/www/meteo/controller/userController.php');
	$rep=verifyPass();
	echo ($rep);
};
if (!empty($_GET['town'])) {
	require_once('e:/wamp64/www/meteo/controller/userController.php');
	$rep=addFav($_GET['town']);
	echo ($rep);
}
if (!empty($_GET['fav'])) {
	require_once('e:/wamp64/www/meteo/controller/userController.php');
	$rep=giveFav();
	if (empty($rep)) {
		return;	
	}
	echo implode('|', $rep);
}
    /*
	$data = json_decode(file_get_contents('current.city.list.json')); // Récupération de la liste complète des villes;
	function comparer($a, $b) {
		return strcmp($a->name, $b->name);
	}
	usort($data,'comparer'); // On trie les villes dans l'ordre alphabétique	
	$data2 = json_encode($data);
	file_put_contents('city.json', $data2); // On crée un nouveau fichier trier */


	$data = json_decode(file_get_contents('../city.json'));
	$dataLen = count($data);
	$results = array(); // Le tableau où seront stockés les résultats de la recherche
	
	// La boucle ci-dessous parcourt tout le tableau $data, jusqu'à un maximum de 10 résultats
	if (isset($_GET['s'])){
		for ($i = 0 ; $i < $dataLen && count($results) < 30 ; $i++) {
		    if (stripos($data[$i]->name, $_GET['s']) === 0) { // Si la valeur commence par les mêmes caractères que la recherche				
		        array_push($results, $data[$i]->name);
		        array_push($results, $data[$i]->stat->population);
		        array_push($results, $data[$i]->id); 
		    }
		}
		array_push($results,'');
	}

	echo implode('|', $results); // Et on affiche les résultats séparés par une barre verticale |
