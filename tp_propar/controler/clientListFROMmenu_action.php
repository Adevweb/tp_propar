<?php

require_once '../model/client_class.php';

session_start();

//Appel de la méthodes qui renvoie en tableau des clients enrigstrés en BDD
$clientList = Client::clientList();
//Stockages en $_SESSION
$_SESSION['clientList'] = $clientList;
//Redirection vers la page d'ajout d'opération
header('location: ../view/addOpe.php');

?>