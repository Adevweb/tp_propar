<?php
require_once '../model/operation_class.php';
session_start();

$id_user = $_SESSION['id_user'];

$list = $_SESSION['listOpeCurrent'];
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

    <link rel="stylesheet" href="css/currentOpe.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- reference your copy Font Awesome here (from our CDN or by hosting yourself) -->

</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- HEADER -->
    <div class="container-fluid">
        <div class="row d-flex justify-content-between header">
            <h1 class="headTitleLeft"> PROPAR </h1>
            <h5 class="headTitleRight"><span style="font-size:30px;"> <i class="fas fa-sign-out-alt"></i></span> </h5>
        </div>
    </div>
    <!-- SECTION -->
    <div class="container">
        <div class="row col-12">
            <h3 class="display-4 col-12 text-center title">Opérations en cours</h3>
        </div>
    </div>

    <!-- FORMULAIRE -->
    <div class="container ajouter">
        <div class="row justify-content-center">
            <div class="">

                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-left"><strong class="font-weight-bold font-italic">ID Opération</strong></th>
                                    <th class="text-center"><strong class="font-weight-bold font-italic">Description</strong></th>
                                    <th class="text-center"><strong class="font-weight-bold font-italic">Type d'Opé</strong></th>
                                    <th class="text-center"><strong class="font-weight-bold font-italic">Statut</strong></th>
                                    <th class="text-center"><strong class="font-weight-bold font-italic">Coût</strong></th>
                                    <th class="text-center"><strong class="font-weight-bold font-italic">Date commencement</strong></th>
                                    <th class="text-center"><strong class="font-weight-bold font-italic">Ajouter par n° </strong></th>
                                    <th class="text-center"><strong class="font-weight-bold font-italic">Effectuer n°</strong></th>
                                    <th class="text-right"><strong class="font-weight-bold font-italic">ID client</strong></th>

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
        <a action="../controler/type_control.php" method="post"><button type="button" id="home" class="btn btn-light btn-sm mb-2" value="Home"><span class="fa fa-bars"></span> Menu</button></a>
    </div>

    <!-- FIN BOUTON MENU -->

</body>

</html>