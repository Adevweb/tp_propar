<?php

require_once '../model/expert_class.php';
session_start();

//import de log4php
include('../log/log4php/Logger.php');
//Set la configuration
Logger::configure('../log/config.xml');
//Crée le logger
$log = Logger::getLogger('MODIF UTILISATEUR');

$login = $_SESSION['login;'];

$validation = true;

//Verifie que les champs ne sont pas vides : boolean
if ($_POST) {
    //Si les champs ne sont pas vides...
    if (isset($_POST['id_user']) && !empty($_POST['id_user']) && preg_match('[\d]',$_POST['id_user'])) {
        // On stocke donc la valeur du champ dans une variable.
        $id_user = $_POST['id_user'];
    } else {
        $log->debug("$login à valider un champ vide ou pas au bon format");
        $validation = false;
    }
    if (isset($_POST['type']) && !empty($_POST['type'])) {
        $type = $_POST['type'];
    } else {
        $log->debug("$login à valider un champ vide");
        $validation = false;
    }
}

//Verification de l'existence de l'utilisateur, si il n'existe pas déjà en BDD, renvoie vers erreur
$check = Expert::checkUserModify($id_user);

if (!$check) {
    $log->info("$login à modifier un utilisateur qui n'existe pas");
    header('location: ../view/error.php');
    die();
}
//Si l'utilisateur existe en BDD, on modifie son rôle 
if ($validation) {
    Expert::updateUser($id_user, $type);
    header('location: ../view/success.php');
}


?>