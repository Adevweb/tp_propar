<?php 
require_once '../model/cnx_class.php';
require_once '../model/expert_class.php';
require_once '../model/senior_class.php';
require_once '../model/apprenti_class.php';
require_once '../model/operation_class.php';

include('../log/log4php/Logger.php');
Logger::configure('../log/config.xml');
$log = Logger::getLogger('CONNEXION');


session_start();


$validation = true;

//Verifie que les champs ne sont pas vides : boolean
if ($_POST) {
    //Si les champs ne sont pas vides...
    if (isset($_POST['login']) && !empty($_POST['login'])) {
        //Stock la variables $_POST dans une variable
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

//Si la validation des champs s'est correctement passer, on place les variables en session
if ($validation) {
    
    //On appel checkUser pour vérifier dans la BDD l'existence des logins et retourne un OBJET
    $check = Connexion::checkUser($login, $mdp);
    //Si l'objet n'est pas vide...
    if (isset($check) && !empty($check)) {
        //Récupération des attributs 
        $_SESSION['login'] = $login;
        $_SESSION['mdp'] = $mdp;
        $_SESSION['id_user'] = $check->get_id();
        $id_user = $_SESSION['id_user'];
        $_SESSION['type'] = $check->get_type();
        $_SESSION['opMax'] = $check->get_opMax();
        $_SESSION['nom'] = $check->get_nom();
        $_SESSION['prenom'] = $check->get_prenom();

        //Appel de la fonction qui liste les opérations courrantes et place en $_SESSION
        $list = Operation::currentList($id_user);
        $_SESSION['listOpeCurrent'] = $list;
        //Appel de la fonction qui liste les opérations terminées et place en $_SESSION
        $finishList = Operation::finishList($id_user);
        $_SESSION['finishList'] = $finishList;
    
    //Controle du type de user pour la bonne redirection
        if ($check->get_type() == "EXPERT") {
                $log->trace("L'utilisateur $login s'est connecté");   // Not logged because TRACE < WARN
                header('location: ../view/homeAdmin.php');
            } else {
                $log->trace("L'utilisateur $login s'est connecté");   // Not logged because TRACE < WARN
                header('location: ../view/homeUser.php');
            }
    }
//Si le tableau est vide, c'est un utilisateur inconnu en BDD il est donc redirigé vers la page d'erreur
else {
    $log->info("L'utilisateur s'est connecté avec le mauvais Login ou MDP");    // Not logged because INFO < WARN
    header('location: ../view/cnxError.php');
    }
}
