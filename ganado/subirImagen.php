<?php
include 'conexion.php';
$id= $_GET['id'];
$directorio = "imagen/";  
$archivo = $directorio.basename($_FILES["archivoSubir"]["name"]);
$estado = 1;
$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
if (isset($_POST["subir"])) {
    $verificar = getimagesize($_FILES["archivoSubir"]["tmp_name"]);
    if ($verificar == false) {
        $estado = 0;
    }else{
        
    }
}
if (file_exists("$archivo")) {
    $estado=0;
}
if ($tipoArchivo != "png" && $tipoArchivo != "jpeg" && $tipoArchivo != "jpg") {
    $estado = 0;
}else{
}
if($_FILES["archivoSubir"]["size"]>5000000){
    $estado = 0;
}else{
  
}    
if($estado == 1){
    if(move_uploaded_file($_FILES["archivoSubir"]["tmp_name"], $archivo)){
    // if(move_uploaded_file($_FILES["archivoSubir"]["tmp_name"], $directorio."nombreArchivo".$tipoArchivo)){
        // echo "<br> El archivo ". basename($_FILES["archivoSubir"]["name"]). " ha sido subido exitosamente";
    }else{
        // echo "Ha ocurrido un error";
    }
}else{
    // echo "Lo sentimos, el archivo no ha podido subirse";
}

$actualiza="UPDATE ganado SET tratamiento = '$archivo' WHERE idRes='$id'";
        
$actualizar= $con->query($actualiza);
header("location: controlGanado.php?id=".$id."");
?>