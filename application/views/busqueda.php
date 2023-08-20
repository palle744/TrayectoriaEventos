<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>Imagenes/gto.ico">
 
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .imagen {
            padding-left: 2rem;
            text-align: left;

        }

        .titulo {
            font-size: 4rem;
            font-family: 'Baloo';
            color: #FF6A13;
            text-align: center;


        }
    </style>
</head>

<!-- <img src="<?php echo base_url(); ?>Imagenes/Logo_ventana.png" width="200" height="200" alt=""> -->

<h1 class=" titulo">Registros</h1>

<br>

<body>



    <style>
        .centrar {
            justify-content: center;
            margin-left: auto;
            margin-right: auto;
            color: white;
            background-color: #00009F;
            align-items: center;
            font-family: Proxima Nova, sans-serif;
            border-radius: 0.4rem;
            margin-left: 1rem;
            opacity: .89;
            text-shadow: 2px 2px 2px black;
            text-align: center;

        }

        table th {
            background-color: #00009F !important;
            color: white;
            border-radius: 0.4rem;
            margin-left: 1rem;
        }



        .table {
            background-color: #fff;
        }
    </style>

    </styl>


    <div class="container">
        <table id="busquedaTable" class="table table-striped table-hover text-center table-responsive">
            <thead>
                <tr>

                    <th class="text-center">ID</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Apellido paterno</th>
                    <th class="text-center">Apellido materno</th>
                    <th class="text-center">Nombre evento</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">CURP</th>
                    <th class="text-center">Fecha captura</th>
                    <th class="text-center">Código acceso</th>
                </tr>
            </thead>
        </table>
    </div>

</body>
<script>




</script>

<?php $this->load->view('busqueda_js'); ?>