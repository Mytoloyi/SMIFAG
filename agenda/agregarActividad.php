<?php
  class Agenda{
   
         function registroActividad(){
            $servidor="localhost";
            $user="root";
            $password="";
            $database="finca_ganadera";
            $con= new mysqli($servidor,$user,$password,$database);
            $sql="INSERT INTO agenda(idAct, fecha, idEmpledo)
            VALUES('".$_POST["nombreActividad"]."','".$_POST["fecha"]."','".$_POST["idEmpledo"]."');";

            if($con->query($sql)===TRUE){
                $_SESSION["Status"]="Se ha registrado al empleado";
                header('Location: agenda.php');
            }else{
                $_SESSION["ErrorDB"]="No ha sido posible establecer la conexión con la base de datos".$con->error;
                header('Location: agenda.php');
            }
            $con->close();  
         }
  }  
  $conexion = new Agenda();
  $conexion->registroActividad();

?>