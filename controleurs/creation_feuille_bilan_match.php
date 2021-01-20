<?php

	if(session_status()==PHP_SESSION_NONE)
	    session_start();

	if(file_exists('../php/fonctions.php'))
	    require_once('../php/fonctions.php');
	// Fonction de chargement de classe
	spl_autoload_register('chargerClass');


	$view = "vue_feuille_bilan_match";
?>