<?php
require_once 'employe_class.php';
require_once 'Singleton.class.php';

class Apprenti extends Employe {
    //Herite des variables NOM et PRENOM de la classe abstraite Employe
    private $_type = 'APPRENTI'; //String
    private $_login; //String
    private $_mdp; //String
    private const MAX_OPE = 1;


    public function __construct($nom, $prenom, $login, $mdp) {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_login = $login;
        $this->_mdp = $mdp;
    }

    public static function createUser($nom, $prenom, $fonction, $login, $mdp) : void {

        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $db->query("INSERT INTO utilisateur (nom, prenom, type, login, mdp) VALUES ('$nom', '$prenom', '$fonction', '$login', '$mdp')");

    }
    
    public static function getUserById ($id) {
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $result = $db->query("SELECT * FROM utilisateur WHERE id_user = $id ");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function addOperation() 
    {
        
    }
    public function endOperation()
    {
        
    }
}

?>