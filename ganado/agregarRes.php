<?php
  class Ganado{
   
         function registroGanado(){
            $servidor="localhost";
            $user="root";
            $password="";
            $database="finca_ganadera";
            $con= new mysqli($servidor,$user,$password,$database);
            $sql="INSERT INTO ganado(raza, colorRes, categoriaEdad, tipoNegocio, idSocio, marcaChapeta, estado, precioinicial, precioFinal, idPotrero)
            VALUES('".$_POST["raza"]."','".$_POST["colorRes"]."', '".$_POST["categoriaEdad"]."','".$_POST["tipoNegocio"]."', '".$_POST["marcaRes"]."','".$_POST["marcaChapeta"]."','".$_POST["estadoRes"]."', '".$_POST["precioinicial"]."','".$_POST["precioFinal"]."','".$_POST["nombrePotrero"]."');";

            if($con->query($sql)===TRUE){
                $_SESSION["Status"]="Se ha registrado la res";
                header('Location: ganado.php');
            }else{
                $_SESSION["ErrorDB"]="No ha sido posible establecer la conexión con la base de datos".$con->error;
                header('Location: ganado.php');
            }
            $con->close();  
         }
  }  
  $conexion = new Ganado();
  $conexion->registroGanado();

?>