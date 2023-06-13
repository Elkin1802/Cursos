<?php

session_start();

$conexion = mysqli_connect('localhost', 'root', '', 'curso');

/* if($conexion){
        echo "<p>Función la conexión</p>";
    }
    else{
        echo "Error en la conexión".mysqli_error($conexion);
    }*/

if ($_SESSION['usuario']) {

session_destroy();
header('location: ../index.php');

}
?>