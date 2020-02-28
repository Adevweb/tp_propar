<?php 

abstract class Employe {
    protected $_nom; //String
    protected $_prenom; //String


    public static function getUserById ($id) : object {
        //Retourne un objet avec les informations de l'utilisateur en fonction de son id 
        //Récupération de la connexion à la bdd par Singleton
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $result = $db->query("SELECT * FROM utilisateur WHERE id_user = $id ");
        $result = $result->fetch(PDO::FETCH_ASSOC);
        //instanciation d'un objet en fonction du type d'utilisateur 
        if ($result['type'] == 'EXPERT') {
            $user = new Expert ($result['nom'], $result['prenom'], $result['login'], $result['mdp']);
            return $user; // Objet 
        }
        elseif ($result['type'] == 'SENIOR') {
            $user = new Senior ($result['nom'], $result['prenom'], $result['login'], $result['mdp']);
            return $user; // Objet 
        }
        elseif ($result['type'] == 'APPRENTI') {
            $user = new Apprenti ($result['nom'], $result['prenom'], $result['login'], $result['mdp']);
            return $user; // Objet 
        }
    }

    public static function nbCurrentOpe($idUser) : int {
        //Retourne le nombre d'opération en cours
        //Récupération de la connexion à la bdd par Singleton
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $result = $db->query("SELECT COUNT(*) FROM operation WHERE id_user_FAIT = $idUser ");
        $result = $result->fetch(PDO::FETCH_NUM);
        //Boucle for each pour retourner le résultat, même si il n'y qu'un seul résultat. Evite de mettre en dur
        foreach ($result as $value) {
            return  $value;
        }
}
    
    /**
     * Get the value of _nom
     */ 
    public function get_nom()
    {
        return $this->_nom;
    }

    /**
     * Set the value of _nom
     *
     * @return  self
     */ 
    public function set_nom($_nom)
    {
        $this->_nom = $_nom;

        return $this;
    }

    /**
     * Get the value of _prenom
     */ 
    public function get_prenom()
    {
        return $this->_prenom;
    }

    /**
     * Set the value of _prenom
     *
     * @return  self
     */ 
    public function set_prenom($_prenom)
    {
        $this->_prenom = $_prenom;

        return $this;
    }
}
