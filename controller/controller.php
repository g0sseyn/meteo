<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'UserManager.php';
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
function adminPost(){
	$admin=true;
	require('view/nav.php');
	require('view/adminPost.php');
	require('view/template.php');
}
function inscription(){
	require('view/formInscription.php');
	require('view/template.php');
}