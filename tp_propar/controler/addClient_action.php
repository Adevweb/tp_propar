<?php 
require_once '../model/client_class.php';

session_start();

$id_user = $_SESSION['id_user'];

$validation = true;

//Verifie que les champs ne sont pas vides : boolean
if ($_POST) {
    //Si les champs ne sont pas vides...
    if (isset($_POST['nom']) && !empty($_POST['nom'])) {
        //Stock la variables $_POST dans une variable
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

//Verifie que le client n'est pas déjà existant en BDD
$check = Client::checkClient($nom, $prenom);
// Si TRUE...
if ($check) {
    //Renvoie vers page d'erreur et met fin au script
    header('location: ../view/error.php');
    die();
}

/* Si les champs sont remplis, alors création d'un nouveau client en BDD
redirection vers success ou error */
if ($validation) {
    Client::createClient($nom, $prenom, $id_user); 
    header('location: ../view/success.php');
} else {
    header('location: ../view/error.php');
}

?>