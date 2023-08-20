<?php
class EventosListaModel extends CI_Model {
    public function obtenerEventos() {
        // Realizar la consulta para obtener los eventos
        $this->db->select('Nombre_Evento');
        $query = $this->db->get('EventoLista');

        // Verificar si hay resultados
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); // Si no hay resultados, retornar un array vacío
   
        }
    }
}
