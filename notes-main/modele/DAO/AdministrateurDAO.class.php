<?php
    include_once('connexionBD.class.php'); 
    include_once('modele/Administrateur.class.php');

    class AdministrateurDAO{

        public static function findADM($nomADM){
            try {
                $cnx = ConnexionBD::getInstance();
                $ADM = null;
                $res = $cnx->prepare('SELECT UTNAME, MDPUT FROM ADMINISTATEUR WHERE UTNAME = :u');
                $res->execute(array(':u'=>$nomADM));
                if ($res->rowCount() != 0) {
                    if($rangee = $res->fetch()){
                        $ADM = new Administrateur($rangee["UTNAME"], $rangee["MDPUT"]);
                      }
                }
    
                $res->closeCursor();
                ConnexionBD::close();
    
                //retourner la liste des produits
                return $ADM;
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
            }
        }

    }

?>