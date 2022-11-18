<?php

include "conection.php";

if (!$con) 
{
	die("No hay conexión: ".mysqli_connect_error());
}

session_start();


if (!empty($_POST['txtusuario']) && !empty($_POST['txtpassword'])) {

	$nombre = $_POST['txtusuario'];
	$pass = $_POST['txtpassword'];
    $query = mysqli_query($con,"SELECT * FROM register WHERE user = '".$nombre."' and pass = '".$pass."'");
    $nr = mysqli_num_rows($query);

   

    if($nr == 1)
	{	
	$_SESSION['username'] = $nombre;
	echo "Nice";
	header("Location: index.php");
	
	}
	else if ($nr == 0) 
	{
	
		
		$message = 'Sorry, those credentials do not match';
	}
	
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" href="../img/logo.ico">
    <link rel="stylesheet" href="css/1.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200&family=Oswald:wght@300&family=Roboto:wght@300&family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">

       <!--  icono -->
    <link rel="icon" href="img/logo.ico" type="image/icon" sizes="16x16">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    
   
</head>
<body>
    <br>
    <br>
    <h1 class="title">Hospital - Codigo Azul</h1>
    <div  class="contenedor-form">
            <div class="">
                
            </div>
            
       
            
    <div class="formulario">
            <br>
            <h2 id="create" class="inicio">Crear Cuenta</h2>
            <form action="guardar.php" method="POST">



                <input type="number" name="dni" id = "dni" placeholder="DNI" required>

                <input type="number" name="num_mat" id = "num_mat" placeholder="Numero de Matricula" required>

                <input type="text" name="name2" id = "name2" placeholder="Nombre" required>
                    
                <input type="text" name="surname" id = "surname" placeholder="Apellido" required>
                <select name="especialidad" id="" required>
                    
                <option value="" disabled selected>Seleccione su especialidad</option>
                <?php
                $sql = "SELECT * FROM especialidades";
                $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                while ($fila = mysqli_fetch_array($resultado)) {

                    echo  '<option value="' . $fila['codigo'] . '"> '.$fila['descripcion'] .'</option>';
                }

                ?>
                

                   
                </select>
                    
                <input type="email" name="email" id = "email" placeholder="Correo Electronico" required>
                    
                <input type="text" name="tel" id = "tel" placeholder="Teléfono" required>

                <input type="password" name="pass2" id = "pass2" placeholder="Contraseña" required>
                    
                <input type="submit" value="Enviar">
                </form>            </div>
        
           
            <!-- <a href="#">¿Olvidaste tu contraseña?</a> -->
        
        
    </div>

</div>
   

    <script src="js/fi.js"></script>    
    <script src="js/second.js"></script>
    
</body>
</html>