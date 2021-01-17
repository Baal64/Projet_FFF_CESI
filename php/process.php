<?php 
	session_start();

	//Inclusions des fichiers utiles
	include('./class_sql.php');
	include('./fonctions.php');
	//Création d'un objet de connexion à la base de données
	$objsql = new sql();

	//Si on est sur un utilisateur connecté
	if($_SESSION['connected']){
		//Récupérations des arbitres
		if(isset($_POST['get_arbritres'])){
			//Tableau de retour
			$tab_arbitres = [];
			//On lance la requête
			$sql = "SELECT * FROM arbitres";
			$objsql->query($sql,"Récupération des arbitres");
			if($objsql->nb_result()>0){
				while($res = $objsql->fetch_assoc()){
					$id = $res['id_arbitre'];	
					$nom = $res['nom_arbitre'];	
					$prenom = $res['prenom_arbitre'];	
					$nat = $res['nat_arbitre'];
					array_push($tab_arbitres, array('id_arbitre'=>$id,'nom_arbitre'=>$nom,'prenom_arbitre'=>$prenom,'nat_arbitre'=>$nat));	
				}
			}
			echo json_encode($tab_arbitres);
		}

		//Récupérations des équipes
		if(isset($_POST['get_equipes'])){
			//Tableau de retour
			$tab_equipes = [];
			//On lance la requête
			$sql = "SELECT * FROM equipes";
			$objsql->query($sql,"Récupération des équipes");
			if($objsql->nb_result()>0){
				while($res = $objsql->fetch_assoc()){
					$id = $res['id_equipe'];	
					$nom = $res['nom_club'];	
					$ville = $res['ville_club'];	
					$stade = $res['stade_club'];
					$logo = $res['logo_club'];
					$entraineur = $res['entrain_equipe'];
					$entraineur_adj = $res['adj_entrain_equipe'];
					$maillot_dom = $res['maillot_dom'];
					$maillot_ext = $res['maillot_ext'];
					$maillot_gard = $res['maillot_gard'];
					array_push($tab_equipes, array('id_equipe'=>$id,'nom_club'=>$nom,'ville_club'=>$ville,'stade_club'=>$stade,'logo_club'=>$logo,'entrain_equipe'=>$entraineur,'adj_entrain_equipe'=>$entraineur_adj,'maillot_dom'=>$maillot_dom,'maillot_ext'=>$maillot_ext,'maillot_gard'=>$maillot_gard));
				}
			}
			echo json_encode($tab_equipes);
		}
	}
	
?>