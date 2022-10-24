<?php

function updateStock($productoID, $nuevoStock) {

    try {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
        $server = 'localhost';
        $user = 'root';
        $password = '';
        $db = 'sistema_carnitas';
    
        $coneccion = mysqli_connect($server, $user, $password, $db);
    
        mysqli_set_charset($coneccion, 'utf8mb4');
    
    } catch(Exception $e) {
        echo 'Ocurrio un error: ', $e->getMessage(), "\n";
    }
    $query = 'UPDATE productos SET stock = ? WHERE productoID = ?';

    $stmt = mysqli_prepare($coneccion, $query);

    $nuevoStock = htmlspecialchars(strip_tags($nuevoStock));

    mysqli_stmt_bind_param( $stmt, 'di', $nuevoStock, $productoID );

    $stmtExitoso = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($coneccion);
    return $stmtExitoso;
}

?>