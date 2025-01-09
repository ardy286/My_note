<?php
    //Classe Document
    class Document{

        //Attributs
        private $nomDocument;
        private $contenuDocument;

        //Constructeur
        public function __construct($nom = "", $contenu = ""){
            $nomDocument = $nom;
            $contenuDocument = $contenu;
        }

        //getteurs
        public function getNomDocument(){return $this->nomDocument;}
        public function getContenuDocument(){return $this->contenuDocument;}

        //muttateurs
        public function setNom($nom){$this->nomDocument=$nom;}
        public function setContenu($contenu){$this->contenuDocument=$contenu;}

        //Affichage
        public function __toString(){
            $message = $this->nomDocument. nl2br(":\n"). $this->$contenuDocument;
            return $message;
        }
    }
?>