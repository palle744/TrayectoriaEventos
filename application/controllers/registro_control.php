
<?php


if (!defined('BASEPATH')) exit('No direct script access allowed');

class registro_control extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model('registro_model');
        $this->load->library('session');
        // $this->load->model('evento_model');
        require_once(APPPATH . 'libraries/qrlib.php');
    }

    public function index()
    {


        $this->load->view('eventosgto');
    }


    public function registro()
    {

        $this->load->model('aforo_model');
        $this->load->model('evento_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        $this->form_validation->set_rules('Correo_Electronico_Asistente', 'Correo Electrónico', 'trim|required|valid_email');
        $this->form_validation->set_rules('CURP_Asistente', 'CURP', 'trim|required');
        $this->form_validation->set_rules('Nombre_Evento', 'Nombre del Evento', 'trim|required');
        $this->form_validation->set_rules('Primer_Apellido_Asistente', 'Primer Apellido', 'trim|required');
        $this->form_validation->set_rules('Segundo_Apellido_Asistente', 'Segundo Apellido', 'trim|required');
        $this->form_validation->set_rules('Nombre_Asistente', 'Nombre', 'trim|required');

        if ($this->form_validation->run() == false) {
            // Mostrar errores de validación
            $errors = validation_errors();
            echo "<script>
        Swal.fire({
            title: '¡Error!',
            html: '" . $errors . "',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        </script>";
        } else {
            //--------IMPORTANTEEEEEEEE----------
            // ACTIVAR PARA PRUEBAS 

            $CURP_Asistente = $this->input->post("CURP_Asistente");
            $Nombre_Evento = $this->input->post("Nombre_Evento");

            $aforo = $this->aforo_model->obtenerAforoEvento($Nombre_Evento); // Obtener el aforo del evento

            $numeroAsistentes = $this->evento_model->contarAsistentesEvento($Nombre_Evento); // Contar el número de asistentes al evento

            // print_r($aforo);
            
            if ($numeroAsistentes >= $aforo) {
                echo json_encode(
                    $response = array(
                        'ok' => false,
                        'mensaje' => 'El evento está lleno',
                        // 'text' => 'por favor elige otro evento'
                    )
                );
                return false;
            }

            // Verificar si el CURP está registrado en el evento
            if ($this->evento_model->existe($CURP_Asistente, $Nombre_Evento)) {
                echo json_encode(
                    $response = array(
                        'ok' => false,
                        'mensaje' => 'Ya se encuentra registrado este CURP para este evento',
                        'text' => 'por favor vuelvelo a intentar'
                    )
                );

                return false;
            }
            $Correo_Electronico_Asistente = $this->input->post("Correo_Electronico_Asistente");
            $CURP_Asistente = $this->input->post("CURP_Asistente");
            $Nombre_Evento = $this->input->post("Nombre_Evento");
            $lastname = $this->input->post("Primer_Apellido_Asistente");
            $surname = $this->input->post("Segundo_Apellido_Asistente");
            $name = $this->input->post("Nombre_Asistente");
            // Genera un código alfanumérico único de 6 dígitos
            $codigo = substr(str_shuffle(uniqid()), 0, 6);
            $nombreQR = $CURP_Asistente . '_' . str_replace(' ', '_', $Nombre_Evento) . '.png';
            // $rutaQR = 'codigosQR/qrcode.png';
            $rutaQR = 'codigosQR/' . $nombreQR;
            $tamañoQR = 35;
            $enlace = base_url('index.php/acceso_control?codigo=' . $codigo); // Ajusta 'acceso' según la URL de tu página
            // Genera el código QR y guarda el archivo
            // QRcode::png($codigo, $rutaQR);
            QRcode::png($enlace, $rutaQR, QR_ECLEVEL_L, $tamañoQR);
            // print_r(QRcode::png($codigo, $rutaQR));
            // Aplica el estilo de boleto alrededor del código QR
            $imagenQR = imagecreatefrompng($rutaQR);
            $boletoPath = 'boleto/boleto.png'; // Ruta a la imagen del boleto
            $imagenBoleto = imagecreatefrompng($boletoPath);
            // Copia el código QR en el centro del boleto
            $qrWidth = imagesx($imagenQR);
            $qrHeight = imagesy($imagenQR);
            $boletoWidth = imagesx($imagenBoleto);
            $boletoHeight = imagesy($imagenBoleto);
            $x = ($boletoWidth - $qrWidth) / 2;
            $y = ($boletoHeight - $qrHeight) / 2;
            imagecopy($imagenBoleto, $imagenQR, $x, $y, 0, 0, $qrWidth, $qrHeight);
            // Guarda la imagen final
            $boletoQRPath = 'codigosQR/boleto_' . $nombreQR;
            imagepng($imagenBoleto, $boletoQRPath);
            // Codifica el archivo del código QR en base64
            $qrCodeImage = file_get_contents($rutaQR);
            $qrCodeBase64 = base64_encode($qrCodeImage);
            $adjunto = array(
                'path' => $rutaQR, // Ruta al archivo del código QR
                'name' => 'qrcode.png', // Nombre deseado para el archivo adjunto
                'mime' => 'image/png' // Tipo MIME del archivo adjunto
            );

            // Envía el código alfanumérico a través de la API de envío de correo
            $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpbml0RGF0ZSI6IjIwMjMtMDUtMTggMTE6NTI6MTEiLCJleHBEYXRlIjoiMjAyNC0wNS0xOCAxMTo1MjoxMSIsImlhdCI6MTY4NDQzNTkzMSwiZXhwIjoxNzE1OTcxOTMxfQ.hVO-vuctRXPISJEgI_ulVjlIjowCA72t5vnfBXdkfZ4";
            $url = "http://187.191.30.131:4401/wsCurp/api/v1/mailer/sendMail";


            $payload = array(
                'subject' => "Codigo de acceso " . $Nombre_Evento,
                // 'body' => "Buen día, este es tu código de acceso para el evento " . $Nombre_Evento . ". Es indispensable que lo presentes para acceder:<br><br>Descarga tu boleto aquí: <a href='" . base_url($boletoQRPath) . "'>Descargar Boleto</a>",
                'body' => "Buen día, este es tu código de acceso para el evento " . $Nombre_Evento . ". Es indispensable que lo presentes para acceder:<br><br>Consulta tu boleto aquí: <a href='" . base_url($boletoQRPath) . "'>Consultar Boleto</a>",
                'attachments' => array($adjunto), // Adjunta el código QR
                'addresses' => $Correo_Electronico_Asistente
            );

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization:Bearer ' . $token));

            $response = curl_exec($ch);
            curl_close($ch);


            $data = json_decode($response, true);
            if ($data['ok']) {



                $data = array(
                    'CURP_Asistente' => $CURP_Asistente,
                    'Correo_Electronico_Asistente' => $Correo_Electronico_Asistente,
                    'Nombre_Evento' => $Nombre_Evento,
                    'Codigo_Acceso' => $codigo,
                    'Nombre_Asistente' => $name,
                    'Primer_Apellido_Asistente' => $lastname,
                    'Segundo_Apellido_Asistente' => $surname
                );
                $resp = $this->registro_model->registro($data);
                if ($resp['ok']) {
                    echo json_encode(
                        $response = array(
                            'ok' => true,
                            'Nombre_Evento' => $Nombre_Evento
                        )
                    );
                    return $response;
                } else {
                    echo json_encode(
                        $response = array(
                            'ok' => false
                        )
                    );
                    return $response;
                }
            } else {
                echo json_encode(
                    $response = array(
                        'ok' => false,
                        'mensaje' => 'No se genero el registro por favor vuelvelo a intentar',
                        'text' => 'por favor vuelvelo a intentar'
                    )
                );
                // La solicitud fue exitosa
                return $response;
            }
        }
    }

    public function registroAjax()
    {

        $curp = $this->input->post("curp");
        //paterno
        $lastname = $this->input->post("lastname");
        //materno
        $surname = $this->input->post("surname");
        $name = $this->input->post("name");

        $arrData = array(
            'Nombre_Asistente' => $name,
            'Primer_Apellido_Asistente' => $lastname,
            'Segundo_Apellido_Asistente' => $surname
        );

        $this->registro_model->registroAjax($arrData, array('CURP_Asistente =>'));
    }
}



















// if (!defined('BASEPATH')) exit('No direct script access allowed');

// class registro_control extends CI_Controller {
    
//     public function __construct() {
//         parent::__construct();
//         $this->load->helper("url");
//         $this->load->model('registro_model');
//         $this->load->library('session');
//     }
    
//     public function index() {
//         $this->load->view('eventosgto');
//     }

//     public function registro() {
//         $Correo_Electronico_Asistente = $this->input->post("Correo_Electronico_Asistente"); 
//         $CURP_Asistente = $this->input->post("CURP_Asistente");
//         $data = array(
//             'CURP_Asistente' => $CURP_Asistente,
//             'Correo_Electronico_Asistente' => $Correo_Electronico_Asistente
//         );

//         $this->registro_model->registro($data);

//         if ($Correo_Electronico_Asistente != null) {
//             $this->enviarCodigo($Correo_Electronico_Asistente);
//             $this->load->view('registro_exitoso');
//         }
//     }

//     public function enviarCodigo($correo) {
//         $url = "http://187.191.30.131:4401/wsCurp/api/v1/mailer/sendMail";
//         $codigo = $this->generarCodigo(6); 

//         $data = array(
//             'to' => $correo,
//             'subject' => 'Código de registro',
//             'message' => 'Su código de registro es: ' . $codigo
//         );

//         $headers = array(
//             'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpbml0RGF0ZSI6IjIwMjMtMDUtMTggMTE6NTI6MTEiLCJleHBEYXRlIjoiMjAyNC0wNS0xOCAxMTo1MjoxMSIsImlhdCI6MTY4NDQzNTkzMSwiZXhwIjoxNzE1OTcxOTMxfQ.hVO-vuctRXPISJEgI_ulVjlIjowCA72t5vnfBXdkfZ4',
//             'Content-Type: application/x-www-form-urlencoded'
//         );

//         $options = array(
//             CURLOPT_URL => $url,
//             CURLOPT_POST => true,
//             CURLOPT_POSTFIELDS => http_build_query($data),
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_HTTPHEADER => $headers
//         );

//         $curl = curl_init();
//         curl_setopt_array($curl, $options);
//         $response = curl_exec($curl);
//         curl_close($curl);

    
//     }

//     public function pagina() {
//         $this->load->view('eventosgto');
//     }

//     private function generarCodigo($longitud) {
//         $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//         $codigo = '';
//         $max = strlen($caracteres) - 1;

//         for ($i = 0; $i < $longitud; $i++) {
//             $codigo .= $caracteres[random_int(0, $max)];
//         }

//         return $codigo;
//     }
// }    
