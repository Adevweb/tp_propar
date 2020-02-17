<?php
//Controler de deconnexion
session_start();
session_destroy();

header('location: ../view/connexion.php');

?>