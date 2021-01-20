<?php
	// Fonction de chargement de classe
	function chargerClass($className){
		if(file_exists('./modeles/'.$className.'.php'))
	  	require_once('./modeles/'.$className.'.php');
	  else if(file_exists('../modeles/'.$className.'.php'))
	  	require_once('../modeles/'.$className.'.php');
	}

	function format_date($date){
		$tab_date = explode("/", $date);
		$date = $tab_date[2].'-'.$tab_date[1].'-'.$tab_date[0];
		return $date;
	}

	function deformat_date($date){
		$tab_date = explode("-", $date);
		$date = $tab_date[2].'/'.$tab_date[1].'/'.$tab_date[0];
		return $date;
	}
?>