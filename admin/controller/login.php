<?php
session_start();
    class Login{
        private $usuario;
        private $password;
        
        function inicio(){
            $usuario= $_POST["user"];
            include 'seguridad.php';
            $encriptar =new Seguridad();
            $password= $encriptar->encriptarP($_POST["password"]);

            include 'conexion.php';
            $conexion = new Conexion();
            $con = $conexion->conectarDB();
            $sql="SELECT * FROM administrador WHERE usuario='".$usuario."' AND password='".$password."';";
            $resultset = $con->query($sql);

            if($resultset->num_rows>0){
                while ($fila=$resultset->fetch_assoc()){
                    $_SESSION["Usuario"]=$fila["usuario"];
                    header ('Location: ../gestor.php');
                }
            }else{
                $_SESSION["Error"]="Por favor verifique sus credenciales de acceso";
                header ('Location: ../index.php');   
            }
            $con->close();
        }

    }
    $init= new Login();
    $init->inicio();
?>