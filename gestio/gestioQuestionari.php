<?php
session_start();

if (!isset($_SESSION['user_session'])) {
    header("Location: access.php");
}
if ($_SESSION['rol'] == 2) {
    header("modifica_usuari.php?id=" . $_SESSION['user_session']);
}
if ($_SESSION['rol'] == 3) {
    header("Location: errorPermisos.php");
}
require("codigo/conecta_sql.php");
$consulta = "SELECT IDQ,TitolQ,text_info,titol,titol2,titol3,titol4,DataActivacio,Respost FROM `juguesca_vst_questionari` LEFT JOIN juguesca_questionari_perguntes ON IDQ = idQuest WHERE IdColla='org'";
if (!$result = $mysqli->query($consulta)) {
    die('There was an error running the query: ' . $result . ' [' . $mysqli->error . ']');
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/generic.css" rel="stylesheet" type="text/css" />
        <link href="css/quisom.css" rel="stylesheet" type="text/css" />
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.min.js"></script>
        <script src="js/proves.js"></script>
    </head>
    <body>
        <div style="margin:10px 10px 10px 15px;">		
            <a  class="btn" href="questionari.php?type=0">Crear Pregunta</a>
        </div>
        <div class="container-fluid" id="classificacio">
            <h1>Proves</h1>
            <div>	
                <table id="tbl_proves" class="display compact" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>IdQuestio</th>
                            <th>Titol Questionari</th>
                            <th>Text informatiu</th>
                            <th>Questió 1</th>
                            <th>Questió 2</th>
                            <th>Questió 3</th>
                            <th>Questió 4</th>
                            <th>Data activació</th>
                            <th>Respost Organització</th>
                            <th>Editar</th>
                            <th>Respondre</th>
                            <th>Borrar</th>
                            <th>Resultats</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>IdQuestio</th>
                            <th>Titol Questionari</th>
                            <th>Text informatiu</th>
                            <th>Questió 1</th>
                            <th>Questió 2</th>
                            <th>Questió 3</th>
                            <th>Questió 4</th>
                            <th>Data activació</th>
                            <th>Respost Organització</th>
                            <th>Editar</th>
                            <th>Respondre</th>
                            <th>Borrar</th>
                            <th>Resultats</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $posicio = 1;
                        while ($row = $result->fetch_assoc()) {

                            $idQestio = $row["IDQ"];
                            $TitolQ = $row ["TitolQ"];
                            $text_info = $row ["text_info"];
                            $titol = $row ["titol"];
                            $titol2 = $row ["titol2"];
                            $titol3 = $row ["titol3"];
                            $titol4 = $row ["titol4"];
                            $DataActivacio = $row ["DataActivacio"];
                            $Respost = $row ["Respost"];
                            ?>
                            <tr>
                                <th><?php echo $idQestio ?></th>
                                <th><?php echo $TitolQ ?></th>
                                <th><?php echo $text_info ?></th>
                                <th><?php echo $titol ?></th>
                                <th><?php echo $titol2 ?></th>
                                <th><?php echo $titol3 ?></th>
                                <th><?php echo $titol4 ?></th>
                                <th><?php echo $DataActivacio ?></th>
                                <th><?php echo $Respost ?></th>
                                <th><a  class="btn" href="questionari.php?type=1&id=<?php echo $idQuestio; ?>">Editar</a></th>
                                <th><a  class="btn" href="respondreQuestionari.php?id=<?php echo $idQuestio; ?>">Respondre</a></th>
                                <th><a  class="btn" >Eliminar</a></th>
                                <th><a  class="btn" href="codigo/gestioQuestionari.php?type=3&id=<?php echo $idQuestio; ?>">ObtenirResultat</a></th>
                            </tr>            
                            <?php
                            $posicio++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>