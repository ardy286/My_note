<?php
include_once("modele/DAO/AdministrateurDAO.class.php");
include_once("modele/Administrateur.class.php");
$dao = new AdministrateurDAO();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Se connecter</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./style.css">
</head>

<body>
  <header>
    <nav class=" navbar navbar-expand-sm ">
      <div class=" container">
        <a class="navbar-brand" href="page_presentation.php">Mes Notes</a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" id="login-link" href="#target">Contact</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <main class="mainLogin">
    <div class="container">
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
          <div class="container-fluid">

            <h2>S'identifier</h2>
            <form method="post" class="needs-validation">
              <div class="form-group">
                <label for="uname">Nom d'administrateur :</label>
                <input type="text" class="form-control" placeholder="Entrer nom d'utilisateur" name="uname">
              </div>
              <div class="form-group">
                <label for="pwd">Mot de passe :</label>
                <input type="password" class="form-control" placeholder="Entrer mot de passe" name="pswd">
              </div>
              <button type="submit" class="btn btn-primary">Connecter</button>
            </form>
          </div>
          <?php
          if (isset($_POST['uname'])) {
            $utName = $_POST['uname'];
            $Adm = $dao::findADM($utName);
            $mdp = $_POST['pswd'];
            if ($Adm != null) {
              if ($Adm->getNomUtilisateur() == $utName && $Adm->getMotDePasse() == $mdp) {
                session_start();
                $_SESSION['utName'] = $Adm->getNomUtilisateur();
                header("Location: pageAdmin.php");
              } else {
                echo "<p class='text-danger' style='text-align:center'>Mot de passe ou nom d'administrateur incorrect.</p>";
              }
            } else {
              echo "<br><div class='alert alert-danger'><strong>Nous n'avons pas de compte avec cet nom d'administrateur.</strong></div>";
            }
          }
          ?>
          <br><br><br><br><br><br><br><br>
        </div>
        <div class="col-sm-3"></div>
      </div>
    </div>
  </main>
  <footer id=target class="footer">
    <div class="container">
      <div class="row text-center">
        <div class="col-sm-4 text-center">
          <p>Suivez nous sur les réseaux sociaux pour<br>les nouveautés:</p>
          <a href=""><img src="./images\facebook.png" alt="Logo facebook" width="9%"></a>
          <a href=""><img src="./images/instagram.png" alt="Logo instagram" width="7%"></a>
          <a href=""><img src="./images/twitter.png" alt="Logo twitter" width="7%"></a>
        </div>
        <div class="col-sm-4">
          <p>Designed by:<br>Kindy, Bodo et Yudas</p>
        </div>
        <div class="col-sm-4">
          <p>Écrivez-nous sur<br>notre adresse courriel:</p>
          <p><a href=""><img src="./images/email.png" alt="Logo email" width="7%"></a></p>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>