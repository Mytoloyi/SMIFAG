<?php
session_start();
  class  Insumos{
   
    function registroInsumos() {
        $servidor = "localhost";
        $user = "root";
        $password = "";
        $database = "finca_ganadera";
        $con = new mysqli($servidor, $user, $password, $database);

        // Verificar si los campos requeridos están vacíos
        if(empty($_POST["nombreInsumo"]) || empty($_POST["cantidadInsumo"]) || empty($_POST["novedades"])) {
            $_SESSION["Error"] = "Todos los campos son obligatorios";
            header('Location: insumos.php');
            exit(); // Salir del script para evitar que se realice la inserción
        }

        // Insertar datos en la tabla "insumos" utilizando consultas preparadas
        $stmt = $con->prepare("INSERT INTO insumos(nombreInsumo, cantidadInsumo, fechavencimiento, valorUnidad, novedades) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $_POST["nombreInsumo"], $_POST["cantidadInsumo"], $_POST["fechavencimiento"], $_POST["valorUnidad"], $_POST["novedades"]);

        if ($stmt->execute()) {
            $_SESSION["registro"] = "Se ha realizado el registro";
            header('Location: insumos.php');
        } else {
            $_SESSION["Error"] = "No es posible realiza el registro" . $con->error;
            header('Location: insumos.php');
        }

        $stmt->close();
        $con->close();  
     }
  }  
  $conexion = new Insumos();
  $conexion->registroInsumos();