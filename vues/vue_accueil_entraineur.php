<!--<link rel="stylesheet" type="text/css" href="./public/css/vues/accueil_presentateur.css">-->
<!--<script type="text/javascript" src="./public/js/vues/accueil_presentateur.js"></script>-->

<div class="box flex flex_aic flex_sa flex_col flex1">
    <h2 class="title">SELECTION FEUILLE DE MATCH</h2>

    <div class="flex flex_aic flex_sa flex_col">
        <p class="label">Liste des feuilles de matchs</p>
        <div id="liste_feuilles_matchs">
          <?php
            foreach ($listematchs as $match){
              $equipedom = NULL;
              $equipeext = NULL;
              foreach ($listeinfosmatch as $infosmatch){
                  if ($infosmatch['id_match']==$match->getid_match()){
                      $equipedom = $infosmatch['equipe_domicile'];
                      $equipeext = $infosmatch['equipe_exterieur'];
                  }
              }
              if($equipedom!=NULL && $equipeext!=NULL){
                echo "<div class='flex'>";
                echo "<div>".$equipedom.' / '.$equipeext.' '.$match->getdate_match()."</div>";
                echo "</div>";
             }
           }
          ?>
        </div>
        <div class="feuille_pre_match flex flex_aic flex_sa">
            <div class="flex flex_col flex_aic flex_sa">
                <div id="bloc_match" class="flex flex_aic flex_sa flex_col">
                    <div class="label">Feuille de match</div>
                    <form method="post" action="index.php">
                      <select id="select_feuille_match" name="select_feuille_match" class="input">
                        <option default>Selection match</option>
                        <?php
                          foreach ($listematchs as $match){
                            $equipedom = NULL;
                            $equipeext = NULL;
                            foreach ($listeinfosmatch as $infosmatch){
                                if ($infosmatch['id_match']==$match->getid_match()){
                                    $equipedom = $infosmatch['equipe_domicile'];
                                    $equipeext = $infosmatch['equipe_exterieur'];
                                }
                            }
                            if($equipedom!=NULL && $equipeext!=NULL){
                              echo "<option value='".$match->getid_match()."'>".$equipedom.' / '.$equipeext.' '.$match->getdate_match()."</option>";
                           }
                         }
                        ?>
                        </select>
                        <br/>
                        <button id="editer_equipe_match" name="edit_equipe_match" class="btn flex flex_aic flex_sa" type="submit">Editer</button>
                    </form>
                </div>
            </div>
        </div>