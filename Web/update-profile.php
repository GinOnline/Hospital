<?php 
include 'conection.php';
session_start();

ini_set('display_startup_errors',1); 
ini_set('display_errors',1);
error_reporting(-1);


$usuario = $_SESSION['username'];




if(!isset($usuario)){

	header('location: login.php');

}else{

	echo "<h1> Welcome $usuario </h1>"; 

	echo "<a href='close.php'> Salir </a><br>";
    echo "<br>";

}

$sql = "SELECT DNI FROM register WHERE name2 = '".$usuario."' ";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $ids_user = $row["DNI"];
      
    }
    $result->free();

}   

echo $ids_user;




if (isset($_POST['upload_file_btn'])){


  $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
  $fileName = $_FILES['uploadedFile']['name'];
  $fileSize = $_FILES['uploadedFile']['size'];
  $fileType = $_FILES['uploadedFile']['type'];
  $fileNameCmps = explode(".", $fileName);
  $fileExtension = strtolower(end($fileNameCmps));

  echo $fileName;

  $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // check if file has one of the following extensions
  $allowedfileExtensions = array('jpg', 'jpeg', 'png', 'ico', 'bmp', 'tif');

  if (in_array($fileExtension, $allowedfileExtensions))
  {
  // directory in which the uploaded file will be moved
  $uploadFileDir = './profile_name/';
  $dest_path = $uploadFileDir . $fileName;

  if(move_uploaded_file($fileTmpPath, $dest_path)) 
  {
      $message ='File is successfully uploaded.';
  }
  else 
  {
      $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
  }
  }
  else
  
    {
        $message = 'There is some error in the file upload. Please check the following error.<br>';
        $message .= 'Error:' . $_FILES['uploadedFile']['error'];
    }
    
}
$_SESSION['message'] = $message;
if ($_SESSION['message'] == 'File is successfully uploaded.')
    {
        // Cargar datos a la DBB

        $imagen = $uploadFileDir.$fileName;

        echo $imagen;

        $table_profile = "profile_" .$ids_user;     

        $sql="UPDATE $table_profile SET url_profile = '".$imagen."' WHERE  user = '".$usuario."'   ";
                //ejecutamos la sentencia de sql
        $ejecutar=mysqli_query($con,$sql);
        header("Location: profile.php?updated");
        

    }


if (isset($_POST['done'])){

$data = array();
$data[0] = $_POST["status"];
$data[1] = $_POST["biography"];
$data[2] = $_POST["phone"];

$table_profile = 'profile_'.$ids_user;

$sql = "SELECT url_profile FROM ".$table_profile."  WHERE user = '".$usuario."' ";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $url_profile = $row["url_profile"];
    
  }
  $result->free();

}   


print_r($data);



$sql = "INSERT INTO ".$table_profile." (user,status,biography,phone, url_profile) VALUES (? , ?, ?, ?,  ?)"; 
$stmt = $con->prepare($sql);

$stmt->bind_param("sssss",$usuario, $data[0],$data[1],$data[2],$url_profile);


$stmt->execute();

header("Location: profile.php?updated");



}

else{

#header("Location: profile.php?error");

}

?>