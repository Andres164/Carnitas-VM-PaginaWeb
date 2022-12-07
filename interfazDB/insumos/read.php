<?php
function readInsumos() {
    $base_dir = realpath(dirname(__FILE__) . '/..');
    require_once  $base_dir . '/coneccion.php';
    $coneccion = coneccion();

    $resultado = mysqli_query($coneccion, 'SELECT * FROM insumos');
    mysqli_close($coneccion);
    return $resultado;
}
function readInsumosID($insumoID) {
    $base_dir = realpath(dirname(__FILE__) . '/..');
    require_once  $base_dir . '/coneccion.php';
    $coneccion = coneccion();

    $query = 'SELECT * FROM insumos where insumoID = ?';
    $stmt = mysqli_prepare($coneccion, $query);
    mysqli_stmt_bind_param($stmt, 'i', $insumoID);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($coneccion);
    return $resultado;
}

?>