
<?php
    include 'conexion.php';
   

    $id= $_GET['id'];
    $sql="SELECT * FROM ganado INNER JOIN socios ON ganado.idSocio = socios.idSocio INNER JOIN potrero ON ganado.idPotrero = potrero.idPotrero WHERE idRes='$id'";
    $modificar= $con->query($sql);
    $dato= $modificar->fetch_array();

    if(isset($_POST['modificar'])){
        $id= $_POST['id'];
        $raza= $con->real_escape_string($_POST['raza']);
        $coloRes=$con->real_escape_string($_POST['colorRes']);
        $categoriaEdad=$con->real_escape_string($_POST['categoriaEdad']);
        $tipoNegocio=$con->real_escape_string($_POST['tipoNegocio']);
        $marca=$con->real_escape_string($_POST['marcaRes']);
        $marcaChapeta=$con->real_escape_string($_POST['marcaChapeta']);
        $estado=$con->real_escape_string($_POST['estadoRes']);
        $precioinicial=$con->real_escape_string($_POST['precioinicial']);
        $precioFinal=$con->real_escape_string($_POST['precioFinal']);
        $nombrePotrero=$con->real_escape_string($_POST['nombrePotrero']);

        $actualiza="UPDATE ganado SET raza='$raza', colorRes='$coloRes', categoriaEdad='$categoriaEdad', tipoNegocio='$tipoNegocio', idSocio='$marca', marcaChapeta='$marcaChapeta', estado='$estado', precioinicial='$precioinicial', precioFinal='$precioFinal', idPotrero='$nombrePotrero'  WHERE idRes='$id'";
        $actualizar= $con->query($actualiza);
        header("location: tablaGanado.php");
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title> Ganado </title>
    <meta charset="UTF-8">
    <meta name="description" content="Formulario para modificar registros del ganado">
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
        <h1 class="text-center text-white">Modificar registros de reses de Reses</h1>

            <form action="<?php echo $_SERVER['PHP_SELF']?>" class="p-2" method="POST">
            
            <div class="row">
                <div class="col">

                <div class="form-floating m-4 mt-2 ">
                <input type="hidden" name="id" id="id" value="<?php echo $dato['idRes'];?>">
                    <input type="text" class="form-control bg-primary bg-opacity-50 text-white" 
                    id="raza" name="raza" value="<?php echo $dato['raza'];?>">
                    <label for="raza"><i class="bi bi--fill"></i> Raza:</label>
                </div> 
               

                
                <div class="form-floating m-4 mt-2 ">
                    <input type="text" class="form-control bg-primary bg-opacity-50 text-white" 
                    id="colorRes" name="colorRes" value="<?php echo $dato['colorRes'];?>">
                    <label for="colorRes"><i class="bi bi--fill"></i> Color:</label>
                </div>


                <div class="form-floating m-4 mt-2 ">
                    <input type="text" class="form-control bg-primary bg-opacity-50 text-white" 
                    id="marcaChapeta" name="marcaChapeta" value="<?php echo $dato['marcaChapeta'];?>">
                    <label for="marcaChapeta"><i class="bi bi--fill"></i> Número de chapeta o tatuaje del animal: </label>
                </div>

                <div class="form-floating m-4 mt-2 ">
                    <input type="text" class="form-control bg-primary bg-opacity-50 text-white" 
                    id="precoinicial" name="precioinicial" value="<?php echo $dato['precioinicial'];?>">
                    <label for="precioinicial"><i class="bi bi--fill"></i> Precio Inicial:</label>
                </div>

                <div class="form-floating m-4 mt-2 ">
                    <input type="text" class="form-control bg-primary bg-opacity-50 text-white" 
                    id="precioFinal" name="precioFinal" value="<?php echo $dato['precioFinal'];?>">
                    <label for="precioFinal"><i class="bi bi--fill"></i> Precio Final:</label>
                </div>

                </div>


                <div class="col">

            <div class="input-group m-4 mt-2 pe-5 ">
            <label  class="form-control bg-primary bg-opacity-75 text-white"><i class="bi bi--fill"></i>Clasificación por edad:&nbsp;</label>
            <select  class="form-select bg-primary bg-opacity-50 text-white "   name="categoriaEdad" id="categoriaEdad">
                <option ><?php echo $dato['categoriaEdad'];?></option>
                <option >Ternero</option>
                <option >Añojo</option>
                <option >Novillo</option>
                <option >Cebón</option>
                <option >Vacuno mayor</option>
            </select>
            </div>

            <div class="input-group m-4 mt-2 pe-5">
            <label class="form-control bg-primary bg-opacity-75 text-white"><i class="bi bi--fill"></i>Al aumento:&nbsp;&nbsp;</label>
            <select class="form-select bg-primary bg-opacity-50 text-white" name="tipoNegocio" id="tipoNegocio">
                    <option ><?php echo $dato['tipoNegocio'];?></option>
                    <option >Sí</option>
                    <option >No</option>
            </select>
            </div>

            <div class="input-group m-4 mt-2 pe-5">
            <label class="form-control bg-primary bg-opacity-75 text-white"i class="bi bi--fill"></i>Estado:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select class="form-select bg-primary bg-opacity-50 text-white" name="estadoRes" id="estadoRes">
                    <option > <?php echo $dato['estado'];?></option>
                    <option >Criando</option>
                    <option >Vendido</option>
                </select>
            </div>

            <div class="input-group m-4 mt-2 pe-5">
            <label class="form-control bg-primary bg-opacity-75 text-white"i class="bi bi--fill"></i>Marca:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
             <select class="form-select bg-primary bg-opacity-50 text-white" name="marcaRes" id="marcaRes">
             <option value="<?php echo $dato['idSocio'];?> "> <?php echo  $dato['nombreSocio']." ".$dato['apellidoSocio'].": ".$dato['marca'];?></option>
                    <?php
                     include 'registros.php';
                     $unir= new Conectar();
                     $unir->consultarMarca();
               
                     ?>
                
                </select>
            </div>

          
            
            

            
            <div class="input-group m-4 mt-2 pe-5">
            <label class="form-control bg-primary bg-opacity-75 text-white"i class="bi bi--fill"></i>Asignar potrero:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <select class="form-select bg-primary bg-opacity-50 text-white" name="nombrePotrero" id="nombrePotrero">
                    <option value="<?php echo $dato['idPotrero'];?>"> <?php echo $dato['nombrePotrero'];?></option>
                    <?php
                      $sql="SELECT * FROM potrero WHERE estadoPotrero='Disponible'";
                      $resultset = $con->query($sql);
                          while($fila = $resultset->fetch_assoc()){   
                            echo "<option value=".$fila['idPotrero']."> ".$fila['nombrePotrero']." </option>";
                          }
                        
                     ?>
                </select>
            </div>
           
           
            </div>
            
            </div>
           
            <div class=" ps-4 pe-4 d-grid">
                <div class="btn-group">
                <button  name="modificar" id="modificar" class="btn btn-primary me-2" type="submit">Modificar</button>
                <a   class="btn btn-primary ms-2" type="button" href="http://localhost/prototiposmifag/ganado/tablaGanado.php">Regresar</a>
            </div>
            </div>
            
           
            
            </form>
        </div>

    </body>
</html>