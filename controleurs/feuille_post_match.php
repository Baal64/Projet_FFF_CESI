<?php
    if(session_status()==PHP_SESSION_NONE)
    session_start();

	if(file_exists('../php/fonctions.php'))
		require_once('../php/fonctions.php');
	// Fonction de chargement de classe
	spl_autoload_register('chargerClass');

    if(isset($_POST['modif_feuille_post_match'])  || isset($_POST['set_but']) || isset($_POST['set_carton_jaune']) || isset($_POST['set_carton_rouge'])  || isset($_POST['set_butext']) || isset($_POST['set_carton_jauneext']) || isset($_POST['set_carton_rougeext'])){
        if(isset($_POST['modif_feuille_post_match']))
            $id_match = $_POST['modif_feuille_post_match'];
        else if(isset($_POST['set_but']))
            $id_match = $_POST['set_but'];
        else if(isset($_POST['set_carton_jaune']))
            $id_match = $_POST['set_carton_jaune'];
        else if(isset($_POST['set_carton_rouge']))
            $id_match = $_POST['set_carton_rouge'];
        else if(isset($_POST['set_butext']))
            $id_match = $_POST['set_butext'];
        else if(isset($_POST['set_carton_jauneext']))
            $id_match = $_POST['set_carton_jauneext'];
        else if(isset($_POST['set_carton_rougeext']))
            $id_match = $_POST['set_carton_rougeext'];
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


    /*if(isset($_POST['set_but'])){
        $id_match = $_POST['set_but'];
        $id_joueur = $_POST['select_joueur'];
        $temps = $_POST['tempsbut'];

        $but = new But();
        $but->settemps_but($temps);
        $but->setid_match($id_match);
        $but->setid_joueur($id_joueur);

        $bm = new ButManager();
        $bm->createBut($but);
    }*/

    if(isset($_POST['set_but'])){
        $id_match = $_POST['set_but'];
        $id_joueur = $_POST['select_joueur'];
        $temps = $_POST['tempsbut'];
        $contre_camp = $_POST['contresoncamp'];

        $but = new But();
        $but->settemps_but($temps);
        $but->setid_match($id_match);
        $but->setid_joueur($id_joueur);
        $but->setcontre_camp($contre_camp);

        $bm = new ButManager();
        $bm->createBut($but);
    }


    if(isset($_POST['set_carton_jaune'])){
        $id_match = $_POST['set_carton_jaune'];
        $id_joueur = $_POST['select_joueur'];
        $temps = $_POST['tempscartonjaune'];

        $carton = new Carton();
        $carton->setcouleur_carton('Jaune');
        $carton->settemps_carton($temps);
        $carton->setid_match($id_match);
        $carton->setid_joueur($id_joueur);

        $cm = new CartonManager();
        $cm->createCarton($carton);
    }

    if(isset($_POST['set_carton_rouge'])){
        $id_match = $_POST['set_carton_rouge'];
        $id_joueur = $_POST['select_joueur'];
        $temps = $_POST['tempscartonrouge'];

        $carton = new Carton();
        $carton->setcouleur_carton('Rouge');
        $carton->settemps_carton($temps);
        $carton->setid_match($id_match);
        $carton->setid_joueur($id_joueur);

        $cm = new CartonManager();
        $cm->createCarton($carton);
    }


    if(isset($_POST['set_butext'])){
        $id_match = $_POST['set_butext'];
        $id_joueur = $_POST['select_joueurext'];
        $temps = $_POST['tempsbutext'];
        $contre_camp = $_POST['contresoncamp'];

        $but = new But();
        $but->settemps_but($temps);
        $but->setid_match($id_match);
        $but->setid_joueur($id_joueur);
        $but->setcontre_camp($id_joueur);

        $bm = new ButManager();
        $bm->createBut($but);
    }
   /* if(isset($_POST['set_butext'])){
        $id_match = $_POST['set_butext'];
        $id_joueur = $_POST['select_joueurext'];
        $temps = $_POST['tempsbutext'];

        $but = new But();
        $but->settemps_but($temps);
        $but->setid_match($id_match);
        $but->setid_joueur($id_joueur);

        $bm = new ButManager();
        $bm->createBut($but);
    }*/


    if(isset($_POST['set_carton_jauneext'])){
        $id_match = $_POST['set_carton_jauneext'];
        $id_joueur = $_POST['select_joueurext'];
        $temps = $_POST['tempscartonjauneext'];

        $carton = new Carton();
        $carton->setcouleur_carton('Jaune');
        $carton->settemps_carton($temps);
        $carton->setid_match($id_match);
        $carton->setid_joueur($id_joueur);

        $cm = new CartonManager();
        $cm->createCarton($carton);
    }

    if(isset($_POST['set_carton_rougeext'])){
        $id_match = $_POST['set_carton_rougeext'];
        $id_joueur = $_POST['select_joueurext'];
        $temps = $_POST['tempscartonrougeext'];

        $carton = new Carton();
        $carton->setcouleur_carton('Rouge');
        $carton->settemps_carton($temps);
        $carton->setid_match($id_match);
        $carton->setid_joueur($id_joueur);

        $cm = new CartonManager();
        $cm->createCarton($carton);
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

    if(isset($_POST['modif_feuille_post_match'])  || isset($_POST['set_but']) || isset($_POST['set_carton_jaune']) || isset($_POST['set_carton_rouge'])  || isset($_POST['set_butext']) || isset($_POST['set_carton_jauneext']) || isset($_POST['set_carton_rougeext'])){
        $tab_noms_equipe = readNomClubsFromMatch($id_match);
        $tab_ids_equipe = readIdClubsFromMatch($id_match);
        $joueursDom = $joueurmanager->readByEquipe($tab_ids_equipe['equipe_domicile']);
        $joueursExt = $joueurmanager->readByEquipe($tab_ids_equipe['equipe_exterieur']);

        $buts_dom = getNbButsByEquipe($tab_ids_equipe['equipe_domicile'],$id_match);
        $buts_ext = getNbButsByEquipe($tab_ids_equipe['equipe_exterieur'],$id_match);
        $buts = getNbButsByMatch($id_match);
        $cartons = getCartonsByMatch($id_match);
    }

    $view = "vue_feuille_post_match";
