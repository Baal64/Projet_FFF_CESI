<?php
if(session_status()==PHP_SESSION_NONE)
    session_start();

if(file_exists('../php/fonctions.php'))
    require_once('../php/fonctions.php');
// Fonction de chargement de classe
spl_autoload_register('chargerClass');


$joueurManager = new joueurManager();
$joueurCollection = $joueurManager->readAll();

$listePostes = array('Avant', 'Ailier', 'Milieu offensif', 'Milieu', 'Milieu défensif', 'Arrière', 'Gardien');

$listePlacements = array('Centre', 'Droit', 'Gauche');

$utilisateu= new UtilisateurManager();



$view = "vue_creation_equipe_match";