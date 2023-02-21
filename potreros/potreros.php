
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
    <meta name="description" content="Formulario para registrar potreros">
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
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(../img/llanura2.jpg)  ; 
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
            <form action="agregarPotrero.php" class="p-2" method="POST">
            <div class="form-floating m-4 mt-2">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="nombrePotrero"
                placeholder="Nombre" name="nombrePotrero" >
                <label for="nombrePotrero"><i class="bi bi"></i> Nombre del Potrero:</label>
            </div>

            <div class="form-floating m-4 mt-2">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="estadoPotrero"
                placeholder="estadoPotrero" name="estadoPotrero" >
                <label for="estadoPotrero"><i class="bi bi"></i> Estado:</label>
            </div>

            <div class="form-floating m-4 mt-2">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="medida"
                placeholder="medida" name="medida" >
                <label for="medida"><i class="bi bi"></i> Medida:</label>
            </div>
         

           
            <div class=" ps-4 pe-4 d-grid">
                <div class="btn-group">
                <button  class="btn btn-primary me-2" type="submit">Registrar</button>
                <a  href="http://localhost/prototiposmifag/admin/tablas.php" class="btn btn-primary ms-2" type="button" >Regresar</a>
            </div>
            </div>
            </form>
        </div>
        <script src="../admin/controller/goback.js" ></script>
    </body>
    

</html>