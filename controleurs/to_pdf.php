<?php
    if(session_status()==PHP_SESSION_NONE)
    session_start();

	if(file_exists('../php/fonctions.php'))
		require_once('../php/fonctions.php');
	// Fonction de chargement de classe
	spl_autoload_register('chargerClass');

    if(isset($_POST['to_pdf'])){
        $id_match = $_POST['to_pdf'];
    }


    function readNomClubsFromMatch($id_match){
        global $equipematchmanager;
        $equipes = $equipematchmanager->readNomClubs($id_match);
        return array('equipe_domicile' => $equipes[0]->getnom_club(),'equipe_exterieur' => $equipes[1]->getnom_club());
    }
    function readIdClubsFromMatch($id_match){
        global $equipematchmanager;
        $equipes = $equipematchmanager->readIdClubs($id_match);
        return array('equipe_domicile' => $equipes[0],'equipe_exterieur' => $equipes[1]);
    }

    function getNbButsByEquipe($id_equipe,$id_match){
        global $butsmatch,$listejoueurs,$listeequipe;
        $tab_buts = [];
        foreach ($butsmatch as $but){
            if($but->getid_match()==$id_match){
                foreach ($listejoueurs as $joueur) {
                    if($but->getid_joueur()==$joueur->getid_joueur() && $joueur->getid_equipe()==$id_equipe){
                        foreach ($listeequipe as $equipe) {
                           if($equipe->getid_equipe()==$id_equipe)
                            array_push($tab_buts, array('but'=>$but,'joueur'=>$joueur,'equipe'=>$equipe));
                        }
                    }
                }
            }
        }
        return $tab_buts;
    }

    function getNbButsByMatch($id_match){
        global $butsmatch,$listejoueurs,$listeequipe;
        $tab_buts = [];
        foreach ($butsmatch as $but){
            if($but->getid_match()==$id_match){
                foreach ($listejoueurs as $joueur) {
                    if($but->getid_joueur()==$joueur->getid_joueur()){
                        foreach ($listeequipe as $equipe) {
                           if($equipe->getid_equipe()==$joueur->getid_equipe())
                                array_push($tab_buts, array('but'=>$but,'joueur'=>$joueur,'equipe'=>$equipe));
                        }
                    }
                }
            }
        }
        return $tab_buts;
    }

    function getCartonsByMatch($id_match){
        global $cartonsmatch,$listejoueurs,$listeequipe;
        $tab_cartons = [];
        foreach ($cartonsmatch as $carton){
            if($carton->getid_match()==$id_match){
                foreach ($listejoueurs as $joueur) {
                    if($carton->getid_joueur()==$joueur->getid_joueur()){
                        foreach ($listeequipe as $equipe) {
                           if($equipe->getid_equipe()==$joueur->getid_equipe())
                                array_push($tab_cartons, array('carton'=>$carton,'joueur'=>$joueur,'equipe'=>$equipe));
                        }
                    }
                }
            }
        }
        return $tab_cartons;
    }

    function getJoueurMatchByEquipe($id_equipe,$id_match){
        global $listejoueursmatchs,$listejoueurs;
        $tab_joueurs = [];
        foreach ($listejoueursmatchs as $joueur_match){
            if($joueur_match->getid_match()==$id_match){
                foreach ($listejoueurs as $joueur) {
                    if($joueur_match->getid_joueur()==$joueur->getid_joueur() && $joueur->getid_equipe()==$id_equipe){
                        array_push($tab_joueurs, array('joueur'=>$joueur,'joueur_match'=>$joueur_match));
                    }
                }
            }
        }
        return $tab_joueurs;
    }

    function getLogoEtMaillotByEquipe($id_equipe){
        global $listeequipe;
        $tab_infos = [];
        foreach ($listeequipe as $equipe) {
            if($equipe->getid_equipe()==$id_equipe){
                $tab_infos = array('logo'=>$equipe->getlogo_club(),'maillot_dom'=>$equipe->getmaillot_dom(),'maillot_ext'=>$equipe->getmaillot_ext());
            }
        }
        return $tab_infos;
    }


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

    $butmanager = new ButManager();
    $butsmatch = $butmanager->readAll();

    $cartonmanager = new CartonManager();
    $cartonsmatch = $cartonmanager->readAll();

    $listeinfosmatch = readNomClubsMatch();
    $listeinfospostmatch = readPostMatch();

    if(isset($_POST['to_pdf'])){
        $tab_noms_equipe = readNomClubsFromMatch($id_match);
        $tab_ids_equipe = readIdClubsFromMatch($id_match);

        $joueursDom = $joueurmanager->readByEquipe($tab_ids_equipe['equipe_domicile']);
        $joueursExt = $joueurmanager->readByEquipe($tab_ids_equipe['equipe_exterieur']);

        $joueurs_dom = getJoueurMatchByEquipe($tab_ids_equipe['equipe_domicile'],$id_match);
        $joueurs_ext = getJoueurMatchByEquipe($tab_ids_equipe['equipe_exterieur'],$id_match);

        $infos_dom = getLogoEtMaillotByEquipe($tab_ids_equipe['equipe_domicile']);
        $infos_ext = getLogoEtMaillotByEquipe($tab_ids_equipe['equipe_exterieur']);

        $buts_dom = getNbButsByEquipe($tab_ids_equipe['equipe_domicile'],$id_match);
        $buts_ext = getNbButsByEquipe($tab_ids_equipe['equipe_exterieur'],$id_match);
        $buts = getNbButsByMatch($id_match);
        $cartons = getCartonsByMatch($id_match);
    }

    $view = "vue_to_pdf";
