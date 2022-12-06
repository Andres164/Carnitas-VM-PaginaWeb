<?php
session_start();
$mensaje = '';
if( isset($_POST['productoID']) && isset($_POST['cantidad']) ) {
  require_once '../../interfazDB/productos/read.php';
  require '../../interfazDB/productos/update.php';
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
      $mensaje = '<h2>la cantidad seleccionada exede el stock</h2>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Seleccionar productos</title>
    <link rel="stylesheet" type="text/css" href="../../css/templateStyles.css">
</head>
<body>

<?php require '../navBar.php'; ?>

  <div class="b-example-divider"><h1 style="margin-left: 15px;">Productos</h1></div>

    <div class="container-fluid " id="mainDiv">
        <div class="row d-flex justify-content-center" >
          <div class="col-8" id="divDataGrid">
            <div class="col">
                  <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col"> Id </th>
                        <th scope="col"> nombre </th>
                        <th scope="col"> Unidad de medida </th>
                        <th scope="col"> Precio de venta </th>
                        <th scope="col"> Costo de produccion </th>
                        <th scope="col"> Categoria </th>
                        <th scope="col"> Stock </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      require_once '../../interfazDB/productos/read.php';
                      $datos = read();
                      while($registro = mysqli_fetch_array($datos)) {
                        echo '<tr>';
                          echo '<td>' . $registro['productoID'] . '</td>';
                          echo '<td>' . $registro['nombre']  . '</td>';
                          echo '<td>' . $registro['unidadDeMedida']  . '</td>';
                          echo '<td>' . $registro['precioDeVenta']  . '</td>';
                          echo '<td>' . $registro['costoDeProduccion']  . '</td>';
                          echo '<td>' . $registro['categoria']  . '</td>';
                          echo '<td>' . $registro['stock']  . '</td>';
                        echo '</tr>';
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                
              </table>
            </div>
        <form  method="post">
            <div class="form-group">
                <label for="ClienteInfo">Id del producto:</label>
                <input class="form-control" type="number" name="productoID" id="CantidadTextbox" required>
                <label for="ClienteInfo">Cantidad en KG:</label>
                <input class="form-control" type="number" step="0.010" name="cantidad" id="CantidadTextbox" required>
                <?php echo $mensaje ?>
            </div>
            <div style="margin-top: 2rem; width: 50%;">
              <button type="submit" class="w-100 btn btn-secondary">Agregar</button>
              <a type="button" class="w-100 btn btn-primary" href="ventaParaLlevar.php" style="margin-left: 0px; margin-top: 1rem;">Terminar</a>
            </div>
        </div>
    </div>
</body>
</html>