<?php
   
    ini_set('display_startup_errors',1); 
    ini_set('display_errors',1);
    error_reporting(-1);
     //conectamos Con el servidor
    $host ="192.168.88.62";
    $user ="root";
    $pass ="";
    $db="hospital_blue";

    
    //funcion llamada conexion con (dominio,usuarios,contraseña,base_de_datos)
    $con = mysqli_connect($host,$user,$pass,$db)or die("Problemas al Conectar");
    mysqli_select_db($con,$db)or die("problemas al conectar con la base de datos");


?>
