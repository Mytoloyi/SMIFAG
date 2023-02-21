<?php


 include 'conexion.php';

 
 $id = $_GET["id"];

 $sql = "DELETE FROM socios WHERE idSocio='$id'";

 if($con -> query($sql)==TRUE){
   

 }

$con->close();


include 'conexion.php';
$sql="SELECT * FROM socios ORDER BY nombreSocio ASC LIMIT 10";        
$resultset = $con->query($sql);
if($resultset->num_rows>0){
 while($fila = $resultset->fetch_assoc()){
    echo "<tr>
    <td>".$fila["idSocio"]."</td>
    <td>".$fila["nombreSocio"]."</td>
    <td>".$fila["apellidoSocio"]."</td> 
    <td>".$fila["documentoSocio"]."</td> 
    <td>".$fila["telefonoSocio"]."</td> 
    <td>".$fila["marca"]."</td> 
    <td class='text-end pe-4 ps-4'> 
    <a class='btn btn-success' href='editarSocios.php?id=".$fila["idSocio"]."' > <i class='bi bi-pencil'></i> </a> 
    </td><td class='text-end pe-4 ps-4'> 
        <button class='btn btn-danger' onclick='listaSocios(this.value)' value='".$fila["idSocio"]."'> <i class='bi bi-trash'></i>  </button> 
    </td></tr>"; 
 }
}

?>


