


<div style="height: 80%" class="box flex flex_aic flex_sa flex_col flex1">

    <h2 class="title"><?php echo $tab_noms_equipe['equipe_domicile']; ?></h2>
    <div style="height: 40%; width: 90%" class="flex flex_aic flex_sa flex_col">
        <form method="post" action="index.php">
            <div id="joueur" name="joueur">
                <h3 class="text">Joueur</h3>
                 
                <select id="select_joueur" name="select_joueur" class="input">
                    <option default></option>
                    <?php
                        foreach ($joueursDom as $joueur) {
                            echo "<option value='".$joueur->getid_joueur()."'>".$joueur->getnom_joueur().' '.$joueur->getprenom_joueur()."</option>";
                        }
                    ?>
                </select>
            </div>
            <div id="infosmatch" name="infomatch">
                <div id="but">
                    <div class="flex flex_sa flex_aic contre_camp">
                        <h3 class="text">But</h3>
                        <div class="flex flex_aic">
                            <input type="checkbox" id="contresoncamp" name="contresoncamp">
                            <label for="contresoncamp">Contre son camp</label>
                        </div>
                    </div>
                    <input type="text" id="tempsbut" name="tempsbut" placeholder="Temps" class="input">
                    <button type="submit" name="set_but" value="<?php echo $id_match; ?>" class="btn">OK</button>
                </div>
                <div id="cartonjaune">
                    <h3 class="text">Carton Jaune</h3>
                    <input type="text" id="tempscartonjaune" name="tempscartonjaune" placeholder="Temps" class="input">
                    <button type="submit" name="set_carton_jaune" value="<?php echo $id_match; ?>" class="btn">OK</button>
                </div>
                <div id="cartonrouge">
                    <h3 class="text">Carton Rouge</h3>
                    <input type="text" id="tempscartonrouge" name="tempscartonrouge" placeholder="Temps" class="input">
                    <button type="submit" name="set_carton_rouge" value="<?php echo $id_match; ?>" class="btn">OK</button>
                </div>
            </div>
        </form>
    </div>


    <h2 class="title"><?php echo $tab_noms_equipe['equipe_exterieur']; ?></h2>
    <div style="height: 40%; width: 90%" class="flex flex_aic flex_sa flex_col">
        <form method="post" action="index.php">
            <div id="joueurext" name="joueurext">
                <h3 class="text">Joueur</h3>
                <select id="select_joueurext" name="select_joueurext" class="input">
                    <option default></option>
                    <?php
                        foreach ($joueursExt as $joueur) {
                            echo "<option value='".$joueur->getid_joueur()."'>".$joueur->getnom_joueur().' '.$joueur->getprenom_joueur()."</option>";
                        }
                    ?>
                </select>
            </div>
            <div id="infosmatchext" name="infomatchext">
                <div id="butext">
                    <div class="flex flex_aic flex_sa contre_camp">
                        <h3 class="text">But</h3>
                        <div class="flex flex_aic">
                            <input type="checkbox" id="contresoncampext" name="contresoncampext">
                            <label for="contresoncampext">Contre son camp</label>
                        </div>
                    </div>
                    <input type="text" id="tempsbutext" name="tempsbutext" placeholder="Temps" class="input">
                    <button type="submit" name="set_butext" value="<?php echo $id_match; ?>" class="btn">OK</button>
                </div>
                <div id="cartonjauneext">
                    <h3 class="text">Carton Jaune</h3>
                    <input type="text" id="tempscartonjauneext" name="tempscartonjauneext" placeholder="Temps" class="input">
                    <button type="submit" name="set_carton_jauneext" value="<?php echo $id_match; ?>" class="btn">OK</button>
                </div>
                <div id="cartonrougeext">
                    <h3 class="text">Carton Rouge</h3>
                    <input type="text" id="tempscartonrougeext" name="tempscartonrougeext" placeholder="Temps" class="input">
                    <button type="submit" name="set_carton_rougeext" value="<?php echo $id_match; ?>" class="btn">OK</button>
                </div>
            </div>
        </form>
    </div>

</div>

<!-- Partie recap -->
<div  style="background-color: #d0d8ff; height: 80%" class="box flex flex_aic flex_sa flex_col flex1">
    <h2 class="title">Récapitulatif</h2>
    <div><h3 class="text">Score</h3></div>
    <p class="score"><?php echo $tab_noms_equipe['equipe_domicile'].' ('.count($buts_dom).') / '.$tab_noms_equipe['equipe_exterieur'].' ('.count($buts_ext).')'; ?></p>
    <div class="flex flex_aic flex_col">
    <h2 class="title">Détail</h2>
    <h3 class="text">Buts</h3>
    <div class="flex flex_col">
        <?php
           /* foreach ($buts as $but) {
               echo "<div class='text line_but'>".$but['but']->gettemps_but()." - but de ".$but['joueur']->getprenom_joueur().' '.$but['joueur']->getnom_joueur()." pour ".$but['equipe']->getnom_club()."</div>";
            }*/

        foreach ($buts as $but) {

            if ($but['but']->getcontre_camp() == null || $but['but']->getcontre_camp() == 0) {
                echo "<div class='text'>" . $but['but']->gettemps_but() . " - but de " . $but['joueur']->getprenom_joueur() . ' ' . $but['joueur']->getnom_joueur() . " pour " . $but['equipe']->getnom_club() . "</div>";
            } else {
                echo "<div class='text'>" . $but['but']->gettemps_but() . " - but contre son camp de " . $but['joueur']->getprenom_joueur() . ' ' . $but['joueur']->getnom_joueur() . " de " . $but['equipe']->getnom_club() . "</div>";
            }
        }

        ?>
    </div>
    <h3 class="text">Cartons</h3>
    <div class="flex flex_col">
        <?php
            foreach ($cartons as $carton) {
               echo "<div class='text line_carton'>".$carton['carton']->gettemps_carton()." - carton ".strtolower($carton['carton']->getcouleur_carton())." pour ".$carton['joueur']->getprenom_joueur().' '.$carton['joueur']->getnom_joueur()." de l'équipe ".$carton['equipe']->getnom_club()."</div>";
            }
        ?>
    </div>
    </div>
    <form action="index.php" method="post">
        <button class="btn" name="to_pdf" value="<?php echo $id_match; ?>">Vers page d'impression PDF</button>
    </form>
</div>