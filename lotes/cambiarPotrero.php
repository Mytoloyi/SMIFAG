<?php
include '../conexion/conexion.php';
$conexion = new Conexion();
$con = $conexion->conectarDB();

if(isset($_GET['actual']) && isset($_GET['nuevo'])){
    $actual = $_GET['actual'];
    $nuevo = $_GET['nuevo'];

    $sql = "UPDATE ganado SET idPotrero = $nuevo WHERE idPotrero = $actual";
    if($con->query($sql)){
        echo "Se han actualizado los registros correctamente.";
    } else {
        echo "Hubo un error al actualizar los registros.";
    }
    
}
$con->close();

?>
