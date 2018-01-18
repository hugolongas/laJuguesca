<?php

require_once("conecta_sql.php");
$idColla = $_GET["idColla"];

$consulta = "SELECT * FROM `juguesca_app_gps` WHERE idAlien NOT IN (SELECT IdAlien FROM juguesca_app_colla WHERE idColla = '" . $idColla . "')";
try {
    if (!$result = $mysqli->query($consulta)) {
        die('There was an error running the query: ' . $result . ' [' . $mysqli->error . ']');
    }
    $row_cnt = $result->num_rows;
    if ($row_cnt > 0) {
        while ($row = $result->fetch_assoc()) {
            $idAlien = $row["idAlien"];
            $latitud = $row["Latitud"];
            $longitud = $row["Longitud"];
            echo $idAlien . " -> " . $latitud . "/" . $longitud;
        }
    } else {
        echo "No quedan Alienigenas"; // wrong details 
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>