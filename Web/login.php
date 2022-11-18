<?php

include "conection.php";
ini_set('display_startup_errors',1); 
ini_set('display_errors',1);
error_reporting(-1);

if (!$con) 
{
	die("No hay conexión: ".mysqli_connect_error());
}

session_start();


if (!empty($_POST['txtusuario']) && !empty($_POST['txtpassword'])) {

	$dni = $_POST['txtusuario'];
	$pass = $_POST['txtpassword'];
    $query = mysqli_query($con,"SELECT * FROM register WHERE DNI = '".$dni."' and password = '".$pass."'");
    $nr = mysqli_num_rows($query);
    while($fila = $query->fetch_assoc()) {
        $nombre = $fila["name2"];
        
      }
    

    if($nr == 1)
	{	
	$_SESSION['username'] = $nombre;
    $_SESSION['show'] = "Medico"; 
	echo "Nice";
	header("Location: index.php");
	
	}
	else if ($nr == 0) 
	{
        $query2 = mysqli_query($con,"SELECT * FROM admins WHERE user = '".$dni."' and pass = '".$pass."'");
        $nra = mysqli_num_rows($query2);
        if($nra >= 1)
        {
            $_SESSION['username'] = $dni;
            $_SESSION['admin'] = 'admin';
            $_SESSION['show'] = "Administrador";
            echo "Nice";
	        header("Location: index.php");
            
        }
        else
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
            
        <div class="formulario" >
            <br>
            <h2 class="inicio"><b style="font-size: 2em;">Iniciar Sesión</b></h2>
            <br>

			

			<?php if(!empty($message)): ?>
			<p> <?= $message ?></p>
			<?php endif; ?>

            <form method="post" action="login.php">
                <table>
                    <label>DNI</label></td></tr>
                    <input type="text" name="txtusuario"/></td></tr>
                    <label>Contraseña</label></td></tr>
                    <input type="password" name="txtpassword" /> </td></tr>
                    <input type="submit" value="Ingresar" /> </td></tr>

                </table>
            </form>
        </div>
            
      <!--   <div class="formulario">
            <br>
            <h2 id="create" class="inicio">Crear Cuenta</h2>
            <form action="guardar.php" method="POST">
                <input type="text" name="user2" id = "user2"placeholder="Usuario" required>
                    
                <input type="password" name="pass2" id = "pass2" placeholder="Contraseña" required>
                    
                <input type="email" name="email" id = "email" placeholder="Correo Electronico" required>
                    
                <input type="text" name="tel" id = "tel" placeholder="Teléfono" required>
                    
                <input type="submit" value="Enviar">
                </form>            </div>
        
            <button class="reset-password">¿Olvidaste tu contraseña?</button>
            <!-- <a href="#">¿Olvidaste tu contraseña?</a> -->
        
        
    </div> -->
   

    <script src="js/fi.js"></script>    
    <script src="js/second.js"></script>
    
</body>
</html>