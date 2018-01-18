$(document).ready(function(){
	var hbody = $("#content_body").height();
	var wbody = $("#content_body").width();
	$("#container").height(hbody);
	
	$(".questions").click(function() {
		id = this.id;
		$("#modal_questionari").modal('show');
		pag = id+".php";
		$("#v_questionari").attr("data",pag);
		$("#v_questionari").height(hbody-10);
});
	
});