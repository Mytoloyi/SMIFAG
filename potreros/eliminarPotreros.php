<?php
include 'conexion.php';

$id = $_GET["id"];

// Verificar si el registro se está utilizando en la tabla ganado
$sql_verificar = "SELECT COUNT(*) as cuenta FROM ganado WHERE idPotrero='$id'";
$result_verificar = $con->query($sql_verificar);
$cuenta = $result_verificar->fetch_assoc()["cuenta"];
if ($cuenta > 0) {
    echo "No se puede eliminar el potrero porque está siendo utilizado.";
    exit();
}

$sql = "DELETE FROM potrero WHERE idPotrero='$id'";

if($con -> query($sql)==TRUE){
    // El registro se eliminó correctamente
}

$con->close();


include 'conexion.php';

$sql="SELECT * FROM potrero ORDER BY nombrePotrero ASC LIMIT 5";        
$resultset = $con->query($sql);
if($resultset->num_rows>0){
 while($fila = $resultset->fetch_assoc()){
    echo "<tr>
    <td>".$fila["idPotrero"]."</td>
    <td>".$fila["nombrePotrero"]."</td> 
    <td>".$fila["estadoPotrero"]."</td>
    <td>".$fila["medida"]."</td>
    <td class='text-end pe-4 ps-4'> 
    <a class='btn btn-success' href='editarPotreros.php?id=".$fila["idPotrero"]."' > <i class='bi bi-pencil'></i> </a> 
    </td>
    <td class='text-end pe-4 ps-4'> 
        <button class='btn btn-danger' onclick='listaPotreros(this.value)' value='".$fila["idPotrero"]."'> <i class='bi bi-trash'></i>  </button> 
    </td></tr>";  
}
}
?>