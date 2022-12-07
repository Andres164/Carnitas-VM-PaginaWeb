<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Registrar Productos</title>

</head>
<body>
<?php require '../navBar.php'; ?>
      
      <div class="b-example-divider"><h1 style="margin-left: 15px;">Registrar Productos</h1></div>

    <div class="container-fluid " id="mainDiv">
        <div class="row d-flex justify-content-center" >

    <form>
        <div class="form-group">
          <label for="exampleInputNombre">Nombre Producto</label>
          <input name="nombre" class="form-control" id="exampleInputNombre" aria-describedby="NombreHelp" placeholder="Nombre Producto">
        </div>
        <div class="form-group">
          <label for="exampleInputUnidadMedida">Unidad Medida</label>
          <input name="unidadDeMedida" class="form-control" id="exampleInputUnidadMedida" placeholder="Unidad De Medida">
        </div>
        <div class="form-group">
            <label for="exampleInputPrecioProducto">Precio Producto</label>
            <input name="precioDeVenta" class="form-control" id="exampleInputPrecioProducto" placeholder="Precio Del Producto">
        </div>
        <div class="form-group">
            <label for="exampleInputPrecioProducto">Costo de produccion</label>
            <input name="costoDePrdouccion" class="form-control" id="exampleInputPrecioProducto" placeholder="Costo de produccion">
        </div>
        <div class="form-group">
            <label for="exampleInputPrecioProducto">Stock</label>
            <input name="stock" class="form-control" id="exampleInputPrecioProducto" placeholder="stock">
        </div>
        <div class="form-group">
            <label for="exampleInputCategoria">Categoria Productos</label>
            <input name="categoria" class="form-control" id="exampleInputCategoria" placeholder="Categoria Del Producto">
            
        </div>
        

        
        <div class="mx-auto" style="width: 200px;">
            <option></option>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
       
    </form>

</body>
</html>