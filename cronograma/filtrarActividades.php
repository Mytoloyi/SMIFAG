<?php
include '../conexion/conexion.php';
$conexion = new Conexion();
$con = $conexion->conectarDB();

$where= "";
if(!empty($_GET)){
    $valor= $_GET['consulta'];
    if(!empty($valor)){
        $where = "WHERE nombreActividad LIKE '%$valor%'
        or fecha LIKE '%$valor%' 
        or nombreEmpleado LIKE '%$valor%' 
        or apellidoEmpleado LIKE '%$valor%'
        or descripcion LIKE '%$valor%'";
    }
} 

$sql="SELECT * FROM agenda INNER JOIN empleados ON agenda.idEmpledo = empleados.idEmpledo  INNER JOIN actividades ON agenda.idAct = actividades.idAct $where ORDER BY fecha ASC LIMIT 10";
$resultset = $con->query($sql);
if($resultset->num_rows>0){
    while($fila = $resultset->fetch_assoc()){
        echo "<tr>
        <td>".$fila["fecha"]."</td> 
        <td>".$fila["nombreActividad"].": ".$fila["descripcion"]."</td>
        <td>".$fila["nombreEmpleado"]." ".$fila["apellidoEmpleado"]."</td> 
       </tr>"; 
    }
}


?>
