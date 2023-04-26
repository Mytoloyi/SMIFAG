<?php
    class Conectar{
        private $servidor;
        private $user;
        private $password;
        private $status=0;
        //LISTAR HERRAMIENTAS
        function listaHerramientas(){
            $servidor="localhost";
            $user="root";
            $password="";
            $database="finca_ganadera";
            $con= new mysqli($servidor,$user,$password,$database);
            $sql="SELECT * FROM herramientas ORDER BY nombreHerramienta ASC LIMIT 10";
            $resultset = $con->query($sql);
            if($resultset->num_rows>0){
                while($fila = $resultset->fetch_assoc()){
                    echo "<tr>
                    <td>".$fila["idHerramienta"]."</td>
                    <td>".$fila["nombreHerramienta"]."</td> 
                    <td>".$fila["cantidad"]."</td>
                    <td>".$fila["novedades"]."</td>
                    <td class='text-end pe-4 ps-4'> 
                        <a class='btn btn-success' href='editarHerramientas.php?id=".$fila["idHerramienta"]."' > <i class='bi bi-pencil'></i> </a> 
                    </td>
                    <td class='text-end pe-4 ps-4'> 
                        <button class='btn btn-danger' onclick='listaHerramientas(this.value)' value='".$fila["idHerramienta"]."'> <i class='bi bi-trash'></i>  </button> 
                    </td></tr>"; 
                }
            }
            
        }





    }
?>


<script>
    //HERRAMIENTAS
    function listaHerramientas(id){
        var mensaje;
   
        if(confirm("¿Desea eliminar el registro?")){
            const xhttp = new XMLHttpRequest();
            xhttp.onload= function(){
                document.getElementById("tabla").innerHTML = this.responseText;
                alert('Se ha eliminado');
            };

            xhttp.open("GET","eliminarHerramientas.php?id="+id);
            xhttp.send();
        }  
    }

</script>