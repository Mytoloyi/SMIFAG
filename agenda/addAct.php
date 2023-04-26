<?php
session_start();
  if(empty($_POST["nombreActividad"]) || empty($_POST["descripcion"])) {
    $_SESSION["Error"] = "Todos los campos son obligatorios";
    header('Location: actividades.php');
    exit(); // Salir del script para evitar que se realice la inserción
  }
  
  include 'conexion.php';
  
  // Crear una consulta preparada con marcadores de posición (?)
  $sql = "INSERT INTO actividades(nombreActividad, descripcion) VALUES (?, ?)";
  
  // Preparar la consulta
  $stmt = $con->prepare($sql);
  
  // Vincular los parámetros con los valores recibidos por POST
  $stmt->bind_param("ss", $_POST["nombreActividad"], $_POST["descripcion"]);
  
  if($stmt->execute()){
    $_SESSION["registro"] = "Se ha registrado la actividad";
    header('Location: actividades.php');
  } else {
    $_SESSION["Error"] = "No ha sido posible registrar la actividad";
    header('Location: actividades.php');
  }
  
  $stmt->close();
  $con->close();
  

?>