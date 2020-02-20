<?php
require_once '../model/operation_class.php';
session_start();

$id_user = $_SESSION['id_user'];

$list = $_SESSION['listOpeCurrent'];

//Verification SI le login en session est vide, donc un accès par URL -> redirection vers page connexion.
if (!isset($_SESSION['login'])) {
    header('location: connexion.php');
}

?>

<!doctype html>
<html lang="fr">

<head>
    <title>Terminer une opération</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/v4-shims.css">

    <link rel="stylesheet" href="css/endOpe.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- reference your copy Font Awesome here (from our CDN or by hosting yourself) -->

</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
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
    <!-- SECTION -->
    <div class="container">
        <div class="row col-12">
            <h3 class="display-4 col-12 text-center title">Terminer une opération</h3>
            <h5 class="display-5 col-12 text-center sstitle">Veuillez renseigner les champs ci-dessous</h5>
        </div>
    </div>

    <!-- FORMULAIRE -->
    <div class="container ajouter">
        <div class="row justify-content-center">
            <form action="../controler/endOpe_action.php" method="POST">
                <div class="row">
                    <div class="col-12 form-group" data-for="ID opéation">
                        <input type="texte"  class="form-control" id="id_ope" name="id_ope" placeholder="Identifiant de l'opération terminé" required>
                    </div>
                    
                    <div class="display-5 col-12 text-center">
                        <button type="submit"  class="btn btn-light" value="Ajouter"><span class="fa fa-plus-circle"></span> Ajouter</button>
                    </div>
                </div>
            </form>
        </div>


    </div>
    <!-- FIN FORMULAIRE -->


    <div class="container">
        <div class="row col-12">
            <h3 class="display-4 col-12 text-center title">Opérations en cours</h3>
        </div>
    </div>

    <!-- FORMULAIRE -->
    <div class="container ajouter2">
        <div class="row justify-content-center">
            <div class="">

                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <table id="currentOp" class="table table-hover table-sm">
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
    <!-- FIN FORMULAIRE -->

    <!-- BOUTON MENU -->

    <div class="menu">
        <button type="button" id="home"  class="btn btn-light btn-sm mb-2" value="Home"><span class="fa fa-bars"></span> Menu</button>
    </div>

    <!-- FIN BOUTON MENU -->

</body>

</html>
