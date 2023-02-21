<?php
    class Conectar{
        
        //LISTAR AGENDA
        function listaActividades(){
            include 'conexion.php';
            $sql="SELECT * FROM agenda INNER JOIN empleados ON agenda.idEmpledo = empleados.idEmpledo  INNER JOIN actividades ON agenda.idAct = actividades.idAct ORDER BY fecha ASC LIMIT 10";
            $resultset = $con->query($sql);
            
                while($fila = $resultset->fetch_assoc()){
                    echo "<tr>
                    <td>".$fila["idActividad"]."</td>
                    <td>".$fila["fecha"]."</td> 
                    <td>".$fila["nombreActividad"]."</td>
                    <td>".$fila["descripcion"]."</td> 
                    <td>".$fila["nombreEmpleado"]." ".$fila["apellidoEmpleado"]."</td> 
                    <td class='text-end pe-4 ps-4'> 
                    <a class='btn btn-success' href='editarActividad.php?id=".$fila["idActividad"]."' > <i class='bi bi-pencil'></i> </a> 
                    </td><td class='text-end pe-4 ps-4'> 
                        <button class='btn btn-danger' onclick='listaActividades(this.value)' value='".$fila["idActividad"]."'> <i class='bi bi-trash'></i></button> 
                    </td></tr>"; 
                }
        }
            
        }

       
    
?>


<script>
    //AGENDA
    function listaActividades(id){
        var mensaje;
   
        if(confirm("¿Desea eliminar el registro?")){
            const xhttp = new XMLHttpRequest();
            xhttp.onload= function(){
                document.getElementById("tabla").innerHTML = this.responseText;
                alert('Se ha eliminado');
            };

            xhttp.open("GET","eliminarActividades.php?id="+id);
            xhttp.send();
        }  
    }

 
   
</script>