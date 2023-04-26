<?php
include '../conexion/conexion.php';
$conexion = new Conexion();
$con = $conexion->conectarDB();

$where= "";
if(!empty($_GET)){
    $valor= $_GET['consulta'];
    if(!empty($valor)){
        $where = "WHERE ganado.idPotrero = $valor  AND ganado.estado = 'Criando'";
    }
} 

$sql="SELECT * FROM ganado INNER JOIN socios ON ganado.idSocio = socios.idSocio INNER JOIN potrero ON ganado.idPotrero = potrero.idPotrero $where ORDER BY marca ASC";
$resultset = $con->query($sql);
$contador = 0; // Inicializar contador
if($resultset){
    if($resultset->num_rows>0){
        while($fila = $resultset->fetch_assoc()){
            echo "<tr>
            <td>".$fila["nombrePotrero"]."</td> 
            <td>".$fila["marca"]."</td> 
            <td>".$fila["marcaChapeta"]."</td> 
            <td>".$fila["raza"]."</td> 
            <td>".$fila["colorRes"]."</td> 
            <td>".$fila["categoriaEdad"]."</td>
           </tr>"; 
           $contador++;
        }
    } else {
        echo "<tr><td colspan='6'>No se encontraron resultados.</td></tr>";
    }
} else {
    echo "<tr><td colspan='6'>Hubo un error al realizar la consulta.</td></tr>";
}

$con->close();
?>
