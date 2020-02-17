<?php
namespace Adrien\Meteo\Model;
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'Manager.php';
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
	public function addFavori($town1,$town2,$town3,$town4,$town5,$mail){
		$towns = $this->db->prepare('UPDATE identifiant SET favori1 = ?,favori2 = ?,favori3 = ?,favori4 = ?,favori5 = ? WHERE mail = ?');		
		$affectedLines = $towns->execute(array($town1,$town2,$town3,$town4,$town5,$mail));
		return $affectedLines;
	}
}