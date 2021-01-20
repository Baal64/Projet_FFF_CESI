<link rel="stylesheet" type="text/css" href="./public/css/vues/creation_feuille_match.css">
<script type="text/javascript" src="./public/js/vues/creation_feuille_match.js"></script>

<div class="flex flex_col flex_aic flex_sa">
	<form method="post" action="./index.php" class="flex flex_col flex_aic">
		<div id="bloc_equipes" class="flex flex_aic flex_sa flex_col">
			<div class="label">Equipes</div>
			<select id="select_equipe_domicile" name="select_equipe_domicile" class="input">
				<option value="" default>Equipe domicile</option>
				<?php
	       	foreach ($equipes as $equipe){
						echo '<option value="'.$equipe->getid_equipe().'">'.$equipe->getnom_club().'</option>';
					} 
				?>
			</select>
			<select id="select_equipe_exterieur" name="select_equipe_exterieur" class="input">
				<option value="" default>Equipe extérieur</option>
	       <?php
		       	foreach ($equipes as $equipe){
							echo '<option value="'.$equipe->getid_equipe().'">'.$equipe->getnom_club().'</option>';
						} 
					?>
			</select>
		</div>
		<div id="bloc_arbitres" class="flex flex_aic flex_sa flex_col">
			<div class="label">Arbitres</div>
			<select id="select_arbitre_princiçpal" name="select_arbitre_princiçpal" class="input">
				<option value="" default >Arbitre principal</option>
				<?php
	       	foreach ($arbitres as $arbitre){
						echo '<option value="'.$arbitre->getid_arbitre().'">'.$arbitre->getnom_arbitre().' '.$arbitre->getprenom_arbitre().'</option>';
					} 
				?>
			</select>
			<select id="select_arbitre_assistant1" name="select_arbitre_assistant1" class="input">
				<option value="" default >Arbitre assistant 1</option>
				<?php
	       	foreach ($arbitres as $arbitre){
						echo '<option value="'.$arbitre->getid_arbitre().'">'.$arbitre->getnom_arbitre().' '.$arbitre->getprenom_arbitre().'</option>';
					} 
				?>
			</select>
			<select id="select_arbitre_assistant2"  name="select_arbitre_assistant2" class="input">
				<option value="" default>Arbitre assistant 2</option>
				<?php
	       	foreach ($arbitres as $arbitre){
						echo '<option value="'.$arbitre->getid_arbitre().'">'.$arbitre->getnom_arbitre().' '.$arbitre->getprenom_arbitre().'</option>';
					} 
				?>
			</select>
		</div>
		<div id="bloc_localisation" class="flex flex_aic flex_sa flex_col">
			<div class="label">Localisation</div>
			<input type="text" name="localisation_base" id="localisation_base" class="input" disabled="disabled" />
			<input type="text" name="localisation_substitut" id="localisation_substitut" class="input" />
		</div>
		<div id="bloc_date" class="flex flex_aic flex_sa flex_col">
			<div class="label">Date du match</div>
			<input type="text" name="date_match" id="date_match" class="input" />
		</div>
		<button type="submit" disabled="disabled" name="creation_feuille_match" class="btn" id="valide_feuille_match">Valider</button>
	</form>
	<form method="post" action="index.php">
		<button type="submit" class="btn back">Retour</button>
	</form>
</div>