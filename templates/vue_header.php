
<div id="bandeau" class="flex flex_aic flex_sb">
				<div id="utilisateur_connecte">Bonjour <?php echo $_SESSION['prenom_user'].' '.$_SESSION['nom_user'] ?></div>
<div id="mainlogo"></div>
<form action="./connexion.php" method="post">
    <button id="deconnexion" type="submit" name="deconnexion">Se déconnecter</button>
</form>
</div>
