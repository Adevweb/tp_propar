<?php 
require_once '../model/cnx_class.php';
require_once '../model/expert_class.php';
require_once '../model/senior_class.php';
require_once '../model/apprenti_class.php';
require_once '../model/operation_class.php';


//import de log4php
include('../log/log4php/Logger.php');
//Set la configuration
Logger::configure('../log/config.xml');
//Crée le logger
$log = Logger::getLogger('CONNEXION');

$validation = true;

//Verifie que les champs ne sont pas vides : boolean
if ($_POST) {
    //Si les champs ne sont pas vides...
    if (isset($_POST['login']) && !empty($_POST['login'])) {
        //Stock la variables $_POST dans une variable
        $login = $_POST['login'];
    } else {
        $log->debug("L'utilisateur a réussi à valider un champ vide");
        $validation = false;
    }
    if (isset($_POST['mdp']) && !empty($_POST['mdp'])) {
        $mdp = md5($_POST['mdp']);
    } else {
        $log->debug("L'utilisateur a réussi à valider un champ vide");
        $validation = false;
    }
}

//Si la validation des champs s'est correctement passer, on place les variables en session
if ($validation) {
    //On TRY checkUser pour vérifier dans la BDD l'existence des logins et retourne un OBJET si le TRY fonctionne
    try {
        $check = Connexion::checkUser($login, $mdp);

    } catch (Exception $e) {
        //Sinon, un exception a été crée : elle crée un LOG et redirige vers la page de connexion
        $log->warn("$e");   
        //header('location: "../view/error.php');
        echo 'Failed';
    }

    //Si l'objet n'est pas vide...
    if (isset($check) && !empty($check)) {
        session_start(); //Démarrage d'une session
        //Récupération des attributs 
        $_SESSION['login'] = $login;
        $_SESSION['mdp'] = $mdp;
        $_SESSION['id_user'] = $check->get_id();
        $id_user = $_SESSION['id_user']; //Pour appel de méthodes : opération en cours, opération terminé et les log
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
    }

    //Controle du type de user pour la bonne redirection
        if ($check->get_type() == "EXPERT") {
                //Ajout d'un log avec l'utilisateur qui s'est connecté
                $log->trace("L'utilisateur $login s'est connecté en tant qu'Expert");   
                //header('location: ../view/homeAdmin.php');
                echo 'ExpertOK';
            } else {
                $log->trace("L'utilisateur $login s'est connecté en tant qu'utilisateur");   
                //header('location: ../view/homeUser.php');
                echo 'UserOK';
            }
}
