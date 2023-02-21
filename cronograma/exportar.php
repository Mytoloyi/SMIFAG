<?php
session_start();
if(!isset($_SESSION ["Usuario"])){
    header ('Location: ../admin/index.php'); 
}
ob_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Agenda</title>
        <meta chasrset="utf-8"> 
        <meta name="description" content="Cronograma de actividades">
        <link rel="shortcut icon" href="../img/logosmifag.png" type="image/ico">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/custom.css" rel="stylesheet">
        <link href="../libs/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../libs/" rel="stylesheet">
        <script src="../js/bootstrap.min.js"></script>
        <style>
 
    table, th, td{
                border: 1px dashed #F2DAC4;
                padding: 10px; text-align: center;
                background-color: #bf9b7a9b;
            }
  </style>
    </head>

    <body>

    <h1 class="text-center  text-primary fw-bolder p-4 p-3">Cronograma de actividades</h1>
           
        <div class="container">
            <table class="table  bg-primary bg-opacity-50 text-center">
            <thead class=" text-primary bg-secondary bg-opacity-50 fw-bolder "> 
                <th>Fecha</th>
                <th>Actividad</th>
                <th>Empleado asignado</th>
            </thead>
            <tbody id="tabla" class="text-white">
               <?php
               include '../conexion/conexion.php';
               $con = new Conexion();
               $conexion = $con->conectarDB();
                $sql="SELECT * FROM agenda INNER JOIN empleados ON agenda.idEmpledo = empleados.idEmpledo  INNER JOIN actividades ON agenda.idAct = actividades.idAct ORDER BY fecha ASC";
                $resultset = $conexion->query($sql);
                
                    while($fila = $resultset->fetch_assoc()){
                        echo "<tr>
                        <td>".$fila["fecha"]."</td> 
                        <td>".$fila["nombreActividad"].": ".$fila["descripcion"]."</td>
                        <td>".$fila["nombreEmpleado"]." ".$fila["apellidoEmpleado"]."</td> 
                       </tr>"; 
                    }   
               ?>
            </tbody>
        </table>
        </div>
    </body>
</html>
<?php
$html = ob_get_clean(); 
// echo $html;

require_once '../libs/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

// $option = $dompdf->getOptions();
// $options->set(array('isRemoteEnabled' => true));
// $dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setpaper('letter');
// $dompdf->setPaper('A4', 'landscape');

$dompdf->render(); 

$dompdf->stream("cronograma.pdf" , array("Attachment" => false));
?>
