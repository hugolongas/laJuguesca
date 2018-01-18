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
							$_SESSION['user_id'] = $row['id_login'];
							$_SESSION['user'] = $row['user'];	
							if($row['rol']=='1')
							{
							echo "ok;gestio.php";	
							}
							else{
							echo "ok;questionari.php";
							}
						}else{
							echo "Contraseña incorrecta"; // wrong details
						}
					}else{
						echo "El usuario no existe"; // wrong details 
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