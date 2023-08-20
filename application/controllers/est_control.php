<?php
class est_control extends CI_Controller {
    public function index() {
        // Carga el modelo de estadisticas
        $this->load->model('est_model');

        // Obtiene los eventos desde el modelo
        $data['eventos'] = $this->est_model->obtenerEventos();

        // Carga la vista y pasa los datos
        $this->load->view('estadisticas', $data);
    }
}
?>
