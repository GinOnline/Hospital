<!DOCTYPE html>
<html lang="en">
<?php
include 'conection.php';
session_start();
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);



?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Elemento</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="StyleSheet" href="./css/element_paciente.css" type="text/css">

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
        <br>
        <p id="p" style="text-align: center;">Ingrese los Datos del Paciente</p>
        <br>
        <form id="fondoForm" method="POST" action="carga_form_paciente.php" enctype="multipart/form-data">

            <div id="volverBoth">
                <i class="fas fa-chevron-left" id="volverAtrasElemento"></i>
                <a id="volverAtras" onmouseover="cambioColor()" onmouseout="vueltaColor()" href="form_turno.php"> Volver</a>
            </div>


            <input type="numeric" class="inputElement" name="dni" placeholder="DNI" required><br>

            <div class="name_forms">
                <input type="text" class="inputElement" style="height: 2rem;" name="nombre" placeholder="Nombre" required> <span></span>
                <input type="text" class="inputElement" style="height: 2rem;" name="apellido" placeholder="Apellido" required>
            </div>

            <input type="text" class="inputElement" name="direccion" placeholder="Dirección" required><br>

            <input type="numeric" class="inputElement" name="telefono" placeholder="Teléfono" required><br>

            <select class="inputElement" style="margin-bottom: 3%;" name="obrassocial" required>
                <option value="" hidden>Seleccione la Obra Social</option>
                <?php
                $sql = "SELECT * FROM obrassociales";
                $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                while ($fila = mysqli_fetch_array($resultado)) {

                    echo  '<option value="' . $fila['codigo'] . '"> ' . $fila['nombre'] . '</option>';
                }

                ?>
            </select>



            <!-- Message -->
            <?php
            if (isset($_SESSION['message']) && $_SESSION['message'] && $_SESSION['message'] != 'File is successfully uploaded.') {
                echo '<b class="errorMessage";>' . $_SESSION['message'] . '</b>';
                unset($_SESSION['message']);
            }
            ?>
            <br>
            <input type="submit" id="cargarElemento" name="uploadBtn" value="Cargar" />
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>