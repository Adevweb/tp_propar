<?php
require_once '../model/operation_class.php';
session_start();

//Récupère la variable id_user de l'utilisateur connectée
$id_user = $_SESSION['id_user'];
//Appel de la fonction qui renvoie la liste des opérations en cours de l'utilisateur courrant
$list = Operation::currentList($id_user);
//Stock le tableau en $_SESSION
$_SESSION['listOpeCurrent'] = $list;
//Redirection vers terminer une opération
header('location: ../view/endOpe.php');

?>