<?php

function readProductos_venta($folioDeVenta) {
    $base_dir = realpath(dirname(__FILE__) . '/..');
    require_once  $base_dir . '/coneccion.php';
    $coneccion = coneccion();

    $query = 'SELECT * FROM productos_venta WHERE folioDeVenta = ?';
    $stmt = mysqli_prepare($coneccion, $query);
    mysqli_stmt_bind_param($stmt, 'i', $folioDeVenta);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($coneccion);
    return $resultado;
}
?>