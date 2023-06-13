<?php session_start(); ?>

<!-- Conexion base de datos -->

<?php

$conexion = mysqli_connect('localhost', 'root', '', 'curso');

/* if($conexion){
        echo "<p>Función la conexión</p>";
    }
    else{
        echo "Error en la conexión".mysqli_error($conexion);
    }*/
?>


<?php

if ($_SESSION['usuario']) {

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/profesor.css">
    <link rel="stylesheet" href="../css/tables.css">
    <link rel="stylesheet" href="../css/cursos.css">
    <link rel="stylesheet" href="../css/modal.css">

        <!----===== Boxicons CSS ===== -->
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="../css/tables.css">
    <link rel="stylesheet" href="../css/intento.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>


</head>

<body>

    <!-- Inicio Menu -->


    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../img/login/DIPLOMA.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Administracion</span>
                    <span class="profession">Informacion</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Inicio</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#" class="hero__cta">
                        <i class='bx bx-edit-alt icon' ></i>
                            <span class="text nav-text">Actualizar datos</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#informacion">
                        <i class='bx bx-info-circle icon'></i>
                            <span class="text nav-text">Informacion</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="../Auth/cerrar_sesion.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

            </div>
        </div>

    </nav>
    <section></section>

    <!-- Imagen fondo -->


        <section class="home" id="home">

        <h1> El objeto de la educación es formar seres aptos para gobernarse a sí mismos, y no para se gobernados por los demás</h1>
        <p>Manten tu información actualizada</p>
        <a href="#"><button class="btn"> Informacion </button></a>

        <div class="shape"></div>

    </section>

    <!-- Tabla de la informacion que va ver el administrador -->
    <section class="#informacion" id="informacion">

        <div class="table">
            <div class="table_header">
                <p>Informacion</p>
                <div>

                </div>
            </div>
            <div class="table_section">

                <table>

                    <thead>

                        <tr>

                            <th>Dato</th>
                            <th>Accion</th>

                        </tr>

                        <tr>

                            <td>Mis Cursos</td>
                            <td>

                                <a href="../IProfesor/informacion.php"><button class="btn tbn-primary"><i
                                            class="bi bi-info-circle-fill"></i></button></a>


                            </td>

                        </tr>

                    </thead>

                </table>

            </div>

        </div>


    </section>

    <section class="modal ">
        <div class="modal__container">
            <img src="../img/modal/6306470-PhotoRoom.png-PhotoRoom.svg" class="modal__img">
            <h2 class="modal__title">¡Bienvenido a tu espacio Profesor!</h2>
            <p class="modal__paragraph">Recibimos su accion para editar tus datos<br>
            Ingresa tu identificacion, despues de ellos ingresa de nuevos tus datos, ya sehan existentes o nuevos</p>
            <a href="#" class="modal__close">Cerrar Modal</a>
            <a href="../Profesor/actualizar_datos.php" class="modal__close">Ir actualizar los datos</a>
    </section>

    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>

<script src="../js/main.js"></script>
<script src="../js/modal.js"></script>


<?php
}else

	header('location: ../404/404.php');

?>

</body>

</html>