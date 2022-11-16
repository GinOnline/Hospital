<?php

include "conection.php";
ini_set('display_startup_errors',1); 
ini_set('display_errors',1);
error_reporting(-1);

$n=6;
function getName($n) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
  
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
}




 //recuperar las variables
 $user2=$_POST['name2'];
 $pass2=$_POST['pass2'];
 $email=$_POST['email'];
 $tel = $_POST['tel'];
 //hacemos la sentencia de sql
echo $user2;
$query = mysqli_query($con,"SELECT name2,email FROM register WHERE name2 = '".$user2."' or email = '".$email."'");
$nr = mysqli_num_rows($query);


if($nr == 1)
{
    echo "User taken or mail pa";
    
}
else if ($nr == 0) 
{
    $id_user = getName($n);

    $dni = $_POST['dni'];
    $num_mat = $_POST['num_mat'];
    $name2 = $_POST['name2'];
    $surname = $_POST['surname'];
    $espe = $_POST['especialidad'];
    

 
    $sql="INSERT INTO register VALUES('$dni','$num_mat', '$name2','$surname','$espe','$email','$tel',
       '$pass2')";
    //ejecutamos la sentencia de sql
    $ejecutar=mysqli_query($con,$sql);

    echo"Datos Guardados Correctamente<br><a href='login.php'>Volver</a>";

}





?>

