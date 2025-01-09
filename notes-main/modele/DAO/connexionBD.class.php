<?php
	// Le fichier configBD.interface.php contient le mot de passe, le nom d’utilisateur
	// avec les constantes BD_HOTE, BD_NOM, BD_UTILISATEUR et BD_MOT_PASSE
	//include_once('/modele/DAO/configs/configBD.interface.php');
	include_once('configs/configBD.interface.php');

	// Classe englobante de PDO
	class ConnexionBD {	
		// Attribut de classe représentant la connexion à la BD (de type PDO)
		private static $instance = null;

		// Constructeur privé défini afin d'empecher l'instanciation de la classe 
		private function __construct() {}
		
		// Fonction statique qui gère la création de l’instance PDO et la retourne pour que les composants de l'application l'utilise.
		// 	Si la connexion est deja ouverte, la fonction se contente de la retourner, sinon va l'ouvrir et la retourner
		public static function getInstance() { 
			if(self::$instance == null) {
				$configuration="mysql:host=".ConfigBD::BD_HOTE.";dbname=".ConfigBD::BD_NOM;

				self::$instance = new PDO($configuration, ConfigBD::BD_UTILISATEUR, ConfigBD::BD_MOT_PASSE);

				self::$instance->exec("SET character_set_results = 'utf8'");		
			}
			return self::$instance;
		}
	  
		// Fonction qui ferme la connexion
		public static function close() {
			self::$instance = null;
		}
	}
?>
