<?php
class Conectar{
    private $servidor;
    private $user;
    private $password;
    private $status=0;
    //LISTAR EMPLEADOS
    function listaInsumos(){
        $servidor="localhost";
        $user="root";
        $password="";
        $database="finca_ganadera";
        $con= new mysqli($servidor,$user,$password,$database);
            $sql="SELECT * FROM insumos ORDER BY nombreInsumo ASC LIMIT 10";
            $resultset = $con->query($sql);
            if($resultset->num_rows>0){
                while($fila = $resultset->fetch_assoc()){
                    echo "<tr>
                    <td>".$fila["idInsumo"]."</td>
                    <td>".$fila["nombreInsumo"]."</td> 
                    <td>".$fila["cantidadInsumo"]."</td>
                    <td>".$fila["fechavencimiento"]."</td> 
                    <td>".$fila["valorUnidad"]."</td> 
                    <td>".$fila["novedades"]."</td> 
                    <td class='text-end pe-4 ps-4'> 
                    <a class='btn btn-success' href='editarInsumos.php?id=".$fila["idInsumo"]."' > <i class='bi bi-pencil'></i> </a> 
                    </td>
                    <td class='text-end pe-4 ps-4'> 
                        <button class='btn btn-danger' onclick='listaInsumos(this.value)' value='".$fila["idInsumo"]."'> <i class='bi bi-trash'></i> </button> 
                    </td></tr>"; 
                }
            }
        }
    }

?>
<script> 
    function listaInsumos(id){
        var mensaje;
   
        if(confirm("¿Desea eliminar el registro?")){
            const xhttp = new XMLHttpRequest();
            xhttp.onload= function(){
                document.getElementById("tabla").innerHTML = this.responseText;
                alert('Se ha eliminado');
            };

            xhttp.open("GET","eliminarInsumos.php?id="+id);
            xhttp.send();
        }  
    }
</script> 
