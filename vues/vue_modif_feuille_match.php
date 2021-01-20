<link rel="stylesheet" type="text/css" href="./public/css/vues/modification_feuille_match.css">
<script type="text/javascript" src="./public/js/vues/modification_feuille_match.js"></script>

<div class="flex flex_col flex_aic flex_sa">
	<form method="post" action="./index.php" class="flex flex_col flex_aic">
		<input type="hidden" name="modification_feuille_match">
		<div id="bloc_equipes" class="flex flex_aic flex_sa flex_col">
			<div class="label">Equipes</div>
			<select id="select_equipe_domicile" name="select_equipe_domicile" class="input">
				<option value="">Equipe domicile</option>
				<?php
	       	foreach ($equipes as $equipe){
	       		if($equipe->getid_equipe()==$em->getequipe_domicile())
							echo '<option selected="selected" value="'.$equipe->getid_equipe().'">'.$equipe->getnom_club().'</option>';
						else
							echo '<option value="'.$equipe->getid_equipe().'">'.$equipe->getnom_club().'</option>';
					} 
				?>
			</select>
			<select id="select_equipe_exterieur" name="select_equipe_exterieur" class="input">
				<option value="">Equipe extérieur</option>
	       <?php
		       	foreach ($equipes as $equipe){
		       		if($equipe->getid_equipe()==$em->getequipe_exterieur())
								echo '<option selected="selected" value="'.$equipe->getid_equipe().'">'.$equipe->getnom_club().'</option>';
							else
								echo '<option value="'.$equipe->getid_equipe().'">'.$equipe->getnom_club().'</option>';
						} 
					?>
			</select>
		</div>
		<div id="bloc_arbitres" class="flex flex_aic flex_sa flex_col">
			<div class="label">Arbitres</div>
			<select id="select_arbitre_princiçpal" name="select_arbitre_princiçpal" class="input">
				<option value="">Arbitre principal</option>
				<?php
	       	foreach ($arbitres as $arbitre){
	       		if($arbitre->getid_arbitre()==$am->getarbitre_principal())
							echo '<option selected="selected" value="'.$arbitre->getid_arbitre().'">'.$arbitre->getnom_arbitre().' '.$arbitre->getprenom_arbitre().'</option>';
						else
							echo '<option value="'.$arbitre->getid_arbitre().'">'.$arbitre->getnom_arbitre().' '.$arbitre->getprenom_arbitre().'</option>';
					} 
				?>
			</select>
			<select id="select_arbitre_assistant1" name="select_arbitre_assistant1" class="input">
				<option value="">Arbitre assistant 1</option>
				<?php
	       	foreach ($arbitres as $arbitre){
						if($arbitre->getid_arbitre()==$am->getarbitre_adj_un())
							echo '<option selected="selected" value="'.$arbitre->getid_arbitre().'">'.$arbitre->getnom_arbitre().' '.$arbitre->getprenom_arbitre().'</option>';
						else
							echo '<option value="'.$arbitre->getid_arbitre().'">'.$arbitre->getnom_arbitre().' '.$arbitre->getprenom_arbitre().'</option>';
					} 
				?>
			</select>
			<select id="select_arbitre_assistant2"  name="select_arbitre_assistant2" class="input">
				<option value="">Arbitre assistant 2</option>
				<?php
	       	foreach ($arbitres as $arbitre){
						if($arbitre->getid_arbitre()==$am->getarbitre_adj_deux())
							echo '<option selected="selected" value="'.$arbitre->getid_arbitre().'">'.$arbitre->getnom_arbitre().' '.$arbitre->getprenom_arbitre().'</option>';
						else
							echo '<option value="'.$arbitre->getid_arbitre().'">'.$arbitre->getnom_arbitre().' '.$arbitre->getprenom_arbitre().'</option>';
					} 
				?>
			</select>
		</div>
		<div id="bloc_localisation" class="flex flex_aic flex_sa flex_col">
			<div class="label">Localisation</div>
			<input type="text" name="localisation_base" class="input" id="localisation_base" value="<?php echo $fm->getlieu_match() ?>" />
			<input type="text" name="localisation_substitut" class="input" id="localisation_substitut" value="<?php echo $fm->getlieu_substitut() ?>" />
		</div>
		<div id="bloc_date" class="flex flex_aic flex_sa flex_col">
			<div class="label">Date du match</div>
			<input type="text" name="date_match" class="input" id="date_match" value="<?php echo deformat_date($fm->getdate_match()) ?>"/>
		</div>
		<button type="submit" name="modification_feuille_match" class="btn" id="valide_modif_feuille_match" value="<?php echo $id_match; ?>">Valider</button>
	</form>
	<form method="post" action="index.php">
		<button type="submit" class="btn back">Retour</button>
	</form>
</div>