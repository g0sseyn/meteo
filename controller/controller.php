<?php
require_once('model/UserManager.php');

function showForm(){
    require('view/form.php');
    require('view/formTown.php');
    require('view/template.php');
}

function showHome(){
	if(isIdentify()){
		require('view/form.php');
		require('view/formTown.php');
		require('view/template.php');
	}
	else showForm();
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