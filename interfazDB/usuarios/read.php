<?php
function readUsuario() {
    $base_dir = realpath(dirname(__FILE__) . '/..');
    require_once  $base_dir . '/coneccion.php';
    $coneccion = coneccion();

    $resultado = mysqli_query($coneccion, 'SELECT * FROM usuarios');
    mysqli_close($coneccion);
    return $resultado;
}

function readUsuarioPorUserName($userName) {
    $base_dir = realpath(dirname(__FILE__) . '/..');
    require_once  $base_dir . '/coneccion.php';
    $coneccion = coneccion();

    $query = 'SELECT * FROM usuarios WHERE userName = ?';
    $stmt = mysqli_prepare($coneccion, $query);
    mysqli_stmt_bind_param($stmt, 's', $userName);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($coneccion);
    return $resultado;
}

function readIdUsuario($usuarioID) {
    $base_dir = realpath(dirname(__FILE__) . '/..');
    require_once  $base_dir . '/coneccion.php';
    $coneccion = coneccion();

    $query = 'SELECT * FROM usuarios WHERE usuarioID = ?';
    $stmt = mysqli_prepare($coneccion, $query);
    mysqli_stmt_bind_param($stmt, 's', $usuarioID);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($coneccion);
    return $resultado;
}


?>