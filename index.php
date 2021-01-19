<?php
	//On lance la session et on récupère les paramètres s'ils existent
	session_start();
	//On regarde si il y a une session existante, si oui, on passe à l'index
	if(!(isset($_SESSION['connected']) && $_SESSION['connected'])){
		header('Location : ./connexion.php');
	}
<<<<<<< Updated upstream

//Inclusions des fichiers utiles
include('./php/class_sql.php');
include('./php/fonctions.php');


/*// Fonction de chargement de classe
function chargerClass($className){
    require_once('./Modeles/'.$className.'.php');
}

spl_autoload_register('chargerClass');


=======
>>>>>>> Stashed changes
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Interface</title>
		<!-- Inclusion des css -->
		<link rel="stylesheet" type="text/css" href="./css/flex_css.css">
		<link rel="stylesheet" type="text/css" href="./css/interface.css">
		<link rel="stylesheet" type="text/css" href="./css/libs/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" href="./css/libs/jquery-ui.structure.min.css">
		<link rel="stylesheet" type="text/css" href="./css/libs/jquery-ui.theme.min.css">
		<!-- Inclusion des js -->
		<script type="text/javascript" src="./js/libs/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="./js/libs/jquery-ui.min.js"></script>
		<script type="text/javascript" src="./js/libs/knockout-3.5.1.js"></script>
		<script type="text/javascript" src="./js/libs/iro.min.js"></script>
		<script type="text/javascript">
			var role_utilisateur = '<?php echo $_SESSION['data_connected_user']['role_user']; ?>';
		</script>
		<script type="text/javascript" src="./js/interface.js"></script>
	</head>
	<body>
		<div id="wrapper" class="flex flex_col">
			 <div id="bandeau" class="flex flex_aic flex_sb">
				<div id="utilisateur_connecte">Bonjour <?php echo $_SESSION['prenom_user'].' '.$_SESSION['nom_user'] ?></div>
				<div id="mainlogo"></div>
				<form action="./connexion.php" method="post">
					<button id="deconnexion" type="submit" name="deconnexion">Se déconnecter</button>
				</form>
			</div>
			<div id="content" class="flex flex_sa flex_aic" data-bind="template : { name : current_template() }"></div>
		</div>
	</body>
</html>

<!-- ............ -->

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

<?php
	//On inclu les templates
	//Interface issue d'une connexion en tant que présentateur
	include("./templates/accueil_presentateur.php");
	//Interface issue d'une connexion en tant qu'entraineur
	include("./templates/accueil_entraineur.php");
	//Initiation de la feuille de match - présentateur
	//include("./templates/init_feuille_match.php");
	//Feuille de match - présentateur
	include("./templates/renseignement_feuille_match.php");
?>