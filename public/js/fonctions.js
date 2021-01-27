//Fonction permettant de faire apparaitre une popup avec un contenu personnalisé
function popup_alert(titre,contenu,buttons){
	if(typeof buttons === 'undefined')
		buttons = {"Ok": function() {$( this ).dialog( "close" );}};
	else
		buttons = buttons;
	$( "#dialog-confirm" ).attr('title', titre);
	$( "#dialog-confirm p" ).html(contenu);
	$( ".ui-dialog-title" ).text(titre);
	$( "#dialog-confirm" ).dialog({
		  title: titre,
		  width: 800,
		  height: 350,
		  resizable: false,
		  modal: true,
		  buttons: buttons
	});
}

function format_date(date){
	tab_date = date.split('/');
	date = tab_date[2]+'-'+tab_date[1]+'-'+tab_date[0];
	return date;
}

function deformat_date(date){
	tab_date = date.split('-');
	date = tab_date[2]+'/'+tab_date[1]+'/'+tab_date[0];
	return date;
}