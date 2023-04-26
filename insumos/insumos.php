<?php
session_start();
if(!isset($_SESSION ["Usuario"])){
    header ('Location: ../admin/index.php'); 
}
?>

<!DOCTYPE html>
<html>
    <head>
    <title> Insumos </title>
    <meta charset="UTF-8">
    <meta name="description" content="Formulario para registrar insumos">
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
            echo '<div class="alert alert-primary alert-dismissible fade show mt-5 bg-primary  bg-opacity-75 rounded" >
           
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
            <h1 class="text-center text-white">Registro de Insumos</h1>
            <form action="agregarInsumo.php" class="p-2" method="POST" id="miFormulario">
            <div class="form-floating mb-4">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="nombreInsumo"
                placeholder="Nombre" name="nombreInsumo" maxlength="20">
                <label for="nombreInsumo"><i class="bi bi"></i> Nombre del Insumo:</label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="cantidadInsumo"
                placeholder="Cantidad" name="cantidadInsumo" maxlength="3">
                <label for="cantidadInsumo"><i class="bi bi"></i> Cantidad:</label>
            </div>

            <div class="form-floating mb-4">
                <input type="date" class="form-control bg-primary bg-opacity-50 text-white" id="fechavencimiento"
                placeholder="Fecha" name="fechavencimiento" min="<?php echo date('Y-m-d'); ?>">
                <label for="fechavencimiento"><i class="bi bi"></i> Fecha de vencimiento:</label>
            </div>
            <div class="form-floating mb-4">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="valorUnidad"
                placeholder="Valor" name="valorUnidad" maxlength="7">
                <label for="valorUnidad"><i class="bi bi"></i> Valor Unidad:</label>
            </div>
            <div class="form-floating mb-4">
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="novedades"
                placeholder="Cantidad" name="novedades" maxlength="300">
                <label for="novedades"><i class="bi bi"></i> Novedades:</label>
            </div>


         

           
             
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
        <script src="../admin/controller/goback.js" ></script>
        <script src="limpiar.js" ></script>
    </body>
   

</html>