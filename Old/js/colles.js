$(document).ready(function(){
	idIni = "bisky";
	$(".btn").click(function(){
		id = this.id;
		if(idIni!=id){
			$("#"+idIni).removeClass("tab-"+idIni);
			$("#"+idIni).addClass("tab");
			$("#"+id).removeClass("tab");
			$("#"+id).addClass("tab-"+id);
			$("#cont-"+id).attr("style","display:block");
			$("#cont-"+idIni).removeAttr("style");
			idIni = id;
		}
		});
});