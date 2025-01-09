<?php
    //Class utilisateur
    class Administrateur{

        //Attributs

        private $nomUtilisateur;
        private $motDePasse;

        //constructeur
        public function __construct($unNomUtilisateur, $unMotDePasse){
            $this->nomUtilisateur = $unNomUtilisateur;
            $this->motDePasse = $unMotDePasse;
        }

        //accesseurs
        public function getNomUtilisateur(){return $this->nomUtilisateur;}
        public function getMotDePasse(){return $this->motDePasse;}

        //mutateurs
        public function setNomUtilisateur($nouveauNomUtilisateur){$this->nomUtilisateur = $nouveauNomUtilisateur;}
        public function setMotDePasse($nouveauMotDePasse){$this->motDePasse = $nouveauMotDePasse;}

        //Affichage
        public function __toString(){
            return "Nom d'utilisateur : ".$this->nomUtilisateur.", Mot de passe : ".$this->motDePasse;
        }
    }
?>