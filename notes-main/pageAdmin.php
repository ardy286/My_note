<?php
include_once("modele\DAO\UtilisateurDAO.class.php");
include_once("modele/DAO/DocumentDAO.class.php");
include_once("modele/Document.class.php");
include_once("modele/Utilisateur.class.php");
include_once("modele/DAO/AdministrateurDAO.class.php");
include_once("modele/Administrateur.class.php");
$dao = new UtilisateurDAO();
$daoADM = new AdministrateurDAO();
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

<body class="page_Admin">
    <header>
        <nav class="navbar navbar-expand-sm ">
            <div class="container">
                <a class="navbar-brand" href="page_login.php">Mes Notes</a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href=" ?deconnecter" ">Déconexion</a>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class=" container-fluid">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <h1>liste d'utilisateurs</h1>
                                    <br>
                                    <?php
                                    $listeUt = $dao->findAll();
                                    echo '<script>console.log("Number of users found: ' . count($listeUt) . '");</script>';

                                    foreach ($listeUt as $ut) {
                                        echo "<div><p>" . $ut->getNom() . " " . $ut->getPrenom() . "</p><a href='?action=" .
                                            $ut->getNomUtilisateur() . "' class='text-danger'>Supprimer</a></div>";
                                    }
                                    if ((isset($_REQUEST["action"]))) {
                                        echo '<script>console.log("Deleting user: ' . $_REQUEST["action"] . '");</script>';

                                        $dao->delete($_REQUEST["action"]);

                                        echo '<script>console.log("User deletion completed");</script>';

                                        // alert de suppression
                                        echo "<script>alert( " . $_REQUEST["action"] . " )</script>";
                                        header("Location: pageAdmin.php");
                                    }
                                    ?>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
            </div>
            </main>
            <?php
            if (isset($_REQUEST['deconnecter'])) {
                unset($_SESSION);
                session_destroy();
                header("Location: page_loginAdmin.php");
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