<?php 
	require("conecta_sql.php");
	$consultaLlistaColles = "SELECT id_colla,colla FROM juguesca_colles";
	$consultaDadesColla = "SELECT id,id_colla,colla,cap_colla,facebook,web,instagram,youtube,frase,email,imatge_colla FROM juguesca_colles";
	if(!$collesNoms = $mysqli->query($consultaLlistaColles)){
		die('There was an error running the query: '.$consultaLlistaColles.' [' . $mysqli->error . ']');
	}
	if(!$colles = $mysqli->query($consultaDadesColla)){
		die('There was an error running the query: '.$consultaDadesColla.' [' . $mysqli->error . ']');
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
	<link href="css/colles.css" rel="stylesheet" type="text/css" />	
	<script src="js/jquery-3.2.1.js"></script>	
	<script src="js/bootstrap.js"></script>		
	<script src="js/generic.js"></script>	
	<script src="js/colles.js"></script>	
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
	<title>La Juguesca - Colles</title>
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
	<!--CONTENIDOR-->	
		<div id="info_colles" >
			<p class="parrafo" >A la Juguesca hi participen 5 colles. 
				Cada colla està formada per un mínim de 40 persones, però no tenen un màxim de participants. Si us interessa participar a La Juguesca de Lliçà d'Amunt contacteu amb la colla que més bon "feeling" us doni!

				5 Colles diferents i cadascuna amb la seva "personalitat" segur que en alguna us sentireu còmodes! Animeu-vos a provar-ho!
			</p>
		</div> 
		<div id="container" >
				<div id="barra" >
				<?php 
					while($row = $collesNoms -> fetch_assoc()){
						$idCollaLlista = $row["id_colla"];
						$CollaLlista = $row ["colla"];
				?>
				<div id="<?php echo $idCollaLlista ?>" class="tab <?php if($idCollaLlista == "bisky"){echo("tab-bisky");} ?> btn" ><?php echo $CollaLlista ?></div>
				<?php } ?>
			</div>
			<div id="inform">
				<?php 
				while($rowColles = $colles -> fetch_assoc()){
					$id = $rowColles["id"];
					$idColla = $rowColles["id_colla"];
					$colla = $rowColles["colla"];
					$capColla = $rowColles["cap_colla"];
					$facebook = $rowColles["facebook"];
					$web = $rowColles["web"];
					$instagram = $rowColles["instagram"];
					$youtube = $rowColles["youtube"];
					$frase = $rowColles["frase"];
					$email = $rowColles["email"];
					$imatge = $rowColles["imatge_colla"];		
					
				?>
				<div id="cont-<?php echo $idColla ?>" <?php if($id == 1){echo ('style="display:block;"'); }?> class="colla">
					<div class="espai" >
						<table>
								<tr>
									<td rowspan="7"><div class="photo"></div><img id="foto_<?php echo $idColla ?>" class="foto" src="img/perfil_colles/<?php echo $imatge ?>" alt="<?php echo $colla ?>" ></td>
									<td class="cap_de" >cap de colla</td>
								</tr>
								<tr>
									<td id="nom_<?php echo $idColla ?>" class="nom" ><?php echo $capColla ?></td>
								</tr>
								<tr>
									<td>E-mail: <a id="email_<?php echo $idColla ?>" class="tex" href="mailto:<?php echo $email; ?>" target="_blank" ><?php echo $email; ?></a></td>
								</tr>
								<tr>
									<td>Facebook: <a id="face_<?php echo $idColla ?>" class="tex" href="<?php echo $facebook ?>" target="_blank"  ><?php echo $facebook ?></a></td>
								</tr>
								<tr>
									<td>Blog: <a id="web_<?php echo $idColla ?>" class="tex" href="<?php echo $web ?>" target="_blank"  ><?php echo $web ?></a></td>
								</tr>
								<tr>
									<td>Instagram: <a id="instagram_<?php echo $idColla ?>" class="tex" href="<?php echo $instagram; ?>" target="_blank"  ><?php echo $instagram; ?></a></td>
								</tr>
								<tr>
									<td>Youtube: <a id="youtube_<?php echo $idColla ?>" class="tex" href="<?php echo $youtube; ?>" target="_blank" ><?php echo $youtube; ?></a></td>
								</tr>
						</table>
						<div id="frase_<?php echo $idColla ?>" class="frase_oculta" ><?php echo $frase; ?></div>
					</div>
				</div>
				<?php } ?>	
			</div>
		</div>
	<!--FI CONTENIDOR-->
	</div>
		<div class="modal fade" id="modal_colles">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Organització</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">		
					<div class="espai_modal" >
						<table>
								<tr>
									<td rowspan="7"><div class="photo"></div><img id="foto_modal" src="img/perfils/basic.jpg"  class="img-responsive"  onerror="this.src='img/perfils/basic.jpg'" alt="La Juguesca - Colla"></img></td>
									
									<td class="cap_de" >cap de colla</td>
								</tr>
								<tr>
									<td id="nom_modal" class="nom" ></td>
								</tr>
								<tr>
									<td>E-mail: <a id="email_modal" class="tex" href="" target="_blank" ></a></td>
								</tr>
								<tr>
									<td>Facebook: <a id="face_modal" class="tex" href="" target="_blank"  ></a></td>
								</tr>
								<tr>
									<td>Blog: <a id="web_modal" class="tex" href="" target="_blank"  ></a></td>
								</tr>
								<tr>
									<td>Instagram: <a id="instagram_modal" class="tex" href="" target="_blank"  ></a></td>
								</tr>
								<tr>
									<td>Youtube: <a id="youtube_modal" class="tex" href="" target="_blank" ></a></td>
								</tr>
						</table>
						<div id="frase_modal" class="frase parrafo"></div>
					</div>
					<br />
					<button id="form_contacto" class="btn btn-default">Contacte</button>
					<br />
					<hr/>
					<div id="contact_modal" style="display:none">
						<div class="formulari">
					<div class="form-group">
						<label for="idNom">Nom:</label>
						<input type="text" class="form-control" id="idNom" placeholder="Nom" name="nom">
					</div>
					<div class="form-group">
						<label for="idMotiu">Motiu:</label>
						<input type="text" class="form-control" id="idMotiu" placeholder="Nom" name="motiu">
					</div>
					<div class="form-group">
						<label for="idTel">Teléfon:</label>
						<input type="tel" class="form-control" id="idTel" placeholder="Nom" name="tel">
					</div>
					<div class="form-group">
						<label for="idEmail">E-mail:</label>
						<input type="email" class="form-control" id="idEmail" placeholder="Nom" name="email">
					</div>					
					<div class="form-group">
						<label for="idMiss">Missatge:</label>
						<textarea class="form-control" id="idMiss" placeholder="missatge" name="miss"></textarea>
					</div>

					<div class="row">
						<div class="col-xs-6 col-md-6 col-lg-6">
							<button type="button" name="submit" class="btn btnCont center-block" id="idSubmit">Enviar</button>
						</div>
						<div class="col-xs-6 col-md-6 col-lg-6">
							<button type="button" name="reset"  class="btn btnCont center-block" id="idReset">Cancelar</button>
						</div>
					</div>
					<div id="envioOk" class="alert alert-success" role="alert" style="display:none;">
						<strong>Enviat!</strong>El missatge a sigut degudament entregat.
					</div>
				</div>
					</div>
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