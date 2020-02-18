<?php

require_once '../model/expert_class.php';
session_start();

//import de log4php
include('../log/log4php/Logger.php');
//Set la configuration
Logger::configure('../log/config.xml');
//Crée le logger
$log = Logger::getLogger('AJOUT UTILISATEUR');

$login = $_SESSION['login'];

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
    if (isset($_POST['type']) && !empty($_POST['type'])) {
        $type = $_POST['type'];
    } else {
        $log->debug("$login à valider un champ vide");
        $validation = false;
    }
    if (isset($_POST['login']) && !empty($_POST['login'])) {
        $login = $_POST['login'];
    } else {
        $log->debug("$login à valider un champ vide");
        $validation = false;
    }
    if (isset($_POST['mdp']) && !empty($_POST['mdp'])) {
        $mdp = $_POST['mdp'];
    } else {
        $log->debug("$login à valider un champ vide");
        $validation = false;
    }
}
//Verification de l'existence de l'utilisateur, si il existe déjà en BDD, renvoie vers erreur
$check = Expert::checkUser($nom, $prenom, $type);

if ($check) {
    $log->info("$login a ajouter un utilisateur déjà existant");
    header('location: ../view/error.php');
    die();
}

//Si il n'existe pas, il est créé : redirection vers success
if ($validation) {
    $log->trace("$login a ajouter un utilisateur");
    Expert::createUser($nom, $prenom, $type, $login, $mdp);
    header('location: ../view/success.php');
}

?>