<div id="bandeau" class="flex flex_aic flex_sb">
	<div id="utilisateur_connecte">Bonjour <?php echo $connected_user['prenom_utilisateur'].' '.$connected_user['nom_utilisateur']; ?></div>
	<div id="mainlogo"></div>
	<form action="./index.php" method="post">
		<button id="deconnexion" type="submit" name="deconnexion">Se déconnecter</button>
	</form>
</div>