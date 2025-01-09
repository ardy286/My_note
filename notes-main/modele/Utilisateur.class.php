<?php
//Class utilisateur
class Utilisateur
{

    //Attributs
    private $nom;
    private $prenom;
    private $nomUtilisateur;
    private $email;
    private $telephone;
    private $motDePasse;
    private $sesDocuments;

    //constructeur
    public function __construct($unNom, $unPrenom, $unNomUtilisateur, $unEmail, $unTelephone, $unMotDePasse)
    {
        $this->nom = $unNom;
        $this->prenom = $unPrenom;
        $this->nomUtilisateur = $unNomUtilisateur;
        $this->email = $unEmail;
        $this->telephone = $unTelephone;
        $this->motDePasse = $unMotDePasse;
    }

    //accesseurs
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getNomUtilisateur()
    {
        return $this->nomUtilisateur;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getTelephone()
    {
        return $this->telephone;
    }
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }
    public function getLeDocument()
    {
        return $this->leDocument;
    }

    //mutateurs
    public function setNom($nouveauNom)
    {
        $this->nom = $nouveauNom;
    }
    public function setPrenom($nouveauPrenom)
    {
        $this->prenom = $nouveauPrenom;
    }
    public function setNomUtilisateur($nouveauNomUtilisateur)
    {
        $this->nomUtilisateur = $nouveauNomUtilisateur;
    }
    public function setEmail($nouveauEmail)
    {
        $this->email = $nouveauEmail;
    }
    public function setTelephone($nouveauTelephone)
    {
        $this->telephone = $nouveauTelephone;
    }
    public function setMotDePasse($nouveauMotDePasse)
    {
        $this->motDePasse = $nouveauMotDePasse;
    }

    //Affichage
    public function __toString()
    {
        return "Nom : " . $this->nom . ", Prénom : " . $this->prenom . ", Nom d'utilisateur : " . $this->nomUtilisateur . ", Email : " . $this->email . ", Telephone : " . $this->telephone . ", Mot de passe : " . $this->motDePasse;
    }
}
