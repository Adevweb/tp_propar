<?php 

class Operation {
    private $_descr; //String
    private $_type; //String
    private $_statut = "Traitement en cours"; //String
    private $_cout; //Float

    public function __construct($cout, $descr) {

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
}

?>