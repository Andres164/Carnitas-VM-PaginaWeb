<?php

function create($valorCampos) {
    $base_dir = realpath(dirname(__FILE__) . '/..');
    require_once  $base_dir . '/coneccion.php';
    $coneccion = coneccion();
    
    $query = 'INSERT INTO insumos (nombre, unidadDeMedida, categoria, stock)
              VALUES(?, ?, ?, ?)';

    $stmt = mysqli_prepare($coneccion, $query);

    for($i = 0; $i < 4; $i++) 
        $valorCampos[$i] = htmlspecialchars(strip_tags($valorCampos[$i]));
    
    mysqli_stmt_bind_param($stmt, 'sssd', $valorCampos[0], $valorCampos[1], $valorCampos[2], $valorCampos[3]);
    
    $stmtExitoso = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($coneccion);
    return $stmtExitoso;
}

?>