<?php
//Controler de deconnexion
session_start();

//import de log4php
include('../log/log4php/Logger.php');
//Set la configuration
Logger::configure('../log/config.xml');
//Crée le logger
$log = Logger::getLogger('DECONNEXION');

$login = $_SESSION['login'];
$log->trace("L'utilisateur $login s'est déconnecté");
session_destroy();

header('location: ../view/connexion.php');

?>