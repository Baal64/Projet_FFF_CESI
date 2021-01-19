<?php

    // - Les équipes qui s’affrontent (domicile ou extérieur)
    // - Le nom et la nationalité de l’arbitre principal
    // - Les noms et nationalités des 2 arbitres assistants
    // - Le lieu
    // - La date

require('./Modeles/EquipeManager.php');
require('./Modeles/ArbitreManager.php');


$EquipeManager = new EquipeManager();
$equipeCollection = $EquipeManager->readAll();

$ArbitreManager = new ArbitreManager();
$arbitreCollection = $ArbitreManager->readAll();

$feuilleMatchCollection = ;


require('index.php');


 