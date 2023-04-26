<?php
    session_start();
    if(!isset($_SESSION ["Usuario"])){
        header ('Location: ../admin/index.php'); 
    }

  
?>
<!DOCTYPE html>
<html>
    <head>
    <title> Potreros </title>
    <meta charset="UTF-8">
    <meta name="description" content="Lista de potreros">
    <link rel="shortcut icon" href="../img/logosmifag.png" type="image/ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/custom.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <link href ="../libs/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="../js/DataTables-1.13.4/css/jquery.dataTables.min.css"><!-- nuevo: agregar id a la etiqueta tabla -->
    <script src="../js/jquery-3.6.1.min.js"></script><!-- nuevo -->
    <script src="../js/datatables.min.js"></script><!-- nuevo -->
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
           <h1 class="text-center text-white p-4 p-3"> Lista de Potreros</h1>
           <!-- <form action="" >
            <div class="input-group">
            <input class="form-control text-white bg-success bg-opacity-75 border-0" type="text" id="buscar" name="buscar" onkeyup="buscarPotreros()" placeholder="Buscar potrero">
            <a type="submit" name="buscado" class="btn btn-primary " onclick="buscarPotreros()" >Buscar</a>
            </div>
            </form> -->
            <div class="row">
                <div class="col overflow-auto">    
                    <table class="table bg-primary bg-opacity-75 text-light" id="tabla-potreros">
                        <thead class="text-center bg-success">
                            <td>Id</td>
                            <td>Nombre</td>
                            <td>Estado</td>
                            <td>Medida</td>
                            <td></td>
                            <td></td>
                        </thead>
                        <tbody id="tabla" class="text-center">
                        <?php
                            include 'registros.php';
                            $conexion = new Conectar();
                            $conexion->listaPotreros();
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
        <script src="../admin/controller/goback.js"></script>
        <script>
             $(document).ready(function() {
            $('#tabla-potreros').DataTable({
                paging: true,
                ordering: true,
                info: true,
                language:{
                    "decimal":        "",
                    "emptyTable":     "No hay datos en la tabla",
                    "info":           "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty":      "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered":   "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Filtrar _MENU_",
                    "loadingRecords": "Cargando...",
                    "processing":     "",
                    "search":         "Buscar: ",
                    "zeroRecords":    "No se han encontrado resultados",
                    "paginate": {
                        "first":      "Primero",
                        "last":       "Ultimo",
                        "next":       "",
                        "previous":   ""
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                }, 
                "lengthMenu":[5, 10, 20 ]
                
            });
        });
        // function buscarPotreros(){
            // var mensaje;
            // var consulta = document.getElementById("buscar").value;
            // const xhttp = new XMLHttpRequest();
            // xhttp.onload= function(){
            //     document.getElementById("tabla").innerHTML = this.responseText;
            // };

            // xhttp.open("GET","buscarPotreros.php?consulta="+consulta);
            // xhttp.send();
        // }
        </script>
    </body>
</html>