<?php
include_once '../config/conexion.php';

$sentencia_select = $conexion->prepare('SELECT * FROM curso ORDER BY id_curso DESC');
$sentencia_select->execute();
$resultado = $sentencia_select->fetchAll();

// metodo buscar
if (isset($_POST['btn_buscar'])) {
    $buscar_text = $_POST['buscar'];
    $select_buscar = $conexion->prepare(
        '
			SELECT * FROM curso WHERE nombre_curso LIKE :campo OR activo LIKE :campo;'
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
            <p>Informacion De Los Cursos</p>

            <div>
                <form action="" class="d-flex" method="post">
                    <input type="text" name="buscar" placeholder="Buscar" value="<?php if (isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
                    <button class="add_new" type="submit" name="btn_buscar" value="Buscar"><i class="bi bi-search"></i></button>

                    <a href="../Cursos/insert_cursos.php" id="agg"><i class="bi bi-plus-circle-fill"></i></a>
                    <a href="./InfoCursos.php" id="view"><i class="bi bi-eye-fill"></i></a>
                </form>
            </div>
        </div>

        <div class="table_section">

            <table>

                <thead>

                    <tr>

                        <td>Nombre Del Curso</td>
                        <td>Precio</td>
                        <td>Fecha Inicio</td>
                        <td>Fecha Final</td>
                        <td>Descripcion</td>
                        <td>Acciones</td>

                    </tr>
                </thead>

                <?php foreach ($resultado as $fila) : ?>
                    <tr>
                        <td><?php echo $fila['nombre_curso']; ?></td>
                        <td><?php echo number_format($fila['precio'], 2, '.', '.'); ?></td>
                        <td><?php echo $fila['fecha_inicio']; ?></td>
                        <td><?php echo $fila['fecha_fin']; ?></td>
                        <td><?php echo $fila['descripcion']; ?></td>
                        <td class="text-center">


                            <a href="../Cursos/update_cursos.php?id=<?php echo $fila['id_curso']; ?>" class="btn__update" id="agg"><i class="bi bi-pencil-square"></i></a>
                            <a href="../Cursos/delete_cursos.php?id=<?php echo $fila['id_curso']; ?>" class="btn__delete" id="agg"><i class="bi bi-trash-fill"></i></a>

                        </td>
                    </tr>
                <?php endforeach ?>

            </table>
        </div>

    </div>

</body>

</html>