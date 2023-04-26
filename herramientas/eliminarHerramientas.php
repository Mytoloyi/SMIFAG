<?php


 include 'conexion.php';

 
 $id = $_GET["id"];

 $sql = "DELETE FROM herramientas WHERE idHerramienta='$id'";

 if($con -> query($sql)==TRUE){
   

 }

$con->close();

include 'conexion.php';

$sql="SELECT * FROM herramientas ORDER BY nombreHerramienta ASC LIMIT 10";        
$resultset = $con->query($sql);
if($resultset->num_rows>0){
 while($fila = $resultset->fetch_assoc()){
    echo "<tr>
    <td>".$fila["idHerramienta"]."</td>
    <td>".$fila["nombreHerramienta"]."</td> 
    <td>".$fila["cantidad"]."</td>
    <td>".$fila["novedades"]."</td>
    <td class='text-end pe-4 ps-4'> 
        <a class='btn btn-success' href='editarHerramientas.php?id=".$fila["idHerramienta"]."' > <i class='bi bi-pencil'></i> </a> 
    </td>
    <td class='text-end pe-4 ps-4'> 
        <button class='btn btn-danger' onclick='listaHerramientas(this.value)' value='".$fila["idHerramienta"]."'> <i class='bi bi-trash'></i>  </button> 
    </td></tr>"; 
 }
}

?>


