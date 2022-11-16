<!DOCTYPE html>
<html lang="en">
    <?php
        include 'conection.php';
        session_start(); 
    ?>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Elemento</title>

    <!-- CSS -->
    <link rel="StyleSheet" href="./css/element.css" type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@500&display=swap" rel="stylesheet">

    <script>
        function cambioColor() {
            var flecha = document.getElementById('volverAtrasElemento');

            flecha.style.color = 'red';
        }

        function vueltaColor() {
            var flecha = document.getElementById('volverAtrasElemento');

            flecha.style.color = 'white';
        }
    </script>

</head>
<body>
    <div>

        <p id="p" style="text-align: center;">Ingrese los Datos del Elemento</p>

        <form id="fondoForm" method="POST" action="carga_form_new_element.php" enctype="multipart/form-data">

            <div id="volverBoth">
                <i class="fas fa-chevron-left" id="volverAtrasElemento"></i>
                <a id="volverAtras" onmouseover="cambioColor()" onmouseout="vueltaColor()" href="index.php"> Volver</a>
            </div>

        <br>

            <input type="text" class="inputElement" name="nombre" placeholder = "Nombre" required>     
            <br>
            <br> 
            <input type="stock" class="inputElement" name="cantidad" placeholder = "Cantidad" min = "1" required>  
            <br><br>

                <label>Sube una imagen:</label>
                <input id="subirArchivo" type="file" name="uploadedFile" />

            <br>
            <!-- Message -->
            <?php
                if (isset($_SESSION['message']) && $_SESSION['message'] && $_SESSION['message'] != 'File is successfully uploaded.')
                {
                    echo'<b class="errorMessage";>'.$_SESSION['message'].'</b>';
                    unset($_SESSION['message']);
                    
                }
            ?>
            <br>
            <input type="submit" id="cargarElemento" name="uploadBtn" value="Cargar" />
        </form>
    
    </div>  
</body>
</html>