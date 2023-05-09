<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso</title>
    <link rel="stylesheet" href="../css/pay.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <form class="pay.php" method="POST">

        <div class="mb-3">
            <label for class="form-label">Cantidad Del Pago</label>
            <input type="number" name="cantidad_pago" class="form-control">
        </div>
        <div class=" mb-3">
            <label class="form-label">Metodo De Pago</label>
            <input type="number" name="Metodo_pago_id_metodp" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for class="form-label">Indentificacion Del Usuario</label>
            <input type="number" name="Usuario_id_usuario" class="form-control">

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

    if (isset($_REQUEST['iniciar']) && !empty($_REQUEST['cantidad_pago']) && !empty($_REQUEST['Metodo_pago_id_metodp']) && !empty($_REQUEST['Usuario_id_usuario'])) {

        $c1=$_REQUEST['id_pago'];
        $c2=$_REQUEST['cantidad_pago'];
        $c3 = $_REQUEST['Metodo_pago_id_metodp'];
        $c4 = $_REQUEST['Usuario_id_usuario'];

        $insertar = "CALL InsertarPago ('$c1','$c2','$c3','$c4')";
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