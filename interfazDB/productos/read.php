<?php

function read() {
    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
    include_once  $base_dir . $ds . 'coneccion.php';

    $resultado = mysqli_query($coneccion, 'SELECT * FROM productos');
    $numeroRegistros = mysqli_num_rows($resultado);
    mysqli_close($coneccion);

    if($numeroRegistros > 0)
        return $resultado;
    else
        return false;
}


?>