<?php
session_start();
if(isset( $_POST['guardar'] ) && isset( $_SESSION['productosVenta'] ) ) {
    require_once '../../interfazDB/ventas/create.php';
    createVenta($_SESSION['productosVenta'], 1, $_SESSION['usuario']);
    header('Location: ../../ticket/ticket.php');
}
else if(isset( $_SESSION['productosVenta'] )) {
    require_once '../../interfazDB/productos/read.php';
    require_once '../../interfazDB/productos/update.php';
    foreach($_SESSION['productosVenta'] as $productoVenta) {
        $result = mysqli_fetch_array( readID($productoVenta['productoID']) );
        $stockActual = $result['stock'];
        $stockCorregido = $stockActual + $productoVenta['cantidad'];
        updateStock($productoVenta['productoID'], $stockCorregido);
    }
}
$_SESSION['productosVenta'] = array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Ventas</title>
    <style>
        #divGastos {
            background-color: aliceblue;
            height: 100%;
        }
        #divDataGrid {
            background-color: aquamarine;

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
    <input type = "datetime-local" id="meeting-time">
    <div class="container-fluid" id="divGastos">
        <div class="row">
            <div class="col" id="divDataGrid">
                <div class="col">
                  <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col"> Folio de venta </th>
                        <th scope="col"> Fecha de venta </th>
                        <th scope="col"> Cajero </th>
                        <th scope="col"> Total de venta </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      require_once '../../interfazDB/ventas/read.php';
                      require_once '../../interfazDB/usuarios/read.php';
                      $datos = readVentas();

                      while($registro = mysqli_fetch_array($datos)) {
                        $usuario = mysqli_fetch_array( readIdUsuario($registro['usuarioID']) );
                        echo '<tr>';
                          echo '<td>' . $registro['folioDeVenta']  . '</td>';
                          echo '<td>' . $registro['fechaDeVenta']  . '</td>';
                          echo '<td>' . $usuario['nombrePersona']  . '</td>';
                          echo '<td>' . $registro['totalDeVenta']  . '</td>';
                        echo '</tr>';
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
            </div>
            <div class="col" id="divDataGrid">

            </div>
            <div class="col" id="divBotones">
                <a type="button" href="ventaParaLlevar.php" class="w-100 btn btn-secondary">Realizar venta</a><br>
            </div>
        </div>
    </div>


    <div>
    </div>
</body>
</html>