$(document).ready(function(){
	var hbody = $("#content_body").height();
	var wbody = $("#content_body").width();
	$("#container").height(hbody-20);
	
	$(".questions").click(function() {
		id = this.id;
		$("#modal_questionari").modal('show');
		pag = "respostes.php?quest="+id;;
		$("#v_questionari").attr("data",pag);
		$("#v_questionari").height(hbody-50);
});
	
});