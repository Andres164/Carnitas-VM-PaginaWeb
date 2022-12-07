<?php
  session_start();
  if( isset($_POST['accion']) ) {
    if($_POST['accion'] == 'Modificar insumos') {
      require '../../interfazDB/insumos/update.php';
      //updateStockInsumos();
    } else {
      require '../../interfazDB/insumos/update.php';
      $insumo = array( $_POST['nombre'], $_POST['unidadDeMedida'], $_POST['categoria'], $_POST['stock'] );
      update($insumoID, $insumo);
    }
  }
  else if( isset($_POST) ) {
    $insumoID = key($_POST);
    require '../../interfazDB/insumos/delete.php';
    delete($insumoID);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Invetario</title>
    <link rel="stylesheet" type="text/css" href="../../css/templateStyles.css">
</head>
<body>

<?php require '../navBar.php'; ?>

  <div class="b-example-divider"><h1 style="margin-left: 15px;">Invetario</h1></div>

    <div class="container-fluid " id="mainDiv">
        <div class="row d-flex justify-content-center">
            <div class="col-8" id="divDataGrid">
                <div class="col" style="background-color: grey;">
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
            </div>
            <div class="col-8" id="divDataGrid">
            <div class="col">
                  <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col"> nombre </th>
                        <th scope="col"> Unidad de medida </th>
                        <th scope="col"> Categoria </th>
                        <th scope="col"> Stock </th>
                        <th scope="col">Modificar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include '../../interfazDB/insumos/read.php';
                      $datos = readInsumos();
                      while($registro = mysqli_fetch_array($datos)) {
                        echo '<tr>';
                          echo '<td>' . $registro['nombre']  . '</td>';
                          echo '<td>' . $registro['unidadDeMedida']  . '</td>';
                          echo '<td>' . $registro['categoria']  . '</td>';
                          echo '<td>' . $registro['stock']  . '</td>';
                          echo '<td> <button data-bs-toggle="modal" data-bs-target="#modificarRegModal" class="w-100 btn btn-secondary">*</button> </td>';
                        echo '</tr>';
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- modal (popUp)-->
    <form method="POST" class="modal fade" id="modificarRegModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modificar registro</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <h5>Stock</h5>
              <input type="number" step="any" name="stock" required><br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-primary" name="accion" value='Modificar insumos'>
          </div>
        </div>
      </div>
    </form>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>