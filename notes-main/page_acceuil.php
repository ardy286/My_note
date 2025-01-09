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

<body class="page_acceuil">
    <header>
        <nav class="navbar navbar-expand-sm ">
            <div class="container">
                <a class="navbar-brand" href="?action=page_avantAcceuil.php">Mes Notes</a>
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
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link active" href="page_acceuil.php">Nouveau note</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?visualiser">Mes notes</a>
            </li>
        </ul>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-6">
                    <p style="text-align:center">Entrer Votre texte:</p>
                    <form class="needs-validation" method="post">
                        <div class="form-group">
                            <textarea type="form-control" class="form-control" placeholder="Entrez votre texte ici." name="texteDocument" rows="20" style="resize: none"></textarea>
                            <div>
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5"><input type="text" class="form-control" placeholder="Entrez le nom du document ici" name="nomTexteDocument"></div>
                                    <?php
                                    // check if the name doesn't already exist, if yes, display an error message and if no add it to the db
                                    if (isset($_POST['texteDocument'])) {
                                        if ($_POST['nomTexteDocument'] != "" && $_POST['texteDocument'] != "") {
                                            if ($daoDoc->findDoc($_POST['nomTexteDocument']) == null) {
                                                $nomUt = $_SESSION['utName'];
                                                $doc = $_POST['texteDocument'];
                                                $nomDoc = $_POST['nomTexteDocument'];
                                                $daoDoc->createDoc($nomUt, $nomDoc, $doc);
                                                header("Location: page_acceuil.php");
                                            } else {
                                                echo "<script>alert('Ce nom de document existe déjà.')</script>";
                                            }
                                        }
                                    }
                                    ?>
                                    <div class="col-sm-2"><button type="submit" class="btn btn-primary">Ajouter</button></div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['texteDocument'])) {
                        if ($_POST['nomTexteDocument'] == "" && $_POST['texteDocument'] == "") {
                            echo "<div class='alert alert-danger'><strong>Vous n'avez rien entrer.</strong></div>";
                        } else if ($_POST['texteDocument'] == "") {
                            echo "<div class='alert alert-danger'><strong>Veuillez entrer le contenu du document.</strong></div>";
                        } else if ($_POST['nomTexteDocument'] == "") {
                            echo "<div class='alert alert-danger'><strong>Veuillez entrer le nom du document.</strong></div>";
                        }
                    }
                    ?>
                </div>
                <div class="col-sm-3"></div>
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