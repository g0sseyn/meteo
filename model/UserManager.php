<?php
require_once('model/Manager.php');
class UserManager extends Manager
{
	public function userInfo($email){
		$req = $this->db->prepare('SELECT * FROM identifiant WHERE mail = ?');
    	$req->execute(array($email));
    	$infos = $req->fetch();
    	return $infos;
	}
	public function addUser2($lastName,$firstName,$identifiant,$email,$password){
		$user = $this->db->prepare('INSERT INTO identifiant(lastname,firstname,identifiant,mail,password) VALUES (:lastName,:firstName,:identifiant,:email,:password)');
		$affectedLines = $user->execute(array('lastName'=>$lastName,'firstName'=>$firstName,'identifiant'=>$identifiant,'email'=>$email,'password'=>$password));

		return $affectedLines;
	}
	public function addUser($email,$password){
		$user = $this->db->prepare('INSERT INTO identifiant(mail,password) VALUES (:email,:password)');
		$affectedLines = $user->execute(array('email'=>$email,'password'=>$password));

		return $affectedLines;
	}
	public function verifyMail($mail){
		$req = $this->db->prepare('SELECT * FROM identifiant WHERE mail = ?');
		$req->execute(array($mail));
		$infos = $req->fetch();

		return $infos;
	}
}