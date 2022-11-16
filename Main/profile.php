<?php
include 'conection.php';
ini_set('display_startup_errors',1); 
ini_set('display_errors',1);
error_reporting(-1);

session_start();
$usuario = $_SESSION['username'];




$sql = "SELECT DNI FROM register WHERE name2 = '".$usuario."' ";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $ids_user = $row["DNI"];
    
  }
}


 $table_profile = 'profile_'.$ids_user;
 $sql = "SHOW TABLES LIKE '".$table_profile."'";
 $result = $con->query($sql);
 
 
 
if($result->num_rows != 1) {

    $sql = "SELECT email FROM register   WHERE name2 = '".$usuario."' ";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $mail = $row["email"];
        
        }
    }

    $sql = "CREATE TABLE $table_profile " . '
    ( id_profile INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user varchar(15) NOT NULL, status VARCHAR(30) NOT NULL, biography varchar(90) NOT NULL, phone varchar(10) NOT NULL, url_profile varchar(50) not null)';

    

    $con->query($sql);

    $default = "SIN DATOS ";
    $default_profile = './img/default_pic.jpeg';
    $sql = "INSERT INTO ".$table_profile." (user,status,biography,phone, url_profile) VALUES (? , ?, ?, ?, ?)"; 
    $stmt = $con->prepare($sql);

    $stmt->bind_param("sssss",$usuario, $default,$default,$default, $default_profile);


    $stmt->execute();


    
}

$data_profile = array();






$sql = "SELECT  * FROM $table_profile WHERE user = '".$usuario."'  ORDER BY `id_profile` ASC";
$result = $con->query($sql);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {


    $data_profile[0] = $row["status"];
    $data_profile[1] = $row["biography"];
   
    $data_profile[2] = $row["phone"];
    $data_profile[3] = $row["url_profile"];
    
    
    }
}
    






echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentacion</title>

     <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

     <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/profile.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600&display=swap" rel="stylesheet"> 
    
    <!-- Icono -->
    <link rel="icon" href="img/logo.ico" type="image/icon" sizes="16x16">

    <title>Admin</title>
</head>
<body>

    <p id="p1"> Información del Perfil</p>
    <p><a href="index.php">Volver al Inicio</a></p>
    <div id="rectanguloContenedor" class="container">
        
        
    

        <form action="update-profile.php" method="POST" enctype="multipart/form-data">
           
           
            <img src="'.$data_profile[3].'" width="20%" id="profile" height="20%"><br><br>
            <label style="color: white;">Sube una imagen:</label>
            <input id="subirArchivo" type="file" name="uploadedFile" />
            <center><button name="upload_file_btn">Editar Imagen</button></center>
            
            <label class="textoRectagulo">Estado</label><br>
            <input class="inputTexto" type="text" placeholder="'.$data_profile[0].'" name="status" value="'.$data_profile[0].'"><br>
            
    
            <label class="textoRectagulo">Biografía</label><br>
            <input class="inputTexto" type="text" placeholder="'.$data_profile[1].'" name="biography" value="'.$data_profile[1].'" ><br>            
            
            
            <label class="textoRectagulo">Teléfono</label><br>
            <input class="inputTexto" type="numeric" placeholder="'.$data_profile[2].'" name="phone" value="'.$data_profile[2].'""><br>
        
            <center><button name="done">Guardar</button></center>
        </form>
    </div>
</body>
</html>';

?>