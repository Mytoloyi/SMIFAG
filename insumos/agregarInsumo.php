<?php
  class  Insumos{
   
         function registroInsumos(){
            $servidor="localhost";
            $user="root";
            $password="";
            $database="finca_ganadera";
            $con= new mysqli($servidor,$user,$password,$database);
            $sql="INSERT INTO insumos(nombreInsumo, cantidadInsumo, fechavencimiento, valorUnidad)
            VALUES('".$_POST["nombreInsumo"]."','".$_POST["cantidadInsumo"]."','".$_POST["fechavencimiento"]."','".$_POST["valorUnidad"]."');";

            if($con->query($sql)===TRUE){
                $_SESSION["Status"]="Se ha registrado el insumo";
                header('Location: insumos.php');
            }else{
                $_SESSION["ErrorDB"]="No ha sido posible establecer la conexión con la base de datos".$con->error;
                header('Location: insumos.php');
            }
            $con->close();  
         }
  }  
  $conexion = new Insumos();
  $conexion->registroInsumos();