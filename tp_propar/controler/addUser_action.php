<?php

require_once '../model/expert_class.php';

session_start();

$validation = true;

if ($_POST) {
    // vérifie avec la fonction 'isset' que '$_POST['login']' est rempli, existe ET avec la fonction 'empty' qu'il n'est pas vide. 
    // Si une valeur non-vide a été envoyé alors ...
    if (isset($_POST['nom']) && !empty($_POST['nom'])) {
        // On stocke donc la valeur du champ dans une variable.
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

//Si il n'existe pas, il est créé
if ($validation) {
    Expert::createUser($nom, $prenom, $type, $login, $mdp);
    header('location: ../view/success.php');
}

?>