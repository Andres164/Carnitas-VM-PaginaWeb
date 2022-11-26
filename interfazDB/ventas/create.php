<?php
// array { productoID, cantidad, subtotal }
// usuarioID
// tipoDeVenta
function createVenta($productosVenta, $tipoVenta, $usuarioID) {
    $base_dir = realpath(dirname(__FILE__) . '/..');
    require_once  $base_dir . '/coneccion.php';
    require_once 'read.php';
    $coneccion = coneccion();

    $query = 'INSERT INTO ventas (totalVenta, tipoVenta, usuarioID)
              VALUES (?, ?, ?)';

    $stmt = mysqli_prepare($coneccion, $query);
    $totalVenta = 0;
    foreach($productosVenta as $productoVenta)
        $totalVenta += $productoVenta['subtotal'];

    mysqli_stmt_bind_param($stmt, 'dii', $totalVenta, $tipoVenta, $usuarioID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    // detalles de venta
    $query ='INSERT INTO productos_venta (productoID, folioDeVenta, cantidadProducto)
             VALUES (?, ?, ?)';
    $stmt = mysqli_prepare($coneccion, $query);

    $ventaID = mysqli_fetch_array( readUltimoRegistro() )['folioDeVenta'];
    foreach($productosVenta as $productoVenta) {
        mysqli_stmt_bind_param($stmt, 'iid', $productoVenta['productoID'], $ventaID, $productoVenta['cantidad']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_free_result($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($coneccion);
}

?>