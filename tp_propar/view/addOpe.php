<?php
session_start();
$clientList = $_SESSION['clientList'];
$userList = $_SESSION['userList'];
//Verification SI le login en session est vide, donc un accès par URL -> redirection vers page connexion.
if (!isset($_SESSION['login'])) {
    header('location: connexion.php');
}

?>
<!doctype html>
<html lang="fr">

<head>
    <title>Ajouter une opération</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/v4-shims.css">

    <link rel="stylesheet" href="css/addOpe.css">
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
            $('#tabClient').DataTable({
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
                "lengthChange" : false,
            });
        });

        $(document).ready(function() {
            $('#tabUser').DataTable({
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
                "lengthChange" : false,
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
            <h3 class="display-4 col-12 text-center title">Ajouter une opération</h3>
            <h5 class="display-5 col-12 text-center sstitle">Veuillez renseigner les champs ci-dessous</h5>
        </div>
    </div>

    <!-- FORMULAIRE -->
    <div class="container ajouter">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form action="../controler/addOpe_action.php" method="post">
                    <div class="row">
                        <div class="col-md-4  form-group" data-for="ID client">
                            <input type="text" class="form-control" name="id_client" id="id_client" placeholder="Identifiant client" required>
                        </div>
                        <div class="col-md-4  form-group" data-for="ID employé">
                            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Attribuer à l'employer (ID)" required>
                        </div>
                        <div class="col-md-4  form-group" data-for="coût">
                            <input type="text" class="form-control" name="cout" id="cout" placeholder="Coût de l'opération" required>
                        </div>
                        <div class="col-md-12 form-group" data-for="message">
                            <textarea name="descr" id="descr" data-form-field="Message" class="form-control display-7" placeholder="Decription de l'opération"></textarea>
                        </div>
                        <div class="display-5 col-12 text-center">
                            <button type="submit" id="addOpe" class="btn btn-light" value="Ajouter"><span class="fa fa-plus-circle"></span> Ajouter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- FIN FORMULAIRE -->
        <!-- FORMULAIRE -->
        <div class="row col-md-12 justify-content-around tabZone">

            <div class="col-md-5">
                <div>
                    <h3 class="display-4 col-12 text-center tabTitle">Liste des clients</h3>
                </div>
                <table id="tabClient" class="table table-hover table-sm">
                    <thead class="justify-content-center">
                        <tr>
                            <th class="text-left table-info"><strong class="font-weight-bold font-italic">#</strong></th>
                            <th class="text-center table-info"><strong class="font-weight-bold font-italic">NOM</strong></th>
                            <th class="text-center table-info"><strong class="font-weight-bold font-italic">Prénom</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--  Generating one more line of table compared to .csv file for display results of addition-->
                        <?php for ($i = 0; $i <= sizeof($clientList) - 1; $i++) { ?>
                            <tr>
                                <?php for ($j = 0; $j <= sizeof($clientList[$i]) - 1; $j++) { ?>
                                    <td class="text-center"><?php echo $clientList[$i][$j] ?> </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-5">
                <div>
                    <h3 class="display-4 col-12 text-center tabTitle">Liste des Utilisateurs</h3>
                </div>
                <table id="tabUser" class="table table-hover table-sm">
                    <thead class="justify-content-center">
                        <tr>
                            <th class="text-left table-info"><strong class="font-weight-bold font-italic">#</strong></th>
                            <th class="text-center table-info"><strong class="font-weight-bold font-italic">NOM</strong></th>
                            <th class="text-center table-info"><strong class="font-weight-bold font-italic">Prénom</strong></th>
                            <th class="text-center table-info"><strong class="font-weight-bold font-italic">Type</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--  Generating one more line of table compared to .csv file for display results of addition-->

                        <?php for ($i = 0; $i <= sizeof($userList) - 1; $i++) { ?>
                            <tr>
                                <?php for ($j = 0; $j <= sizeof($userList[$i]) - 1; $j++) { ?>
                                    <td class="text-center"><?php echo $userList[$i][$j] ?> </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- BOUTON MENU -->

    <div class="menu">
        <a href="../controler/type_control.php"><button type="button" id="home" class="btn btn-light btn-sm mb-2" value="Home"><span class="fa fa-bars"></span> Menu</button></a>
    </div>

    <!-- FIN BOUTON MENU -->


</body>

</html>