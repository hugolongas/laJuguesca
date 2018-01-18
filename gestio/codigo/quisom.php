<?php 
	require("conecta_sql.php");
	$consultaUsuarisActuals = "SELECT id,imatge,nom_cognom,any_inici FROM juguesca_membres WHERE any_fi IS NULL";
	$consultaUsuarisPasats = "SELECT id,imatge,nom_cognom,any_inici,any_fi FROM juguesca_membres WHERE any_fi IS NOT NULL";
	if(!$resultActuals = $mysqli->query($consultaUsuarisActuals)){
		die('There was an error running the query: '.$consultaUsuarisActuals.' [' . $mysqli->error . ']');
	}
	if(!$resultAnteriors = $mysqli->query($consultaUsuarisPasats)){
		die('There was an error running the query: '.$consultaUsuarisPasats.' [' . $mysqli->error . ']');
	}
?>
<!DOCTYPE html>
<html lang="ca" ><head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Hugo Longas, Alban Longas" >
	<link href="css/common.css" rel="stylesheet" type="text/css" />
	<link href="css/quisom.css" rel="stylesheet" type="text/css" />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/generic.js"></script>	
	<script src="js/quisom.js"></script>	
	<script src="js/bootstrap.js"></script>		
<script type="text/javascript" ><!--fonts de google-->
  WebFontConfig = {
    google: { families: [ 'Crafty+Girls::latin', 'Fredericka+the+Great::latin', 'Poiret+One::latin', 'Waiting+for+the+Sunrise::latin', 'Special+Elite::latin', 'Playball::latin' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })(); 
</script>
	<title>La Juguesca - Qui Som?</title>
</head>

<body>
<div id="content" >
	<div id="side" >
		<a href="https://www.facebook.com/juguesca.la" target="_blank" ><img class="links" src="img/web/face.png" alt="La Juguesca" ></a>
		<a href="https://twitter.com/Lajuguesca" target="_blank" ><img class="links" src="img/web/twuit.png" alt="La Juguesca" ></a>
		<a href="http://instagram.com/lajuguesca" target="_blank" ><img class="links" src="img/web/inst.png" alt="instagram" ></a>
		<a href="http:\\www.lalianca.cat" target="_blank" ><img id="lianca" src="img/web/alianca.png" alt="L'aliança" ></a>
	</div>
	<div id="content_body" >
		<div id="header" >
			<a href="index.html" ><img id="logo" src="img/web/juguesca.png" alt="La Juguesca" ></a>
			<div id="sidebar" >
				<a href="historia.html" ><div class="menu" ><div id="hist" >Història</div></div></a>
				<a href="quisom.html" ><div class="menu" ><div id="qsom" >Qui som</div></div></a>
				<a href="colles.html" ><div class="menu" ><div id="colles" >Les colles</div></div></a>
				<a href="enguany.html" ><div class="menu" ><div id="enguany" >Enguany</div></div></a>
				<a href="anteriors.html" ><div class="menu" ><div id="anteriors" >Anteriors</div></div></a>
				<a href="contacte.html" ><div class="menu" ><div id="contact" >Contacte</div></div></a>
			</div>
		</div>
	<div id="contenidor" >



 <!--Contenedor-->
<div id="info_organitzacio" ><p class="parrafo" >L’Organització som un grup de joves dinàmics amb ganes de gresca que durant l'any ens anem reunint per poder organitzar, preparar i muntar les proves que durant la Festa Major de Lliçà d'Amunt es fan. La feina d'un any queda reflectida en una setmana molt intensa d'activitats.<br>La preparació de les proves comporta des de la compra de material fins a la recerca de industrials i suministradors. Tot per a que durant les proves, el màxim de gent possible s'ho passi d'allò més bé.</p></div> 
<div id="container" >
						<input id="tab-1" type="radio" name="tab-group" checked="checked" />
						<label for="tab-1" >L'organització actual</label>
						<input id="tab-2" type="radio" name="tab-group" />
						<label for="tab-2" >Els que van ser-ho</label>
						<div id="pest" >
							<div id="pest-1" name="pestanyes" >
								<div id="actuals" >
									<div id="participants" >
									<?php while($row = $resultActuals -> fetch_assoc())
									{
										$idMembre = $row["id"];
										$imatge= $row["imatge"];
										$nom= $row["nom_cognom"];
										$anyInici = $row["any_inici"];
									?>	
										<div class="persones" id="<?php echo $idMembre; ?>" >
											<table>
												<tr>
													<td rowspan="3"><div class="photo"></div><img class="foto" src="img/perfils/<?php echo $imatge; ?>" onerror="this.src='img/perfils/basic.jpg'" alt="La Juguesca - <?php echo $imatge; ?>" ></td>
													<td class="nom" ><?php echo $nom; ?></td>
												</tr>
												<tr>
													<td class="any" ><?php echo $anyInici; ?> - Actualitat</td>
												</tr>			
											</table>
										</div>
									<?php } ?>
									</div>
								</div>
							</div>
					
							<div id="pest-2" >
								<div id="no_son" >						
									<p class="parrafo2" >Aquest apartat serveix per recordar a totes aquelles persones que vareu passar per l'organització! Anirem afegint a tots, no patiu! però ja sabeu com anem aquests dies! o sigui que... paciència!
									</p>
									<?php while($row = $resultAnteriors -> fetch_assoc())
									{	
									$idMembre = $row["id"];
									$imatge= $row["imatge"];
									$nom= $row["nom_cognom"];
									$anyInici = $row["any_inici"];
									$anyFi = $row["any_fi"];
									?>	
									<div class="persones"  id="<?php echo $idMembre; ?>" >
										<table>
											<tr>
												<td rowspan="3"><div class="photo"></div><img class="foto" src="img/perfils/<?php echo $imatge; ?>" onerror="this.src='img/perfils/basic.jpg'" alt="La Juguesca - <?php echo $imatge; ?>" ></td>
												<td class="nom" ><?php echo $nom; ?></td>
											</tr>
											<tr>
												<td class="any" ><?php echo $anyInici.' - '.$anyFi; ?></td>
											</tr>			
										</table>
									</div>
									<?php } ?>						
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>