<?php 
session_start();

if(!isset($_SESSION['user_session']))
{
 header("Location: access.php");
}
require("codigo/conecta_sql.php");
$idProva = "";
$categoriaProva = "";
$titolProva = "";
$subtitolPorva = "";
$horariProva = "";
$mapa =  "";
$urlMapa =  "";
$pdf =  "";
$urlPdf = "";
if(isset($_GET["id"])){
	$id_membre = $_GET["id"];	
	$consulta = "SELECT * FROM juguesca_proves";
					if(!$result = $mysqli ->query($consulta)){
						die('There was an error running the query: '.$result.' [' . $mysqli->error . ']');
					}
			$numRows = $result->num_rows;
			echo $numRows;
		while($row = $result -> fetch_assoc())
		{
			$idProva = $row["id_prova"];
			$categoriaProva = $row ["categoria_prova"];
			$titolProva = $row ["titol_prova"];
			$subtitolPorva = $row ["subtitol_prova"];
			$horariProva = $row ["horari_prova"];
			$mapa = $row ["mapa"];
			$urlMapa = $row ["url_mapa"];
			$pdf = $row ["pdf"];
			$urlPdf = $row ["url_pdf"];
		}
}

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<form action="codigo/gestioProves.php" method="post">
			Categoria prova: <input type="text" name="categoria_prova"></td>
			nom prova: <input type="text" name="titol_prova"><br>
			subtitol porva: <input type="text" name="subtitol_prova"><br>
			horari porva: <input type="text" name="horari_prova"><br>
			url mapa: <input type="text" name="url_mapa"><br>
			url pdf: <input type="text" name="url_pdf"><br>
			<input type="submit">
		</form>
	</body>
	</html>