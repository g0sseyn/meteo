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
	public function addUser($email,$password){
		$req = $this->db->prepare('INSERT INTO identifiant(mail,password,identifiant) VALUES (:email,:password,:identifiant)');
		$affectedLines = $req->execute(array('email'=>$email,'password'=>$password,'identifiant'=>$email));

		return $affectedLines;
	}
	public function verifyMail($mail){
		$req = $this->db->prepare('SELECT * FROM identifiant WHERE mail = ?');
		$req->execute(array($mail));
		$infos = $req->fetch();

		return $infos;
	}
	public function addFavori($town1,$town2,$town3,$town4,$town5,$mail){
		$req = $this->db->prepare('UPDATE identifiant SET favori1 = ?,favori2 = ?,favori3 = ?,favori4 = ?,favori5 = ? WHERE mail = ?');		
		$affectedLines = $req->execute(array($town1,$town2,$town3,$town4,$town5,$mail));
		return $affectedLines;
	}
	public function addTown($town,$mail){
		$req = $this->db->prepare('UPDATE identifiant SET defautTown = ? WHERE mail = ?');		
		$affectedLines = $req->execute(array($town,$mail));
		return $affectedLines;
	}
	public function updatePass($id,$pass){
		$req= $this->db->prepare('UPDATE identifiant SET password = ? WHERE mail = ?');
		$affectedLines = $req->execute(array($pass,$id));
		return $affectedLines;
	}
	public function addPseudo($pseudo,$mail){
		$req= $this->db->prepare('UPDATE identifiant SET identifiant = ? WHERE mail = ?');
		$affectedLines = $req->execute(array($pseudo,$mail));
		return $affectedLines;
	}
}