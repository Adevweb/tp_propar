<?php

/*Après les pages succes/error renvoie sur ce controler
qui controle le type de user connecté pour faire la bonne redirection */
session_start();


if ($_SESSION['type'] == 'EXPERT') {
    header('location: ../view/homeAdmin.php');
} else {
    header('location: ../view/homeUser.php');
}


?>