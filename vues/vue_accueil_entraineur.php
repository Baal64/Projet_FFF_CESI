<!--<link rel="stylesheet" type="text/css" href="./public/css/vues/accueil_presentateur.css">-->
<!--<script type="text/javascript" src="./public/js/vues/accueil_presentateur.js"></script>-->

<div class="box flex flex_aic flex_sa flex_col flex1">
    <h2>SELECTION FEUILLE DE MATCH</h2>
<!--  $connected_user['id_equipe_entraineur'];  verif dans le controlleur-->

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
                            foreach ($listeMatchs as $match){
                                echo '<option value="'.$match->getlieu_match().' '.$match->getdate_match().'">'.$match->getlieu_match().' '.$match->getdate_match().'</option>';
                            }
                            ?>
                        </select>
                        <br/>
                        <form method="post" action="index.php">
                            <button id="editer_equipe_match" name="edit_equipe_match" class="btn flex flex_aic flex_sa" type="submit">Editer</button>
                        </form>
                    </div>
                </div>
            </div>