<?php

//-------Eliminación fisica 
// if (!defined('BASEPATH')) exit('No direct script access allowed');

// class eliminar_model extends CI_Model
// {
//     public function eliminar($id)
//     {
//         $this->db->where('EventoLista_Id', $id);
//         $resp = $this->db->delete('EventoLista');

//         return array(
//             'ok' => isset($resp) ? true : false
//         );
//     }
// }

if (!defined('BASEPATH')) exit('No direct script access allowed');

class eliminar_model extends CI_Model
{
    public function eliminar($id)
    {
        // Actualizar el valor de la columna Estado_Evento a 0
        $data = array(
            'EstadoEvento' => 0
        );
        $this->db->where('EventoLista_Id', $id);
        $this->db->update('EventoLista', $data);

        return array(
            'ok' => true
        );
    }
}
