<?php
if(!empty($_POST['nombre'])) {
    require '../../interfazDB/insumos/update.php';
    $insumo = array( $_POST['nombre'], $_POST['unidadDeMedida'], $_POST['categoria'], $_POST['stock'] );
    update($_POST['insumoID'], $insumo);
    header('location: insumos.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Modificar Productos</title>

</head>
<body>
    <?php require '../navBar.php'; ?>
      
      <div class="b-example-divider"><h1 style="margin-left: 15px;">Modificar Insumo</h1></div>

    <div class="container-fluid " id="mainDiv">
        <div class="row d-flex justify-content-center" >
    <?php
    require '../../interfazDB/insumos/read.php';
        $insumoID = key($_POST);
        $insumo = mysqli_fetch_array( readInsumosID($insumoID) );
    echo '
    <form method="POST">
        <div class="form-group">
          <label for="exampleInputNombre">Nombre</label>
          <input name="nombre" class="form-control" id="exampleInputNombre" aria-describedby="NombreHelp" value="' . $insumo['nombre'] . '" required>
        </div>
        <div class="form-group">
          <label for="exampleInputUnidadMedida">Unidad Medida</label>
          <input name="unidadDeMedida" class="form-control" id="exampleInputUnidadMedida" value="' . $insumo['unidadDeMedida'] . '" required>
        </div>
        <div class="form-group">
        <label for="exampleInputCategoria">Categoria</label>
        <input name="categoria" class="form-control" id="exampleInputCategoria" value="' . $insumo['categoria'] . '" required>
        
        </div>
        <div class="form-group">
            <label for="exampleInputPrecioProducto">Stock</label>
            <input name="stock" type="number" class="form-control" id="exampleInputPrecioProducto" value="' . $insumo['stock'] . '" required>
            
        </div>
        <div class="mx-auto" style="width: 200px;">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <div class="form-group">
            <label for="exampleInputNombre">insumoID</label>
            <input name="insumoID" class="form-control" id="exampleInputNombre" aria-describedby="NombreHelp" value="' . $insumoID . '" required>
      </div>
    </form>
    ';
    ?>

</body>
</html>