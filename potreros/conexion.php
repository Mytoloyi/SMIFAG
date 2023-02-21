<?php
  

            $servidor="localhost";
            $user="root";
            $password="";
            $database="finca_ganadera";
            $con= new mysqli($servidor,$user,$password,$database);
            if($con->connect_error){  
            }else{  
            }
            return $con;
     
?>