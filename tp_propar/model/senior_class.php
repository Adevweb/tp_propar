<?php
require_once 'employe_class.php';

class Senior extends Employe {
    //Herite des variables NOM et PRENOM de la classe abstraite Employe
    private $_fonction = 'SENIOR'; //String
    private $_login; //String
    private $_mdp; //String

    public function __construct($nom, $prenom, $login, $mdp) {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_login = $login;
        $this->_mdp = $mdp;
    }

    public function addOperation()
    {
        
    }
    public function endOperation()
    {
        
    }
}
?>