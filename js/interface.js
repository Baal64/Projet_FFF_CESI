//Les variables utiles
//--Globales
var current_template = ko.observable((role_utilisateur=="presentateur" ? "accueil_presentateur" : "interface_entraineur")); //Template à afficher suivant les conditions (utilisateurs, avancement...)
var equipes = ko.observable([]); //Tableau contenant toutes les équipes
var arbitres = ko.observable([]); //Tableau contenant tout les arbitres
//--Présentateurs
var tab_liste_feuilles_pre_match = ko.observable([]); //Tableau des feuilles pré match
var tab_liste_feuilles_post_match = ko.observable([]); //Tableau des feuilles post match
//--Entraineurs
var equipe1 = ko.observable({}); //Tableau des joueurs de l'équipe 1
var equipe2 = ko.observable({}); //Tableau des joueurs de l'équipe 2
var couleur_equipe1 = ko.observable('#FFF'); //Couleur de l'équipe 1
var couleur_equipe2 = ko.observable('#000'); //Couleur de l'équipe 2
var choix_couleur = ko.observable(0); //Permet de faire apparaitre/disparaitre le choix de la couleur de l'équipe - 0 : pas affiché | 1 - choix de couleur pour l'équipe 1 | 2 : choix de couleur pour l'équipe 2
var joueur_selectionne = ko.observable(false); //Permet de faire apparaitre/disparaitre le choix de l'action à effectuer pour le joueur selectionne - false : pas affiché | true - affiché

//Configurtation du tdatepicker
$.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );


//DONNEES EN DUR POUR LES TESTS
tab_liste_feuilles_pre_match([{'id':1,'date':'16/01/2020','equipe1':'Lille','equipe2':'Nantes'},{'id':2,'date':'16/01/2020','equipe1':'Marseille','equipe2':'PSG'}])
tab_liste_feuilles_post_match([{'id':1,'date':'16/01/2020','equipe1':'Lille','equipe2':'Nantes'},{'id':2,'date':'16/01/2020','equipe1':'Marseille','equipe2':'PSG'}])

var eq1 = {
	'gardien' : [{'nom':'John Doe','poste':'Gardien'}],
	'defenseurs' : [{'nom':'John Doe','poste':'Défenseur 1'},{'nom':'John Doe','poste':'Défenseur 2'},{'nom':'John Doe','poste':'Défenseur 3'},{'nom':'John Doe','poste':'Défenseur 4'}],
	'milieux' : [{'nom':'John Doe','poste':'Milieu 1'},{'nom':'John Doe','poste':'Milieu 2'},{'nom':'John Doe','poste':'Milieu 3'},{'nom':'John Doe','poste':'Milieu 4'}],
	'attaquants' : [{'nom':'John Doe','poste':'Attaquant 1'},{'nom':'John Doe','poste':'Attaquant 2'}]
}

var eq2 = {
	'gardien' : [{'nom':'John Smith','poste':'Gardien - 2'}],
	'defenseurs' : [{'nom':'John Smith','poste':'Défenseur 1- 2'},{'nom':'John Smith','poste':'Défenseur 2- 2'},{'nom':'John Smith','poste':'Défenseur 3- 2'},{'nom':'John Smith','poste':'Défenseur 4- 2'}],
	'milieux' : [{'nom':'John Smith','poste':'Milieu 1- 2'},{'nom':'John Smith','poste':'Milieu 2- 2'},{'nom':'John Smith','poste':'Milieu 3- 2'},{'nom':'John Smith','poste':'Milieu 4- 2'}],
	'attaquants' : [{'nom':'John Smith','poste':'Attaquant 1- 2'},{'nom':'John Smith','poste':'Attaquant 2- 2'}]
}

equipe1(eq1);
equipe2(eq2);
//FIN DES DONNEES EN DUR

//Récupération des données en base
//--Arbritres
$.post('./php/process.php',{'get_arbritres':''},function(data){
		arbitres(JSON.parse(data));
});
//--Equipes
$.post('./php/process.php',{'get_equipes':''},function(data){
		equipes(JSON.parse(data));
});

