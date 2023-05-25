<?php session_start(); ?>

<?php

include('../config/conexion.php');

$insert = mysqli_query($conexion, "SELECT  identificacion, nombres,apellidos FROM profesor");

if (isset($_POST['profesor'])) {
    $profesor = $_POST['profesor'];
    echo $profesor;
}
?>

<?php

include('../config/conexion.php');

$cod = mysqli_query($conexion, "SELECT  identificacion, nombres,apellidos FROM administrador");

if (isset($_POST['administrador'])) {
    $administrador = $_POST['administrador'];
    echo $administrador;
}
?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso</title>
    <link rel="stylesheet" href="../css/cursos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <form class="courses.php" method="POST">

        <div class="mb-3">
            <label for class="form-label">Nombre Del Curso</label>
            <input type="text" name="nombre_curso" class="form-control" required>
        </div>
        <div class=" mb-3">
            <label class="form-label">Tipo De Curso</label>
            <input type="text" name="tipo_curso" class="form-control" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for class="form-label">Precio </label>
            <input type="text" name="precio" class="form-control" required>

        </div>

        <div class="mb-3">
            <label class="form-label">Administrador Encargado</label>

            <select class="form-control bg-dark-x border-0 mb-2" name="administrador_id_administrador" required>
                <?php 
                        while($administrador = mysqli_fetch_array($cod))
                        {
                    ?>
                <option value="<?php echo $administrador['identificacion']?>"> <?php echo $administrador['nombres']?>
                    <?php echo $administrador['apellidos']?>
                </option>
                <?php
                        }
                    ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleSelectRol" class="form-label font-weight-bold">Profesor</label>

            <select class="form-control bg-dark-x border-0 mb-2" name="profesor[]" required>
                <?php 
                        while($profesor = mysqli_fetch_array($insert))
                        {
                    ?>
                <option value="<?php echo $profesor['identificacion']?>"> <?php echo $profesor['nombres']?>
                    <?php echo $profesor['apellidos']?>
                </option>
                <?php
                        }
                    ?>
            </select>
        </div>


        <div class="mb-3">
            <label class="form-label">Fecha Inicio</label>
            <input type="date" name="fecha_inicio" class="form-control" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for class="form-label">Fecha Final</label>
            <input type="date" name="fecha_fin" class="form-control" required>
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

    if (isset($_REQUEST['iniciar']) && !empty($_REQUEST['nombre_curso']) && !empty($_REQUEST['tipo_curso']) && !empty($_REQUEST['precio']) && !empty($_REQUEST['fecha_inicio']) && !empty(['fecha_fin']) && !empty(['administrador_id_administrador'])) {

        $c1 = $_REQUEST['id_curso'];
        $c2 = $_REQUEST['nombre_curso'];
        $c3 = $_REQUEST['tipo_curso'];
        $c4 = $_REQUEST['precio'];
        $c5 = $_REQUEST['fecha_inicio'];
        $c6 = $_REQUEST['fecha_fin'];
        $c7 = $_REQUEST['administrador_id_administrador'];


        $insertar = "CALL insertarCursos ('$c1','$c2','$c3','$c4','$c5','$c6','$c7')";
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

        $ultimoCodigo = mysqli_insert_id($conexion);

        for ($i=0; $i<sizeof($profesor); $i++){
    
            $insertar = "INSERT INTO profesor_has_curso (Profesor_id_profesor, Curso_id_curso) VALUES ('$profesor[$i]','$ultimoCodigo')";
        $query = mysqli_query($conexion, $insertar);
        }
    }

    ?>

</body>

</html>