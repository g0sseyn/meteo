<?php
require_once('model/UserManager.php');

function showForm(){
    require('view/form.php');
    require('view/formTown.php');
    require('view/template.php');
}

function showHome(){
	require('view/meteo.php');
	require('view/connection.php');
	require('view/formInscription.php');		
	require('view/formTown.php');	
	require('view/form.php');
	require('view/template.php');
	
}
function inscription(){
	require('view/formInscription.php');
	require('view/template.php');
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