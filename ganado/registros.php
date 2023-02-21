<?php
    class Conectar{
        private $servidor;
        private $user;
        private $password;
        private $status=0;
        //LISTAR GANADO
        function listaGanado(){
            $servidor="localhost";
            $user="root";
            $password="";
            $database="finca_ganadera";
            $con= new mysqli($servidor,$user,$password,$database);
           
            $sql="SELECT * FROM ganado INNER JOIN socios ON ganado.idSocio = socios.idSocio INNER JOIN potrero ON ganado.idPotrero = potrero.idPotrero ORDER BY raza ASC";
            $resultset = $con->query($sql);
            
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
                    <a class='btn  text-white btn-outline-success' href='controlGanado.php?id=".$fila["idRes"]."' > <i class='bi bi-eye'></i> </a> 
                    </td>
                    <td class='text-end pe-4 ps-4'> 
                    <a class='btn btn-success' href='editarGanado.php?id=".$fila["idRes"]."' > <i class='bi bi-pencil'></i> </a> 
                    </td><td class='text-end pe-4 ps-4'> 
                        <button class='btn btn-danger' onclick='listaGanado(this.value)' value='".$fila["idRes"]."'> <i class='bi bi-trash'></i></button> 
                    </td></tr>"; 
                }
            }
            
          function consultarMarca(){
            include 'conexion.php';
                     
            $sql="SELECT * FROM socios ";
            $resultset = $con->query($sql);
                while($fila = $resultset->fetch_assoc()){
                    echo "<option value=".$fila['idSocio'].">".$fila['nombreSocio']." ".$fila['apellidoSocio'].": ".$fila['marca']."</option>";
                
              }
          }

         
          
    
        }

       
    
?>


<script>
    //EMPLEADOS
    function listaGanado(id){
        var mensaje;
   
        if(confirm("¿Desea eliminar el registro?")){
            const xhttp = new XMLHttpRequest();
            xhttp.onload= function(){
                document.getElementById("tabla").innerHTML = this.responseText;
                alert('Se ha eliminado');
            };

            xhttp.open("GET","eliminarGanado.php?id="+id);
            xhttp.send();
        }  
    }

 
   
</script>