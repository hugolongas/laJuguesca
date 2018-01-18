$(document).ready(function(){
	
	$("#btnContacto").click(function(){
	      $("#contContac").show();
	});
	
	$("#idSubmit").click(function(){
			nom = $("#idNom").val();
			motiu = $("#idMotiu").val();
			tel = $("#idTel").val();
			mail = $("#idEmail").val();
			mailReceptor = $("#idEmailRecptor").val();
			mis = $("#idMiss").val();			
			info = "nom="+nom+"&motiu="+motiu+"&tel="+tel+"&email="+mail+"&emailReceptor="+mailReceptor+"&miss="+mis;
		  $.ajax({
            data:  info,
            url:   'mail_sender.php',
			type:  'post',
			success: function(){
				$("#idNom").val("");
				$("#idMotiu").val("");
				$("#idTel").val("");
				$("#idEmail").val("");
				$("#idMiss").val("");
				$("#contContac").hide();
				$("#envioOk").show();
				setTimeout(function(){$("#envioOk").hide();},3000);
			}
		});
	});
	
	$("#idReset").click(function(){
				$("#idNom").val("");
				$("#idMotiu").val("");
				$("#idTel").val("");
				$("#idEmail").val("");
				$("#idMiss").val("");
				$("#contContac").hide();
	});
});