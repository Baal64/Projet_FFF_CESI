

	<div class="flex flex_col flex_aic flex_sa">
		<div id="bloc_equipes" class="flex flex_aic flex_sa flex_col">
			<div class="label">Equipes</div>
			<select id="select_equipe_domicile">
				<option default>Equipe domicile</option>

                <?php

                foreach ($equipeCollection as $nomClub){
                    echo '<option value="'.$nomClub->getnom_club().'", text="'.$nomClub->getnom_club().'" >'.$nomClub->getnom_club().'</option>';

                } ?>


			</select>
			<select id="select_equipe_exterieur">
				<option default>Equipe extérieur</option>

                <?php

                foreach ($equipeCollection as $nomClub){
					echo '<option value="'.$nomClub->getnom_club().'", text="'.$nomClub->getnom_club().'" >'.$nomClub->getnom_club().'</option>';

                } ?>


			</select>
		</div>
		<div id="bloc_arbitres" class="flex flex_aic flex_sa flex_col">
			<div class="label">Arbitres</div>
			<select id="select_arbitre_princiçpal">
				<option default >Arbitre principal</option>

                <?php

                foreach ($arbitreCollection as $arbitre){
                    echo '<option value="'.$arbitre->getnom_arbitre().' '.$arbitre->getprenom_arbitre().'">'.$arbitre->getnom_arbitre().' '.$arbitre->getprenom_arbitre().'</option>';

                } ?>


			</select>
			<select id="select_arbitre_assistant1">
				<option default >Arbitre assistant 1</option>

					<option data-bind="attr : { value : $data.id_arbitre }, text : $data.nom_arbitre+' '+$data.prenom_arbitre"></option>

			</select>
			<select id="select_arbitre_assistant2">
				<option default>Arbitre assistant 2</option>

					<option data-bind="attr : { value : $data.id_arbitre }, text : $data.nom_arbitre+' '+$data.prenom_arbitre"></option>

			</select>
		</div>
		<div id="bloc_localisation" class="flex flex_aic flex_sa flex_col">
			<div class="label">Localisation</div>
			<input type="text" name="localisation_base" id="localisation_base" />
			<input type="text" name="localisation_substitut" id="localisation_substitut" />
		</div>
		<div id="bloc_date" class="flex flex_aic flex_sa flex_col">
			<div class="label">Date du match</div>
			<input type="text" name="date_match" id="date_match" />
		</div>
		<div id="valider_creation_feuille">Valider</div>
		<div id="retour_menu">Retour</div>
	</div>