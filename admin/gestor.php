<?php
 session_start();
 if(!isset($_SESSION ["Usuario"])){
     header ('Location: ../admin/index.php'); 
 }

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Administrador</title>
        <meta chasrset="utf-8"> 
        <meta name="description" content="Apartados del sistema">
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
   
  </style>
    </head>

    <body class="text-info " style="font-size:18px;">

<?php 
include './controller/menu.php'; 
?>

<!--
  -->
<div class="container text-center">

<img src="../img/logosmifag.png" alt="Logo" style="width: 250px; height:150px;">
<!--Inicio  -->
<div class="row">

  <!-- Columna 1 -->
  <div class="col-2 d-block d-sm-none "></div>
  <div class="col-3 d-block d-md-none d-none d-sm-block "></div>
  <!-- Columna 2 -->
  <div class="col">
          <div class="row justify-content-center "  style="font-size:18px;">
          <!-- -->
            <div class="col mt-3">
              <div class="card bg-success  " style="width: 15rem;">
                <img src="../img/vaca.jpg" class="card-img-top" alt="Ganado" >
                <div class="card-body fw-bolder">
                  <label class="card-title text-info fw-bolder"  style="font-size:22px;">
                  <i class="bi bi-award-fill text-info"  style="width: min-width:10px;font-size: 1em;">
                  </i>Ganado</label>
                  <label class="card-text pb-2 ">Ver socios y reses activas en la finca</label>
                  <a href="../propietarios/propietarios.php"class="btn btn-info d-grid" aria-label="Boton ver más">Ver</a>
                </div>
              </div>
            </div> 
          <!-- -->
          <!-- -->
            <div class="col mt-3">
              <div class="card bg-success  " style="width: 15rem;">
                <img src="../img/potrero.jpg." class="card-img-top" alt="Potreros" >
                  <div class="card-body fw-bolder">
                    <label class="card-title text-info fw-bolder "  style="font-size:22px;">
                    <i class="bi bi-hexagon-fill text-info"  style="width: min-width:10px;font-size: 1em;">
                    </i>Potreros</label>
                    <label class="card-text pb-2">Reses que contiene cada potrero</label>
                    <a href="../lotes/lotes.php" class="btn btn-info d-grid " aria-label="Boton ver más">Ver</a>
                  </div>
              </div>
            </div>
          <!-- -->
          <!-- -->
            <div class="col mt-3">
              <div class="card bg-success  "  style="width: 15rem;">
                <img src="../img/agenda.jpg" class="card-img-top" alt="Agenda">
                  <div class="card-body fw-bolder">
                    <label class="card-title text-info fw-bolder"  style="font-size:22px;">
                    <i class="bi bi-calendar-week text-info"  style="width: min-width:10px;font-size: 1em;">
                    </i>Agenda</label>
                    <label class="card-text pb-2 ">Actividades a realizar en la finca</label>
                    <a href="../cronograma/cronograma.php" class="btn btn-info d-grid" aria-label="Boton ver más">Ver</a>
                  </div>
              </div>
            </div>
          <!-- -->
          <!-- -->
            <div class="col mt-3">
              <div class="card bg-success  " style="width: 15rem;">
                <img src="../img/herramientas.jpg" class="card-img-top" alt="Inventario">
                  <div class="card-body fw-bolder">
                    <label class="card-title text-info fw-bolder"  style="font-size:22px;">
                    <i class="bi bi-receipt text-info"  style="width: min-width:10px;font-size: 1em;">
                    </i>Inventario</label>
                    <label class="card-text pb-2">Elementos que hay en la finca</label>
                    <a href="../inventario/inventario.php" class="btn btn-info d-grid" aria-label="Boton ver más">Ver</a>
                  </div>
              </div>
            </div>
          <!-- -->
          </div>
  </div>

</div>
<!-- fin -->

</div>

</body>
</html>