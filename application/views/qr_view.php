<!-- qr_view.php
<!DOCTYPE html>
<html>
<head>
    <title>Lector de Códigos QR</title>
    <style>
        #video-preview {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <button id="scan-button">Abrir cámara</button>
    <div id="video-container">
        <video id="video-preview" autoplay></video>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/instascan@1.0.0/dist/instascan.min.js"></script>
    <script>
        document.getElementById('scan-button').addEventListener('click', function() {
            // Acceder a la cámara web
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    var video = document.getElementById('video-preview');
                    video.srcObject = stream;

                    // Inicializar el lector de códigos QR
                    var scanner = new Instascan.Scanner({ video: video });
                    scanner.addListener('scan', function(content) {
                        // Enviar el valor del código QR al servidor
                        sendQRValue(content);
                    });

                    // Comenzar la escucha de los códigos QR
                    Instascan.Camera.getCameras()
                    .then(function(cameras) {
                        if (cameras.length > 0) {
                            scanner.start(cameras[0]);
                        } else {
                            console.error('No se encontraron cámaras en el dispositivo.');
                        }
                    })
                    .catch(function(error) {
                        console.error(error);
                    });
                })
                .catch(function(error) {
                    console.error('Acceso a la cámara denegado:', error);
                });
            } else {
                console.error('El navegador no admite getUserMedia.');
            }
        });

        function sendQRValue(qrValue) {
            // Enviar el valor del código QR al servidor utilizando AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '<?= base_url('qr/save_qr_value') ?>', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    console.log('Valor del código QR enviado al servidor.');
                }
            };
            xhr.send('qr_value=' + encodeURIComponent(qrValue));
        }
    </script>
</body>
</html> -->
<!-- qr_view.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Lector de Códigos QR</title>
    <style>
        #video-preview {
            width: 100%;
            height: auto;
            max-width: 100%;
        }
        
        .center-button {
            display: block;
            margin: 0 auto;
            font-size: 1.5em;
            padding: 10px 20px;
        }

        #video-container {
            text-align: center;
        }

        #scan-button {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 1.5em;
            padding: 10px 20px;
        }

        #qr-value {
            text-align: center;
            font-size: 1.5em;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div id="video-container">
        <video id="video-preview" autoplay></video>
        <button id="scan-button" class="btn btn-warning">Abrir cámara</button>
        <div id="qr-value"></div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
    <script>
        var videoStream;
        var video = document.getElementById('video-preview');
        var qrValueElement = document.getElementById('qr-value');

        function startCamera() {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    videoStream = stream;
                    video.srcObject = stream;
                    video.style.display = 'block';
                    document.getElementById('scan-button').innerText = 'Cerrar cámara';

                    // Inicializar el lector de códigos QR
                    Quagga.init({
                        inputStream: {
                            constraints: {
                                facingMode: 'environment' // Utilizar la cámara trasera en dispositivos móviles
                            }
                        },
                        decoder: {
                            readers: ['qrcode_reader'] // Utilizar el lector de códigos QR
                        }
                    }, function(err) {
                        if (err) {
                            console.error(err);
                            return;
                        }
                        Quagga.start();
                    });

                    Quagga.onDetected(function(result) {
                        // Detener la detección después de encontrar un código QR válido
                        Quagga.stop();
                        // Mostrar el valor del código QR en la página
                        qrValueElement.innerText = result.codeResult.code;
                        // Volver a iniciar la detección después de mostrar el valor del código QR
                        setTimeout(function() {
                            qrValueElement.innerText = '';
                            Quagga.start();
                        }, 2000); // Reiniciar la detección después de 2 segundos
                    });
                })
                .catch(function(error) {
                    console.error('Acceso a la cámara denegado:', error);
                });
            } else {
                console.error('El navegador no admite getUserMedia.');
            }
        }

        function stopCamera() {
            if (videoStream) {
                videoStream.getTracks().forEach(function(track) {
                    track.stop();
                });
                videoStream = null;
                video.srcObject = null;
                video.style.display = 'none';
                document.getElementById('scan-button').innerText = 'Abrir cámara';
                qrValueElement.innerText = '';
            }
        }

        document.getElementById('scan-button').addEventListener('click', function() {
            if (videoStream) {
                stopCamera();
            } else {
                startCamera();
            }
        });
    </script>
</body>
</html>
