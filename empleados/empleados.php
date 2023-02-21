<?php
    session_start();
    if(!isset($_SESSION ["Usuario"])){
        header ('Location: ../admin/index.php'); 
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <title> Empleados </title>
    <meta charset="UTF-8">
    <meta name="description" content="Formulario para registrar empleados">
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
    <body>
        <br>
        <div class="container bg-success  bg-opacity-75 rounded" >
        <h1 class="text-center text-white ">Registro de Empleados</h1>
            <form action="agregarEmpleado.php" class="p-2 "  method="POST">
            <div class="form-floating mb-4 mt-2">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="nombreEmpleado"
                placeholder="Nombre" name="nombreEmpleado" >
                <label for="nombreEmpleado" class="text-white"><i class="bi bi-person-fill"></i> Nombre del Empleado:</label>
            </div>

            <div class="form-floating  mb-4 ">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="apellidoEmpleado"
                placeholder="Apellido" name="apellidoEmpleado" >
                <label for="apellidoEmpleado"class="text-white"><i class="bi bi-person-fill"></i> Apellido del Empleado:</label>
            </div>

            <div class="form-floating mb-4 ">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="documentoEmpleado"
                placeholder="No. Documento" name="documentoEmpleado" >
                <label for="documentoEmpleado" class="text-white"><i class="bi bi-person-fill"></i> No. documento del Empleado:</label>
            </div>

            <div class="form-floating mb-4 ">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="telefonoEmpleado"
                placeholder="No. Teléfono" name="telefonoEmpleado" >
                <label for="telefonoEmpleado" class="text-white"><i class="bi bi-person-fill"></i> No. teléfono del Empleado:</label>
            </div>

            <div class="form-floating mb-4 ">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="rangoEmpleado"
                placeholder="Rango del Empleado" name="rangoEmpleado" >
                <label for="rangoEmpleado" class="text-white"><i class="bi bi-person-fill"></i> Cargo del Empleado:</label>
            </div>

            <div class="form-floating mb-4 ">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="tipodeContrato"
                placeholder="Tipo de Contrato" name="tipodeContrato" >
                <label for="tipodeContrato" class="text-white"><i class="bi bi-person-fill"></i> Tipo de Contrato:</label>
            </div>

            <div class="form-floating mb-4 ">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="nomina"
                placeholder="Sueldo" name="nomina" >
                <label for="nomina" class="text-white"><i class="bi bi-person-fill"></i> Sueldo:</label>
            </div>
            
            <div class=" ps-4 pe-4 d-grid">
                <div class="btn-group">
                <button  onclick="recargar()" class="btn btn-primary me-2" type="submit">Registrar</button>
                <a   class="btn btn-primary ms-2" type="button" href="http://localhost/prototiposmifag/admin/tablas.php">Regresar</a>
            </div>
            </div>
            
           
            
            </form>
        </div>
        <script src="../admin/controller/goback.js" ></script>

    </body>
</html>