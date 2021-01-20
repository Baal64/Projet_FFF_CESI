<!DOCTYPE html>
<html>
	<head>
		<title>Connexion</title>
		<!-- Inclusion des css -->
		<link rel="stylesheet" type="text/css" href="./public/css/flex_css.css">
		<link rel="stylesheet" type="text/css" href="./public/css/vues/connexion.css">
		<!-- Inclusion des js -->
		<script type="text/javascript" src="./public/js/libs/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="./public/js/connexion.js"></script>
	</head>
	<body>
		<div id="wrapper" class="flex flex_aic flex_sa">
			<form id="connexion" action="index.php" method="post" class="flex flex_aic flex_col flex_sa">
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