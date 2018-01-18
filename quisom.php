<?php 
	require("conecta_sql.php");
	$consultaUsuarisActuals = "SELECT id,imatge,nom_cognom,any_inici,frase FROM juguesca_membres WHERE any_fi IS NULL";
	$consultaUsuarisPasats = "SELECT id,imatge,nom_cognom,any_inici,any_fi,frase FROM juguesca_membres WHERE any_fi IS NOT NULL";
	if(!$resultActuals = $mysqli->query($consultaUsuarisActuals)){
		die('There was an error running the query: '.$consultaUsuarisActuals.' [' . $mysqli->error . ']');
	}
	if(!$resultAnteriors = $mysqli->query($consultaUsuarisPasats)){
		die('There was an error running the query: '.$consultaUsuarisPasats.' [' . $mysqli->error . ']');
	}
?>
<!DOCTYPE html>
<html lang="ca" >
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Hugo Longas, Alban Longas" >
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="css/common.css" rel="stylesheet" type="text/css" />
	<link href="css/quisom.css" rel="stylesheet" type="text/css" />	
	<script src="js/jquery-3.2.1.js"></script>	
	<script src="js/bootstrap.js"></script>		
	<script src="js/generic.js"></script>	
	<script src="js/quisom.js"></script>	
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
	<div id="header" class="navbar navbar-default">
		<div id="menuNav" class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header container-fluid">
				<a class="navbar-brand" href="index.php" >
					<img id="logo" src="img/web/juguesca.png" alt="La Juguesca" class="img-responsive" >
				</a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menusNavabar" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>      					
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="menusNavabar">
					<div id="sidebar" >
						<a href="historia.php" ><div class="menu" ><div id="hist" >Història</div></div></a>
						<a href="quisom.php" ><div class="menu" ><div id="qsom" >Qui som</div></div></a>
						<a href="colles.php" ><div class="menu" ><div id="colles" >Les colles</div></div></a>
						<a href="enguany.php" ><div class="menu" ><div id="enguany" >Enguany</div></div></a>
						<a href="anteriors.php" ><div class="menu" ><div id="anteriors" >Anteriors</div></div></a>
						<a href="contacte.php" ><div class="menu" ><div id="contact" >Contacte</div></div></a>
					</div>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
	</div>
	<div id="side" >
		<a href="https://www.facebook.com/juguesca.la" target="_blank" ><img class="links" src="img/web/face.png" alt="La Juguesca" ></a>
		<a href="https://twitter.com/Lajuguesca" target="_blank" ><img class="links" src="img/web/twuit.png" alt="La Juguesca" ></a>
		<a href="http://instagram.com/lajuguesca" target="_blank" ><img class="links" src="img/web/inst.png" alt="instagram" ></a>
		<a href="http:\\www.lalianca.cat" target="_blank" ><img id="lianca" src="img/web/alianca.png" alt="L'aliança" ></a>
	</div>
	
	<div id="content_body">
 <!--Contenedor-->
		<div id="info_organitzacio" >
			<p class="parrafo" >L’Organització som un grup de joves dinàmics amb ganes de gresca que durant l'any ens anem reunint per poder organitzar, preparar i muntar les proves que durant la Festa Major de Lliçà d'Amunt es fan. La feina d'un any queda reflectida en una setmana molt intensa d'activitats.<br>La preparació de les proves comporta des de la compra de material fins a la recerca de industrials i suministradors. Tot per a que durant les proves, el màxim de gent possible s'ho passi d'allò més bé.</p>
		</div> 
		<div id="container" >
			<ul class="nav nav-tabs">
				<li class="active" ><a data-toggle="tab" href="#actuals">L'organització actual</a></li>
				<li><a data-toggle="tab" href="#no_son">Els que van ser-ho</a></li>
			</ul>
			<div class="tab-content">
				<div id="actuals" class="tab-pane fade in active">
					<div class="row">
					<?php while($row = $resultActuals -> fetch_assoc())
						{
						$idMembre = $row["id"];
						$imatge= $row["imatge"];
						$nom= $row["nom_cognom"];
						$anyInici = $row["any_inici"];
						$frase = $row["frase"];
						?>
						<div class="col-xs-2 col-md-2 col-lg-2 persones" id="<?php echo $idMembre; ?>" >
							<div class="marc_foto"></div>
							<img id="img_<?php echo $idMembre;?>"  class="foto img-responsive" src="img/perfils/<?php echo $imatge; ?>" onerror="this.src='img/perfils/basic.jpg'" alt="La Juguesca - <?php echo $imatge; ?>" >
							<span class="nom" id="nom_<?php echo $idMembre;?>" ><?php echo $nom; ?></span>
							<div class="any" id="anyInici_<?php echo $idMembre;?>" ><?php echo $anyInici; ?></div>
							<div class="any" id="anyFi_<?php echo $idMembre;?>" >Actualitat</div>
							<div class="frase" id="frase_<?php echo $idMembre;?>"><?php echo $frase ?></div>
						</div>
						<?php }?>
					</div>
				</div>
				<div id="no_son" class="tab-pane fade" >
					<div class="container-fluid">
						<p class="parrafo2" >Aquest apartat serveix per recordar a totes aquelles persones que vareu passar per l'organització! Anirem afegint a tots, no patiu! però ja sabeu com anem aquests dies! o sigui que... paciència!
						</p>
					</div>
					<div class="row" >
					<?php 
					while($row = $resultAnteriors -> fetch_assoc())
						{
						$idMembre = $row["id"];
						$imatge= $row["imatge"];
						$nom= $row["nom_cognom"];
						$anyInici = $row["any_inici"];
						$anyFi = $row["any_fi"];
						$frase = $row["frase"];
					?>											
						<div class="col-xs-2 col-md-2 col-lg-2 persones" id="<?php echo $idMembre; ?>" >
							<div class="marc_foto container-fluid"></div>
							<img id="img_<?php echo $idMembre;?>" class="foto  img-responsive" src="img/perfils/<?php echo $imatge; ?>" onerror="this.src='img/perfils/basic.jpg'" alt="La Juguesca - <?php echo $imatge; ?>" >
							<span class="nom" id="nom_<?php echo $idMembre;?>" ><?php echo $nom; ?></span>
							<div class="any" id="anyInici_<?php echo $idMembre;?>" ><?php echo $anyInici; ?></div>
							<div class="any" id="anyFi_<?php echo $idMembre;?>" ><?php echo $anyFi; ?></div>
							<div class="frase" id="frase_<?php echo $idMembre;?>"><?php echo $frase ?></div>
						</div>
						<?php } ?>
					</div>		
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal_organitzacio">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Organització</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">		
					<table>
						<tr>
							<td rowspan="3">
								<div class="modal_marc_foto">									
								</div>
								<img id="modal_imgMembre" src="img/perfils/basic.jpg"  class="img-responsive"  onerror="this.src='img/perfils/basic.jpg'" alt="La Juguesca - Membre"></img>
							</td>
							<td>
								Nom: <span id="modal_nomMembre" class="text"></span>
							</td>
						</tr>
						<tr>
							<td>
								Any Inici: <span id="modal_anyIniciMembre" class="text"></span>
							</td>
						</tr>
						<tr>
							<td>
								Any Fi: <span id="modal_anyFiMembre" class="text"></span>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								Frase:<br />
								<span id="modal_fraseMembre" class="text"></span>
							</td>
						</tr>
					</table>					
					</div>
				<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tancar</button>
      </div>
    </div>
	</div>
</div>
	</div>
</body>
</html>