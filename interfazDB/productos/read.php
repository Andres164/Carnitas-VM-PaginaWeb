<?php
function read() {
    $base_dir = realpath(dirname(__FILE__) . '/..');
    require_once  $base_dir . '/coneccion.php';
    $coneccion = coneccion();

    $resultado = mysqli_query($coneccion, 'SELECT * FROM productos');
    mysqli_close($coneccion);
    return $resultado;
}

function readID($ID) {
    $base_dir = realpath(dirname(__FILE__) . '/..');
    require_once  $base_dir . '/coneccion.php';
    $coneccion = coneccion();

    $query = 'SELECT * FROM productos where productoID = ?';
    $stmt = mysqli_prepare($coneccion, $query);
    $ID = htmlspecialchars(strip_tags($ID));
    mysqli_stmt_bind_param($stmt, 'i', $ID);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($coneccion);
    return $resultado;
}

?>