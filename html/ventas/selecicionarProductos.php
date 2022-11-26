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

  <div class="container">
    <header class="d-flex justify-content-center py-3">
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="../../Index.html" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="../ventas/ventas.html" class="nav-link">Ventas</a></li>
        <li class="nav-item"><a href="../gastos/gastos.html" class="nav-link">Gastos</a></li>
        <li class="nav-item"><a href="../prestamos/prestamos.html" class="nav-link">Prestamos</a></li>
        <li class="nav-item"><a href="../productos/productos.php" class="nav-link">Productos</a></li>
        <li class="nav-item"><a href="../invetario/invetario.html" class="nav-link">Invetario</a></li>
        <li class="nav-item"><a href="../proveedores/proveedores.html" class="nav-link">Proveedores</a></li>
        <li class="nav-item"><a href="../insumos/insumos.html" class="nav-link">Insumos</a></li>
        <li class="nav-item"><a href="../usuarios/usuarios.html" class="nav-link">Usuarios</a></li>
      </ul>
    </header>
  </div>

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
                      include '../../interfazDB/productos/read.php';
                      $datos = read();
                      while($registro = mysqli_fetch_array($datos)) {
                        echo '<tr>';
                          echo '<td>' . $registro['folioDeVenta'] . '</td>';
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
        <form action="agregarProducto/agregarProducto.php" method="post">
            <div class="form-group">
                <label for="ClienteInfo">Id del producto:</label>
                <input class="form-control" type="number" name="productoID" id="CantidadTextbox"></input>
                <label for="ClienteInfo">Cantidad en KG:</label>
                <input class="form-control" type="number" name="cantidad" id="CantidadTextbox"></input>
            </div>
            <div style="margin-top: 2rem; width: 50%;">
              <button type="submit" class="w-100 btn btn-secondary">Agregar</button>
              <a type="button" class="w-100 btn btn-primary" href="ventaParaLlevar.php" style="margin-left: 0px; margin-top: 1rem;">Terminar</a>
            </div>
        </div>
    </div>
</body>
</html>