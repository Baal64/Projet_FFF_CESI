<script type="text/html" id="accueil_presentateur">
	<!-- Style du template -->
	<style>
		#separation{
			height: calc(20vw + 20vh);
			width: 0px;
			border: calc(0.1vw + 0.15vh) solid #E5D6B3;
		}
		.box{
			height: calc(20vw + 20vh);
		}
	</style>
	<!-- Code -->
	<!-- Partie pré-match -->
	<div class="box flex flex_aic flex_sa flex_col flex1">
		<h2>PRE MATCH</h2>
		<div class="flex flex_aic flex_sa flex_col">
			<p class="label">Créer une feuille de match</p>
			<div id="creer_feuille_match" class="btn flex flex_aic flex_sa">Créer</div>
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
				<!-- ko foreach : tab_liste_feuilles_pre_match() -->
					<div class="feuille_pre_match flex flex_aic flex_sa">
						<div data-bind="text : $data.date+' - '+$data.equipe1+'/'+$data.equipe2"></div>
						<div data-bind="attr : { id : 'feuille_'+$data.id }" class="btn_modif_pre">Modifier</div>
					</div>
				<!-- /ko -->
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
				<!-- ko foreach : tab_liste_feuilles_pre_match() -->
					<div class="feuille_pre_match flex flex_aic flex_sa">
						<div data-bind="text : $data.date+' - '+$data.equipe1+'/'+$data.equipe2"></div>
						<div data-bind="attr : { id : 'printfeuille_'+$data.id }" class="btn_imprime">Imprimer</div>
						<div data-bind="attr : { id : 'pdffeuille_'+$data.id }" class="btn_pdf">PDF</div>
					</div>
				<!-- /ko -->
			</div>
		</div>
	</div>
</script>