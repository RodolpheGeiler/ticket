<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('ajoutcompte');
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['result_display'] = $this->ajoutcompte->get_all_where('Tickets', 'Users', '1');
     $data['result_technicien'] = $this->ajoutcompte->get_column("users_nom, users_id", "Users");
     $data['closed'] = $this->ajoutcompte->get_all_where('Tickets', 'Users', '4');
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

  function stats()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['reclamation_type'] = array('autres' => $this->ajoutcompte->get_count('autres'), 'transporteur' => $this->ajoutcompte->get_count('transporteur'), 'produits' => $this->ajoutcompte->get_count('produits'));
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

   function compte()
 {
   if($this->session->userdata('logged_in'))
   {
     $this->load->helper('form');
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $result = $this->ajoutcompte->get_all_where('Users', 'Tickets', '4');
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

   function ajoutcompte()
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

   function modifiercompte()
 {
   if($this->session->userdata('logged_in'))
   {
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
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

   function newticket()
 {
   if($this->session->userdata('logged_in'))
   {
     $this->load->helper('form');
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['grade'] = $session_data['grade'];
     $data['id'] = $session_data['id'];
     $result = $this->ajoutcompte->get_column("users_nom, users_id", "Users");
     $data['result_display'] = $result;
     $result = $this->ajoutcompte->get_column("reclamation_id, reclamation_titre", "Reclamation");
     $data['reclamation_infos'] = $result;
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

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

}

?>