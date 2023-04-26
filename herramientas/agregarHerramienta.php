<?php
session_start();
  class  Herramientas{
   
         function registroHerramientas(){
            $servidor="localhost";
            $user="root";
            $password="";
            $database="finca_ganadera";
    
            if(empty($_POST["nombreHerramienta"]) || empty($_POST["cantidadHerramienta"]) || empty($_POST["novedades"])) {
                $_SESSION["Error"] = "Todos los campos son obligatorios";
                header('Location: herramientas.php');
                exit(); // Salir del script para evitar que se realice la inserción
            }
    
            $con= new mysqli($servidor,$user,$password,$database);
    
            // Use prepared statements to avoid SQL injection
            $stmt = $con->prepare("INSERT INTO herramientas(nombreHerramienta, cantidad, novedades) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $_POST["nombreHerramienta"], $_POST["cantidadHerramienta"], $_POST["novedades"]);
    
            if($stmt->execute()){
                $_SESSION["registro"]="Se ha realizado el registro";
                header('Location: herramientas.php');
            }else{
                $_SESSION["Error"]="No es posible realizar el registro".$con->error;
                header('Location: herramientas.php');
            }
    
            $stmt->close();
            $con->close();  
        }
  }  
  $conexion = new Herramientas();
  $conexion->registroHerramientas();