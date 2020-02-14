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
        if ($cout <= 1000) {
            $this->_type = 'Petite manoeuvre';
        }
        elseif ($cout <= 2500) {
            $this->_type = 'Moyenne manoeuvre';
        }
        else {
            $this ->_type = 'Grosse manoeuvre';
        }
        $this->_date = date("Y-m-d");
    }

    public static function currentList($id_user) {
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $result = $db->query("SELECT * FROM operation WHERE statut = 'En cours' AND id_user_FAIT = $id_user");
        $result = $result->fetchAll(PDO::FETCH_NUM);
        return $result;
        
    }

    public static function finishList($id) {
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $result = $db->query("SELECT * FROM end_ope WHERE id_user_FAIT = '$id' ");
        $result = $result->fetchAll(PDO::FETCH_NUM);
        return $result;
        
    }

    public static function seeCA() {
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $result = $db->query("SELECT SUM(cout) FROM end_ope WHERE statut = 'Terminer'");
        $result = $result->fetch(PDO::FETCH_NUM);
        $ca = $result[0];
        return $ca;
    }

    public static function endOpeCheck ($idOpe) {
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $result = $db->query("SELECT id_ope FROM operation WHERE id_ope = '$idOpe'");
        $result = $result->fetch(PDO::FETCH_ASSOC);
        $bool = false;
        //return $result;
        if (isset($result) && !empty($result)) {
            $bool = true;
        }
        return $bool;
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