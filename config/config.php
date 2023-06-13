<?php

define("CLIENTE_ID", "AScrnHnToMu1RvyE7b2eip9Udk1bcr33cNddCKlAsc9cORRn4kokwDGNRRDszQAPIQ7JcUlv-fS29xk8");
define("CURRENCY", "MXN");
define("KEY_TOKEN", "aBc.DeF-07*");
define("MONEDA", "$");


session_start();


$num_cart = 0;
if (isset($_SESSION['carrito']['productos'])) {

    $num_cart = count($_SESSION['carrito']['productos']);
}
