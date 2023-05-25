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
	
	if(isset($_POST['guardar'])){
		$identificacion=$_POST['identificacion'];
		$nombres=$_POST['nombres'];
		$apellidos=$_POST['apellidos'];
		$pais=$_POST['pais'];
		$telefono=$_POST['telefono'];
		$email=$_POST['email'];
		$clave=$_POST['clave'];

		if(!empty('identificacion') && !empty($nombres) && !empty($apellidos) && !empty($pais) && !empty($telefono) && !empty($email) && !empty($clave) ){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$conexion->prepare('INSERT INTO administrador(identificacion,nombres,apellidos,pais,telefono,email,clave) VALUES(:identificacion,:nombres,:apellidos,:pais,:telefono,:email,:clave)');
				$consulta_insert->execute(array(
					':identificacion' =>$identificacion,
					':nombres' =>$nombres,
					':apellidos' =>$apellidos,
					':pais' =>$pais,
					':telefono' =>$telefono,
					':email' =>$email,
					':clave' =>$clave
				));
				header('Location: ../IAdministrador/InfoAdm.php');
			}
		}else{
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
		<h2>Insertar Un Nuevo Administrador</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="identificacion" placeholder="Identificacion" class="input__text">
				<input type="text" name="nombres" placeholder="Nombres" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="apellidos" placeholder="Apellidos" class="input__text">
				<input type="text" name="pais" placeholder="Pais" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="telefono" placeholder="Telefono" class="input__text">
				<input type="text" name="email" placeholder="Email" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="clave" placeholder="Clave" class="input__text">
			</div>

			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				
				<a href="../IAdministrador/InfoAdm.php" class="btn btn-danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn-success">

			</div>

		</form>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>

<?php

} else {

    header('location: ../404/404.php');
} ?>

</body>
</html>
