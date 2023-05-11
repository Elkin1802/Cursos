<?php session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion profesores</title>

    <link rel="stylesheet" href="../css/tables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

</head>

<body>

    <div class="table">
        <div class="table_header">
            <p>Ver informacion Profesores</p>
            <div>

                <form class="d-flex">

                    <input placeholder="Buscar" type="search" name="busqueda">

                    <button class="add_new" type="Submit" name="enviar">Buscar</button>

            </div>
        </div>

        <?php
        $conexion = mysqli_connect("localhost", "root", "", "curso");
        $where = "";

        if (isset($_GET['enviar'])) {
            $busqueda = $_GET['busqueda'];


            if (isset($_GET['busqueda'])) {
                $where = "WHERE email LIKE'%" . $busqueda . "%' OR nombres  LIKE'%" . $busqueda . "%'
    OR apellidos LIKE'%" . $busqueda . "%' OR pais  LIKE'%" . $busqueda . "%' OR telefono  LIKE'%" . $busqueda . "%' OR identificacion  LIKE'%" . $busqueda . "%'";
            }
        }

        ?>

        <div class="table_section">

            <table>

                <thead>

                    <tr>

                        <th>Identificacion</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Pais</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Acciones</th>

                    </tr>

                </thead>

                <?php
$conexion=mysqli_connect("localhost","root","","curso");               
$SQL="SELECT identificacion, nombres, apellidos, pais, telefono, email 
FROM administrador $where";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){



                        echo '
                <tr>
                    <td>' . $fila['identificacion'] . '</td>
                    <td>' . $fila['nombres'] . '</td>
                    <td>' . $fila['apellidos'] . '</td>
                    <td>' . $fila['pais'] . '</td>
                    <td>' . $fila['telefono'] . '</td>
                    <td>' . $fila['email'] . '</td>
                    <td class="text-center">
                        <button><i class="bi bi-pencil-square"></i></button>
                        <button><i class="bi bi-trash-fill"></i></button>
                    </td>
                </tr>
                ';
                    }
                } else {

                ?>
                <tr>
                    <td colspan="7">No existen registros</td>
                </tr>


                <?php
                }


                ?>
            </table>

        </div>

    </div>



</body>

</html>