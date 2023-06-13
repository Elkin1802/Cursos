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

            <div class="table-responsive">

                <table class="table">

                    <thead>

                        <tr>

                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
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
                                    <td><?php echo MONEDA . number_format($precio_desc, 2, '.', '.'); ?></td>
                                    <td>

                                        <input type="number" min="1" max="10" step="1" value="<?php echo $cantidad ?>" size="5" id="cantidad_<?php echo $_id; ?>" onchange="actualizaCantidad(this.value, <?php echo $_id ?>)">

                                    </td>
                                    <td>

                                        <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal, 2, '.', '.'); ?></div>

                                    </td>

                                    <td> <a href="#" id="eliminar" class="btn btn-danger btn-sm" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal"><i class="bi bi-trash-fill"></i></a></td>

                                </tr>

                            <?php } ?>

                            <tr>

                                <td colspan="3"></td>
                                <td colspan="2">

                                    <p class="h3" id="total"><?php echo MONEDA . number_format($total,  2, '.', '.'); ?></p>

                                </td>

                            </tr>

                    </tbody>

                <?php } ?>

                </table>

            </div>

            <?php if ($lista_carrito != null) { ?>

                <div class="row">

                    <div class="col-md-5 offset-md-7 d-grid gap-2">

                        <a href="../Pago/pay.php" class="btn btn-primary btn-lg"> Realizar Pago </a>

                    </div>

                <?php } ?>

                </div>

        </div>
    </main>

    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="eliminaModalLabel">Alerta</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Desea eliminar el curso de la lista?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="btn-elimina" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        let eliminaModal = document.getElementById('eliminaModal')
        eliminaModal.addEventListener('show.bs.modal', function(event) {

            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')
            let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
            buttonElimina.value = id
        })

        function actualizaCantidad(cantidad, id) {

            let url = '../Clases/actualizar_carrito.php';
            let formData = new FormData();
            formData.append('action', 'agregar');
            formData.append('id_curso', id);
            formData.append('cantidad', cantidad);

            fetch(url, {

                    method: 'POST',
                    body: formData,
                    mode: 'cors'

                }).then(Response => Response.json())
                .then(data => {

                    if (data.ok) {

                        let divsubtotal = document.getElementById('subtotal_' + id)
                        divsubtotal.innerHTML = data.sub

                        let total = 0.00
                        let list = document.getElementsByName('subtotal[]')


                        for (let i = 0; i < list.length; i++) {

                            total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''));

                        }

                        total = new Intl.NumberFormat('en-US', {

                            minimumFractionDigits: 2

                        }).format(total)

                        document.getElementById('total').innerHTML = '<?php echo MONEDA; ?>' + total

                    }

                })

        }

        function eliminar() {

            let botonElimina = document.getElementById('btn-elimina')
            let id = botonElimina.value

            let url = '../Clases/actualizar_carrito.php';
            let formData = new FormData();
            formData.append('action', 'eliminar');
            formData.append('id_curso', id);


            fetch(url, {

                    method: 'POST',
                    body: formData,
                    mode: 'cors'

                }).then(Response => Response.json())
                .then(data => {

                    if (data.ok) {

                        location.reload()

                    }

                })

        }
    </script>

</body>

</html>