<?php

require '../config/config.php';
require '../config/database.php';

$db = new Database();

$con = $db->conectar();

$sql = $con->prepare("SELECT id_curso , nombre_curso, precio FROM curso  WHERE activo = 1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC); //Usamos el fetch_assoc: recuperacion de datos


//session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">

    <link rel="stylesheet" href="../css/cursos.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand"></a>
            <a class="btn btn-primary" href="./checkout.php"><i class="bi bi-cart4"></i><span id="num_cart" class="badge bg-secondary"><?php echo $num_cart ?></span></a>
        </div>
    </nav>


    <!--Contenido-->
    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <!-- TRAE POR MEDIO DE LA CONSULTA DATOS INGRESADOS EN EL SECTOR DE CURSOS -->

                <?php foreach ($resultado as $row) { ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <?php

                            $id = $row['id_curso'];
                            $imagen = "../img/new_courses/$id/principal.jpg";

                            if (!file_exists($imagen)) {

                                $imagen = "../img/new_courses/no-photo.jpg";
                            }

                            ?>

                            <img src="<?php echo $imagen; ?>">
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo $row['nombre_curso']; ?> </h5>
                                <p class="card-text">$ <?php echo number_format($row['precio'], 2, '.', '.'); ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="./detalles.php?id=<?php echo $row['id_curso']; ?>&token=<?php echo hash_hmac('sha1', $row['id_curso'], KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>
                                    </div>
                                    <button class="btn btn-outline-success" type="button" onclick="addProducto(<?php echo $row['id_curso']; ?>, '<?php echo hash_hmac('sha1', $row['id_curso'], KEY_TOKEN); ?>')"><i class="bi bi-cart4"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        function addProducto(id, token) {

            let url = '../Clases/carrito.php';
            let formData = new FormData();
            formData.append('id', id);
            formData.append('token', token);

            fetch(url, {

                    method: 'POST',
                    body: formData,
                    mode: 'cors'

                }).then(Response => Response.json())
                .then(data => {

                    if (data.ok) {

                        let elemento = document.getElementById("num_cart");
                        elemento.innerHTML = data.numero;

                    }

                })

        }
    </script>

</body>

</html>