<?php
require_once '../model/expert_class.php';
require_once '../model/senior_class.php';
require_once '../model/apprenti_class.php';
require_once '../model/operation_class.php';


session_start();

$validation = true;

//Verifie que les champs ne sont pas vides : boolean
if ($_POST) {
    //Si les champs ne sont pas vides...
    if (isset($_POST['id_ope']) && !empty($_POST['id_ope'])) {
        //Stock la variables $_POST dans une variable
        $id_ope = $_POST['id_ope'];
    } else {
        $validation = false;
        header('location: ../view/error.php');
    }
}

//Methodes qui vérifie si le id_ope existe en BDD, retourne un booléen
$check = Operation::endOpeCheck($id_ope);
// Si bool = false alors il redirige vers la page d'erreur et arrête d'executer le script
if (!$check) {
    header('location: ../view/error.php');
    die();
}
//Si bool = true et que validation = true, vérification du type de user et appel la méthode qui correspond, sinon renvoie vers page d'erreur
if ($validation) {
        Operation::endOperation($id_ope);
        header('location: ../view/success.php');
    }
    else {
        header('location: ../view/error.php');
    }


?>