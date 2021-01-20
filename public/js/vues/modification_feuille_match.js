$(function() {
	//Configurtation du tdatepicker
	$.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );
  //On défait les évenements
  $('input,select').off();
  
	//On va chercher la localisation sur la sélection de l'équipe domicile
  $('#select_equipe_domicile').off();
  $('#select_equipe_domicile').on('change',function(){
  	//On va chercher la ville de l'équipe sélectionnée pour la remplir automatiquement
  	$.post('./controleurs/creation_feuille_match.php',{'get_ville_from_equipe_selection':$('#select_equipe_domicile').val()},function(data){
  		$('#localisation_base').val(data);
  	});
  });

  //Mise en place d'un datepicker pour la date
  $('#date_match').off();
	$('#date_match').datepicker({
		firstDay: 1,
		dateFormat: "dd/mm/yy"
	});

  //On va controler qu'il y ait toutes les données avant de pouvoir valider
  $('input,select').on('change',function(){
    if($.trim($('#select_equipe_domicile').val())!="" && $.trim($('#select_equipe_exterieur').val())!="" && $.trim($('#select_arbitre_princiçpal').val())!="" && $.trim($('#select_arbitre_assistant1').val())!="" && $.trim($('#select_arbitre_assistant2').val())!="" && $.trim($('#localisation_base').val())!="" && $.trim($('#date_match').val())!="")
      $('#valide_modif_feuille_match').prop('disabled',false);
    else
      $('#valide_modif_feuille_match').prop('disabled',true);
  });
});