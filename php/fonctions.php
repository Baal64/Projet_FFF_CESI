<?php 
	
	//Liste des fonctions utiles
	function post_control($string){
		if(isset($string) && trim($string)!="" && $string!=NULL)
			return true;
		else
			return false;
	}
	
?>