
<?php
session_start();
if(!isset($_SESSION ["Usuario"])){
    header ('Location: ../admin/index.php'); 
}
  include 'conexion.php';
  

  $id= $_GET['id'];
  $sql="SELECT * FROM potrero WHERE idPotrero='$id'";
  $modificar= $con->query($sql);
  $dato= $modificar->fetch_array();

  if(isset($_POST['modificar'])){
      $id= $_POST['id'];
      $nombre= $con->real_escape_string($_POST['nombrePotrero']);
      $estado=$con->real_escape_string($_POST['estadoPotrero']);
      $medida=$con->real_escape_string($_POST['medida']);
      


      $actualiza="UPDATE potrero SET nombrePotrero='$nombre', estadoPotrero='$estado', medida='$medida' WHERE idPotrero='$id'";
      
      $actualizar= $con->query($actualiza);
      header("location: tablaPotreros.php");
  }


?>
<!DOCTYPE html>
<html>
    <head>
    <title> Potreros </title>
    <meta charset="UTF-8">
    <meta name="description" content="Formulario para modificar potreros">
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
      background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(../img/llanura2.jpg)  ; 
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      margin: 0;
      height: 100vh;
    }
  </style>
    </head>
    <br>
    <body class="text-white">
        <div class="container bg-success  bg-opacity-75 rounded">    
            <h1 class="text-center text-white">Registro de Potreros</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" class="p-2" method="POST">
            <div class="form-floating m-4 mt-2">
            <input type="hidden" name="id" id="id" value="<?php echo $dato['idPotrero'];?>">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="nombrePotrero"
                placeholder="Nombre" name="nombrePotrero" value="<?php echo $dato['nombrePotrero'];?>" maxlength="10">
                <label for="nombrePotrero"><i class="bi bi"></i> Nombre del Potrero:</label>
            </div>

            <div class="input-group mb-4 mt-2 ms-4 pe-5">
                <span class="input-group-text bg-primary bg-opacity-75 text-white"><i class="bi bi--fill"></i>Estado:</span>
                <select class="form-select bg-primary bg-opacity-50 text-white" name="estadoPotrero" id="estadoPotrero">
                    <option ><?php echo $dato['estadoPotrero'];?></option>
                    <option >Disponible</option>
                    <option >Lleno</option>
                    <option >En mantenimiento</option>
                </select>
            </div>

            <div class="form-floating m-4 mt-2">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="medida"
                placeholder="medida" name="medida" value="<?php echo $dato['medida'];?>" maxlength="12">
                <label for="medida"><i class="bi bi"></i> Medida:</label>
            </div>
         

           
            <div class=" ps-4 pe-4 d-grid">
                <div class="btn-group">
                <button  name="modificar" id="modificar" class="btn btn-primary me-2" type="submit">Modificar</button>
                <a   class="btn btn-primary ms-2" type="button" href="http://localhost/prototiposmifag/potreros/tablaPotreros.php">Regresar</a>
            </div>
            </div>
            </form>
        </div>
        <script src="../admin/controller/goback.js" ></script>
        <script src="alertas.js" ></script>

    </body>
</html>