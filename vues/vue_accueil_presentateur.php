<link rel="stylesheet" type="text/css" href="./public/css/vues/accueil_presentateur.css">
<script type="text/javascript" src="./public/js/vues/accueil_presentateur.js"></script>

<!-- Partie pré-match -->
<div class="box flex flex_aic flex_sa flex_col flex1">
	<h2>PRE MATCH</h2>
	<div class="flex flex_aic flex_sa flex_col">
		<p class="label">Créer une feuille de match</p>
		<form method="post" action="index.php">
			<button id="creer_feuille_match" name="create_feuille_match" class="btn flex flex_aic flex_sa" type="submit">Créer</button>
		</form>
	</div>
	<div class="flex flex_aic flex_sa flex_col">
		<p class="label">Modifier une feuille de match</p>
		<div class="flex flex_aic">
			<input type="text" placeholder="Rechercher" />
			<div id="recherche_feuille_match_pre">OK</div>
		</div>
	</div>
	<div class="flex flex_aic flex_sa flex_col">
		<p class="label">Liste des feuilles de matchs</p>
		<div id="liste_feuilles_matchs">
			
		</div>
	</div>
</div>
<!-- Séparateur -->
<div id="separation"></div>
<!-- Partie post-match -->
<div class="box flex flex_aic flex_sa flex_col flex1">
	<h2>POST MATCH</h2>
	<div class="flex flex_aic flex_sa flex_col">
		<p class="label">Rechercher une feuille de match</p>
		<div class="flex flex_aic">
			<input type="text" placeholder="Rechercher" />
			<div id="recherche_feuille_match_post">OK</div>
		</div>
	</div>
	<div class="flex flex_aic flex_sa flex_col">
		<p class="label">Liste des feuilles de matchs</p>
		<div id="liste_feuilles_matchs">
			
		</div>
	</div>
</div>