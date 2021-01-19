<?php

    //On lance la session et on récupère les paramètres s'ils existent
    session_start();

    //Inclusions des fichiers utiles
    include('./php/class_sql.php');
    include('./php/fonctions.php');



    spl_autoload_register('chargerClass');



    //On créer l'objet de connexion à la base de données
    $objsql = new sql();

    //Variables
    $msg_connexion = "";


	//Gestion de la connexion
	if(isset($_POST['connexion']) && post_control($_POST['nom_user']) &&  post_control($_POST['mdpass'])){
		$identifiant = $_POST['nom_user'];
		$mdp = $_POST['mdpass'];
		//On va regarder dans la base de données si l'utilisateur existe et si il a renseigné ses bonnes informations
		$sql = "SELECT * FROM utilisateurs WHERE (BINARY id_connexion='$identifiant' OR email_utilisateur='$identifiant') AND BINARY mdp_connexion='$mdp'";
		$objsql->query($sql,"Essaie de connexion avec un id/mail et un mdp");
		if($objsql->nb_result()>0){
			$res = $objsql->fetch_assoc();
			$id_user = $res['id'];
			$nom_user = $res['nom_utilisateur'];
			$prenom_user = $res['prenom_utilisateur'];
			$role_user = $res['role_utilisateur'];
			$mail_user = $res['email_utilisateur'];
			$_SESSION['connected']=true;
			$_SESSION['id_user']=$id_user;
			$_SESSION['nom_user']=$nom_user;
			$_SESSION['prenom_user']=$prenom_user;
			$_SESSION['role_user']=$role_user;
			$_SESSION['mail_user']=$mail_user;
		}
		else{
			$msg_connexion = "Votre identifiant et/ou mot de passe n'ont pas permis de vous identifier. Veuillez réessayer.";
		}
	}

	//Gestion de la déconnexion
	if(isset($_POST['deconnexion'])){
		session_unset();
        header('Location: ./connexion.php');
	}

	//On regarde si il y a une session existante, si oui, on passe à l'index
	if(isset($_SESSION['connected']) && $_SESSION['connected']==true && $_SESSION['role_user']=='presentateur'){
		header('Location: ./accueil_presentateur.php');}

		






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