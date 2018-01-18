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
$consulta = "SELECT * FROM juguesca_proves";
					if(!$result = $mysqli ->query($consulta)){
						die('There was an error running the query: '.$result.' [' . $mysqli->error . ']');
					}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
		<link href="css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="css/generic.css" rel="stylesheet" type="text/css" />
		<link href="css/quisom.css" rel="stylesheet" type="text/css" />
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/proves.js"></script>
	</head>
	<body>
	<div style="margin:10px 10px 10px 15px;">		
		<a  class="btn" href="prova.php">Crear Membre</a>
	</div>
	<div class="container-fluid" id="classificacio">
	<h1>Proves</h1>
  <div>	
	<table id="tbl_proves" class="display compact" width="100%" cellspacing="0">
        <thead>
            <tr>
				<th>id_prova</th>
                <th>categoria_prova</th>
                <th>titol_prova</th>
                <th>subtitol_prova</th>
				<th>horari_prova</th>
				<th>mapa</th>
				<th>url_mapa</th>
				<th>pdf</th>
				<th>url_pdf</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
				<th>id_prova</th>
                <th>categoria_prova</th>
                <th>titol_prova</th>
                <th>subtitol_prova</th>
				<th>horari_prova</th>
				<th>mapa</th>
				<th>url_mapa</th>
				<th>pdf</th>
				<th>url_pdf</th>
            </tr>
        </tfoot>
        <tbody>
		<?php 
		$posicio = 1;
		while($row = $result->fetch_assoc())
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
		?>
            <tr>
                <th><?php echo $idProva ?></th>
                <th><?php echo $categoriaProva ?></th>
                <th><?php echo $titolProva ?></th>
                <th><?php echo $subtitolPorva ?></th>
				<th><?php echo $horariProva ?></th>
				<th><?php echo $mapa ?></th>
				<th><?php echo $urlMapa ?></th>
				<th><?php echo $pdf ?></th>
				<th><?php echo $urlPdf ?></th>
            </tr>            
		<?php 
		$posicio++;
		} ?>
        </tbody>
    </table>
  </div>
</div>
	</div>
	</body>
	</html>