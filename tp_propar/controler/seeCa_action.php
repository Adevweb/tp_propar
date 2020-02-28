<?php

require_once '../model/expert_class.php';

session_start();

//Appel de la méthode qui retourne un int
$ca = Operation::seeCA();
//Stock en session
$_SESSION['ca'] = $ca;
//Redirection vers la page HTML
header('location: ../view/seeCA.php');
?>