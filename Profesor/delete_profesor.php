<?php 

	include_once '../config/conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$conexion->prepare('DELETE FROM profesor WHERE identificacion=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: ../IProfesor/InfoTeacher.php');
	}else{
		header('Location: ../IProfesor/InfoTeacher.php');
	}
