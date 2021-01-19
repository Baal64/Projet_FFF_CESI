<?php

//On lance la session et on récupère les paramètres s'ils existent
session_start();

//Inclusions des fichiers utiles
include('./php/class_sql.php');
include('./php/fonctions.php');

spl_autoload_register('chargerClass');

// $EquipeManager = new EquipeManager();
// $equipeCollection = $EquipeManager->readAll();

// $ArbitreManager = new ArbitreManager();
// $arbitreCollection = $ArbitreManager->readAll();

$feuilleMatchManager = new FeuilleMatchManager();
$feuilleMatchCollection = $feuilleMatchManager->readAll();


require('./templates/vue_accueil_entraineur.php');


 