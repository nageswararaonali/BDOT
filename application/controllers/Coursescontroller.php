<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Coursescontroller extends CI_Controller {

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
	
	public function courses() {
		$data = $this->global_functions();
		$data['viewcourses'] = $this->mainModel->getAllCourses();
		
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/courses',$data);
		$this->load->view('admin/templates/admin_footer',$data);
	}
	
	public function CompletedOrders() {
		$data = $this->global_functions();
		$data['viewproducts'] = $this->mainModel->getCompletedOrders();
		
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/courseorders',$data);
	}
	
	public function PendingOrders() {
		$data = $this->global_functions();
		$data['viewproducts'] = $this->mainModel->getPendingOrders();
		
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/courseorders',$data);
	}
	
	public function ConfirmOrders() {
		$data = $this->global_functions();
		$data['viewproducts'] = $this->mainModel->getConfirmOrders();
		
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/courseorders',$data);
	}
	public function DispatchOrders() {
		$data = $this->global_functions();
		$data['viewproducts'] = $this->mainModel->getDispatchOrders();
		
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/courseorders',$data);
	}
	
	public function createCourse() {
		$data = $this->global_functions();
		$data['course_categories'] = $this->mainModel->selectCourseCategories();
		
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/create_course',$data);
		$this->load->view('admin/templates/admin_footer',$data);
	}
	
	public function getSubCategories() {
		$category = $this->input->post('catid');
		$sub_prod_categories = $this->mainModel->selSubProductCategories($category);
		if(count($sub_prod_categories)>0) {
			$res='<div class="form-group"><label for="inputPassword3" class="col-sm-4 control-label">Product Sub-Category</label><div class="col-sm-6">';
			$res.='<select class="form-control" name="sub_category_name" id="sub_category_name">';
			$res.='<option value="">SELECT SUBCATEGORY</option>';
			foreach($sub_prod_categories as $spcategories) {
				$res.='<option value="'.$spcategories['scid'].'">'.$spcategories['sub_category_name'].'</option>';
			}
			$res.='</select>';
			$res.='</div></div>';
		} else {
			$res='';
		}
		echo $res;
	}
	
	public function courseAddAction() {
		$form_data = array(
			'category_id' => $this->input->post('category_name'),
			'sub_category_id' => $this->input->post('sub_category_name'),			
			'course_code' => $this->input->post('course_code'),
			'course_name' => $this->input->post('course_name'),
			'course_description' => $this->input->post('course_description'),
			'course_features' => $this->input->post('course_features'),
			'course_duration' => $this->input->post('course_duration'),
			'course_price' => $this->input->post('course_price'),				
			'course_start_date' => $this->input->post('course_start_date'),
			'course_end_date' => $this->input->post('course_end_date'),
			'created_date' => date('Y-m-d h:i:s')
		);

		$insert = $this->mainModel->insertCourse($form_data);
		if($insert==1) {
			$this->session->set_flashdata('message', 'Course created successfully');
			redirect(base_url('admin/courses'), 'Location');
		}
	}
	
	public function coursedetails() {
		$data = $this->global_functions();
		$prdid = $this->uri->segment(3);
		$data['course_categories'] = $this->mainModel->selectCourseCategories();
		$data['sub_course_categories'] = $this->mainModel->selectSubCourseCategories();
		$data['vwcourse'] = $this->mainModel->selectCourse($prdid);
		
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/edit_course_page',$data);
		$this->load->view('admin/templates/admin_footer',$data);
	}
	
	public function courseEditAction() {
		$sub_cat_id = $this->input->post('sub_category_name');
		if($sub_cat_id == ''){
			$sub_cat_id = $this->input->post('old_wsub_categoryid');
		}
		$form_data = array(
			'category_id' => $this->input->post('category_name'),
			'sub_category_id' => $sub_cat_id,			
			'course_code' => $this->input->post('course_code'),
			'course_name' => $this->input->post('course_name'),
			'course_description' => $this->input->post('course_description'),
			'course_features' => $this->input->post('course_features'),
			'course_duration' => $this->input->post('course_duration'),
			'course_price' => $this->input->post('course_price'),			
			'course_start_date' => $this->input->post('course_start_date'),
			'course_end_date' => $this->input->post('course_end_date')
		);
		$prodid = $this->input->post('productid');
		
		$update = $this->mainModel->updateCourse($form_data,$prodid);
		if($update==1) {
			$this->session->set_flashdata('message', 'Course updated successfully');
			redirect(base_url('admin/courses'), 'Location');
		} else {
			$this->session->set_flashdata('message', 'Course updation Failed');
			redirect(base_url('admin/courses'), 'Location');
		}
	}
	
	public function deletecourse() {
		$cid = $this->uri->segment(3);
		$delete = $this->mainModel->delCourse($cid);
		if($delete==1) {
			$this->session->set_flashdata('message', 'Course deleted successfully');
			redirect(base_url('admin/courses'), 'Location');
		} else {
			$this->session->set_flashdata('message', 'Course deletion Failed');
			redirect(base_url('admin/courses'), 'Location');
		}
	}
	
	public function coursegallery() {
		$data = $this->global_functions();
		$cid = $this->uri->segment(2);
		$data['course_categories'] = $this->mainModel->selectCourseCategories();
		$data['sub_course_categories'] = $this->mainModel->selectSubCourseCategories();
		$data['vwcourse'] = $this->mainModel->selectCourse($cid);
		
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/course_gallery_page',$data);
	}
	
	public function photosAction() {
		$insert = $this->mainModel->getImagesUploaded();
	}
	
	public function approveorder() {
		$ordid = $this->uri->segment(2);
		$cnf = $this->mainModel->approveOrder($ordid);
		if($cnf==1) {
			$this->session->set_flashdata('message', 'Order confirm successfully');
			redirect(base_url('admin/pendingorders'), 'Location');
		} else {
			$this->session->set_flashdata('message', 'Order confirm  Failed');
			redirect(base_url('admin/pendingorders'), 'Location');
		}
	}
	public function dptchorder() {
		$ordid = $this->uri->segment(2);
		$cnf = $this->mainModel->dsptchOrder($ordid);
		if($cnf==1) {
			$this->session->set_flashdata('message', 'Order dispatch successfully');
			redirect(base_url('admin/confirmorders'), 'Location');
		} else {
			$this->session->set_flashdata('message', 'Order dispatch  Failed');
			redirect(base_url('admin/confirmorders'), 'Location');
		}
	}
	
	public function cmpltorder() {
		$ordid = $this->uri->segment(2);
		$cnf = $this->mainModel->cmpltOrder($ordid);
		if($cnf==1) {
			$this->session->set_flashdata('message', 'Order complete successfully');
			redirect(base_url('admin/dispatchorders'), 'Location');
		} else {
			$this->session->set_flashdata('message', 'Order complete Failed');
			redirect(base_url('admin/dispatchorders'), 'Location');
		}
	}
	
	public function getAllOrders() {
		
	}
}