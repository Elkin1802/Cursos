<?php

$conexion = mysqli_connect('localhost', 'root', '', 'curso');

$insert = mysqli_query($conexion, "SELECT identificacion, nombres,apellidos FROM administrador");

if (isset($_POST['administrador'])) {
	$administrador = $_POST['administrador'];
	echo $administrador;
}
?>

<?php
include_once '../config/conexion.php';

if (isset($_GET['id'])) {
	$id = (int) $_GET['id'];

	$buscar_id = $conexion->prepare('SELECT * FROM curso WHERE id_curso=:id LIMIT 1');
	$buscar_id->execute(array(
		':id' => $id
	));
	$resultado = $buscar_id->fetch();
} else {
	header('Location: ../ICursos/TableCursos.php');
}


if (isset($_POST['guardar'])) {
	$nombre_curso = $_POST['nombre_curso'];
	$precio = $_POST['precio'];
	$fecha_inicio = $_POST['fecha_inicio'];
	$fecha_fin = $_POST['fecha_fin'];
	$administrador_id_administrador = $_POST['administrador_id_administrador'];
	$descripcion = $_POST['descripcion'];
	$activo = $_POST['activo'];
	$id = (int) $_GET['id'];

	if (!empty('id_curso') && !empty($nombre_curso) && !empty($precio) && !empty($fecha_inicio) && !empty($fecha_fin) && !empty($administrador_id_administrador) && !empty($descripcion) && !empty($activo)) {
		if (!filter_var($administrador_id_administrador, FILTER_VALIDATE_INT)) {
			echo "<script> alert('Correo no valido');</script>";
		} else {
			$consulta_update = $conexion->prepare(
				' UPDATE curso SET  
					nombre_curso=:nombre_curso,
					precio=:precio,
					fecha_inicio=:fecha_inicio,
					fecha_fin=:fecha_fin,
					administrador_id_administrador=:administrador_id_administrador,
					descripcion=:descripcion,
					activo=:activo
					WHERE id_curso=:id;'
			);
			$consulta_update->execute(array(

				':nombre_curso' => $nombre_curso,
				':precio' => $precio,
				':fecha_inicio' => $fecha_inicio,
				':fecha_fin' => $fecha_fin,
				':administrador_id_administrador' => $administrador_id_administrador,
				':descripcion' => $descripcion,
				':activo' => $activo,
				':id' => $id
			));
			header('Location: ../ICursos/TableCursos.php');
		}
	} else {
		echo "<script> alert('Los campos estan vacios');</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Editar Cursos</title>

	<link rel="stylesheet" href="../css/estilos.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

	<div class="contenedor">
		<h2>Actualizar Cursos</h2>
		<form method="post" class="row g-3 needs-validation">
			<div class="col-lg-6">
				<label class="form-label"><strong>Nombre Del Curso</strong></label>
				<input type="text" name="nombre_curso" placeholder="Nombres" class="form-control">
			</div>
			<div class="col-lg-6">
				<label class="form-label"><strong>Precio</strong></label>
				<input type="text" name="precio" value="<?php if ($resultado) echo $resultado['precio']; ?>" placeholder="precio" class="form-control">
			</div>
			<div class="col-lg-6">
				<input type="date" name="fecha_inicio" value="<?php if ($resultado) echo $resultado['fecha_inicio']; ?>" placeholder="fecha" class="form-control">
			</div>
			<div class="col-lg-6">
				<input type="date" name="fecha_fin" value="<?php if ($resultado) echo $resultado['fecha_fin']; ?>" placeholder="fecha" class="form-control">
			</div>
			<div class="col-lg-6">
				<label class="form-label"><strong>Administrador Encargado</strong></label>
				<select name="administrador_id_administrador" class="form-select">

					<?php
					while ($administrador = mysqli_fetch_array($insert)) {
					?>
						<option value="<?php echo $administrador['identificacion'] ?>"> <?php echo $administrador['nombres'] ?> <?php echo $administrador['apellidos'] ?> </option>
					<?php
					}
					?>
				</select>

			</div>

			<div class="col-lg-6">
				<label class="form-label"><strong>Estado Del Curso</strong></label>
				<select name="activo" class="form-control">

					<option value="1">Activo</option>
					<option value="Terminado">Terminado</option>

				</select>
			</div>

			<div col-lg-4>
				<label class="form-label"><strong>Descripcion Del Curso</strong></label>
				<textarea rows="3" name="descripcion" value="<?php if ($resultado) echo $resultado['descripcion']; ?>" placeholder="Descripcion del curso" class="form-control"></textarea>
			</div>

			<div class="d-grid gap-2 d-md-flex justify-content-md-end">

				<a href="../ICursos/TableCursos.php" class="btn btn-danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn-success">

			</div>
		</form>
	</div>


	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
	</script>

</body>

</html>