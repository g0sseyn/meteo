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
	public function addUser($lastName,$firstName,$identifiant,$email,$password){
		$user = $this->db->prepare('INSERT INTO identifiant(lastname,firstname,identifiant,mail,password) VALUES (:lastName,:firstName,:identifiant,:email,:password)');
		$affectedLines = $user->execute(array('lastName'=>$lastName,'firstName'=>$firstName,'identifiant'=>$identifiant,'email'=>$email,'password'=>$password));

		return $affectedLines;
	}
	public function verifyMail($mail){
		$req = $this->db->prepare('SELECT * FROM identifiant WHERE mail = ?');
		$req->execute(array($mail));
		$infos = $req->fetch();

		return $infos;
	}
}