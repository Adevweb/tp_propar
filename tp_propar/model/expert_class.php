<?php 
require_once 'employe_class.php';
require_once 'Singleton.class.php';
require_once 'operation_class.php';

class Expert extends Employe {
    //Herite des variables NOM et PRENOM de la classe abstraite Employe
    private $_type = 'EXPERT'; //String
    private $_login; //String
    private $_mdp; //String
    private $_nbOpe; //int
    private $_id;
    private $_opMax = 5;

    public function __construct($nom, $prenom, $login, $mdp) {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_login = $login;
        $this->_mdp = $mdp;
    }

    public static function createUser($nom, $prenom, $type, $login, $mdp) : void {

        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $db->query("INSERT INTO utilisateur (nom, prenom, type, login, mdp) VALUES ('$nom', '$prenom', '$type', '$login', '$mdp')");

    }

    public static function getUserById ($id) : object {
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $result = $db->query("SELECT * FROM utilisateur WHERE id_user = $id ");
        $result = $result->fetch(PDO::FETCH_ASSOC);


        $user = new Expert ($result['nom'], $result['prenom'], $result['login'], $result['mdp']);
        $user->set_nbOpe($result['nbOpe']);
        return $user; // Objet
    }

    public static function createClient($nom, $prenom, $user_id /*Recupère le $POST */) {
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
       //RECUPERER USER ID 
        $db->query("INSERT INTO client (nom, prenom, id_user) VALUES ('$nom', '$prenom', '$user_id')");
    }
    
    public static function updateUser ($id_user, $type) {
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $db->query("UPDATE utilisateur SET type = '$type' WHERE id_user = $id_user");
    }


    public static function addOperation($description, $cout, $id_client, $id_assignation, $id_user_curr) {
        $ope = new Operation($cout, $description, $id_client, $id_assignation);
        $cout = $ope->get_cout();
        $description = $ope->get_descr();
        $id_client = $ope->get_id_client();
        $id_assignation = $ope->get_id_assignation();
        $type = $ope->get_type();
        $statut = $ope->get_statut();
        $date = $ope->get_date();
        $id_user = $id_user_curr; // A MODIFIER = POST OU SESSION ID DE LUTILISATEUR CONNECTER

        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
       //RECUPERER USER ID EN SESSION OU POST
        $db->query("INSERT INTO operation (description, type, statut, cout, date_comm, id_user, id_user_FAIT, id_client) VALUES ('$description', '$type', '$statut', '$cout', '$date', '$id_user', '$id_assignation', '$id_client')");  
    }

    public static function endOperation($idOpe) {
        // APPEL LE TRIGGER end_of_ope POUR ALIMENTER LA TABLE end_ope
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $db->query("UPDATE operation SET statut = 'Terminer' WHERE id_ope = $idOpe");
        $db->query("DELETE FROM operation WHERE id_ope = $idOpe");
    }




    /**
     * Get the value of _type
     */ 
    public function get_type()
    {
        return $this->_type;
    }

    /**
     * Set the value of _type
     *
     * @return  self
     */ 
    public function set_type($_type)
    {
        $this->_type = $_type;

        return $this;
    }

    /**
     * Get the value of _login
     */ 
    public function get_login()
    {
        return $this->_login;
    }

    /**
     * Set the value of _login
     *
     * @return  self
     */ 
    public function set_login($_login)
    {
        $this->_login = $_login;

        return $this;
    }

    /**
     * Get the value of _mdp
     */ 
    public function get_mdp()
    {
        return $this->_mdp;
    }

    /**
     * Set the value of _mdp
     *
     * @return  self
     */ 
    public function set_mdp($_mdp)
    {
        $this->_mdp = $_mdp;

        return $this;
    }

    /**
     * Get the value of _nbOpe
     */ 
    public function get_nbOpe()
    {
        return $this->_nbOpe;
    }

    /**
     * Set the value of _nbOpe
     *
     * @return  self
     */ 
    public function set_nbOpe($_nbOpe)
    {
        $this->_nbOpe = $_nbOpe;

        return $this;
    }

    /**
     * Get the value of _id
     */ 
    public function get_id()
    {
        return $this->_id;
    }

    /**
     * Set the value of _id
     *
     * @return  self
     */ 
    public function set_id($_id)
    {
        $this->_id = $_id;

        return $this;
    }

    

    /**
     * Get the value of _opMax
     */ 
    public function get_opMax()
    {
        return $this->_opMax;
    }

    /**
     * Set the value of _opMax
     *
     * @return  self
     */ 
    public function set_opMax($_opMax)
    {
        $this->_opMax = $_opMax;

        return $this;
    }
}


?>