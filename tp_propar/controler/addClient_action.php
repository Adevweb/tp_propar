<?php 
require_once '../model/client_class.php';

session_start();
$id_user = $_SESSION['id_user'];
$validation = true;

if ($_POST) {
    // vérifie avec la fonction 'isset' que '$_POST['login']' est rempli, existe ET avec la fonction 'empty' qu'il n'est pas vide. 
    // Si une valeur non-vide a été envoyé alors ...
    
    if (isset($_POST['nom']) && !empty($_POST['nom'])) {
        $nom = $_POST['nom'];
    } else {
        $validation = false;
    }
    if (isset($_POST['prenom']) && !empty($_POST['prenom'])) {
        $prenom = $_POST['prenom'];
    } else {
        $validation = false;
    }
    
}

$check = Client::checkClient($nom, $prenom);

if ($check) {
    header('location: ../view/error.php');
    die();
}

if ($validation) {
    Client::createClient($nom, $prenom, $id_user); 
    header('location: ../view/success.php');
} else {
    header('location: ../view/error.php');
}

?>