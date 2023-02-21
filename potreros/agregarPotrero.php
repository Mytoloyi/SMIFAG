<?php
  class  Potreros{
   
         function registroPotreros(){
            $servidor="localhost";
            $user="root";
            $password="";
            $database="finca_ganadera";
            $con= new mysqli($servidor,$user,$password,$database);
            $sql="INSERT INTO potrero(nombrePotrero, estadoPotrero, medida)
            VALUES('".$_POST["nombrePotrero"]."','".$_POST["estadoPotrero"]."','".$_POST["medida"]."');";

            if($con->query($sql)===TRUE){
                $_SESSION["Status"]="Se ha registrado el potrero";
                header('Location: potreros.php');
            }else{
                $_SESSION["ErrorDB"]="No ha sido posible establecer la conexión con la base de datos".$con->error;
                header('Location: potreros.php');
            }
            $con->close();  
         }
  }  
  $conexion = new Potreros();
  $conexion->registroPotreros();