$(document).ready(function(){
	var h = $(window).height();
	var w = $(window).width();
	$("#content").height(h);
	$("#side").height(h-140);
	$("#content_body").height(h-140);
	var wSide = $("#side").width()+60;	
	$("#content_body").width(w-wSide);
});