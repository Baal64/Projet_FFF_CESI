<?php include('./templates/vue_header.php'); ?>

<div class="box flex flex_aic flex_sa flex_col flex1">
	<h2>CREATION EQUIPE</h2>

	<div class="flex flex_aic flex_sa flex_col">
		<p class="label">Liste des Joueurs du matchs</p>
		<div id="liste_joueurs_matchs">
			<div class="feuille_pre_match flex flex_aic flex_sa">
			<div class="flex flex_col flex_aic flex_sa">
			<div id="bloc_match" class="flex flex_aic flex_sa flex_col">
				<div class="label">Feuille de match</div>
				<select id="select_equipe_domicile">
					<option default>Selection joueurs</option>

					<?php
					foreach ($joueurCollection as $joueur){
                        echo '<option value="'.$joueur->getnom_joueur().'", text="'.$joueur->getnom_joueur().'" >'.$joueur->getnom_joueur().' '.$joueur->getprenom_joueur().'</option>';
					} ?>

				</select>
			</div>
				<a href="edition_equipe_match.php" target="_blank"> <input type="button" value="editer"></a>
			</div>
		</div>
	</div>
</div>
