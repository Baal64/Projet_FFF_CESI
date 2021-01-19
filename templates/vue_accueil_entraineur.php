<?php include('./templates/vue_header.php'); ?>

<div class="box flex flex_aic flex_sa flex_col flex1">
	<h2>SELECTION FEUILLE DE MATCH</h2>

	<div class="flex flex_aic flex_sa flex_col">
		<p class="label">Liste des feuilles de matchs</p>
		<div id="liste_feuilles_matchs">
			<div class="feuille_pre_match flex flex_aic flex_sa">
			<div class="flex flex_col flex_aic flex_sa">
			<div id="bloc_match" class="flex flex_aic flex_sa flex_col">
				<div class="label">Feuille de match</div>
				<select id="select_equipe_domicile">
					<option default>Selection match</option>

					<?php
					foreach ($feuilleMatchCollection as $feuilleMatch){
						echo '<option value="'.$feuilleMatch->getLieu().'", text="'.$feuilleMatch->getLieu().'" >'.$feuilleMatch->getLieu().'</option>';

					} ?>

				</select>
			</div>
				<a href="edition_equipe_match.php" target="_blank"> <input type="button" value="editer"></a>
			</div>
		</div>
	</div>
</div>

