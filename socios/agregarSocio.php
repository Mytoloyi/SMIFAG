<?php
  session_start();

  class Socios{
     
      function registroSocios(){
          $servidor="localhost";
          $user="root";
          $password="";
          $database="finca_ganadera";
          $con= new mysqli($servidor,$user,$password,$database);
  
          // Verificar que los campos requeridos no estén vacíos
          if(empty($_POST["nombreSocio"]) || empty($_POST["apellidoSocio"]) || empty($_POST["documentoSocio"]) || empty($_POST["telefonoSocio"]) || empty($_POST["marca"]) || empty($_POST["tipoDocumento"])) {
              $_SESSION["Error"] = "Todos los campos son obligatorios";
              header('Location: socios.php');
              exit(); // Salir del script para evitar que se realice la inserción
          }
  
          $sql = "INSERT INTO socios(nombreSocio, apellidoSocio, documentoSocio, telefonoSocio, marca, tipoDocumento) VALUES (?, ?, ?, ?, ?, ?)";
          $stmt = $con->prepare($sql);
          $stmt->bind_param("ssssss", $_POST["nombreSocio"], $_POST["apellidoSocio"], $_POST["documentoSocio"], $_POST["telefonoSocio"], $_POST["marca"], $_POST["tipoDocumento"]);
          
          if($stmt->execute()){
              $_SESSION["registro"]="Se ha registrado al Socio";
              header('Location: socios.php');
          }else{
              $_SESSION["Error"]="No se puede realizar el registro".$con->error;
              header('Location: socios.php');
          }
          
          $stmt->close();  
          $con->close();  
      }
  }  
  
  $conexion = new Socios();
  $conexion->registroSocios();
  
  ?>