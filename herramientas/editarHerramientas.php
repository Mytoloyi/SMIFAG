
<?php
session_start();
if(!isset($_SESSION ["Usuario"])){
    header ('Location: ../admin/index.php'); 
}
  include 'conexion.php';
  

  $id= $_GET['id'];
  $sql="SELECT * FROM herramientas WHERE idHerramienta='$id'";
  $modificar= $con->query($sql);
  $dato= $modificar->fetch_array();

  if(isset($_POST['modificar'])){
      $id= $_POST['id'];
      $nombre= $con->real_escape_string($_POST['nombreHerramienta']);
      $cantidad=$con->real_escape_string($_POST['cantidadHerramienta']);
     
      


      $actualiza="UPDATE herramientas SET nombreHerramienta='$nombre', cantidad='$cantidad' WHERE idHerramienta='$id'";
      
      $actualizar= $con->query($actualiza);
      header("location: tablaHerramientas.php");
  }


?>
<!DOCTYPE html>
<html>
    <head>
    <title> Herramientas </title>
    <meta charset="UTF-8">
    <meta name="description" content="Formulario para modificar herramientas">
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
      background:  linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(../img/llanura2.jpg)  ; 
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      margin: 0;
      height: 100vh;
    }
  </style>
    </head>
    <br>
    <body class}="text-white">
        <div class="container bg-success  bg-opacity-75 rounded">
          <h1 class="text-center text-white">Registro de Herramientas</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" class="p-2" method="POST">
            <input type="hidden" name="id" id="id" value="<?php echo $dato['idHerramienta'];?>">
            <div class="form-floating m-4 mt-2">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="nombreHerramienta"
                placeholder="Nombre" name="nombreHerramienta" value="<?php echo $dato['nombreHerramienta'];?>">
                <label for="nombreHerramienta" class="text-white"><i class="bi bi"></i> Nombre de la Herramienta:</label>
            </div>

            <div class="form-floating m-4 mt-2">
                <input type="number" class="form-control bg-primary bg-opacity-50 text-white" id="cantidadHerramienta"
                placeholder="Cantidad" name="cantidadHerramienta" value="<?php echo $dato['cantidad'];?>">
                <label for="cantidadHerramienta" class="text-white"><i class="bi bi"></i> Cantidad:</label>
            </div>
         

           
            <div class=" ps-4 pe-4 d-grid">
                <div class="btn-group">
                <button  name="modificar" id="modificar" class="btn btn-primary me-2" type="submit">Modificar</button>
                <a   class="btn btn-primary ms-2" type="button" href="http://localhost/prototiposmifag/herramientas/tablaHerramientas.php">Regresar</a>
            </div>
            </div>
            </form>
        </div>
        <script src="../admin/controller/goback.js" ></script>

    </body>
</html>