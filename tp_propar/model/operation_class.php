<?php 

require_once 'Singleton.class.php';

class Operation {
    private $_descr; //String
    private $_type; //String
    private $_statut = "En cours"; //String
    private $_cout; //Float
    private $_id_client;
    private $_id_assignation;
    private $_id_user;
    private $_date;

    public function __construct($cout, $descr, $id_client, $id_assignation) {
        $this->_id_client = $id_client;
        $this->_id_assignation = $id_assignation;
        $this->_cout = $cout;
        $this->_descr = $descr;
        //Condition qui set le type d'opération en fonction du cout entré en paramètre
        if ($cout <= 1000) {
            $this->_type = 'Petite manoeuvre';
        }
        elseif ($cout <= 2500) {
            $this->_type = 'Moyenne manoeuvre';
        }
        else {
            $this ->_type = 'Grosse manoeuvre';
        }
        //Set la date de création de l'opération
        $this->_date = date("Y-m-d");
    }

    public static function currentList($id_user) : array {
        //Récupère la liste des opération en cours
        //Récupère la connexion à la BDD via Singleton
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $result = $db->query("SELECT * FROM operation WHERE statut = 'En cours' AND id_user_FAIT = $id_user");
        //$result avec le numéro de colonne en clés
        $result = $result->fetchAll(PDO::FETCH_NUM);
        return $result;
    }

    public static function finishList($id) : array {
        //Récupère la liste des opération terminée
        //Récupère la connexion à la BDD via Singleton
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $result = $db->query("SELECT * FROM end_ope WHERE id_user_FAIT = '$id' ");
        //$result avec le numéro de colonne en clés
        $result = $result->fetchAll(PDO::FETCH_NUM);
        return $result;     
    }

    public static function seeCA() : int {
        //Récupération du chiffre d'affaire
        //Récupération de la connexion à la bdd via Singleton
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        //Appel de la procédure stockée en BDD
        $result = $db->query("CALL see_CA();");
        //$result avec le numéro de colonne en clés
        $result = $result->fetch(PDO::FETCH_NUM);
        //Un seul résultat dans le table $result, donc une seul clé
        $ca = $result[0];
        return $ca;
    }

    public static function endOpeCheck ($idOpe) : bool {
        //Vérification de l'existence de l'opération en BDD
        //Récupération de la connexion à la BDD
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $result = $db->query("SELECT id_ope FROM operation WHERE id_ope = '$idOpe'");
        $result = $result->fetch(PDO::FETCH_ASSOC);
        //Set la variable à false
        $bool = false;
        //Si le tableau est rempli, c'est qu'une opération existe en BDD
        if (isset($result) && !empty($result)) {
            $bool = true;
        }
        return $bool;
    }

    public static function addOperation($description, $cout, $id_client, $id_assignation, $id_user_curr) : void {
        //instanciation d'une operation avec les valeurs entrées paramètres
        $ope = new Operation($cout, $description, $id_client, $id_assignation);
        //Récupération des valeurs et set les variables
        $cout = $ope->get_cout();
        $description = $ope->get_descr();
        $id_client = $ope->get_id_client();
        $id_assignation = $ope->get_id_assignation();
        $type = $ope->get_type();
        $statut = $ope->get_statut();
        $date = $ope->get_date();
        $id_user = $id_user_curr; 
        //Récupération de la connexion à la bdd via Singleton
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        //Insertion en BDD de l'opéraiton
        $db->query("INSERT INTO operation (description, type, statut, cout, date_comm, id_user, id_user_FAIT, id_client) VALUES ('$description', '$type', '$statut', '$cout', '$date', '$id_user', '$id_assignation', '$id_client')");  
    }
    
    public static function endOperation($idOpe) : void {
        // APPEL LE TRIGGER end_of_ope POUR ALIMENTER LA TABLE end_ope
        //Récupération de la connexion à la BDD
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        //1er temps : Update le statut de en cours à terminé
        $db->query("UPDATE operation SET statut = 'Terminer' WHERE id_ope = $idOpe");
        //2ème temps : Supprime l'opération séléctionné par l'id, et la place via le trigger dans la table end_ope
        $db->query("DELETE FROM operation WHERE id_ope = $idOpe");
    }
   

    /**
     * Get the value of _descr
     */ 
    public function get_descr()
    {
        return $this->_descr;
    }

    /**
     * Set the value of _descr
     *
     * @return  self
     */ 
    public function set_descr($_descr)
    {
        $this->_descr = $_descr;

        return $this;
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
     * Get the value of _statut
     */ 
    public function get_statut()
    {
        return $this->_statut;
    }

    /**
     * Set the value of _statut
     *
     * @return  self
     */ 
    public function set_statut($_statut)
    {
        $this->_statut = $_statut;

        return $this;
    }

    /**
     * Get the value of _cout
     */ 
    public function get_cout()
    {
        return $this->_cout;
    }

    /**
     * Set the value of _cout
     *
     * @return  self
     */ 
    public function set_cout($_cout)
    {
        $this->_cout = $_cout;

        return $this;
    }

    /**
     * Get the value of _id_client
     */ 
    public function get_id_client()
    {
        return $this->_id_client;
    }

    /**
     * Set the value of _id_client
     *
     * @return  self
     */ 
    public function set_id_client($_id_client)
    {
        $this->_id_client = $_id_client;

        return $this;
    }

    /**
     * Get the value of _id_assignation
     */ 
    public function get_id_assignation()
    {
        return $this->_id_assignation;
    }

    /**
     * Set the value of _id_assignation
     *
     * @return  self
     */ 
    public function set_id_assignation($_id_assignation)
    {
        $this->_id_assignation = $_id_assignation;

        return $this;
    }

    /**
     * Get the value of _date
     */ 
    public function get_date()
    {
        return $this->_date;
    }

    /**
     * Set the value of _date
     *
     * @return  self
     */ 
    public function set_date($_date)
    {
        $this->_date = $_date;

        return $this;
    }

    /**
     * Get the value of _id_user
     */ 
    public function get_id_user()
    {
        return $this->_id_user;
    }

    /**
     * Set the value of _id_user
     *
     * @return  self
     */ 
    public function set_id_user($_id_user)
    {
        $this->_id_user = $_id_user;

        return $this;
    }
}

?>
