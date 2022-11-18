<!DOCTYPE html>
<html>
<?php
include 'conection.php';
session_start();
if (!isset($_SESSION['condicion_sb'])) {
    $_SESSION['condicion_sb'] = "";
}
$usuario = $_SESSION['username'];

if (!isset($usuario)) {

    header('location: login.php');
}
if (isset($_SESSION['admin'])) {
    $HideForAdmin = 'style = "display:none;"';
    $HideForUser = " ";
} else {
    $HideForAdmin  = " ";
    $HideForUser  = $HideForAdmin = 'style = "display:none;"';
}

?>

<head>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- JQuery  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript" src="./js/clock.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="StyleSheet" href="./css/index.css" type="text/css">
    <link rel="StyleSheet" href="./css/historial.css" type="text/css">
    <link href="http://fonts.cdnfonts.com/css/ds-digital" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/roboto" rel="stylesheet">


    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />




    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

    <link rel="icon" href=".\img\logo.ico">
    <title>Historial</title>


</head>

<body>
    <header class="bg-dark">
        <nav class="up_nav"><span style="margin-left:205px; color:white; font-size:35px"><?php echo  $_SESSION['show'] ?></span>
            <!-- Clock -->

            <!-- <ul>
        <li>
        <span class="me-2"><button id="clock" type="button" class="header-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
        </li>
      </ul> -->


        </nav>
        <center>
        <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
            <div class="offcanvas-body p-0">
                <nav class="navbar-dark">
                    <div class="navbar-nav">
                        <li>
                            <div class="text-muted small fw-bold text-uppercase px-3">
                                <h2 class="logo">
                                    <a style="text-decoration: none; margin:0;" href="index.php">
                                        <center><img src="./img/logo.png" height="90px"></center>
                                    </a>
                                </h2>
                            </div>
                        </li>

                        <!-- Inicio -->

                        <div class="sb1">
                            <a class="side-links nav-link active px-3" style="margin-top: 20px;" href="index.php">
                                <span class="me-2 side-links-text"><i class="fas fa-home"></i>Inicio</span>
                            </a>
                        </div>

                        <!-- Historial -->

                        <div class="sb2">
                            <center>
                                <hr color="gray">
                            </center>
                            <a class="side-links nav-link px-3" href="historial.php">
                                <span class="me-2 side-links-text"><i class="fas fa-history"></i>Historial</span>
                            </a>
                        </div>
                        
                        <!-- Dashboard -->

                        <div class="sb6" <?php echo $HideForUser; ?>>
                            <center>
                                <hr color="gray">
                            </center>
                            <a class="side-links nav-link px-3" href="dashboard.php">
                                <span class="me-2 side-links-text"><i class="fas fa-chart-line"></i></i>Dashboard</span>
                            </a>
                        </div>

                        <!-- Register -->

                        <div class="sb3" <?php echo $HideForUser; ?>>
                            <div></div>
                            <center>
                                <hr color="gray">
                            </center>
                            <a class="side-links nav-link px-3" href="register.php">
                                <span class="me-2 side-links-text"> <i class="fas fa-user-plus"></i>Registro</span>
                            </a>
                        </div>

                        <!-- Perfil -->

                        <div class="sb4">
                            <center>
                                <hr color="gray" >
                            </center>
                            <a class="side-links nav-link px-3" href="profile.php">
                                <span class="me-2 side-links-text"><i class="fas fa-user-circle"></i>Perfil</span>
                            </a>
                        </div>

                        <!-- LogOut -->

                        <div class="sb5">
                            <center>
                                <hr color="gray">
                            </center>
                            <a class="side-links nav-link px-3" href="close.php">
                                <span class="me-2 side-links-text"><i class="fas fa-sign-out-alt"></i> LogOut</span>
                            </a>
                        </div>

                        </li>
                        <li>
                    </div>
                </nav>
            </div>
        </div></center>



        <!-- JavaScript Includes -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Proximas 5 devoluciones </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php

                        date_default_timezone_set('America/Argentina/Cordoba');

                        $currentTime = date('Y-m-d', time());

                        $query = mysqli_query($con, "SELECT * FROM turnos WHERE fecha_turno = '" . $currentTime . "' ORDER BY fecha_turno LIMIT 5");
                        while ($fila = mysqli_fetch_array($query)) {
                            print('<p>' . $fila['nombre_paciente'] . ' ' . $fila['surname'] . ' || Hora estimada: ' . $fila['time'] . '</p>');
                            echo "<hr>";
                        }


                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    
    <div style="margin-left:11.4%;--bs-gutter-x:0;">

        <br>
        <div class="items-container display-flex row justify-content-center">
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
                                    <option value="name_paciente ASC">A-Z</option>
                                    <option value="name_paciente DESC">Z-A</option>
                                </optgroup>

                                <optgroup label="Ordenar por fecha">
                                    <option value="fecha_turno DESC">Más recientes</option>
                                    <option value="fecha_turno ASC">Más antiguos</option>
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
                            <th>DNI </th>
                            <th>Nombre y Apellido</th>
                            <th>Diagnostico</th>
                            <th>Medicamentos</th>
                            <th>Patologias</th>
                            <th>Fecha de turno</th>
                        </tr>
                    </thead>
                    <tbody style="text-align:center">
                        <?php

                        // Definimos la variable ordenador
                        if (!empty($_POST['select_ordenador'])) {
                            $seleccionador = $_POST['select_ordenador'];
                        } else {
                            $seleccionador = "id_turno";
                        }

                        // Definimos el final prompt seachbar

                        if (!empty($_SESSION['condicion_sb'])) {
                            $final_prompt = "";
                            $array = explode(",", $_SESSION['condicion_sb']);
                            foreach ($array as $key) {
                                $final_prompt .= " AND 
                (dni LIKE '%" . $key . "%' OR patologias LIKE '%" . $key . "%' OR name_paciente LIKE '%" . $key . "%' OR medicamentos LIKE '%" . $key . "%' OR diagnos LIKE '%" . $key . "%')";
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

                        $consulta = mysqli_query($con, "SELECT * FROM turnos WHERE status = 'ACCEPT' " . $final_prompt . " ");
                        $num = mysqli_num_rows($consulta);

                        $total_paginas = ceil($num / $limit);





                        $sql = "SELECT * FROM turnos WHERE status = 'ACCEPT' " . $final_prompt . " 
        ORDER BY " . $seleccionador . " 
        LIMIT " . $start . "," . $limit . "";

                        // original 
                        // $sql = "SELECT * FROM turnos LIMIT ".$start.",".$limit."";

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
                                <th><?php print($fila['id_turno']); ?></th>
                                <td><?php print($fila['dni']); ?></td>
                                <td><?php print($fila['name_paciente'] . ' ' . $fila['surname']); ?></td>
                                <td><?php print($fila['diagnos']); ?></td>
                                <td><?php print($fila['medicamentos']); ?></td>
                                <td><?php print($fila['patologias']); ?></td>
                                <td><?php print($fila['fecha_turno']); ?></td>
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
        </div>
    </div>
    </div>
                <!-- TEST -->
                <div>
                <button class="button">
  <div class="icon">
    <svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="shere">
      <path fill="#f2295b" d="M767.99994 585.142857q75.995429 0 129.462857 53.394286t53.394286 129.462857-53.394286 129.462857-129.462857 53.394286-129.462857-53.394286-53.394286-129.462857q0-6.875429 1.170286-19.456l-205.677714-102.838857q-52.589714 49.152-124.562286 49.152-75.995429 0-129.462857-53.394286t-53.394286-129.462857 53.394286-129.462857 129.462857-53.394286q71.972571 0 124.562286 49.152l205.677714-102.838857q-1.170286-12.580571-1.170286-19.456 0-75.995429 53.394286-129.462857t129.462857-53.394286 129.462857 53.394286 53.394286 129.462857-53.394286 129.462857-129.462857 53.394286q-71.972571 0-124.562286-49.152l-205.677714 102.838857q1.170286 12.580571 1.170286 19.456t-1.170286 19.456l205.677714 102.838857q52.589714-49.152 124.562286-49.152z"></path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telegram icon-shere" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"></path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram icon-shere" viewBox="0 0 16 16">
      <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp icon-shere" viewBox="0 0 16 16">
      <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
    </svg>
  </div>
  <p>Share me</p>
</button>
                </div>




</body>

</html>