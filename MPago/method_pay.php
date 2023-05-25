<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso</title>
    <link rel="stylesheet" href="../css/method.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <form class="method_pay.php" method="POST">

        <div class="mb-3">
            <label for class="form-label">Metodo de Pago</label>
            <input type="text" name="metodo_pago" class="form-control" required>
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

    if (isset($_REQUEST['iniciar']) && !empty($_REQUEST['metodo_pago'])) {

        $c1=$_REQUEST['id_metodo'];
        $c2 = $_REQUEST['metodo_pago'];

        $insertar = "CALL insertarMetodo('$c1','$c2')";
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