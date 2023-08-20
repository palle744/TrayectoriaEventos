<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>Imagenes/gto.ico">

  <meta charset="UTF-8">
  <title>Administrador</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<style>
  .jumbotron {
    background-color: green;
    color: white;
    font-weight: bold;
  }

  .align-center {
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
</style>


<body class="align-items-center">

  <img src="<?php echo base_url(); ?>Imagenes/Logo_ventana.png" width="200" height="200" alt="" class="align-center">
  <!-- <h1 class="imagen titulo text-center">Tu registro ha sido exitoso</h1> -->



  <div class="jumbotron text-center">
    <p class="display-4">Acceso registrado</p>

    <!-- <button id="btnok" class="btn btn-warning "> OK  </button> -->
  </div>

  <!-- <a class="btn btn-outline-primary btn-block btn-custom animacion-flotante" data-toggle="tooltip" data-placement="top" title="Crear evento" href="<?php echo base_url(); ?>index.php/administrador_control/eventos">
    <i class="fa-sharp fa-solid fa-window-flip"></i><b>Regresar a la página de EventosGTO</b>
  </a> -->

  <br>
  <br>
  <br>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
    function cerrarVentana() {
      window.close();
    }

    setTimeout(cerrarVentana, 1000);
  </script>



</body>

</html>