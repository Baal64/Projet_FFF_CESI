<div class="flex flex_col flex_aic flex_sa">
    <form method="post" action="./index.php">
        <input type="hidden" name="creation_equipe_match">

        <div id="bloc_equipe" class="flex flex_aic flex_sa flex_col">
            <div class="label">Joueurs</div>
            <div>
                <select id="select_capitaine" name="select_capitaine">
                    <option default >Capitaine</option>
                    <?php
                    foreach ($joueurCollection as $joueur){
                        echo '<option value="'.$joueur->getid_joueur.'">'.$joueur->getnom_joueur().' '.$joueur->getprenom_joueur().'</option>';
                    }
                    ?>
                </select>
                <select id="select_poste_cpt" name="select_poste_capitaine">
                    <option default >Poste</option>
                    <?php
                    foreach ($listePostes as $poste){
                        echo '<option value="'.$postes.'">'.$poste.'</option>';
                    }
                    ?>
                </select>
                <select id="select_plcmt_cpt" name="select_plcmt_cpt">
                    <option default >Placement</option>
                    <?php
                    foreach ($listePlacements as $placement){
                        echo '<option value="'.$placement.'">'.$placement.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <select id="select_capitaine_adj" name="select_capitaine_adj">
                    <option default >Capitaine adj.</option>
                    <?php
                    foreach ($joueurCollection as $joueur){
                        echo '<option value="'.$joueur->getid_joueur.'">'.$joueur->getnom_joueur().' '.$joueur->getprenom_joueur().'</option>';
                    }
                    ?>
                </select>
                <select id="select_poste_cpt_adj" name="select_poste_capitaine_adj">
                    <option default >Poste</option>
                    <?php
                    foreach ($listePostes as $poste){
                        echo '<option value="'.$postes.'">'.$poste.'</option>';
                    }
                    ?>
                </select>
                <select id="select_plcmt_cpt_adj" name="select_plcmt_cpt_adj">
                    <option default >Placement</option>
                    <?php
                    foreach ($listePlacements as $placement){
                        echo '<option value="'.$placement.'">'.$placement.'</option>';
                    }
                    ?>
                </select>
            </div>
            <br/>
            <div>
                <select id="select_joueur3" name="select_joueur3">
                    <option default >Joueur 3</option>
                    <?php
                    foreach ($joueurCollection as $joueur){
                        echo '<option value="'.$joueur->getid_joueur.'">'.$joueur->getnom_joueur().' '.$joueur->getprenom_joueur().'</option>';
                    }
                    ?>
                </select>
                <select id="select_poste_j3" name="select_poste_j3">
                    <option default >Poste</option>
                    <?php
                    foreach ($listePostes as $poste){
                        echo '<option value="'.$postes.'">'.$poste.'</option>';
                    }
                    ?>
                </select>
                <select id="select_plcmt_j3" name="select_plcmt_j3">
                    <option default >Placement</option>
                    <?php
                    foreach ($listePlacements as $placement){
                        echo '<option value="'.$placement.'">'.$placement.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <select id="select_joueur4" name="select_joueur4">
                    <option default >Joueur 4</option>
                    <?php
                    foreach ($joueurCollection as $joueur){
                        echo '<option value="'.$joueur->getid_joueur.'">'.$joueur->getnom_joueur().' '.$joueur->getprenom_joueur().'</option>';
                    }
                    ?>
                </select>
                <select id="select_poste_j4" name="select_poste_j4">
                    <option default >Poste</option>
                    <?php
                    foreach ($listePostes as $poste){
                        echo '<option value="'.$postes.'">'.$poste.'</option>';
                    }
                    ?>
                </select>
                <select id="select_plcmt_j4" name="select_plcmt_j4">
                    <option default >Placement</option>
                    <?php
                    foreach ($listePlacements as $placement){
                        echo '<option value="'.$placement.'">'.$placement.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <select id="select_joueur5" name="select_joueur5">
                    <option default >Joueur 5</option>
                    <?php
                    foreach ($joueurCollection as $joueur){
                        echo '<option value="'.$joueur->getid_joueur.'">'.$joueur->getnom_joueur().' '.$joueur->getprenom_joueur().'</option>';
                    }
                    ?>
                </select>
                <select id="select_poste_j5" name="select_poste_j5">
                    <option default >Poste</option>
                    <?php
                    foreach ($listePostes as $poste){
                        echo '<option value="'.$postes.'">'.$poste.'</option>';
                    }
                    ?>
                </select>
                <select id="select_plcmt_j5" name="select_plcmt_j5">
                    <option default >Placement</option>
                    <?php
                    foreach ($listePlacements as $placement){
                        echo '<option value="'.$placement.'">'.$placement.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <select id="select_joueur6" name="select_joueur6">
                    <option default >Joueur 6</option>
                    <?php
                    foreach ($joueurCollection as $joueur){
                        echo '<option value="'.$joueur->getid_joueur.'">'.$joueur->getnom_joueur().' '.$joueur->getprenom_joueur().'</option>';
                    }
                    ?>
                </select>
                <select id="select_poste_j6" name="select_poste_j6">
                    <option default >Poste</option>
                    <?php
                    foreach ($listePostes as $poste){
                        echo '<option value="'.$postes.'">'.$poste.'</option>';
                    }
                    ?>
                </select>
                <select id="select_plcmt_j6" name="select_plcmt_j6">
                    <option default >Placement</option>
                    <?php
                    foreach ($listePlacements as $placement){
                        echo '<option value="'.$placement.'">'.$placement.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <select id="select_joueur7" name="select_joueur7">
                    <option default >Joueur 7</option>
                    <?php
                    foreach ($joueurCollection as $joueur){
                        echo '<option value="'.$joueur->getid_joueur.'">'.$joueur->getnom_joueur().' '.$joueur->getprenom_joueur().'</option>';
                    }
                    ?>
                </select>
                <select id="select_poste_j7" name="select_j7">
                    <option default >Poste</option>
                    <?php
                    foreach ($listePostes as $poste){
                        echo '<option value="'.$postes.'">'.$poste.'</option>';
                    }
                    ?>
                </select>
                <select id="select_plcmt_j7" name="select_plcmt_j7">
                    <option default >Placement</option>
                    <?php
                    foreach ($listePlacements as $placement){
                        echo '<option value="'.$placement.'">'.$placement.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <select id="select_joueur8" name="select_joueur8">
                    <option default >Joueur 8</option>
                    <?php
                    foreach ($joueurCollection as $joueur){
                        echo '<option value="'.$joueur->getid_joueur.'">'.$joueur->getnom_joueur().' '.$joueur->getprenom_joueur().'</option>';
                    }
                    ?>
                </select>
                <select id="select_poste_j8" name="select_poste_j8">
                    <option default >Poste</option>
                    <?php
                    foreach ($listePostes as $poste){
                        echo '<option value="'.$postes.'">'.$poste.'</option>';
                    }
                    ?>
                </select>
                <select id="select_plcmt_j8" name="select_plcmt_j8">
                    <option default >Placement</option>
                    <?php
                    foreach ($listePlacements as $placement){
                        echo '<option value="'.$placement.'">'.$placement.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <select id="select_joueur9" name="select_joueur9">
                    <option default >Joueur 9</option>
                    <?php
                    foreach ($joueurCollection as $joueur){
                        echo '<option value="'.$joueur->getid_joueur.'">'.$joueur->getnom_joueur().' '.$joueur->getprenom_joueur().'</option>';
                    }
                    ?>
                </select>
                <select id="select_poste_j9" name="select_poste_j9">
                    <option default >Poste</option>
                    <?php
                    foreach ($listePostes as $poste){
                        echo '<option value="'.$postes.'">'.$poste.'</option>';
                    }
                    ?>
                </select>
                <select id="select_plcmt_j9" name="select_plcmt_j9">
                    <option default >Placement</option>
                    <?php
                    foreach ($listePlacements as $placement){
                        echo '<option value="'.$placement.'">'.$placement.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <select id="select_joueur10" name="select_joueur10">
                    <option default >Joueur 10</option>
                    <?php
                    foreach ($joueurCollection as $joueur){
                        echo '<option value="'.$joueur->getid_joueur.'">'.$joueur->getnom_joueur().' '.$joueur->getprenom_joueur().'</option>';
                    }
                    ?>
                </select>
                <select id="select_poste_j10" name="select_poste_j10">
                    <option default >Poste</option>
                    <?php
                    foreach ($listePostes as $poste){
                        echo '<option value="'.$postes.'">'.$poste.'</option>';
                    }
                    ?>
                </select>
                <select id="select_plcmt_j10" name="select_plcmt_j10">
                    <option default >Placement</option>
                    <?php
                    foreach ($listePlacements as $placement){
                        echo '<option value="'.$placement.'">'.$placement.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <select id="select_joueur11" name="select_joueur11">
                    <option default >Joueur 11</option>
                    <?php
                    foreach ($joueurCollection as $joueur){
                        echo '<option value="'.$joueur->getid_joueur.'">'.$joueur->getnom_joueur().' '.$joueur->getprenom_joueur().'</option>';
                    }
                    ?>
                </select>
                <select id="select_poste_j11" name="select_poste_j11">
                    <option default >Poste</option>
                    <?php
                    foreach ($listePostes as $poste){
                        echo '<option value="'.$postes.'">'.$poste.'</option>';
                    }
                    ?>
                </select>
                <select id="select_plcmt_j11" name="select_plcmt_j11">
                    <option default >Placement</option>
                    <?php
                    foreach ($listePlacements as $placement){
                        echo '<option value="'.$placement.'">'.$placement.'</option>';
                    }
                    ?>
                </select>
            </div>
            <br/>
            <div>
                <select id="select_remplacant1" name="select_remplacant1">
                    <option default >Remplacant 1</option>
                    <?php
                    foreach ($joueurCollection as $joueur){
                        echo '<option value="'.$joueur->getid_joueur.'">'.$joueur->getnom_joueur().' '.$joueur->getprenom_joueur().'</option>';
                    }
                    ?>
                </select>
                <select id="select_remplacant1" name="select_remplacant1">
                    <option default >Poste</option>
                    <?php
                    foreach ($listePostes as $poste){
                        echo '<option value="'.$postes.'">'.$poste.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <select id="select_remplacant2" name="select_remplacant2">
                    <option default >Remplacant 2</option>
                    <?php
                    foreach ($joueurCollection as $joueur){
                        echo '<option value="'.$joueur->getid_joueur.'">'.$joueur->getnom_joueur().' '.$joueur->getprenom_joueur().'</option>';
                    }
                    ?>
                </select>
                <select id="select_remplacant2" name="select_remplacant2">
                    <option default >Poste</option>
                    <?php
                    foreach ($listePostes as $poste){
                        echo '<option value="'.$postes.'">'.$poste.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <select id="select_remplacant3" name="select_remplacant3">
                    <option default >Remplacant 3</option>
                    <?php
                    foreach ($joueurCollection as $joueur){
                        echo '<option value="'.$joueur->getid_joueur.'">'.$joueur->getnom_joueur().' '.$joueur->getprenom_joueur().'</option>';
                    }
                    ?>
                </select>
                <select id="select_remplacant3" name="select_remplacant3">
                    <option default >Poste</option>
                    <?php
                    foreach ($listePostes as $poste){
                        echo '<option value="'.$postes.'">'.$poste.'</option>';
                    }
                    ?>
                </select>
            </div>
            <br/>
        </div>

        <button type="submit">Enregistrer</button>
    </form>
    <form method="post" action="index.php">
        <button type="submit">Retour</button>
    </form>
</div>

<!--le poste occupé par leur joueur -->
<!-- Avant, Ailier, Milieu offensif, Milieu, Milieu défensif, Arrière, Gardien -->

<!--ainsi que le placement sur le terrain : Centre, Droit, Gauche-->

<!--.Il sera également nécessaire de savoir si le joueur est remplaçant sur ce match sachant-->
<!--qu’un titulaire pourra être remplaçant sur un match précis (ou absent).-->
<!--Pour un match, il devra y avoir minimum 3 remplaçants.-->
<!--Il sera également nécessaire d’identifier le Capitaine de l’équipe ainsi que le suppléant.-->