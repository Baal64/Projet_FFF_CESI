<?php
	if(session_status()==PHP_SESSION_NONE)
		session_start();

	if(file_exists('../php/fonctions.php'))
		require_once('../php/fonctions.php');
	// Fonction de chargement de classe
	spl_autoload_register('chargerClass');

	$equipes_obj = new EquipeManager();
	$equipes = $equipes_obj->readAll();

	$arbitres_obj = new ArbitreManager();
	$arbitres = $arbitres_obj->readAll();

	if(isset($_POST['modif_feuille_match']) || isset($_POST['modification_feuille_match'])){
		$id_match = isset($_POST['modif_feuille_match']) ? $_POST['modif_feuille_match'] : $_POST['modification_feuille_match'];

		$fmm = new FeuilleMatchManager();
		$fm = $fmm->read($id_match);

		$emm = new EquipeMatchManager();
		$em = $emm->read($id_match);

		$amm = new ArbitrageMatchManager();
		$am = $amm->read($id_match);
	}
	$view = "vue_modif_feuille_match";

	if(isset($_POST['get_ville_from_equipe_selection'])){
		$to_return = "";
		foreach($equipes as $equipe){
			if($equipe->getid_equipe()==$_POST['get_ville_from_equipe_selection'])
				$to_return = $equipe->getville_club().' - '.$equipe->getstade_club();
		}
		echo $to_return;
	}

	if(isset($_POST['modification_feuille_match'])){
		$equipe_dom = $_POST['select_equipe_domicile'];
		$equipe_ext = $_POST['select_equipe_exterieur'];
		$arbitre = $_POST['select_arbitre_princiçpal'];
		$arbitre_assist1 = $_POST['select_arbitre_assistant1'];
		$arbitre_assist2 = $_POST['select_arbitre_assistant2'];
		$localisation = $_POST['localisation_base'];
		$localisation_sub = $_POST['localisation_substitut'];
		$date = format_date($_POST['date_match']);
		$id_match = $_POST['modification_feuille_match'];

		//Création de l'objet feuille de match
		$fm = new FeuilleMatch();
		$fm->setid_match($id_match);
		$fm->setlieu_match($localisation);
		$fm->setlieu_substitut($localisation_sub);
		$fm->setdate_match($date);
		
		//Création de la feuille de match en bdd
		$fmm = new FeuilleMatchManager();
		$fmm->updateFeuilleMatch($fm);

		//Création de l'objet equipe match
		$em = new EquipeMatch();
		$em->setequipe_domicile($equipe_dom);
		$em->setequipe_exterieur($equipe_ext);
		$em->setid_match($id_match);

		//Création de l'objet arbitrage match
		$am = new ArbitrageMatch();
		$am->setarbitre_principal($arbitre);
		$am->setarbitre_adj_un($arbitre_assist1);
		$am->setarbitre_adj_deux($arbitre_assist2);
		$am->setid_match($id_match);

		//Création de l'equipe match en bdd
		$emm = new EquipeMatchManager();
		$emm->updateEquipeMatch($em);
		
		//Création de l'arbitrage match en bdd
		$emm = new ArbitrageMatchManager();
		$emm->updateArbitrageMatch($am);
	}