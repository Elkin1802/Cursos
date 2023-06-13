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


    <?php
    include_once '../config/conexion.php';

    $sentencia_select = $conexion->prepare('SELECT * FROM detalle_pago');
    $sentencia_select->execute();
    $resultado = $sentencia_select->fetchAll();

    // metodo buscar
    if (isset($_POST['btn_buscar'])) {
        $buscar_text = $_POST['buscar'];
        $select_buscar = $con->prepare(
            '
			SELECT * FROM pago WHERE id_transaccion LIKE :campo OR id_cliente LIKE :campo;'
        );

        $select_buscar->execute(array(
            ':campo' => "%" . $buscar_text . "%"
        ));

        $resultado = $select_buscar->fetchAll();
    }

    ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Inicio</title>

        <link rel="stylesheet" href="../css/tables.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>

    <body>

        <div class="table">
            <div class="table_header">
                <p>Inscripciones</p>

                <div>
                    <form action="" class="d-flex" method="post">
                        <input type="text" name="buscar" placeholder="Buscar" value="<?php if (isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
                        <button class="add_new" type="submit" name="btn_buscar" value="Buscar"><i class="bi bi-search"></i></button>

                    </form>
                </div>
            </div>

            <div class="table_section">

                <table>

                    <thead>

                        <tr>

                            <td>Informacion de pago</td>
                            <td>Curso</td>
                            <td>Nombre</td>
                            <td>precio</td>
                            <td>Cantidad de Cursos</td>

                        </tr>
                    </thead>

                    <?php foreach ($resultado as $fila) : ?>
                        <tr>
                            <td><?php echo $fila['id_pago']; ?></td>
                            <td><?php echo $fila['id_curso']; ?></td>
                            <td><?php echo $fila['nombre']; ?></td>
                            <td><?php echo $fila['precio']; ?></td>
                            <td><?php echo $fila['cantidad']; ?></td>
                        </tr>
                    <?php endforeach ?>

                </table>
            </div>

        </div>

    <?php

} else {

    header('location: ../404/404.php');
} ?>

    </body>

    </html>