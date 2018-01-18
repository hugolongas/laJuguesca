<?php
 session_start();
 require_once("conecta_sql.php");

 if(isset($_GET['type']))
 {
	$type = $_GET['type'];
	switch($type)
	{
		case 0:
		{
				if(session_destroy())
				{
					echo 'access';
				}
		}
		break;
		case 1:
		{
			if(isset($_POST['btn-login'])){
				$user = trim($_POST['user']);
				$user_password = trim($_POST['password']);
			
				$password = $user_password;
				try
				{ 
					$consulta = "SELECT * FROM juguesca_vst_usuari WHERE login='".$user."'";
					if(!$result = $mysqli ->query($consulta)){
						die('There was an error running the query: '.$result.' [' . $mysqli->error . ']');
					}
					$row_cnt = $result->num_rows;   
					if($row_cnt>0){
						$row = $result -> fetch_assoc();
						if($row['password']==$password){
							$_SESSION['user_session'] = $row['id_login'];
							$_SESSION['user'] = $row['user'];
							$_SESSION['rol'] = $row['rol'];
							$rol = $row['rol'];
							switch($rol) {
								case 1: //Admin
								{
									$_SESSION["visiblePrincipal"] = "inline";
									$_SESSION["visibleHistoria"] = "inline";
									$_SESSION["visibleSom"] = "inline";
									$_SESSION["visibleColles"] = "inline";
									$_SESSION["visibleEnguany"] = "inline";
									$_SESSION["visibleAnteriors"] = "inline";
									$_SESSION["visibleGaleria"] = "inline";
									$_SESSION["visibleQuestionari"] = "inline";
									break;
								}
								case 2://Membre
								{
									$_SESSION["visiblePrincipal"] = "none";
									$_SESSION["visibleHistoria"] = "none";
									$_SESSION["visibleSom"] = "inline";
									$_SESSION["visibleColles"] = "inline";
									$_SESSION["visibleEnguany"] = "inline";
									$_SESSION["visibleAnteriors"] = "inline";
									$_SESSION["visibleGaleria"] = "inline";
									$_SESSION["visibleQuestionari"] = "inline";
									break;
								}
								case 3: //Colla
								{
									$_SESSION["visiblePrincipal"] = "none";
									$_SESSION["visibleHistoria"] = "none";
									$_SESSION["visibleSom"] = "none";
									$_SESSION["visibleColles"] = "inline";
									$_SESSION["visibleEnguany"] = "none";
									$_SESSION["visibleAnteriors"] = "none";
									$_SESSION["visibleGaleria"] = "none";
									$_SESSION["visibleQuestionari"] = "none";
									break;
								}
								default:
								{
									$_SESSION["visiblePrincipal"] = "none";
									$_SESSION["visibleHistoria"] = "none";
									$_SESSION["visibleSom"] = "none";
									$_SESSION["visibleColles"] = "none";
									$_SESSION["visibleEnguany"] = "none";
									$_SESSION["visibleAnteriors"] = "none";
									$_SESSION["visibleGaleria"] = "none";
									$_SESSION["visibleQuestionari"] = "none";
									break;
								}
							}
							echo "ok;index";
						}else{
							echo "Contraseña incorrecta"; // wrong details
						}
					}else{
						echo "El usuari no existeix"; // wrong details 
					}
				}
				catch(PDOException $e){
					echo $e->getMessage();
				}
			}
		}
		break;
	}
 }

?>