<?php
class addcompte extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('requetes');
  }

  public function index()
  {
  // Including Validation Library
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="text-error">', '</div>');
  // Validating Name Field
    $this->form_validation->set_rules('dname', 'Nom', 'required|min_length[5]|max_length[15]');
  // Validating Email Field
    $this->form_validation->set_rules('demail', 'Email', 'required|valid_email');
  // Validating Password Field
    $this->form_validation->set_rules('dpass', 'Password', 'required|matches[dconf]');
    $this->form_validation->set_rules('dconf', 'Password Confirmation', 'required');
    if ($this->form_validation->run() == FALSE)
    {
     $this->load->helper('form');
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['grade'] = $session_data['grade'];
     $this->load->view('header_view', $data);
     $this->load->view('side_view');
     $this->load->view('ajoutcompte_view', $data);
     $this->load->view('footer_view', $data);
    }
    else
    {
      if ($this->input->post('dauto') == "admin") {
        $auto = 1; 
      } else {
        $auto = 2;
      }
    // Setting Values For Tabel Columns
      $data = array(
        'utilisateurs_nom' => $this->input->post('dname'),
        'utilisateurs_mail' => $this->input->post('demail'),
        'utilisateurs_grade' => $auto,
        'utilisateurs_creation' => strftime("%F %T"),
        'utilisateurs_modifie' => strftime("%F %T"),
        'utilisateurs_motdepasse' => (MD5($this->input->post('dpass')))
        );
    // Transfering Data To Model
      $this->requetes->form_insert("Utilisateurs", $data);
    // Loading View
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
}
?>