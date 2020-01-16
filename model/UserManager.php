<?php
require_once('model/Manager.php');
class UserManager extends Manager
{
	public function userInfo($pseudo){
		$req = $this->db->prepare('SELECT * FROM identifiant WHERE identifiant = ?');
    	$req->execute(array($pseudo));
    	$infos = $req->fetch();
    	return $infos;
	}
}