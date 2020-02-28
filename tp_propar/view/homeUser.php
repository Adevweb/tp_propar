<?php
require_once '../model/operation_class.php';
session_start();

$id_user = $_SESSION['id_user'];
$login = $_SESSION['login'];
$type = $_SESSION['type'];
$list = $_SESSION['listOpeCurrent'];
$finishList = $_SESSION['finishList'];
//Verification SI le login en session est vide, donc un accès par URL -> redirection vers page connexion.
if (!isset($_SESSION['login'])) {
    header('location: connexion.php');
}
if ($type == 'EXPERT') {
    header('location: homeAdmin.php');
}
?>


<!doctype html>
<html lang="fr">

<head>
    <title>Page Utilisateur</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/v4-shims.css">

    <link rel="stylesheet" href="css/homeAdmin.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- reference your copy Font Awesome here (from our CDN or by hosting yourself) -->

</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        // Tableau réduit en fonctionnalités
        $(document).ready(function() {
            $('#currentOp').DataTable({
                "language": {
                    "lengthMenu": "Voir _MENU_ opérations par page",
                    "zeroRecords": "Aucune données",
                    "infoEmpty": "Aucune pages.",
                    "infoFiltered": "(Filtré sur _MAX_ lignes)",
                    "paginate": {
                        "previous": "Précédent",
                        "next": "Suivant"
                    },
                },
                "paging": false,
                "info": false,
                "searching": false
            });
        });

        $(document).ready(function() {
            $('#finishOp').DataTable({
                "language": {
                    "lengthMenu": "Voir _MENU_ opérations par page",
                    "zeroRecords": "Aucune données",
                    "info": "Page  _PAGE_  sur  _PAGES_ ",
                    "infoEmpty": "Aucune pages.",
                    "infoFiltered": "(Filtré sur _MAX_ lignes)",
                    "search": "Rechercher :",
                    "paginate": {
                        "previous": "Précédent",
                        "next": "Suivant"
                    },
                },
                "pagingType": "simple",
            });
        });
    </script>

    <!-- HEADER -->
    <div class="container-fluid">
        <div class="row d-flex justify-content-between header">
            <h1 class="headTitleLeft"> PROPAR </h1>
            <a href="../controler/endSession_action.php" class="headTitleRight">
                <h5><span style="font-size:30px;"> <i class="fas fa-sign-out-alt"></i></span> </h5>
            </a>
        </div>
    </div>
    <!-- TITRE SECTION -->
    <div class="container">
        <div class="row col-12">
            <h3 class="display-4 col-12 text-center centerTitle">Vos Actions</h3>
            <p class="h5 col-12 text-center centerSSTitle">Connecté en tant que <?php echo $login ?></p>
        </div>

        <!-- LIGNE CONTENU SECTION -->
        <section>
            <div class="row col-12 d-flex justify-content-around">
                <div class="row col-md-3 text-center d-flex justify-content-center article">
                    <img src="img/addOpe.jpg">
                    <p class="h4 title"> Ajouter une opération </p>
                    <p>En cliquant ici, vous pourrez ajouter une opération à effectuer par votre équipe.</p>
                    <a href="../controler/clientListFROMmenu_action.php"><button type="button" class="btn btn-outline-light button">Go !</button></a>
                </div>
                <div class="row col-md-3 text-center d-flex justify-content-center article">
                    <img src="img/currentOpe.jpg">
                    <p class="h4 title"> Liste des opérations en cours </p>
                    <p>En cliquant ici, vous pourrez avoir un aperçu des opérations en cours</p>
                    <a href="../controler/currentOpe_action.php"><button type="button" class="btn btn-outline-light button">Go !</button></a>
                </div>
                <div class="row col-md-3 text-center d-flex justify-content-center article">
                    <img src="img/endOpe.jpg">
                    <p class="h4 title"> Terminer une opération </p>
                    <p>En cliquant ici, vous pourrez déclarer un opération comme terminée.</p>
                    <a href="../controler/current_opeFROMmenu.php"><button type="button" class="btn btn-outline-light button">Go !</button></a>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row col-12">
                <h3 class="display-4 col-12 text-center centerTitle">Opérations en cours</h3>
            </div>
        </div>

        <!-- TABLEAU OPERATIONS EN COURS -->
        <div class="container ajouter">
            <div class="row justify-content-center">
                <div class="currentOp">

                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12">
                            <table id="" class="table table-hover">
                                <thead class="justify-content-center">
                                    <tr>
                                        <th class="text-left table-info"><strong class="font-weight-bold font-italic">#</strong></th>
                                        <th class="text-center table-info"><strong class="font-weight-bold font-italic">Description</strong></th>
                                        <th class="text-center table-info"><strong class="font-weight-bold font-italic">Type d'Opé</strong></th>
                                        <th class="text-center table-info"><strong class="font-weight-bold font-italic">Statut</strong></th>
                                        <th class="text-center table-info"><strong class="font-weight-bold font-italic">Coût</strong></th>
                                        <th class="text-center table-info"><strong class="font-weight-bold font-italic">Date commencement</strong></th>
                                        <th class="text-center table-info"><strong class="font-weight-bold font-italic">Ajouter par n° </strong></th>
                                        <th class="text-center table-info"><strong class="font-weight-bold font-italic">Effectuer n°</strong></th>
                                        <th class="text-center table-info"><strong class="font-weight-bold font-italic">ID client</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--  Generating one more line of table compared to .csv file for display results of addition-->

                                    <?php for ($i = 0; $i <= sizeof($list) - 1; $i++) { ?>
                                        <tr>
                                            <?php for ($j = 0; $j <= sizeof($list[$i]) - 1; $j++) { ?>
                                                <td class="text-center"><?php echo $list[$i][$j] ?> </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row col-12">
                <h3 class="display-4 col-12 text-center centerTitle">Opérations terminées</h3>
            </div>
        </div>
        <!-- FIN TABLEAU OPERATIONS EN COURS -->


        <!-- TABLEAU OPERATIONS TERMINEES -->
        <div class="container ajouter">
            <div class="row justify-content-center">
                <div class="">

                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12">
                            <table id="finishOp" class="table table-hover">
                                <thead class="justify-content-center">
                                    <tr>
                                        <th class="text-left table-info"><strong class="font-weight-bold font-italic">#</strong></th>
                                        <th class="text-center table-info"><strong class="font-weight-bold font-italic">Description</strong></th>
                                        <th class="text-center table-info"><strong class="font-weight-bold font-italic">Type d'Opé</strong></th>
                                        <th class="text-center table-info"><strong class="font-weight-bold font-italic">Statut</strong></th>
                                        <th class="text-center table-info"><strong class="font-weight-bold font-italic">Coût</strong></th>
                                        <th class="text-center table-info"><strong class="font-weight-bold font-italic">Date commencement</strong></th>
                                        <th class="text-center table-info"><strong class="font-weight-bold font-italic">Ajouter par n° </strong></th>
                                        <th class="text-center table-info"><strong class="font-weight-bold font-italic">Effectuer n°</strong></th>
                                        <th class="text-center table-info"><strong class="font-weight-bold font-italic">ID client</strong></th>
                                        <th class="text-center table-info"><strong class="font-weight-bold font-italic">Date de fin</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--  Generating one more line of table compared to .csv file for display results of addition-->

                                    <?php for ($i = 0; $i <= sizeof($finishList) - 1; $i++) { ?>
                                        <tr>
                                            <?php for ($j = 0; $j <= sizeof($finishList[$i]) - 1; $j++) { ?>
                                                <td class="text-center"><?php echo $finishList[$i][$j] ?> </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN TABLEAU OPERATIONS TERMINEES -->

</body>

</html>