<?php
require_once('model/UserManager.php');

function showForm(){
    
    require('view/form.php');
    require('view/template.php');
}

function showHome(){
	if(isIdentify()){
		require('view/formTown.php');
		require('view/form.php');
		require('view/template.php');
	}
	else showForm();
}
function inscription(){
	if (isset($_POST['inputLastName'])&&isset($_POST['inputFirstName'])&&isset($_POST['inputIdentifiant'])&&isset($_POST['inputEmail'])&&isset($_POST['inputPassword'])) {
		$inscrit='oui';		
	}
	require('view/InscriptionForm.php');
	
}
function connection(){
	require('view/connection.php');
	require('view/template.php');
}
function meteo(){
	require('view/formTown.php');
	require('view/meteo.php');
	require('view/template.php');
}