<link href="https://cdn.datatables.net/v/bs4/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.1/datatables.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/date-1.4.1/datatables.min.js"></script>
<script>
    var TablaEventos;
    $(document).ready(function() {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>index.php/formulario/cargar',
            dataType: 'json'
        }).done(function(resp) {
            console.log(resp);
        })

        TablaEventos = $("#editTableEvento").DataTable({
            retrieve: true,
            // responsive: true,
            paging: true,
            info: true,
            filter: true,
            stateSave: true,
            //stateSave: true,
            // 'ajax': {
            // 'url':  '<?php echo base_url(); ?>formulario/cargar',
            // 'dataSrc': 'data'
            // }
            ajax: '<?php echo base_url(); ?>index.php/formulario/cargar',
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ Registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
            buttons: {
                dom: {
                    button: {
                        tag: 'button',
                        className: '',
                    }
                },
                buttons: [{
                    extend: 'excel',
                    // title: 'Registros a EventosGTO',
                    title: function() {
                        var searchValue = $('#busquedaTable_filter input').val();
                        var currentDate = new Date().toLocaleDateString();
                        return 'Registros a EventosGTO - Búsqueda: ' + searchValue + ' - Generado el ' + currentDate;
                    },
                    className: 'btn btn-success',
                    text: 'excel',
                    charset: 'utf-8',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                    },
                    customize: function(xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row:first c', sheet).attr('s', '42');
                    }

                }, {
                    extend: 'pdf',
                    // title: 'Registros a EventosGTO',
                    title: function() {
                        var searchValue = $('#busquedaTable_filter input').val();
                        return 'Registros a EventosGTO - Búsqueda: ' + searchValue;
                    },
                    className: 'btn btn-danger',
                    text: 'PDF',
                    charset: 'utf-8',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 8]
                    },
                    customize: function(doc) {
                        // Agregar fecha en la parte superior
                        var now = new Date();
                        var dateString = 'Fecha de generación: ' + now.toLocaleString();
                        doc.content.splice(1, 0, {
                            text: dateString,
                            style: 'subheader',
                            alignment: 'right'
                        });

                        // Estilo adicional
                        doc.defaultStyle.fontSize = 10;

                        doc.pageMargins = [40, 0, 40, 30];

                        doc.content.splice(0, 0, {
                            margin: [0, 0, 0, 0],
                            alignment: 'center',
                            image: 'data:image/png;base64,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'
                        });
                    },
                    createdRow: function(row, data, dataIndex) {
                        $(row).find('td').css('font-size', '8px');
                    }
                }],
            },
            createdRow: function(row, data, dataIndex) {
                if (data.EstadoEvento === 0) {
                    $(row).addClass('estado-inactivo');
                }
            },
            columns: [{
                    data: 'EventoLista_Id'
                },
                {
                    data: 'Nombre_Evento'
                },
                {
                    data: 'Fecha_Evento'
                },
                {
                    data: 'Organizador_evento'
                },
                {
                    data: "Descripcion_Evento",
                    render: function(data, type, row) {
                        return '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDescripcionEvento' + row.EventoLista_Id + '">Ver descripción</button>\
                        <div class="modal fade" id="modalDescripcionEvento' + row.EventoLista_Id + '" tabindex="-1" role="dialog" aria-labelledby="modalDescripcionEvento' + row.EventoLista_Id + 'Label" aria-hidden="true">\
                            <div class="modal-dialog" role="document">\
                                <div class="modal-content">\
                                    <div class="modal-header modaldesing">\
                                        <h5 class="modal-title " id="modalDescripcionEvento' + row.EventoLista_Id + 'Label">Descripción del evento ' + row.Nombre_Evento + '</h5>\
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">\
                                            <span aria-hidden="true">&times;</span>\
                                        </button>\
                                    </div>\
                                    <div class="modal-body" text-justify>\
                                        ' + data + '\
                                    </div>\
                                </div>\
                            </div>\
                        </div>';
                    }

                },
                {
                    data: 'Numero_Asistencia'
                },
                {
                    data: 'Fecha_Captura'
                },
                {
                    data: "Imagen_evento",
                    "render": function(data, type, row) {
                        return '<img src="<?php echo base_url(); ?>' + data + '" width="120" height="70"/>';
                    }
                }

            ],
            "aoColumnDefs": [{
                    "aTargets": [8],
                    "mRender": function(data, type, row) {
                        // console.log(data);
                        var fechaEvento = new Date(row.Fecha_Evento);
                        var fechaActual = new Date();
                        var disabled = (fechaActual > fechaEvento || row.EstadoEvento === 0) ? 'disabled' : '';
                        return '<button data-toggle="modal" data-target="#editModal" class="btn btn-success btnEdit boton" value="' + row.EventoLista_Id + '" data-toggle="modal" data-target="#modalEditar' + row.EventoLista_Id + '" ' + disabled + '>Editar <span class="fas fa-file-invoice boton2"></span></button>';
                    }
                },
                {
                    "aTargets": [9],
                    "mRender": function(data, type, row) {
                        var fechaEvento = new Date(row.Fecha_Evento);
                        var fechaActual = new Date();
                        var disabled = (fechaActual > fechaEvento || row.EstadoEvento === 0) ? 'disabled' : '';
                        return '<button  class="btn btn-danger btnDelete boton" id="btnDelete-' + row.EventoLista_Id + '" value="' + row.EventoLista_Id + '" ' + disabled + '>Eliminar<span class="fas fa-trash boton2"></button>';


                    }
                },
                ///-----------



            ]
            //'dataSrc': 'data'

        });





        $(document).on('click', '.btnEdit', function() {
            id = $(this).val();
            console.log(id);
            $.ajax({
                // la URL para la petición
                url: '<?php echo base_url(); ?>index.php/formulario/editar',

                // la información a enviar
                // (también es posible utilizar una cadena de datos)
                data: {
                    id: id,
                },

                // especifica si será una petición POST o GET
                type: 'POST',

                // el tipo de información que se espera de respuesta
                dataType: 'json',

                // código a ejecutar si la petición es satisfactoria;
                // la respuesta es pasada como argumento a la función
                success: function(data) {
                    $('#editarNombre').val(data.Nombre_Evento);
                    $('#editarFecha').val(data.Fecha_Evento.split(" ", 1));
                    $('#editarOrga').val(data.Organizador_evento);
                    $('#editarAsis').val(data.Numero_Asistencia);
                    $('#editarID').val(id);
                    $('#editDescr').val(data.Descripcion_Evento);
                    $("#exampleModal").modal('show');


                },

                // código a ejecutar si la petición falla;
                // son pasados como argumentos a la función
                // el objeto jqXHR (extensión de XMLHttpRequest), un texto con el estatus
                // de la petición y un texto con la descripción del error que haya dado el servidor
                error: function(jqXHR, status, error) {
                    alert('Disculpe, existió un problema');
                },

                // código a ejecutar sin importar si la petición falló o no
            });

            // $('#editarNombre').val($(this).val());
        });

        $('#GuardarCambios').on("click", function() {
            var fechaModificacion = new Date(); // Obtén la fecha actual
            var fechaIngresada = new Date($('#editarFecha').val()); // Obtén la fecha ingresada en el campo de fecha

            if (fechaIngresada <= fechaModificacion) {
                // La fecha ingresada es anterior o igual a la fecha de modificación
                Swal.fire({
                    title: 'Error',
                    text: 'La fecha debe ser posterior a la fecha de actual',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000
                });

                return; // Detén la ejecución del código
            }
            var formData = new FormData($("#formCambios")[0]);
            formData.append('fechaModificacion', fechaModificacion);
            $.ajax({
                // la URL para la petición
                url: '<?php echo base_url(); ?>index.php/formulario/actualizar',
                cache: false,
                contentType: false,
                processData: false,


                // la información a enviar
                // (también es posible utilizar una cadena de datos)
                data: formData,

                // especifica si será una petición POST o GET
                type: 'POST',

                // el tipo de información que se espera de respuesta

                // código a ejecutar si la petición es satisfactoria;
                // la respuesta es pasada como argumento a la función
                success: function(data) {
                    if (data) {
                        // alert("El evento se a actualizado exitosamente");
                        // $("#exampleModal").modal('hide');

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'El evento ha sido actualizado',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        TablaEventos.ajax.reload();


                    } else {
                        alert("No se actualizo el evento ");


                    }

                },

                // código a ejecutar si la petición falla;
                // son pasados como argumentos a la función
                // el objeto jqXHR (extensión de XMLHttpRequest), un texto con el estatus
                // de la petición y un texto con la descripción del error que haya dado el servidor
                error: function(jqXHR, status, error) {
                    alert('Disculpe, existió un problema');
                },

                // código a ejecutar sin importar si la petición falló o no
            });

        })

        //     $(document).on('click', '.btnEdit', function(){
        //     //obtener el ID del evento
        //     var eventoId = $(this).val();



        //solicitud AJAX para obtener los detalles del evento
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>index.php/formulario/obtener',
            dataType: 'json',
            data: {
                eventoId: $(this).val()
            }
        }).done(function(resp) {
            //llenar el formulario con los detalles del evento
            $('#eventoId').val(resp.EventoLista_Id);
            $('#editarNombre').val(resp.Nombre_Evento);
            $('#fechaEvento').val(resp.Fecha_Evento);
            $('#organizadorEvento').val(resp.Organizador_evento);
            $('#numAsistentes').val(resp.Numero_Asistencia);
            $('#editDescr').val(resp.Descripcion_Evento);

            //abrir el modal
            $('#modalEditar').modal('show');
        });

        //     //manejar la solicitud de edición del formulario
        //     $('#formEditarEvento').on('submit', function(e){
        //         e.preventDefault();

        //         //solicitud AJAX para enviar los datos del formulario al servidor
        //         $.ajax({
        //             type: 'POST',
        //             url: '<?php echo base_url(); ?>index.php/formulario/editar',
        //             dataType: 'json',
        //             data: new FormData(this),
        //             processData: false,
        //             contentType: false
        //         }).done(function(resp){
        //             //cerrar el modal y actualizar la tabla
        //             $('#modalEditar').modal('hide');
        //             $('#editTableEvento').DataTable().ajax.reload();
        //         });
        //     });
        // });

        $(document).on('click', '.btnDelete', function() {
            // eventoId = $(this).attr('id').substring( $(this).attr('id').length -1);
            eventoIdSplit = $(this).attr('id').split('-');
            eventoId = eventoIdSplit[1];
            // $('#btnDelete').on("click", function(){
            // echo (entro);
            // console.log($(this).attr('id'));
            // var eventoId = $(this).val(); // Obtén el ID del evento desde el valor del botón

            // Muestra un cuadro de diálogo de confirmación
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción no se puede deshacer',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si se confirma la eliminación, realiza la solicitud Ajax al controlador
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url(); ?>index.php/formulario/eliminar',
                        data: {
                            eventoId: eventoId
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.ok) {
                                // Muestra un cuadro de diálogo de éxito
                                Swal.fire({
                                    title: 'Eliminado',
                                    text: 'El evento ha sido eliminado',
                                    icon: 'success',
                                    timer: 1500,
                                    showConfirmButton: false
                                });

                                // Actualiza la tabla de eventos
                                TablaEventos.ajax.reload();
                            } else {
                                // Muestra un cuadro de diálogo de error
                                Swal.fire({
                                    title: 'Error',
                                    text: 'No se pudo eliminar el evento',
                                    icon: 'error',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Aceptar'
                                });
                            }
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            // Muestra un cuadro de diálogo de error
                            Swal.fire({
                                title: 'Error',
                                text: 'Ha ocurrido un error en la solicitud',
                                icon: 'error',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Aceptar'
                            });
                        }
                    });
                }
            });
        });
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

    @keyframes bounceIn {
        0% {
            opacity: 0;
            transform: scale(0.3);
        }

        50% {
            opacity: 1;
            transform: scale(1.05);
        }

        70% {
            transform: scale(0.9);
        }

        100% {
            transform: scale(1);
        }
    }

    .bounce-in {
        animation: bounceIn 1s;
    }

    .estado-inactivo {
  display: none;
}

</style>