$(document).ready(function(){
var $table = $('table.scroll'),
    $bodyCells = $table.find('tbody tr:first').children(),
    colWidth,
	h = window.innerHeight,
	hc = h-150;
	$table.find('tbody').height(hc);
	
	colWidth = $bodyCells.map(function() {
		return $(this).width();
	}).get();
    
    // Set the width of thead columns
    $table.find('thead tr').children().each(function(i, v) {
        $(v).width(colWidth[i]);
    });
	
	// Adjust the width of thead cells when window resizes
	$(window).resize(function() {
		colWidth = $bodyCells.map(function() {
			return $(this).width();
			}).get();
			h = window.innerHeight;
			hc = h-150;
			$table.find('tbody').height(hc);
			// Set the width of thead columns
			$table.find('thead tr').children().each(function(i, v) {
				$(v).width(colWidth[i]);
				});    
	}); // Trigger resize handler

	$('.elimina').click(function(){
		idImagen = $(this).attr("data");
		nombreImagen = $(this).attr("alt");
		var data_ajax = {
			'action':'elimina',
			'id_imagen':idImagen,
			'nombre_imagen':nombreImagen
		};
		$.ajax({
			type: "POST",
			url: 'codigo/GestionGaleria.php',
			data:data_ajax,
			success:function(resultado) {				
				var res = resultado.split(';');
				alert(res);
				if(res[0] == 1){
					$("#contOk",window.parent.document).show();
					$("#CargaCorrecta",window.parent.document).html("<strong>OK:<strong> " + res[1]);
				}else{
					$("#contError",window.parent.document).show();
					$("#ErrorCarga",window.parent.document).html("<strong>ERROR:<strong> " + res[1]);
				}
			}
		});
	});

});