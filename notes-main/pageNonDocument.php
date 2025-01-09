<?php
include_once("modele/DAO/UtilisateurDAO.class.php");
include_once("modele/DAO/DocumentDAO.class.php");
include_once("modele/Document.class.php");
include_once("modele/Utilisateur.class.php");
$dao = new UtilisateurDAO();
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

<body>
    <header>
        <nav class="navbar navbar-expand-sm ">
            <div class="container">
                <a class="navbar-brand" href="?action=page_avantAcceuil.php">Mes Notes</a>

                <ul class="navbar-nav ml-auto">



                    <li class="nav-item">

                        <a class="nav-link" href="?deconnecter" ">Déconexion</a>

                    </li>
                    <li class=" nav-item">
                            <a href="pageUt.php">
                                <?php
                                echo $_SESSION['nomPrenom'];
                                ?>
                            </a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <main>
        <img src="./images/image2.png" style="width: 100%">
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

</body>

</html>