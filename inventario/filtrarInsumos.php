<?php
include '../conexion/conexion.php';
$conexion = new Conexion();
$con = $conexion->conectarDB();

$where= "";
if(!empty($_GET)){
    $valor= $_GET['consulta'];
    if(!empty($valor)){
        $where= "WHERE nombreInsumo LIKE '%$valor%'
        or fechavencimiento LIKE '%$valor%'";
    }
} 

$sql="SELECT * FROM insumos $where ORDER BY nombreInsumo ASC";
$resultset = $con->query($sql);
if($resultset->num_rows>0){
    while($fila = $resultset->fetch_assoc()){
        echo "<tr>
        <td>".$fila["nombreInsumo"]."</td> 
        <td>".$fila["cantidadInsumo"]."</td>
        <td>".$fila["fechavencimiento"]."</td>
        </tr>"; 
    }
}




?>