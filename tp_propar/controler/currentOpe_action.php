<?php
require_once '../model/operation_class.php';
session_start();
//Recupération de l'id de l'utilisateur courrant
$id_user = $_SESSION['id_user'];
// Appel de la méthode qui retourne une liste des opérations en cours
$list = Operation::currentList($id_user);
// Stocke la liste en $_SESSION
$_SESSION['listOpeCurrent'] = $list;
//Redirection vers la page d'opération courrantes
header('location: ../view/currentOpe.php');

?>