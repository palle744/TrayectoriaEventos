<?php
class existe_model extends CI_Model
{

    public function existe($curp, $nombreEvento)
    {
        $this->db->where('CURP_Asistente', $curp);
        $this->db->where('Nombre_Evento', $nombreEvento);
        $query = $this->db->get('PersonaLista');

        return $query->num_rows() > 0;
    }
}
