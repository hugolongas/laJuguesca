<?php
 require_once("conecta_sql.php");
				$idColla = $_GET["idColla"];
				$idAlien = $_GET["idAlien"];
				
				$consulta = "INSERT INTO juguesca_app_colla (idColla,idAlien) VALUES ('".$idColla."',".$idAlien.")";
					if(!$result = $mysqli ->query($consulta)){
						die('There was an error running the query: '.$result.' [' . $mysqli->error . ']');
					}
					
					echo $result;
?>