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

                        <!-- Register -->

                        <div class="sb3">
                            <div <?php echo $HideForUser; ?>></div>
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
                <a href="Informe.pdf" download="Informe.pdf" class="download-btn"><span>Download</span><span>PDF</span></a>
                <a href="Informe.pdf" download="Informe.csv" class="download-btn"><span>Download</span><span>CSV</span></a>
                <button class="btn-cssbuttons">
<span>Button</span><span>
  <svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
    <path fill="#ffffff" d="M767.99994 585.142857q75.995429 0 129.462857 53.394286t53.394286 129.462857-53.394286 129.462857-129.462857 53.394286-129.462857-53.394286-53.394286-129.462857q0-6.875429 1.170286-19.456l-205.677714-102.838857q-52.589714 49.152-124.562286 49.152-75.995429 0-129.462857-53.394286t-53.394286-129.462857 53.394286-129.462857 129.462857-53.394286q71.972571 0 124.562286 49.152l205.677714-102.838857q-1.170286-12.580571-1.170286-19.456 0-75.995429 53.394286-129.462857t129.462857-53.394286 129.462857 53.394286 53.394286 129.462857-53.394286 129.462857-129.462857 53.394286q-71.972571 0-124.562286-49.152l-205.677714 102.838857q1.170286 12.580571 1.170286 19.456t-1.170286 19.456l205.677714 102.838857q52.589714-49.152 124.562286-49.152z"></path>
  </svg>
</span>
<ul>
<li>
  <a href="https://twitter.com/SumethWrrn"><svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
  <path fill="white" d="M962.267429 233.179429q-38.253714 56.027429-92.598857 95.451429 0.585143 7.972571 0.585143 23.990857 0 74.313143-21.723429 148.260571t-65.974857 141.970286-105.398857 120.32-147.456 83.456-184.539429 31.158857q-154.843429 0-283.428571-82.870857 19.968 2.267429 44.544 2.267429 128.585143 0 229.156571-78.848-59.977143-1.170286-107.446857-36.864t-65.170286-91.136q18.870857 2.852571 34.889143 2.852571 24.576 0 48.566857-6.290286-64-13.165714-105.984-63.707429t-41.984-117.394286l0-2.267429q38.838857 21.723429 83.456 23.405714-37.741714-25.161143-59.977143-65.682286t-22.308571-87.990857q0-50.322286 25.161143-93.110857 69.12 85.138286 168.301714 136.265143t212.260571 56.832q-4.534857-21.723429-4.534857-42.276571 0-76.580571 53.979429-130.56t130.56-53.979429q80.018286 0 134.875429 58.294857 62.317714-11.995429 117.174857-44.544-21.138286 65.682286-81.115429 101.741714 53.174857-5.705143 106.276571-28.598857z"></path></svg></a>
</li>
<li>
  <a href="https://codepen.io/sharpth"><svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
  <path fill="white" d="M123.52064 667.99143l344.526782 229.708899 0-205.136409-190.802457-127.396658zM88.051421 585.717469l110.283674-73.717469-110.283674-73.717469 0 147.434938zM556.025711 897.627196l344.526782-229.708899-153.724325-102.824168-190.802457 127.396658 0 205.136409zM512 615.994287l155.406371-103.994287-155.406371-103.994287-155.406371 103.994287zM277.171833 458.832738l190.802457-127.396658 0-205.136409-344.526782 229.708899zM825.664905 512l110.283674 73.717469 0-147.434938zM746.828167 458.832738l153.724325-102.824168-344.526782-229.708899 0 205.136409zM1023.926868 356.00857l0 311.98286q0 23.402371-19.453221 36.566205l-467.901157 311.98286q-11.993715 7.459506-24.57249 7.459506t-24.57249-7.459506l-467.901157-311.98286q-19.453221-13.163834-19.453221-36.566205l0-311.98286q0-23.402371 19.453221-36.566205l467.901157-311.98286q11.993715-7.459506 24.57249-7.459506t24.57249 7.459506l467.901157 311.98286q19.453221 13.163834 19.453221 36.566205z"></path></svg></a>
</li>
<li>
<a href="https://github.com/SharpTH"><svg height="18" width="18" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024" class="icon">
<path fill="white" d="M950.930286 512q0 143.433143-83.748571 257.974857t-216.283429 158.573714q-15.433143 2.852571-22.601143-4.022857t-7.168-17.115429l0-120.539429q0-55.442286-29.696-81.115429 32.548571-3.437714 58.587429-10.313143t53.686857-22.308571 46.299429-38.034286 30.281143-59.977143 11.702857-86.016q0-69.12-45.129143-117.686857 21.138286-52.004571-4.534857-116.589714-16.018286-5.12-46.299429 6.290286t-52.589714 25.161143l-21.723429 13.677714q-53.174857-14.848-109.714286-14.848t-109.714286 14.848q-9.142857-6.290286-24.283429-15.433143t-47.689143-22.016-49.152-7.68q-25.161143 64.585143-4.022857 116.589714-45.129143 48.566857-45.129143 117.686857 0 48.566857 11.702857 85.723429t29.988571 59.977143 46.006857 38.253714 53.686857 22.308571 58.587429 10.313143q-22.820571 20.553143-28.013714 58.88-11.995429 5.705143-25.746286 8.557714t-32.548571 2.852571-37.449143-12.288-31.744-35.693714q-10.825143-18.285714-27.721143-29.696t-28.306286-13.677714l-11.410286-1.682286q-11.995429 0-16.603429 2.56t-2.852571 6.582857 5.12 7.972571 7.460571 6.875429l4.022857 2.852571q12.580571 5.705143 24.868571 21.723429t17.993143 29.110857l5.705143 13.165714q7.460571 21.723429 25.161143 35.108571t38.253714 17.115429 39.716571 4.022857 31.744-1.974857l13.165714-2.267429q0 21.723429 0.292571 50.834286t0.292571 30.866286q0 10.313143-7.460571 17.115429t-22.820571 4.022857q-132.534857-44.032-216.283429-158.573714t-83.748571-257.974857q0-119.442286 58.88-220.306286t159.744-159.744 220.306286-58.88 220.306286 58.88 159.744 159.744 58.88 220.306286z"></path></svg></a></li></ul></button>

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

</body>

</html>