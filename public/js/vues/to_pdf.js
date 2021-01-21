$(function() {
	$('#print_to_pdf').off();
  $('#print_to_pdf').on('click',function(){
    $('#mainlogo').css('visibility','hidden');
    $('#print_to_pdf').css('visibility','hidden');
    html2canvas($('#content')[0],{
       onrendered: function(canvas){
        var image = canvas.toDataURL();
        $('#mainlogo').css('visibility','visible');
        $('#print_to_pdf').css('visibility','visible');
        var html = "<img src="+image+" width='900px'/>";
        $.post('./php/dompdf/index.php',{'html':html},function(data){console.log(data)});
      }
    });
  });
});