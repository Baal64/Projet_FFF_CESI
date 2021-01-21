<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script type="text/javascript" src="./public/js/vues/to_pdf.js"></script>

<div style="width: 100%; height: 80%;" class="flex">
    <div class="flex flex_aic flex_center flex_col flex1">
        <div class="flex flex_sa flex_aic">
            <div class="logo_equipe" style="<?php echo 'background-image : url(./public/css/images/logos/'.$infos_dom['logo'].');'; ?>"></div>
            <div class="maillot_equipe"  style="<?php echo 'background-image : url(./public/css/images/maillots/'.$infos_dom['maillot_dom'].');'; ?>"></div>
        </div>
        <h2 class="title"><?php echo $tab_noms_equipe['equipe_domicile'] ?></h2>
        <div class="flex flex_col flex_center">
            <?php
                foreach ($joueurs_dom as $joueur) {
                    echo "<div class='text'>".$joueur['joueur']->getnum_joueur()." - ".$joueur['joueur']->getprenom_joueur().' '.$joueur['joueur']->getnom_joueur()." - ".$joueur['joueur_match']->getstatut_match()." / ".($joueur['joueur_match']->getplacement_match()!=NULL ? $joueur['joueur_match']->getplacement_match() : "")."</div>";
                }
            ?>
        </div>
    </div>
    <div  style="background-color: #d0d8ff; height: 80%" class="box flex flex_aic flex_sa flex_col flex1">
        <h2 class="title">Récapitulatif</h2>
        <div><h3 class="text">Score</h3></div>
        <p class="label text"><?php echo $tab_noms_equipe['equipe_domicile'].' ('.count($buts_dom).') / '.$tab_noms_equipe['equipe_exterieur'].' ('.count($buts_ext).')'; ?></p>
        <div class="flex flex_aic flex_col">
        <h2 class="title">Détail</h2>
        <h3 class="text">Buts</h3>
        <div class="flex flex_col">
            <?php
                foreach ($buts as $but) {
                   echo "<div class='text'>".$but['but']->gettemps_but()." - but de ".$but['joueur']->getprenom_joueur().' '.$but['joueur']->getnom_joueur()." pour ".$but['equipe']->getnom_club()."</div>";
                }
            ?>
        </div>
        <h3 class="text">Cartons</h3>
            <div class="flex flex_col">
                <?php
                    foreach ($cartons as $carton) {
                       echo "<div class='text'>".$carton['carton']->gettemps_carton()." - carton ".strtolower($carton['carton']->getcouleur_carton())." pour ".$carton['joueur']->getprenom_joueur().' '.$carton['joueur']->getnom_joueur()." de l'équipe ".$carton['equipe']->getnom_club()."</div>";
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="flex flex_aic flex_center flex_col flex1">
        <div class="flex flex_sa flex_aic">
            <div class="logo_equipe" style="<?php echo 'background-image : url(./public/css/images/logos/'.$infos_ext['logo'].');'; ?>"></div>
            <div class="maillot_equipe"  style="<?php echo 'background-image : url(./public/css/images/maillots/'.$infos_ext['maillot_ext'].');'; ?>"></div>
        </div>
        <h2 class="title"><?php echo $tab_noms_equipe['equipe_exterieur'] ?></h2>
        <div class="flex flex_col flex_center">
            <?php
                foreach ($joueurs_ext as $joueur) {
                    echo "<div class='text'>".$joueur['joueur']->getnum_joueur()." - ".$joueur['joueur']->getprenom_joueur().' '.$joueur['joueur']->getnom_joueur()." - ".$joueur['joueur_match']->getstatut_match()." / ".($joueur['joueur_match']->getplacement_match()!=NULL ? $joueur['joueur_match']->getplacement_match() : "")."</div>";
                }
            ?>
        </div>
    </div>
    <div id="print_to_pdf"></div>
</div>