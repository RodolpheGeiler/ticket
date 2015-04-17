<?php
class addticket extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('requetes');
  }
  public function index()
  {
  // Including Validation Library
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="text-error">', '</div>');
  // Validating Title
    $this->form_validation->set_rules('description', 'Description', 'required|min_length[5]|max_length[255]');
    if ($this->form_validation->run() == FALSE)
    {
     $this->load->helper('form');
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['grade'] = $session_data['grade'];
     $data['id'] = $session_data['id'];
     $result = $this->requetes->get_column("utilisateurs_nom, utilisateurs_id", "Utilisateurs");
     $data['result_display'] = $result;
     $result = $this->requetes->get_column("reclamations_id, reclamations_titre", "Reclamations");
     $data['reclamations_infos'] = $result;
     $this->load->view('header_view', $data);
     $this->load->view('side_view');
     $this->load->view('newticket_view', $data);
     $this->load->view('footer_view', $data);
    } else {
    $titles = $this->requetes->get_column_where('reclamations_titre', 'Reclamations', 'reclamations_id = '.$this->input->post('title').'');
    foreach ($titles as $value) {
      $title = $value->reclamations_titre;
    }
    // Setting Values For Tabel Columns
      $data = array(
        'tickets_titre' => $title,
        'tickets_priorite' => $this->input->post('priorite'),
        'tickets_status' => $this->input->post('statut'),
        'tickets_description' => $this->input->post('description'),
        'utilisateurs_id' => $this->input->post('technicien'),
        'reclamations_id' => $this->input->post('title'),
        'tickets_type' => $this->input->post('type'),
        'tickets_date_ajout' => strftime("%F %T"),
        'tickets_date_modification' => strftime("%F %T")
        );
    // Transfering Data To Model
      $this->requetes->form_insert('Tickets', $data);
    // Loading View
     $this->load->helper('form');
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['grade'] = $session_data['grade'];
     $data['id'] = $session_data['id'];
     $result = $this->requetes->get_column("utilisateurs_nom, utilisateurs_id", "Utilisateurs");
     $data['result_display'] = $result;
     $result = $this->requetes->get_column("reclamations_id, reclamations_titre", "Reclamations");
     $data['reclamations_infos'] = $result;
     $this->load->view('header_view', $data);
     $this->load->view('side_view');
     $this->load->view('newticket_view', $data);
     $this->load->view('footer_view', $data);
    }
  }
}
?>