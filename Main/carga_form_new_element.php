<?php
    include 'conection.php';

    // Subir Imagenes
    session_start();
    $message = ''; 
    if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'])
    {
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
        $uploadFileDir = './imagenes_elementos/';
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
        $cantidad = $_POST['cantidad'];
        $nombre = $_POST['nombre'];
        $imagen = $uploadFileDir.$fileName;


        $sql = "INSERT INTO elemento(stock, nombre, imagen) VALUES ('" . $cantidad . "', '".$nombre."', '".$imagen."')";
        mysqli_query($con, $sql) or die(mysqli_error($con));

    }
    header('Location: form_new_element.php');
?>