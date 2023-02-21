<?php
include 'conexion.php';
$conectar = new Conexion();
$con = $conectar->conectarDB();
$where= "";
if(!empty($_GET)){
    $valor= $_GET['consulta'];
    if(!empty($valor)){
        $where= "WHERE nombreEmpleado LIKE '%$valor%' 
        or apellidoEmpleado LIKE '%$valor%'
        or documentoEmpleado LIKE '%$valor%'  
        or telefonoEmpleado LIKE '%$valor%' 
        or rangoEmpleado LIKE '%$valor%' 
        or tipodeContrato LIKE '%$valor%'";
    }
} 

$sql="SELECT * FROM empleados $where ORDER BY nombreEmpleado ASC LIMIT 10";
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
        <td class='text-end pe-4 ps-4'> 
        <a class='btn btn-success' href='editarEmpleados.php?id=".$fila["idEmpledo"]."'><i class='bi bi-pencil'></i></a> 
        </td><td class='text-end pe-4 ps-4'> 
            <button class='btn btn-danger' onclick='listaEmpleados(this.value)' value='".$fila["idEmpledo"]."'><i class='bi bi-trash'></i></button> 
        </td></tr>"; 
    }
}


?>
