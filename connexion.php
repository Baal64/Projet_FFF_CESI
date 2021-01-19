<?php

    //On lance la session et on récupère les paramètres s'ils existent
   session_start();

<<<<<<< Updated upstream

=======
    // Fonction de chargement de classe
    function chargerClass($className){
        require_once('./Modeles/'.$className.'.php');
    }
    include('./php/fonctions.php');
    spl_autoload_register('chargerClass');


    // include('./Modeles/Manager.php');
>>>>>>> Stashed changes

    spl_autoload_register('chargerClass');


    //On créer l'objet de connexion à la base de données
    $connexion = new Connexion();

    //Variables
  $msg_connexion = "";

	//Gestion de la connexion
	if(isset($_POST['connexion']) && post_control($_POST['nom_user']) &&  post_control($_POST['mdpass'])){
		$identifiant = $_POST['nom_user'];
		$mdp = $_POST['mdpass'];
		if($connexion->connect($identifiant,$mdp))
            header('Location: ./index.php');
	}

	//Gestion de la déconnexion
	if(isset($_POST['deconnexion'])){
		session_unset();
        header('Location: ./connexion.php');
	}
<<<<<<< Updated upstream

	//On regarde si il y a une session existante, si oui, on passe à l'index
	if(isset($_SESSION['connected']) && $_SESSION['connected']==true && $_SESSION['role_user']=='presentateur'){
		header('Location: ./accueil_presentateur.php');}

		//else if ((isset($_SESSION['connected']) && $_SESSION['connected']==true && $_SESSION['role_user']=='entraineur'){
		//header('Location: ./accueil_entraineur.php')});

		//else ( header('Location: ./connexion.php'));






=======
>>>>>>> Stashed changes
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Connexion</title>
		<!-- Inclusion des css -->
		<link rel="stylesheet" type="text/css" href="./css/flex_css.css">
		<link rel="stylesheet" type="text/css" href="./css/connexion.css">
		<!-- Inclusion des js -->
		<script type="text/javascript" src="./js/libs/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="./js/connexion.js"></script>
	</head>
	<body>
		<div id="wrapper" class="flex flex_aic flex_sa">
			<form id="connexion" action="./connexion.php" method="post" class="flex flex_aic flex_col flex_sa">
				<div id="mainlogo"></div>
				<?php
					if($msg_connexion!="")
						echo "<p id='erreur_connexion'>$msg_connexion</p>"
				?>
				<label for="nom_user"> 
					<span class="text">Identifiant</span>
					<input id="nom_user" name="nom_user" type="text" value="" autocomplete="off" autofocus="" class="input_connexion">
				</label>
				<label for="mdpass">
					<span class="text">Mot de passe</span>
					<input id="mdpass" name="mdpass" type="password" value="" autocomplete="off" autofocus="" class="input_connexion">
				</label>
				<button id="btn_connexion" name="connexion" type="submit">Connexion</button>
			</form>
		</div>
	</body>
</html>