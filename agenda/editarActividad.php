<?php
    session_start();
    if(!isset($_SESSION ["Usuario"])){
        header ('Location: ../admin/index.php'); 
    }
    include 'conexion.php';
    $id= $_GET['id'];
    $sql="SELECT * FROM agenda INNER JOIN empleados ON agenda.idEmpledo = empleados.idEmpledo INNER JOIN actividades ON agenda.idAct = actividades.idAct WHERE idActividad='$id' ORDER BY nombreActividad ASC LIMIT 10";
    $modificar= $con->query($sql);
    $dato= $modificar->fetch_array();

    if(isset($_POST['modificar'])){
        $id= $_POST['id'];
        $nombre= $con->real_escape_string($_POST['nombreActividad']);
        $fecha=$con->real_escape_string($_POST['fecha']);
        $empleado=$con->real_escape_string($_POST['nombreEmpleado']);
        
       


        $actualiza="UPDATE agenda SET idAct='$nombre', fecha='$fecha', idEmpledo='$empleado'  WHERE idActividad='$id'";
        
        $actualizar= $con->query($actualiza);
        header("location: tablaAgenda.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <title> Agenda </title>
    <meta charset="UTF-8">
    <meta name="description" content="Formulario para modificar actividades">
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
      margin: 0;
      height: 100vh;
    }
  </style>
    </head>
    <br>
    <body class="text-white">
        <div class="container bg-success  bg-opacity-75 rounded">
        <h1 class="text-center text-white">Registro de actividades</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" class="p-2" method="POST">  
            <input type="hidden" name="id" id="id" value="<?php echo $dato['idActividad'];?>">
            <div class="input-group pe-5 m-4 mt-2">
            <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi-person-fill"></i>Actividad:&nbsp;</span>
            <select class="form-select bg-primary bg-opacity-50 text-white" name="nombreActividad" id="nombreActividad">
                  <option value="<?php echo $dato['idAct'];?> "> <?php echo  $dato['nombreActividad'].": ". $dato['descripcion'];?></option>
                  <?php
                    include 'conexion.php';
                    $sql="SELECT * FROM actividades ORDER BY nombreActividad ASC";
                    $resultset = $con->query($sql);
                        while($fila = $resultset->fetch_assoc()){
                          echo "<option value=".$fila['idAct'].">".$fila['nombreActividad']." ".$fila['descripcion']."</option>";
                        }
                   ?>
              
              </select>
            </div>
                <div class="form-floating m-4 mt-2">
                <input type="date" class="form-control bg-primary bg-opacity-50 text-white" id="fecha"
                placeholder="Fecha" name="fecha" value="<?php echo $dato['fecha'];?>">
                <label for="fecha"><i class="bi bi--fill"></i> Fecha: </label>
            </div>
               
                
            <div class="input-group m-4 mt-2 pe-5">
            <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi-person-fill"></i>Empleado:&nbsp;</span>
             <select class="form-select bg-primary bg-opacity-50 text-white" name="nombreEmpleado" id="nombreEmpleado">
                   <option value ="<?php echo $dato['idEmpledo'];?>"> <?php echo $dato['nombreEmpleado']." ".$dato['apellidoEmpleado'];?></option>
                    <?php
                     
                      $sql="SELECT * FROM empleados ORDER BY nombreEmpleado ASC";
                      $resultset = $con->query($sql);
                          while($fila = $resultset->fetch_assoc()){
                            echo "<option value=".$fila['idEmpledo'].">".$fila['nombreEmpleado']." ".$fila['apellidoEmpleado']." </option>";
                          }
                     ?>
                </select>
            </div>
               
            <div class=" ps-4 pe-4 d-grid">
                <div class="btn-group">
                <button name="modificar" id="modificar"  class="btn btn-primary me-2" type="submit">Modificar</button>
                <a   class="btn btn-primary ms-2" type="button" href="http://localhost/prototiposmifag/agenda/tablaAgenda.php">Regresar</a>
            </div>
            </div>
            
           
            
            </form>
        </div>
        

    </body>
</html>