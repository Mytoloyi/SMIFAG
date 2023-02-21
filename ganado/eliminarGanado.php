<?php


 include 'conexion.php';

 $id = $_GET["id"];

 $sql = "DELETE FROM ganado WHERE idRes='$id'";

 if($con -> query($sql)==TRUE){

 }

$con->close();

include 'conexion.php';

$sql="SELECT * FROM ganado INNER JOIN socios ON  ganado.idSocio =socios.idSocio INNER JOIN potrero ON ganado.idPotrero = potrero.idPotrero  ORDER BY raza ASC LIMIT 10";        
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
   </td></tr>"; 
 }
}

?>


