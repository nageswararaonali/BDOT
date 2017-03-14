<?php
/* 
Controller: HomeController
Implemented by: PIVALUE
*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Homecontroller extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('MainDB_model', 'mainModel');
    }
	
	public function index() {
		$this->load->view('templates/header');
		$this->load->view('homePage');	
		$this->load->view('templates/footer');
	}
	
	public function loginAction() {
		$logincheck = $this->mainModel->validateLogin();
		if($logincheck==0) {
			$this->session->set_flashdata('loginfail', '<div class="alert alert-success">Login Failed. Invalid username/passwrod.</div>');
			redirect(base_url('admin'), 'Location');
		} else {			
			$this->session->set_userdata('user_id', $logincheck);
			redirect(base_url('admin/dashboard'), 'Location');
		}		
	}
	
	public function error_page() {
		$this->load->view('errorPage');
	}	
}