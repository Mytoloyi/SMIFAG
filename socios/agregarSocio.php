<?php
  class Socios{
   
         function registroSocios(){
            $servidor="localhost";
            $user="root";
            $password="";
            $database="finca_ganadera";
            $con= new mysqli($servidor,$user,$password,$database);
            $sql="INSERT INTO socios(nombreSocio, apellidoSocio, documentoSocio, telefonoSocio, marca)
            VALUES('".$_POST["nombreSocio"]."','".$_POST["apellidoSocio"]."','".$_POST["documentoSocio"]."','".$_POST["telefonoSocio"]."','".$_POST["marca"]."');";

            if($con->query($sql)===TRUE){
                $_SESSION["Status"]="Se ha registrado al Socio";
                header('Location: ./socios.php');
            }else{
                $_SESSION["ErrorDB"]="No ha sido posible establecer la conexión con la base de datos".$con->error;
                header('Location: ./socios.php');
            }
            $con->close();  
         }
  }  
  $conexion = new Socios();
  $conexion->registroSocios();