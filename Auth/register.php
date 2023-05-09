<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrarse</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/ffec4ec2ed.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/register.css">

</head>

<body class="bg-dark">

    <section>
        <div class="row g-0">
            <div class="col-lg-6 d-none d-lg-block">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item img-1 min-vh-100 active">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="font-weight-bold">Los mejores cursos</h5>
                                <a class="text-muted text-decoration-none">Visita nuestra tienda</a>
                            </div>
                        </div>
                        <div class="carousel-item img-2 min-vh-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="font-weight-bold">Descubre las nuevas modalidaes online y offline</h5>
                                <a class="text-muted text-decoration-none">Visita nuestra tienda</a>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 mb-auto w-100">
                    <img src="../img/register/DIPLOMA.png" class="img-fluid" />
                </div>

                <!-- INICIAR FORMULARIO -->

                <div class="align-self-center w-100 px-lg-5 py-lg-4 p-4">
                    <h1 class="font-weight-bold mb-1">Gracias por confiar en nosotros</h1>

                    <form class="row g-3 needs-validation" action="register.php" method="POST">
                        <div class="col-lg-5">
                            <label class="form-label font-weight-bold">Identificacion</label>
                            <input type="number" name="identificacion" class="form-control bg-dark-x border-0"
                                placeholder="Ingresa tu identificacion" aria-describedby="Identificacion">
                        </div>
                        <div class="col-lg-7">
                            <label class="form-label font-weight-bold">Nombres</label>
                            <input type="text" name="nombres" class="form-control bg-dark-x border-0"
                                placeholder="Ingresa tus nombres" aria-describedby="Nombre">

                        </div>
                        <div class="col-lg-7 m-0">
                            <label class="form-label font-weight-bold">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control bg-dark-x border-0 mb-2"
                                placeholder="Ingresa tus apellidos" aria-describedby="Apellidos">
                        </div>

                        <div class="col-lg-5 m-0">
                            <label class="form-label font-weight-bold">Pais</label>
                            <input type="text" name="pais" class="form-control bg-dark-x border-0 mb-2"
                                placeholder="Ingresa tu pais" aria-describedby="Pais">
                        </div>
                        <div class="col-lg-6 m-0">
                            <label class="form-label font-weight-bold">Telefono</label>
                            <input type="tel" name="telefono" class="form-control bg-dark-x border-0 mb-2"
                                placeholder="Ingresa tu numero de telefono" aria-describedby="Telefono">
                        </div>

                        <div class="col-lg-6 m-0">
                            <label class="form-label font-weight-bold">Email</label>
                            <input type="email" name="email" class="form-control bg-dark-x border-0 mb-2"
                                placeholder="Ingresa tu email" aria-describedby="Email">
                        </div>

                        <div class="col-lg-4 m-0">
                            <label for="exampleSelectRol" class="form-label font-weight-bold">Rol</label>

                            <select class="form-control bg-dark-x border-0 mb-2" name="tipoUsuario" id="selection"
                                aria-describedby="Rol" required>
                                <option>Seleccionar</option>
                                <option value="1">Administrador</option>
                                <option value="2">Usuario</option>
                                <option value="3">Profesor</option>
                            </select>
                        </div>
                        <div class="col-lg-8 m-0">
                            <label class="form-label font-weight-bold">Contraseña</label>
                            <input type="password" name="clave" class="form-control bg-dark-x border-0 mb-2"
                                placeholder="Ingresa tu contraseña" aria-describedby="Contraseña">
                        </div>

                        <button type="submit" name="log" class="btn btn-primary w-100">Iniciar sesión</button>
                    </form>

                    <div class="text-center px-lg-0 pt-lg-0 pb-lg-0 p-0 w-100">
                        <p class="d-inline-block m-0">¿Ya tienes una cuenta?</p> <a href="../index.php"
                            class="text-light font-weight-bold text-decoration-none">Inicia sesion</a>
                    </div>
    </section>



    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>


    <?php

if (isset($_REQUEST['log']) && !empty($_REQUEST['identificacion']) && !empty($_REQUEST['nombres']) && !empty($_REQUEST['apellidos']) && !empty($_REQUEST['pais']) && !empty($_REQUEST['telefono']) && !empty($_REQUEST['email']) && !empty($_REQUEST['clave'])) {

    $c1 = $_REQUEST['identificacion'];
    $c2 = $_REQUEST['nombres'];
    $c3 = $_REQUEST['apellidos'];
    $c4 = $_REQUEST['pais'];
    $c5 = $_REQUEST['telefono'];
    $c6 = $_REQUEST['email'];
    $c7 = $_REQUEST['clave'];

    $tipoUsuario = $_REQUEST['tipoUsuario'];

include('../config/conexion.php');

    if ($tipoUsuario == 1) {



        $query = "CALL insertarAdministrador ('$c1','$c2','$c3','$c4','$c5','$c6','$c7')";
        $resultado = mysqli_query($conexion, $query);
        if($query)
        {
            echo '<script>
        
        window.location = "../Inicio/index.html";

        </script>';
        }
    }     elseif ($tipoUsuario == 2) {

        $query = "CALL InsertarUsuario ('$c1','$c2','$c3','$c4','$c5','$c6','$c7')";
        $resultado = mysqli_query($conexion, $query);
        if($query)
        {
            echo '<script>
        
        window.location = "../Inicio/index.html";

        </script>';
        }
    }  


    elseif  ($tipoUsuario == 3) {

        $query = "CALL insertarProfesor ('$c1','$c2','$c3','$c4','$c5','$c6','$c7')";
        $resultado = mysqli_query($conexion, $query);
        if($query)
        {
            echo '<script>
        
        window.location = "../Inicio/index.html";

        </script>';
        }
    }
}

?>

</body>

</html>