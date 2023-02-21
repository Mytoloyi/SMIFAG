<?php
    session_start();
    if(!isset($_SESSION ["Usuario"])){
        header ('Location: ../admin/index.php'); 
    }

   
?>
<!DOCTYPE html>
<html>
    <head>
    <title> Actividades </title>
    <meta charset="UTF-8">
    <meta name="description" content="lista de actividades">
    <link rel="shortcut icon" href="../img/logosmifag.png" type="image/ico">

    <link rel="shortcut icon" href="../img/logosmifag.png" type="image/ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
           <h1 class="text-center text-white p-4 p-3"> Actividades</h1>
           <form action="addAct.php" method="POST">
            <div class="input-group">
            <input class="form-control text-white bg-success bg-opacity-75 border-0" type="text" id="nombreActividad" name="nombreActividad"  placeholder="Agregue una actividad">
            <input class="form-control text-white bg-success bg-opacity-75 border-0" type="text" id="descripcion" name="descripcion"  placeholder="Descripción">
            <button   class="btn btn-primary me-2" type="submit">Añadir</button>

            </div>
            </form>
           <table class="table bg-primary bg-opacity-75 text-light" >
           <thead class="text-center bg-success">
                <td>Id</td>
                <td>Actividad</td>
                <td>Descripción</td>
                <td></td>
            </thead>
            <tbody id="tabla" class="text-center">
            <?php
                include 'conexion.php';
                $sql="SELECT * FROM actividades ORDER BY nombreActividad ASC ";
                $resultset = $con->query($sql);
                if($resultset->num_rows>0){
                    while($fila = $resultset->fetch_assoc()){
                        
                        echo "<tr>
                        <td>".$fila["idAct"]."</td>
                        <td>".$fila["nombreActividad"]."</td> 
                        <td>".$fila["descripcion"]."</td> 
                        <td class='text-end pe-4 ps-4'> 
                            <button class='btn btn-danger' onclick='listaActividad(this.value)' value='".$fila["idAct"]."'> <i class='bi bi-trash'></i> </button> 
                        </td></tr>"; 
                    }
                }
            ?>
           </table>
           </tbody>
            <div class="text-center">
                <div class="btn-group">
                <a  class="btn btn-primary ms-2" style="width:200px;" href="http://localhost/prototiposmifag/admin/tablas.php" > <i class="bi bi-box-arrow-in-left">Volver </i></a>
                </div>
            </div>
        </div>
        <script>
        function listaActividad(id){
        var mensaje;
   
        if(confirm("¿Desea eliminar el registro?")){
            const xhttp = new XMLHttpRequest();
            xhttp.onload= function(){
                document.getElementById("tabla").innerHTML = this.responseText;
                alert('Se ha eliminado');
            };

            xhttp.open("GET","borrarActividad.php?id="+id);
            xhttp.send();
        }  
    }
        </script>
    </body>
</html>