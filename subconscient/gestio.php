<?php
session_start();

if(!isset($_SESSION['user_session']))
{
 header("Location: index.htm");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/gestion.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/gestion.js"></script>
</head>
<body>
<div id="header">

</div>
<div class="container-fluid" id="navbar">
	<div class="navbar-brand">		
			<div style="font-size:19pt"><span style="color:gray">ricardo</span><span>dinatale</span></div>
		<div style="font-size:8pt">P H O T O G R P A H E R</div>
	</div>
	
	<div class="btn menu-seleccion" style="">Galeria</div>
	<div class="btn menu-seleccion">Contacto</div>
	<div class="btn menu-seleccion">Series</div>
	<div class="btn menu-seleccion">Categorias</div>
	<div><?php echo $_SESSION['user']; ?>
	<div id="logOut" class="btn">Cerrar Session</div>
	</div>
</div>
	<div class="container-fluid" id="content">
	<object id="visual-gestor" class="embed-responsive-item" type="text/html" data=""></object> 
	</div>
<div class="alert alert-danger" id="contError">
	<div id="ErrorCarga">
	</div>
	<button type="button" class="btn btn-navbar" id="contErrorOk">OK</button>
</div>
<div class="alert alert-success" id="contOk">
	<div id="CargaCorrecta">
	</div>
	<button type="button" class="btn btn-navbar" id="contOkOk">OK</button>
</div>
	<div id="loader">		
		<div id="imgLoading">
			<img src="ajax-loader.gif"/>
		</div>
	</div>
</body>
</html>