<?php 

require_once 'expert_class.php';
require_once 'operation_class.php';
require_once 'cnx_class.php';
require_once 'client_class.php';


print_r($test = Employe::getUserById(1));
?>