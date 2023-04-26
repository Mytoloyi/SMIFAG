<?php
    session_start();
    if(!isset($_SESSION ["Usuario"])){
        header ('Location: ../admin/index.php'); 
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <title> Agenda </title>
    <meta charset="UTF-8">
    <meta name="description" content="Formulario para registrar actividades">
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
      background:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url(../img/llanura2.jpg)  ; 
      background-size: cover;
      margin: 0;
      height: 100vh;
    }
  </style>
    </head>

    <body class="text-primary">
    <br>
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
        <div class="container bg-success  bg-opacity-75 rounded ">
        <h1 class="text-center text-white">Registro de actividades</h1>
            <form action="agregarActividad.php" class="p-2"  method="POST" id="miFormulario">
            <div class="input-group mb-4 ">
            <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi-person-fill"></i>Actividad:&nbsp;</span>
            <select class="form-select bg-primary bg-opacity-50 text-white" name="nombreActividad" id="nombreActividad">
                  
                  <?php
                    include 'conexion.php';
                    $sql="SELECT * FROM actividades ORDER BY nombreActividad ASC";
                    $resultset = $con->query($sql);
                        while($fila = $resultset->fetch_assoc()){
                          echo "<option value=".$fila['idAct'].">".$fila['nombreActividad'].": ".$fila['descripcion']."</option>";
                        }
                   ?>
              
              </select>
            </div>

          
                
                <div class="form-floating mb-4">
                <input type="date" class="form-control bg-primary bg-opacity-50 text-white" id="fecha"
                placeholder="Fecha" name="fecha" min="<?php echo date('Y-m-d'); ?>">
                <label for="fecha" class="text-white"> Fecha: </label>
            </div>
               
                
            <div class="input-group mb-4 ">
            <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi-person-fill"></i>Empleado:&nbsp;</span>
             <select class="form-select bg-primary bg-opacity-50 text-white" name="idEmpledo" id="idEmpledo">
             <option value="" >...</option> 
                    <?php
                      $sql="SELECT * FROM empleados ORDER BY nombreEmpleado ASC";
                      $resultset = $con->query($sql);
                          while($fila = $resultset->fetch_assoc()){
                            echo "<option value=".$fila['idEmpledo']."> ".$fila['nombreEmpleado']." ".$fila['apellidoEmpleado']." </option>";
                          }
                     ?>
                
                </select>
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