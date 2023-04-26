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
    <div class="container">
        <?php 
        if(isset($_SESSION["registro"])){
            
            $registro = $_SESSION["registro"] ;
            echo '<div class="alert alert-primary alert-dismissible fade show mt-2 bg-primary  bg-opacity-75 rounded" >
           
            <button class="btn-close text-white" type="button" data-bs-dismiss="alert"></button>
            <label class="text-white"><i class="bi bi-exclamation-triangle"></i> '.$registro.'</label>
            </div>';
            unset($_SESSION["registro"]);
        }
        if(isset($_SESSION["Error"])){
         
            $Error = $_SESSION["Error"] ;
            echo '<div class="alert alert-primary alert-dismissible fade show mt-5 bg-primary  bg-opacity-75 rounded" >
           
            <button class="btn-close text-white" type="button" data-bs-dismiss="alert"></button>
            <label class="text-white"><i class="bi bi-exclamation-triangle"></i> '.$Error.'</label>
            </div>';
            unset($_SESSION["Error"]);
        }
        
        ?>
        </div>
        <div class="container bg-success  bg-opacity-75 rounded">
          <h1 class="text-center text-white">Registrar Socios</h1>
            <form action="agregarSocio.php" class="p-2" method="POST" id="miFormulario">
                <!--inicio del row  -->
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="nombreSocio"
                            placeholder="Nombre" name="nombreSocio" maxlength="25">
                            <label for="nombreSocio"><i class="bi bi-person-fill"></i> Nombre del Socio:</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="apellidoSocio"
                            placeholder="Apellido" name="apellidoSocio" maxlength="25">
                            <label for="apellidoSocio"><i class="bi bi-person-fill"></i> Apellido del Socio:</label>
                        </div>
                        <div class="input-group mb-4 mt-2 ">
                            <span class="input-group-text bg-primary bg-opacity-75 text-white"><i class="bi bi--fill"></i>Tipo de documento:</span>
                                <select class="form-select bg-primary bg-opacity-50 text-white" name="tipoDocumento" id="tipoDocumento">
                                    <option hidden disabled selected>...</option>
                                    <option >CC</option>
                                    <option >CE</option>
                                </select>
                        </div>            
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="documentoSocio"
                            placeholder="No. Documento" name="documentoSocio" maxlength="12">
                            <label for="documentoSocio"><i class="bi bi-person-fill"></i> No. documento del Socio:</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="telefonoSocio"
                            placeholder="No. Teléfono" name="telefonoSocio" maxlength="12">
                            <label for="telefonoSocio"><i class="bi bi-person-fill"></i> No. teléfono del Socio:</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="marca"
                            placeholder="Marca" name="marca" maxlength="4">
                            <label for="marca"><i class="bi bi-person-fill"></i> Marca :</label>
                        </div>
                    </div>
                </div>
    <!-- fin del row -->
            <div class="row">
                <div class="col-2 justify-content-center ">
                    <button class="btn btn-primary me-2 "  id="limpiarCampos" type="button"><i class="bi bi-"> Limpiar</i></button>
                </div>
                <div class="col">
                    <div class=" ps-4 pe-4 d-grid">
                        <div class="btn-group">
                            <button   class="btn btn-primary me-2" type="submit">Registrar</button>
                            <a   class="btn btn-primary ms-2" type="button" href="http://localhost/prototiposmifag/admin/tablas.php">Regresar</a>
                        </div>
                    </div>
                </div>
             </div> 
            </form>
        </div>
        <script src="limpiar.js" ></script>
        <script src="../admin/controller/goback.js" ></script>
        <script src="alertas.js" ></script>
    </body>
    

</html>