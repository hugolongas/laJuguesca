<?php 
	$nom = $_POST["nom"];
	$motiu = $_POST["motiu"];
	$tel = $_POST["tel"];
	$email = $_POST["email"];
	$emailReceptor = $_POST["emailReceptor"];
	$mis = $_POST["miss"];
	
	$desti = $emailReceptor;

	$asunto = $motiu." de ".$nom;
	$mensaje = "<!DOCTYPE html>";
	$mensaje += "<html>";
	$mensaje += "<head>";
	$mensaje += "</head>";
	$mensaje += "<body>";
	$mensaje += "<div style='background-color:teal'>Nombre: ".$nom."<br>Mensaje: ".$mis."<br>Telefono: ".$tel."</div><div style='background-image:url(https://lajuguesca.cat/img/web/juguesca.png); whidth:250px;height:70px;'></div></body></html>";
// Ahora se envía el e-mail usando la función mail() de PHP
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$cabeceras .= 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
//$enviat = mail($desti, $asunto, $mensaje, $cabeceras);
//echo($enviat);
echo($mensaje);

?>	