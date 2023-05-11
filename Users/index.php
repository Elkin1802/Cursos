<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="../css/users.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <form class="index.php" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Identificación</label>
            <input type="number" name="id_usuario" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nombres</label>
            <input type="text" name="nombres" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Apellidos</label>
            <input type="text" name="apellidos" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">País </label>
            <input type="text" name="pais" class="form-control" id="exampleInputPassword1" required>

        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Telefóno</label>
            <input type="tel" name="telefono" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                required>
            <div id="emailHelp" class="form-text">Nunca compartiremos su correo electrónico con nadie más.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
            <input type="password" name="clave" class="form-control" id="exampleInputPassword1" required>
        </div>
        <button type="submit" name="iniciar" class="btn btn-primary">Insertar</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>

    <?php

    include('../config/conexion.php');

    if (isset($_REQUEST['iniciar']) && !empty($_REQUEST['id_usuario']) && !empty($_REQUEST['nombres']) && !empty($_REQUEST['apellidos']) && !empty($_REQUEST['pais']) && !empty($_REQUEST['telefono']) && !empty(['email']) && !empty(['clave'])) {

        $c1 = $_REQUEST['id_usuario'];
        $c2 = $_REQUEST['nombres'];
        $c3 = $_REQUEST['apellidos'];
        $c4 = $_REQUEST['pais'];
        $c5 = $_REQUEST['telefono'];
        $c6 = $_REQUEST['email'];
        $c7 = $_REQUEST['clave'];


        $insertar = "CALL insertarUsuario ('$c1','$c2','$c3','$c4','$c5','$c6','$c7')";
        $query = mysqli_query($conexion, $insertar);

        if ($query) {
            echo '<script>
            
        window.location = "../Inicio/index.html";

        </script>';
        } elseif ($query) {

            echo '<script>
        
            windows.location = "../Inicio/index2.html";

            </script>';
        }
    }

    ?>

</body>

</html>