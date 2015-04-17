<?php
class modifcompte extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('requetes');
  }
  public function index()
  {

    $tid = $this->input->post('uid');
    // Setting Values For Tabel Columns
      $data = array(
        'utilisateurs_grade' => $this->input->post('autorisation'),
        'utilisateurs_modifie' => strftime("%F %T"),
        'utilisateurs_mail' => $this->input->post('email')
        );

    // Transfering Data To Model
      $this->requetes->form_update("utilisateurs_id", "Utilisateurs", $data, $tid);

     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $result = $this->requetes->get_all_table('Utilisateurs');
     $data['result_display'] = $result;
     $data['grade'] = $session_data['grade'];
     $data['id'] = $session_data['id'];
     $this->load->helper('form');
     $this->load->view('header_view', $data);
     $this->load->view('side_view');
     $this->load->view('modifiercompte_view', $data);
     $this->load->view('footer_view', $data);
  }
}
?>