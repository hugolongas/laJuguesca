$(document).ready(function(){
	idActivo = "bisky";
	$(".tab").click(function(){
		idNuevo = this.id;
		if(idActivo!=idNuevo){
		$("#"+idNuevo).addClass("tab-"+idNuevo);
		$("#"+idActivo).removeClass("tab-"+idActivo);
		$("#cont-"+idNuevo).css("display","block");
		$("#cont-"+idActivo).removeAttr( 'style' );
		idActivo = idNuevo;
		}
	});

	$(".colla").click(function(){
		$("#contact_modal").hide();
		id = this.id;
		id = id.replace("cont-","");
		nom = $("#nom_"+id).html();
		img = $("#foto_"+id).attr("src");
		
		email = $("#email_"+id).attr("href");
		face = $("#face_"+id).attr("href");
		web = $("#web_"+id).attr("href");
		instagram = $("#instagram_"+id).attr("href");
		youtube = $("#youtube_"+id).attr("href");
		frase = $("#frase_"+id).html();

		
		frase = $("#frase_"+id).html();		
		$("#foto_modal").attr("src",img);
		$("#nom_modal").html(nom);
		
		$("#email_modal").html(email);
		$("#email_modal").attr("href",email);
		
		$("#face_modal").html(face);
		$("#face_modal").attr("href",face);
		
		$("#web_modal").html(web);
		$("#web_modal").attr("href","mailto:"+web);
		
		$("#instagram_modal").html(instagram);
		$("#instagram_modal").attr("href",instagram);
		
		$("#youtube_modal").html(youtube);
		$("#youtube_modal").attr("href",youtube);
		
		$("#frase_modal").html(frase);
		$("#idSubmit").val(email);
		$("#modal_colles").modal();
		
	});
	$("#form_contacto").click(function(){
		$("#contact_modal").toggle();
	});
		$("#idSubmit").click(function(){
			nom = $("#idNom").val();
			motiu = $("#idMotiu").val();
			tel = $("#idTel").val();
			mail = $("#idEmail").val();
			mailReceptor =$("#email_modal").attr("href");
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
	});
	
});