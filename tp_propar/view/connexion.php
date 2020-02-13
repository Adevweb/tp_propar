<!doctype html>
<html lang="fr">

<head>
    <title>Ajouter une opération</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/v4-shims.css">

    <link rel="stylesheet" href="css/cnx.css">
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
        <div class="row d-flex justify-content-center header">
            <h1 class="headTitleLeft"> PROPAR </h1>
        </div>
        
    </div>
    <!-- SECTION -->
    <div class="container">
        <div class="row col-12">
            <h3 class="display-4 col-12 text-center title">Connexion</h3>
            <h5 class="display-5 col-12 text-center sstitle">Application dédiée au personnel</h5>
        </div>
    </div>

     <!-- FORMULAIRE -->
    <div class="container ajouter">
        <div class="row justify-content-center align-items-center"">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form action="../controler/cnx_action.php" method="post">
                            <div class="form-group">                            
                                <input type="text" class="form-control" name="login" placeholder="Login" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="mdp" placeholder="Mot de passe" required>
                            </div>
                            <button type="submit" id="sendlogin" class="btn btn-outline-light" value="Se connecter"><span class="fa fa-check-circle"></span> Se connecter</button>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN FORMULAIRE -->


</body>

</html>