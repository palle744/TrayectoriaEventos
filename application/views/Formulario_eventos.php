<!-- 
<body aling='center'>
<nav class="navbar navbar-light" style="background-color:#00009F ;">
    <a class="navbar-brand ml-auto mr-auto" href="#">
    <img src="<?php echo base_url(); ?>Imagenes/Logo_ventana.png" width="50" height="50" alt="">
    </a>
</nav>
<div class="container">

<div class = "row">
    <div class = "col-sm-4"> </div>
    <div class = "col-sm-4"> 
    <br>
    <br>
    <style>
        .titulo {
    font-size: 3rem;
    margin-bottom: 1rem;
    color: #FF8200;
    font-weight: bold;
    text-align: center;
    text-shadow: 1.3px 2px 2px black;
    }
    </style>
    <script>
    var fecha = new Date();
    var dd = String(fecha.getDate()).padStart(2, '0');
    var mm = String(fecha.getMonth() + 1).padStart(2, '0'); //Enero es 0!
    var yyyy = fecha.getFullYear();

    fecha_actual = yyyy + '-' + mm + '-' + dd;
    document.getElementById("Fecha_Evento").setAttribute("min", fecha_actual);

    document.getElementById("Fecha_Evento").addEventListener("change", function() {
        var fecha_ingresada = new Date(document.getElementById("Fecha_Evento").value);
        var fecha_actual = new Date();

        if (fecha_ingresada < fecha_actual) {
            document.getElementById("Fecha_Evento").style.borderColor = "red";
        } else {
            document.getElementById("Fecha_Evento").style.borderColor = "";
        }
    });
</script> -->

<body align='center'>

    <div class="container">

        <div class="row">
            <div class="col-sm-4"> </div>
            <div class="col-sm-4">
                <br>
                <br>
                <style>
                    .titulo {
                        font-size: 4rem;
                        font-family: 'Baloo';
                        color: #FF8200;
                        text-align: center;
                    }





                    .fecha-roja {
                        border-color: red !important;
                    }
                </style>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var fecha = new Date();
                        var dd = String(fecha.getDate()).padStart(2, '0');
                        var mm = String(fecha.getMonth() + 1).padStart(2, '0'); //Enero es 0!
                        var yyyy = fecha.getFullYear();

                        fecha_actual = yyyy + '-' + mm + '-' + dd;
                        document.getElementById("Fecha_Evento").setAttribute("min", fecha_actual);

                        document.getElementById("Fecha_Evento").addEventListener("change", function() {
                            var fecha_ingresada = new Date(document.getElementById("Fecha_Evento").value);
                            var fecha_actual = new Date();

                            if (fecha_ingresada < fecha_actual) {
                                document.getElementById("Fecha_Evento").classList.add("fecha-roja");
                            } else {
                                document.getElementById("Fecha_Evento").classList.remove("fecha-roja");
                            }
                        });
                    });
                </script>



                <center>
                    <h1 class="titulo mb-5"><b>Formulario de Evento</b></h1>
                </center>

                <!-- <form action="<?php echo base_url() ?>index.php/formulario/crearevento" method="POST" enctype="multipart/form-data" id="tabEventos"> -->
                <!-- <form action="<?php echo base_url() ?>index.php/formulario/crearevento" method="POST" id="tabEventos"> -->

                <form method="POST" id="tabEventos" action="<?php echo base_url() ?>index.php/formulario/crearevento">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInfo"><b>i</b></button>
                    <label for="nombre"><b>Nombre del Evento:</b></label><br>
                    <br>

                    <input type="text" id="Nombre_Evento" name="Nombre_Evento" class="form-control" Required=""><br>

                    <!-- Modal -->
                    <div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="modalInfoLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalInfoLabel"><b>Indicaciones para nombre de evento</b></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="modal-body text-justify">
                                        Para formular el nombre del evento, es recomendable considerar los siguientes aspectos:

                                        Objetivo y finalidad del evento.
                                        Público objetivo al que se dirige el evento.
                                        Actividades principales que se llevarán a cabo durante el evento.
                                        Tema o concepto central que se quiere transmitir.
                                        Una vez que se tengan en cuenta estos aspectos, se pueden explorar diferentes opciones de nombres para el evento, buscando siempre que el nombre sea coherente y representativo de lo que se ofrecerá en el evento.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <label for="fecha"><b>Fecha del Evento:</b></label><br>
                    <input type="date" id="Fecha_Evento" name="Fecha_Evento" class="form-control" Required=""><br>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAsistentes"><b>i</b></button>
                    <!-- <label for="asistentes"><b>Número de Asistentes:</b></label><br>
    <br>
    
    <input type="number" id="Numero_Asistencia" name="#Numero_Asistencia" class="form-control" Required=""><br> -->

                    <!-- <form method="post" action="procesar_formulario.php"> -->
                    <form method="post">
                        <label for="Numero_Asistencia"><b>Número de Asistentes:</b></label><br>
                        <br>
                        <!-- <input type="number" id="Numero_Asistencia" name="Numero_Asistencia" class="form-control"  min="0" pattern="[0-9]+" required><br>
                        -->
                        <input type="text" id="Numero_Asistencia" name="Numero_Asistencia" class="form-control" pattern="[0-9]+" required><br>


                        <!-- Modal -->
                        <div class="modal fade" id="modalAsistentes" tabindex="-1" role="dialog" aria-labelledby="modalAsistentesLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="modalAsistentesLabel"><b>Indicaciones para el número de asistentes</b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-justify">
                                        <p>
                                            Es importante tener en cuenta el número de asistentes esperados para planificar y organizar el evento adecuadamente. Algunos aspectos a considerar son:

                                            - El espacio disponible para el evento.
                                            - El presupuesto disponible para el evento.
                                            - Las actividades y/o servicios que se ofrecerán en el evento.
                                            - La logística necesaria para el evento (transporte, alojamiento, etc.).
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalOrganizador"><b>i</b></button>
                        <label for="organizador"><b>Organizador:</b></label><br> <br>
                        <input type="text" id="Organizador_evento" name="Organizador_evento" class="form-control" Required=""><br>

                        <!-- Modal -->
                        <div class="modal fade" id="modalOrganizador" tabindex="-1" role="dialog" aria-labelledby="modalOrganizadorLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="modalOrganizadorLabel"><b>Indicaciones para el número de asistentes</b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-justify">
                                        <p>
                                            Indicar el organizador del evento ya sea una comunidad o red de JuventudEsGTO
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDescripcion"><b>i</b></button>
                        <label for="Descripcion"><b>Descripción:</b></label><br>
                        <br>
                        <textarea id="Descripcion_evento" name="Descripcion_evento" class="form-control" required="" style="height:200px;"></textarea><br>
                        <!-- Modal -->
                        <div class="modal fade" id="modalDescripcion" tabindex="-1" role="dialog" aria-labelledby="modalDescripcionLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="modalDescripcionLabel"><b>Indicaciones para el número de asistentes</b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-justify">
                                        <p>
                                            Es importante describir el propósito del evento. Es recomendable destacar los aspectos más relevantes del evento, como los invitados especiales, las actividades realizadas, los temas tratados, etc. Es importante utilizar un lenguaje claro y conciso, evitando tecnicismos innecesarios, para que la descripción sea fácil de entender
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalImagen"><b>i</b></button>
                        <label for="imagen"><b>Imagen del Evento:</b></label><br>
                        <br>
                        <input type="file" id="imagen" name="imagen" class="form-control-file">

                        <!-- Modal -->
                        <div class="modal fade" id="modalImagen" tabindex="-1" role="dialog" aria-labelledby="modalImagenLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="modalImagenLabel"><b>Indicaciones para el número de asistentes</b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-justify">
                                        <p>
                                            La imagen debera de ser de tipo horizontal(16:9).
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>
                        <center>
                            <!-- <button type="submit"  class="btn btn-primary" onclick="enviarFormulario()" action="<?php echo base_url() ?>index.php/formulario/admin">Enviar</button> -->
                            <button type="button" class="btn btn-primary" id="btnRegistroEvento">Enviar</button>
                        </center>
                        <div class='notifications top-sleft'></div>

                        <br>
                        <br>
                        <br>
                    </form>

            </div>
        </div>
    </div>

    </form>
