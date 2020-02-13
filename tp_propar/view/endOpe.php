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
            <h3 class="display-4 col-12 text-center title">Terminer une opération</h3>
            <h5 class="display-5 col-12 text-center sstitle">Veuillez renseigner les champs ci-dessous</h5>
        </div>
    </div>

    <!-- FORMULAIRE -->
    <div class="container ajouter">
        <div class="row justify-content-center">
            <form action="../controler/addEmp.action.php" method="post">
                <div class="row">
                    <div class="col-12 form-group" data-for="ID opéation">
                        <input type="ID opéation" class="form-control" name="ID opéation" placeholder="Identifiant de l'opération terminé" required>
                    </div>
                    <div class="display-5 col-12 text-center">
                        <button type="submit" id="addEmo" class="btn btn-light" value="Ajouter"><span class="fa fa-plus-circle"></span> Ajouter</button>
                    </div>
                </div>
            </form>
        </div>


    </div>
    </div>
    <!-- FIN FORMULAIRE -->


    <div class="container">
        <div class="row col-12">
            <h3 class="display-4 col-12 text-center title2">Opérations terminées</h3>
        </div>
    </div>

        <!-- FORMULAIRE -->
        <div class="container ajouter2">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <td class="text-left"><strong class="font-weight-bold font-italic">Date</strong></td>
                                    <td class="text-center"><strong class="font-weight-bold font-italic">ID Opération</strong></td>
                                    <td class="text-center"><strong class="font-weight-bold font-italic">Effectué par</strong></td>
                                    <td class="text-center"><strong class="font-weight-bold font-italic">Type</strong></td>
                                    <td class="text-center"><strong class="font-weight-bold font-italic">Statut</strong></td>
                                    <td class="text-center"><strong class="font-weight-bold font-italic">Client</strong></td>
                                    <td class="text-right"><strong class="font-weight-bold font-italic">Decription</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <!--  Generating one more line of table compared to .csv file for display results of addition-->
                                <tr>
                                    <th class="text-left">12/02/20</th>
                                    <td class="text-center">456</td>
                                    <td class="text-center">ADRIEN BENOIT</td>
                                    <td class="text-center">PETITE MANOEUVRE</td>
                                    <td class="text-center">En cours</td>
                                    <td class="text-center">MACHIN TRUC</td>
                                    <td class="text-right">blablabla blablabla</td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- FIN FORMULAIRE -->



</body>

</html>