<?php

//On lance la session et on récupère les paramètres s'ils existent
session_start();

//Inclusions des fichiers utiles
include('./php/class_sql.php');
include('./php/fonctions.php');



spl_autoload_register('chargerClass');





require('./templates/vue_accueil_presentateur.php');


