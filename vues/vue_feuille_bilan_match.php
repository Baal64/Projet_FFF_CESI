


<div style="background-color: #007fff; height: 80%" class="box flex flex_aic flex_sa flex_col flex1">

    <h2>Equipe DOM</h2>
    <div style="background-color: #aaaaaa; height: 40%; width: 90%" class="flex flex_aic flex_sa flex_col">
            <div id="joueur" name="joueur">
                <h3>Joueur</h3>
                <select id="select_joueur" name="select_joueur">
                    <option default></option>
                </select>
            </div>
            <div id="infosmatch" name="infomatch">
                <div id="but">
                    <form>
                        <input type="checkbox" id="contresoncamp" name="contresoncamp">
                        <label for="contresoncamp">Contre son camp</label>
                    </form>
                    <h3>But</h3>
                    <input type="text" id="tempsbut" name="tempsbut" placeholder="Temps">

                </div>
                <div id="cartonjaune">
                    <h3>Carton Jaune</h3>
                    <input type="text" id="tempscartonjaune" name="tempscartonjaune" placeholder="Temps">
                </div>
                <div id="cartonrouge">
                    <h3>Carton Rouge</h3>
                    <input type="text" id="tempscartonrouge" name="tempscartonrouge" placeholder="Temps">
                </div>
            </div>
    </div>


    <h2>Equipe EXT</h2>
    <div style="background-color: #aaaaaa; height: 40%; width: 90%" class="flex flex_aic flex_sa flex_col">
        <div id="joueurext" name="joueurext">
            <h3>Joueur</h3>
            <select id="select_joueurext" name="select_joueurext">
                <option default></option>
            </select>
        </div>
        <div id="infosmatchext" name="infomatchext">
            <div id="butext">
                <form>
                    <input type="checkbox" id="contresoncampext" name="contresoncampext">
                    <label for="contresoncampext">Contre son camp</label>
                </form>
                <h3>But</h3>
                <input type="text" id="tempsbutext" name="tempsbutext" placeholder="Temps">

            </div>
            <div id="cartonjauneext">
                <h3>Carton Jaune</h3>
                <input type="text" id="tempscartonjauneext" name="tempscartonjauneext" placeholder="Temps">
            </div>
            <div id="cartonrougeext">
                <h3>Carton Rouge</h3>
                <input type="text" id="tempscartonrougeext" name="tempscartonrougeext" placeholder="Temps">
            </div>
        </div>
    </div>

</div>
<!-- Séparateur -->
<div id="separation"></div>
<!-- Partie recap -->
<div  style="background-color: #aaaaaa; height: 80%" class="box flex flex_aic flex_sa flex_col flex1">
    <h2>Récapitulatif</h2>
    <div class="flex flex_aic flex_sa flex_col">
        <div><h3>Score</h3></div>
        <p class="label">Equipe DOm - Equipe Ext</p>
        <div class="flex flex_aic">
            <input type="text" placeholder="Rechercher" />
            <div id="recherche_feuille_match_post">OK</div>
        </div>
    </div>
    <div class="flex flex_aic flex_sa flex_col">
        <p class="label">Liste des feuilles de matchs</p>
        <div id="liste_feuilles_matchs">



        </div>
    </div>
</div>