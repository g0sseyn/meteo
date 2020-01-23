
<?php
    /*
	$data = json_decode(file_get_contents('current.city.list.json')); // Récupération de la liste complète des villes;
	function comparer($a, $b) {
		return strcmp($a->name, $b->name);
	}
	usort($data,'comparer'); // On trie les villes dans l'ordre alphabétique	
	$data2 = json_encode($data);
	file_put_contents('city.json', $data2); // On crée un nouveau fichier trier */


	$data = json_decode(file_get_contents('city.json'));
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
?>
<?php ob_start(); ?>
<div class="meteoForm">
	<p id="meteoFormTitle">De quel ville souhaitez-vous connaître la météo ? </p>
	<input type="text" id="search" name="search" autocomplete="off" required list="results">
	<datalist id="results">		
	</datalist>
	<button class="townBtn btn btn-primary">valider</button>


</div>
<?php $formTown = ob_get_clean(); ?>