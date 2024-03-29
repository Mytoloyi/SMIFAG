<?php
    class Conectar{
        private $servidor;
        private $user;
        private $password;
        private $status=0;
        //LISTAR EMPLEADOS
        function listaEmpleados(){
            $servidor="localhost";
            $user="root";
            $password="";
            $database="finca_ganadera";
            $con= new mysqli($servidor,$user,$password,$database);
            $sql="SELECT * FROM empleados INNER JOIN car ON empleados.idCargo = car.idCargo ORDER BY nombreEmpleado ASC LIMIT 10";
            $resultset = $con->query($sql);
            
                while($fila = $resultset->fetch_assoc()){
                    echo "<tr>
                    <td>".$fila["idEmpledo"]."</td>
                    <td>".$fila["nombreEmpleado"]."</td>
                    <td>".$fila["apellidoEmpleado"]."</td>
                    <td>".$fila["tipoDocumento"]." ".$fila["documentoEmpleado"]."</td> 
                    <td>".$fila["telefonoEmpleado"]."</td> 
                    <td>".$fila["cargo"]."</td> 
                    <td>".$fila["tipodeContrato"]."</td>
                    <td>".$fila["nomina"]."</td>  
                    <td class='text-end pe-4 ps-4'> 
                    <a class='btn btn-success' href='editarEmpleados.php?id=".$fila["idEmpledo"]."' > <i class='bi bi-pencil'></i> </a> 
                    </td><td class='text-end pe-4 ps-4'> 
                        <button class='btn btn-danger' onclick='listaEmpleados(this.value)' value='".$fila["idEmpledo"]."'> <i class='bi bi-trash'></i></button> 
                    </td></tr>"; 
                }
            }
            
        }

       
    
?>


<script>
    function listaEmpleados(id){
        var mensaje;
   
        if(confirm("¿Desea eliminar el registro?")){
            const xhttp = new XMLHttpRequest();
            xhttp.onload= function(){
                if (this.responseText === "No se puede eliminar el empleado porque está siendo utilizado en la agenda.") {
                    alert(this.responseText);
                } else {
                    document.getElementById("tabla").innerHTML = this.responseText;
                    alert('Se ha eliminado');
                }
            };

            xhttp.open("GET","eliminarEmpleados.php?id="+id);
            xhttp.send();
        }  
    }
</script>
