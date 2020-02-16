<?php
require_once '../model/expert_class.php';
require_once '../model/apprenti_class.php';
require_once '../model/senior_class.php';
require_once '../model/client_class.php';
require_once '../model/employe_class.php';
session_start();

$validation = true; 

//Verifie que les champs ne sont pas vides : boolean
if ($_POST) {
    //Si les champs ne sont pas vides...
    if (isset($_POST['id_client']) && !empty($_POST['id_client'])) {
        //Stock la variables $_POST dans une variable
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

/* Verificaction de l'existence du client en BDD, 
s'il n'existe pas redirection vers addClient */
$check2 = Client::checkClientById($id_client);

if (!$check2) {
    header('location: ../view/addClient.php');
    die();
}

$userAssign = Employe::getUserById($id_assignation);
$nbOpMax = $userAssign->get_opMax();
$nbOpe = Employe::nbCurrentOpe($id_assignation);

//Si $validation = true alors verification du type de USER connecté
//Appel de la méthodes correspondantes et redirection vers succes/error
if ($validation) {
    $id_user = $_SESSION['id_user'];
    if ($nbOpe < $nbOpMax) {
        Operation::addOperation($descr, $cout, $id_client, $id_assignation, $id_user);
        header('location: ../view/success.php');
    }else {
        header('location: ../view/error.php');
    }
}
?>