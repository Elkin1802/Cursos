<?php

require '../config/config.php';
require '../config/database.php';

$db = new Database();

$con = $db->conectar();

$produtos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

$lista_carrito = array();

if ($produtos != null) {

    foreach ($produtos as $clave => $cantidad) {

        $sql = $con->prepare("SELECT id_curso , nombre_curso, precio, descuento, $cantidad as cantidad 
        FROM curso  WHERE id_curso = ?  AND activo = 1");
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC); //Usamos el fetch_assoc: recuperacion de datos
    }
} else {

    header("location: ../ICursos/InfoCursos");
    exit;
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
            <a class="btn btn-primary" href="#"><i class="bi bi-cart4"></i><span id="num_cart" class="badge bg-secondary"><?php echo $num_cart ?></span></a>
        </div>
    </nav>

    <!--Contenido-->
    <main>
        <div class="container">

            <div class="row">

                <div class="col-6">

                    <h4>Detalles de pago</h4>

                    <div id="paypal-button-container"></div>

                </div>

                <div class="col-6">

                    <div class="table-responsive">

                        <table class="table">

                            <thead>

                                <tr>

                                    <th>Producto</th>
                                    <th>Subtotal</th>
                                    <th></th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php if ($lista_carrito == null) {

                                    echo '<tr><td colspan=5 class="text-center"><b>Lista vacia</b></td></tr>';
                                } else {

                                    $total = 0;
                                    foreach ($lista_carrito as $producto) {

                                        $_id = $producto['id_curso'];
                                        $nombre = $producto['nombre_curso'];
                                        $precio = $producto['precio'];
                                        $descuento = $producto['descuento'];
                                        $cantidad = $producto['cantidad'];
                                        $precio_desc = $precio - (($precio * $descuento) / 100);
                                        $subtotal = $cantidad * $precio_desc;
                                        $total += $subtotal;

                                ?>

                                        <tr>

                                            <td><?php echo $nombre; ?></td>
                                            <td>

                                                <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal, 2, '.', '.'); ?></div>

                                            </td>

                                        </tr>

                                    <?php } ?>

                                    <tr>

                                        <td colspan="2">

                                            <p class="h3 text-end" id="total"><?php echo MONEDA . number_format($total,  2, '.', '.'); ?></p>

                                        </td>

                                    </tr>

                            </tbody>

                        <?php } ?>

                        </table>

                    </div>

                </div>

            </div>
        </div>
    </main>

    <h3 class="fw-bolder text-center ">SEÑOR USUARIO</h3>
    <p class="fw-bolder text-center ">Una vez realice el pago acceda al siguiente enlace para realizar la respectiva inscripcion</p>
    <p class="fw-bolder text-center "><a href="../Inscripcion/insert_inscripcion.php">Realizar inscripcion...</a></p>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENTE_ID; ?>&currency=<?php echo CURRENCY; ?>"></script>
    <script>
        paypal.Buttons({
            style: {
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions) {

                return actions.order.create({

                    purchase_units: [{

                        amount: {

                            value: <?php echo $total; ?>

                        }

                    }]

                });

            },

            onApprove: function(data, actions) {

                let url = '../Clases/captura.php'

                actions.order.capture().then(function(detalles) {

                    console.log(detalles)

                    return fetch(url, {

                        method: 'post',
                        headers: {

                            'content-type': 'application/json'

                        },

                        body: JSON.stringify({

                            detalles: detalles

                        })

                    })

                });

            },

            onCancel: function(data) {

                alert("Pago cancelado");
                console.log(data);

            }

        }).render('#paypal-button-container')
        
    </script>

    </head>

    <body>