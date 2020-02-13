<?php
require_once 'employe_class.php';
require_once 'Singleton.class.php';

class Senior extends Employe {
    //Herite des variables NOM et PRENOM de la classe abstraite Employe
    private $_type = 'SENIOR'; //String
    private $_login; //String
    private $_mdp; //String
    private const MAX_OPE = 3;


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