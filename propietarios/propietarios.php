<?php
 session_start();
 if(!isset($_SESSION ["Usuario"])){
     header ('Location: ../admin/index.php'); 
 }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ganado</title>
        <meta chasrset="utf-8"> 
        <meta name="description" content="Consultas sobre propietarios con sus reses">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/custom.css" rel="stylesheet">
        <link href="../libs/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <script src="../js/bootstrap.min.js"></script>
        <style>
    img{
      width: 100%;
    }
    body {
      background:linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(../img/llanos.jpg)  ; 
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      margin: 0;
      height: 100vh;
    }
    table, th, td{
                border: 1px dashed #F2DAC4;
                padding: 10px; text-align: center;
                background-color: #bf9b7a9b;
            }
  </style>
    </head>
    <body>

    <h1 class="text-center  text-white fw-bolder p-3"> Ganado</h1>
           
        <div class="container">
          

            <div class="row">

            <div class="col overflow-auto">
        <form action="" >
            <div class="input-group">
            <input class="form-control text-white bg-success bg-opacity-75 border-0" type="text" id="buscar" name="buscar" onkeyup="filtrarGanado()" placeholder="Buscar por nombre se socio, marca o marca/marca chapeta o marca tatuaje, categoria, color o raza...">
            <a type="submit" name="buscado" class="btn btn-primary " onclick="filtrarGanado()" >Buscar</a>
            </div>
            </form>
            <table class="table  bg-primary bg-opacity-50 text-center">
            <thead class=" text-white bg-secondary bg-opacity-50 fw-bolder ">
                <td>Propietario</td>
                <td>Marca</td>
                <td>Chapeta/Marca madre</td>
                <td>Raza Res</td>
                <td>Color</td>
                <td>Categoría</td>
                <td>Al Aumento</td>
                <td>Estado</td>
                <td>Potrero</td>
                <td>Control</td>
                
            </thead>
            <tbody id="tabla" class="text-white">
                <?php 
                include 'conexion.php';
                $sql="SELECT * FROM ganado INNER JOIN socios ON ganado.idSocio = socios.idSocio INNER JOIN potrero ON ganado.idPotrero = potrero.idPotrero WHERE estado = 'Criando'  ORDER BY nombreSocio ASC";
                $resultset = $con->query($sql);
                if($resultset->num_rows>0){
                    while($fila = $resultset->fetch_assoc()){
                        echo "<tr>
                        <td>".$fila["nombreSocio"]." ".$fila["apellidoSocio"]."</td>
                        <td>".$fila["marca"]."</td> 
                        <td>".$fila["marcaChapeta"]."</td> 
                        <td>".$fila["raza"]."</td> 
                        <td>".$fila["colorRes"]."</td> 
                        <td>".$fila["categoriaEdad"]."</td> 
                        <td>".$fila["tipoNegocio"]."</td> 
                        <td>".$fila["estado"]."</td> 
                        <td>".$fila["nombrePotrero"]."</td> 
                        <td class='text-end pe-4 ps-4'> 
                        <a class='btn btn-blue' href='controlRes.php?id=".$fila["idRes"]."' > <i class='bi bi-eye text-info'></i> </a> 
                        </td>
                        
                
                       </tr>"; 
                    }
                }
                ?>
            </tbody>
        </table>
        </div>
        </div>
    
       
        <div class="text-center">
              <div class="btn-group">
                   <a  class="btn btn-primary ms-2"  style="width:200px;" href="../ganado/tablaGanado.php" > <i class="bi bi-wrench-adjustable-circle-fill"> Administrar </i></a>
                   <a  class="btn btn-primary ms-2" style="width:200px;"  href="http://localhost/prototiposmifag/admin/gestor.php" > <i class="bi bi-box-arrow-in-left">Volver </i></a>
                </div>
            </div>
        </div>
        <script>
        function filtrarGanado(){
            var mensaje;
            var consulta = document.getElementById("buscar").value;
            const xhttp = new XMLHttpRequest();
            xhttp.onload= function(){
                document.getElementById("tabla").innerHTML = this.responseText;
            };

            xhttp.open("GET","filtrarGanado.php?consulta="+consulta);
            xhttp.send();
        }
        function ganado(){
            $(document).ready();
        }
        </script>
    </body>
</html>

