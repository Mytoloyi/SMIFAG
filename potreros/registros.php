<?php
    class Conectar{
        private $servidor;
        private $user;
        private $password;
        private $status=0;
       
        //LISTAR POTREROS
        function listaPotreros(){
            $servidor="localhost";
            $user="root";
            $password="";
            $database="finca_ganadera";
            $con= new mysqli($servidor,$user,$password,$database);
            $sql="SELECT * FROM potrero ORDER BY nombrePotrero ASC";
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
            
        }


    }
?>


<script>
    //POTREROS
    function listaPotreros(id){
        var mensaje;
   
        if(confirm("¿Desea eliminar el registro?")){
            const xhttp = new XMLHttpRequest();
            xhttp.onload= function(){
                document.getElementById("tabla").innerHTML = this.responseText;
                alert('Se ha eliminado');
            };

            xhttp.open("GET","eliminarPotreros.php?id="+id);
            xhttp.send();
        }  
    }

</script>