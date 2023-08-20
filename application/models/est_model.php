<?php
class est_model extends CI_Model {
    public function obtenerEventos() {
        // Realiza la consulta para obtener los datos de los eventos y asistentes
        $query = $this->db->get('EventosListaModel');

        // Verifica si se encontraron resultados
        if ($query->num_rows() > 0) {
            // Devuelve los resultados como un array
            return $query->result_array();
        } else {
            return array();
        }
    }
}
?>
