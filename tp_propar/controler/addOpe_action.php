<?php
require_once '../model/expert_class.php';
require_once '../model/apprenti_class.php';
require_once '../model/senior_class.php';
require_once '../model/client_class.php';

session_start();

$validation = true; 

if ($_POST) {
    // vérifie avec la fonction 'isset' que '$_POST['login']' est rempli, existe ET avec la fonction 'empty' qu'il n'est pas vide. 
    // Si une valeur non-vide a été envoyé alors ...
    if (isset($_POST['id_client']) && !empty($_POST['id_client'])) {
        // On stocke donc la valeur du champ dans une variable.
        $id_client = $_POST['id_client'];
    } else {
        $validation = false;
    }
    if (isset($_POST['id_user']) && !empty($_POST['id_user'])) {
        $id_assignation = $_POST['id_user'];
    } else {
        $validation = false;
    }
    if (isset($_POST['cout']) && !empty($_POST['cout'])) {
        $cout = $_POST['cout'];
    } else {
        $validation = false;
    }
    if (isset($_POST['descr']) && !empty($_POST['descr'])) {
        $descr = $_POST['descr'];
    } else {
        $validation = false;
    }
}

//Verification de l'existence de l'utilisateur, si il existe déjà en BDD, renvoie vers erreur
$check = Expert::checkUserModify($id_assignation);

if (!$check) {
    header('location: ../view/error.php');
    die();
}

$check2 = Client::checkClientById($id_client);

if (!$check2) {
    header('location: ../view/addClient.php');
    die();
}

if ($validation) {
    $id_user = $_SESSION['id_user'];
    if ($_SESSION['type'] == 'EXPERT') {
        Expert::addOperation($descr, $cout, $id_client, $id_assignation, $id_user);
        header('location: ../view/success.php');
    }
    elseif ($_SESSION['type'] == 'SENIOR') {
        Senior::addOperation($descr, $cout, $id_client, $id_assignation, $id_user);
        header('location: ../view/success.php');
    }
    elseif ($_SESSION['type'] == 'APPRENTI') {
        Apprenti::addOperation($descr, $cout, $id_client, $id_assignation, $id_user);
        header('location: ../view/success.php');
    }else {
        header('location: ../view/error.php');
    }
}
?>