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

	$equipemanager = new EquipeManager();
	$listeequipe = $equipemanager->readAll();




     function readNomClubsMatch()

    {    global $listematchs, $equipematchmanager;
        $infosmatchs = [];
        foreach ($listematchs as $match) {

            $equipes = $equipematchmanager->readNomClubs($match->getid_match());
            array_push($infosmatchs,['id_match' => $match->getid_match(),
                'equipe_domicile' => $equipes[0]->getnom_club(),
                'equipe_exterieur' => $equipes[1]->getnom_club()]);
        }
        return $infosmatchs;

    }






    $view = "vue_accueil_presentateur";
