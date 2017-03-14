<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profilecontroller extends CI_Controller {

    public function __construct() {
        parent::__construct();		
		$this->load->model('MainDB_model', 'mainModel');
		if( !$this->session->userdata('user_id') ) {
			redirect('index');
		}
    }
	
	public function global_functions() {
		$data['userid'] = $this->session->userdata('user_id');
		$limitorders = 5;
		$data['logged_user_details'] = $this->mainModel->getAdminDetails($data['userid']);
		$data['logged_user_name'] = $data['logged_user_details'][0]['name'];
		$data['countcourses'] = $this->mainModel->getAllCourses();
		$data['countcategories'] = $this->mainModel->selectCourseCategories();
		$data['countcountries'] = $this->mainModel->selectCourseCountries();
		return $data;
	}
	
	public function dashboard() {
		$data = $this->global_functions();
		$data['orders'] = $this->mainModel->getLatestOrders();
		$data['products'] = $this->mainModel->getLatestProducts();
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/dashboard',$data);
	}
	
	public function logout_page() {
		$this->session->sess_destroy();
		redirect(base_url('/'), 'Location');
	}
}