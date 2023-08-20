

<!DOCTYPE html>
<html lang="es">

<head>


    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .imagen {
            padding-left: 2rem;
            text-align: left;

        }

        .titulo {
            font-size: 4rem;
            font-family: 'Baloo';
            color: #FF8200;
            text-align: center;
        }

        h1 {
            font-family: 'Baloo 2', cursive;
        }

        .table {
            background-color: #FFFFFF;
            /* Fondo blanco */
            border-radius: 10px;
            /* Esquinas redondeadas */
        }

        .table tbody tr {
            margin-bottom: 20rem;
        }
    </style>
</head>

<!-- <img  src="<?php echo base_url(); ?>Imagenes/Logo_ventana.png" width="200" height="200" alt=""> -->

<h1 class="imagen titulo">Bienvenido a EventosGTO</h1>


<br>

<div class="container">
<!-- <input type="text" id="searchInput" placeholder="Buscar evento por nombre"> -->

    <div id="tarjetas">
        






    </div>
    <!-- <table id="publicTable" class="table display table-striped table-bordered">
        <thead>
            <tr>
                <th class="col-xs-12 col-md-3 centrar ancho "><div style="width:6rem;"><span></span></div></th>
                <th class="col-xs-12 col-md-5 centrar ancho" ><div style="width:6rem;"><span></span></div></th>
            </tr>
        </thead>
    </table> -->
</div>
<div class="modal fade" id="modalAsistencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de asistencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="curp">CURP:</label>
                    <input type="text" class="form-control" id="CURP_Asistente" name="CURP_Asistente">
                </div>
                <div class="form-group">
                    <div><a href="https://www.gob.mx/curp/" target="_blank"><b>-Haz clic aquí si no conoces tu CURP</b></a></div>
                    <label for="correo">Correo electrónico:</label>
                    <input type="email" class="form-control" id="Correo_Electronico_Asistente" name="Correo_Electronico_Asistente" disabled>
                </div>
                <input type="hidden" name="Nombre_Evento" id="Nombre_Evento">
                <button type="button" class="btn btn-primary" id="validarCurpBtn">Validar</button>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-between align-items-center">'
                    <button type="button" class="btn btn-secondary mr-4" id="close-modal" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" form="formAsistencia" id="btnRegistrarme" disabled>Registrarme</button>
                </div>
            </div>
        </div>
    </div>
</div>;

<?php $this->load->view('eventosgto_js'); ?>

<script src="https://cdn.jsdelivr.net/npm/bubbly-bg@1.0.0/dist/bubbly-bg.js"></script>