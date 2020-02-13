<?php 

require_once 'Singleton.class.php';

class Client {
    private $_nom; //String
    private $_prenom; //String
    private $_id_user ;
    private $_id_client;

    public function __construct($nom, $prenom) {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
    }
    
    public static function getClientById ($id_client)  {
        $dbi = Singleton::getInstance();
        $db=$dbi->getConnection();
        $result = $db->query("SELECT * FROM client WHERE id_client = $id_client ");
        $result = $result->fetch(PDO::FETCH_ASSOC);
        
        $client = new Client ($result['nom'], $result['prenom']);
        $client->set_id_user($result['id_user']);
        $client->set_id_client($result['id_client']);
        return $client; // Objet
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
}


?>