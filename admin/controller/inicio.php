<?php
    // session_start();
    // class Configuracion{
    //     private $servidor;
    //     private $user;
    //     private $password;
    //     private $status=0;

    //    public function conexion(){
    //         $servidor="localhost";
    //         $user="root";
    //         $password="";
    //         $con= new mysqli($servidor,$user,$password);
    //         return $con;
    //     }

    //     function conectarDB(){
    //         $servidor="localhost";
    //         $user="root";
    //         $password="";
    //         $database="finca_ganadera";
    //         $con= new mysqli($servidor,$user,$password,$database);
            
    //         if($con->connect_error){
    //             $_SESSION["ErrorDB"]="No ha sido posible establecer la conexión con la base de datos".$con->error;
    //             header('Location: ../index.php');
    //         }else{
    //             $_SESSION["Status"]="Se ha creado con la base de datos exitosamente";
    //             header('Location: ../index.php');
    //         }
    //         return $con;
    //     }

    
        
    //     function crearUsuario(){
    //         $con=$this->conectarDB();
    //         include 'seguridad.php';
    //         $limpieza= new Seguridad();
    //         $password=$limpieza->encriptarP($_POST["password"]);
    //         $sql="INSERT INTO administrador(usuario, password)
    //         VALUES('".$_POST["user"]."','".$password."');";

    //         if($con->query($sql)===TRUE){
    //             $_SESSION["Status"]="Se ha creado usuario";
    //             header('Location: ../index.php');
    //         }else{
    //             $_SESSION["ErrorDB"]="No ha sido posible establecer la conexión con la base de datos".$con->error;
    //             header('Location: ../index.php');
    //         }
    //         $con->close();
    //     }
    // }
    // $conexion = new Configuracion();

    // $conexion->crearUsuario();
?>