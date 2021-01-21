<?php
session_start();
if(isset($_SESSION['connected_user_data']))
    $connected_user = $_SESSION['connected_user_data'];
else
    $connected_user = false;

require_once('php/fonctions.php');

require_once('./controleurs/connexion.php');

//Si on rencontre un utilisateur connecté, alors on le diregige sur la page adéquate
if($connected_user){
    //On va diriger l'utilisateur en fonction de ses actions
    //die($connected_user['role_utilisateur']);
    if($connected_user['role_utilisateur']=="Présentateur"){
        require_once('./controleurs/accueil_presentateur.php');
    }
    else{
        require_once('./controleurs/accueil_entraineur.php');
    }
    if(isset($_POST['create_feuille_match']) || isset($_POST['creation_feuille_match'])){
        require_once('./controleurs/creation_feuille_match.php');
    }
    if(isset($_POST['modif_feuille_match']) || isset($_POST['modification_feuille_match'])){
        require_once('./controleurs/modification_feuille_match.php');
    }
    if(isset($_POST['modif_feuille_post_match']) || isset($_POST['set_but']) || isset($_POST['set_carton_jaune']) || isset($_POST['set_carton_rouge']) || isset($_POST['set_butext']) || isset($_POST['set_carton_jauneext']) || isset($_POST['set_carton_rougeext'])){
        require_once('./controleurs/feuille_post_match.php');
    }
    if(isset($_POST['edit_equipe_match']) || isset($_POST['select_feuille_match']) || isset($_POST['valid_creation_equipe'])){
        require_once('./controleurs/edition_equipe_match.php');
    }
    if(isset($_POST['to_pdf'])){
        require_once('./controleurs/to_pdf.php');
    }
    require_once('./vues/vue_principale.php');
}
else{ //Sinon on le dirige vers la page de connexion
    require_once('./vues/vue_connexion.php');
}
