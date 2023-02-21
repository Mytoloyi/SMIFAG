<?php
    session_start();
    if(!isset($_SESSION ["Usuario"])){
        header ('Location: ../admin/index.php'); 
    }

  
?>
<!DOCTYPE html>
<html>
    <head>
    <title> Ganado </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="listas de reses">
    <link rel="shortcut icon" href="../img/logosmifag.png" type="image/ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/custom.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <link href ="../libs/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <style>
    img{
      width: 100%;
    }
    body {
      background: url(../img/fondotabla.jpg)  ; 
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      margin: 0;
      height: 100vh;
    }
  </style>
    </head>

    <body background="" class="text-white">
        <div class="container mt-0" >
           <h1 class="text-center text-white p-4 p-3"> Ganado Registrado</h1>
             <div class="row">

            <div class="col overflow-auto">
           <form action="" >
            <div class="input-group">
            <input class="form-control text-white bg-success bg-opacity-75 border-0" type="text" id="buscar" name="buscar" onkeyup="buscarGanado()" placeholder="Buscar ganado">
            <a type="submit" name="buscado" class="btn btn-primary " onclick="buscarGanado()" >Buscar</a>
            </div>
            </form>
           <table class="table bg-primary bg-opacity-75 text-light" >
            <thead class="text-center bg-success">
                <td>Id</br></br></td>
                <td>Raza</br></br></td>
                <td>Color</br></br></td>
                <td>Categoría:</br></br></td>
                <td>Al Aumento</td>
                <td>Marca</br></br></td>
                <td>Chapeta/Marca madre</td>
                <td>Estado</br></br></td>
                <td>Precio Inicial</td>
                <td>Precio Final</td>
                <td>Potrero</br></br></td>
                <td>Control</br></br></td>
                <td></td>
                <td></td>
            </thead>
            <tbody id="tabla" class="text-center">
            <?php
                include 'registros.php';
                $conexion = new Conectar();
                $conexion->listaGanado();
               
            ?>
            </tbody>

           </table>
</div>
</div>
            <div class="text-center">
                <div class="btn-group">
                <a  class="btn btn-primary ms-2" style="width:200px;"  href="http://localhost/prototiposmifag/admin/tablas.php" > <i class="bi bi-box-arrow-in-left">Volver </i></a>
                </div>
            </div>
        </div>
        <script>
        function buscarGanado(){
            var mensaje;
            var consulta = document.getElementById("buscar").value;
            const xhttp = new XMLHttpRequest();
            xhttp.onload= function(){
                document.getElementById("tabla").innerHTML = this.responseText;
            };

            xhttp.open("GET","buscarGanado.php?consulta="+consulta);
            xhttp.send();
        }
        </script>
    </body>
</html>