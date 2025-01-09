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
    <title>Page d'utilisateur</title>
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

                        <a class="nav-link" href=" ?deconnecter" ">Déconexion</a>

                    </li>
                  

                </ul>
            </div>
        </nav>
    </header>
    <main>
        <br>
        <br>
        <br>
        <br>
        <div class=" container-fluid">
                            <img src="./images\ut.jpg" class="rounded-circle mx-auto d-block img-thumbnail" style="width:10%;">
            </div>
            <div class="container-fluid">
                <h4 style="text-align:center"><?php echo $_SESSION['nomPrenom']; ?></h4>
                <p style="text-align:center">Cher(e) utilisateur si vous voulez supprimer votre compte, veuillez cliquer sur le bouton ci-dessous.<br><br>
                <div class="text-danger" style="text-align:center">
                    <strong>Veuillez bien réfléchir avant de cliquer sur le bouton parce que<br>une fois que vous l'avez fait votre compte serra supprimer<br>de manière définitif de notre système ainsi que vos documents.</strong>
                </div>
                </p>
            </div>
            <br>
            <br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-2"><a href="?supprimer" class="btn btn-primary" data-toggle="collapse">_Supprimer votre compte_</a></div>
                    <div class="col-sm-5"></div>
                </div>
            </div>
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

            if (isset($_REQUEST['supprimer'])) {
                $dao->delete($_SESSION['utName']);
                unset($_SESSION);
                session_destroy();
                header("Location: page_login.php");
            }
            ?>

</body>

</html>