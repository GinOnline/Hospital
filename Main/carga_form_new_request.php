<?php
    include 'conection.php';

    session_start();


    // Comprobamos que el elemento exista

    $elementoSelected = $_POST['elemento'];
    $query = mysqli_query($con, "SELECT * FROM elemento WHERE nombre = '".$elementoSelected."' ");
    $nr = mysqli_num_rows($query);
        
    if($nr >= 1)
    {	
        $curso = $_POST['curso'];
        $cantidad = $_POST['cantidad'];
        $elemento = $_POST['elemento'];
        $nombre = $_POST['nombre'];
        $pañolero = $_SESSION['username'];
        $apellido = $_POST['apellido'];
        $hora_estimada = $_POST['time'];

        $sql = mysqli_query($con, "SELECT * FROM elemento WHERE nombre = '".$elementoSelected."' ");

        while($fila = mysqli_fetch_array($sql) ){

            $stock_pedido = $fila['faltantes'] +  $cantidad;

            $query = mysqli_query($con, "SELECT * FROM elemento WHERE nombre = '".$elementoSelected."' and stock >= '".$stock_pedido."' ");
            $nr = mysqli_num_rows($query);
            
            if($nr >= 1){
                
           
                // Agregar request
                $agregar = "INSERT INTO request(elemento, cantidad , curso, nombre, apellido, pañolero, fecha_estimada_devolucion) VALUES ('" . $elemento . "', '".$cantidad."', '".$curso."', '".$nombre."', '".$apellido."', '".$pañolero."', '".$hora_estimada."')";
                mysqli_query($con, $agregar) or die(mysqli_error($con));

                // Modificar faltantes


                $agregar = "UPDATE elemento
                SET faltantes = ". $stock_pedido ."
                WHERE nombre = '". $elemento ."' ";
                mysqli_query($con, $agregar) or die(mysqli_error($con));


                header('Location: form_new_request.php');


            }
            else
            {
                
                $restantes = $fila['stock'] - $fila['faltantes'];
                if($restantes == 0){

                    $_SESSION['error_form_request'] = "Todos/as ".$fila['nombre']."s están en uso";
                }
                else{
                    $_SESSION['error_form_request'] = $restantes." herramientas restantes";

                }

                header('Location: form_new_request.php');


            }


        }

    
    }
    else 
    {
        

        // Insertar cookie para enviar un mensaje de eroor en el formulario
        $_SESSION['error_form_request'] = "Inserte un elemento válido";

        header("Location: form_new_request.php");

    }
    

  


?>