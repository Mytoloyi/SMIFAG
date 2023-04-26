<?php
include 'conexion.php';

$id = $_GET["id"];

// Verificar si el registro se está utilizando en la tabla agenda
$sql_verificar = "SELECT COUNT(*) as cuenta FROM agenda WHERE idAct='$id'";
$result_verificar = $con->query($sql_verificar);
$cuenta = $result_verificar->fetch_assoc()["cuenta"];
if ($cuenta > 0) {
    echo "No se puede eliminar la actividad porque está siendo utilizada.";
    exit();
}

$sql = "DELETE FROM actividades WHERE idAct='$id'";

if($con -> query($sql)==TRUE){
    // El registro se eliminó correctamente
}

$con->close();


include 'conexion.php';

$sql="SELECT * FROM actividades ORDER BY nombreActividad ASC ";        
$resultset = $con->query($sql);
if($resultset->num_rows>0){
 while($fila = $resultset->fetch_assoc()){
   echo "<tr>
   <td>".$fila["idAct"]."</td>
   <td>".$fila["nombreActividad"]."</td> 
   <td>".$fila["descripcion"]."</td> 
   <td class='text-end pe-4 ps-4'> 
       <button class='btn btn-danger' onclick='listaActividad(this.value)' value='".$fila["idAct"]."'> <i class='bi bi-trash'></i> </button> 
   </td></tr>"; 
 }
}
?>
