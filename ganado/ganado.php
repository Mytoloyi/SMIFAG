<?php
    session_start();
    if(!isset($_SESSION ["Usuario"])){
        header ('Location: ../admin/index.php'); 
    }

  
?>
<!DOCTYPE html>
<html>
    <head>
    <title> Ganado </title>
    <meta charset="UTF-8">
    <meta name="description" content="Formulario para registrar reses">
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
    <br>
    <body class="text-white">
        <div class="container bg-success  bg-opacity-75 rounded">
        <h1 class="text-center text-white">Registro de Reses</h1>
            <form action="agregarRes.php" class="p-2"  method="POST">
            
            <div class="row">
                <div class="col">

                <div class="form-floating m-4 mt-2 ">
                    <input type="text" class="form-control bg-primary bg-opacity-50 text-white " 
                    id="raza" name="raza" >
                    <label for="raza" class=""><i class="bi bi--fill"></i> Raza:</label>
                </div> 
               

                
                <div class="form-floating m-4 mt-2 ">
                    <input type="text" class="form-control bg-primary bg-opacity-50 text-white" 
                    id="colorRes" name="colorRes" >
                    <label for="colorRes"><i class="bi bi--fill"></i> Color:</label>
                </div>


                <div class="form-floating m-4 mt-2 ">
                    <input type="text" class="form-control bg-primary bg-opacity-50 text-white" 
                    id="marcaChapeta" name="marcaChapeta" >
                    <label for="marcaChapeta"><i class="bi bi--fill"></i> Número de chapeta o tatuaje del animal: </label>
                </div>

                <div class="form-floating m-4 mt-2 ">
                    <input type="text" class="form-control bg-primary bg-opacity-50 text-white" 
                    id="precoinicial" name="precioinicial" >
                    <label for="precioinicial"><i class="bi bi--fill"></i> Precio Inicial:</label>
                </div>

                <div class="form-floating m-4 mt-2 ">
                    <input type="text" class="form-control bg-primary bg-opacity-50 text-white" 
                    id="precioFinal" name="precioFinal" >
                    <label for="precioFinal"><i class="bi bi--fill"></i> Precio Final:</label>
                </div>

                </div>


                <div class="col">

            <div class="input-group m-4 mt-2 pe-5 ">
            <span  class="input-group-text bg-primary bg-opacity-75 text-white"><i class="bi bi--fill"></i>Clasificación:&nbsp;</span>
            <select  class="form-select bg-primary bg-opacity-50 text-white "   name="categoriaEdad" id="categoriaEdad">
                <option >...</option>
                <option >Ternero</option>
                <option >Añojo</option>
                <option >Novillo</option>
                <option >Cebón</option>
                <option >Vacuno mayor</option>
            </select>
            </div>

            <div class="input-group m-4 mt-2 pe-5">
            <span class="input-group-text bg-primary bg-opacity-75 text-white"><i class="bi bi--fill"></i>Al aumento:&nbsp;&nbsp;</span>
            <select class="form-select bg-primary bg-opacity-50 text-white" name="tipoNegocio" id="tipoNegocio">
                    <option >...</option>
                    <option >Sí</option>
                    <option >No</option>
            </select>
            </div>

            <div class="input-group m-4 mt-2 pe-5">
            <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi--fill"></i>Marca:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
             <select class="form-select bg-primary bg-opacity-50 text-white" name="marcaRes" id="marcaRes">
                    <?php
                      include 'conexion.php';
                     
                      $sql="SELECT * FROM socios ORDER BY nombreSocio ASC";
                      $resultset = $con->query($sql);
                          while($fila = $resultset->fetch_assoc()){
                            echo "<option value=".$fila['idSocio'].">".$fila['nombreSocio']." ".$fila['apellidoSocio'].": ".$fila['marca']."</option>";
                          }
                        
               
                     ?>
                
                </select>
            </div>

          
            <div class="input-group m-4 mt-2 pe-5">
            <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi--fill"></i>Estado:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <select class="form-select bg-primary bg-opacity-50 text-white" name="estadoRes" id="estadoRes">
                    <option >...</option>
                    <option >Criando</option>
                    <option >Vendido</option>
                </select>
            </div>
            

            
            <div class="input-group m-4 mt-2 pe-5">
            <span class="input-group-text bg-primary bg-opacity-75 text-white"i class="bi bi--fill"></i>Potrero:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <select class="form-select bg-primary bg-opacity-50 text-white" name="nombrePotrero" id="nombrePotrero">
                    <?php
                      $sql="SELECT * FROM potrero WHERE estadoPotrero='Disponible' ORDER BY nombrePotrero ASC ";
                      $resultset = $con->query($sql);
                          while($fila = $resultset->fetch_assoc()){   
                            echo "<option value=".$fila['idPotrero']."> ".$fila['nombrePotrero']." </option>";
                          }
                        
                     ?>
                    <?php
                    
                    ?>
                </select>
            </div>
           
           
            </div>
            
            </div>
            
          

           
            
            <div class=" ps-4 pe-4 d-grid ">
            <div class="btn-group">
                <button  onclick="recargar()" class="btn btn-primary me-2" type="submit">Registrar</button>
                <a   class="btn btn-primary ms-2" type="button" href="http://localhost/prototiposmifag/admin/tablas.php">Regresar</a>
            </div>
            </div>
            
           
            
            </form>
        </div>
        <script src="../admin/controller/goback.js" ></script>

    </body>
</html>