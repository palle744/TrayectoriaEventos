<script>
    $(document).ready(function() {


        TablaEventos = $("#busquedaTable").DataTable({
            // retrieve: true,
            // paging: true,
            responsive: true,
            // info: true,
            // filter: true,
            dom: 'lBfrtip',
            stateSave: true,
            ajax: '<?php echo base_url(); ?>index.php/busqueda_control/cargarPersona',
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
                        doc.defaultStyle.fontSize = 8;

                        doc.pageMargins = [40, 0, 40, 30];
                        var totalPagesExp = '{total_pages_count_string}';
                        doc['footer'] = function(currentPage, pageCount) {
                            // return {
                            //     text: currentPage.toString() + ' de ',
                            //     alignment: 'right'
                            // };
                        };

                        doc['afterDocumentCallback'] = function(doc) {
                            // Reemplazar el marcador de posición con el número real de páginas
                            var totalPages = doc.internal.getNumberOfPages();
                            totalPagesExp = totalPages.toString();
                        };

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
            columns: [{
                    data: 'PersonaLista_Id'
                },
                {
                    data: 'Nombre_Asistente'
                },
                {
                    data: 'Primer_Apellido_Asistente'
                },
                {
                    data: 'Segundo_Apellido_Asistente'
                },
                {
                    data: 'Nombre_Evento'
                },
                {
                    data: 'Correo_Electronico_Asistente'
                },
                {
                    data: 'CURP_Asistente'
                },
                {
                    data: 'Fecha_Captura'
                },
                {
                    data: 'Codigo_Acceso'
                }
            ],

        });
        

    });

    
</script>

<script>
    // $.ajax({
    //     type: 'POST',
    //     url: '<?php echo base_url(); ?>index.php/busqueda_model/obtener_datos',
    //     dataType: 'json',
    //     success: function(resp) {
    //         $('#busquedaTable').DataTable({
    //             retrieve: true,

    //             paging: true,
    //             info: false,
    //             filter: true,
    //             stateSave: true,
    //             ajax: '<?php echo base_url(); ?>index.php/busqueda_control/busqueda',
    //             language: {
    //                 "sProcessing": "Procesando...",
    //                 "sLengthMenu": "Mostrar _MENU_ registros",
    //                 "sZeroRecords": "No se encontraron resultados",
    //                 "sEmptyTable": "Ningún dato disponible en esta tabla",
    //                 "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    //                 "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    //                 "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    //                 "sInfoPostFix": "",
    //                 "sSearch": "Buscar:",
    //                 "sUrl": "",
    //                 "sInfoThousands": ",",
    //                 "sLoadingRecords": "Cargando...",
    //                 "oPaginate": {
    //                     "sFirst": "Primero",
    //                     "sLast": "Último",
    //                     "sNext": "Siguiente",
    //                     "sPrevious": "Anterior"
    //                 },
    //                 "oAria": {
    //                     "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
    //                     "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    //                 }
    //             },
    //             columns: [
    //                 { data: 'PersonaLista_Id' },
    //                 { data: 'Nombre_Asistente' },
    //                 { data: 'Correo_Electronico_Asistente' },
    //                 { data: 'CURP_Asistente' },
    //                 { data: 'Fecha_Captura' }
    //             ],
    //             data: resp
    //         });
    //     }
    // });
</script>

<style>.glass {
  background-color: rgba(255, 255, 255, 0.5);
  backdrop-filter: blur(10px); /* Agrega un desenfoque al fondo para lograr el efecto de cristal */
}</style>