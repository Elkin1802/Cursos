<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/intento.css">
        <link rel="stylesheet" href="../css/modal.css">

        <title>Document</title>

        <!-- aos css cdn link -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

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
                            <a href="#home">
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
                            <a href="../ICursos/InfoCursos.php">
                                <i class='bx bx-library icon'></i>
                                <span class="text nav-text">Cursos</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="#teacher">
                                <i class='bx bxs-user-badge icon'></i>
                                <span class="text nav-text">Profesores</span>
                            </a>
                        </li>

                        <li class="nav-link">
                        <a href="#" class="hero__cta">
                                <i class='bx bx-edit-alt icon'></i>
                                <span class="text nav-text">Actualizar Datos</span>
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="bottom-content">
                <li class="">
                    <a href="../index.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                </div>
            </div>

        </nav>

        <section></section>

        <!-- Imagen fondo -->

        <section class="home" id="home" data-aos="fade-right">

            <h1>La enseñanza,debe ser, sobre todo una provocación intelectual.</h1>
            <p>Qué esperas para aprender con nosotros, únete ahora!!</p>
            <a href="#"><button class="btn"> Iniciar </button></a>

            <div class="shape"></div>

        </section>

        <!-- Inicio acerca de    -->

        <section class="about" id="about">

            <div class="image" data-aos="fade-right"></div>

            <div class="content" data-aos="fade-left">

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

        <!-- Sesion cursos -->

        <section class="course" id="course">

            <div class="image" data-aos="fade-right"></div>

            <div class="content" data-aos="fade-left">

                <h3>Nuestros cursos</h3>
                <p>No lo encontrarás a mejor precio. Así parece más barato de lo que es.
                    Esta técnica de persuasión suele funcionar en cursos premium que usualmente llevan precios altos.
                </p>

                <p>Si no te convence, lo devuelves. Cuanto más fácil se lo pongas a tus clientes, más venderás,
                    porque se sienten más relajados. No olvides dejar claro en los términos de uso tus condiciones para las
                    devoluciones de los alumnos. Asegúrate que la plataforma elearning que usas te facilita la opción de colocar
                    estos términos que el alumno está obligado a aceptar.
                </p>

                <a href="../ICursos/InfoCursos.php"><button type="submit" class="btn">Ir a cursos</button></a>

            </div>

        </section>

        <!-- End course -->

        <!-- Sesion Profesores Cursos -->

        <section class="teacher" id="teacher">

            <h1 class="heading">Nuestros Expertos Maestros</h1>

            <div class="box-container" data-aos="fade-right">

                <div class="box">

                    <p>Creo que un gran maestro es un gran artista y hay tan pocos como hay grandes artistas.
                        La enseñanza puede ser el más grande de los artes ya que el medio es la mente y espíritu humanos</p>

                </div>

            </div>

            <div class="image" data-aos="fade-down">

                <img src="../img/courses/congratulations-you-did-test-very-well.jpg" alt="" >

            </div>
        </section>

        <!-- End Teacher -->

        <!-- Contacto -->

        <section class="contact" id="contact">

            <h1 class="heading">Contactanos</h1>

            <div class="row">

                <form action="" data-aos="fade-right">

                    <input type="text" placeholder="Nombres Completos" class="box">
                    <input type="email" placeholder="Email De Contacto" class="box">
                    <input type="password" placeholder="Direccion" class="box">
                    <input type="number" placeholder="yNumero telefonico" class="box">

                    <textarea name="" id="" cols="30" rows="10" class="box address" placeholder="Campo de texto"></textarea>
                    <input type="submit" class="btn" value="Enviar Solicitud">

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
                    <a href="#home">Inicio</a>
                    <a href="#about">Acerca de</a>
                    <a href="#course">Cursos</a>
                    <a href="#teacher">Profesores</a>
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

        <section class="modal ">
        <div class="modal__container">
            <img src="../img/modal/6306470-PhotoRoom.png-PhotoRoom.svg" class="modal__img">
            <h2 class="modal__title">¡Bienvenido a tu espacion Usuario!</h2>
            <p class="modal__paragraph">Recibimos su accion para editar tus datos<br>
            Ingresa tu identificacion, despues de ellos ingresa de nuevos tus datos, ya sehan existentes o nuevos</p>
            <a href="#" class="modal__close">Cerrar Modal</a>
            <a href="../Usuario/actualizar_datos.php" class="btn">Ir actualizar los datos</a>
    </section>

            </body>

            </html>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>>


            <!-- Optional JavaScript -->
            <!-- Popper.js first, then Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
            </script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

            <script src="../js/main.js"></script>
            <script src="../js/modal.js"></script>

<!-- Initializing aos -->

    <script>

    AOS.init({

        delay:400,
        duration:1000

    })

    </script>

    </body>

    </html>