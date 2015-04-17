<?php
class delcompte extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('requetes');
  }
  function index()
  {

    $uid = $this->input->post('uid');

    $this->requetes->del_user($uid);

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