    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Gráficas de Asistencia</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
        <script src="https://unpkg.com/xlsx-populate/browser/xlsx-populate.min.js"></script>


        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    </head>
    <style>
        .titulo {
            font-size: 4rem;
            font-family: 'Baloo';
            color: #FF8200;
            text-align: center;
        }

        .card-title {
            background-color: #e0eaf1;
        }

        .subtitulo {
            color: #FF8200;
            font-family: 'Baloo';
        }

        .subtitulo2 {
            color: #0009f0;
            font-family: 'Baloo';
        }

        .subtitulo3 {
            color: #0009f0;
            font-family: 'Baloo';
            font-size: 1.3rem;
        }
    </style>

    <body>
        <h1 class="text-center titulo">Estadísticas</h1>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 mx-auto">
                    <div class="card shadow bounce-in" style="max-width: 400px;">
                        <div class="card-header card-title">
                            <h1 class="text-center subtitulo2 "><b>Asistencia</b></h1>
                        </div>
                        <div class="card-body">
                            <div>
                                <h2 class="text-center subtitulo">Seleccionar Evento</h2>
                                <select id="eventoSelect" class="form-control">
                                    <?php foreach ($eventos as $evento) { ?>
                                        <option value="<?= $evento['Nombre_Evento'] ?>"> <?= $evento['Nombre_Evento'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <h2 class="text-center subtitulo3 mt-3">Seleccionar Tipo de Gráfica</h2>
                                <select id="tipoGraficaSelect" class="form-control">
                                    <option value="pie">Pie</option>
                                    <option value="doughnut">Dona</option>
                                    <option value="bar">Barras</option>
                                    <option value="polarArea">Polar Area</option>
                                </select>
                            </div>
                            <div>
                                <canvas id="grafica"></canvas>
                            </div>
                            <div class="text-center mt-4">
                                <button id="actualizarBtn" class="btn btn-primary ">Actualizar Gráfica</button>
                                <button id="descargarBtn" class="btn btn-info mt-2 mb-2">Descargar Gráfica</button>
                                <button id="descargarBtnExcel" class="btn btn-success" onclick="descargarExcel2()">Descargar Excel</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mx-auto">
                    <div class="card shadow bounce-in" style="max-width: 400px;">
                        <div class="card-header card-title">
                            <h1 class="text-center subtitulo2 "><b>Registros</b></h1>
                        </div>
                        <div class="card-body">
                            <div>
                                <h2 class="text-center subtitulo">Seleccionar Evento</h2>
                                <select id="eventoSelect2" class="form-control">
                                    <?php foreach ($eventos as $evento) { ?>
                                        <option value="<?= $evento['Nombre_Evento'] ?>"> <?= $evento['Nombre_Evento'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <h2 class="text-center subtitulo3 mt-3">Seleccionar Tipo de Gráfica</h2>
                                <select id="tipoGraficaSelect2" class="form-control">
                                    <option value="pie">Pie</option>
                                    <option value="doughnut">Dona</option>
                                    <option value="bar">Barras</option>
                                    <option value="polarArea">Polar Area</option>
                                </select>
                            </div>
                            <div>
                                <canvas id="grafica2"></canvas>
                            </div>
                            <div class="text-center mt-4">
                                <button id="actualizarBtn2" class="btn btn-primary">Actualizar Gráfica</button>
                                <button id="descargarBtn2" class="btn btn-info mt-2 mb-2">Descargar Gráfica</button>
                                <button id="descargarBtn2" class="btn btn-success " onclick="descargarExcel()">Descargar Excel</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                var grafica = null;
                var tipoGrafica = 'pie';
                var grafica2 = null;
                var tipoGrafica2 = 'pie'; // Valor predeterminado: Polar Area
                // Función para crear o actualizar la gráfica
                function actualizarGrafica(eventoSeleccionado) {
                    // Realizar una solicitud AJAX para obtener los datos de la gráfica
                    $.ajax({
                        url: '<?= site_url("asistencia_controller/obtenerGrafica"); ?>',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            evento: eventoSeleccionado
                        },
                        success: function(response) {
                            console.log(response)
                            // Destruir la gráfica anterior si existe
                            if (grafica !== null) {
                                grafica.destroy();
                            }
                            // Crear la nueva gráfica con los datos recibidos
                            var ctx = document.getElementById('grafica').getContext('2d');
                            grafica = new Chart(ctx, {
                                type: tipoGrafica, // Usar el tipo de gráfica seleccionado
                                data: {
                                    labels: ['Asistencia', 'Inasistencia', 'Total'],
                                    datasets: [{
                                        data: [response.asistentes, response.noAsistentes, response.totalRegistros],
                                        backgroundColor: ['blue', 'orange', 'red']
                                    }]
                                },
                                options: {
                                    legend: {
                                        display: false
                                    },
                                    legendCallback: function(chart) {
                                        var text = [];
                                        text.push('<ul class="list-inline">');
                                        var data = chart.data;
                                        var datasets = data.datasets;
                                        var labels = data.labels;
                                        if (datasets.length) {
                                            for (var i = 0; i < datasets[0].data.length; ++i) {
                                                text.push('<li class="list-inline-item">');
                                                text.push('<span class="badge badge-primary mr-2">' + labels[i] + ': ' + datasets[0].data[i] + '</span>');
                                                text.push('</li>');
                                            }
                                        }
                                        text.push('</ul>');
                                        return text.join('');
                                    }
                                }
                            });
                            // Actualizar la leyenda de la gráfica
                            // var legend = document.getElementById('grafica-leyenda');
                            // legend.innerHTML = grafica.generateLegend(); // Utilizar el método generateLegend() proporcionado por Chart.js
                        }
                    });
                }


                // Manejar el evento de cambio en la selección del evento
                $('#eventoSelect').change(function() {
                    var eventoSeleccionado = $(this).val();
                    actualizarGrafica(eventoSeleccionado);
                });
                // Manejar el evento de cambio en la selección del tipo de gráfica
                $('#tipoGraficaSelect').change(function() {
                    tipoGrafica = $(this).val();
                    var eventoSeleccionado = $('#eventoSelect').val();
                    actualizarGrafica(eventoSeleccionado);
                });
                // Manejar el evento de clic en el botón de actualizar
                $('#actualizarBtn').click(function() {
                    var eventoSeleccionado = $('#eventoSelect').val();
                    actualizarGrafica(eventoSeleccionado);
                });
                // Manejar el evento de clic en el botón de descargar
                $('#descargarBtn').click(function() {
                    // Obtener el nombre del evento y el tipo de gráfica seleccionados
                    var nombreEvento = $('#eventoSelect').val();
                    var tipoGraficaSeleccionada = $('#tipoGraficaSelect option:selected').text();
                    // Obtener la hora actual en formato HH-MM-SS
                    var horaActual = obtenerHoraActual();
                    // Generar el nombre del archivo con el nombre del evento, tipo de gráfica y hora actual
                    var nombreArchivo = nombreEvento + '-' + tipoGraficaSeleccionada + '-' + horaActual + '.png';
                    // Convertir la gráfica en una imagen PNG
                    var canvas = document.getElementById('grafica');
                    var imagenUrl = canvas.toDataURL('image/png');
                    // Crear un enlace temporal para descargar la imagen
                    var enlaceDescarga = document.createElement('a');
                    enlaceDescarga.href = imagenUrl;
                    enlaceDescarga.download = nombreArchivo;
                    enlaceDescarga.click();
                });
                // Función para obtener la hora actual en formato HH-MM-SS
                function obtenerHoraActual() {
                    var fechaActual = new Date();
                    var horas = fechaActual.getHours().toString().padStart(2, '0');
                    var minutos = fechaActual.getMinutes().toString().padStart(2, '0');
                    var segundos = fechaActual.getSeconds().toString().padStart(2, '0');
                    return horas + '-' + minutos + '-' + segundos;
                }
                // Cargar la gráfica inicial al cargar la página
                var eventoInicial = $('#eventoSelect').val();
                actualizarGrafica(eventoInicial);

                function actualizarGrafica2(eventoSeleccionado2) {
                    // Realizar una solicitud AJAX para obtener los datos de la gráfica
                    $.ajax({
                        url: '<?= site_url("asistencia_controller/obtenerRegistros"); ?>',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            evento: eventoSeleccionado2
                        },
                        success: function(response) {
                            console.log(response)
                            // Destruir la gráfica anterior si existe
                            if (grafica2 !== null) {
                                grafica2.destroy();
                            }
                            // Crear la nueva gráfica con los datos recibidos
                            var ctx2 = document.getElementById('grafica2').getContext('2d');
                            grafica2 = new Chart(ctx2, {
                                type: tipoGrafica2, // Usar el tipo de gráfica seleccionado
                                data: {
                                    labels: ['Total ', 'Libre', 'Registros'],
                                    datasets: [{
                                        data: [response.asistentes, response.noAsistentes, response.totalRegistros],
                                        backgroundColor: ['orange', 'green', 'red']
                                    }]
                                },
                                options: {
                                    legend: {
                                        display: false
                                    },
                                    legendCallback: function(chart) {
                                        var text = [];
                                        text.push('<ul class="list-inline">');
                                        var data = chart.data;
                                        var datasets = data.datasets;
                                        var labels = data.labels;
                                        if (datasets.length) {
                                            for (var i = 0; i < datasets[0].data.length; ++i) {
                                                text.push('<li class="list-inline-item">');
                                                text.push('<span class="badge badge-primary mr-2">' + labels[i] + ': ' + datasets[0].data[i] + '</span>');
                                                text.push('</li>');
                                            }
                                        }
                                        text.push('</ul>');
                                        return text.join('');
                                    }
                                }
                            });
                            // Actualizar la leyenda de la gráfica
                            // var legend2 = document.getElementById('grafica-leyenda');
                            // legend2.innerHTML = grafica.generateLegend(); // Utilizar el método generateLegend() proporcionado por Chart.js
                        }
                    });
                }

                // Manejar el evento de cambio en la selección del evento
                $('#eventoSelect2').change(function() {
                    var eventoSeleccionado2 = $(this).val();
                    actualizarGrafica2(eventoSeleccionado2);
                });
                // Manejar el evento de cambio en la selección del tipo de gráfica
                $('#tipoGraficaSelect2').change(function() {
                    tipoGrafica2 = $(this).val();
                    var eventoSeleccionado2 = $('#eventoSelect2').val();
                    actualizarGrafica2(eventoSeleccionado2);
                });
                // Manejar el evento de clic en el botón de actualizar
                $('#actualizarBtn2').click(function() {
                    var eventoSeleccionado2 = $('#eventoSelect2').val();
                    actualizarGrafica2(eventoSeleccionado2);
                });
                // Manejar el evento de clic en el botón de descargar
                $('#descargarBtn2').click(function() {
                    // Obtener el nombre del evento y el tipo de gráfica seleccionados
                    var nombreEvento2 = $('#eventoSelect2').val();
                    var tipoGraficaSeleccionada2 = $('#tipoGraficaSelect2 option:selected').text();
                    // Obtener la hora actual en formato HH-MM-SS
                    var horaActual2 = obtenerHoraActual2();
                    // Generar el nombre del archivo con el nombre del evento, tipo de gráfica y hora actual
                    var nombreArchivo2 = nombreEvento2 + '-' + tipoGraficaSeleccionada2 + '-' + horaActual2 + '.png';
                    // Convertir la gráfica en una imagen PNG
                    var canvas2 = document.getElementById('grafica2');
                    var imagenUrl2 = canvas2.toDataURL('image/png');
                    // Crear un enlace temporal para descargar la imagen
                    var enlaceDescarga2 = document.createElement('a');
                    enlaceDescarga2.href = imagenUrl2;
                    enlaceDescarga2.download = nombreArchivo2;
                    enlaceDescarga2.click();
                });
                // Función para obtener la hora actual en formato HH-MM-SS
                function obtenerHoraActual2() {
                    var fechaActual = new Date();
                    var horas = fechaActual.getHours().toString().padStart(2, '0');
                    var minutos = fechaActual.getMinutes().toString().padStart(2, '0');
                    var segundos = fechaActual.getSeconds().toString().padStart(2, '0');
                    return horas + '-' + minutos + '-' + segundos;
                }
                // Cargar la gráfica inicial al cargar la página
                var eventoInicial2 = $('#eventoSelect2').val();
                actualizarGrafica2(eventoInicial2);


            });
            var libro = new ExcelJS.Workbook(); // Inicializar la variable libro como un nuevo objeto Workbook


            function descargarExcel() {
                var eventoSeleccionado2 = $('#eventoSelect2').val();
                var eventoNombre = $('#eventoSelect2 option:selected').text();

                obtenerDatosGrafica(eventoSeleccionado2, function(response) {
                    var datos = crearMatrizDatos(eventoNombre, response);
                    generarArchivoExcel(datos);
                });

                // Insertar la gráfica en la hoja de cálculo
                if (libro) {
                    var hoja = libro.addWorksheet('Hoja 1'); // Agregar una nueva hoja al libro
                    var graficaExcel = hoja.addChart({
                        left: 'E1', // Posición de la gráfica (celda superior izquierda)
                        width: 600, // Ancho de la gráfica
                        height: 400, // Altura de la gráfica
                        type: 'pie', // Tipo de gráfica
                    });
                }
            }


            function obtenerDatosGrafica(eventoSeleccionado2, callback) {
                $.ajax({
                    url: '<?php echo site_url("asistencia_controller/obtenerRegistros"); ?>',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        evento: eventoSeleccionado2
                    },
                    success: function(response) {
                        callback(response);
                    },
                    error: function() {
                        console.log('Error al obtener los datos de la gráfica');
                    }
                });
            }


            function crearMatrizDatos(eventoNombre, response) {
                var datos = [];
                datos.push(['Evento', eventoNombre]);
                datos.push(['Total', response.asistentes]);
                datos.push(['Libre', response.noAsistentes]);
                datos.push(['Registros', response.totalRegistros]);
                return datos;
            }

            function generarArchivoExcel(datos) {
                var workbook = XLSX.utils.book_new();
                var worksheet = XLSX.utils.aoa_to_sheet(datos);
                XLSX.utils.book_append_sheet(workbook, worksheet, 'Datos de la gráfica');
                var fechaActual = new Date().toISOString().slice(0, 10);
                var nombreArchivo = 'datos_grafica_' + fechaActual + '.xlsx';
                XLSX.writeFile(workbook, nombreArchivo);



            }

            function descargarExcel2() {
                var eventoSeleccionado = $('#eventoSelect').val();
                var eventoNombre = $('#eventoSelect option:selected').text();

                obtenerDatosGrafica2(eventoSeleccionado, function(response) {
                    var datos = crearMatrizDatos2(eventoNombre, response);
                    generarArchivoExcel2(datos);
                });

                // Insertar la gráfica en la hoja de cálculo
                if (libro) {
                    var hoja = libro.addWorksheet('Hoja 1'); // Agregar una nueva hoja al libro
                    var graficaExcel = hoja.addChart({
                        left: 'E1', // Posición de la gráfica (celda superior izquierda)
                        width: 600, // Ancho de la gráfica
                        height: 400, // Altura de la gráfica
                        type: 'pie', // Tipo de gráfica
                    });
                }
            }

            function obtenerDatosGrafica2(eventoSeleccionado, callback) {
                $.ajax({
                    url: '<?php echo site_url("asistencia_controller/obtenerGrafica"); ?>',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        evento: eventoSeleccionado
                    },
                    success: function(response) {
                        callback(response);
                    },
                    error: function() {
                        console.log('Error al obtener los datos de la gráfica');
                    }
                });
            }

            function crearMatrizDatos2(eventoNombre, response) {
                var datos = [];
                datos.push(['Evento', eventoNombre]);
                datos.push(['Total', response.totalRegistros]);
                datos.push(['Asistencia', response.asistentes]);
                datos.push(['Inasistencia', response.noAsistentes]);
                return datos;
            }

            function generarArchivoExcel2(datos) {
                var workbook = XLSX.utils.book_new();
                var worksheet = XLSX.utils.aoa_to_sheet(datos);
                XLSX.utils.book_append_sheet(workbook, worksheet, 'Datos de la gráfica');
                var fechaActual = new Date().toISOString().slice(0, 10);
                var nombreArchivo = 'datos_grafica_' + fechaActual + '.xlsx';
                XLSX.writeFile(workbook, nombreArchivo);
            }
        </script>



    </body>

    </html>