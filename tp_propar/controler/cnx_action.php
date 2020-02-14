<?php 
require_once '../model/cnx_class.php';
require_once '../model/expert_class.php';
require_once '../model/senior_class.php';
require_once '../model/apprenti_class.php';
require_once '../model/operation_class.php';

session_start();


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
//Si la validation des champs s'est correctement passer, on place les variables en session
if ($validation) {
$_SESSION['login'] = $login;
$_SESSION['mdp'] = $mdp;
//On appel checkUser pour vérifier dans la BDD l'existence des logins et retourne un OBJET
$check = Connexion::checkUser($login, $mdp);

if (isset($check) && !empty($check)) {
    //On place l'id du user connecté en session si l'objet retourné n'est pas vide 
    $_SESSION['id_user'] = $check->get_id();
    $id_user = $_SESSION['id_user'];
    $_SESSION['type'] = $check->get_type();
    $_SESSION['opMax'] = $check->get_opMax();
    $_SESSION['nom'] = $check->get_nom();
    $_SESSION['prenom'] = $check->get_prenom();


    $list = Operation::currentList($id_user);
    $_SESSION['listOpeCurrent'] = $list;
    $finishList = Operation::finishList($id_user);
    $_SESSION['finishList'] = $finishList;
    
    //Controler du type de user pour la bonne redirection
    if ($check->get_type() == "EXPERT") {
        header('location: ../view/homeAdmin.php');
    } else {
        header('location: ../view/homeUser.php');
    }
}
//Si le tableau est vide, c'est un utilisateur inconnu en BDD il est donc redirigé vers la page d'erreur
else {
    header('location: ../view/cnxError.php');
}
}
?>