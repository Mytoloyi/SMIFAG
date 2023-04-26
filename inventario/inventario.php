<?php
 session_start();
 if(!isset($_SESSION ["Usuario"])){
     header ('Location: ../admin/index.php'); 
 }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inventario</title>
        <meta chasrset="utf-8"> 
        <meta name="description" content="Inventario que hay en la finca">
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
        <div class="container">
            <h1 class="text-center text-white fw-bolder p-3">
                Inventario
            </h1>
            <div class="row">
                <!-- Tabla Insumos -->
                <div class="col">
                <form action="" >
                    <div class="input-group">
                    <input class="form-control text-white bg-success bg-opacity-75 border-0" type="text" id="buscarInsumo" name="buscarInsumo" onkeyup="filtrarInsumos()" placeholder="Buscar insumo...">
                    <a type="submit" name="buscado" class="btn btn-primary " onclick="filtrarInsumos()" >Buscar</a>
                    </div>
                    </form>
                    
                <table class="table  bg-primary bg-opacity-50 text-center">
                         <thead class=" text-white bg-secondary bg-opacity-50 fw-bolder ">
                            <td>Nombre</td>
                            <td>Candidad</td>
                            <td>Fecha de Caducidad</td>
                         </thead>
                        <tbody id="tablaInsumos" class="text-white">
                        <?php
                            include '../conexion/conexion.php';
                            $conexion = new Conexion();
                            $con = $conexion->conectarDB();

                             $sql="SELECT * FROM insumos ORDER BY nombreInsumo ASC";
                             $resultset = $con->query($sql);
                             if($resultset->num_rows>0){
                                 while($fila = $resultset->fetch_assoc()){
                                     
                                     echo "<tr>
                                     <td>".$fila["nombreInsumo"]."</td> 
                                     <td>".$fila["cantidadInsumo"]."</td>
                                     <td>".$fila["fechavencimiento"]."</td> 
                                     </tr>"; 
                                 }
                             }
                            ?>
                        </tbody>
                </table>
                </div>
                
                <!-- Tabla Herramientas -->
                <div class="col">
                <form action="" >
                    <div class="input-group">
                    <input class="form-control text-white bg-success bg-opacity-75 border-0" type="text" id="buscarHerramientas" name="buscarHerramientas" onkeyup="filtrarHerramientas()" placeholder="Buscar herramientas...">
                    <a type="submit" name="buscado" class="btn btn-primary " onclick="filtrarHerramientas()" >Buscar</a>
                    </div>
                </form>
                <table class="table  bg-primary bg-opacity-50 text-center">
                         <thead class=" text-white bg-secondary bg-opacity-50 fw-bolder ">
                            <td>Nombre</td>
                            <td>Cantidad</td>
                        </thead>
                        <tbody id="tablaHerramienta" class="text-white">
                            <?php
                             $sql="SELECT * FROM herramientas ORDER BY nombreHerramienta ASC";
                             $resultset = $con->query($sql);
                             if($resultset->num_rows>0){
                                 while($fila = $resultset->fetch_assoc()){
                                     echo "<tr>
                                     <td>".$fila["nombreHerramienta"]."</td> 
                                     <td>".$fila["cantidad"]."</td>
                                    </tr>"; 
                                 }
                             }
                            ?>

                        </tbody>
                        
                    </table>
                 
                </div>
            </div>
           
            <div class="text-center">
                   <a  class="btn btn-primary ms-2"  style="width:200px;" href="../insumos/tablaInsumos.php" > <i class="bi bi-wrench-adjustable-circle-fill"> Insumos </i></a>
                   <a  class="btn btn-primary ms-2"  style="width:200px;" href="../herramientas/tablaHerramientas.php" > <i class="bi bi-wrench-adjustable-circle-fill"> Herramientas </i></a>
                   <a  class="btn btn-primary ms-2" style="width:200px;"  href="http://localhost/prototiposmifag/admin/gestor.php" > <i class="bi bi-box-arrow-in-left">Volver </i></a>
                </div>

        </div> 
        
             
            

        <script>
            function filtrarInsumos(){
            var mensaje;
            var consulta = document.getElementById("buscarInsumo").value;
            const xhttp = new XMLHttpRequest();
            xhttp.onload= function(){
                document.getElementById("tablaInsumos").innerHTML = this.responseText;
            };

            xhttp.open("GET","filtrarInsumos.php?consulta="+consulta);
            xhttp.send();
            }
            function filtrarHerramientas(){
            var mensaje;
            var consulta = document.getElementById("buscarHerramientas").value;
            const xhttp = new XMLHttpRequest();
            xhttp.onload= function(){
                document.getElementById("tablaHerramienta").innerHTML = this.responseText;
            };

            xhttp.open("GET","filtrarHerramientas.php?consulta="+consulta);
            xhttp.send();
            }

        </script>
    </body>
</html>
