<?php
	// Fonction de chargement de classe
	function chargerClass($className){
		if(file_exists('./modeles/'.$className.'.php'))
	  	require_once('./modeles/'.$className.'.php');
	  else if(file_exists('../modeles/'.$className.'.php'))
	  	require_once('../modeles/'.$className.'.php');
	}
?>