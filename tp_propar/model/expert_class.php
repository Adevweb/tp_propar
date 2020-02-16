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
    
    public static function checkUser($nom, $prenom, $type) {
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $result = $db->query("SELECT nom, prenom, type FROM utilisateur WHERE nom = '$nom' AND prenom = '$prenom' AND type = '$type'");
        $result = $result->fetch(PDO::FETCH_ASSOC);
        $bool = false;
        //return $result;
        
        if (isset($result) && !empty($result)) {
            $bool = true;
        }
        return $bool;
    }

    public static function checkUserModify($id_user) {
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $result = $db->query("SELECT id_user, type FROM utilisateur WHERE id_user = '$id_user'");
        $result = $result->fetch(PDO::FETCH_ASSOC);
        $bool = false;
        //return $result;
        
        if (isset($result) && !empty($result)) {
            $bool = true;
        }
        return $bool;
    }

    
    
    public static function updateUser ($id_user, $type) {
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $db->query("UPDATE utilisateur SET type = '$type' WHERE id_user = $id_user");
    }

    public static function userList() {
            $dbi = Singleton::getInstance();
            $db=$dbi->getConnection();
            $result = $db->query("SELECT id_user, nom, prenom, type FROM utilisateur");
            $result = $result->fetchAll(PDO::FETCH_NUM);
            return $result;
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