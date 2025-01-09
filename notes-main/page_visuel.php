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
    <title>Page de visualisation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body class="page_visu">
    <header>
        <nav class="navbar navbar-expand-sm ">
            <div class="container">
                <a class="navbar-brand" href="page_presentation.php">Mes Notes</a>
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
    <ul class="nav nav-tabs nav-justified">
        <li class="nav-item">
            <a class="nav-link" href="page_acceuil.php">Nouveau note</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="?visualiser">Mes notes</a>
        </li>
    </ul>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2" style="background-color: #000000c7;color: white;">
                    <nav class="navbar bg">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <ul class="nav flex-column">
                                    <?php
                                    $_SESSION['listeNom'] = $daoDoc->findNomDoc($_SESSION['utName']);
                                    foreach ($_SESSION['listeNom'] as $nom) {
                                        echo "<li class='nav-item'>
                                        <a class='nav-link' href='?action=" . $nom . "' style = 'border-bottom: 2px solid white'>" . $nom . "</a>
                                        </li>";
                                    }
                                    if ((isset($_REQUEST["action"]))) {
                                        $_SESSION["doc"] = $daoDoc->findDoc($_REQUEST["action"]);
                                        header("Location: page_visualisation.php");
                                    }
                                    ?>

                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-6" id="image">
                    <br>
                    <br>
                </div>
            </div>
        </div>
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