<?php 
session_start(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Ventas para llevar</title>
    <style>
        #divGastos {
            background-color: aliceblue;
            height: 100%;
        }
        #divBotones {
            background-color: blanchedalmond;
            
            width: 15%;
            height: max-content;
            padding: 2rem;
        }
        a {
            margin: 8px;
            size: 90%;
        }
    </style>
</head>
<body>
    
    <?php require '../navBar.php'; ?>
    <h1>Venta para llevar</h1>
    <h2>PRODUCTOS</h2>
    <div class="container" id="divGastos">
        <div class="row d-flex justify-content-center" >
            <div class="col-10" id="divDataGrid">
                <div class="col" style="background-color: grey;">
                <table class="table table-dark">
                    <thead>
                        <tr>
                          <th scope="col"> # </th>
                          <th scope="col"> nombre </th>
                          <th scope="col"> Cantidad </th>
                          <th scope="col"> Unidad de medida </th>
                          <th scope="col"> Total $ </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(isset($_SESSION['productosVenta'])) {
                        foreach($_SESSION['productosVenta'] as $productoVenta)
                        {
                          echo '<tr>';
                            echo '<td>' . $productoVenta['numeroFila'] . '</td>';
                            echo '<td>' . $productoVenta['nombre'] . '</td>';
                            echo '<td>' . $productoVenta['cantidad']  . '</td>';
                            echo '<td>' . $productoVenta['unidadDeMedida']  . '</td>';
                            echo '<td>' . $productoVenta['subtotal']  . '</td>';
                          echo '</tr>';
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                  <?php
                    require_once '../../interfazDB/productos/update.php';
                    require_once '../../interfazDB/productos/read.php';
                    $numeroFilaEncontrado = true;
                    if( isset($_POST['numeroFila']) ) {
                        $numeroFilaEncontrado = false;
                        header("refresh: 0");
                        $i = 0;
                        foreach( $_SESSION['productosVenta'] as $productoVenta) {
                            if( $_POST['numeroFila'] == $productoVenta['numeroFila']) {
                                $numeroFilaEncontrado = true;
                                // quitar el productoVenta de los productosVenta
                                unset ( $_SESSION['productosVenta'][$_POST['numeroFila'] -1] );
                                
                                // actualizar el stock
                                $result = mysqli_fetch_array( readID($productoVenta['productoID']) );
                                $stockActual = $result['stock'];
                                $stockCorregido = $stockActual + $productoVenta['cantidad'];
                                updateStock($productoVenta['productoID'], $stockCorregido);
                                break;
                            }
                            $i++;
                        }
                        if (!$numeroFilaEncontrado) {
                            echo '<h1>No se encontro el numero de fila</h1>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col" id="divBotones">
                <a style="margin-left: 0px;" type="button"  href="selecicionarProductos.php" class="w-100 btn btn-secondary">Agregar</a><br>
                <a style="margin-left: 0px;" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="w-100 btn btn-secondary">Quitar</a><br>
                <form action="ventas.php" method="post">
                  <input style="margin-bottom: 1rem;" type="submit" class="w-100 btn btn-secondary" name="cancelar" value="Cancelar"><br>
                  <input type="submit" class="w-100 btn btn-secondary" name="guardar" value="Guardar"><br>
                </form>
            </div>
        </div>
    </div>
<div>
    <!-- modal (popUp)-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Quitar producto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
            <div class="modal-body">
              <h5># de fila</h5>
              <input type="number" name="numeroFila" required><br>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <input type="submit" class="btn btn-primary" value="Quitar">
            </div>
            </form>
          </div>
        </div>
      </div>

      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>