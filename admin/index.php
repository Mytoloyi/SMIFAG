<?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
    <title> Admin </title>
    <meta charset="UTF-8">
    <meta name="description" content="Index de administrador">
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
      background: url(../img/fondoindex.jpg)  ; 
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      margin: 0;
      height: 100vh;
    }
    </style>
    </head>
    <body >
    <?php
            if(isset($_SESSION["Error"])){
                echo '<div class="alert alert-danger m-0"><i class="bi bi-exclamation-diamond-fill"> </i>';
                echo $_SESSION["Error"];
                echo '</div>';
                session_unset();
                session_destroy();
            }
        ?>

        <div class="container text-center p-5">
        <img src="../img/logosmifag2.png" alt="Logo" style="width: 250px; height:150px;">

            <div class="container mt-1" >
                <form action="./controller/login.php" class="was-validated" method="POST">
                    <div class="form-floating m-4">
                        <input type="text" class="form-control" id="user"
                        placeholder="Ingrese su Usuario" name="user" required>
                        <label for="user"><i class="bi bi-person"></i> Usuario:</label>
                        <div class="invalid-feedback"> </div>
                        <div class="valid-feedback"></div> 
                    </div>
                    <div class="form-floating m-4">
                        <input type="password" class="form-control" id="password"
                        placeholder="Ingrese su Contraseña" name="password" required>
                        <label for="password"><i class="bi bi-lock"></i> Contraseña:</label>
                    </div>
                    <div class="text-center">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary ms-4 me-4" > Ingresar </button></div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>