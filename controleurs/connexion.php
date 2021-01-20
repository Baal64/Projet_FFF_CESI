<?php
	if(session_status()==PHP_SESSION_NONE)
		session_start();
	
	if(file_exists('../php/fonctions.php'))
		require_once('../php/fonctions.php');
	// Fonction de chargement de classe
	spl_autoload_register('chargerClass');

	if(isset($_POST['connexion'])){
		$identifiant = $_POST['nom_user'];
		$mdp = $_POST['mdpass'];
		$connexion = new Connexion();
		if($connected_user = $connexion->connect($identifiant,$mdp))
			$_SESSION['connected_user_data'] = $connected_user;
	}

	if(isset($_POST['deconnexion'])){
		$connected_user = false;
		session_destroy();
		session_unset();
	}


?>