<?php

require_once '../model/expert_class.php';

session_start();

//Appel de la méthodes qui renvoie en tableau des user enrigstrés en BDD
$userList = Expert::userList();
//Stockages en $_SESSION
$_SESSION['userList'] = $userList;
//Redirection vers la page d'ajout d'opération
header('location: ../view/addUser.php');

?>