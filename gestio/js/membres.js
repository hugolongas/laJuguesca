$(document).ready(function(){
	contOk = $("#contOk",window.parent.document);
	textOk = $("#CargaCorrecta",window.parent.document);
	
	$(".delete").click(function(){
		id = this.id;
		contOk.show();
		textOk.html(id);
	});
});