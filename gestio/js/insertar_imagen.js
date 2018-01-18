$(document).ready(function(){
	$( "#plantillaThumb" ).draggable({containment: "#imgThumb"});
	$("#plantillaThumb").resizable({containment: "#imgThumb",aspectRatio: true});	

$("#formuploadajax").submit(function(e){
    e.preventDefault();
	var fichero = $("#fuImage").val();
	if(fichero!="")
	{    
	var f = $('#formuploadajax').get(0);
	var tamX = $("#plantillaThumb").width();
	var tamY = $("#plantillaThumb").height();
	var posXThumb = $("#plantillaThumb").offset().left;
	var posYThumb = $("#plantillaThumb").offset().top;
	var posXImg = $("#imgThumb").offset().left;
	var posYImg = $("#imgThumb").offset().top;
	var imgX = $("#imgThumb").width();
	var imgY = $("#imgThumb").height();
	var posX = posXThumb-posXImg;
	var posY = posYThumb-posYImg;
	var categorias = "";
	$(".checkbox_categoria:checked").each(function(){
		categorias = categorias + $(this).val()+",";
	});
	var formData = new FormData(f);
	formData.append('action', 'insertar');
	formData.append('tamX', tamX);
	formData.append('tamY', tamY);
	formData.append('posX', posX);
	formData.append('posY', posY);
	formData.append('imgX', imgX);
	formData.append('imgY', imgY);
	formData.append('categorias', categorias);
	console.log(categorias);
	$.ajax({
    url: "codigo/GestionGaleria.php",
    type: "post",
    dataType: "html",
    data: formData,
    cache: false,
    contentType: false,
    processData: false
	}).done(function(res){
		if(res == 1){
			$("#contOk",window.parent.document).show();
			$("#CargaCorrecta",window.parent.document).html("<strong>OK:<strong> ");
		}
		else
		{
			$("#contError",window.parent.document).show();
			$("#ErrorCarga",window.parent.document).html("<strong>ERROR:<strong> " + res);
		}
		
    }).fail(function(res){
        
    });
	}
	else
	{
		$("#contError",window.parent.document).show();
		$("#ErrorCarga",window.parent.document).html("<strong>ERROR:<strong> No se ha seleccionado ninguna imagen para cargar.");
	}
});
});