<?php
    if(session_status()==PHP_SESSION_NONE)
    session_start();

	if(file_exists('../php/fonctions.php'))
		require_once('../php/fonctions.php');
	// Fonction de chargement de classe
	spl_autoload_register('chargerClass');

	$feuillematchmanager = new FeuilleMatchManager();
	$listematchs = $feuillematchmanager->readAll();

	$equipematchmanager = new EquipeMatchManager();
	$listeequipesmatch = $equipematchmanager->readAll();

    $joueurmatchmanager = new JoueurMatchManager();
    $listejoueursmatchs = $joueurmatchmanager->readAll();

	$equipemanager = new EquipeManager();
	$listeequipe = $equipemanager->readAll();
    
    $joueurmanager = new JoueurManager();
    $listejoueurs = $joueurmanager->readAll();

    $listeinfosmatch = readNomClubsMatch();
    $listeinfospostmatch = readPostMatch();

    function readNomClubsMatch(){
        global $listematchs, $equipematchmanager;
        $infosmatchs = [];
        foreach ($listematchs as $match) {

            $equipes = $equipematchmanager->readNomClubs($match->getid_match());
            array_push($infosmatchs,['id_match' => $match->getid_match(),
                'equipe_domicile' => $equipes[0]->getnom_club(),
                'equipe_exterieur' => $equipes[1]->getnom_club()]);
        }
        return $infosmatchs;
    }

    function readPostMatch(){
        global $listematchs, $equipematchmanager,$listejoueursmatchs,$listejoueurs;
        $infosmatchs = [];
        foreach ($listematchs as $match) {
            $equipe = $equipematchmanager->readIdClubs($match->getid_match());
            $equipedom = $equipe[0];
            $equipeext = $equipe[1];
            $equipe_dom_ok = false;
            $equipe_ext_ok = false;
            foreach ($listejoueursmatchs as $joueur_match) {
                if($match->getid_match()==$joueur_match->getid_match()){
                    foreach ($listejoueurs as $joueur) {
                        if($joueur->getid_equipe()==$equipedom && $joueur_match->getid_joueur()==$joueur->getid_joueur())
                            $equipe_dom_ok = true;
                        else if($joueur->getid_equipe()==$equipeext && $joueur_match->getid_joueur()==$joueur->getid_joueur())
                            $equipe_ext_ok = true;
                    }
                }
            }
            if($equipe_dom_ok && $equipe_ext_ok){
                $equipes = $equipematchmanager->readNomClubs($match->getid_match());
                array_push($infosmatchs,['id_match' => $match->getid_match(),
                    'equipe_domicile' => $equipes[0]->getnom_club(),
                    'equipe_exterieur' => $equipes[1]->getnom_club()]);
            }
        }
        return $infosmatchs;
    }


    $view = "vue_accueil_presentateur";
