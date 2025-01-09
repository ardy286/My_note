<?php
include_once('connexionBD.class.php');
include_once('modele/Utilisateur.class.php');

//Insérer utilisateur
class UtilisateurDAO
{
    public static function createUt($ut)
    {
        try {
            $db = ConnexionBD::getInstance();
            $pstm = $db->prepare("INSERT INTO UTILISATEUR (NOMUT ,PRENOMUT ,UTNAME, EMAILUT, NUMEROUT, MDPUT)"
                . " VALUES (:n,:p,:u,:e,:f,:m)");
            return $pstm->execute(array(
                ':n' => $ut->getNom(),
                ':p' => $ut->getPrenom(),
                ':u' => $ut->getNomUtilisateur(),
                ':e' => $ut->getEmail(),
                ':f' => $ut->getTelephone(),
                ':m' => $ut->getMotDePasse()
            ));
        } catch (PDOException $e) {
            throw $e;
        }
    }

    static public function findAll()
    {
        try {
            $connexion = ConnexionBD::getInstance();
        } catch (Exception $e) {

            throw new Exception("Impossible d'obtenir la connexion à la BD");
        }

        $tableau = [];
        $requete = $connexion->prepare("SELECT * FROM UTILISATEUR");
        $requete->execute();
        foreach ($requete as $enr) {
            $unUt = new Utilisateur($enr['NOMUT'], $enr['PRENOMUT'], $enr['UTNAME'], $enr['EMAILUT'], $enr['NUMEROUT'], $enr['MDPUT']);
            array_push($tableau, $unUt);
        }
        $requete->closeCursor();
        ConnexionBD::close();
        return $tableau;
    }

    public static function find($nom)
    {
        try {
            $cnx = ConnexionBD::getInstance();

            $utilisateur = null;
            $resNom = $cnx->prepare('SELECT NOMUT, PRENOMUT, UTNAME, EMAILUT, NUMEROUT, MDPUT FROM UTILISATEUR WHERE UTNAME = :n');
            $resNom->execute(array(':n' => $nom));
            if ($resNom->rowCount() != 0) {
                if ($rangee = $resNom->fetch()) {
                    $utilisateur =  new Utilisateur($rangee["NOMUT"], $rangee["PRENOMUT"], $rangee["UTNAME"], $rangee["EMAILUT"], $rangee["NUMEROUT"], $rangee["MDPUT"]);
                }
            }

            $resNom->closeCursor();
            ConnexionBD::close();

            //retourner la liste des produits
            return $utilisateur;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }

    public static function findName($nom)
    {
        try {
            $cnx = ConnexionBD::getInstance();

            $nomComplet = "";
            $resNom = $cnx->prepare('SELECT PRENOMUT, NOMUT FROM UTILISATEUR WHERE UTNAME = :n');
            $resNom->execute(array(':n' => $nom));
            if ($resNom->rowCount() != 0) {
                if ($rangee = $resNom->fetch()) {
                    $nomComplet =  ucfirst($rangee["PRENOMUT"]) . " " . strtoupper($rangee["NOMUT"]);
                }
            }

            $resNom->closeCursor();
            ConnexionBD::close();

            //retourner la liste des produits
            return $nomComplet;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }

    public static function findMdp($nom)
    {
        try {
            $cnx = ConnexionBD::getInstance();

            $mdp = "";
            $resNom = $cnx->prepare('SELECT MDPUT FROM UTILISATEUR WHERE UTNAME = :n');
            $resNom->execute(array(':n' => $nom));
            if ($resNom->rowCount() != 0) {
                if ($rangee = $resNom->fetch()) {
                    $mdp =  $rangee["MDPUT"];
                }
            }

            $resNom->closeCursor();
            ConnexionBD::close();

            //retourner la liste des produits
            return $mdp;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }

    public static function findNonUt($nom)
    {
        try {
            $cnx = ConnexionBD::getInstance();

            $nomUt = "";
            $resNom = $cnx->prepare('SELECT UTNAME FROM UTILISATEUR WHERE UTNAME = :n');
            $resNom->execute(array(':n' => $nom));
            if ($resNom->rowCount() != 0) {
                if ($rangee = $resNom->fetch()) {
                    $nomUt =  $rangee["UTNAME"];
                }
            }

            $resNom->closeCursor();
            ConnexionBD::close();

            //retourner la liste des produits
            return $nomUt;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }

    public function delete($nomUt)
    {
        try {
            $db = ConnexionBD::getInstance();
            $pstm = $db->prepare("DELETE FROM UTILISATEUR WHERE UTNAME = :n");
            $pstm->bindParam(':n', $nomUt);

            // Debugging log
            echo 'Deleting user: ' . $nomUt;
            $result = $pstm->execute();

            // Logging result of execution
            if ($result) {
                echo 'Deletion successful';
            } else {
                echo 'Deletion failed';
            }

            return $result;
        } catch (PDOException $e) {
            // Logging exception message
            echo 'PDOException in delete(): ' . $e->getMessage();
            throw $e;
        }
    }
}
