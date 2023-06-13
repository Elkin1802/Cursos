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

    $sentencia_select = $conexion->prepare('SELECT * 
            
FROM usuario ORDER BY identificacion DESC');
    $sentencia_select->execute();
    $resultado = $sentencia_select->fetchAll();

    // metodo buscar
    if (isset($_POST['btn_buscar'])) {
        $buscar_text = $_POST['buscar'];
        $select_buscar = $con->prepare(
            '
			SELECT * FROM usuario WHERE nombres LIKE :campo OR apellidos LIKE :campo;'
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
                <p>Ver informacion Usuarios</p>

                <div>
                    <form action="" class="d-flex" method="post">
                        <input type="text" name="buscar" placeholder="Buscar" value="<?php if (isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
                        <button class="add_new" type="submit" name="btn_buscar" value="Buscar"><i class="bi bi-search"></i></button>


<a href="../Pago/InfoDetalles.php" id="view"><i class="bi bi-eye-fill"></i></a>


                    </form>
                </div>
            </div>

            <div class="table_section">

                <table>

                    <thead>

                        <tr>

                            <td>Nombres</td>
                            <td>Apellidos</td>
                            <td>Pais</td>
                            <td>Teléfono</td>
                            <td>Acción</td>

                        </tr>
                    </thead>

                    <?php foreach ($resultado as $fila) : ?>
                        <tr>
                            <td><?php echo $fila['nombres']; ?></td>
                            <td><?php echo $fila['apellidos']; ?></td>
                            <td><?php echo $fila['pais']; ?></td>
                            <td><?php echo $fila['telefono']; ?></td>
                            <td class="text-center">

                                <a href="../Usuario/update_usuario.php?id=<?php echo $fila['identificacion']; ?>" class="btn__update" id="agg"><i class="bi bi-pencil-square"></i></a>

                            </td>
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