<style>
  .titulo {
    font-family: 'baloo';
    color: #FF6A13;
    font-size: 30px;

  }
</style>


<div class="container">

  <div class="row">
    <div class="col-sm-4"> </div>
    <div class="col-sm-4">
      <br>
      <br>

      <img src="<?php echo base_url(); ?>Imagenes/Logo_inicio.png">
     
      <center>
        <H1 class="titulo mt-4"><b> Bienvenido al Sistema de EventosGTO<b></H1>
      </center>
      <!-- 
          
        <form method="POST" action="<?php echo base_url(); ?>index.php/login/buscarusuario">
          <label for="usuario"><b>Usuario</b> </label>
          <input type="text" name="Nombre_Usuario" id="Nombre_Usuario" class="form-control" Required="">
          <br>
          <label for="password"><b>Contraseña</b></label>
          <input type="password" name="Pass_Usuario" id="Pass_Usuario" class="form-control" Required="">
          <br>
          <div class="row d-flex justify-content-center" ><button class="btn btn-lg btn-block btn-pill btn-primary ">Iniciar</button></div>
          
          <br>
          <br>
          <br>
          <br>
        </form> -->


      <form id="loginForm">
        <label for="usuario"><b>Usuario</b></label>
        <input type="text" name="Nombre_Usuario" id="Nombre_Usuario" class="form-control" Required="">
        <br>
        <label for="password"><b>Contraseña</b></label>
        <input type="password" name="Pass_Usuario" id="Pass_Usuario" class="form-control" Required="">
        <br>
        <div class="row d-flex justify-content-center">
          <button type="button" id="submitBtn" class="btn btn-lg btn-block btn-pill btn-primary">Iniciar</button>
        </div>
        <br>
        <br>
        <br>
        <br>
      </form>

      <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
      <script>
        $(document).ready(function() {
          $('#submitBtn').click(function() {
            var usuario = $('#Nombre_Usuario').val();
            var contraseña = $('#Pass_Usuario').val();

            $.ajax({
              type: 'POST',
              url: '<?php echo base_url(); ?>index.php/login/buscarusuario',
              data: {
                'Nombre_Usuario': usuario,
                'Pass_Usuario': contraseña
              },
              success: function(response) {
                datos = JSON.parse(response);
                if (datos.total == 1) {
                  window.location.href = "<?= base_url() ?>index.php/inicio_control"
                } else {
                  swal.fire(
                    'Error',
                    'El usuario y/o contraseña son incorrectas',
                    'error'
                  )

                }
                console.log(response);
              },
              error: function(xhr, status, error) {
                // Manejo de errores de la solicitud AJAX

              }
            });
          });
        });
      </script>

    </div>
    <div class="col-sm-4"> </div>
  </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->