</body>

<!-- <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></scrip> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {

        $(document).on('click', '#btnRegistroEvento', function() {
            var frmData = new FormData($('#tabEventos')[0]);

            $.ajax({
                url: '<?php echo base_url() ?>index.php/formulario/crearevento',
                type: 'POST',
                global: false,
                data: frmData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(resp) {
                    if (!resp.ok) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: resp.errors,
                            showConfirmButton: false,
                            timer: 2500
                        });
                        return false;
                    }

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Registro exitoso',
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        timer: 2500
                    }).then(function() {
                        location.reload();
                    });
                },
                error: function(err) {
                    console.log(err);
                }
            });

        });

    });

    // Suponiendo que tienes un formulario con el id "formulario" y un elemento para mostrar la notificación con el id "notificacion"

    $(document).ready(function() {
        $('#tabEventos').submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: 'crearevento',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.ok) {
                        // El evento se creó correctamente
                        // Mostrar notificación de éxito
                    } else {
                        // Error al crear el evento
                        // Mostrar notificación de error y permitir al usuario cerrarla
                        $('#notificacion').text(response.errors);
                        $('#notificacion').show();
                        $('#notificacion').click(function() {
                            $(this).hide();
                        });
                    }
                },
                error: function() {
                    // Error en la solicitud AJAX
                    // Mostrar notificación de error genérico
                }
            });
        });
    });


    function enviarFormulario() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'El evento ha sido registrado',
            showConfirmButton: false,
            timer: 2500
        }).then(function() {
            // Redirigir a otra vista
            // window.location.href = 'administrador';
        });
    }

    function registroEvento() {
        var frmData = new FormData($('#tabEventos')[0]);

        $(document).on('click', '#btnRegistroEvento', function() {

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>index.php/formulario/test',
                // dataType: 'json',
                data: frmData,
                success: function() {
                    console.log('SUCCESS');
                }
            });

        });
    }
</script>

<script>
    $(document).ready(function() {
        $('#Numero_Asistencia').on('input', function() {
            var inputVal = $(this).val();
            var sanitizedVal = inputVal.replace(/[^0-9]/g, ''); // Elimina cualquier carácter que no sea un número
            $(this).val(sanitizedVal);
        });
    });
</script>



</html>