<?php
require_once '../model/expert_class.php';
require_once '../model/apprenti_class.php';
require_once '../model/senior_class.php';
require_once '../model/client_class.php';
require_once '../model/employe_class.php';

session_start();

//import de log4php
include('../log/log4php/Logger.php');
//Set la configuration
Logger::configure('../log/config.xml');
//Crée le logger
$log = Logger::getLogger('AJOUT OPERATION');

$login = $_SESSION['login'];

$validation = true; 

//Verifie que les champs ne sont pas vides : boolean
if ($_POST) {
    //Si les champs ne sont pas vides...
    if (isset($_POST['id_client']) && !empty($_POST['id_client']) && preg_match('[0-9]',$_POST['id_client'])) {
        //Stock la variables $_POST dans une variable
        $id_client = $_POST['id_client'];
    } else {
        $log->debug("$login à valider un champ vide ou pas au bon format");
        header('location: ../view/error.php');
        $validation = false;
    }
    if (isset($_POST['id_user']) && !empty($_POST['id_user']) && preg_match('[0-9]',$_POST['id_user'])) {
        $id_assignation = $_POST['id_user'];
    } else {
        $log->debug("$login à valider un champ vide ou pas au bon format");
        header('location: ../view/error.php');
        $validation = false;
    }
    if (isset($_POST['cout']) && !empty($_POST['cout']) && preg_match('[0-9]',$_POST['cout'])) {
        $cout = $_POST['cout'];
    } else {
        $log->debug("$login à valider un champ vide ou pas au bon format");
        header('location: ../view/error.php');
        $validation = false;
    }
    if (isset($_POST['descr']) && !empty($_POST['descr'])) {
        $descr = $_POST['descr'];
    } else {
        $log->debug("$login à valider un champ vide ou pas au bon format");
        $validation = false;
    }
}

//Verification de l'existence de l'utilisateur, si il n'existe pas en BDD, renvoie vers erreur
$check = Expert::checkUserModify($id_assignation);

if (!$check) {
    $log->info("$login à ajouter une opération à un utilisateur non existant");
    header('location: ../view/error.php');
    die();
}

/* Verificaction de l'existence du client en BDD, 
s'il n'existe pas redirection vers addClient */
$check2 = Client::checkClientById($id_client);

if (!$check2) {
    header('location: ../view/addClient.php');
    die();
}
//Appel la fonction qui nous retourne un objet avec les infos de l'employe assigné à la tâche
$userAssign = Employe::getUserById($id_assignation);
//On récupère le nb d'opération maximum pour cet emploi (Expet, senior, apprenti)
$nbOpMax = $userAssign->get_opMax();
//On récupère le nombre de tâches en cours qu'il effectue
$nbOpe = Employe::nbCurrentOpe($id_assignation);

//Si $validation = true alors verification du type de USER connecté
//Appel de la méthodes correspondantes et redirection vers succes/error
if ($validation) {
    $id_user = $_SESSION['id_user'];
    //Compare le nombre de tâches en cours au nombre d'opération maximum
    if ($nbOpe < $nbOpMax) {
        Operation::addOperation($descr, $cout, $id_client, $id_assignation, $id_user);
        $log->info("$login à ajouter une opération");
        header('location: ../view/success.php');
    }else {
        $log->trace("$login à ajouter une opération à un utilisateur qui été déjà à son maximum");
        header('location: ../view/error.php');
    }
}
?>