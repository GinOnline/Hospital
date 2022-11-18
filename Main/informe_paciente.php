<!DOCTYPE html>
<html>
<?php
include 'conection.php';

session_start();
$usuario = $_SESSION['username'];

if(isset($_SESSION['admin']))
{
  $HideForAdmin = 'style = "display:none;"';
  $HideForUser = " ";

}
else{
  $HideForAdmin  = " ";
  $HideForUser  = $HideForAdmin = 'style = "display:none;"';
}


if (!isset($usuario)) {

    header('location: login.php');
  }
  if (isset($_GET['turno'])) {
    $_SESSION['turno'] = $_GET['turno'];
  }
  else{
    $_SESSION['turno'] = 0;
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
    <link rel="StyleSheet" href="./css/card.css" type="text/css">
    <link rel="StyleSheet" href="./css/clock.css" type="text/css">
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
    <title>Inicio</title>


</head>

<body>
    <header class="bg-dark">
        <nav class="up_nav"><span style="margin-left:205px; color:white; font-size:35px;"><?php echo  $_SESSION['show'] ?></span>
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
    <br>
    <br>
    <br>
     <?php  

        $sql = "SELECT * FROM turnos WHERE id = ". $_SESSION['turno']." ";
        $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

        if (mysqli_num_rows($resultado) == 0) {

            header("Location: index.php");
        }



        //Generacion de las peticiones (cards)
        while ($fila = mysqli_fetch_array($resultado)) {

        ?>               
    <div style="margin-left:10%;--bs-gutter-x:0;">
        <div class="row justify-content-center --bs-gutter-x:0;">

            <div class="col-12 row" style="align-items:center; overflow:auto">
                <!--Peticiones -->
                <h2 class="col-6 btn_title">Informe Paciente <?php echo ' ' . $fila["title"]. ' ' .$fila["surname"];?></h2>
                <a href = "informe.pdf" download="informe.pdf" class="buttonDownload col-2" style="margin-right:2%;">Descargar PDF</a>
                <a href = "historial.php?seachbar_input=<?php echo $fila["title"];?>" style = "position:absolute; bottom:25px; right:50px; border-radius: 15px" class="btn btn-primary col-2">Historial clinico</a>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="row justify-content-center col-8 info-ingre" style="border-width:2px;border-style:solid; border-color:black;">
                <div class="col-5 row">
                    <h4>Hora ingreso: <?php echo $fila["time"];?></h4>
                </div>
                <div class="col-3 row">
                    <h4>Sala <?php echo $fila["zona"];?></h4>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="row justify-content-center col-8 info-ingre" style="border-width:2px;border-style:solid; border-color:black;">
                <h4>Diagnostico General</h4>
                <p><?php echo $fila["description"];?></p>
            </div>
        </div>
        <br>

        <div class="row justify-content-center">
            <div class="row justify-content-center col-8 info-ingre" style="border-width:2px;border-style:solid; border-color:black;">

                <h4 class="col-12">Patologias</h4>
                <hp lass="col-5"><?php echo $fila["patologias"];?></p>

            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="row justify-content-center col-8 info-ingre" style="border-width:2px;border-style:solid; border-color:black;">

                <h4 class="col-12">Medicamentos previos</h4>
                <hp lass="col-5"><?php echo $fila["medicamentos"];?></p>

            </div>
        </div>
    </div>
    <?php }?>



    <!-- <footer>
    <a href="javascript:void(0)" onclick="location.href='./secret.html'" class="easter_egg"><img src=".\img\logo_2.png" width="2.2%" alt="MoonDrive_logo"></a>
    <a href="javascript:void(0)" style="text-decoration: none; color:white;">© MoonDrive Company </a>

  </footer>
 -->



    <script>
        function selectOptionSort() {

            let option = document.getElementById('ordenador');
            option.submit();


        }

        function SeachBar() {

            let searchbar = document.getElementById('searchbar');


            searchbar.submit();

        }

        $(document).ready(function() {
            var active = false;
            var down = false;

            $("#bell").click(function(e) {

                var color = $(this).text();
                if (down) {

                    $("#box").css("height", "0px");
                    $("#box").css("opacity", "0");
                    down = false;
                } else {

                    $("#box").css("height", "auto");
                    $("#box").css("opacity", "1");
                    down = true;

                }

            });
            //funcion para que el boton agregar amigos pueda abrir y cerrar el PopUp al tocarlo
            $("#friendsbtn").click(function(e) {

                if (active == true) {

                    $(".addfriends_container").css("display", "none");
                    active = false;
                } else {

                    $(".addfriends_container").css("display", "block");

                    active = true;

                }

            });
            //funcion el boton X para cerrar el formulario
            $(".close-btn").click(function(e) {

                $(".addfriends_container").css("display", "none");
                active = false;


            });

        });
    </script>

</body>

</html>