<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script type="text/javascript" src="./public/js/vues/to_pdf.js"></script>

<div style="width: 100%; height: 80%;" class="flex">
    <div class="flex flex_aic flex_center flex_col flex1">
        <h2><?php echo $tab_noms_equipe['equipe_domicile'] ?></h2>
        <div class="flex flex_col flex_center">
            <?php
                foreach ($joueurs_dom as $joueur) {
                    echo "<div>".$joueur['joueur']->getnum_joueur()." - ".$joueur['joueur']->getprenom_joueur().' '.$joueur['joueur']->getnom_joueur()." - ".$joueur['joueur_match']->getstatut_match()." / ".($joueur['joueur_match']->getplacement_match()!=NULL ? $joueur['joueur_match']->getplacement_match() : "")."</div>";
                }
            ?>
        </div>
    </div>
    <div  style="background-color: #aaaaaa; height: 80%" class="box flex flex_aic flex_center flex_col flex1">
        <h2>Récapitulatif</h2>
        <div class="flex flex_aic flex_sa flex_col">
            <div><h3>Score</h3></div>
            <p class="label"><?php echo $tab_noms_equipe['equipe_domicile'].' ('.count($buts_dom).') / '.$tab_noms_equipe['equipe_exterieur'].' ('.count($buts_ext).')'; ?></p>
            <div class="flex flex_aic flex_col">
                <div>Détail</div>
                <div>Buts</div>
                <div class="flex flex_col">
                    <?php
                        foreach ($buts as $but) {
                           echo "<div>".$but['but']->gettemps_but()." - but de ".$but['joueur']->getprenom_joueur().' '.$but['joueur']->getnom_joueur()." pour ".$but['equipe']->getnom_club()."</div>";
                        }
                    ?>
                </div>
                <div>Cartons</div>
                <div class="flex flex_col">
                    <?php
                        foreach ($cartons as $carton) {
                           echo "<div>".$carton['carton']->gettemps_carton()." - carton ".strtolower($carton['carton']->getcouleur_carton())." pour ".$carton['joueur']->getprenom_joueur().' '.$carton['joueur']->getnom_joueur()." de l'équipe ".$carton['equipe']->getnom_club()."</div>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex_aic flex_center flex_col flex1">
        <h2><?php echo $tab_noms_equipe['equipe_exterieur'] ?></h2>
        <div class="flex flex_col flex_center">
            <?php
                foreach ($joueurs_ext as $joueur) {
                    echo "<div>".$joueur['joueur']->getnum_joueur()." - ".$joueur['joueur']->getprenom_joueur().' '.$joueur['joueur']->getnom_joueur()." - ".$joueur['joueur_match']->getstatut_match()." / ".($joueur['joueur_match']->getplacement_match()!=NULL ? $joueur['joueur_match']->getplacement_match() : "")."</div>";
                }
            ?>
        </div>
    </div>
    <div id="print_to_pdf" style="position: absolute; right: calc(0.2vw + 0.2vh); bottom: calc(0.2vw + 0.2vh);">PDF</div>
</div>