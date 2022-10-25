<?php
function read() {
    $base_dir = realpath(dirname(__FILE__) . '/..');
    require_once  $base_dir . '/coneccion.php';
    $coneccion = coneccion();

    $resultado = mysqli_query($coneccion, 'SELECT * FROM ventas');
    $numeroRegistros = mysqli_num_rows($resultado);
    mysqli_close($coneccion);

    if($numeroRegistros > 0)
        return $resultado;
    else
        return false;
}
function readUltimoRegistro() {
    $base_dir = realpath(dirname(__FILE__) . '/..');
    require_once  $base_dir . '/coneccion.php';
    $coneccion = coneccion();

    $ultimoID = mysqli_query($coneccion, 'SELECT last_insert_id()');
    $resultado = mysqli_query($coneccion, 'SELECT * FROM ventas WHERE folioVenta = ' . $ultimoID);
    $numeroRegistros = mysqli_num_rows($resultado);
    mysqli_close($coneccion);

    if($numeroRegistros > 0)
        return $resultado;
    else
        return false;  
}
?>