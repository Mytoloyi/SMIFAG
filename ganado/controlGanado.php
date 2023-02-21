<?php
    session_start();
    if(!isset($_SESSION ["Usuario"])){
        header ('Location: ../admin/index.php'); 
    }
    include 'conexion.php';
  

    $id= $_GET['id'];
    $sql="SELECT * FROM ganado WHERE idRes='$id'";
    $guardar= $con->query($sql);
    $dato= $guardar->fetch_array();
  
    if(isset($_POST['guardar'])){
        $id= $_POST['id'];
        $pesoInicial= $con->real_escape_string($_POST['pesoInicial']);
        $pesoActual=$con->real_escape_string($_POST['pesoActual']);
        $pesoFinal=$con->real_escape_string($_POST['pesoFinal']);
        $vacunaAftosa=$con->real_escape_string($_POST['vacunaAftosa']);
        $vecesAplicada=$con->real_escape_string($_POST['vecesAplicada']);

         
      
      

        if($_FILES["archivoSubir"]["size"] == 0){
            $archivo = $con->real_escape_string($_POST['archivoExistente']);
    }else{
        $directorio = "tratamiento/"; 
        $archivo = $directorio.basename($_FILES["archivoSubir"]["name"]);
        $estado = 1;
        $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
        if (isset($_POST["guardar"])) {
            $verificar = getimagesize($_FILES["archivoSubir"]["tmp_name"]);
            if ($verificar == false) {
                $estado = 0;
            }else{
                
            }
        }
        if (file_exists("$archivo")) {
            $estado=0;
        }
        if ($tipoArchivo != "png" && $tipoArchivo != "jpeg" && $tipoArchivo != "jpg") {
            $estado = 0;
        }else{
        }
        if($_FILES["archivoSubir"]["size"]>5000000){
            $estado = 0;
        }else{
          
        }    
        if($estado == 1){
            if(move_uploaded_file($_FILES["archivoSubir"]["tmp_name"], $archivo)){
            // if(move_uploaded_file($_FILES["archivoSubir"]["tmp_name"], $directorio."nombreArchivo".$tipoArchivo)){
                // echo "<br> El archivo ". basename($_FILES["archivoSubir"]["name"]). " ha sido subido exitosamente";
            }else{
                // echo "Ha ocurrido un error";
            }
        }else{
            // echo "Lo sentimos, el archivo no ha podido subirse";
        }
    }
  
  
        $actualiza="UPDATE ganado SET pesoInicial = '$pesoInicial',  pesoActual = '$pesoActual',  pesoFinal = '$pesoFinal',  vacunaAftosa = '$vacunaAftosa',  vecesAplicada = '$vecesAplicada', tratamiento = '$archivo' WHERE idRes='$id'";
        
        $actualizar= $con->query($actualiza);
        header("location: tablaGanado.php");
    }
  
?>
<!DOCTYPE html>
<html>
    <head>
    <title> Ganado </title>
    <meta charset="UTF-8">
    <meta name="description" content="Formulario para mostrar control de reses">
    <link rel="shortcut icon" href="../img/logosmifag.png" type="image/ico">
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
      background: url(../img/fondotabla.jpg)  ; 
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      margin: 0;
      height: 100vh;
    }
    .file-select {
  position: relative;
  display: inline-block;
}

.file-select::before {
  background-color: #261201;
;
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 3px;
  content: 'Seleccionar'; /* testo por defecto */
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

.file-select input[type="file"] {
  opacity: 0;
  width: 200px;
  height: 32px;
  display: inline-block;
}

#src-file1::before {
  content: 'Cargar';
}
    
  </style>
    </head>
<body>

    <div class="container text-center pt-2">
    <h1 class="text-center text-white p-4 p-3">Control de Ganado</h1>
    <div class="row">

            <div class="col overflow-auto">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST"  enctype="multipart/form-data">
        <input class="form-control" type="hidden" name="id" id="id" value="<?php echo $dato['idRes'];?>" >
       

        <table class="table bg-primary bg-opacity-75 text-light" >
        <thead class="text-center bg-success">
                <td>Peso inicial</br></td>
                <td>Peso Actual</br></td>
                <td>Peso Final </td>
                <td>Ultima aplicación de vacuna Aftosa</br></td>
                <td>Aplicadas</br></td>
                <td>Tratamiento</td>
        </thead>
        <tbody class="text-center">
            <td>
                <input class="form-control" type="text" name="pesoInicial" id="pesoInicial" value="<?php echo $dato['pesoInicial'];?>">
            </td>
            <td>
                <input class="form-control" type="text" name="pesoActual" id="pesoActual" value="<?php echo $dato['pesoActual'];?>">
            </td>
            <td>
                <input class="form-control" type="text" name="pesoFinal" id="pesoFinal" value="<?php echo $dato['pesoFinal'];?>">
            </td>
            <td>
                <input class="form-control" type="date" name="vacunaAftosa" id="vacunaAftosa" value="<?php echo $dato['vacunaAftosa'];?>">
            </td>
            <td>
                <input class="form-control" type="text" name="vecesAplicada" id="vecesAplicada" value="<?php echo $dato['vecesAplicada'];?>">
            </td>   
            <td>
            <div class="file-select" id="src-file1" >
                <input class="btn btn-primary "type="file" name="archivoSubir" id="archivoSubir" >
            </div>
            </td>         
            </tbody>
        </table>

        <div class="">     
        <img src="./<?php echo $dato['tratamiento'];?>" style="width:600px" alt="Tratamiento">
            <input type="hidden" name="archivoExistente" id="archivoExistente" value="<?php echo $dato['tratamiento'];?>">
        </div>
        </div>
        </div>
</div>
      <div class="text-center">
      <button  name="guardar" id="guardar" class="btn btn-primary text-center" type="submit">Guardar y salir</button>
      </div>

        </form>
     
    </div>
</body>

</html>
