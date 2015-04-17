<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
 }

 public function index()
 {
   $this->load->helper(array('form'));
   $this->load->view('header_view');
   $this->load->view('login_view');
   $this->load->view('footer_view');
 }

}

?>