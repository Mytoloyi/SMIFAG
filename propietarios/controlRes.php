<?php
    session_start();
    if(!isset($_SESSION ["Usuario"])){
        header ('Location: ../admin/index.php'); 
    }
    include 'conexion.php';
  

    $id= $_GET['id'];
    $sql="SELECT * FROM ganado WHERE idRes='$id'";
   
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
                  <?php
                   $resultset = $con->query($sql);
            
                   while($fila = $resultset->fetch_assoc()){
                       echo "<tr>
                       <td>".$fila["idRes"]."</td>
                       <td>".$fila["pesoInicial"]."</td>
                       <td>".$fila["pesoActual"]."</td> 
                       <td>".$fila["pesoFinal"]."</td> 
                       <td>".$fila["vacunaAftosa"]."</td> 
                       <td>".$fila["vecesAplicada"]."</td> 
                       </tr> 
                       </tbody>
                       </table> 
                       <div class=''>     
                       <img src='../ganado/". $fila['tratamiento']."' style='width:600px' alt='Tratamiento'>
                       </div>"; 
                   }
               
                  ?>  
         

       
        </div>
        </div>
</div>
      <div class="text-center">
      <a  name="volver" id="volver" class="btn btn-primary text-center" href="propietarios.php" aria-label="Volver">Volver</a>
      </div>

        </form>
     
    </div>
    <script src="../admin/controller/goback.js" ></script>

</body>

</html>
