<?php 
session_start();

if(!isset($_SESSION['user_id']))
{
 header("Location: index.html");
}
require("codigo/conecta_sql.php");

		$consulta = "SELECT * FROM juguesca_vst_questionari WHERE IdColla ='".$_SESSION['user_id']."' and DataActivacio < NOW()";
		if(!$result = $mysqli ->query($consulta)){
			die('There was an error running the query: '.$result.' [' . $mysqli->error . ']');
			}

?>
<!DOCTYPE html>
<html lang="es">
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Hugo Longas, Alban Longas" >
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="css/common.css" rel="stylesheet" type="text/css" />
	<link href="css/questionari.css" rel="stylesheet" type="text/css" />	
	<script src="js/jquery-3.2.1.js"></script>	
	<script src="js/bootstrap.js"></script>		
	<script src="js/generic.js"></script>	
	<script src="js/questionari.js"></script>	
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
	<title>La Juguesca - subconscient</title>	
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
						<div class="subtitol_questions" ><?php echo $_SESSION['user']; ?></div>
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
		<div id="info_subconcient" >
			<p class="parrafo" >
			Has descobert la prova subconscient, per saber si esteu atents a TOT el que succeeix a La Juguesca, després d'algunes proves de La Juguesca d'aquest any, aniran apareixent petits formularis 
				amb alguna pregunta sobre coses que han passat durant la prova.
				
				Sereu capaços de recordar-ho tot?
			</p>
		</div> 
		<div id="container" class="container-fluid" >		
	<?php
		while($row = $result -> fetch_assoc())
		{
			$IDQ = $row["IDQ"];
			$TitolQ = $row ["TitolQ"];
			$Respost = $row ["Respost"];			
		?>
		<div class="<?php if($Respost ==1){ echo "questions_resoltes"; } else {echo "questions"; } ?>" id="<?php echo $IDQ ?>">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-xl-12 subtitol_questions" id="questionari_<?php echo $IDQ ?>_info" ><?php echo $TitolQ ?></div>
			</div>
		</div> 
		<?php } ?>
	</div>
	<!--FI CONTENIDOR-->
	</div> 
		<div class="modal fullscreen-modal fade"  id="modal_questionari">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Qüestionari</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					 <object id="v_questionari" data="" width="100%" height="100%"></object> 
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