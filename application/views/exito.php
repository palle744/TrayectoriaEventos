<!-- <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url();?>Imagenes/gto.ico">
<nav class="navbar navbar-light" style="background-color:#00009F ;">
  <a class="navbar-brand ml-auto mr-auto" href="#">
    <img src="<?php echo base_url();?>Imagenes/Logo_ventana.png" width="50" height="50" alt="">
  </a>
</nav>
  <meta charset="UTF-8">
  <title>Administrador</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

 <style>
    .imagen{
        padding-left: 2rem;
        text-align: left;
        
    }
    .titulo{
        font-size: 4rem;
        text-shadow: 1.3px 2px 2px gray;
        font-family: Proxima Nova, sans-serif;
        font-weight: bold;
        color: #FF8200;
        
        
        
    }

    

    </style>
</head>

<img  src="<?php echo base_url();?>Imagenes/Logo_ventana.png" width="200" height="200" alt="">

<h1 class="imagen titulo" aling=center>Tu registro a sido exitoso</h1>

<a class="btn btn-outline-primary btn-block btn-custom animacion-flotante"  data-toggle="tooltip" data-placement="top" title="Crear evento" href="<?php echo base_url(); ?>index.php/administrador_control/eventos">
<i class="fa-sharp fa-solid fa-window-flip"></i><b>Regresar a la pagina de EventosGTO</b></a> -->


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="<?php echo base_url();?>Imagenes/gto.ico">
  <nav class="navbar navbar-light" style="background-color:#00009F ;">
    <a class="navbar-brand ml-auto mr-auto" href="#">
      <img src="<?php echo base_url();?>Imagenes/Logo_ventana.png" width="50" height="50" alt="" >
    </a>
  </nav>
  <meta charset="UTF-8">
  <title>Administrador</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .imagen {
      padding-left: 2rem;
      text-align: left;
    }
    .titulo {
      font-size: 4rem;
      text-shadow: 1.3px 2px 2px gray;
      font-family: Proxima Nova, sans-serif;
      font-weight: bold;
      color: #FF8200;
    }
  </style>
<script>
    // Deshabilitar la recarga de página después de cargar registro_exitoso
    if (performance.navigation.type === 1) {
      window.addEventListener('DOMContentLoaded', function() {
        if (typeof history.pushState === 'function') {
          history.pushState({}, '', location.href);
          window.onpopstate = function() {
            history.go(1);
          };
        } else {
          window.location.hash = '!';
          window.onhashchange = function() {
            window.location.hash = '!';
          };
        }
      });
    }
  </script>


</head>

<body class="align-items-center">

  <img src="<?php echo base_url();?>Imagenes/Logo_ventana.png" width="200" height="200" alt="" class="align-center">
  <h1 class="imagen titulo text-center">Tu registro ha sido exitoso</h1>

  <div class="jumbotron text-center">
    <p class="display-4">Se ha enviado el código de acceso a tu correo electrónico</p>
  </div>

  <a class="btn btn-outline-primary btn-block btn-custom animacion-flotante" data-toggle="tooltip" data-placement="top" title="Crear evento" href="<?php echo base_url(); ?>index.php/administrador_control/eventos">
    <i class="fa-sharp fa-solid fa-window-flip"></i><b>Regresar a la página de EventosGTO</b>
  </a>

  <br>
  <br>
  <br>

</body>
</html>
