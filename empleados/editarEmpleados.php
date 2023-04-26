
<?php
session_start();
if(!isset($_SESSION ["Usuario"])){
    header ('Location: ../admin/index.php'); 
}
    include 'conexion.php';
    $conectar = new Conexion();
    $con = $conectar -> conectarDB();

    $id= $_GET['id'];
    $sql="SELECT * FROM empleados INNER JOIN car ON empleados.idCargo = car.idCargo WHERE idEmpledo='$id' ";
    $modificar= $con->query($sql);
    $dato= $modificar->fetch_array();

    if(isset($_POST['modificar'])){
        $id= $_POST['id'];
        $nombre= $con->real_escape_string($_POST['nombreEmpleado']);
        $apellido=$con->real_escape_string($_POST['apellidoEmpleado']);
        $documento=$con->real_escape_string($_POST['documentoEmpleado']);
        $telefono=$con->real_escape_string($_POST['telefonoEmpleado']);
        $contrato=$con->real_escape_string($_POST['tipodeContrato']);
        $nomina=$con->real_escape_string($_POST['nomina']);
        $cargo=$con->real_escape_string($_POST['cargo']);
        $tipoDocumento=$con->real_escape_string($_POST['tipoDocumento']);


        $actualiza="UPDATE empleados SET nombreEmpleado='$nombre', apellidoEmpleado='$apellido', documentoEmpleado='$documento', telefonoEmpleado='$telefono', tipodeContrato='$contrato', nomina='$nomina', idcargo='$cargo', tipoDocumento='$tipoDocumento' WHERE idEmpledo='$id'";
        
        $actualizar= $con->query($actualiza);
        header("location: tablaEmpleados.php");
    }

?>
<!DOCTYPE html>
<html>
    <head>
    <title> Empleados </title>
    <meta charset="UTF-8">
    <meta name="description" content="Formulario para modificar empleados">
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
        <h1 class="text-center text-white">Modificar  registros de empleados</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" class="p-2"  method="POST">
            <input type="hidden" name="id" id="id" value="<?php echo $dato['idEmpledo'];?>">
<!--Inicio -->  <div class="row">
                    <div class="col">
                                    <div class="form-floating mb-4 ">
                                        <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="nombreEmpleado"
                                        placeholder="Nombre" name="nombreEmpleado" value="<?php echo $dato['nombreEmpleado'];?>" maxlength="25">
                                        <label for="nombreEmpleado" class="text-white"><i class="bi bi-person-fill"></i> Nombre del Empleado:</label>
                                    </div>

                                    <div class="form-floating  mb-4 ">
                                        <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="apellidoEmpleado"
                                        placeholder="Apellido" name="apellidoEmpleado" value="<?php echo $dato['apellidoEmpleado'];?>" maxlength="25">
                                        <label for="apellidoEmpleado"class="text-white"><i class="bi bi-person-fill"></i> Apellido del Empleado:</label>
                                    </div>

                                        <div class="form-floating mb-4 ">
                                            <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="documentoEmpleado"
                                            placeholder="No. Documento" name="documentoEmpleado" value="<?php echo $dato['documentoEmpleado'];?>" maxlength="12">
                                            <label for="documentoEmpleado" class="text-white"><i class="bi bi-person-fill"></i> No. documento del Empleado:</label>
                                        </div>
                                        <div class="form-floating mb-4 mt-4">
                                            <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="nomina"
                                            placeholder="Sueldo" name="nomina" value="<?php echo $dato['nomina'];?>" maxlength="8">
                                            <label for="nomina" class="text-white"><i class="bi bi-person-fill"></i> Sueldo:</label>
                                        </div>

                                </div>

                                <div class="col">
                                    <div class="form-floating mb-4 ">
                                        <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="telefonoEmpleado"
                                        placeholder="No. Teléfono" name="telefonoEmpleado" value="<?php echo $dato['telefonoEmpleado'];?>" maxlength="12">
                                        <label for="telefonoEmpleado" class="text-white"><i class="bi bi-person-fill"></i> No. teléfono del Empleado:</label>
                                    </div>
                                    <div class="input-group  mt-4 mb-4">
                                        <span class="input-group-text bg-primary bg-opacity-75 text-white"><i class="bi bi--fill"></i>Tipo de Contrato:</span>
                                        <select class="form-select bg-primary bg-opacity-50 text-white" name="tipodeContrato" id="tipodeContrato">
                                                <option ><?php echo $dato['tipodeContrato'];?></option>
                                                <option >Definido</option>
                                                <option >Indefinido</option>
                                        </select>
                                    </div>
                                    <div class="input-group  mt-4 mb-4">
                                    </div>
                                    <div class="input-group mb-4 mt-2">
                                        <span class="input-group-text bg-primary bg-opacity-75 text-white"><i class="bi bi--fill"></i>Tipo de documento:</span>
                                        <select class="form-select bg-primary bg-opacity-50 text-white" name="tipoDocumento" id="tipoDocumento">
                                                <option ><?php echo $dato['tipoDocumento'];?></option>
                                                <option >CC</option>
                                                <option >CE</option>
                                        </select>
                                    </div>
                                    <div class="input-group  mt-4 mb-4">
                                    </div>
                                    <div class="input-group mb-4 mt-4">
                                    <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi-fill"></i>Cargo:</span>
                                    <select class="form-select bg-primary bg-opacity-50 text-white" name="cargo" id="cargo">
                                            <option value="<?php echo $dato['idCargo'];?>"> <?php echo $dato['cargo'];?></option>
                                            <?php
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

           
            <div class=" ps-4 pe-4 d-grid">
                <div class="btn-group">
                <button  name="modificar" id="modificar" class="btn btn-primary me-2" type="submit">Modificar</button>
                <a   class="btn btn-primary ms-2" type="button" href="http://localhost/prototiposmifag/empleados/tablaEmpleados.php">Regresar</a>
            </div>
            </div>
            
           
            
            </form>
        </div>
        <script src="alertas.js"></script>

    </body>
</html>