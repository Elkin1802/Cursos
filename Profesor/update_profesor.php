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

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$conexion->prepare('SELECT * FROM administrador WHERE identificacion=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$nombres=$_POST['nombres'];
		$apellidos=$_POST['apellidos'];
		$pais=$_POST['pais'];
		$telefono=$_POST['telefono'];
		$email=$_POST['email'];
		$clave=$_POST['clave'];
		$id=(int) $_GET['id'];

		if(!empty('identificacion') && !empty($nombres) && !empty($apellidos) && !empty($pais) && !empty($telefono) && !empty($email) && !empty($clave) ){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_update=$conexion->prepare(' UPDATE profesor SET  
					nombres=:nombres,
					apellidos=:apellidos,
					pais=:pais,
					telefono=:telefono,
					email=:email,
					clave=:clave
					WHERE identificacion=:id;'
				);
				$consulta_update->execute(array(
					':nombres' =>$nombres,
					':apellidos' =>$apellidos,
					':pais' =>$pais,
					':telefono' =>$telefono,
					':email' =>$email,
					':clave' =>$clave,
					':id' =>$id
				));
				header('Location: index.php');
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
	<title>Editar Administrador</title>

	<link rel="stylesheet" href="../css/estilos.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<div class="contenedor">
		<h2>Actualizar Datos</h2>
		<form action="" method="post">
			<div class="form-group">

				<input type="text" name="nombres" value="<?php if($resultado) echo $resultado['nombres']; ?>"  placeholder="Nombres" class="input__text">
				<input type="text" name="apellidos" value="<?php if($resultado) echo $resultado['apellidos']; ?>" placeholder="Apellidos" class="input__text">

			</div>
			<div class="form-group">
				
				<input type="text" name="pais" placeholder="Pais" value="<?php if($resultado) echo $resultado['pais']; ?>" class="input__text">
				<input type="number" name="telefono" placeholder="Telefono" value="<?php if($resultado) echo $resultado['telefono']; ?>" class="input__text">
			</div>
			<div class="form-group">
				
				<input type="text" name="email" placeholder="Email" value="<?php if($resultado) echo $resultado['email']; ?>" class="input__text">
				<input type="password" name="clave" placeholder="Clave" value="<?php if($resultado) echo $resultado['clave']; ?>" class="input__text">
				
			</div>

			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				
				<a href="../IAdministrador/InfoAdm.php" class="btn btn-danger">Cancelar</a>
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

<?php

} else {

    header('location: ../404/404.php');
} ?>

</body>
</html>




