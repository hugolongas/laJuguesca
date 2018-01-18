$(document).ready(function(){
	$("#fuImage").on('change', function () {
		var file = $(this)[0].files[0];
		$("#imgThumb").attr("src","../img/galeria/_blank.gif");
		$("#plantillaThumb").hide();
		if(file.type.match('image.*'))
		{
			if (typeof (FileReader) != "undefined") {
				var reader = new FileReader();
				reader.onload = function (e) {
					$("#imgThumb").attr("src",e.target.result);
				}
				reader.readAsDataURL($(this)[0].files[0]);
			} else {
				alert("This browser does not support FileReader.");
			}
			var posXImg = $("#imgThumb").offset().left;
			var posYImg = $("#imgThumb").offset().top;
			$("#plantillaThumb").css({left: posXImg+"px", top: posYImg+"px"});
			$("#plantillaThumb").show();
		}else{
			$("#contError",window.parent.document).show();
			$("#ErrorCarga",window.parent.document).html("<strong>ERROR:<strong> La Extension no es correcta");
			$("#fuImage").val("");
		}
	});
					
});
					