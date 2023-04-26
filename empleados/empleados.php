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
        <br>
        <div class="container bg-success  bg-opacity-75 rounded" >
            <h1 class="text-center text-white ">Registro de Empleados</h1>
                <form action="agregarEmpleado.php" class="p-2 "  method="POST" id="miFormulario">
            <!--Inicio -->
                <div class="row">
                        <div class="col">
                            <div class="form-floating mb-4 ">
                                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="nombreEmpleado"
                                placeholder="Nombre" name="nombreEmpleado" maxlength="25">
                                <label for="nombreEmpleado" class="text-white"><i class="bi bi-person-fill"></i> Nombre del Empleado:</label>
                            </div>

                            <div class="form-floating  mb-4 ">
                                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="apellidoEmpleado"
                                placeholder="Apellido" name="apellidoEmpleado" maxlength="25">
                                <label for="apellidoEmpleado"class="text-white"><i class="bi bi-person-fill"></i> Apellido del Empleado:</label>
                            </div>

                            <div class="form-floating mb-4 ">
                                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="documentoEmpleado"
                                placeholder="No. Documento" name="documentoEmpleado" maxlength="12">
                                <label for="documentoEmpleado" class="text-white"><i class="bi bi-person-fill"></i> No. documento del Empleado:</label>
                            </div>
                            <div class="form-floating mb-4 mt-4">
                                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="nomina"
                                placeholder="Sueldo" name="nomina" maxlength="8">
                                <label for="nomina" class="text-white"><i class="bi bi-person-fill"></i> Sueldo:</label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-floating mb-4 ">
                                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="telefonoEmpleado"
                                placeholder="No. Teléfono" name="telefonoEmpleado" maxlength="12">
                                <label for="telefonoEmpleado" class="text-white"><i class="bi bi-person-fill"></i> No. teléfono del Empleado:</label>
                            </div>
                            <div class="input-group  mt-4 mb-4">
                                <span class="input-group-text bg-primary bg-opacity-75 text-white"><i class="bi bi--fill"></i>Tipo de Contrato:</span>
                                <select class="form-select bg-primary bg-opacity-50 text-white" name="tipodeContrato" id="tipodeContrato">
                                        <option hidden disabled selected>...</option>
                                        <option >Definido</option>
                                        <option >Indefinido</option>
                                </select>
                            </div>
                            <div class="input-group  mt-4 mb-4">
                            </div>
                            <div class="input-group mb-4 mt-2">
                                <span class="input-group-text bg-primary bg-opacity-75 text-white"><i class="bi bi--fill"></i>Tipo de documento:</span>
                                <select class="form-select bg-primary bg-opacity-50 text-white" name="tipoDocumento" id="tipoDocumento">
                                        <option hidden disabled selected>...</option>
                                        <option >CC</option>
                                        <option >CE</option>
                                </select>
                            </div>
                            <div class="input-group  mt-4 mb-4">
                            </div>
                            <div class="input-group mb-4 mt-4">
                                <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi-fill"></i>Cargo:</span>
                                <select class="form-select bg-primary bg-opacity-50 text-white" name="cargo" id="cargo">
                                    <option hidden>...</option>
                                        <?php
                                        include 'conexion.php';
                                        $conectar = new Conexion();
                                        $conec = $conectar -> conectarDB();
                                            $sql="SELECT * FROM car ORDER BY cargo ASC ";
                                            $resultset = $conec->query($sql);
                                                while($fila = $resultset->fetch_assoc()){   
                                                    echo "<option value=".$fila['idCargo']."> ".$fila['cargo']." </option>";
                                                }
                                        ?>
                                </select>
                            </div>     
                        </div>
    <!--Fin row-->  </div>            
                <div class="row">
                    <div class="col-2 justify-content-center">
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
        <script src="limpiar.js"></script>
        <script src="../admin/controller/goback.js" ></script>
        <script src="alertas.js"></script>
           
        

    </body>
</html>