<?php
class evento_model extends CI_Model {

public function contar($nombreEvento)
    {
        $this->db->from('PersonaLista');
        $this->db->where('Nombre_Evento', $nombreEvento);
        $this->db->where('Codigo_Asistente IS NOT NULL', null, false);
        $totalRegistros = $this->db->count_all_results();

        return $totalRegistros;
    }
    public function ObtenerNumeroAsistencia($nombreEvento)
    {
        $this->db->select('Numero_Asistencia');
        $this->db->from('TablaEvento');
        $this->db->where('Nombre_Evento', $nombreEvento);
        $this->db->limit(1); // Limita el resultado a una sola fila
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->Numero_Asistencia;
        } else {
            return 0;
        }
    }

    public function get_events()
    {
        $this->db->select('*');
        $this->db->from('EventoLista');
        $query = $this->db->get();
        return $query->result_array();
    }

    
    public function existe($curp, $nombreEvento)
    {
        $this->db->where('CURP_Asistente', $curp);
        $this->db->where('Nombre_Evento', $nombreEvento);
        $query = $this->db->get('PersonaLista');

        return $query->num_rows() > 0;
    }

    public function contarAsistentesEvento($Nombre_Evento)
    {
        $this->db->where('Nombre_Evento', $Nombre_Evento);
        $query = $this->db->get('PersonaLista');
        $asistencia = $query->num_rows();

        return $asistencia;
    }

    // En tu modelo evento_model.php
public function obtenerEstadoEvento($codigoAcceso)
{
    // Realiza la consulta a la base de datos para obtener el estado del evento según el nombre del evento
    $consulta = "select EventoLista.EstadoEvento, PersonaLista.Codigo_Acceso, PersonaLista.Nombre_Evento
    from PersonaLista
    join EventoLista
    on PersonaLista.Nombre_Evento = EventoLista.Nombre_Evento
    Where PersonaLista.Codigo_Acceso ="."'".$codigoAcceso."'" ;
    // $this->db->select('EstadoEvento');
    // $this->db->from('EventoLista');
    // $this->db->where('Nombre_Evento', $nombreEvento);
    $query = $this->db->query($consulta);

    if ($query->num_rows() > 0) {
        // Obtiene el estado del evento si se encontró una fila en la consulta
        $row = $query->row();
        return $row->EstadoEvento;
    } else {
        // Si no se encontró el evento, puedes retornar un valor por defecto o lanzar una excepción
        return null;
    }
}

// En tu modelo evento_model.php
public function obtenerFechaEvento($codigoAcceso)
{
    // Realiza la consulta a la base de datos para obtener la fecha del evento según el código del evento
    $consulta = "select convert(date,EventoLista.Fecha_Evento) as Fecha_Evento
    from EventoLista
    join PersonaLista
    on EventoLista.Nombre_Evento = PersonaLista.Nombre_Evento
    Where PersonaLista.Codigo_Acceso =" ."'".$codigoAcceso."'" ;

    // $this->db->select('FechaEvento');
    // $this->db->from('EventoLista');
    // $this->db->where('CodigoEvento', $codigoEvento);
    // $query = $this->db->get();
    $query = $this->db->query($consulta);

    if ($query->num_rows() > 0) {
        // Obtiene la fecha del evento si se encontró una fila en la consulta
        $row = $query->row();
        return $row->Fecha_Evento;
    } else {
        // Si no se encontró el evento, puedes retornar un valor por defecto o lanzar una excepción
        return null;
    }
}



    

}