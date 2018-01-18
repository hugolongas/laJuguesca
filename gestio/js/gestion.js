$(document).ready(function(){
	var h = window.innerHeight;
	var w = window.innerWidth;
	var hc = h-70;
	var wc = w - 250;
	var menuActivo = "MenuPrincipal";
	$('#content').height(hc);
	$('#content').width(wc);
	$(window).resize(function(){
		var h = window.innerHeight;
		var w = window.innerWidth;
		var hc = h-70;
		var wc = w - 200;
		$('#content').height(hc);
		$('#content').width(wc);
	});
	$(".seccion").click(function(){
		var menu = $(this).attr("data");
		$("#loader").show();
		$("#"+menuActivo).removeClass("active");
		$(this).addClass("active");
		menuActivo = $(this).attr("id");
		setTimeout(function(){$("#visorPagina").attr("src",menu);},1000);
		$("#loader").hide();
	});
	
	
	$("#contErrorOk").click(function(){
		$("#contError").hide();
	});

	$("#contOkOk").click(function(){
		$("#contOk").hide();
		menu = $("#visorPagina").attr("data");
		$("#visorPagina").attr("src",menu);
	});
	
	
	/* LOGOUT */
	$("#logOut").click(function(){
		$.ajax({
			type : 'POST',
			url  : 'codigo/login.php?type=0',
			success :  function(response)
			{
				window.location.href = response;
			}
		});
	});	
	/* LOGOUT */

});