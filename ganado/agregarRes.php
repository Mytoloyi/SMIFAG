<?php
session_start();
class Ganado{
 
    function registroGanado(){
        $servidor="localhost";
        $user="root";
        $password="";
        $database="finca_ganadera";
        $con= new mysqli($servidor,$user,$password,$database);
        if(empty($_POST["raza"]) || empty($_POST["colorRes"]) || empty($_POST["categoriaEdad"]) || empty($_POST["tipoNegocio"]) || empty($_POST["marcaRes"]) || empty($_POST["estadoRes"]) || empty($_POST["precioinicial"]) || empty($_POST["precioFinal"]) || empty($_POST["nombrePotrero"])) {
            $_SESSION["Error"] = "Todos los campos son obligatorios";
            header('Location: ganado.php');
            exit(); // Salir del script para evitar que se realice la inserción
        }
        $stmt = $con->prepare("INSERT INTO ganado(raza, colorRes, categoriaEdad, tipoNegocio, idSocio, marcaChapeta, estado, precioinicial, precioFinal, idPotrero) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssss", $_POST["raza"], $_POST["colorRes"], $_POST["categoriaEdad"], $_POST["tipoNegocio"], $_POST["marcaRes"], $_POST["marcaChapeta"], $_POST["estadoRes"], $_POST["precioinicial"], $_POST["precioFinal"], $_POST["nombrePotrero"]);
        if($stmt->execute()){
            $_SESSION["registro"]="Se ha realizado el registro";
            header('Location: ganado.php');
        }else{
            $_SESSION["Error"]="No se ha realizado el registro".$con->error;
            header('Location: ganado.php');
        }
        $stmt->close();
        $con->close();  
    }
}  
$conexion = new Ganado();
$conexion->registroGanado();


?>