<?php 

	include_once '../config/conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$conexion->prepare('DELETE FROM curso WHERE id_curso=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: ../ICursos/TableCursos.php');
	}else{
		header('Location: ../404/404.php');
	}
