<?php 
	require("conecta_sql.php");
	$consultaDadesColla = "SELECT colla,email FROM juguesca_colles ORDER BY colla DESC";
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
	<link href="css/contacte.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/bootstrap.js"></script>		
	<script src="js/generic.js"></script>		
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
	<title>La Juguesca - Contacte</title>
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
		<div class="row container-fluid contacte">
			<div class="col-xs-12 col-md-6 col-lg-6">
				<p class="parrafo">Podeu posar-vos en contacte amb l'organització o cualsevol colla, omplint el següent formulari.<br />Seleccioneu a la colla/organització a qui us voleu dirigir per enviarlis un e-mail directament.</p>
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
						<label for="idEmailRecptor">E-mail Receptor</label>						
						<select name="emailreceptor"  class="form-control" id="idEmailRecptor">
							<option value="hugolo3@gmail.com">Organització (hugolo3@gmail.com)</option>
							<?php 
								while($rowColles = $colles -> fetch_assoc()){
									$colla = $rowColles["colla"];
									$email = $rowColles["email"];
							?>
							<option value="<?php echo $email ?>"><?php echo ($colla." (".$email.")");?></option>
							<?php } ?>
						</select>
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
					<div id="envioOk" class="alert alert-success" role="alert">
						<strong>Enviat!</strong>El missatge a sigut degudament entregat.
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-6">
				<p class="parrafo">També podeu contactar amb l'Ateneu l'ALiança en horari d'oficina,<br />o parlar amb cualsevol persona de l'organització per més informació.</p>

					<h5>Horari Oficina</h5>
					<div class="container-fluid">
					<p>C/de l'Aliança, 17<br> 
						08186 Lliçà d'Amunt</p>
					<p>93 841 45 33<br>
						bustia@lalianca.cat</p>
					<p>Horari d'Oficina:<br>
						- matins: de dilluns a divendres d'11 a 13h<br>
						- tardes: dimarts i divendres de 17 a 19h</p>
					</div>

						<iframe class="container-fluid" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d745.7687913054451!2d2.2394534093632434!3d41.61088625806639!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4c7236a4b3313%3A0x9b08616af3c4b16d!2sAteneu+l&#39;Alian%C3%A7a+de+Lli%C3%A7%C3%A0+d&#39;Amunt!5e0!3m2!1ses!2ses!4v1495033944324" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
				</div>
			</div>
		</div>
</body>
</html>