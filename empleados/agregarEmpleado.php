<?php
session_start();

class Empleados{
   
    function registroEmpleado(){
        $servidor="localhost";
        $user="root";
        $password="";
        $database="finca_ganadera";
        $con= new mysqli($servidor,$user,$password,$database);

        if(empty($_POST["nombreEmpleado"]) || empty($_POST["apellidoEmpleado"]) || empty($_POST["documentoEmpleado"]) || empty($_POST["telefonoEmpleado"]) || empty($_POST["tipodeContrato"]) || empty($_POST["nomina"]) || empty($_POST["cargo"]) || empty($_POST["tipoDocumento"])) {
            $_SESSION["Error"] = "Todos los campos son obligatorios";
            header('Location: empleados.php');
            exit(); // Salir del script para evitar que se realice la inserción
        }

        $stmt = $con->prepare("INSERT INTO empleados(nombreEmpleado, apellidoEmpleado, documentoEmpleado, telefonoEmpleado,  tipodeContrato, nomina, idCargo, tipoDocumento) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $_POST["nombreEmpleado"], $_POST["apellidoEmpleado"], $_POST["documentoEmpleado"], $_POST["telefonoEmpleado"], $_POST["tipodeContrato"], $_POST["nomina"], $_POST["cargo"], $_POST["tipoDocumento"]);

        if($stmt->execute()){
            $_SESSION["registro"]="Se ha registrado al empleado";
            header('Location: empleados.php');
        }else{
            $_SESSION["Error"]="No se puede realizar el registro".$con->error;
            header('Location: empleados.php');
        }
        $stmt->close();  
        $con->close();  
    }
}  

$conexion = new Empleados();
$conexion->registroEmpleado();
?>
