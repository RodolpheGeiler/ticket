<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
   $this->load->model('requetes');
 }

 public function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['result_display'] = $this->requetes->get_all_where('Tickets', 'Utilisateurs', '1');
     $data['result_technicien'] = $this->requetes->get_column("utilisateurs_nom, utilisateurs_id", "Utilisateurs");
     $data['closed'] = $this->requetes->get_all_where('Tickets', 'Utilisateurs', '4');
     $data['grade'] = $session_data['grade'];
     $this->load->helper('form');
     $this->load->view('header_view', $data);
     $this->load->view('side_view');
     $this->load->view('home_view', $data);
     $this->load->view('footer_view', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

  public function stats()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['reclamations_type'] = array('autres' => $this->requetes->get_count('autres'), 'transporteur' => $this->requetes->get_count('transporteur'), 'produits' => $this->requetes->get_count('produits'));
     $this->load->view('header_view', $data);
     $this->load->view('side_view');
     $this->load->view('stats_view', $data);
     $this->load->view('footer_view', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

   public function compte()
 {
   if($this->session->userdata('logged_in'))
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
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

   public function ajoutcompte()
 {
   if($this->session->userdata('logged_in'))
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
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

   public function modifiercompte()
 {
   if($this->session->userdata('logged_in'))
   {
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
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

   public function newticket()
 {
   if($this->session->userdata('logged_in'))
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
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 public function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

}

?>