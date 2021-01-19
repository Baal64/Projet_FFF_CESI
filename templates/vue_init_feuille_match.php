<?php include('./templates/vue_header.php') ?>

	<div class="flex flex_col flex_aic flex_sa">
        <form action="" type="post">
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

                <?php

                foreach ($arbitreCollection as $arbitre){
                    echo '<option value="'.$arbitre->getnom_arbitre().' '.$arbitre->getprenom_arbitre().'">'.$arbitre->getnom_arbitre().' '.$arbitre->getprenom_arbitre().'</option>';

                } ?>


			</select>
			<select id="select_arbitre_assistant2">
				<option default>Arbitre assistant 2</option>

                <?php

                foreach ($arbitreCollection as $arbitre){
                    echo '<option value="'.$arbitre->getnom_arbitre().' '.$arbitre->getprenom_arbitre().'">'.$arbitre->getnom_arbitre().' '.$arbitre->getprenom_arbitre().'</option>';

                } ?>
			</select>
		</div>
		<div id="bloc_localisation" class="flex flex_aic flex_sa flex_col">
			<div class="label">Localisation</div>

            <select id="stade_match">
                <option default>Localisation</option>

                <?php

                foreach ($equipeCollection as $equipe){
                    echo '<option value="'.$equipe->getstade_club().' '.$equipe->getville_club().'">'.$equipe->getstade_club().' '.$equipe->getville_club().'</option>';

                } ?>


            </select>


			<input type="text" name="localisation_substitut" id="localisation_substitut" />
		</div>
		<div id="bloc_date" class="flex flex_aic flex_sa flex_col">
			<div class="label">Date du match</div>
			<input type="text" name="date_match" id="date_match" />
		</div>
		<button type="submit" id="valider_creation_feuille">Valider</button>

        <a href="accueil_presentateur.php" target="_blank"> <input type="button" value="Retour"></a>

        </form>
	</div>


