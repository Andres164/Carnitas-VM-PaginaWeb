<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Usuarios</title>
    <link rel="stylesheet" type="text/css" href="../../css/templateStyles.css">
</head>
<body>

<?php require '../navBar.php'; ?>

  <div class="b-example-divider"><h1 style="margin-left: 15px;">Usuarios</h1></div>

    <div class="container-fluid " id="mainDiv">
        <div class="row d-flex justify-content-center" >
          <div class="col-8" id="divDataGrid">
            <div class="col">
                  <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col"> User name </th>
                        <th scope="col"> Nombre </th>
                        <th scope="col"> Tipo de usuario </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include '../../interfazDB/usuarios/read.php';
                      $datos = readUsuario();
                      while($registro = mysqli_fetch_array($datos)) {
                        echo '<tr>';
                          echo '<td>' . $registro['userName']  . '</td>';
                          echo '<td>' . $registro['nombrePersona']  . '</td>';
                          echo '<td>' . $registro['tipoUsuario']  . '</td>';
                        echo '</tr>';
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
            </div>
            <div class="col-4" id="divBotones">
                <a type="button" href="registrarUsuarios.html" class="w-100 btn btn-secondary">Registrar Usuario</a><br>
                <a type="button" href="#" class="w-100 btn btn-secondary">Eliminar registro</a><br>
                <a type="button" href="modificarUsuarios.html" class="w-100 btn btn-secondary">Modificar registro</a><br><br>
                <button type="button"  class="w-100 btn btn-secondary">Refrescar tabla</button> <br>
            </div>
        </div>
    </div>
</body>
</html>