<?php
require_once 'Singleton.class.php';
require_once 'expert_class.php';
require_once 'senior_class.php';
require_once 'apprenti_class.php';


class Connexion {
    private $_login;
    private $_mdp;

    public function __construct($login, $mdp) {
        $this->_login = $login;
        $this->_mdp = $mdp;
    }

    public static function checkUser ($login, $mdp) : object {
        //Verification des logins de l'utilisateur
         //Récupération de la connexion par Singleton
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $result = $db->query("SELECT login, mdp, type, id_user, nom, prenom FROM utilisateur WHERE login = '$login' AND mdp = '$mdp'");
        $result = $result->fetch(PDO::FETCH_NUM);
        //$result sous forme de tableau avec le numéro de colonne en clé

        //Si le tableau $result n'est pas vide, on vérifie le type d'utilisateur qui veut se connecter.
        //Et on instancie un objet en fonction de son type.
        if (isset($result) && !empty($result)) {
            if ($result[2] == 'EXPERT') {
                $obj = new Expert($result[4], $result[5], $result[0], $result[1]);
                $obj->set_id($result[3]);
            } elseif ($result[2] == 'SENIOR') {
                $obj = new Senior($result[4], $result[5], $result[0], $result[1]);
                $obj->set_id($result[3]);
            } elseif ($result[2] == 'APPRENTI') {
                $obj = new Apprenti($result[4], $result[5], $result[0], $result[1]);
                $obj->set_id($result[3]);
            }
            //Retourne l'objet
            return $obj; 
            //Sinon, crée une exception
        } else {
            throw new Exception("L'utilisateur n'existe pas !");
        }
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