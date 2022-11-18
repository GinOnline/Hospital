<?php
    include 'conection.php';

    session_start();
    ini_set('display_startup_errors',1); 
    ini_set('display_errors',1);
    error_reporting(-1);

    $usuario = $_SESSION['username'];

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

    // Subir Imagenes
    
    $message = '';
  
    if (isset($_POST['upload_file_btn']))
    {

        echo "NIce";

    
        
        
    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
    {
        
        // get details of the uploaded file
        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        $fileName = $_FILES['uploadedFile']['name'];
        $fileSize = $_FILES['uploadedFile']['size'];
        $fileType = $_FILES['uploadedFile']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // sanitize file-name
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
            $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
        }
    }
    else
    {
        $message = 'There is some error in the file upload. Please check the following error.<br>';
        $message .= 'Error:' . $_FILES['uploadedFile']['error'];
    }
    }
    $_SESSION['message'] = $message;

    // Comprobamos que no haya un error al cargar la imagen
    if ($_SESSION['message'] == 'File is successfully uploaded.')
    {
        // Cargar datos a la DBB

        $imagen = $uploadFileDir.$fileName;

        echo $imagen;

        $table_profile = "profile_" .$ids_user;     

        $sql="UPDATE $table_profile SET url_profile = '".$imagen."' WHERE  user = '".$usuario."'   ";
                //ejecutamos la sentencia de sql
        $ejecutar=mysqli_query($con,$sql);

        

    }
    //header('Location: form_new_element.php');
?>