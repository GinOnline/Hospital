<?php

include 'conection.php';

    session_start();
    
    $id = $_POST['id_card'];
    echo $id;
    // Cambiamos el status a Devuelto  
    $eliminar = "UPDATE turnos
        SET status = 'ACCEPT'
        WHERE id_turno = ". $id." ";
    mysqli_query($con, $eliminar) or die(mysqli_error($con));


    // Seleccionamos el nombre del elemento
    $sql = "SELECT * FROM turnos WHERE id_turno = '".$id."'";
    $res = mysqli_query($con,$sql) or die(mysqli_error($con));
    $request = mysqli_fetch_array($res);


    date_default_timezone_set('America/Argentina/Cordoba');
    $DateAndTime = date('d/m/y h:i', time());

    // Fecha_devolucion
   /*  $setDevolucion = "UPDATE turnos
    SET fecha_devolucion = '". $DateAndTime."'
    WHERE ID = ". $id." ";
    mysqli_query($con,$setDevolucion) or die(mysqli_error($con)); */

   
    // Seleccionamos el stock del elemento
    




    header("Location: index.php");

        
?>