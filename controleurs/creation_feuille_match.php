<?php
	if(session_status()==PHP_SESSION_NONE)
		session_start();

	if(file_exists('../php/fonctions.php'))
		require_once('../php/fonctions.php');
	// Fonction de chargement de classe
	spl_autoload_register('chargerClass');

	$equipes_obj = new EquipeManager();
	$equipes = $equipes_obj->readAll();

	$equipesmatch_obj = new EquipeMatchManager();
	$equipesmatch = $equipesmatch_obj->readAll();

	$arbitres_obj = new ArbitreManager();
	$arbitres = $arbitres_obj->readAll();

	$joueurs_obj = new JoueurManager();
	$joueurs = $joueurs_obj->readAll();

	$match_obj = new FeuilleMatchManager();
	$matchs = $match_obj->readAll();

	$view = "vue_init_feuille_match";

	if(isset($_POST['get_ville_from_equipe_selection'])){
		$to_return = "";
		foreach($equipes as $equipe){
			if($equipe->getid_equipe()==$_POST['get_ville_from_equipe_selection'])
				$to_return = $equipe->getville_club().' - '.$equipe->getstade_club();
		}
		echo $to_return;
	}

	if(isset($_POST['creation_feuille_match'])){
		$equipe_dom = $_POST['select_equipe_domicile'];
		$equipe_ext = $_POST['select_equipe_exterieur'];
		$arbitre = $_POST['select_arbitre_princiçpal'];
		$arbitre_assist1 = $_POST['select_arbitre_assistant1'];
		$arbitre_assist2 = $_POST['select_arbitre_assistant2'];
		$localisation = $_POST['localisation_base'];
		$localisation_sub = $_POST['localisation_substitut'];
		$date = format_date($_POST['date_match']);

		//Création de l'objet feuille de match
		$fm = new FeuilleMatch();
		$fm->setlieu_match($localisation);
		$fm->setlieu_substitut($localisation_sub);
		$fm->setdate_match($date);

		//Création des tableaux de joueurs de l'équipe domicile et l'équipe ext
		/*$tab_equipe_dom = [];
		$tab_equipe_ext = [];
		foreach($joueurs as $joueur){
			if($joueur->getid_equipe()==$equipe_dom || $joueur->getid_equipe()==$equipe_ext){
				$jm = new JoueurMatch();
				$jm->setid_joueur($joueur->getid_joueur());
				$jm->getstatut_match($joueur->getstatut_joueur());
				$jm->setposte_match($joueur->getposte_joueur());
				$jm->setposte_match($joueur->getposte_joueur());
				$jm->setposte_match($joueur->getposte_joueur());
			}
		}*/
		
		//Création de la feuille de match en bdd
		$fmm = new FeuilleMatchManager();
		$id_match = $fmm->createFeuilleMatch($fm);

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
		$emm->createEquipeMatch($em);
		
		//Création de l'arbitrage match en bdd
		$emm = new ArbitrageMatchManager();
		$emm->createArbitrageMatch($am);
	}

	if(isset($_POST['get_equipes'])){
    $tab = [];
    foreach($equipes as $equipe){
      array_push($tab,array('id'=>$equipe->getid_equipe(),'nom'=>$equipe->getnom_club(),'ville'=>$equipe->getville_club(),'stade'=>$equipe->getstade_club()));
    }
    echo json_encode($tab);
	}
	if(isset($_POST['get_arbitres'])){
    $tab = [];
    foreach($arbitres as $arbitre){
      array_push($tab,array('id'=>$arbitre->getid_arbitre(),'nom'=>$arbitre->getnom_arbitre(),'prenom'=>$arbitre->getprenom_arbitre()));
    }
    echo json_encode($tab);
	}
	if(isset($_POST['get_matchs'])){
    $tab = [];
    foreach($matchs as $match){
    	$equipe_dom;
    	$equipe_ext;
	    foreach($equipesmatch as $equipes_){
	      if($match->getid_match()==$equipes_->getid_match()){
	      	array_push($tab,array('id_equipe_dom'=>$equipes_->getequipe_domicile(),'id_equipe_ext'=>$equipes_->getequipe_exterieur(),'date'=>$match->getdate_match()));
	      }
	    } 
    }
    echo json_encode($tab);
	}