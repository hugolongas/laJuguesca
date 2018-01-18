$(document).ready(function()
{ 
     /* validation */
  $("#login-form").validate({
      rules:
   {
   password: {
   required: true,
   },
   user: {
            required: true
            },
    },
       messages:
    {
            password:{
                      required: "Inserte Contraseña"
                     },
            user: "Inserte su usuario",
       },
    submitHandler: submitForm 
       });  
    /* validation */
    
    /* login submit */
    function submitForm()
    {  
   var data = $("#login-form").serialize();
    
   $.ajax({
    
   type : 'POST',
   url  : 'codigo/login.php?type=1',
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Conectando ...');
   },
   success :  function(response)
      {
		var resp = response.split(';');
     if(resp[0]=="ok"){
         
      $("#btn-login").html('Entrando ...');
	  $("#loading").show();
      setTimeout(function(){window.location.href = resp[1];},4000);
     }
     else{
         
      $("#error").fadeIn(1000, function(){      
    $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+resp[0]+' !</div>');
           $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; conectar');
         });
     }
     }
   });
    return false;
  }
    /* login submit */
});