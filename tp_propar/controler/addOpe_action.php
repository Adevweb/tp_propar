<?php
require_once '../model/expert_class.php';

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

if ($validation) {
    $id_user = $_SESSION['id_user'];
Expert::addOperation($descr, $cout, $id_client, $id_assignation, $id_user);
header('location: ../view/addOpe.php'); // A MODIFIER SI ON RENVOIE UN OBJET
} else {
    //AJOUTER PAGE ERREUR
}
?>