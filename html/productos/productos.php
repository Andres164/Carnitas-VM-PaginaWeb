<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Productos</title>
    <link rel="stylesheet" type="text/css" href="../../css/templateStyles.css">
</head>
<body>
  <!-- Nav bar -->
  <?php require '../navBar.php'; ?>

  <div class="b-example-divider"><h1 style="margin-left: 15px;">Productos</h1></div>
  <div class="container-fluid " id="mainDiv">
        <div class="row d-flex justify-content-center" >
            <!-- DataGrid -->
            <div class="col-8" id="divDataGrid">
                <div class="col">
                  <table class="table table-dark">
                    <thead>
                      <tr>
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
                      include '../../interfazDB/productos/read.php';
                      $datos = read();
                      while($registro = mysqli_fetch_array($datos)) {
                        echo '<tr>';
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
            </div>
            <!-- Botones -->
            <div class="col-4" id="divBotones">
                <a type="button" href="registrarProductos.php" class="w-100 btn btn-secondary">Registrar Producto</a><br>
                
            </div>
        </div>
    </div>
</body>
</html>