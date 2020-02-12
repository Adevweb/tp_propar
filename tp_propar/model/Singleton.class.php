<?php
/*
* Mysql database class - only one connection alowed
*/
class Singleton {
	private $_connection;
	private static $_instance; //instance unique
	private $_host = "localhost";
	private $_username = "root";
	private $_password = "";
	private $_dbname = "propar";
	
	/*
	Get an instance of the Database
	si une instance existe la methode va la retourner 
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$_instance) { 
			echo "create ....".PHP_EOL;
			self::$_instance = new Singleton();
		}{
			echo "Already created".PHP_EOL;
		}
		return self::$_instance;
	}
	
	
	// Constructeur
	private function __construct() {
		echo "__construct".PHP_EOL;
		try{
			
		$this->_connection = new PDO('mysql:host='.$this->_host.';dbname='.$this->_dbname, 
			$this->_username, $this->_password);
		} catch (PdoException $e) {

            echo 'Error : '.$e->getMessage();

        }
	}

	
	public function __destruct() {
		$this->_connection = null;
	}
	
	public function getConnection() {
		return $this->_connection;
	}
}