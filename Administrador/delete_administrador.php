<?php 

	include_once '../config/conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$conexion->prepare('DELETE FROM administrador WHERE identificacion=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: ../IAdministrador/InfoAdm.php');
	}else{
		header('Location: ../IAdministrador/InfoAdm.php');
	}
