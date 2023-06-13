<?php

require '../config/config.php';
require '../config/database.php';

$db = new Database();

$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

//session_destroy();

if ($id == '' || $token == '') {

    echo 'Error al procesar la peticion';
    exit;
} else {

    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token == $token_tmp) {

        $sql = $con->prepare("SELECT count(id_curso) FROM curso WHERE id_curso=? AND activo = 1 LIMIT 1");
        $sql->execute([$id]);
        if ($sql->fetchColumn() > 0) {

            $sql = $con->prepare("SELECT nombre_curso, precio, descuento, fecha_inicio, fecha_fin, 
            descripcion FROM curso  WHERE id_curso=? AND activo = 1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $nombre_curso = $row['nombre_curso'];
            $precio = $row['precio'];
            $descuento = $row['descuento'];
            $fecha_inicio = $row['fecha_inicio'];
            $fecha_fin = $row['fecha_fin'];
            $descripcion = $row['descripcion'];

            $precio_desc = $precio - (($precio * $descuento) / 100);

            $dir_images = '../img/new_courses/' . $id . '/';

            $rutaImg = $dir_images . 'principal.jpg';

            if (!file_exists($rutaImg)) {

                $rutaImg = '../img/new_courses/no-photo.jpg';
            }

            $imagenes = array();

            if (file_exists($dir_images)) {
                $dir = dir($dir_images);

                while (($archivo = $dir->read()) != false) {

                    if ($archivo != 'principal.jpg' && (strpos($archivo, 'jpg') || strpos($archivo, 'jpeg'))) {

                        $imagenes[] = $dir_images . $archivo;
                    }
                }

                $dir->close();
            }
        }
    } else {

        echo 'Error al procesar la peticion';
        exit;
    }
}

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

            <div class="row">

                <div class="col-md-8 order-md-1">

                    <div id="carouselImages" class="carousel slide" data-bs-slide="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo $rutaImg; ?>" class="d-block w-100">
                            </div>

                            <?php foreach ($imagenes as $img) { ?>
                                <div class="carousel-item">

                                    <img src="<?php echo $img; ?>" class="d-block w-100">

                                </div>
                            <?php } ?>

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>

                <div class="col-md-4 order-md-2">

                    <h2><?php echo $nombre_curso; ?></h2>
                    <h2 class="label-control">Fecha inicio <?php echo $fecha_inicio; ?></h2>
                    <h2 class="label-control">Fecha fin <?php echo $fecha_fin; ?></h2>

                    <?php if ($descuento > 0) { ?>

                        <p><del><?php echo MONEDA . number_format($precio, 2, '.', '.'); ?></del></p>

                        <h2>
                            <?php echo MONEDA . number_format($precio_desc, 2, '.', '.'); ?>
                            <small class="text-success"> <?php echo $descuento; ?>% descuento </small>
                        </h2>

                    <?php } else { ?>

                        <h2><?php echo MONEDA . number_format($precio, 2, '.', '.'); ?></h2>

                    <?php } ?>

                    <p class="lead">

                        <?php echo $descripcion ?>

                    </p>

                    <div class="d-grid gap-3 col-10 mx-auto">

                        <a href="../Pago/pay.php" class="btn btn-primary" type="button">Comprar ahora</a>
                        <button class="btn btn-outline-primary" type="button" onclick="addProducto(<?php echo $id; ?>, '<?php echo $token_tmp ?>')"><i class="bi bi-cart4"></i></button>

                    </div>

                </div>

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