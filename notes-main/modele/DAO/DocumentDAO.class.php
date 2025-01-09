<?php
// On inclut la connexion à la base de données et la classe Document
include_once('connexionBD.class.php');
include_once('modele/Document.class.php');

// Classe DocumentDAO pour interagir avec la base de données
class DocumentDAO
{
    // Méthode pour créer un document en base de données
    public static function createDoc($nomUt, $doc, $contenuDoc)
    {
        try {
            // On se connecte à la base de données
            $db = ConnexionBD::getInstance();

            // On prépare notre requête SQL
            $pstm = $db->prepare("INSERT INTO DOCUMENT (UTNAME, NOMDOC, CONTENUDOC) VALUES (:u,:n,:c)");

            // On exécute la requête avec les paramètres et on retourne le résultat
            return $pstm->execute(array(
                ':u' => $nomUt,
                ':n' => $doc,
                ':c' => $contenuDoc
            ));
        } catch (PDOException $e) {
            // En cas d'erreur, on la lance
            throw $e;
        }
    }

    // Méthode pour trouver le nom d'un document en base de données
    public static function findNomDoc($nomUt)
    {
        try {
            // On se connecte à la base de données
            $cnx = ConnexionBD::getInstance();

            // On prépare notre requête SQL
            $res = $cnx->prepare('SELECT NOMDOC FROM DOCUMENT WHERE UTNAME = :u');
            $res->execute(array(':u' => $nomUt));

            // On crée une liste pour stocker les résultats
            $liste = array();

            // On ajoute chaque résultat à la liste
            foreach ($res as $row) {
                array_push($liste, $row['NOMDOC']);
            }

            // On libère les ressources et on ferme la connexion
            $res->closeCursor();
            ConnexionBD::close();

            // On retourne la liste des noms de documents
            return $liste;
        } catch (PDOException $e) {
            // En cas d'erreur, on l'affiche
            print "Erreur!: " . $e->getMessage() . "<br/>";
        }
    }

    // Méthode pour trouver un document en base de données
    public static function findDoc($nomDoc)
    {
        try {
            // On se connecte à la base de données
            $cnx = ConnexionBD::getInstance();

            // On crée un nouvel objet Document
            $doc = new Document();

            // On prépare notre requête SQL
            $res = $cnx->prepare('SELECT NOMDOC, CONTENUDOC FROM DOCUMENT WHERE NOMDOC = :u');
            $res->execute(array(':u' => $nomDoc));

            // Si on a des résultats, on les assigne à notre objet Document
            if ($res->rowCount() != 0) {
                if ($rangee = $res->fetch()) {
                    $doc->setNom($rangee["NOMDOC"]);
                    $doc->setContenu($rangee["CONTENUDOC"]);
                }
            } else {
                return null;
            }

            // On libère les ressources et on ferme la connexion
            $res->closeCursor();
            ConnexionBD::close();

            // On retourne le document
            return $doc;
        } catch (PDOException $e) {
            // En cas d'erreur, on l'affiche
            print "Erreur!: " . $e->getMessage() . "<br/>";
        }
    }

    // Méthode pour mettre à jour le nom d'un document en base de données
    public function updateNom($nomDoc, $nouveauNom)
    {
        try {
            // On se connecte à la base de données
            $db = ConnexionBD::getInstance();

            // On prépare notre requête SQL
            $pstm = $db->prepare("UPDATE DOCUMENT SET NOMDOC = :nn WHERE NOMDOC = :n");

            // On exécute la requête avec les paramètres et on retourne le résultat
            return $pstm->execute(array(
                ':n' => $nomDoc,
                ':nn' => $nouveauNom
            ));
        } catch (PDOException $e) {
            // En cas d'erreur, on la lance
            throw $e;
        }
    }

    // Méthode pour supprimer un document en base de données
    public function deleteNote($nomNote)
    {
        try {
            // On se connecte à la base de données
            $db = ConnexionBD::getInstance();

            // On prépare notre requête SQL
            $pstm = $db->prepare("DELETE FROM DOCUMENT WHERE NOMDOC = :n");
            $pstm->bindParam(':n', $nomNote);

            // On exécute la requête et on retourne le résultat
            return $pstm->execute();
        } catch (PDOException $e) {
            // En cas d'erreur, on la lance
            throw $e;
        }
    }
}
