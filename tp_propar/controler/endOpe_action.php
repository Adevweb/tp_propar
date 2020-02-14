<?php
require_once '../model/expert_class.php';
require_once '../model/senior_class.php';
require_once '../model/apprenti_class.php';

session_start();

$validation = true;

if ($_POST) {
    // vérifie avec la fonction 'isset' que '$_POST['login']' est rempli, existe ET avec la fonction 'empty' qu'il n'est pas vide. 
    // Si une valeur non-vide a été envoyé alors ...
    if (isset($_POST['id_ope']) && !empty($_POST['id_ope'])) {
        // On stocke donc la valeur du champ dans une variable.
        $id_ope = $_POST['id_ope'];
    } else {
        $validation = false;
    }
}

if ($validation) {
    if($_SESSION['type'] == 'EXPERT' ) {
        Expert::endOperation($id_ope);
        header('location: ../view/endOpe.php');
    }
    elseif($_SESSION['type'] == 'SENIOR') {
        Senior::endOperation($id_ope);
        header('location: ../view/endOpe.php');
    }
    elseif ($_SESSION['type'] == 'APPRENTI') {
        Apprenti::endOperation($id_ope);
        header('location: ../view/endOpe.php');
    }
}

?>