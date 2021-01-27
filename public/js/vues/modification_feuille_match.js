$(function() {

  var equipes,arbitres;
  var date_init;
  var equipes_init = [];
  var date_changed = false;

  $.post('./controleurs/creation_feuille_match.php',{'get_equipes':''},function(data){
      equipes = JSON.parse(data);
  });
  $.post('./controleurs/creation_feuille_match.php',{'get_arbitres':''},function(data){
      arbitres = JSON.parse(data);
  });
  $.post('./controleurs/creation_feuille_match.php',{'get_matchs':''},function(data){
    matchs = JSON.parse(data);
  });

  //Configurtation du tdatepicker
  $.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );

  //Mise en place d'un datepicker pour la date
  $('#date_match').off();
  $('#date_match').on('change',function(){
    if($.trim($('#select_equipe_domicile').val())!="" && $.trim($('#select_equipe_exterieur').val())!="" && $.trim($('#select_arbitre_princiçpal').val())!="" && $.trim($('#select_arbitre_assistant1').val())!="" && $.trim($('#select_arbitre_assistant2').val())!="" && $.trim($('#localisation_base').val())!="" && $.trim($('#date_match').val())!="")
      $('#valide_feuille_match').prop('disabled',false);
    else
      $('#valide_feuille_match').prop('disabled',true);
    check_and_send();
    if(format_date($.trim($('#date_match').val()))==date_init)
      date_changed = false;
    else
      date_changed = true;
  });
  $('#date_match').datepicker({
    firstDay: 1,
    dateFormat: "dd/mm/yy"
  });


  set_selects_dynamic();

  function check_and_send(){
    $('#valide_modif_feuille_match').off();
    $('#valide_modif_feuille_match').on('click',function(){
      var send_form = true;
      var tab_equipes_indispo = [];
      var equipes_changed = true;
      var tab_equipes_temps = [];
      tab_equipes_temps.push($('#select_equipe_domicile').val());
      tab_equipes_temps.push($('#select_equipe_exterieur').val());
      tab_equipes_temps = tab_equipes_temps.sort();

      console.log(date_changed,(equipes_init.toString()!=tab_equipes_temps.toString()));

      for(var i =0; i<matchs.length; i++){
        if(((matchs[i]['id_equipe_dom']==$.trim($('#select_equipe_domicile').val()) || matchs[i]['id_equipe_ext']==$.trim($('#select_equipe_exterieur').val())) || (matchs[i]['id_equipe_dom']==$.trim($('#select_equipe_exterieur').val()) || matchs[i]['id_equipe_ext']==$.trim($('#select_equipe_domicile').val())) && matchs[i]['date']==format_date($.trim($('#date_match').val()))) && (date_changed || equipes_init.toString()!=tab_equipes_temps.toString())){
          
          if(matchs[i]['id_equipe_dom']==$.trim($('#select_equipe_domicile').val()))
            if($.inArray($.trim($('#select_equipe_domicile option:selected').text()),tab_equipes_indispo)==-1)
              tab_equipes_indispo.push($.trim($('#select_equipe_domicile option:selected').text()));
          
          if(matchs[i]['id_equipe_ext']==$.trim($('#select_equipe_exterieur').val()))
            if($.inArray($.trim($('#select_equipe_exterieur option:selected').text()),tab_equipes_indispo)==-1)
              tab_equipes_indispo.push($.trim($('#select_equipe_exterieur option:selected').text()));
          
          if(matchs[i]['id_equipe_dom']==$.trim($('#select_equipe_exterieur').val()))
            if($.inArray($.trim($('#select_equipe_exterieur option:selected').text()),tab_equipes_indispo)==-1)
              tab_equipes_indispo.push($.trim($('#select_equipe_exterieur option:selected').text()));
          
          if(matchs[i]['id_equipe_ext']==$.trim($('#select_equipe_domicile').val()))
            if($.inArray($.trim($('#select_equipe_domicile option:selected').text()),tab_equipes_indispo)==-1)
              tab_equipes_indispo.push($.trim($('#select_equipe_domicile option:selected').text()));
          send_form = false;
        }
      }
      if(!send_form){
        popup_alert("Action impossible !",(tab_equipes_indispo.length>1 ? ("Les equipes "+tab_equipes_indispo[0]+" et "+tab_equipes_indispo[1]+" ont ") : ("L'équipe "+tab_equipes_indispo[0]+" a "))+" déjà un match de prévu le "+$.trim($('#date_match').val())+". Vous ne pouvez pas sélectionner "+(tab_equipes_indispo.length>1 ? ("ces équipes") : ("cette équipe"))+" pour un match à cette date.");
      }
      else{
       $("#modif_feuille").submit();
      }
    });
  } 

  setTimeout(function(){
    $('.selectEquipe').change();
    $('.selectArbitre').change();
    date_init = format_date($.trim($('#date_match').val()));
    equipes_init.push($('#select_equipe_domicile').val());
    equipes_init.push($('#select_equipe_exterieur').val());
    equipes_init = equipes_init.sort();
  },200);


  function set_selects_dynamic(){
    $('select,input:not(#date_match)').off();

    if($.trim($('#select_equipe_domicile').val())!="" && $.trim($('#select_equipe_exterieur').val())!="" && $.trim($('#select_arbitre_princiçpal').val())!="" && $.trim($('#select_arbitre_assistant1').val())!="" && $.trim($('#select_arbitre_assistant2').val())!="" && $.trim($('#localisation_base').val())!="" && $.trim($('#date_match').val())!="")
      $('#valide_modif_feuille_match').prop('disabled',false);
    else
      $('#valide_modif_feuille_match').prop('disabled',true);
    check_and_send();
    $('.selectEquipe').on('change',function(){
      if($(this).attr('id')=="select_equipe_domicile"){
        var i = 0;
        var ville = '';
        while(i<equipes.length && ville==''){
          if(equipes[i]['id']==$(this).val())
            ville=equipes[i]['ville']+' - '+equipes[i]['stade'];
          i++;
        }
      $('#localisation_base').val(ville);
      }
      var ids_to_remove = [];
      $('.selectEquipe').each(function(){
        if($(this).val()!=''){
            ids_to_remove.push($(this).val());
        }
      });
      $('.selectEquipe').each(function(index) {
        var id_this = $(this).val();
        var first_option = $($('option',this).get(0)).text();
        var options = "<option value=''>"+first_option+"</otpion>";
        for(var i=0; i<equipes.length; i++){
            if($.inArray(equipes[i]['id'],ids_to_remove)==-1 || equipes[i]['id']==id_this){
               if(equipes[i]['id']==id_this)
                options += "<option selected='selected' value='" + equipes[i]['id'] + "'>" + equipes[i]['nom'] + "</option>"
               else
                options += "<option value='"+equipes[i]['id']+"'>"+equipes[i]['nom']+"</option>"
            }
        }
        $(this).html(options);
      });
      set_selects_dynamic();
    });

    $('.selectArbitre').on('change',function(){
      var ids_to_remove = [];
      $('.selectArbitre').each(function(){
        if($(this).val()!=''){
            ids_to_remove.push($(this).val());
        }
      });
      $('.selectArbitre').each(function(index) {
        var id_this = $(this).val();
        var first_option = $($('option',this).get(0)).text();
        var options = "<option value=''>"+first_option+"</otpion>";
        for(var i=0; i<arbitres.length; i++){
            if($.inArray(arbitres[i]['id'],ids_to_remove)==-1 || arbitres[i]['id']==id_this){
               if(arbitres[i]['id']==id_this)
                options += "<option selected='selected' value='" + arbitres[i]['id'] + "'>" + arbitres[i]['nom'] + ' ' + arbitres[i]['prenom'] + "</option>"
               else
                options += "<option value='"+arbitres[i]['id']+"'>"+arbitres[i]['nom']+' '+arbitres[i]['prenom']+"</option>"
            }
        }
        $(this).html(options);
      });
      set_selects_dynamic();
    });
  }
});