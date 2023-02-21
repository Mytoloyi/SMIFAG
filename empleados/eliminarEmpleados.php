<?php


 include 'conexion.php';

 $conectar = new Conexion();
 $con = $conectar -> conectarDB();
 $id = $_GET["id"];

 $sql = "DELETE FROM empleados WHERE idEmpledo='$id'";

 if($con -> query($sql)==TRUE){
   

 }

$con->close();


$con = $conectar -> conectarDB();
$sql="SELECT * FROM empleados ORDER BY nombreEmpleado ASC LIMIT 10";        
$resultset = $con->query($sql);
if($resultset->num_rows>0){
 while($fila = $resultset->fetch_assoc()){
   echo "<tr>
   <td>".$fila["idEmpledo"]."</td>
   <td>".$fila["nombreEmpleado"]."</td>
   <td>".$fila["apellidoEmpleado"]."</td> 
   <td>".$fila["documentoEmpleado"]."</td> 
   <td>".$fila["telefonoEmpleado"]."</td> 
   <td>".$fila["rangoEmpleado"]."</td> 
   <td>".$fila["tipodeContrato"]."</td> 
   <td>".$fila["nomina"]."</td> 
   <td class='text-end pe-4 ps-4'> 
   <a class='btn btn-success' href='editarEmpleados.php?id=".$fila["idEmpledo"]."' onclick='editarEmpleados(this.value)' value='".$fila["idEmpledo"]."'> <i class='bi bi-pencil'></i> </a> 
   </td><td class='text-end pe-4 ps-4'> 
       <button class='btn btn-danger' onclick='listaEmpleados(this.value)' value='".$fila["idEmpledo"]."'> <i class='bi bi-trash'></i></button> 
   </td></tr>"; 
 }
}

?>


