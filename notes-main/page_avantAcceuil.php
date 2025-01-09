<?php
include_once("modele/DAO/UtilisateurDAO.class.php");
include_once("modele/DAO/DocumentDAO.class.php");
include_once("modele/Document.class.php");
include_once("modele/Utilisateur.class.php");
$dao = new UtilisateurDAO();
$daoDoc = new DocumentDAO();
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'acceuil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm ">
            <div class="container">
                <a class="navbar-brand" href="page_avantAcceuil.php">Mes Notes</a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href=" ?deconnecter" ">Déconexion</a>
                    </li>
                    <li class=" nav-item">
                            <a href="pageUt.php">
                                <?php
                                echo "<a class='nav-link' href='pageUt.php'>", $_SESSION['nomPrenom'], "</a>"
                                ?>
                            </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <br>
        <br>
        <div class=" container" style="background-image: url('./images/ecriree_flou.jpg');background-repeat: no-repeat;background-attachment: fixed">
            <a href="page_acceuil.php"><img src="./images/ecriree.jpg" class="mx-auto d-block" style="width:50%"></a>
        </div>
        <br>
        <br>
        <br>
        <div class="container" style="background-image: url('./images/visualiser_flou.jpg');background-repeat: no-repeat;background-attachment: fixed">
            <a href="?visualiser"><img src="./images/visualiser.jpg" class="mx-auto d-block" style="width:50%"></a>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
    </main>
    <?php
    if (isset($_REQUEST['deconnecter'])) {
        unset($_SESSION);
        session_destroy();
        header("Location: page_login.php");
    }
    if (isset($_REQUEST['visualiser'])) {
        $nomUt = $_SESSION['utName'];
        $listeNom = $daoDoc->findNomDoc($nomUt);
        if (count($listeNom) == 0) {
            header("Location: pageNonDocument.php");
        } else {
            $_SESSION['listeNom'] = $listeNom;
            header("Location: page_visuel.php");
        }
    }
    ?>
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