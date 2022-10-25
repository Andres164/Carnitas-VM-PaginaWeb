<?php

function updateStock($productoID, $nuevoStock) {
    $base_dir = realpath(dirname(__FILE__) . '/..');
    require_once  $base_dir . '/coneccion.php';
    $coneccion = coneccion();

    $query = 'UPDATE productos SET stock = ? WHERE productoID = ?';

    $stmt = mysqli_prepare($coneccion, $query);

    $nuevoStock = htmlspecialchars(strip_tags($nuevoStock));

    mysqli_stmt_bind_param( $stmt, 'di', $nuevoStock, $productoID );

    $stmtExitoso = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($coneccion);
    return $stmtExitoso;
}

?>