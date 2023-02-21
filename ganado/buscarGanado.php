<?php
include '../empleados/conexion.php';
$conectar = new Conexion();
$con = $conectar->conectarDB();
$where= "";
if(!empty($_GET)){
    $valor= $_GET['consulta'];
    if(!empty($valor)){
        $where= "WHERE raza LIKE '%$valor%'
        or colorRes LIKE '%$valor%'  
        or categoriaEdad LIKE '%$valor%' 
        or tipoNegocio LIKE '%$valor%' 
        or marca LIKE '%$valor%'
        or marcaChapeta LIKE '%$valor%'
        or estado LIKE '%$valor%'
        or precioinicial LIKE '%$valor%'
        or precioFinal LIKE '%$valor%'
        or nombrePotrero LIKE '%$valor%'";
    }
} 

$sql="SELECT * FROM ganado INNER JOIN socios ON ganado.idSocio = socios.idSocio INNER JOIN potrero ON ganado.idPotrero = potrero.idPotrero $where ORDER BY raza ASC LIMIT 10";
$resultset = $con->query($sql);
if($resultset->num_rows>0){
    while($fila = $resultset->fetch_assoc()){
        echo "<tr>
        <td>".$fila["idRes"]."</td>
        <td>".$fila["raza"]."</td>
        <td>".$fila["colorRes"]."</td> 
        <td>".$fila["categoriaEdad"]."</td> 
        <td>".$fila["tipoNegocio"]."</td> 
        <td>".$fila["marca"]."</td> 
        <td>".$fila["marcaChapeta"]."</td>
        <td>".$fila["estado"]."</td> 
        <td>".$fila["precioinicial"]."</td> 
        <td>".$fila["precioFinal"]."</td> 
        <td>".$fila["nombrePotrero"]."</td>
        <td class='text-end pe-4 ps-4'> 
            <a class='btn text-white btn-outline-success' href='controlGanado.php?id=".$fila["idRes"]."' > <i class='bi bi-eye'></i> </a> 
        </td>
        <td class='text-end pe-4 ps-4'> 
            <a class='btn btn-success' href='editarGanado.php?id=".$fila["idRes"]."' > <i class='bi bi-pencil'></i> </a> 
        </td><td class='text-end pe-4 ps-4'> 
            <button class='btn btn-danger' onclick='listaGanado(this.value)' value='".$fila["idRes"]."'> <i class='bi bi-trash'></i></button> 
        </td>
        </tr>"; 
    }
}


?>
