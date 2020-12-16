<?php
	//On lance la session et on récupère les paramètres s'ils existent
	session_start();

	//Gestion de la connexion
	if(isset($_POST['connexion'])){
		$_SESSION['connected']=true;
	}

	//Gestion de la déconnexion
	if(isset($_POST['deconnexion'])){
		session_unset();
	}

	//On regarde si il y a une session existante, si oui, on passe à l'index
	if(isset($_SESSION['connected']) && $_SESSION['connected']==true){
		header('Location: ./index.php');
	}
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