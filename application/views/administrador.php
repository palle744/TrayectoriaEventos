<style>
  h4 {
    font-family: Proxima Nova, sans-serif;
  }

  .btn-custom {
    width: 45%;
    padding: 2rem 0 2rem 0;
    border: 2px solid blue;
    /* border-radius:  1px; */
    border-top-left-radius: 1.7rem 1.7rem;
    border-bottom-right-radius: 1.7rem 1.7rem;
    /* background-color: violet; */
    font-size: 3rem;
    margin-bottom: 2rem;
    margin-left: auto;
    margin-right: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    color: #FF8200;
    text-shadow: 1.3px 2px 2px black;
    box-shadow: 0px 0px 5px blue;
    font-family: Proxima Nova, sans-serif;

  }

  .btn-custom2 {
    width: 45%;
    padding: 2rem 0 2rem 0;
    border: 3px solid red;
    /* border-radius:  1px; */
    border-top-left-radius: 1.7rem 1.7rem;
    border-bottom-right-radius: 1.7rem 1.7rem;
    font-size: 2rem;
    margin-bottom: 2rem;
    margin-left: auto;
    margin-right: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    color: red;
    text-shadow: 1.3px 2px 2px black;
    box-shadow: 0px 0px 5px red;

  }


  /* .btn-custom > a {
      text-align:center;
    } */

  btn-custom b {
    text-align: center;
    /* a propiedad para centrar horizontalmente el contenido */
    font-family: 'Baloo 2';

  }

  .relleno{
    font-family: 'Baloo';
    color:#FF6A13;
    text-align: center; 
}

  .titulo {
    
    /* text-shadow: 1.3px 2px 2px gray; */
    font-size: 60px;
    font-family: 'Baloo';
    color: #FF6A13;

  }

  .subtitulo {
    font-size: 1.8rem;
    font-family: 'Baloo';
    color: #000F9F;
  }

  .rol {
    font-size: 1.8rem;
    font-family: 'Baloo';
    color: #6B3EC6 ;
  }

  .animacion-flotante {
    animation-name: flotar;
    animation-duration: 3s;
    animation-iteration-count: infinite;
    animation-direction: alternate;
  }

  @keyframes flotar {
    from {
      transform: translate(0, 0);
    }

    to {
      transform: translate(1px, 2px);
    }
  }

  .animacion-flotante2 {
    animation-name: flotar;
    animation-duration: 3s;
    animation-iteration-count: infinite;
    animation-direction: alternate-reverse;
  }

  .botones {
    font-family: 'Baloo 2', cursive;
  }

  @keyframes flotar {
    from {
      transform: translate(0, 0);
    }

    to {
      transform: translate(10px, 2px);
    }
  }

  @media (max-width: 576px) {
    .titulo-responsivo {
      font-size: 2rem;
      /* Tamaño de fuente para dispositivos móviles pequeños */
    }
  }

  @media (min-width: 577px) and (max-width: 768px) {
    .titulo-responsivo {
      font-size: 3rem;
      /* Tamaño de fuente para dispositivos móviles medianos */
    }
  }

  
</style>

