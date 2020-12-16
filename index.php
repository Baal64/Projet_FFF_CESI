<?php
	//On lance la session et on récupère les paramètres s'ils existent
	session_start();
	//On regarde si il y a une session existante, si oui, on passe à l'index
	if(!(isset($_SESSION['connected']) && $_SESSION['connected'])){
		header('Location : ./connexion.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Interface</title>
		<!-- Inclusion des css -->
		<link rel="stylesheet" type="text/css" href="./css/flex_css.css">
		<link rel="stylesheet" type="text/css" href="./css/interface.css">
		<!-- Inclusion des js -->
		<script type="text/javascript" src="./js/libs/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="./js/libs/knockout-3.5.1.js"></script>
		<script type="text/javascript" src="./js/libs/iro.min.js"></script>
		<script type="text/javascript" src="./js/interface.js"></script>
	</head>
	<body>
		<div id="wrapper" class="flex flex_col">
			<div id="bandeau" class="flex flex_aic flex_sb">
				<div id="utilisateur_connecte">Bonjour Thierry</div>
				<div id="mainlogo"></div>
				<form action="./connexion.php" method="post">
					<button id="deconnexion" type="submit" name="deconnexion">Se déconnecter</button>
				</form>
			</div>
			<div id="content" class="flex flex_sa flex_aic">
				<!-- ko if : choix_couleur()>0 -->
					<div data-bind="template : { name : 'interface_choix_couleur' }"></div>
				<!-- /ko -->
				<!-- ko if : joueur_selectionne() -->
					<div data-bind="template : { name : 'interface_joueur_selectionne' }"></div>
				<!-- /ko -->
				<div id="equipe1" class="equipe flex flex_col flex_aic flex_sa">
					<div class="logo_equipe" id="logoequipe_1"></div>
					<div id="pickerequipe_1" class="choix_couleur">Couleur équipe 1</div>
					<!-- ko template: { name : 'equipe', data : { 'equipe' : 1 } } --> <!-- /ko -->
				</div>
				<div id="infos_match" class="flex flex_aic flex_col flex_sa">
					<div>Informations du match</div>
					<div class="flex flex_col flex_aic flex_sa">
						<div>Date</div>
						<div>14/12/2020</div>
						<div>Score</div>
						<div>0 - 0</div>
						<div>Arbitre</div>
						<div>Jean Mouloud</div>
						<div>Temps de jeu</div>
						<div>90 min</div>
						<div>Lieu</div>
						<div>Paris - France</div>
						<div>Stade</div>
						<div>La pelouse de Michel</div>
					</div>
				</div>
				<div id="equipe2" class="equipe flex flex_col flex_aic flex_sa">
					<div class="logo_equipe" id="logoequipe_2"></div>
					<div id="pickerequipe_2" class="choix_couleur">Couleur équipe 2</div>
					<!-- ko template: { name : 'equipe', data : { 'equipe' : 2 } } --> <!-- /ko -->
				</div>
			</div>
		</div>
	</body>
</html>

<script type="text/html" id="modele_joueur">
	<div class="maillot" data-bind="style : { backgroundColor : $data.couleur_maillot}">
		<div class="numero" data-bind="text : Math.floor(Math.random() * (44 - 1) ) + 1"></div>
	</div>
	<div data-bind="text : $data.nom"></div>
	<em class="poste" data-bind="text : $data.poste"></em>
	<div class="zone_cartons flex flex_center">
		<!-- ko if : $data.hasOwnProperty('cartons') && $data.cartons.hasOwnProperty('jaunes') && $data.cartons.jaunes.length>0 -->
			<div class="cartons_jaunes flex flex_aic">
				<div class="mini_carton jaune"></div>
				<!-- ko foreach : $data.cartons.jaunes -->
					<div class="temps_event" data-bind="text : $data+' min'"></div>
				<!-- /ko -->
			</div>
		<!-- /ko -->
		<!-- ko if : $data.hasOwnProperty('cartons') && $data.cartons.hasOwnProperty('rouges') && $data.cartons.rouges.length>0 -->
			<div class="cartons_rouges flex flex_aic">
				<div class="mini_carton rouge"></div>
				<!-- ko foreach : $data.cartons.rouges -->
					<div class="temps_event" data-bind="text : $data+' min'"></div>
				<!-- /ko -->
			</div>
		<!-- /ko -->
	</div>
</script>

<script type="text/html" id="interface_choix_couleur">
	<div id="voile" class="flex flex_aic flex_sa">
		<div id="boite_choix_couleur" class="flex flex_col flex_aic flex_sa">
			<div>Couleur de l'équipe <span data-bind="text : choix_couleur()==1  ? '1' : '2'"></span></div>
			<div class="flex flex_sa flex_aic">
				<div class="maillot" data-bind="style : { backgroundColor : choix_couleur()==1  ? couleur_equipe1() : couleur_equipe2() }"></div>
				<div id="picker"></div>
			</div>
		</div>
	</div>
</script>

<script type="text/html" id="interface_joueur_selectionne">
	<div id="voile" class="flex flex_aic flex_sa">
		<div id="boite_action_joueur_selectionne" class="flex flex_aic flex_sa flex_col">
			<div class="fullwidth flex flex_aic flex_sa">
				<div class="action_joueur" id="carton_jaune"></div>
				<div class="action_joueur" id="carton_rouge"></div>
				<div class="action_joueur" id="but"></div>
			</div>
			<div class="flex posrel">
				<div id="chronometre"></div>
				<input type="number" name="minutes" id="minutes" min="0" max="140" step="1" />
			</div>
		</div>
	</div>
</script>

<script type="text/html" id="equipe">
	<div class="ligne flex flex_sa flex_aic">
		<!-- ko foreach : ($data.equipe==1 ? equipe1().gardien : equipe2().gardien) -->
			<div class="flex flex_aic flex_col" data-bind="template : { name : 'modele_joueur', data : $data }"></div>
		<!-- /ko -->
	</div>
	<div class="ligne flex flex_sa flex_aic">
		<!-- ko foreach : ($data.equipe==1 ? equipe1().defenseurs : equipe2().defenseurs) -->
			<div class="flex flex_aic flex_col" data-bind="template : { name : 'modele_joueur', data : $data }"></div>
		<!-- /ko -->
	</div>
	<div class="ligne flex flex_sa flex_aic">
		<!-- ko foreach : ($data.equipe==1 ? equipe1().milieux : equipe2().milieux) -->
			<div class="flex flex_aic flex_col" data-bind="template : { name : 'modele_joueur', data : $data }"></div>
		<!-- /ko -->
	</div>
	<div class="ligne flex flex_sa flex_aic">
		<!-- ko foreach : ($data.equipe==1 ? equipe1().attaquants : equipe2().attaquants) -->
			<div class="flex flex_aic flex_col" data-bind="template : { name : 'modele_joueur', data : $data }"></div>
		<!-- /ko -->
	</div>
</script>