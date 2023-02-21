<?php
    class Conectar{
        private $servidor;
        private $user;
        private $password;
        private $status=0;

        //LISTAR SOCIOS
        function listaSocios(){
            $servidor="localhost";
            $user="root";
            $password="";
            $database="finca_ganadera";
            $con= new mysqli($servidor,$user,$password,$database);
            $sql="SELECT * FROM socios ORDER BY nombreSocio ASC LIMIT 10";
            $resultset = $con->query($sql);
            if($resultset->num_rows>0){
                while($fila = $resultset->fetch_assoc()){
                    
                    echo "<tr>
                    <td>".$fila["idSocio"]."</td>
                    <td>".$fila["nombreSocio"]."</td>
                    <td>".$fila["apellidoSocio"]."</td> 
                    <td>".$fila["documentoSocio"]."</td> 
                    <td>".$fila["telefonoSocio"]."</td> 
                    <td>".$fila["marca"]."</td> 
                    <td class='text-end pe-4 ps-4'> 
                    <a class='btn btn-success' href='editarSocios.php?id=".$fila["idSocio"]."' > <i class='bi bi-pencil'></i> </a> 
                    </td><td class='text-end pe-4 ps-4'> 
                        <button class='btn btn-danger' onclick='listaSocios(this.value)' value='".$fila["idSocio"]."'> <i class='bi bi-trash'></i>  </button> 
                    </td></tr>"; 
                }
            }
            
        }
    }
?>


<script>
 
    //SOCIOS
    function listaSocios(id){
        var mensaje;
   
        if(confirm("¿Desea eliminar el registro?")){
            const xhttp = new XMLHttpRequest();
            xhttp.onload= function(){
                document.getElementById("tabla").innerHTML = this.responseText;
                alert('Se ha eliminado');
            };

            xhttp.open("GET","eliminarSocios.php?id="+id);
            xhttp.send();
        }  
    }

</script>