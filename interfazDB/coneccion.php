<?php

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

?>