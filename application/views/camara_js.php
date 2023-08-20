

<script>
    $(document).ready(function() {
        // Inicializar QuaggaJS con las opciones necesarias
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector('#camera') // Selector del contenedor de la cámara
            },
            decoder: {
                readers: ['code_128_reader'] // Puedes cambiar el tipo de lector según tus necesidades
            }
        }, function(err) {
            if (err) {
                console.error(err);
                return;
            }
            console.log("QuaggaJS initialized.");

            // Escanear código QR al hacer clic en el botón
            $("#scan-button").click(function() {
                Quagga.start();
            });

            // Capturar el resultado del escaneo
            Quagga.onDetected(function(result) {
                // Detener el escaneo
                Quagga.stop();

                // Obtener el valor del código QR
                var code = result.codeResult.code;

                // Enviar el valor al controlador de CodeIgniter
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('controller/insert_qr_code'); ?>", // Reemplaza con la URL de tu controlador
                    data: {
                        code: code
                    }, // Datos a enviar
                    success: function(response) {
                        // Procesar la respuesta del controlador
                        // Puedes mostrar un mensaje de éxito o realizar otras acciones necesarias
                        $("#result").html("Código QR insertado correctamente: " + response);
                    }
                });
            });
        });
    });
</script>