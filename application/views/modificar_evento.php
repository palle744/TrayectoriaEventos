<!-- <style>
    .titulo{
      font-size: 3.5rem;
      text-shadow: 1.3px 2px 2px gray;
      margin-bottom: 1.5rem;
      color: green;
    }

    .espacio{
        margin-bottom: 0.5rem;

    }
    .centrar {
    justify-content: center;
    margin-left: auto;
    margin-right: auto;
    color: white;
    border-radius: 1.2rem ;
    background-color: #00009F;
    align-items: center;
    font-family: Proxima Nova, sans-serif;
    
  }

  #editTableEvento td {
    text-align: center;
    height: auto;
    vertical-align: middle;
  }


</style> -->

<style>
  .centrar {
    justify-content: center;
    margin-left: auto;
    margin-right: auto;
    color: white;
    background-color: #0066FF;
    align-items: center;
    font-family: Proxima Nova, sans-serif;
    border-radius: 0.4rem;
    margin-left: 1rem;
    opacity: .89;
    text-shadow: 2px 2px 2px black;

  }

  .titulo {
    font-size: 4rem;
    font-family: 'Baloo';
    /* color: #000F9F; */
    /* color: #FF8200; */
    color: #FF6A13;
    text-align: center;
    /* text-shadow: 1.3px 2px 2px black; */

  }

  .ancho {
    font-size: 1rem;

  }


  .table {
    font-family: Arial, sans-serif;
    font-size: 1rem;
    /* text-size-adjust:Auto ; */
    text-align: center;
    border-collapse: collapse;
    border: none;
    font-weight: bold;



  }

  /* 
  .table th,
  .table td {
    padding: 0.5rem;
    /* border: 2px double transparent; 
    height: 100%;
  
    
  
    
  } */

  .table th {
    background-color: #00009F;
    color: white;
    font-weight: bold;
    text-align: center;
    vertical-align: middle;
    height: auto;
    padding-right: 0.5rem !important;
    padding-left: 0.5rem !important;
    padding-top: 0.25rem !important;

  }

  .table td {
    background-color: #fff;
    color: #000;
    text-align: center;
    vertical-align: middle;


  }




  #editTableEvento th:nth-child(2n) .fas {
    margin-left: 0.5rem;
  }

  #editTableEvento th:nth-child(2n+1) .fas {
    margin-left: 0.5rem;
  }
</style>




<div class="container">

  <div class="row">
    <div class="col-sm-4"> </div>
    <div class="col-sm-4">
      <br>
      <br>


      <center>
        <h1 align=center class=" titulo "><b>Modificar Evento</b></h1>
        <h4 class=" espacio text-center text-muted    "> Por favor introduce el nombre del evento que deseas modificar</h4>
        <!-- <form id="form" method="GET" action="<?php echo base_url(); ?>index.php/formulario/modificar">
<input type="text" id="query" name="query" class="form-control espacio"/>
<input type="submit" id="buscar" value="Buscar" class="btn btn-primary">
</form> -->

      </center>




    </div>
    <!-- <div class="container d-flex justify-content-center"> -->
    <div class="table-responsive">
      <table id="editTableEvento" class="table display table-striped table-bordered ">
        <thead>
          <tr>
            <th class="col-xs-12 col-md-2 centrar  ancho">
              <div style="width:3rem;">ID<span class="fas fa-hashtag"></span></div>
            </th>
            <th class="col-xs-12 col-md-3 centrar sub ancho">
              <div style="width:5rem;">Nombre Evento<span class="fas fa-pencil-alt "></span></div>
            </th>
            <th class="col-xs-12 col-md-3 centrar sub ancho">
              <div style="width:5rem;"> Fecha Evento<span class="fas fa-calendar-alt"></span></div>
            </th>
            <th class="col-xs-10   col-md-2 centrar sub ancho">Organizador Evento<span class="fas fa-user-alt"></span></th>
            <th class="col-xs-10  col-md-2 centrar sub ancho">Descripción Evento<span class="fas fa-file"></span></th>
            <th class="col-xs-12 col-md-9 centrar ancho">
              <div style="width:7rem;">Número de Asistentes<span class="fas fa-users"></span></div>
            </th>
            <th class="col-xs-12 col-md-2 centrar ancho">
              <div style="width:6rem;">Fecha Captura<span class="fas fa-calendar-week"></span></div>
            </th>
            <th class="col-xs-12 col-md-5 centrar ancho">
              <div style="width:6rem;">Imagen Evento<span class="fas fa-image"></span></div>
            </th>
            <th class="col-xs-12 col-md-1 centrar ancho">
              <div style="width:5rem;">Editar <span class="fas fa-file-invoice"></span></div>
            </th>
            <th class="col-xs-12 col-md-1 centrar ancho ">
              <div style="width:6rem;" id="btnDelete">Eliminar<span class="fas fa-trash"></span></div>
            </th>
          </tr>
        </thead>
      </table>

      <!-- aqui configuramos el modal y de aqui se llama a la funcion -->


      <style>
        .modalcentrado {

          justify-content: center;
          align-items: center;
        }

        .texto {
          background-color: #ffffff;
          align-items: center;
          font-family: Proxima Nova, sans-serif;
          font-weight: bold;

        }
      </style>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content modalcentrado">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modificar Evento</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body modalcentrado">
              <!-- <label for="editarID" class="texto"> ID </label> -->
              <form id="formCambios">
                <input type="hidden" name="editarID" id="editarID" class="form-control">
                <br>
                <label for="editarNombre" class="texto"> Nombre Evento</label>
                <input type="texto" name="editarNombre" id="editarNombre" class="form-control">
                <br>
                <label for="editarFecha" class="texto"> Fecha Evento</label>
                <input type="date" name="editarFecha" id="editarFecha" class="form-control">
                <br>
                <label for="Descripcion"><b>Descripción:</b></label><br>
                <br>
                <textarea id="editDescr" name="editDescr" class="form-control" required="" style="height:200px;"></textarea>
                <br>
                <label for="editarOrga" class="texto">Organizador</label>
                <input type="texto" name="editarOrga" id="editarOrga" class="form-control">
                <br>
                <label for="editarAsis" class="texto"> Número de Asistentes</label>
                <input type="texto" name="editarAsis" id="editarAsis" class="form-control" pattern="[0-9]+">
                <label for="editarImg"><b>Imágen del Evento:</b></label><br>
                <input type="file" id="editarImg" name="editarImg" class="form-control-file">


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-success" id="GuardarCambios">Guardar cambios </button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
        $('#editarAsis').on('input', function() {
            var inputVal = $(this).val();
            var sanitizedVal = inputVal.replace(/[^0-9]/g, ''); // Elimina cualquier carácter que no sea un número
            $(this).val(sanitizedVal);
        });
    });
</script>



      <?php
      $this->load->view('modificar_evento_js');
      ?>


