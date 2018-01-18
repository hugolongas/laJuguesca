<?php session_start(); 
if(!isset($_SESSION['user_session']))
{
 header("Location: access.php");
}


$user = $_SESSION['user'];
$visiblePrincipal = $_SESSION["visiblePrincipal"];
$visibleHistoria = $_SESSION["visibleHistoria"];
$visibleSom = $_SESSION["visibleSom"];
$visibleColles = $_SESSION["visibleColles"];
$visibleEnguany = $_SESSION["visibleEnguany"];
$visibleAnteriors = $_SESSION["visibleAnteriors"];
$visibleGaleria = $_SESSION["visibleGaleria"];
$visibleQuestionari = $_SESSION["visibleQuestionari"];

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="css/generic.css" rel="stylesheet" type="text/css" />
		<link href="css/gestion.css" rel="stylesheet" type="text/css" />
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/gestion.js"></script>
	</head>
	<body>
		<div id="header">
		<div id="titulo">
			<span id="titulo">La Juguesca</span>
			<span id="subtitulo">Gestió</span>
		</div>		
		<div id="userInfo">
			<div id="userLogin"><?php echo $user ?></div>
			<button id="logOut" class="btn btn-acces">Logout</button>
		</div>
		
		</div>
		<div id="side-menu">			
				<ul class="nav nav-pills nav-stacked">
					<li id="MenuPrincipal" class="seccion active" data="gestioPrincipal" style="display:<?php echo $visiblePrincipal ?>" ><a>Principal</a></li>
					<li id="MenuHistoria" class="seccion" data="gestioHistoria" style="display:<?php echo $visibleHistoria ?>" ><a>Historia</a></li>
					<li id="MenuQuiSom" class="seccion" data="gestioQuiSom" style="display:<?php echo $visibleSom ?>" ><a>Qui Som</a></li>
					<li id="MenuColles" class="seccion" data="gestioColles" style="display:<?php echo $visibleColles ?>" ><a>Colles</a></li>
					<li id="MenuEnguany" class="seccion" data="gestioEnguany" style="display:<?php echo $visibleEnguany ?>" ><a>Enguany</a></li>
					<li id="MenuAnteriors" class="seccion" data="gestioAnteriors" style="display:<?php echo $visibleAnteriors ?>" ><a>Anteriors</a></li>
					<li id="MenuGaleria" class="seccion" data="gestioGaleria" style="display:<?php echo $visibleGaleria ?>" ><a>Galeria</a></li>
					<li id="MenuQuestionari" class="seccion" data="gestioQuestionari" style="display:<?php echo $visibleQuestionari ?>" ><a>Questionari subconcient</a></li>
					
				</ul>
		</div>
		<div id="content">
			<embed id="visorPagina">
			</embed>
		</div>
		<div id="footer">
		</div>
		<div class="alert alert-danger" id="contError">
			<div id="ErrorCarga"></div>
			<button type="button" class="btn btn-navbar" id="contErrorOk">OK</button>
		</div>
		
		<div class="alert alert-success" id="contOk">
			<div id="CargaCorrecta"></div>
			<button type="button" class="btn btn-navbar" id="contOkOk">OK</button>
		</div>
	</body>
</html>