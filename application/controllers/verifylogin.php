<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 public function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
   $this->load->helper(array('form'));
   $this->load->view('header_view');
   $this->load->view('login_view');
   $this->load->view('footer_view');
   }
   else
   {
     //Go to private area
     redirect('home', 'refresh');
   }

 }

 public function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('utilisateurs_nom');

   //query the database
   $result = $this->user->login($username, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->utilisateurs_id,
         'username' => $row->utilisateurs_nom,
         'grade' => $row->utilisateurs_grade,
         'email' => $row->utilisateurs_mail,
         'uid' => $row->utilisateurs_id
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Mauvais nom d\'utilisateur ou mot de passe');
     return false;
   }
 }
}
?>