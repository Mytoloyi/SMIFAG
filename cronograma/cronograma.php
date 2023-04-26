<?php
 session_start();
 if(!isset($_SESSION ["Usuario"])){
     header ('Location: ../admin/index.php'); 
 }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Agenda</title>
        <meta chasrset="utf-8"> 
        <meta name="description" content="Cronograma de actividades">
        <link rel="shortcut icon" href="../img/logosmifag.png" type="image/ico">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/custom.css" rel="stylesheet">
        <link href="../libs/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <script src="../js/bootstrap.min.js"></script>
        <style>
    img{
      width: 100%;
    }
    body {
      background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(../img/llanos.jpg)  ; 
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

    <h1 class="text-center  text-white fw-bolder p-4 p-3"> Agenda</h1>
           
        <div class="container">
        <form action="" >
            <div class="input-group">
            <input class="form-control text-white bg-success bg-opacity-75 border-0" type="text" id="buscar" name="buscar" onkeyup="filtrarActividades()" placeholder="Buscar actividad, empleado asignado o fecha...">
            <a type="submit" name="buscado" class="btn btn-primary " onclick="filtrarActividades()" >Buscar</a>
            </div>
            </form>
            <table class="table  bg-primary bg-opacity-50 text-center">
            <thead class=" text-white bg-secondary bg-opacity-50 fw-bolder "> 
                <th>Fecha</th>
                <th>Actividad</th>
                <th>Empleado asignado</th>
            </thead>
            <tbody id="tabla" class="text-white">
               <?php
               include '../conexion/conexion.php';
               $con = new Conexion();
               $conexion = $con->conectarDB();
                $sql="SELECT * FROM agenda INNER JOIN empleados ON agenda.idEmpledo = empleados.idEmpledo  INNER JOIN actividades ON agenda.idAct = actividades.idAct ORDER BY fecha ASC LIMIT 10";
                $resultset = $conexion->query($sql);
                
                    while($fila = $resultset->fetch_assoc()){
                        echo "<tr>
                        <td>".$fila["fecha"]."</td> 
                        <td>".$fila["nombreActividad"].": ".$fila["descripcion"]."</td>
                        <td>".$fila["nombreEmpleado"]." ".$fila["apellidoEmpleado"]."</td> 
                       </tr>"; 
                    }
                
               
               ?>
            </tbody>
        </table>
        
        <div class="row text-center">
            <div class="col">
                  <div class="btn-group">
                   <a  class="btn btn-primary ms-2"  style="" href="exportar.php" > <i class="bi bi-download">  </i></a>
                   <a  class="btn btn-primary ms-2"  style="width:200px;" href="../agenda/tablaAgenda.php" > <i class="bi bi-wrench-adjustable-circle-fill"> Administrar </i></a>
                   <a  class="btn btn-primary ms-2"  style="width:200px;" href="http://localhost/prototiposmifag/admin/gestor.php" > <i class="bi bi-box-arrow-in-left"> Volver </i></a>
                </div>
            </div>
            

            </div>
        </div>
        <script>
        function filtrarActividades(){
            var mensaje;
            var consulta = document.getElementById("buscar").value;
            const xhttp = new XMLHttpRequest();
            xhttp.onload= function(){
                document.getElementById("tabla").innerHTML = this.responseText;
            };

            xhttp.open("GET","filtrarActividades.php?consulta="+consulta);
            xhttp.send();
        }
        </script>
    </body>
</html>

