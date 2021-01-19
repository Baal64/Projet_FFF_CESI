<script type="text/html" id="prepa_feuille_match">
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
</script>