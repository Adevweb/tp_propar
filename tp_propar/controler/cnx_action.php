<?php 

require_once '../model/cnx_class.php';


$validation = true;

if ($_POST) {
    // vérifie avec la fonction 'isset' que '$_POST['login']' est rempli, existe ET avec la fonction 'empty' qu'il n'est pas vide. 
    // Si une valeur non-vide a été envoyé alors ...
    if (isset($_POST['login']) && !empty($_POST['login'])) {
        // On stocke donc la valeur du champ dans une variable.
        $login = $_POST['login'];
    } else {
        $validation = false;
    }
    if (isset($_POST['mdp']) && !empty($_POST['mdp'])) {
        $mdp = $_POST['mdp'];
    } else {
        $validation = false;
    }
}

if ($validation) {

$check = Connexion::checkUser($login, $mdp);

if (isset($check) && !empty($check)) {
    if ($check[2] == "EXPERT") {
        header('location: ../view/homeAdmin.php');
    } else {
        header('location: ../view/homeUser.php');
    }
}
else {
    header('location: ../view/connexion.php');
}
}


?>