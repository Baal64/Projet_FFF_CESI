<?php
if(session_status()==PHP_SESSION_NONE)
    session_start();

if(file_exists('../php/fonctions.php'))
    require_once('../php/fonctions.php');
// Fonction de chargement de classe
spl_autoload_register('chargerClass');

// récupération de l'id de l'equipe
$equipeId = $connected_user['id_equipe_entraineur'];

// récupération des matchs
$matchmanager = new EquipeMatchManager();
$allEquipeMatchs = $matchmanager->readAll();

$listeMatchs = [];

// Edition d'une liste personnalisé en fonction du club
foreach($allEquipeMatchs as $equipeMatch){

  if($equipeMatch->getEquipeDomicile() == $equipeId){
      // récupération des matchs du club
        $feuillematchmanager = new FeuilleMatchManager();
        $feuilleMatch = $feuillematchmanager->read($equipeMatch->getIdMatch());
       array_push($listeMatchs,$feuilleMatch );
    }
}

$view = "vue_accueil_entraineur";

