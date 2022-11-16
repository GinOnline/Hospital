<!DOCTYPE html>
<html lang="en">
<?php
include 'conection.php';
session_start();
if (!isset($_SESSION['condicion_sb'])) {
    $_SESSION['condicion_sb'] = "";
}

?>

<head>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- JQuery  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="StyleSheet" href="./css/index.css" type="text/css">
    <link rel="StyleSheet" href="./css/historial.css" type="text/css">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

    <title>Historial</title>


</head>

<body>

    <header>
        <h2 class="logo">
            <a style="text-decoration: none; margin:0;" href="index.php">
                <img src="./img/Pañol_3.png" height="115px">
            </a>
        </h2>

        <nav>
            <ul>
                <li>
                    <a class="header-btn" href="index.php">Inicio</a>
                </li>
                <li>
                    <a class="header-btn active" href="historial.php">Historial</a>
                </li>
                <li>
                    <a class="header-btn" href="form_new_element.php">Nuevo Elemento</a>
                </li>

                <li>
                    <a class="logOut" href="close.php">LogOut</a>
                </li>

            </ul>
            <a href="#"></a>
        </nav>
    </header>

    <div class="col-11 row justify-content-center" style="margin: 25px auto;">

        <div class="header-tools row justify-content-center col-12" style="padding:30px 0 30px 0; margin-top:20px;">

            <!-- Etiquetas -->
            <div class="col-4 d-flex justify-content-around row">
                <div class="col-4">
                    <span class="fitrar_text">Filtrar por:</span>
                </div>
                
                <?php
                // Definimos la searchbar
                if (!empty($_GET['seachbar_input'])) {
                    $searchbar = trim($_GET['seachbar_input']);
                    $_SESSION['condicion_sb'] .= "," . $searchbar;



                    // print($_SESSION['condicion_sb']);

                } else {
                    $searchbar = "";
                }

                if (!empty($_SESSION['condicion_sb'])) {
                    $array = explode(",", $_SESSION['condicion_sb']);
                    if (isset($_GET['label_ondelete'])) {
                        unset($array[$_GET['label_ondelete']]);
                        $array = array_values($array);
                        $_SESSION['condicion_sb'] = implode(",", $array);
                        // print_r($array);
                    }
                    echo "<div class ='col-8 row'>";
                    for ($i = 1; $i < count($array); ++$i) {
                        // Etiquetas de filtro
                        echo '                            
                            <div class "etiqueta_filtro" style ="
                            max-width:40%;
                            background-color:black;
                            margin: 5px;
                            padding: 6px;
                            text-transform:uppercase;
                            font-weight: bold;
                            box-shadow: 2px 3px 5px 0px rgba(0,0,0,0.75);
                            -webkit-box-shadow: 2px 3px 5px 0px rgba(0,0,0,0.75);
                            -moz-box-shadow: 2px 3px 5px 0px rgba(0,0,0,0.75);
                            border-radius:3px;
                            ">
                                <span>' . $array[$i] . '</span>
                                <a href ="historial.php?label_ondelete=' . $i . '" style = " color: #5c0202;float:rigth;"><i class="fa fa-trash"></i></a>
                            </div>';
                    }
                    echo "</div>";
                }


                ?>
            </div>
            <!--SearchBar -->
            <div class="col-4 justify-content-start">
                <div class="col-9">
                    <form class="d-flex input-group" id="searchbar" method="GET">
                        <input class="form-control" type="search" name="seachbar_input" placeholder="Buscar..." aria-label="Search">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Ordenador de archivos -->
            <div class="d-flex justify-content-end col-3" id="select">
                <form action="" class="col-9" id="ordenador" method="post">
                    <select class="form-select" name="select_ordenador" onchange="selectOptionSort()" aria-label="Default select example">
                        <option value="" selected disabled>Ordenar por:</option>
                        <?php
                        if (!empty($_POST['select_ordenador'])) {
                            $seleccionador = $_POST['select_ordenador'];
                            echo '<option selected> Ordenado por:  ' . $seleccionador . ' </option>';
                        }

                        ?>
                        <optgroup label="Ordenar por Nombre">
                            <option value="nombre ASC">A-Z</option>
                            <option value="nombre DESC">Z-A</option>
                        </optgroup>

                        <optgroup label="Ordenar por fecha">
                            <option value="fecha_generacion DESC">Más recientes</option>
                            <option value="fecha_generacion ASC">Más antiguos</option>
                        </optgroup>

                    </select>
                </form>
            </div>

        </div>

        <table class="table table-hover table-striped table-dark">
            <thead style="text-align:center">
                <tr>
                    <!-- <th><input type="checkbox" name="" id=""></th> -->
                    <th>ID</th>
                    <th>Curso</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Elemento</th>
                    <th>Pañolero</th>
                    <th>Fecha y hora</th>
                </tr>
            </thead>
            <tbody style="text-align:center">
                <?php

                // Definimos la variable ordenador
                if (!empty($_POST['select_ordenador'])) {
                    $seleccionador = $_POST['select_ordenador'];
                } else {
                    $seleccionador = "fecha_generacion";
                }

                // Definimos el final prompt seachbar

                if (!empty($_SESSION['condicion_sb'])) {
                    $final_prompt = "";
                    $array = explode(",", $_SESSION['condicion_sb']);
                    foreach ($array as $key) {
                        $final_prompt .= " AND 
                        (nombre LIKE '%" . $key . "%' OR elemento LIKE '%" . $key . "%' OR curso LIKE '%" . $key . "%' OR apellido LIKE '%" . $key . "%')";
                    }
                    // print($final_prompt);
                } else {
                    $final_prompt = "";
                }




                // Creamos la paginacion de la tabla

                if (!empty($_POST['n-entries'])) {
                    $_SESSION['n-entries'] = $_POST['n-entries'];
                }
                if (!empty($_SESSION['n-entries'])) {
                    $limit = $_SESSION['n-entries'];
                } else {
                    $limit = 10;
                }


                if (isset($_GET["page"])) {
                    $page = $_GET["page"];
                }

                if (empty($page)) {
                    $start = 0;
                    $page = 1;
                } else {
                    $start = ($page - 1) * $limit;
                }

                $consulta = mysqli_query($con, "SELECT * FROM request WHERE status = 'DEVUELTO' " . $final_prompt . " ");
                $num = mysqli_num_rows($consulta);

                $total_paginas = ceil($num / $limit);





                $sql = "SELECT * FROM request WHERE status = 'DEVUELTO' " . $final_prompt . " 
                ORDER BY " . $seleccionador . " 
                LIMIT " . $start . "," . $limit . "";

                // original 
                // $sql = "SELECT * FROM request ORDER BY ID  LIMIT ".$start.",".$limit."";

                $resultado = mysqli_query($con, $sql);

                if (mysqli_num_rows($resultado) == 0) {
                    echo '
                    <p style = "
                    font-size:30px;
                    background-color: #1a1a1a;
                    margin:0;
                    padding: 15px;
                    text-align: center;
                    border-bottom:2px solid #a7c4af ;

                    ">
                        No se encontraron resultados
                    </p>
                    
                    ';
                }


                while ($fila = mysqli_fetch_array($resultado)) {
                ?>
                    <!-- Tabla con datos a mostrar -->
                    <tr>

                        <!-- <td scope="row"><input type="checkbox" name="" id=""></td> -->
                        <th><?php print($fila['ID']); ?></th>
                        <td><?php print($fila['curso']); ?></td>
                        <td><?php print($fila['nombre']); ?></td>
                        <td><?php print($fila['apellido']); ?></td>
                        <td><?php print($fila['elemento']); ?></td>
                        <td><?php print($fila['pañolero']); ?></td>
                        <td><?php print($fila['fecha_generacion']); ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>


        <div class="footer-tools">
            <form class="list-items dark" id="maxResultados" action="" method="POST">
                Mostrar
                <select name="n-entries" id="n-entries" class="n-entries" onchange="selectMaxResultados()">
                    <?php
                    if (!empty($_SESSION['n-entries'])) {
                        echo '<option selected disabled>' . $_SESSION['n-entries'] . '</option>';
                    }

                    ?>
                    <option value="1">1</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>

                </select>
                resultados
            </form>

            <div class="pages">
                <?php
                // Navbar de la paginacion

                echo '<nav  style = "margin: auto 22vw">';
                echo '<ul class="pagination justify-content-center">';

                if ($total_paginas > 1) {
                    if ($page != 1) {
                        echo '<li class="page-item"><a class="page-link" href="historial.php?page=' . ($page - 1) . '"><span aria-hidden="true">&laquo;</span></a></li>';
                    }
                    if ($page > 3) {
                        echo '<li class="page-item"><a class="page-link" href="historial.php?page=1">1</a></li>';
                        echo '<li class="page-item"><a class="page-link" href="#">...</a></li>';
                    }
                    for ($i = 1; $i <= $total_paginas; $i++) {
                        if ($page == $i) {
                            echo '<li class="page-item active"><a class="page-link" href="#">' . $page . '</a></li>';
                        } else if ($page - $i < 3 && $page - $i > -3) {
                            echo '<li class="page-item"><a class="page-link" href="historial.php?page=' . $i . '">' . $i . '</a></li>';
                        }
                    }
                    if ($total_paginas - $page > 3) {
                        echo '<li class="page-item"><a class="page-link" href="#">...</a></li>';
                        echo '<li class="page-item"><a class="page-link" href="historial.php?page=' . $total_paginas . '">' . $total_paginas . '</a></li>';
                    }


                    if ($page != $total_paginas) {
                        echo '<li class="page-item"><a class="page-link" href="historial.php?page=' . ($page + 1) . '"><span aria-hidden="true">&raquo;</span></a></li>';
                    }
                }
                echo '</ul>';
                echo '</nav>';

                ?>
            </div>
        </div>



    </div>

    <script>
        function selectMaxResultados() {

            let maxResultados = document.getElementById('maxResultados');
            maxResultados.submit();


        }

        function selectOptionSort() {

            let option = document.getElementById('ordenador');
            option.submit();


        }

        function SeachBar() {

            let searchbar = document.getElementById('searchbar');


            searchbar.submit();

        }
    </script>
</body>

</html>