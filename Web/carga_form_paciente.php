<?php
include 'conection.php';
session_start();
ini_set('display_startup_errors',1); 
ini_set('display_errors',1);
error_reporting(-1);
if (!empty($_POST['dni']) && !empty($_POST['apellido'])) {


    $dni = $_POST['dni'];
    $name = $_POST['nombre'];
    $surname = $_POST['apellido'];
    $dire = $_POST['direccion'];
    $phone = $_POST['telefono'];
    $obra = $_POST['obrassocial'];


    $sql="INSERT INTO paciente  (name_paciente,surname,dire,phone,obra,dni)VALUES('$name','$surname', '$dire','$phone','$obra','$dni')";
    //ejecutamos la sentencia de sql    
    $ejecutar=mysqli_query($con,$sql);
    header("Location: form_paciente.php");
    
    
}


?>