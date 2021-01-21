<?php
if(session_status()==PHP_SESSION_NONE)
    session_start();

if(file_exists('../php/fonctions.php'))
    require_once('../php/fonctions.php');
// Fonction de chargement de classe
spl_autoload_register('chargerClass');

// récupération de l'id de l'equipe
$equipeId = $connected_user['id_equipe_entraineur'];

$feuillematchmanager = new FeuilleMatchManager();
$listematchs = $feuillematchmanager->readAll();

$equipematchmanager = new EquipeMatchManager();
$listeequipesmatch = $equipematchmanager->readAll();

$listeinfosmatch = readNomClubsMatch();

$listeMatchs = [];

function readNomClubsMatch(){
  global $listematchs, $equipematchmanager,$equipeId;
  $infosmatchs = [];
  foreach ($listematchs as $match) {
      $equipes = $equipematchmanager->readNomClubs($match->getid_match());
      if($equipes[0]->getid_equipe()==$equipeId || $equipes[1]->getid_equipe()==$equipeId){
	      array_push($infosmatchs,['id_match' => $match->getid_match(),
	          'equipe_domicile' => $equipes[0]->getnom_club(),
	          'equipe_exterieur' => $equipes[1]->getnom_club()]);
	    }
  }
  return $infosmatchs;
}

// Edition d'une liste personnalisé en fonction du club
/*foreach($allEquipeMatchs as $equipeMatch){

  if($equipeMatch->getequipe_domicile() == $equipeId || ){
    // récupération des matchs du club
      $feuillematchmanager = new FeuilleMatchManager();
      $feuilleMatch = $feuillematchmanager->read($equipeMatch->getIdMatch());
     array_push($listeMatchs,$feuilleMatch );
  }
  else if($equipeMatch->getequipe_exterieur() == $equipeId){

  }
}*/

$view = "vue_accueil_entraineur";

