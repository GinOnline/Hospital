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
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/styleDashboard.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    </header>

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

                            <div class="sb6">
                                <center>
                                    <hr color="gray">
                                </center>
                                <a class="side-links nav-link px-3" href="dashboard.php">
                                    <span class="me-2 side-links-text"><i class="fas fa-chart-line"></i></i>Dashboard</span>
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
                                    <hr color="gray">
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
            </div>
        </center>





        <div class="allStatics">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Estadísticas</h4>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="card dashboardBox text-white h-100">
                            <div class="dashboardMT">Especialidad <br> más Requerida
                                <div class="dashboardST">Pediatría</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card dashboardBox text-white h-100">
                            <div class="dashboardMT">Turnos <br> Totales
                                <div class="dashboardST">6598</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card dashboardBox text-white h-100">
                            <div class="dashboardMT">Turnos <br> Completados
                                <div class="dashboardST">6570</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card dashboardBox text-white h-100">
                            <div class="dashboardMT">Turnos <br> Pendientes
                                <div class="dashboardST">28</div>
                            </div>
                        </div>
                    </div>
                </div><br><br>




                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-header">
                                <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                                Alarma Código Azul
                            </div>
                            <div class="card-body">
                                <canvas class="chart" width="400" height="200"></canvas><br>
                                <canvas class="chart3" width="400" height="200"></canvas>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-header">
                                <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                                Porcentaje Urgencias
                            </div>
                            <div class="card-body">
                                <canvas class="chart2" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="./js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
        <script src="./js/jquery-3.5.1.js"></script>
        <script src="./js/jquery.dataTables.min.js"></script>
        <script src="./js/dataTables.bootstrap5.min.js"></script>
        <script src="./js/script.js"></script>

        <!-- JavaScript Includes -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script>




</body>

</html>