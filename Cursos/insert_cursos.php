<?php

$conexion = mysqli_connect('localhost', 'root', '', 'curso');

$insert = mysqli_query($conexion, "SELECT identificacion, nombres,apellidos FROM administrador");

if (isset($_POST['administrador'])) {
	$administrador = $_POST['administrador'];
	echo $administrador;
}
?>

<?php

$conexion = mysqli_connect('localhost', 'root', '', 'curso');

$delete = mysqli_query($conexion, "SELECT identificacion, nombres,apellidos FROM profesor");

if (isset($_POST['profesor'])) {
	$profesor = $_POST['profesor'];
	echo $profesor;
}
?>


<?php
include_once '../config/conexion.php';

if (isset($_POST['guardar'])) {
	$nombre_curso = $_POST['nombre_curso'];
	$precio = $_POST['precio'];
	$fecha_inicio = $_POST['fecha_inicio'];
	$fecha_fin = $_POST['fecha_fin'];
	$administrador_id_administrador = $_POST['administrador_id_administrador'];
	$descripcion = $_POST['descripcion'];
	$activo = $_POST['activo'];
	$profesor_identificacion = $_POST['profesor_identificacion'];


	if (!empty($nombre_curso) && !empty($precio) && !empty($fecha_inicio) && !empty($fecha_fin) && !empty($administrador_id_administrador) && !empty($descripcion) && !empty($activo) && !empty($profesor_identificacion)) {
		if (!filter_var($administrador_id_administrador, FILTER_VALIDATE_INT)) {
			echo "<script> alert('Administrador no valido');</script>";
		} else {
			$consulta_insert = $conexion->prepare('INSERT INTO curso(nombre_curso,precio,
				fecha_inicio,fecha_fin,administrador_id_administrador,descripcion,activo,profesor_identificacion) VALUES(:nombre_curso,:precio,
				:fecha_inicio,:fecha_fin,:administrador_id_administrador,:descripcion,:activo,:profesor_identificacion)');
			$consulta_insert->execute(array(
				':nombre_curso' => $nombre_curso,
				':precio' => $precio,
				':fecha_inicio' => $fecha_inicio,
				':fecha_fin' => $fecha_fin,
				':administrador_id_administrador' => $administrador_id_administrador,
				':descripcion' => $descripcion,
				':activo' => $activo,
				':profesor_identificacion' => $profesor_identificacion,
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
	<title>Nuevo Cliente</title>
	<link rel="stylesheet" href="../css/estilos.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>

<div class="contenedor">
		<h2>Ingresar Cursos</h2>
		<form method="post" class="row g-3 needs-validation">
			<div class="col-lg-6">
				<label class="form-label"><strong>Nombre Del Curso</strong></label>
				<input type="text" name="nombre_curso" placeholder="Nombres" class="form-control">
			</div>
			<div class="col-lg-6">
				<label class="form-label"><strong>Precio</strong></label>
				<input type="text" name="precio" placeholder="Precio" class="form-control">
			</div>
			<div class="col-lg-6">
			<label class="form-label"><strong>Fecha Inicial</strong></label>
				<input type="date" name="fecha_inicio" placeholder="Ingrese la fecha inicial del curso" class="form-control">
			</div>
			<div class="col-lg-6">
			<label class="form-label"><strong>Fecha Final</strong></label>
				<input type="date" name="fecha_fin" placeholder="Ingrese la fecha final del curso" class="form-control">
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

			
			<div class="col-lg-6">
				<label class="form-label"><strong>Profesor</strong></label>
				<select name="profesor_identificacion" class="form-select">

					<?php
					while ($profesor = mysqli_fetch_array($delete)) {
					?>
						<option value="<?php echo $profesor['identificacion'] ?>"> <?php echo $profesor['nombres'] ?> <?php echo $profesor['apellidos'] ?> </option>
					<?php
					}
					?>
				</select>
				
			</div>

			<div col-lg-4>
			<label class="form-label"><strong>Descripcion Del Curso</strong></label>
			<textarea rows="3" name="descripcion" placeholder="Descripcion" class="form-control"></textarea>
			</div>

			<div class="d-grid gap-2 d-md-flex justify-content-md-end">

				<a href="../ICursos/TableCursos.php" class="btn btn-danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn-success">

			</div>
		</form>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
	</script>


</body>

</html>