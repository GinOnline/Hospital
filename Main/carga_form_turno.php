<?php
include 'conection.php';
session_start();
ini_set('display_startup_errors',1); 
ini_set('display_errors',1);
error_reporting(-1);

if (!empty($_POST['uploadBtn'])) {

    echo "Nice";
    $dni = $_POST['dni'];

    $diag = $_POST['diag'];
    $medi = $_POST['medi'];
    $pato = $_POST['pato'];
    $zona = $_POST['zona'];
    $priori = $_POST['priori'];
    date_default_timezone_set('America/Argentina/Cordoba');
        
    $currentTimeHours  = date('H:i:s', time()); 
    $currentTimeDate  = date('Y-m-d', time());  

    $now = time();
    $ten_minutes = $now + (15 * 60);
    $startDate = date('H:i:s', $now);
    $endDate = date('H:i:s', $ten_minutes);
    

    echo $dni;
    $sql = "SELECT name_paciente,surname FROM paciente WHERE dni = '".$dni."' ";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $name_person = $row["name_paciente"];
        $surname = $row["surname"];
        
    }
    }
    else
    {
        $_SESSION['message'] = "Paciente no encontrado";
        header("Location: form_turno.php");
    }
    

    
    

    $sql="INSERT INTO turnos  (dni,name_paciente,surname,diagnos ,medicamentos,patologias,zona,fecha_turno,time,time_estimated ,status,prioridad )VALUES('$dni','$name_person','$surname','$diag', '$medi','$pato','$zona','$currentTimeDate','$currentTimeHours','$endDate','PENDING','$priori')";
    //ejecutamos la sentencia de sql    
    $ejecutar=mysqli_query($con,$sql);
    header("Location: form_turno.php");
    
    
}


?>