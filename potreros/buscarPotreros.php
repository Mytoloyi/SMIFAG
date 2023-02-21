<?php
include 'conexion.php';

$where= "";
if(!empty($_GET)){
    $valor= $_GET['consulta'];
    if(!empty($valor)){
        $where= "WHERE nombrePotrero LIKE '%$valor%' 
        or estadoPotrero LIKE '%$valor%'
        or medida LIKE '%$valor%'";
    }
} 

$sql="SELECT * FROM potrero $where ORDER BY nombrePotrero ASC ";
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
