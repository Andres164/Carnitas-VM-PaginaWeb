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
    
    $ultimoID = mysqli_query($coneccion, 'SELECT * FROM ventas ORDER BY folioDeVenta DESC LIMIT 1');
    $ultimoID = mysqli_fetch_array($ultimoID)['folioDeVenta'];
    $query = 'SELECT * FROM ventas WHERE folioDeVenta = ' . $ultimoID;
    $resultado = mysqli_query($coneccion, $query);
    $numeroRegistros = mysqli_num_rows($resultado);
    mysqli_close($coneccion);

    if($numeroRegistros > 0)
        return $resultado;
    else
        return false;  
}
?>
