<?php
session_start();
//Verification SI le login en session est vide, donc un accès par URL -> redirection vers page connexion.
if (!isset($_SESSION['login'])) {
  header('location: connexion.php');
}
?>
<!doctype html>
<html lang="fr">

<head>
  <title>Ajouter un client</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/v4-shims.css">

  <link rel="stylesheet" href="css/addEmp.css">
  

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
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.7.3/themes/base/jquery-ui.css">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Oswald:700|Titillium+Web|Fira+Mono">
  <!-- HEADER -->
  <div class="container-fluid">
    <div class="row d-flex justify-content-between header">
      <a>
        <h1 class="headTitleLeft"> PROPAR </h1>
        <a href="../controler/endSession_action.php" class="headTitleRight">
          <h5><span style="font-size:30px;"> <i class="fas fa-sign-out-alt"></i></span> </h5>
        </a>
    </div>
  </div>
  <!-- SECTION -->
  <div class="container">
    <div class="row col-12">
      <h3 class="display-4 col-12 text-center title">Le client n'existe pas !</h3>
      <h5 class="display-5 col-12 text-center sstitle">Veuillez l'enregistrer ci-dessous</h5>
    </div>
  </div>

  <!-- FORMULAIRE AJOUT CLIENT -->
  <div class="container ajouter">
    <div class="row justify-content-center">
      <form action="../controler/addClient_action.php" method="post">
        <div class="row col-12">
          <div class="col-md-6  form-group" data-for="name">
            <input type="text" class="form-control" name="nom" placeholder="Nom" required>
          </div>
          <div class="col-md-6  form-group" data-for="prenom">
            <input type="text" class="form-control" name="prenom" placeholder="Prenom" required>
          </div>

          <div class="col-md-12 form-group" data-for="prenom">
            <input class="form-control" name="adresse" id="adresse" type="text" placeholder="Adresse" required>

          </div>
        </div>


    </div>
    <div class="display-5 col-12 text-center">
      <button type="submit" id="addClient" class="btn btn-light" value="Ajouter"><span class="fa fa-plus-circle"></span> Ajouter</button>
    </div>
    </form>
  </div>
  </div>
  <!-- FIN FORMULAIRE AJOUT CLIENT-->

  <!-- BOUTON MENU -->

  <div class="menu">
    <a href="../controler/type_control.php"><button type="button" id="home" class="btn btn-light btn-sm mb-2" value="Home"><span class="fa fa-bars"></span> Menu</button></a>
  </div>

  <!-- FIN BOUTON MENU -->


  <script src="js/adresseapi.js"></script>


</body>

</html>