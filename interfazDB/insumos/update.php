<?php

function update($insumoID, $valorCampos) {
    $base_dir = realpath(dirname(__FILE__) . '/..');
    require_once  $base_dir . '/coneccion.php';
    $coneccion = coneccion();

    $query = 'UPDATE insumos
    SET nombre = ?, unidadDeMedida = ?, categoria = ?, stock = ?
    WHERE insumoID = ?';

    $stmt = mysqli_prepare($coneccion, $query);

    mysqli_stmt_bind_param( $stmt,'sssdi', $valorCampos[0], $valorCampos[1], $valorCampos[2], $valorCampos[3], $insumoID );

    $stmtExitoso = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($coneccion);
    return $stmtExitoso;
}

function updateStockInsumos($insumoID, $nuevoStock) {
    $base_dir = realpath(dirname(__FILE__) . '/..');
    require_once  $base_dir . '/coneccion.php';
    $coneccion = coneccion();

    $query = 'UPDATE insumos SET stock = ? WHERE insumoID = ?';

    $stmt = mysqli_prepare($coneccion, $query);

    mysqli_stmt_bind_param( $stmt,'di', $nuevoStock, $insumoID );

    $stmtExitoso = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($coneccion);
    return $stmtExitoso;
}

?>