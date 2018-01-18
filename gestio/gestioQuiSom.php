<?php 
session_start();

if(!isset($_SESSION['user_session']))
{
 header("Location: access.php");
}
if($_SESSION['rol']==2)
{
	header("modifica_usuari.php?id=".$_SESSION['user_session']);
}
if($_SESSION['rol'] == 3)
{
	header("Location: errorPermisos.php");
}
require("codigo/conecta_sql.php");
$consulta = "SELECT * FROM juguesca_membres";
					if(!$result = $mysqli ->query($consulta)){
						die('There was an error running the query: '.$result.' [' . $mysqli->error . ']');
					}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="css/generic.css" rel="stylesheet" type="text/css" />
		<link href="css/quisom.css" rel="stylesheet" type="text/css" />
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/membres.js"></script>
	</head>
	<body>
	<div style="margin:10px 10px 10px 15px;">
		<button class="btn"><a href="membres.php">Crear Membre</a></button>
	</div>
	<div class="row">
		<?php
			$elem = 1;
		while($row = $result -> fetch_assoc())
		{
			$idMembre = $row["id_membre"];
			$imatge= $row["imatge"];
			$nom= $row["nom_cognom"];
			$anyInici = $row["any_inici"];
			$anyFi = $row["any_fi"];
			$frase = $row["frase"];
		?>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<div class="continent-fluid persona">
					<div class="imgCont">
						<img class="img-responsive" src="../img/perfils/<?php echo $imatge?>"  onerror="this.src='../img/perfils/basic.jpg'">
					</div>
					<div class="infoGeneral">
						<div><span class="titInfo">NOM: </span> <span class="textInfo"><?php echo $nom; ?></span></div>
						<div><span class="titInfo">Any Inici: </span> <span class="textInfo"><?php echo $anyInici; ?></span></div>
						<div><span class="titInfo">Any Fi: </span> <span class="textInfo"><?php echo $anyFi; ?></div>
					</div>
					<div class="infoOpcions">
						<div class="btn edit"><a href="membres.php?id=<?php echo $idMembre; ?>"><img src="img/edit.png"></img></a></div>
						<div class="btn delete" id="elimina_<?php echo $idMembre; ?>"><img src="img/delete.png"></img></div>
					</div>
					<div class="infoFrase">
						<span class="titInfo">Frase: </span><span class="textInfo"><?php echo $frase; ?></span>
					</div>					
				</div>
			</div>
		<?php 
			$elem ++;
			if($elem >4)
			{
				$elem = 1;
				echo "</div><div class='row'>";
			}
		} ?>
	</div>
	</body>
	</html>