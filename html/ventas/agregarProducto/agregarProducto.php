<?php
session_start();
require '../../../interfazDB/productos/read.php';
require '../../../interfazDB/productos/update.php';
// *la cantidad seleccionada debe ser menor o igual al stock

$producto = readID($_POST['productoID']);
$producto = mysqli_fetch_array($producto);
$stock = $producto['stock'];
if($_POST['cantidad'] <= $stock) {
    // *restar la cantidad seleccionada al stock
    $stockRestante = $stock - $_POST['cantidad'];
    updateStock($producto['productoID'], $stockRestante);

    /* *agregar esta entrada a la informacion de la venta
      guardar informacion de venta en $_SESSION, uno por tabla  */
    
    if( $ultimoProducto = end($_SESSION['productosVenta']) )
        $numeroFila = $ultimoProducto['numeroFila'] +1;
    else
        $numeroFila = 1;

    $productoVenta = array();
    $productoVenta['numeroFila'] = $numeroFila;
    $productoVenta['nombre'] = $producto['nombre'];
    $productoVenta['cantidad'] = $_POST['cantidad'];
    $productoVenta['unidadDeMedida'] = $producto['unidadDeMedida'];
    $productoVenta['subtotal'] = $producto['precioDeVenta'] * $_POST['cantidad'];
    $productoVenta['productoID'] = $_POST['productoID'];
    array_push( $_SESSION['productosVenta'],  $productoVenta);
} else
    echo '<h1>la cantidad seleccionada exede el stock</h1>';
?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="margin-top: 2rem; width: 50%;">
        <a type="button" class="w-100 btn btn-primary" href="../ventaParaLlevar.php" style="margin-left: 0px; margin-top: 1rem;">Terminar</a>
    </div>
</body>
</html>