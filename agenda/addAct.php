<?php
  include 'conexion.php';
  $sql="INSERT INTO actividades(nombreActividad, descripcion)
      VALUES('".$_POST["nombreActividad"]."','".$_POST["descripcion"]."');";

          if($con->query($sql)===TRUE){
              $_SESSION["Status"]="Se ha registrado la actividad";
              header('Location: actividades.php');
          }else{
              $_SESSION["ErrorDB"]="No ha sido posible establecer la conexión con la base de datos".$con->error;
              header('Location: actividades.php');
          }
          $con->close();

?>