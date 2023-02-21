<?php
  class  Herramientas{
   
         function registroHerramientas(){
            $servidor="localhost";
            $user="root";
            $password="";
            $database="finca_ganadera";
            $con= new mysqli($servidor,$user,$password,$database);
            $sql="INSERT INTO herramientas(nombreHerramienta, cantidad)
            VALUES('".$_POST["nombreHerramienta"]."','".$_POST["cantidadHerramienta"]."');";

            if($con->query($sql)===TRUE){
                $_SESSION["Status"]="Se ha registrado la herramienta";
                header('Location: herramientas.php');
            }else{
                $_SESSION["ErrorDB"]="No ha sido posible establecer la conexión con la base de datos".$con->error;
                header('Location: herramientas.php');
            }
            $con->close();  
         }
  }  
  $conexion = new Herramientas();
  $conexion->registroHerramientas();