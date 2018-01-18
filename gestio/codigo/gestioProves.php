<?php
require("conecta_sql.php");
			$categoriaProva = $_POST ["categoria_prova"];
			$titolProva = $_POST ["titol_prova"];
			$subtitolPorva = $_POST ["subtitol_prova"];
			$horariProva = $_POST ["horari_prova"];
			$mapa = 0;
			$urlMapa = $_POST ["url_mapa"];
			$pdf = 1;
			$urlPdf = $_POST ["url_pdf"];
			if(strlen($urlMapa)>0)
				$mapa = 1;
			if(strlen($urlPdf)>0)
				$pdf = 1;
			
			$consulta = "INSERT INTO juguesca_proves (categoria_prova,titol_prova,subtitol_prova,horari_prova,mapa,url_mapa,pdf,url_pdf) VALUES ('$categoriaProva','$titolProva','$subtitolPorva','$horariProva',$mapa,'$urlMapa',$pdf,'$urlPdf')";
				if(!$result = $mysqli ->query($consulta)){
						die('There was an error running the query: '.$result.' [' . $mysqli->error . ']');
					}
			header('Location: ../gestioEnguany.php');

?>