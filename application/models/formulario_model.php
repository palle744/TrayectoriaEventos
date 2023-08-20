<?php 
/*
if (! defined('BASEPATH')) exit('No direct script access allowed');

class usuario_model extends CI_Model {

    public $variable;
        
    

    public function guardar_evento($Nombre_Evento, $Fecha_Evento, $Numero_Asistencia, $Organizador_evento, $Imagen_evento, $Descripcion_evento) {
        
        $this->db->select('Nombre_Evento', 'Fecha_Evento', 'Numero_Asistencia', 'Organizador_evento', 'Imagen_evento', 'Descripcion_evento');
        $this->db->from('EventoLista');
        $this->db->where('Nombre_Evento', $Nombre_Evento);
        $this->db->where('Fecha_Evento', $Fecha_Evento);
        $this->db->where('Numero_Asistencia', $Numero_Asistencia);
        $this->db->where('Organizador_evento', $Organizador_evento);
        $this->db->where('Imagen_evento', $Imagen_evento);
        $this->db->where('Descripcion_evento', $Descripcion_evento);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

}

*/
// defined('BASEPATH') OR exit('No direct script access allowed');

// class Evento_model extends CI_Model {

//     public function guardar_evento($nombre, $fecha, $asistentes) {
//         // aquí podrías escribir la lógica para guardar los datos en la base de datos
//         // por ejemplo:
//         $datos_evento = array(
//             'nombre' => $nombre,
//             'fecha' => $fecha,
//             'asistentes' => $asistentes
//         );
//         $this->db->insert('eventos', $datos_evento);
//     }


// }


if (!defined('BASEPATH')) exit('No direct script access allowed');

class Formulario_model extends CI_Model{
    function guardar ($data){
        $resp = $this-> db -> insert ('EventoLista', $data);
        return array(
            'ok' => isset($resp) ? true : false
        );
    }

    public function eliminar($id)
{
    $this->db->where('EventoLista_Id', $id);
    $this->db->delete('EventoLista');
}

}
