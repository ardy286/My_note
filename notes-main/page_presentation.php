<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mes notes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-sm ">
      <div class="container">
        <a class="navbar-brand" href="page_presentation.php">Mes Notes</a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="page_login.php">Connecter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#target">À propos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="login-link" href="#footer">Contact</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <section class="main">
    <section class="main1">
      <div class="container text-left">
        <div class="textArea">
          <h1> Bienvenue sur mes notes.</h1>
          <p>Écrivez et organisez vos notes partout ou vous êtes.</p>
          <a class="btn btn-primary" href="#target">Apprendre plus</a>

        </div>
      </div>
    </section>
    <section class="main2" id="target">
      <div class="container text-center">
        <p>Mes Notes offre un stockage illimité, permettant d'accéder a vos notes partout dans
          le monde. Les notes sont organisées par section et date, facilitant la recherche. </p>



      </div>
    </section>
  </section>
  <section id=footer>

    <footer class="footer">
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
            <p><a href="mailto:aristekindy93@gmail.com"><img src="./images/email.png" alt="Logo email" width="7%"></a></p>
          </div>
        </div>
      </div>
    </footer>
  </section>
</body>

</html>