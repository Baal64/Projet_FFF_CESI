<?php
session_start();

if(file_exists('../php/fonctions.php'))
    require_once('../php/fonctions.php');
	// Fonction de chargement de classe
spl_autoload_register('chargerClass');

//require('./vues/vue_accueil_entraineur.php');