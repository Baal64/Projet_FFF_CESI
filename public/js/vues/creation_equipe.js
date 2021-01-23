$(function() {
    var joueurs_equipe_loaded = false;
	var joueurs_equipe_init, joueurs_restants, id_equipe;

    $.post('./controleurs/edition_equipe_match.php',{'get_joueurs':''},function(data){
        joueurs_equipe_init = JSON.parse(data);
        joueurs_equipe_loaded = true;
    });

    set_selects_dynamic();

    function set_selects_dynamic(){
        $('.joueurSelection').off();
        $('.joueurSelection').on('change',function(){
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
                           $($('option',$('.joueurPosteSelection').get(index)).get(index_option)).attr('selected','selected');
                       }
                       else
                            options += "<option value='"+joueurs_equipe_init[i]['id']+"'>"+joueurs_equipe_init[i]['prenom']+' '+joueurs_equipe_init[i]['nom']+"</option>"
                    }
                }
                $(this).html(options);
            });
            set_selects_dynamic();
        });
    }

});