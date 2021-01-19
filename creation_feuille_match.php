<?php


require('./Modeles/EquipeManager.php');

$EquipeManager = new EquipeManager();
$equipeCollection = $EquipeManager->readAll();


require('index.php');


 