<?php

require_once '../model/expert_class.php';

session_start();

$validation = true;

//Verifie que les champs ne sont pas vides : boolean
if ($_POST) {
    //Si les champs ne sont pas vides...
    if (isset($_POST['nom']) && !empty($_POST['nom'])) {
        //Stock la variables $_POST dans une variable
        $nom = $_POST['nom'];
    } else {
        $validation = false;
    }
    if (isset($_POST['prenom']) && !empty($_POST['prenom'])) {
        $prenom = $_POST['prenom'];
    } else {
        $validation = false;
    }
    if (isset($_POST['type']) && !empty($_POST['type'])) {
        $type = $_POST['type'];
    } else {
        $validation = false;
    }
    if (isset($_POST['login']) && !empty($_POST['login'])) {
        $login = $_POST['login'];
    } else {
        $validation = false;
    }
    if (isset($_POST['mdp']) && !empty($_POST['mdp'])) {
        $mdp = $_POST['mdp'];
    } else {
        $validation = false;
    }
}
//Verification de l'existence de l'utilisateur, si il existe déjà en BDD, renvoie vers erreur
$check = Expert::checkUser($nom, $prenom, $type);

if ($check) {
    header('location: ../view/error.php');
    die();
}

//Si il n'existe pas, il est créé : redirection vers success
if ($validation) {
    Expert::createUser($nom, $prenom, $type, $login, $mdp);
    header('location: ../view/success.php');
}

?>