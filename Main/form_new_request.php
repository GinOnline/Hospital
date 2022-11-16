<!DOCTYPE html>
<html>
<?php
include 'conection.php';
session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Petición</title>

    <!-- CSS -->
    <link rel="StyleSheet" href="./css/request.css" type="text/css">

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

    <p id="p" style="text-align: center;">Ingrese los Datos en el Formulario</p>

    <form action="carga_form_new_request.php" class="fondoForm" method="POST">

        <div id="volverBoth">
            <i class="fas fa-chevron-left" id="volverAtrasElemento"></i>
            <a id="volverAtras" onmouseover="cambioColor()" onmouseout="vueltaColor()" href="index.php"> Volver</a>
        </div>

        <label>Información de la/s Herramientas</label>
        <div class="tool_info" style="display: flex;">
            <input type="search" id="selectElemento" style="height: 2.4rem;width:70%;" name="elemento" placeholder="Elemento" list="listaElementos" required>
            <datalist id="listaElementos">
                <?php
                $sql = "SELECT * FROM elemento";
                $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                while ($fila = mysqli_fetch_array($resultado)) {

                    echo  '<option value="' . $fila['nombre'] . '">';
                }

                ?>
            </datalist>
            <input type="number" class="inputRequest" style="height: 2rem;width:30%;background-color:#23355a;" name="cantidad" placeholder="Cantidad" min="1" required>
            <!-- Hora -->
                    <?php
                        date_default_timezone_set('America/Argentina/Cordoba');
                
                        $currentTime = date('H:i', time());          

                    ?>  
                <input id="inputTime" type = "time" <?php echo 'min = "'.$currentTime.'"'?> max="20:10" class="inputRequest" name = "time" required>                

        </div>
        <!-- Mensaje de error -->
        <?php 
                if (!empty($_SESSION['error_form_request'])) {

                    print("<label class = 'error'> Error: " . $_SESSION['error_form_request'] . "</label>");
                    $_SESSION['error_form_request'] = "";
                }
            ?>
<br>

        <label>Información Personal</label>
        <div class="personal_info">

            <div class="name_forms">
                <input type = "text" class="inputRequest" style="height: 2rem;" name="nombre" placeholder="Nombre" required>              
                <input type = "text" class="inputRequest" style="height: 2rem;" name="apellido" placeholder="Apellido" required>
            </div>
            
            <select id="seleccioneCurso" style="height: 2.5rem;"name="curso" required>
                <option value="" hidden disabled selected>Seleccionar Curso</option>
                <?php
                for ($i = 1; $i <= 7; $i++) {
                    $sql = "SELECT * FROM Curso WHERE Curso LIKE '" . $i . "%' ORDER BY Curso";
                    $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
                    print('<optgroup label="' . $i . '° año">');

                    while ($fila = mysqli_fetch_array($resultado)) {

                        echo '<option value="' . $fila['Curso'] . '">' . $fila['Curso'] . '  </option>';
                    }
                }

                ?>
            </select>
        </div>
        <br>

        <input type="submit" id="enviarBoton" value="Enviar">
    </form>

</body>

</html>