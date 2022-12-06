<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Modificar ventas</title>
    <link rel="stylesheet" type="text/css" href="../../css/templateStyles.css">
</head>
<body>

  <?php require '../navBar.php'; ?>

  <div class="b-example-divider"><h1 style="margin-left: 15px;">Modificar ventas</h1></div>

    <div class="container-fluid " id="mainDiv">
        <div class="row d-flex justify-content-center" >
            <div class="col-8" id="divDataGrid">
                <div class="col" style="background-color: grey;">
                    <br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
            <div class="col-4" id="divBotones">
                <a type="button" href="selecicionar productos.html" class="w-100 btn btn-secondary">Agregar</a><br>
                <a type="button" class="w-100 btn btn-secondary">Quitar</a><br>
            </div>
            <div class="form-group">
                <label for="ClienteInfo">Total:</label><br>
                <textarea class="form-control" id="CantidadTextbox" rows="1"></textarea>
            </div>
            <div>
                <a type="button" class="w-40 btn btn-secondary">Cancelar</a><br>
                <a type="button" class="w-40 btn btn-secondary">Guardar</a><br>
            </div>
    </div>
</body>
</html>