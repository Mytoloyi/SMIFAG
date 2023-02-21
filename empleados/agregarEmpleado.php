<?php
  class Empleados{
   
         function registroEmpleado(){
            $servidor="localhost";
            $user="root";
            $password="";
            $database="finca_ganadera";
            $con= new mysqli($servidor,$user,$password,$database);
            $sql="INSERT INTO empleados(nombreEmpleado, apellidoEmpleado, documentoEmpleado, telefonoEmpleado, rangoEmpleado, tipodeContrato, nomina)
            VALUES('".$_POST["nombreEmpleado"]."','".$_POST["apellidoEmpleado"]."','".$_POST["documentoEmpleado"]."','".$_POST["telefonoEmpleado"]."','".$_POST["rangoEmpleado"]."','".$_POST["tipodeContrato"]."','".$_POST["nomina"]."');";

            if($con->query($sql)===TRUE){
                $_SESSION["Status"]="Se ha registrado al empleado";
                header('Location: empleados.php');
            }else{
                $_SESSION["ErrorDB"]="No ha sido posible establecer la conexión con la base de datos".$con->error;
                header('Location: empleados.php');
            }
            $con->close();  
         }
  }  
  $conexion = new Empleados();
  $conexion->registroEmpleado();

?>