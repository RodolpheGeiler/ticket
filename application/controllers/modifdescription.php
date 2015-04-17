<?php
class modifdescription extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('requetes');
  }
  function index()
  {

    $tid = $this->input->post('tid');
    // Setting Values For Tabel Columns
      $data = array(
        'tickets_description' => $this->input->post('description'),
        'tickets_date_modification' => strftime("%F %T")
        );

    // Transfering Data To Model
      $this->requetes->form_update("tickets_id", "Tickets", $data, $tid);

     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['result_display'] = $this->requetes->get_all_where('Tickets', 'Utilisateurs', '1');
     $data['closed'] = $this->requetes->get_all_where('Tickets', 'Utilisateurs', '4');
     $data['grade'] = $session_data['grade'];
     $this->load->helper('form');
     $this->load->view('header_view', $data);
     $this->load->view('side_view');
     $this->load->view('home_view', $data);
     $this->load->view('footer_view', $data);
  }
}
?>