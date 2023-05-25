<?php

include_once '../config/conexion.php';
if (isset($_GET['id'])) {
	$id = (int) $_GET['id'];
	$delete = $conexion->prepare('DELETE FROM usuario WHERE identificacion=:id');
	$delete->execute(array(
		':id' => $id
	));
	header('Location: ../IUsuario/InfoUsers.php');
} else {
	header('Location: ../IUsuario/InfoUsers.php');
}
