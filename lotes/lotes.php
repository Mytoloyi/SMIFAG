<?php
 session_start();
 if(!isset($_SESSION ["Usuario"])){
     header ('Location: ../admin/index.php'); 
 }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Potreros</title>
        <meta chasrset="utf-8"> 
        <meta name="description" content="Ver que animales estan en cada potrero">
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

    <h1 class="text-center text-white fw-bolder p-4 p-3"> Potreros</h1>
           
        <div class="container">
        <form action="" >
            <div class="input-group">
            <!-- <input class="form-control text-white bg-success bg-opacity-75 border-0" type="text" id="buscar" name="buscar" onkeyup="filtrarPotreros()" placeholder="Buscar por nombre de potrero...">
            <a type="submit" name="buscado" class="btn btn-primary " onclick="filtrarPotreros()" >Buscar</a> -->
            <select class="form-select bg-primary bg-opacity-50 text-white" name="buscar" id="buscar" onchange="filtrarPotreros()">
                <option hidden>Filtrar por Potrero</option>
                <?php
                    include 'conexion.php';
                    $sql="SELECT * FROM potrero WHERE estadoPotrero='Disponible' ORDER BY nombrePotrero ASC ";
                    $resultset = $con->query($sql);
                          while($fila = $resultset->fetch_assoc()){   
                            echo "<option value=".$fila['idPotrero']."> ".$fila['nombrePotrero']." </option>";
                          }
                $con->close();
                ?>
            </select>
            <select class="form-select bg-primary bg-opacity-50 text-white" name="cambiar" id="cambiar" >
                <option hidden>Potreros</option>
                <?php
                    include 'conexion.php';
                    $sql="SELECT * FROM potrero WHERE estadoPotrero='Disponible' ORDER BY nombrePotrero ASC ";
                    $resultset = $con->query($sql);
                        while($fila = $resultset->fetch_assoc()){   
                          echo "<option value=".$fila['idPotrero']."> ".$fila['nombrePotrero']." </option>";
                        }
                $con->close();
                ?>
            </select>

            <a type="button" class="btn btn-primary " onclick="cambiarPotrero()">Cambiar</a>

            </div>
            </form>
            <table id="tablas" class="table  bg-primary bg-opacity-50 text-center">
            <thead class=" text-white bg-secondary bg-opacity-50 fw-bolder ">              
                <td>Potrero</td>
                <td>Marca</td>
                <td>Chapeta/Marca madre</td>
                <td>Raza Res</td>
                <td>Color</td>
                <td>Categoría</td>
                
            </thead>
            <tbody id="tabla" class="text-white">
            <?php 
                include 'conexion.php';
                $sql="SELECT * FROM ganado INNER JOIN socios ON ganado.idSocio = socios.idSocio INNER JOIN potrero ON ganado.idPotrero = potrero.idPotrero WHERE estado = 'Criando'  ORDER BY nombreSocio ASC";
                $resultset = $con->query($sql);
                $contador = 0; // Inicializar contador
                if($resultset->num_rows>0){
                    while($fila = $resultset->fetch_assoc()){
                        echo "<tr>
                                <td>".$fila["nombrePotrero"]."</td> 
                                <td>".$fila["marca"]."</td> 
                                <td>".$fila["marcaChapeta"]."</td> 
                                <td>".$fila["raza"]."</td> 
                                <td>".$fila["colorRes"]."</td> 
                                <td>".$fila["categoriaEdad"]."</td>
                            </tr>"; 
                           $contador ++;

                    } 
                }
                ?>
            </tbody>
        </table>
        <label id="contador" class="btn btn-primary">Número de registros: <?php echo $contador; ?></label>

        <div class="text-center">
              <div class="btn-group">
                   <a  class="btn btn-primary ms-2"  style="width:200px;" href="../potreros/tablaPotreros.php" > <i class="bi bi-wrench-adjustable-circle-fill"> Administrar </i></a>
                   <a  class="btn btn-primary ms-2" style="width:200px;"  href="http://localhost/prototiposmifag/admin/gestor.php" > <i class="bi bi-box-arrow-in-left">Volver </i></a>
                </div>
            </div>
        </div>
        <script>
            function filtrarPotreros() {
                var mensaje;
                var consulta = document.getElementById("buscar").value;
                const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    document.getElementById("tabla").innerHTML = this.responseText;
                     // contar registros y actualizar label
                    var numRegistros = document.querySelectorAll('#tablas tr').length - 1; // se resta uno para no contar la fila de encabezado
                    document.getElementById("contador").innerHTML = "Número de registros: " + numRegistros;
                };
                xhttp.open("GET", "filtrarPotreros.php?consulta=" + consulta);
                xhttp.send();
            }
            function cambiarPotrero() {
                var nuevoPotrero = document.getElementById("cambiar").value;
                var consultaActual = document.getElementById("buscar").value;

                if (confirm("¿Desea mover las reses al potrero seleccionado?")) {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert(this.responseText);
                        location.reload();
                    }
                    };
                    xhttp.open("GET", "cambiarPotrero.php?actual=" + consultaActual + "&nuevo=" + nuevoPotrero, true);
                    xhttp.send();
                }
            }


</script>
    </body>
</html>

