<?php

include 'conexion.php';

$conectar = new Conexion();
$con = $conectar -> conectarDB();
$id = $_GET["id"];

// Verificar si el registro se está utilizando en la tabla agenda
$sql_verificar = "SELECT COUNT(*) as cuenta FROM agenda WHERE idEmpledo='$id'";
$result_verificar = $con->query($sql_verificar);
$cuenta = $result_verificar->fetch_assoc()["cuenta"];
if ($cuenta > 0) {
    echo "No se puede eliminar el empleado porque está siendo utilizado en la agenda.";
    exit();
}

$sql = "DELETE FROM empleados WHERE idEmpledo='$id'";

if($con -> query($sql)==TRUE){
    // El registro se eliminó correctamente
}

$con->close();


$con = $conectar -> conectarDB();
$sql="SELECT * FROM empleados INNER JOIN car ON empleados.idCargo = car.idCargo ORDER BY nombreEmpleado ASC LIMIT 5";
$resultset = $con->query($sql);
if($resultset->num_rows>0){
 while($fila = $resultset->fetch_assoc()){
  echo "<tr>
  <td>".$fila["idEmpledo"]."</td>
  <td>".$fila["nombreEmpleado"]."</td>
  <td>".$fila["apellidoEmpleado"]."</td>
  <td>".$fila["tipoDocumento"]." ".$fila["documentoEmpleado"]."</td> 
  <td>".$fila["telefonoEmpleado"]."</td> 
  <td>".$fila["cargo"]."</td> 
  <td>".$fila["tipodeContrato"]."</td>
  <td>".$fila["nomina"]."</td>  
  <td class='text-end pe-4 ps-4'> 
  <a class='btn btn-success' href='editarEmpleados.php?id=".$fila["idEmpledo"]."' > <i class='bi bi-pencil'></i> </a> 
  </td><td class='text-end pe-4 ps-4'> 
      <button class='btn btn-danger' onclick='listaEmpleados(this.value)' value='".$fila["idEmpledo"]."'> <i class='bi bi-trash'></i></button> 
  </td></tr>"; 
 }
}

?>

