<?php 
require_once '../model/client_class.php';

//import de log4php
include('../log/log4php/Logger.php');
//Set la configuration
Logger::configure('../log/config.xml');
//Crée le logger
$log = Logger::getLogger('AJOUT CLIENT');

session_start();
$login = $_SESSION['login'];
$id_user = $_SESSION['id_user'];

$validation = true;

//Verifie que les champs ne sont pas vides : boolean
if ($_POST) {
    //Si les champs ne sont pas vides...
    if (isset($_POST['nom']) && !empty($_POST['nom'])) {
        //Stock la variables $_POST dans une variable
        $nom = $_POST['nom'];
    } else {
        $log->debug("$login à valider un champ vide");
        $validation = false;
    }
    if (isset($_POST['prenom']) && !empty($_POST['prenom'])) {
        $prenom = $_POST['prenom'];
    } else {
        $log->debug("$login à valider un champ vide");
        $validation = false;
    }
    
}

//Verifie que le client n'est pas déjà existant en BDD
$check = Client::checkClient($nom, $prenom);
// Si TRUE...
if ($check) {
    //Renvoie vers page d'erreur et met fin au script
    $log->info("$login a crée un client déjà existant");
    header('location: ../view/error.php');
    die();
}

/* Si les champs sont remplis et que le client n'existe pas déjà, alors création d'un nouveau client en BDD
redirection vers success ou error */
if ($validation) {
    Client::createClient($nom, $prenom, $id_user); 
    $log->info("$login à ajouter un client");
    header('location: ../view/success.php');
} else {
    $log->warn("Le client n'a pas pu être crée addClient_action.php");
    header('location: ../view/error.php');
}

?>