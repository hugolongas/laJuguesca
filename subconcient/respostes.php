<?php 
session_start();

$questionari = $_GET['quest'];

require("codigo/conecta_sql.php");

		$consulta = "SELECT * FROM juguesca_questionari_perguntes WHERE idQuest = ".$questionari;
		if(!$result = $mysqli ->query($consulta)){
			die('There was an error running the query: '.$result.' [' . $mysqli->error . ']');
			}		

		
		$row = $result -> fetch_assoc();		
		$textInfo = $row['text_info'];	
		$titols = array($row['titol'],$row['titol2'],$row['titol3'],$row['titol4']);				
		$numCamps = $row['camps'];
		$numRespostes = $row['respostes'];
?>

 <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Hugo Longas, Alban Longas" >
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="css/respostes.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery-3.2.1.js"></script>	
	<script src="js/bootstrap.js"></script>				
</head>
<body>
<div class="content">
<p class="parrafo" >
	<?php echo $textInfo; ?>
</p>
<form action="codigo/GuardaRespostes.php" method="post" >
<input type="hidden" name="idColla" value="<?php echo $_SESSION['user_id'] ?>"></input>
<input type="hidden" name="idQuest" value="<?php echo $questionari?>"></input>
<input type="hidden" name="numCamps" value="<?php echo $numCamps?>"></input>
<input type="hidden" name="numRespostes" value="<?php echo $numRespostes?>"></input>
<table width="100%">
	<tr>
<?php for($i = 0;$i<$numCamps;$i++)	{?>
		<td>
		<?php echo $titols[$i]; ?>
		</td>
	<?php }?>
	</tr>
	<?php for($j=0;$j<$numRespostes;$j++) {?>
	<tr>
		<?php for($z=0;$z<$numCamps;$z++) {?>
			<td>
				<input  class="form-control"  type="text" id="resp_<?php echo $z; ?>_col_<?php echo $j ?>" name="resp_<?php echo $z; ?>_col_<?php echo $j ?>" ></input>
			</td>
		<?php } ?>
	</tr>
	<?php } ?>
</table>
<input class="btn" type="submit" value="Guardar"></input>
</form>
</div>
</body>
</html>