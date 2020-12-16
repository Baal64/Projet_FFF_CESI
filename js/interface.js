//Les variables utiles
var equipe1 = ko.observable({}); //Tableau des joueurs de l'équipe 1
var equipe2 = ko.observable({}); //Tableau des joueurs de l'équipe 2
var couleur_equipe1 = ko.observable('#FFF'); //Couleur de l'équipe 1
var couleur_equipe2 = ko.observable('#000'); //Couleur de l'équipe 2
var choix_couleur = ko.observable(0); //Permet de faire apparaitre/disparaitre le choix de la couleur de l'équipe - 0 : pas affiché | 1 - choix de couleur pour l'équipe 1 | 2 : choix de couleur pour l'équipe 2
var joueur_selectionne = ko.observable(false); //Permet de faire apparaitre/disparaitre le choix de l'action à effectuer pour le joueur selectionne - false : pas affiché | true - affiché

//DONNEES EN DUR POUR LES TESTS
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


$(document).ready(function(){
	//On lance les binds
	ko.cleanNode($('#content')[0]);
	ko.applyBindings({},$('#content')[0]);


	//On lance la fonction d'initialisation
	initialize();

	function initialize(){
		//On active les boutons de choix de couleur
		choix_couleurs();
		//On active la sélection des joueurs
		selection_joueur();
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