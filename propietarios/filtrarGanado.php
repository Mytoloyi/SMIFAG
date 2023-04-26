<?php
include 'conexion.php';


$where= "";
if(!empty($_GET)){
    $valor= $_GET['consulta'];
    if (!empty($valor)) {
        $where = "WHERE (nombreSocio LIKE '%$valor%'
                   OR apellidoSocio LIKE '%$valor%'
                   OR marca LIKE '%$valor%'
                   OR marcaChapeta LIKE '%$valor%'
                   OR raza LIKE '%$valor%'
                   OR colorRes LIKE '%$valor%'
                   OR categoriaEdad LIKE '%$valor%')
                  AND estado = 'Criando'";
    } else {
        $where = "WHERE estado = 'Criando'";
    }
} 

$sql="SELECT * FROM ganado INNER JOIN socios ON ganado.idSocio = socios.idSocio INNER JOIN potrero ON ganado.idPotrero = potrero.idPotrero $where  ORDER BY nombreSocio ASC";
$resultset = $con->query($sql);
if($valor != ""){
if($resultset->num_rows>0){
    while($fila = $resultset->fetch_assoc()){
        echo "<tr>
        <td>".$fila["nombreSocio"]." ".$fila["apellidoSocio"]."</td>
        <td>".$fila["marca"]."</td> 
        <td>".$fila["marcaChapeta"]."</td> 
        <td>".$fila["raza"]."</td> 
        <td>".$fila["colorRes"]."</td> 
        <td>".$fila["categoriaEdad"]."</td> 
        <td>".$fila["tipoNegocio"]."</td> 
        <td>".$fila["estado"]."</td> 
        <td>".$fila["nombrePotrero"]."</td> 
        <td class='text-end pe-4 ps-4'> 
        <a class='btn btn-blue' href='controlRes.php?id=".$fila["idRes"]."' > <i class='bi bi-eye text-info'></i> </a> 
        </td>
       </tr>"; 
    }
}  
}else{
    $sql="SELECT * FROM ganado INNER JOIN socios ON ganado.idSocio = socios.idSocio INNER JOIN potrero ON ganado.idPotrero = potrero.idPotrero WHERE estado = 'Criando'  ORDER BY nombreSocio ASC";
    $resultset = $con->query($sql);
    while($fila = $resultset->fetch_assoc()){
        echo "<tr>
        <td>".$fila["nombreSocio"]." ".$fila["apellidoSocio"]."</td>
        <td>".$fila["marca"]."</td> 
        <td>".$fila["marcaChapeta"]."</td> 
        <td>".$fila["raza"]."</td> 
        <td>".$fila["colorRes"]."</td> 
        <td>".$fila["categoriaEdad"]."</td> 
        <td>".$fila["tipoNegocio"]."</td> 
        <td>".$fila["estado"]."</td> 
        <td>".$fila["nombrePotrero"]."</td> 
        <td class='text-end pe-4 ps-4'> 
        <a class='btn btn-blue' href='controlRes.php?id=".$fila["idRes"]."' > <i class='bi bi-eye text-info'></i> </a> 
        </td>
       </tr>"; 
    }

}

?>