<body>
  <!-- <div class="container">
  <div class="jumbotron jumbotron-fluid"> -->

  <div class="container">

    <!-- <h1 align=center class="display-3 titulo "><b>ADMINISTRADOR</b></h1> -->
    <!-- <h1 align=center class="display-3 titulo "><b>ADMINISTRADOR</b></h1>
   -->
    <div class="container">
      <div class="row justify-content-center">
          <h1 class="titulo text-break text-wrap"><b>Sistema de EventosGTO</b></h1>
      </div>
    </div>
    <p align=center class="lead  subtitulo">Eventos que impactan</p>

    <h2 align=center  class="rol">
    <img src="<?php echo base_url(); ?>iconos/perfil-del-usuario.png" width="35" height="35" alt="Icono" />
      <?php echo strtoupper($this->session->userdata('Rol_Usuario')); ?></h2>



  </div>
  </div>
  <div class="d-flex justify-content-center">
    <div class="container">

      <div class="row">
      <?php if (!in_array($this->session->userdata('Rol_Usuario'), array('staff', 'analista'))) : ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card-shadow m-3 bg-white rounded animated bounce-in shadow" style="width: 18rem;">
            <div class="d-flex justify-content-center">
              <img class="card-img-top text-center p-5" src="<?= base_url() ?>iconos/nota.png" alt="Card image cap">
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-center">
                <a href="<?php echo base_url(); ?>index.php/administrador_control/formulario" class="btn btn-primary center">Registrar evento</a>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>


        <?php if (!in_array($this->session->userdata('Rol_Usuario'), array('staff','analista'))) : ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card-shadow m-3 bg-white rounded animated bounce-in shadow" style="width: 18rem;">
            <div class="d-flex justify-content-center">
              <img class="card-img-top text-center p-5" src="<?= base_url() ?>iconos/modificar.png" alt="Card image cap">
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-center">
                <a href="<?php echo base_url(); ?>index.php/administrador_control/modificar" class="btn btn-primary center">Modificar evento</a>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <?php if (!in_array($this->session->userdata('Rol_Usuario'), array('staff',))) : ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card-shadow m-3 bg-white rounded animated bounce-in shadow" style="width: 18rem;">
            <div class="d-flex justify-content-center">
              <img class="card-img-top text-center p-5" src="<?= base_url() ?>iconos/eventos.png" alt="Card image cap">
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-center">
                <a href="<?php echo base_url(); ?>index.php/administrador_control/eventos" class="btn btn-primary center">Página de eventos</a>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <?php if (!in_array($this->session->userdata('Rol_Usuario'), array('staff',))) : ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card-shadow m-3 bg-white rounded animated bounce-in shadow" style="width: 18rem;">
            <div class="d-flex justify-content-center">
              <img class="card-img-top text-center p-5" src="<?= base_url() ?>iconos/estadisticas.png" alt="Card image cap">
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-center">
                <a href="<?php echo base_url(); ?>index.php/administrador_control/estadisticas" class="btn btn-primary center">Estadísticas</a>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <?php if (!in_array($this->session->userdata('Rol_Usuario'), array('staff','editor'))) : ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card-shadow m-3 bg-white rounded animated bounce-in shadow" style="width: 18rem;">
            <div class="d-flex justify-content-center">
              <img class="card-img-top text-center p-5 " src="<?= base_url() ?>iconos/busqueda.png" alt="Card image cap">
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-center">
                <a href="<?php echo base_url(); ?>index.php/administrador_control/busqueda" class="btn btn-primary center">Registros</a>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <?php if (!in_array($this->session->userdata('Rol_Usuario'), array('staff','editor'))) : ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card-shadow m-3 bg-white rounded animated bounce-in shadow" style="width: 18rem;">
            <div class="d-flex justify-content-center">
              <img class="card-img-top text-center p-5 " src="<?= base_url() ?>iconos/asistencia.png" alt="Card image cap">
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-center">
                <a href="<?php echo base_url(); ?>index.php/administrador_control/Asistencias" class="btn btn-primary center">Asistencias</a>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>


        <?php if (!in_array($this->session->userdata('Rol_Usuario'), array('admin','editor', 'analista'))) : ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card-shadow m-3 bg-white rounded animated bounce-in shadow" style="width: 18rem;">
            <div class="d-flex justify-content-center">
              <img class="card-img-top text-center p-5 " src="<?= base_url() ?>iconos/codigo-qr.png" alt="Card image cap">
            </div>
            <div class="card-body">
            <p class="card-text relleno">Ya puedes iniciar a escanear. Abre la cámara de tu dispositivo o la aplicación de escaneo de códigos QR de tu preferencia.</p>
              <div class="d-flex justify-content-center">
                
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card-shadow m-3 bg-white rounded animated bounce-in shadow" style="width: 18rem;">
            <div class="d-flex justify-content-center">
              <img class="card-img-top text-center p-5 " src="<?= base_url() ?>iconos/salir.png" alt="Card image cap">
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-center">
                <a href="<?php echo base_url(); ?>index.php/login/cerrarsesion" class="btn btn-primary center">Salir</a>
              </div>
            </div>
          </div>
        </div>




      </div>


    </div>




  </div>
  </div>

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>