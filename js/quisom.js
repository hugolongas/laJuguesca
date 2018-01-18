$(document).ready(function(){
	var hbody = $("#content_body").height();
	$("#container").height(hbody-140);
	$(".tab-content").height(hbody-190);
	$(".persones").click(function(){
		id = this.id;
		nom = $("#nom_"+id).html();
		img = $("#img_"+id).attr("src");
		anyInici = $("#anyInici_"+id).html();
		anyFi = $("#anyFi_"+id).html();
		frase = $("#frase_"+id).html();
		$("#modal_imgMembre").attr("src",img);
		$("#modal_nomMembre").html(nom);
		$("#modal_anyIniciMembre").html(anyInici);
		$("#modal_anyFiMembre").html(anyFi);
		$("#modal_fraseMembre").html(frase);
		$("#modal_organitzacio").modal();
		
	});
	
});