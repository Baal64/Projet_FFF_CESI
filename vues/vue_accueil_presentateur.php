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

          <!--  feuille de match : afficher le nom de chaque équipe, et la date

          pour chaque attraper les noms des équipes : on a besoin de l'idmatchéquipe qui est égal à l'idfeuillematch
          pour la date du match, on la récupère dans feuillematch  -->
<?php /*
          foreach ($listematchs as $match){
              echo "<div class='flex'>";
              echo "<div>".$match->getdate_match()."</div>";
              echo "<form method='post' action='index.php'><button name='modif_feuille_match' value='".$match->getid_match()."'>Modifier</button></form>";
              echo "</div>";
          }*/
          ?>

      <?php


      $listeinfosmatch = readNomClubsMatch();


      //var_dump($listeequipesmatch);
	      foreach ($listematchs as $match){
	          foreach ($listeinfosmatch as $infosmatch){
	              if ($infosmatch['id_match']==$match->getid_match()){
	                  $equipedom = $infosmatch['equipe_domicile'];
	                  $equipeext = $infosmatch['equipe_exterieur'];
                  }
              }
          echo "<div class='flex'>";
          echo "<div>".$equipedom.' / '.$equipeext.' '.$match->getdate_match()."</div>";
          echo "<form method='post' action='index.php'><button name='modif_feuille_match' value='".$match->getid_match()."'>Modifier</button></form>";
          echo "</div>";
	      }


      ?>
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
			<form method="post" action="index.php">
        <button id="create_feuille_bilan_match" name="create_feuille_bilan_match" class="btn flex flex_aic flex_sa" type="submit">ok</button>
      </form>
		</div>
	</div>
	<div class="flex flex_aic flex_sa flex_col">
		<p class="label">Liste des feuilles de matchs</p>
		<div id="liste_feuilles_matchs">
			
		</div>
	</div>
</div>