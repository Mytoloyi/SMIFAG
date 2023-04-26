<?php
session_start();
  class  Potreros{
   
    function registroPotreros(){
        $servidor="localhost";
        $user="root";
        $password="";
        $database="finca_ganadera";
        $con= new mysqli($servidor,$user,$password,$database);
    
        // Verificar que se hayan enviado los datos requeridos
        if(empty($_POST["nombrePotrero"]) || empty($_POST["estadoPotrero"]) || empty($_POST["medida"])) {
            $_SESSION["Error"] = "Todos los campos son obligatorios";
            header('Location: potreros.php');
            exit();
        }
    
        // Utilizar parámetros preparados para evitar inyección SQL
        $stmt = $con->prepare("INSERT INTO potrero(nombrePotrero, estadoPotrero, medida) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $_POST["nombrePotrero"], $_POST["estadoPotrero"], $_POST["medida"]);
    
        if($stmt->execute()){
            $_SESSION["registro"]="Se ha realizado el registro";
            header('Location: potreros.php');
        }else{
            $_SESSION["Error"]="No es posible realizar el registro ".$stmt->error;
            header('Location: potreros.php');
        }
        $stmt->close();
        $con->close();
    }
    
  }  
  $conexion = new Potreros();
  $conexion->registroPotreros();