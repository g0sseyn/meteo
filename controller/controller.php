<?php
require_once('e:/wamp64/www/meteo/model/UserManager.php');

function showForm(){
    require('view/form.php');
    require('view/formTown.php');
    require('view/template.php');
}

function showHome(){
	if (isIdentify()) {
		require('view/test.php');
	}else{
		require('view/formInscription.php');
		require('view/meteo.php');
		require('view/connection.php');		
		require('view/formTown.php');	
		require('view/form.php');
		require('view/template.php');
	}
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
	$admin=false;
	$posts=listPosts();
	require('view/nav.php');
	require('view/meteoComplete.php');
	require('view/template.php');
}
function admin(){
	$admin=true;
	$posts=listPosts();
	require('view/nav.php');
	require('view/admin.php');
	require('view/template.php');
}