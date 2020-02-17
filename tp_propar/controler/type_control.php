<?php
require_once '../model/operation_class.php';

/*Après les pages succes/error renvoie sur ce controler
qui controle le type de user connecté pour faire la bonne redirection */
session_start();

/* La page success renvoie vers ce controler qui rappel les méthodes pour lister les opérations en cours et finis
Permet de mettre à jour lors du retour sur le menu les tableaux affichés */ 
$id_user = $_SESSION['id_user'];

$currentList = Operation::currentList($id_user);
$_SESSION['listOpeCurrent'] = $currentList;

$finishList = Operation::finishList($id_user);
$_SESSION['finishList'] = $finishList;

//Verification du type d'utilisateur connecté 
if ($_SESSION['type'] == 'EXPERT') {
    header('location: ../view/homeAdmin.php');
} else {
    header('location: ../view/homeUser.php');
}


?>