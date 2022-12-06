<?php

function delete($insumoID) {
    $base_dir = realpath(dirname(__FILE__) . '/..');
    require_once  $base_dir . '/coneccion.php';
    $coneccion = coneccion();

    $query = 'DELETE FROM insumos WHERE insumoID = ?';

    $stmt = mysqli_prepare($coneccion, $query);

    mysqli_stmt_bind_param( $stmt, 'i', $insumoID );

    $stmtExitoso = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($coneccion);
    return $stmtExitoso;
}

?>