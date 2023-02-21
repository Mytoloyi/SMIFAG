
<?php
session_start();
if(!isset($_SESSION ["Usuario"])){
    header ('Location: ../admin/index.php'); 
}
    include 'conexion.php';
    $conectar = new Conexion();
    $con = $conectar -> conectarDB();

    $id= $_GET['id'];
    $sql="SELECT * FROM empleados WHERE idEmpledo='$id' ";
    $modificar= $con->query($sql);
    $dato= $modificar->fetch_array();

    if(isset($_POST['modificar'])){
        $id= $_POST['id'];
        $nombre= $con->real_escape_string($_POST['nombreEmpleado']);
        $apellido=$con->real_escape_string($_POST['apellidoEmpleado']);
        $documento=$con->real_escape_string($_POST['documentoEmpleado']);
        $telefono=$con->real_escape_string($_POST['telefonoEmpleado']);
        $rango=$con->real_escape_string($_POST['rangoEmpleado']);
        $contrato=$con->real_escape_string($_POST['tipodeContrato']);
        $nomina=$con->real_escape_string($_POST['nomina']);


        $actualiza="UPDATE empleados SET nombreEmpleado='$nombre', apellidoEmpleado='$apellido', documentoEmpleado='$documento', telefonoEmpleado='$telefono', rangoEmpleado='$rango', tipodeContrato='$contrato', nomina='$nomina' WHERE idEmpledo='$id'";
        
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
            <div class="input-group  pe-5 m-4 mt-2">
                <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi-person-fill"></i>Nombre del Empleado:&nbsp;</span>
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="nombreEmpleado"
                 name="nombreEmpleado" value="<?php echo $dato['nombreEmpleado'];?>">
            </div>

            <div class="input-group  pe-5 m-4 mt-2">
            <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi-person-fill"></i>Apellido del Empleado:&nbsp;</span>
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="apellidoEmpleado"
                 name="apellidoEmpleado" value="<?php echo $dato['apellidoEmpleado'];?>">
            </div>

            <div class="input-group  pe-5 m-4 mt-2">
            <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi-person-fill"></i>No. de Documento:&nbsp;</span>
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="documentoEmpleado"
                 name="documentoEmpleado" value="<?php echo $dato['documentoEmpleado'];?>">
            </div>

            <div class="input-group  pe-5 m-4 mt-2">
            <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi-person-fill"></i>Teléfono&nbsp;</span>
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="telefonoEmpleado"
                 name="telefonoEmpleado" value="<?php echo $dato['telefonoEmpleado'];?>">
            </div>

            <div class="input-group  pe-5 m-4 mt-2">
            <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi-person-fill"></i>Rango:&nbsp;</span>
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="rangoEmpleado"
                 name="rangoEmpleado" value="<?php echo $dato['rangoEmpleado'];?>">
            </div>

            <div class="input-group  pe-5 m-4 mt-2">
            <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi-person-fill"></i>Tipo de contrato:&nbsp;</span>
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="tipodeContrato"
                 name="tipodeContrato" value="<?php echo $dato['tipodeContrato'];?>">  
            </div>

            <div class="input-group  pe-5 m-4 mt-2">
            <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi-person-fill"></i>Sueldo:&nbsp;</span>
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="nomina"
                 name="nomina" value="<?php echo $dato['nomina'];?>">  
            </div>
            <div class=" ps-4 pe-4 d-grid">
                <div class="btn-group">
                <button  name="modificar" id="modificar" class="btn btn-primary me-2" type="submit">Modificar</button>
                <a   class="btn btn-primary ms-2" type="button" href="http://localhost/prototiposmifag/empleados/tablaEmpleados.php">Regresar</a>
            </div>
            </div>
            
           
            
            </form>
        </div>

    </body>
</html>