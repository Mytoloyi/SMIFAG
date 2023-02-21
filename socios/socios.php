<?php
    session_start();
    if(!isset($_SESSION ["Usuario"])){
        header ('Location: ../admin/index.php'); 
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <title> Socios </title>
    <meta charset="UTF-8">
    <meta name="description" content="Formulario para registrar socios">
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
      background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(../img/llanura2.jpg)  ; 
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
          <h1 class="text-center text-white">Registrar Socios</h1>
            <form action="agregarSocio.php" class="p-2" method="POST">
            <div class="form-floating m-4 mt-2">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="nombreSocio"
                placeholder="Nombre" name="nombreSocio" >
                <label for="nombreSocio"><i class="bi bi-person-fill"></i> Nombre del Socio:</label>
            </div>

            <div class="form-floating m-4 mt-2">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="apellidoSocio"
                placeholder="Apellido" name="apellidoSocio" >
                <label for="apellidoSocio"><i class="bi bi-person-fill"></i> Apellido del Socio:</label>
            </div>

            <div class="form-floating m-4 mt-2">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="documentoSocio"
                placeholder="No. Documento" name="documentoSocio" >
                <label for="documentoSocio"><i class="bi bi-person-fill"></i> No. documento del Socio:</label>
            </div>

            <div class="form-floating m-4 mt-2">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="telefonoSocio"
                placeholder="No. Teléfono" name="telefonoSocio" >
                <label for="telefonoSocio"><i class="bi bi-person-fill"></i> No. teléfono del Socio:</label>
            </div>

            <div class="form-floating m-4 mt-2">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="marca"
                placeholder="Marca" name="marca" >
                <label for="marca"><i class="bi bi-person-fill"></i> Marca :</label>
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