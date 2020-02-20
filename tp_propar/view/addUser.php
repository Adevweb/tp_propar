<?php
session_start();
$userList = $_SESSION['userList'];

//Verification SI le login en session est vide, donc un accès par URL -> redirection vers page connexion.
if (!isset($_SESSION['login'])) {
  header('location: connexion.php');
}

?>
<!doctype html>
<html lang="fr">

<head>
  <title>Ajouter un employé</title>
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
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
            $('#currentUser').DataTable({
                "language": {
                    "lengthMenu": "Voir _MENU_ opérations par page",
                    "zeroRecords": "Aucune données.",
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
      <h1 class="headTitleLeft"> PROPAR </h1></a>
      <a href="../controler/endSession_action.php" class="headTitleRight"><h5><span style="font-size:30px;"> <i class="fas fa-sign-out-alt"></i></span> </h5></a>
    </div>
  </div>
  <!-- SECTION -->
  <div class="container">
    <div class="row col-12">
      <h3 class="display-4 col-12 text-center title">Ajouter un employé</h3>
      <h5 class="display-5 col-12 text-center sstitle">Veuillez renseigner les champs ci-dessous</h5>
    </div>
  </div>

  <!-- FORMULAIRE -->
  <div class="container ajouter">
    <div class="row justify-content-center">
      <form action="../controler/addUser_action.php" method="post">
        <div class="row col-12">
          <div class="col-md-4  form-group" data-for="name">
            <input type="nom" class="form-control" name="nom" placeholder="Nom" required>
          </div>
          <div class="col-md-4  form-group" data-for="email">
            <input type="text" class="form-control" name="prenom" placeholder="Prenom" required>
          </div>
          <div class="col-md-4  form-group" data-for="fonction">
            <select class="form-control" type="text" class="form-control" name="type" placeholder="Fonction" required>
              <option disabled selected>Fonction</option>
              <option>Expert</option>
              <option>Senior</option>
              <option>Apprenti</option>
            </select>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-4  form-group" data-for="login">
            <input type="text" class="form-control" name="login" placeholder="Login" required>
          </div>
          <div class="col-md-4 form-group" data-for="mdp">
            <input type="password" class="form-control" name="mdp" placeholder="Mot de passe" required>
          </div>

        </div>
        <div class="display-5 col-12 text-center">
          <button type="submit" id="addEmo" class="btn btn-light" value="Ajouter"><span class="fa fa-plus-circle"></span> Ajouter</button>
        </div>
      </form>
    </div>
  </div>
  <!-- FIN FORMULAIRE -->


  <div class="container">
    <div class="row col-12">
      <h3 class="display-4 col-12 text-center title">Modifier un employé</h3>
      <h5 class="display-5 col-12 text-center sstitle">Veuillez renseigner les champs ci-dessous</h5>
    </div>
  </div>


  <!-- FORMULAIRE -->
  <div class="container ajouter2">
    <div class="row justify-content-center">
      <form action="../controler/modifyUser_action.php" method="post">
        <div class="row justify-content-center">
          <div class="col-md-6  form-group" data-for="login">
            <input type="text" class="form-control" name="id_user" placeholder="Identifiant de l'employé" required>
          </div>
          <div class="col-md-6  form-group" data-for="fonction">
            <select class="form-control" type="text" class="form-control" name="type" placeholder="Fonction" required>
              <option disabled selected>Fonction</option>
              <option>Expert</option>
              <option>Senior</option>
              <option>Apprenti</option>
            </select>
          </div>
        </div>
        <div class="display-5 col-12 text-center">
          <button type="submit" id="addEmo" class="btn btn-light" value="Ajouter"><span class="fa fa-plus-circle"></span> Modifier</button>
        </div>
      </form>
    </div>
    <div class="row justify-content-center">

        <div class="row d-flex justify-content-center tableau">
          <div class="col-md-12">
            <table id="currentUser" class="table table-hover table-sm">
              <thead class="justify-content-center">
                <tr>
                  <th class="text-left table-info"><strong class="font-weight-bold font-italic">#</strong></th>
                  <th class="text-center table-info"><strong class="font-weight-bold font-italic">NOM</strong></th>
                  <th class="text-center table-info"><strong class="font-weight-bold font-italic">Prénom</strong></th>
                  <th class="text-right table-info"><strong class="font-weight-bold font-italic">Type</strong></th>
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
  </div>
  <!-- FIN FORMULAIRE -->

  <!-- BOUTON MENU -->

  <div class="menu">
    <a href="../controler/type_control.php"><button type="button" id="home" class="btn btn-light btn-sm mb-2" value="Home"><span class="fa fa-bars"></span> Menu</button></a>
  </div>

  <!-- FIN BOUTON MENU -->

</body>

</html>