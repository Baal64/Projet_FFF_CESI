<?php

//On lance la session et on récupère les paramètres s'ils existent
session_start();

//Inclusions des fichiers utiles
include('./php/class_sql.php');
include('./php/fonctions.php');

spl_autoload_register('chargerClass');

 $joueurManager = new joueurManager();
 $joueurCollection = $joueurManager->readAll();


require('./templates/vue_creation_equipe_match.php');