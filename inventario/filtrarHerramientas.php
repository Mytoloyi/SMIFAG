<?php
include '../conexion/conexion.php';
$conexion = new Conexion();
$con = $conexion->conectarDB();

$where= "";
if(!empty($_GET)){
    $valor= $_GET['consulta'];
    if(!empty($valor)){
        $where= "WHERE nombreHerramienta LIKE '%$valor%'";
    }
} 

$sql="SELECT * FROM herramientas $where ORDER BY nombreHerramienta ASC";
$resultset = $con->query($sql);
if($resultset->num_rows>0){
    while($fila = $resultset->fetch_assoc()){
        echo "<tr>
        <td>".$fila["nombreHerramienta"]."</td> 
        <td>".$fila["cantidad"]."</td>
        </tr>"; 
    }
}




?>