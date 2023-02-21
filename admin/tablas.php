<?php
 session_start();
 if(!isset($_SESSION ["Usuario"])){
     header ('Location: ../admin/index.php'); 
 }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Administrador</title>
        <meta chasrset="utf-8"> 
        <meta name="description" content="Lista de todas las tablas">
        <link rel="shortcut icon" href="../img/logosmifag.png" type="image/ico">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/custom.css" rel="stylesheet">
        <link href="../libs/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <script src="../js/bootstrap.min.js"></script>
        <style>
    img{
      width: 100%;
    }
    body {
      background: url(../img/campoatar2.jpg)  ; 
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      margin: 0;
      height: 100vh;
    }
    tr{
        border: 1px solid #261201;
    }
  </style>
    </head>

<body  class="text-success " style="font-size:18px;">
<?php 
include './controller/menu.php'; 
?>

   <div class="container pt-4" >

   <table class="table bg-info bg-opacity-75  text-white text-center " >
    <thead class="bg-success">
    <th ></th>
      <th >#</th>
      
      <th >Nombre de la Lista</th>
      <th>Fomulario</th>
      <th >Registros</th>
    
  </thead>
  <tbody class="text-primary fw-bolder ">
    <tr >
        <td></td>
        <td>1</td>
      
        <td>Empleados</td>
        <td>
            <a type="button" href="../empleados/empleados.php" class="btn btn-success">Ingresar</a>
        </td>
        <td>
            <a type="button" href="../empleados/tablaEmpleados.php" class="btn btn-success">Ver </a>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>2</td>
       
        <td>Socios</td>
        <td>
            <a type="button" href="../socios/socios.php" class="btn btn-success">Ingresar</a>
        </td>
        <td>
            <a type="button" href="../socios/tablaSocios.php" class="btn btn-success">Ver </a>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>3</td>
      
        <td>Ganado</td>
        <td>
            <a type="button" href="../ganado/ganado.php" class="btn btn-success">Ingresar</a>
        </td>
        <td>
            <a type="button" href="../ganado/tablaGanado.php" class="btn btn-success">Ver </a>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>4</td>
        
      <td>Potreros</td>
      <td>
            <a type="button" href="../potreros/potreros.php" class="btn btn-success">Ingresar</a>
        </td>
        <td>
            <a type="button" href="../potreros/tablaPotreros.php" class="btn btn-success">Ver </a>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>5</td>
      
        <td>Insumos</td>
        <td>
            <a type="button" href="../insumos/insumos.php" class="btn btn-success">Ingresar</a>
        </td>
        <td>
            <a type="button" href="../insumos/tablaInsumos.php" class="btn btn-success">Ver </a>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>6</td>
        
        <td>Herramientas</td>
        <td>
            <a type="button" href="../herramientas/herramientas.php" class="btn btn-success">Ingresar</a>
        </td>
        <td>
            <a type="button" href="../herramientas/tablaHerramientas.php" class="btn btn-success">Ver </a>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>7</td>
       
        <td>Agenda</td>
        <td>
            <a type="button" href="../agenda/agenda.php" class="btn btn-success">Ingresar</a>
        </td>
        <td>
            <a type="button" href="../agenda/tablaAgenda.php" class="btn btn-success">Ver </a>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>8</td>
        
        <td>Actividades</td>
        <td></td>
        <td>
            <a type="button" href="../agenda/actividades.php" class="btn btn-success">Ver </a>
        </td>
    </tr>
    </tbody>
   </table>
   </div>
</body>
</html>