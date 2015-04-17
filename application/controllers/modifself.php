<?php
class modifself extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('requetes');
    $this->load->model('user','',TRUE);
  }
  function index()
  {
  // Including Validation Library
    $this->load->library('form_validation');
  // Validating Password Field
    $this->form_validation->set_rules('oldpass', 'Old Password', 'required|callback_check_database');
    $this->form_validation->set_rules('newpass', 'New Password', 'matches[confpass]|min_length[5]|max_length[15]');
    $this->form_validation->set_rules('confpass', 'Password Confirmation');


    if ($this->form_validation->run() == FALSE)
    {
     $this->load->helper('form');
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $result = $this->requetes->get_all_where('Utilisateurs', 'Tickets', '4');
     $data['result_display'] = $result;
     $data['grade'] = $session_data['grade'];
     $data['email'] = $session_data['email'];
     $data['uid'] = $session_data['uid'];
     $this->load->view('header_view', $data);
     $this->load->view('side_view');
     $this->load->view('compte_view', $data);
     $this->load->view('footer_view', $data);
    } else {
      $uid = $this->input->post('uid');
      $data = array(
        'users_modified' => strftime("%F %T"),
        'utilisateurs_mail' => $this->input->post('email')
      );
      if ($this->input->post('newpass')) {
        $data['utilisateurs_password'] = (MD5($this->input->post('newpass')));
      }
    // Transfering Data To Model
      $this->requetes->form_update("utilisateurs_id", "Utilisateurs", $data, $uid);

     redirect('home', 'refresh');
    }
  }

   function check_database($oldpass)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->user->login($username, $oldpass);

   if($result)
   {
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Mot de passe incorrect');
     return false;
   }
 }
}
?>