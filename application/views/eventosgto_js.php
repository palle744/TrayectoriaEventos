<script>


    
    function ajustarAlturaDescripcion() {
        var descripciones = document.getElementsByClassName('card-description');
        for (var i = 0; i < descripciones.length; i++) {
            var descripcion = descripciones[i];
            if (descripcion.scrollHeight > descripcion.clientHeight) {
                descripcion.style.height = "8em"; /* Establece una altura fija de 4 renglones si el contenido excede */
            }
        }
    }

    $(document).ready(function() {

        $.ajax({
            // la URL para la petición
            url: '<?php echo base_url(); ?>index.php/formulario/cargar',

            // la información a enviar
            // (también es posible utilizar una cadena de datos)
            data: {

            },

            // especifica si será una petición POST o GET
            type: 'POST',

            // el tipo de información que se espera de respuesta
            dataType: 'json',

            // código a ejecutar si la petición es satisfactoria;
            // la respuesta es pasada como argumento a la función
            success: function(data) {
                if (data) {
                    //console.log(data.data[0].Imagen_evento);
                    if (data.total > 0) {
                        totalEventos = data.total;
                        var nombreEvento = "";
                        var contador = 0;
                        document.getElementById('tarjetas').innerHTML = "<div id='tanque' class='card-deck'>";
                        for (i = 0; i < totalEventos; i++) {
                            // Obtener la fecha actual
                            var fechaActual = new Date();
                            // Convertir la fecha del evento a un objeto de fecha
                            var fechaEvento = new Date(data.data[i].Fecha_Evento);

                            var fechaFormateada = fechaEvento.toLocaleDateString();

                            // Comparar las fechas
                            if (fechaEvento >= fechaActual && data.data[i].EstadoEvento === 1){
                                nombreEvento = "'" + data.data[i].Nombre_Evento + "'";
                                // console.log(data);
                                document.getElementById('tanque').innerHTML +=
                                    "<div class='col-12 col-sm-12 col-md-6 col-lg-4 d-flex justify-content-center'>" +
                                    "<div class='card-shadow m-3 bg-white rounded animated bounce-in shadow' style='width:23rem;'>" +
                                    "<img src = '<?= base_url() ?>" + data.data[i].Imagen_evento + "'class= 'card-img-top' alt='imagen'>" +
                                    "<div class='card-body text-center'>" +
                                    "<H5 class='card-title font-weight-bold'>" + data.data[i].Nombre_Evento + "</H5>" +
                                    // "<p class='card-text font-weight-bold'>Fecha: " + data.data[i].Fecha_Evento + "</p>" +
                                    "<p class='card-text font-weight-bold'>Fecha: " + fechaFormateada + "</p>" +
                                    "<p class='card-text font-weight'> Organizador: " + data.data[i].Organizador_evento + "</p>" +
                                    "<p class='card-text font-weight'> Cupo: " + data.data[i].Numero_Asistencia + "</p>" +
                                    // "<p class='card-text font-weight'> Descripción  : " + data.data[i].Descripcion_Evento + "</p>" +
                                    // "<p class='card-text font-weight'> Descripción  : <span class='card-description'>" + data.data[i].Descripcion_Evento + "</span></p>" +
                                    "<button class='btn btn-info card-description-toggle mr-2 ' data-toggle='collapse' data-target='#descripcion-" + i + "'>Descripción</button>" +
                                    "<div id='descripcion-" + i + "' class='collapse card-description mt-3 mb-3'>" + data.data[i].Descripcion_Evento + "</div>" +


                                    '<Button class="btn btn-primary"  Onclick="abrirModal(' + nombreEvento + ');" > Registrarse </Button>' +
                                    "</div>" +
                                    "</div>" +
                                    "</div>";
                                contador++;
                            }

                        }

                        document.getElementById('tarjetas').innerHTML += "</div>";
                    }

                }
            },

            // código a ejecutar si la petición falla;
            // son pasados como argumentos a la función
            // el objeto jqXHR (extensión de XMLHttpRequest), un texto con el estatus
            // de la petición y un texto con la descripción del error que haya dado el servidor
            error: function(data) {
                alert('Disculpe, existió un problema');
            }
        });



        $(document).on('click', '#validarCurpBtn', function() {
            var curp = $('#CURP_Asistente').val();

            // Realizar la petición a la API para validar la CURP
            var apiUrl = 'http://187.191.30.131:4401/wsCurp/api/v1/curp/searchCurp/' + curp;
            var token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpbml0RGF0ZSI6IjIwMjMtMDUtMTggMTE6NTI6MTEiLCJleHBEYXRlIjoiMjAyNC0wNS0xOCAxMTo1MjoxMSIsImlhdCI6MTY4NDQzNTkzMSwiZXhwIjoxNzE1OTcxOTMxfQ.hVO-vuctRXPISJEgI_ulVjlIjowCA72t5vnfBXdkfZ4';

            fetch(apiUrl, {
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                })
                .then(response => response.json())
                .then(data => {
                    var correoInput = document.getElementById('Correo_Electronico_Asistente');
                    if (data.ok) {
                        // La CURP existe, habilitar el campo de correo electrónico
                        correoInput.disabled = false;
                        $('#btnRegistrarme').prop('disabled', false);
                        $('#CURP_Asistente').prop('disabled', true);
                        registroEvento(data.data);
                        console.log(data);
                    }
                    //cuando el curp no existe
                    else {
                        correoInput.disabled = true;
                        $('#btnRegistrarme').prop('disabled', true);
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'CURP ERRONEO',
                            text: 'Favor de verificarlo',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        return;
                        console.log('NO EXISTE');


                    }
                })
                //si la solicitud no funcionó
                .catch(error => {
                    console.log('Error al validar la CURP:', error);
                });


        });


    });



    function registroEvento(arrData) {
        let nombreEvento = $('#Nombre_Evento').val();
        let curpAsistente = $('#CURP_Asistente').val();

        arrInsert = {
            'Nombre_Asistente': arrData.name,
            'Primer_Apellido_Asistente': arrData.lastname,
            'Segundo_Apellido_Asistente': arrData.surname,
            'Nombre_Evento': nombreEvento,
            'CURP_Asistente': curpAsistente
        };


    }
    $(document).on('click', '#btnRegistrarme', function() {
        let correoAsistente = $('#Correo_Electronico_Asistente').val();

        // Validar el campo del correo electrónico
        if (!validarCorreoElectronico(correoAsistente)) {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Correo electrónico inválido',
                showConfirmButton: false,
                timer: 2000
            });
            return;
        }

        arrInsert['Correo_Electronico_Asistente'] = correoAsistente;

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>index.php/registro_control/registro',
            // dataType: 'json',
            data: arrInsert,
            success: function(resp) {
              
                data=JSON.parse(resp)
                console.log(data)
                if (!data.ok) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: data.mensaje,
                        showConfirmButton: false,
                        timer: 2000
                    });
                } else {
                    $('#close-modal').trigger('click');
                    $('#CURP_Asistente').val('');
                    $('#Correo_Electronico_Asistente').val('');
                    $('#Nombre_Evento').val('');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Registro generado',
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        timer: 2500
                    }).then(function() {
                        // Redirigir a otra vista
                        // location.reload();
                    });
                }
            }
        });
    });


    function abrirModal(Nombre_Evento) {

        $('#Nombre_Evento').val(Nombre_Evento);
        $('#CURP_Asistente').attr('disabled', false);
        $('#Correo_Electronico_Asistente').attr('disabled', true);
        $('#btnRegistrarme').attr('disabled', true);
        $('#modalAsistencia').modal();


    }


    function validarCorreoElectronico(correo) {
        // Expresión regular para validar el formato del correo electrónico
        let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(correo);
    }
</script>

<script>
    $(document).on('click', '.card-description-toggle', function() {
        $(this).next('.card-description').slideToggle();
    });
</script>





<style>
    .boton {
        text-shadow: 2.2px 2px 2px black;
        border: none;
        border-bottom-right-radius: 1.7rem 1.7rem;
        padding-right: 2rem;
    }
</style>

<style>
    .boton2 {
        padding-left: 0.3rem;
    }
</style>

<style>
    .modaldesing {
        background-color: #4EA7BD;
        color: white;
        padding: 10px;
        font-size: 4rem;
        align-items: center;

    }


    .glass-table {
        background-color: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(10px);
        /* Agrega un desenfoque al fondo para lograr el efecto de cristal */
    }
</style>

<style>
    .card-borde {
        border-radius: 10px;
        /* Ajusta el valor para redondear más o menos las esquinas */
    }
</style>

<style>
    .card-description {
        max-height: 10em; /* Altura máxima de 4 renglones (cada renglón es de aproximadamente 2em de altura) */
        overflow-y: auto; /* Habilita el scroll vertical si el contenido excede la altura máxima */
        display: none; /* Oculta la descripción por defecto */
    }
</style>