<?php
namespace Adrien\Meteo\Model;
class Manager
{
	protected $db;
	protected function dbconnect() {
		if(!$this->db) {
			$this->db =  new \PDO('mysql:host=localhost;dbname=meteo;charset=utf8', 'root', '');
		}
	
	}
	public function __construct(){
		if(!$this->db) {
			$this->db =  new \PDO('mysql:host=localhost;dbname=meteo;charset=utf8', 'root', '');
		}
	}
}