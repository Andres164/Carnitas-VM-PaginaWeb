<?php

function create($valorCampos) {
    include_once '../coneccion.php';

    $query = 'INSERT INTO productos (nombre, unidadDeMedida, precioDeVenta, costoDeProduccion, categoria, stock)
              VALUES(?, ?, ?, ?, ?, ?)';

    $stmt = mysqli_prepare($coneccion, $query);

    for($i = 0; $i <= 6; $i++) 
        $valorCampos[$i] = htmlspecialchars(strip_tags($valorCampos[$i]));

    mysqli_stmt_bind_param($stmt, 'sdddsd', $valorCampos);

    $stmtExitoso = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($coneccion);
    return $stmtExitoso;

}