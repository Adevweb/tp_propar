<?php 

abstract class Employe {
    protected $_nom; //String
    protected $_prenom; //String

    abstract function addOperation();
    abstract function endOperation();

}

?>