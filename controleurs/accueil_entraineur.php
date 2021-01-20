<?php
if(session_status()==PHP_SESSION_NONE)
    session_start();

if(file_exists('../php/fonctions.php'))
    require_once('../php/fonctions.php');
// Fonction de chargement de classe
spl_autoload_register('chargerClass');

$feuillematchmanager = new FeuilleMatchManager();
$listematchs = $feuillematchmanager->readAll();

$view = "vue_accueil_entraineur";