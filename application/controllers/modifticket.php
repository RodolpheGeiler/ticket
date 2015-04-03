<?php
class modifticket extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('ajoutcompte');
  }
  function index()
  {

    $tid = $this->input->post('tid');
    // Setting Values For Tabel Columns
      $data = array(
        'tickets_priorite' => $this->input->post('priorite'),
        'tickets_status' => $this->input->post('statut'),
        'tickets_type' => $this->input->post('tickets_type'),
        'tickets_date_modification' => strftime("%F %T")
        );

    // Transfering Data To Model
      $this->ajoutcompte->form_update("tickets_id", "Tickets", $data, $tid);

     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['result_display'] = $this->ajoutcompte->get_all_where('Tickets', 'Users', '1');
     $data['closed'] = $this->ajoutcompte->get_all_where('Tickets', 'Users', '4');
     $data['grade'] = $session_data['grade'];
     $this->load->helper('form');
     $this->load->view('header_view', $data);
     $this->load->view('side_view');
     $this->load->view('home_view', $data);
     $this->load->view('footer_view', $data);
  }
}
?>