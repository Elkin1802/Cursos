<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/estilos.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

</head>

<body>

    <div class="contenedor">
        <h2>Actualizar Datos</h2>
        <form method="post" class="row g-3 needs-validation">
            <div class="col-lg-12">
                <label class="form-label"><strong>Identificacion</strong></label>
                <input type="text" name="identificacion" class="form-control">
            </div>

            <div class="col-lg-6">
                <label class="form-label"><strong>Nombres</strong></label>
                <input type="text" name="nombres" placeholder="Nombres" class="form-control">
            </div>
            <div class="col-lg-6">
                <label class="form-label"><strong>Apellidos</strong></label>
                <input type="text" name="apellidos" placeholder="Apellidos" class="form-control">
            </div>
            <div class="col-lg-6">
                <label class="form-label"><strong>Pais</strong></label>
                <input type="text" name="pais" placeholder="Pais" class="form-control">
            </div>
            <div class="col-lg-6">
                <label class="form-label"><strong>Telefono</strong></label>
                <input type="tel" name="telefono" placeholder="Ingrese la fecha final del curso" class="form-control">
            </div>
            <div class="col-lg-6">
                <label class="form-label"><strong>Correo Electronico</strong></label>
                <input type="email" name="email" placeholder="Correo Electronico" class="form-control">
            </div>
            <div class="col-lg-6">
                <label class="form-label"><strong>Contraseña</strong></label>
                <input type="password" name="clave" placeholder="Contraseña" class="form-control">
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                <a href="../Inicio/profesor.php" class="btn btn-danger">Cancelar</a>
                <input type="submit" name="guardar" value="Guardar" class="btn btn-success">

            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>

<?php

$conexion = mysqli_connect('localhost', 'root', '', 'curso');


if (isset($_REQUEST['guardar'])&& !empty(['identificacion']) && !empty($_REQUEST['nombres']) && !empty($_REQUEST['apellidos']) && !empty($_REQUEST['pais']) && !empty($_REQUEST['telefono']) && !empty($_REQUEST['email']) && !empty($_REQUEST['clave'])) {

    $identificacion = $_REQUEST['identificacion'];
    $nombres = $_REQUEST['nombres'];
    $apellidos = $_REQUEST['apellidos'];
    $pais = $_REQUEST['pais'];
    $telefono = $_REQUEST['telefono'];
    $email = $_REQUEST['email'];
    $clave = $_REQUEST['clave'];

    $actualizar = "UPDATE administrador SET nombres='$nombres', apellidos='$apellidos', pais='$pais', telefono='$telefono', email='$email', clave='$clave' WHERE identificacion='$identificacion'";
    $query = mysqli_query($conexion, $actualizar);

    if ($query) {
        echo 'datos actualizados';
    } else {
        echo 'datos sin actualizar';
    }
}
?>