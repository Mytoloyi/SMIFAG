<?php
session_start();
if(empty($_POST["nombreActividad"]) || empty($_POST["fecha"]) || empty($_POST["idEmpledo"])) {
  $_SESSION["Error"] = "Todos los campos son obligatorios";
  header('Location: agenda.php');
  exit(); // Salir del script para evitar que se realice la inserción
}

class Agenda {
  function registroActividad() {
    $servidor = "localhost";
    $user = "root";
    $password = "";
    $database = "finca_ganadera";
    $con = new mysqli($servidor, $user, $password, $database);

    // Crear una consulta preparada con marcadores de posición (?)
    $sql = "INSERT INTO agenda(idAct, fecha, idEmpledo) VALUES (?, ?, ?)";

    // Preparar la consulta
    $stmt = $con->prepare($sql);

    // Vincular los parámetros con los valores recibidos por POST
    $stmt->bind_param("sss", $_POST["nombreActividad"], $_POST["fecha"], $_POST["idEmpledo"]);

    if($stmt->execute()) {
      $_SESSION["registro"] = "Se ha registrado la actividad";
      header('Location: agenda.php');
    } else {
      $_SESSION["Error"] = "No ha sido posible registrar la actividad";
      header('Location: agenda.php');
    }

    $stmt->close();
    $con->close();
  }
}

$agenda = new Agenda();
$agenda->registroActividad();

?>