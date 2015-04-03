<?php
class modifcompte extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('ajoutcompte');
  }
  function index()
  {

    $tid = $this->input->post('uid');
    // Setting Values For Tabel Columns
      $data = array(
        'grades_id' => $this->input->post('autorisation'),
        'users_modified' => strftime("%F %T"),
        'users_mail' => $this->input->post('email')
        );

    // Transfering Data To Model
      $this->ajoutcompte->form_update("users_id", "Users", $data, $tid);

     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $result = $this->ajoutcompte->get_all_table('Users');
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