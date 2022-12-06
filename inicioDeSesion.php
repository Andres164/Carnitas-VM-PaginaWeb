<?php
  session_start();
  $mensaje = '';
  if(isset( $_POST['userName'] ) && isset( $_POST['password'] )) {
    require 'interfazDB/usuarios/read.php';
    $usuario = read();
    $usuario = mysqli_fetch_array($usuario);
    if ( $usuario && $usuario['password'] == $_POST['password']) {
      $_SESSION['usuario'] = $usuario;
      header('location: index.php');
    }
    else
      $mensaje = 'Usuario y/o Contraseña incorrectos';
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link href="signin.css" rel="stylesheet" type="text/css">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Inicio_Seccion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form method="POST">
    <img class="mb-4" src="https://scontent.fcul3-1.fna.fbcdn.net/v/t39.30808-6/300958725_610224130807251_3694889719390153722_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeETv5U6NVY40zzyL2aKQUYB4_8CRX7T0Arj_wJFftPQCu7iOqf8p78X76UeEZcOOEXM2RlUYKOsS8WWCPFeppY_&_nc_ohc=lPMRUgO7ogkAX-BbS8u&_nc_ht=scontent.fcul3-1.fna&oh=00_AT9LMy8EG_W6LWB_WvYgaArserBKwXzMnDeI-q5fOvTHvA&oe=635DF3B6" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Inicio De Sesion</h1>

    <div class="form-floating">
      <input name="userName" type="text" class="form-control" id="floatingInput" placeholder="Usuario">
      <label for="floatingInput">Usuario</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Contraseña</label>
    </div>
    <?php echo '<h2>' . $mensaje . '</h2>' ?>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar Sesion</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2022–2023</p>
  </form>
</main>


    
  </body>
</html>


