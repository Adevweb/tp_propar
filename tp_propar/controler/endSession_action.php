<?php
//Controler de deconnexion
session_destroy();

header('location: ../view/connexion.php');

?>