$(function() {
	//Configurtation du tdatepicker
	$.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );

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
});