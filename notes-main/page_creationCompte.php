<?php
include_once("modele/DAO/UtilisateurDAO.class.php");
include_once("modele/Utilisateur.class.php");
$dao = new UtilisateurDAO();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Création compte</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link rel="stylesheet" href="./style.css">
</head>

<body class="page_creationCompte">

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
  <main>
    <div class="container">
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
          <div class="container-fluid">
            <div class="float-left">

            </div>
            <h2>Créer un compte</h2>
            <form class="needs-validation" method="post">
              <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" placeholder="Entrer votre nom" name="name">
              </div>
              <div class="form-group">
                <label for="name">Prénom:</label>
                <input type="text" class="form-control" placeholder="Entrer votre prénom" name="lname">
              </div>
              <div class="form-group">
                <label for="name">Nom d'utilisateur:</label>
                <input type="text" class="form-control" placeholder="Entrer votre nom d'utilisateur" name="surnom">
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" placeholder="Entrer votre email" name="mail">
              </div>
              <div class="form-group">
                <label for="tel">Téléphone:</label>
                <input type="tel" class="form-control" placeholder="Entrer votre numéro de téléphone" name="tel">
              </div>
              <div class="form-group">
                <label for="pwd">Mot de passe:</label>
                <input type="password" class="form-control" placeholder="Entrer mot de passe" name="pswd">
              </div>
              <div class="form-group">
                <label for="pwd">Mot de passe:</label>
                <input type="password" class="form-control" placeholder="Entrer mot de passe à nouveau" name="pswdd">
              </div>
              <div class="form-group form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="remember"> J'accepte les conditions.
                </label>
              </div>
              <button type="submit" class="btn btn-primary">Créer compte</button>
            </form>
            <br>
            <?php
            if (isset($_POST['name'])) {
              $nom = $_POST['name'];
              $prenom = $_POST['lname'];
              $utName = $_POST['surnom'];
              $email = $_POST['mail'];
              $numTel = $_POST['tel'];
              $mdp = $_POST['pswd'];
              $mdpp = $_POST['pswdd'];
              if ($mdp == $mdpp) {
                $ut = new Utilisateur($nom, $prenom, $utName, $email, $numTel, $mdp);
                $dao->createUt($ut);
                header("Location: page_login.php");
              } else {
                echo "<div class='alert alert-danger'><strong>Les deux mots de passe doivent être identiques.</strong></div>";
              }
            }
            ?>
          </div>
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