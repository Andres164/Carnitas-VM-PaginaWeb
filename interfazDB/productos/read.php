<?php
function read() {
    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
    include_once  $base_dir . 'coneccion.php';

    $resultado = mysqli_query($coneccion, 'SELECT * FROM productos');
    $numeroRegistros = mysqli_num_rows($resultado);
    mysqli_close($coneccion);

    if($numeroRegistros > 0)
        return $resultado;
    else
        return false;
}

function readID($ID) {
    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
    include_once  $base_dir . 'coneccion.php';

    $query = 'SELECT * FROM productos where productoID = ?';

    $stmt = mysqli_prepare($coneccion, $query);

    $ID = htmlspecialchars(strip_tags($ID));

    mysqli_stmt_bind_param($stmt, 'i', $ID);

    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    
    $numeroRegistros = mysqli_num_rows($resultado);

    mysqli_stmt_close($stmt);
    mysqli_close($coneccion);

    if($numeroRegistros > 0)
        return $resultado;
    else
        return false;
}

?>