$(document).ready(function(){
	//On lance les binds
	ko.cleanNode($('#content')[0]);
	ko.applyBindings({},$('#content')[0]);


	//On lance la fonction d'initialisation
	initialize();

	function initialize(){
		//On va choisir les actions à executer en fonction du template
		switch(current_template()){
			case 'accueil_presentateur':
				events_presentateur_load();
				break;
		}
	}

	//Fonction liées à l'accueil présentateur
	function events_presentateur_load(){
		//Accueil
		//--Recherche d'une pré feuille de match
		$('#creer_feuille_match').off();
		$('#creer_feuille_match').on('click',function(){
			current_template('init_feuille_match');
			events_presentateur_load();
		});
		//--Recherche d'une pré feuille de match
		$('#recherche_feuille_match_pre').off();
		$('#recherche_feuille_match_pre').on('click',function(){
			console.log('Rechercher une pré feuille de match');
		});
		//--Recherche d'une post feuille de match
		$('#recherche_feuille_match_post').off();
		$('#recherche_feuille_match_post').on('click',function(){
			console.log('Rechercher une post feuille de match');
		});
		//Création de la feuille de match
		//--Selection de l'équipe domicile
		$('#select_equipe_domicile').off();
		$('#select_equipe_domicile').on('change',function(){
			var ville = equipes()[($(this)[0].selectedIndex-1)].ville_club+' - '+equipes()[($(this)[0].selectedIndex-1)].stade_club;
			$('#localisation_base').val(ville);
		});
		//--Selection de l'équipe externe
		$('#select_equipe_exterieur').off();
		$('#select_equipe_exterieur').on('change',function(){

		});
		//--Sélection de la date du match
		$('#date_match').off();
		$('#date_match').datepicker({
			firstDay: 1,
			dateFormat: "dd/mm/yy"
		});
		//--Retour au menu
		$('#retour_menu').off();
		$('#retour_menu').on('click',function(){
			current_template('accueil_presentateur');
			events_presentateur_load();
		});
	}

	//Fonction liées à l'accueil entraineur
	function accueil_entraineur_load(){

	}

	//Fonction permettant l'interraction du choix de la couleur des équipes
	function choix_couleurs(){
		$('.choix_couleur').off();
		$('.choix_couleur').on('click',function(){
			var equipe_choisie = $(this).attr('id').split('_')[1];
			choix_couleur(equipe_choisie);
			var colorPicker = new iro.ColorPicker("#picker", {
			  width: 150,
			  color: equipe_choisie==1 ? couleur_equipe1() : couleur_equipe2()
			});
			$('#voile').off();
			$('#voile').on('click',function(){
				choix_couleur(0);
			});
			$('#boite_choix_couleur').off();
			$('#boite_choix_couleur').on('click',function(e){
				e.preventDefault();
				e.stopPropagation();
			});
			colorPicker.on('color:change', function(color) {
				equipe_choisie==1 ? couleur_equipe1(color.hexString) : couleur_equipe2(color.hexString);
			});
		});
	}

	//Fonction permettant d'afecter les interractions avec les joueurs, pour les cartons ou les buts
	function selection_joueur(){
		$('.maillot').off();
		$('.maillot').on('click',function(){
			var poste = $('.poste',$(this).parent()).text();
			//On va chercher une copie du json de l'équipe
			var equipe_temp = JSON.parse(JSON.stringify(equipe1()));
			joueur_selectionne(true);
			$('#voile').off();
			$('#voile').on('click',function(){
				joueur_selectionne(false);
			});
			$('#boite_action_joueur_selectionne').off();
			$('#boite_action_joueur_selectionne').on('click',function(e){
				e.preventDefault();
				e.stopPropagation();
			});
			$('.action_joueur').off();
			$('.action_joueur').on('click',function(){
				var id = $(this).attr('id');
				switch(id){
					case "carton_jaune" :
						for(var role in equipe_temp){
							for(var joueur in equipe_temp[role]){
								if(equipe_temp[role][joueur].poste==poste){
									if(equipe_temp[role][joueur].hasOwnProperty('cartons'))
										equipe_temp[role][joueur]['cartons']['jaunes'].push($.trim($('#minutes').val()));
									else{
										equipe_temp[role][joueur]['cartons'] = {};
										equipe_temp[role][joueur]['cartons']['jaunes'] = [$.trim($('#minutes').val())];
									}
								}
							}
						}
						break;
					case "carton_rouge" :
						for(var role in equipe_temp){
							for(var joueur in equipe_temp[role]){
								if(equipe_temp[role][joueur].poste==poste){
									if(equipe_temp[role][joueur].hasOwnProperty('cartons'))
										equipe_temp[role][joueur]['cartons']['rouges'].push($.trim($('#minutes').val()));
									else{
										equipe_temp[role][joueur]['cartons'] = {};
										equipe_temp[role][joueur]['cartons']['rouges'] = [$.trim($('#minutes').val())];
									}
								}
							}
						}
						break;
					case "but":
						console.log("but");
						break;
					default:
						break;
				}
				equipe1(equipe_temp);
				selection_joueur();
			});
		});
	}

});