<?php 
session_start();

if(!isset($_SESSION['user_session']))
{
 header("Location: access.php");
}
require("codigo/conecta_sql.php");
$idMembre = "";
$imatge= "";
$nom= "";
$anyInici = "";
$anyFi = "";
$frase = "";
if(isset($_GET["id"]))
{
	$id_membre = $_GET["id"];	
	$consulta = 'SELECT * FROM juguesca_membres WHERE id_membre ="'.$id_membre.'"';
					if(!$result = $mysqli ->query($consulta)){
						die('There was an error running the query: '.$result.' [' . $mysqli->error . ']');
					}
			$numRows = $result->num_rows;
			echo $numRows;
		while($row = $result -> fetch_assoc())
		{
			$idMembre = $row["id_membre"];
			$imatge= $row["imatge"];
			$nom= $row["nom_cognom"];
			$anyInici = $row["any_inici"];
			$anyFi = $row["any_fi"];
			$frase = $row["frase"];
		}
}

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="css/generic.css" rel="stylesheet" type="text/css" />
		<link href="css/EdicioMembres.css" rel="stylesheet" type="text/css" />
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/EdicioMembres.js"></script>
	</head>
	<body>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<div class="continent-fluid persona">
					<div class="imgCont">
						<img class="img-responsive" src="../img/perfils/<?php echo $imatge?>"  onerror="this.src='../img/perfils/basic.jpg'">
						<input type="file" id="img" ></input>
					</div>
					<div class="infoGeneral">
						<div><span class="titInfo">NOM: </span> <span class="textInfo"><input type="text" id="nom" value="<?php echo $nom; ?>"></input></span></div>
						<div><span class="titInfo">Any Inici: </span> <span class="textInfo"><input type="number" id="anyInici" value="<?php echo $anyInici; ?>"></input></span></div>
						<div><span class="titInfo">Any Fi: </span> <span class="textInfo"><input type="number" id="anyFi" value="<?php echo $anyFi; ?>"></div>
					</div>
					<div class="infoFrase">
						<span class="titInfo">Frase: </span><span class="textInfo"><textarea id="frase"><?php echo $frase; ?></textarea></span>
					</div>					
				</div>
			</div>
		</div>
	</body>
	</html>