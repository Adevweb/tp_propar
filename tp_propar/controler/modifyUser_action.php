<?php

require_once '../model/expert_class.php';

session_start();

$validation = true;

//Verifie que les champs ne sont pas vides : boolean
if ($_POST) {
    //Si les champs ne sont pas vides...
    if (isset($_POST['id_user']) && !empty($_POST['id_user'])) {
        // On stocke donc la valeur du champ dans une variable.
        $id_user = $_POST['id_user'];
    } else {
        $validation = false;
    }
    if (isset($_POST['type']) && !empty($_POST['type'])) {
        $type = $_POST['type'];
    } else {
        $validation = false;
    }
}

//Verification de l'existence de l'utilisateur, si il existe déjà en BDD, renvoie vers erreur
$check = Expert::checkUserModify($id_user);

if (!$check) {
    header('location: ../view/error.php');
    die();
}
//Si l'utilisateur existe en BDD, on modifie son rôle 
if ($validation) {
    Expert::updateUser($id_user, $type);
    header('location: ../view/success.php');
}


?>