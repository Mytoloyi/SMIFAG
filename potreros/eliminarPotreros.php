<?php


 include 'conexion.php';

 $id = $_GET["id"];

 $sql = "DELETE FROM potrero WHERE idPotrero='$id'";

 if($con -> query($sql)==TRUE){
   

 }

$con->close();


include 'conexion.php';

$sql="SELECT * FROM potrero ORDER BY nombrePotrero ASC";        
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


