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

        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/intento.css">

        <title>Document</title>

        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
                        <span class="name">Usuario</span>
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
                                <i class='bx bx-home-alt icon'></i>
                                <span class="text nav-text">Inicio</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="#about">
                                <i class='bx bxs-info-square icon'></i>
                                <span class="text nav-text">Acerca De</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="#cursos">
                                <i class='bx bx-library icon'></i>
                                <span class="text nav-text">Cursos</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="#profesores">
                                <i class='bx bxs-user-badge icon'></i>
                                <span class="text nav-text">Profesores</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="#datos">
                                <i class='bx bx-edit-alt icon'></i>
                                <span class="text nav-text">Actualizar Datos</span>
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="bottom-content">
                    <li class="">
                        <a href="../index.php">
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>

                    <li class="mode">
                        <div class="sun-moon">
                            <i class='bx bx-moon icon moon'></i>
                            <i class='bx bx-sun icon sun'></i>
                        </div>
                        <span class="mode-text text">Dark mode</span>

                        <div class="toggle-switch">
                            <span class="switch"></span>
                        </div>
                    </li>

                </div>
            </div>

        </nav>

        <section></section>
        <!-- Imagen fondo -->

        <section class="home" id="home">

            <h1>La enseñanza,debe ser, sobre todo una provocación intelectual.</h1>
            <p>Qué esperas para aprender con nosotros, únete ahora!!</p>
            <a href="#"><button class="btn"> Iniciar </button></a>

            <div class="shape"></div>

        </section>

        <section class="about" id="about">

            <div class="image"></div>

            <div class="content">

                <h3>Quienes somos?</h3>
                <p>Somos un ente que quiere brindad la posibilidad de llegar a todos los hogares del mundo, y de aquelleas
                    personas que no tienen la posibilidad de viajar a obtener nuvos conocimientos, somos un ente que actualmente
                    brindamos la opcion de adquirir conociemiento tanto presencial o como remotamente.
                </p>

                <p>Nosotros brindamos la posibilidad de adquirir nuevos conocimientos, a muy buenos precios que sean
                    accecibles para todos y todas
                </p>

            </div>

        </section>

        <!-- End about -->

        <!-- Sesion Profesores Cursos -->

        <section class="teacher" id="teacher">

            <h1 class="heading">Nuestros Expertos Maestros</h1>

            <div class="box-container">

                <div class="box">

                    <p>Creo que un gran maestro es un gran artista y hay tan pocos como hay grandes artistas.
                        La enseñanza puede ser el más grande de los artes ya que el medio es la mente y espíritu humanos</p>

                </div>

            </div>

            <div class="image">

                <img src="../img/courses/congratulations-you-did-test-very-well.jpg" alt="">

            </div>
        </section>

        <!-- End Teacher -->

        <!-- Contacto -->

        <section class="contact" id="contact">

            <h1 class="heading">Contactanos</h1>

            <div class="row">

                <form action="">

                    <input type="text" placeholder="full name" class="box">
                    <input type="email" placeholder="your email" class="box">
                    <input type="password" placeholder="your pasword" class="box">
                    <input type="number" placeholder="your number" class="box">

                    <textarea name="" id="" cols="30" rows="10" class="box address" placeholder="ypur addres"></textarea>
                    <input type="submit" class="btn" value="send now">

                </form>

            </div>

        </section>

        <!-- End Contact -->

        <!-- Footer -->

        <div class="footer">

            <div class="box-container">

                <div class="box">

                    <h3>Ubcacion de la sucursal</h3>
                    <a href="#">Colombia</a>
                    <a href="#">Mexico</a>
                    <a href="#">USA</a>
                    <a href="#">Peru</a>
                    <a href="#">Costa Rica</a>

                </div>

                <div class="box">

                    <h3>Enlaces rapidos</h3>
                    <a href="#">Inicio</a>
                    <a href="#">Acerca de</a>
                    <a href="#">Cursos</a>
                    <a href="#">Profesores</a>
                    <a href="#">Actualizar Datos</a>

                </div>

                <div class="box">

                <h3>Informacion de contacto</h3>
                <a> <i class="fas fa-map-marker-alt"></i> CDMX, MEXICO</a>
                <a> <i class="fas fa-envelope"></i> example@gmail.com</a>
                <a> <i class="fas fa-phone"></i> +94 55 4424 0341</a>

                </div>

            </div>

        </div>


        <!-- Optional JavaScript -->
        <!-- Popper.js first, then Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

        <script src="../js/main.js"></script>

    <?php

} else {

    header('location: ../404/404.php');
} ?>

    </body>

    </html>