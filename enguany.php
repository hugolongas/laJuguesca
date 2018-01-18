<?php 
	require("conecta_sql.php");
	$consultaLlistaProves = "SELECT * FROM juguesca_proves";
	if(!$proves = $mysqli->query($consultaLlistaProves)){
		die('There was an error running the query: '.$consultaLlistaProves.' [' . $mysqli->error . ']');
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
	<link href="css/enguany.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery-3.2.1.js"></script>	
	<script src="js/bootstrap.js"></script>		
	<script src="js/generic.js"></script>
	<script src="js/enguany.js"></script>
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
	<title>La Juguesca - Enguany</title>
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
	<div id="container" class="container-fluid" >
	<?php while ($row = $proves -> fetch_assoc()){
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
		<div class="proves" id="prova_<?php echo $idProva ?>" name="<?php echo $categoriaProva ?>" >
			<div class="row">
				<div class="col-xs-6 col-md-6 col-xl-6 titol_prova parrafo"> <?php echo $titolProva ?></div>
				<div class="col-xs-6 col-md-6 col-xl-6 hora_prova"><?php echo $horariProva ?></div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-12 col-xl-12 subtitol_prova" ><?php echo $subtitolPorva ?></div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-12 col-xl-12 altres-opcion" >
					<p>Altres Opcions</p>
					<?php if($mapa) { ?>
					<a class="enll maps" href="<?php echo $urlMapa ?>" target="_blank"><img class="img-responsive" src="img/web/maps.png"></img></a>
					<?php }
					if($pdf) { ?>
					<a class="enll pdf" href="<?php echo $urlPdf ?>" target="_blank"><img  class="img-responsive" src="img/web/pdf.png"></img></a>
					<?php } ?>
				</div>
			</div>
		</div> 
		<?php } ?>
	</div>
	<!--FI CONTENIDOR-->
	</div>
</div>
</body>
</html>