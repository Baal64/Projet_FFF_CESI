$(function() {
    var joueurs_equipe_loaded = false;
	  var joueurs_equipe_init, joueurs_restants, id_equipe;

    $.post('./controleurs/edition_equipe_match.php',{'get_joueurs':''},function(data){
        joueurs_equipe_init = JSON.parse(data);
        joueurs_equipe_loaded = true;
    });

    set_selects_dynamic();

    function set_selects_dynamic(){
      //On verfie si toutes les conditions sont réunies pour envoyer le formulaire
      var joueurs_ok = true;
      var postes_ok = true;
      var placements_ok = true;
      $('.joueurSelection').each(function(){
        var value = $(this).val();
        if(value=="")
          joueurs_ok = false;
      });
      $('.joueurPosteSelection').each(function(){
        var value = $(this).val();
        if(value=="")
          postes_ok = false;
      });
      $('.joueurSelection').each(function(index){
        var value = $(this).val();
        if(value=="" && $($('.joueurPosteSelection').get(index)).val()!="Gardien")
          placements_ok = false;
      });
      if(joueurs_ok && postes_ok && placements_ok)
        $('#valid_creation_equipe').prop('disabled',false);
      else
        $('#valid_creation_equipe').prop('disabled',true);

      $('.joueurSelection').off();
      $('.joueurSelection').on('change',function(){
          if($(this).val()==''){
            var index = $(this).index('.joueurSelection');
            $('option',$('.joueurPosteSelection').get(index)).each(function(){
              $(this).removeAttr('selected');
            });
            $('option',$('.joueurPlacementSelection').get(index)).each(function(){
              $(this).removeAttr('selected');
            });
            $($('option',$('.joueurPosteSelection').get(index)).get(0)).attr('selected','selected');
            $($('option',$('.joueurPlacementSelection').get(index)).get(0)).attr('selected','selected');
            set_selects_dynamic();
          }
          else{
            //On va chercher la liste de tous les postes actuels voir si un gardien a déjà été renseigné
            var gardien_already_selected = false;
            var is_gardien_selected = false;
            var indexSel = $(this).index('.joueurSelection');
            $('.joueurPosteSelection').each(function(i){
              if($(this).val()=="Gardien" && i<10)
                gardien_already_selected = true;
            });
            for(var i=0; i<joueurs_equipe_init.length; i++){
              if(joueurs_equipe_init[i]['id']==$(this).val() && joueurs_equipe_init[i]['poste']=="Gardien" && indexSel<10)
                is_gardien_selected = true;
            }
            console.log(is_gardien_selected,gardien_already_selected);
            if(is_gardien_selected && gardien_already_selected){
              popup_alert("Vous ne pouvez pas avoir deux gardiens dans l'équipe !","Le joueur que vous avez sélectionné est un gardien, hors vous en avez déjà sélectionné un pour cet équipe. Vous ne pouvez pas ajouter d'autre gardien dans cette équipe, ou alors dans les remplaçants.");
            }
            else{
              var ids_to_remove = [];
              $('.joueurSelection').each(function(){
                  if($(this).val()!=''){
                      ids_to_remove.push($(this).val());
                  }
              });
              $('.joueurSelection').each(function(index) {
                  var id_this = $(this).val();
                  var first_option = $($('option',this).get(0)).text();
                  var options = "<option value=''>"+first_option+"</otpion>";
                  for(var i=0; i<joueurs_equipe_init.length; i++){
                      if($.inArray(joueurs_equipe_init[i]['id'],ids_to_remove)==-1 || joueurs_equipe_init[i]['id']==id_this){
                         if(joueurs_equipe_init[i]['id']==id_this) {
                             options += "<option selected='selected' value='" + joueurs_equipe_init[i]['id'] + "'>" + joueurs_equipe_init[i]['prenom'] + ' ' + joueurs_equipe_init[i]['nom'] + "</option>"
                             var select_poste = $('.joueurPosteSelection').get(index);
                             var index_option = -1;
                             $('option',select_poste).each(function(index_option_select){
                                 if($(this).val()==joueurs_equipe_init[i]['poste'])
                                  index_option = index_option_select;
                             });
                             $('option',$('.joueurPosteSelection').get(index)).each(function(){
                              $(this).removeAttr('selected');
                             });
                             $($('option',$('.joueurPosteSelection').get(index)).get(index_option)).attr('selected','selected');
                             if($($('.joueurPosteSelection').get(index)).val()=="Gardien")
                              $($('.joueurPlacementSelection').get(index)).css('visibility','hidden');
                             else
                              $($('.joueurPlacementSelection').get(index)).css('visibility','visible');
                         }
                         else
                          options += "<option value='"+joueurs_equipe_init[i]['id']+"'>"+joueurs_equipe_init[i]['prenom']+' '+joueurs_equipe_init[i]['nom']+"</option>"
                      }
                  }
                  $(this).html(options);
              });
              set_selects_dynamic();
            }
          }
      });
    }

});