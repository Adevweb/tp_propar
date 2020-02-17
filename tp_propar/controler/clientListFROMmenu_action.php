<?php

require_once '../model/client_class.php';
require_once '../model/expert_class.php';

session_start();

//Appel de la méthodes qui renvoie en tableau des clients enrigstrés en BDD
$clientList = Client::clientList();
//Stockages en $_SESSION
$_SESSION['clientList'] = $clientList;
//Redirection vers la page d'ajout d'opération
$userList = Expert::userList();
$_SESSION['userList'] = $userList;
header('location: ../view/addOpe.php');

?>