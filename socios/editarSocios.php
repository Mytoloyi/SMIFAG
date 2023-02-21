
<?php
session_start();
if(!isset($_SESSION ["Usuario"])){
    header ('Location: ../admin/index.php'); 
}
    include 'conexion.php';
  

    $id= $_GET['id'];
    $sql="SELECT * FROM socios WHERE idSocio='$id'";
    $modificar= $con->query($sql);
    $dato= $modificar->fetch_array();

    if(isset($_POST['modificar'])){
        $id= $_POST['id'];
        $nombre= $con->real_escape_string($_POST['nombreSocio']);
        $apellido=$con->real_escape_string($_POST['apellidoSocio']);
        $documento=$con->real_escape_string($_POST['documentoSocio']);
        $telefono=$con->real_escape_string($_POST['telefonoSocio']);
        $marca=$con->real_escape_string($_POST['marca']);
        


        $actualiza="UPDATE socios SET nombreSocio='$nombre', apellidoSocio='$apellido', documentoSocio='$documento', telefonoSocio='$telefono', marca='$marca' WHERE idSocio='$id'";
        
        $actualizar= $con->query($actualiza);
        header("location: tablaSocios.php");
    }

?>
<!DOCTYPE html>
<html>
    <head>
    <title> Socios </title>
    <meta charset="UTF-8">
    <meta name="description" content="Formulario para modificar socios">
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
      background:  linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),url(../img/llanura2.jpg)  ; 
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
          <h1 class="text-center text-white">Modificar  registros de Socios</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" class="p-2"  method="POST">
            <input type="hidden" name="id" id="id" value="<?php echo $dato['idSocio'];?>">
            <div class="input-group pe-5 m-4 mt-2">
            <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi-person-fill"></i>Nombre:&nbsp;</span>
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="nombreSocio"
                 name="nombreSocio" value="<?php echo $dato['nombreSocio'];?>">
            </div>

            <div class="input-group pe-5 m-4 mt-2">
            <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi-person-fill"></i>Apellido:&nbsp;</span>
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="apellidoSocio"
                 name="apellidoSocio" value="<?php echo $dato['apellidoSocio'];?>">
            </div>

            <div class="input-group pe-5 m-4 mt-2">
            <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi-person-fill"></i>CC:&nbsp;</span>
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="documentoSocio"
                 name="documentoSocio" value="<?php echo $dato['documentoSocio'];?>">
            </div>

            <div class="input-group pe-5 m-4 mt-2">
            <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi-person-fill"></i>Teléfono:&nbsp;</span>
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="telefonoSocio"
                 name="telefonoSocio" value="<?php echo $dato['telefonoSocio'];?>">
            </div>

            <div class="input-group pe-5 m-4 mt-2">
            <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi-person-fill"></i>Marca:&nbsp;</span>
                <input type="text" class="form-control bg-primary bg-opacity-50 text-white" id="marca"
                 name="marca" value="<?php echo $dato['marca'];?>">
            </div>

           
            <div class=" ps-4 pe-4 d-grid">
                <div class="btn-group">
                <button  name="modificar" id="modificar" class="btn btn-primary me-2" type="submit">Modificar</button>
                <a   class="btn btn-primary ms-2" type="button" href="http://localhost/prototiposmifag/socios/tablaSocios.php">Regresar</a>
            </div>
            </div>
            
           
            
            </form>
        </div>

    </body>
</html>