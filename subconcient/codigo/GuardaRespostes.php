<?php
	require("conecta_sql.php");
	$idQuest = $_POST["idQuest"];
	$idColla = $_POST["idColla"];
	$numCamps = $_POST["numCamps"];
	$numRespostes = $_POST["numRespostes"];
	$respostes = array();
	$totalRespostes;
	for($i=0;$i<$numRespostes;$i++)
	{
		$resposta = "";
		for($j=0;$j<4;$j++)
		{
			if($j<$numCamps)
			{
				$resposta = $resposta."'".$_POST["resp_".$j."_col_".$i.""]."',";
			}
			else
				$resposta = $resposta."'',";			
		}
		$respostes[] = substr($resposta,0,-1);
	}
	$insertStrings = "";
	foreach($respostes as $r)
	{
		$insertStrings = $insertStrings."(".$idQuest.",'".$idColla."',".$r."),";
	}
	
	$consulta = substr("INSERT INTO juguesca_questionari_respostes (idQuest, idColla, resposta, resposta2, resposta3, resposta4) VALUES ".$insertStrings,0,-1);
	
	if(!$result = $mysqli ->query($consulta)){
		die('There was an error running the query: '.$result.' [' . $mysqli->error . ']');
	}
	if($result==1)
	{
		$GuardaColla = "UPDATE juguesca_questionari_respost SET Respost = 1 WHERE IDQ = $idQuest AND IdColla = '$idColla'";
	if(!$resultGuardaColla = $mysqli ->query($GuardaColla)){
		die('There was an error running the query: '.$result.' [' . $mysqli->error . ']');
	}
		if($resultGuardaColla == 1)
		{
			echo "La vostra resposta s'ha registrat correctament";
		}
		else
		{
			echo "Hi ha hagut algun error enregistrant que la colla ha respost";
		}
	}
	else
	{
		echo "Hi ha hagut algun error enregistrant la resposta";
	}
	

?>