<?php
include 'conexion.php';

$where= "";
if(!empty($_GET)){
    $valor= $_GET['consulta'];
    if(!empty($valor)){
        $where= "WHERE nombreInsumo LIKE '%$valor%' 
        or cantidadInsumo LIKE '%$valor%'
        or fechavencimiento LIKE '%$valor%'
        or valorUnidad LIKE '%$valor%'";
    }
} 

$sql="SELECT * FROM insumos $where ORDER BY nombreInsumo ASC LIMIT 10";
$resultset = $con->query($sql);
if($resultset->num_rows>0){
    while($fila = $resultset->fetch_assoc()){
        echo "<tr>
        <td>".$fila["idInsumo"]."</td>
        <td>".$fila["nombreInsumo"]."</td> 
        <td>".$fila["cantidadInsumo"]."</td>
        <td>".$fila["fechavencimiento"]."</td> 
        <td>".$fila["valorUnidad"]."</td> 
        <td class='text-end pe-4 ps-4'> 
        <a class='btn btn-success' href='editarInsumos.php?id=".$fila["idInsumo"]."' > <i class='bi bi-pencil'></i> </a> 
        </td>
        <td class='text-end pe-4 ps-4'> 
        <button class='btn btn-danger' onclick='listaInsumos(this.value)' value='".$fila["idInsumo"]."'> <i class='bi bi-trash'></i> </button> 
        </td></tr>"; 
    }
}


?>
