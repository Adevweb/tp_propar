<?php
require_once 'Singleton.class.php';

class Connexion {
    private $_login;
    private $_mdp;

    public function __construct($login, $mdp) {
        $this->_login = $login;
        $this->_mdp = $mdp;
    }

    public static function checkUser ($login, $mdp) {
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $result = $db->query("SELECT login, mdp, type FROM utilisateur WHERE login = '$login' AND mdp = '$mdp'");
        $result = $result->fetch(PDO::FETCH_NUM);
        return $result;

       /* // [0] => login [1] => mdp [2] => type
        if (isset($result) && !empty($result)) {
            return true;
        }
        else {
            return false;
        }*/
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
}

?>