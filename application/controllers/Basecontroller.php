<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Basecontroller extends CI_Controller {

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
		return $data;
	}
	
	public function coursecategories() {
		$data = $this->global_functions();
		$data['course_categories'] = $this->mainModel->selectCourseCategories();
		$data['sub_course_categories'] = $this->mainModel->selectSubCourseCategories();
		
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/course_categories',$data);
	}
	
	public function categoryAddAction() {
		$insert = $this->mainModel->insertCategories();
		if($insert==1) {
			$this->session->set_flashdata('message', 'Category Created successfully');
			redirect(base_url('coursecategories'), 'Location');
		} else if($insert==2) {
			$this->session->set_flashdata('message', 'Failed to create the category');
			redirect(base_url('coursecategories'), 'Location');
		} else if($insert==0) {
			$this->session->set_flashdata('message', 'Category Name Already Exists');
			redirect(base_url('coursecategories'), 'Location');
		} else {}
	}
	
	public function selCategory() {
		$catids = $this->input->post('ctid');
		$resultsArr = $this->mainModel->selectCategory($catids);
		echo $resultsArr[0]['category_name'].'#'.$resultsArr[0]['category_ref_id'];
	}
	
	public function categoryeditAction() {
		$insert = $this->mainModel->updateCategories();
		if($insert==1) {
			$this->session->set_flashdata('message', 'Category Updated successfully');
			redirect(base_url('coursecategories'), 'Location');
		} else if($insert==2) {
			$this->session->set_flashdata('message', 'Failed to update the category');
			redirect(base_url('coursecategories'), 'Location');
		} else {}
	}
	
	public function delCategoryAction() {
		$catids = $this->uri->segment(2);		
		$delete = $this->mainModel->deletecategory($catids);
		if($delete==1) {
			$this->session->set_flashdata('message', 'Category Deleted successfully');
			redirect(base_url('coursecategories'), 'Location');
		} else if($delete==2) {
			$this->session->set_flashdata('message', 'Failed to delete the category, sub-categories are defined under this category');
			redirect(base_url('coursecategories'), 'Location');
		} else {
			$this->session->set_flashdata('message', 'Failed to delete the category');
			redirect(base_url('coursecategories'), 'Location');
		}
	}
	
	public function subcategoryAddAction() {
		$insert = $this->mainModel->insertSubCategories();
		if($insert==1) {
			$this->session->set_flashdata('message', 'Sub Category Created successfully');
			redirect(base_url('coursecategories'), 'Location');
		} else if($insert==2) {
			$this->session->set_flashdata('message', 'Failed to create the sub category');
			redirect(base_url('coursecategories'), 'Location');
		} else if($insert==0) {
			$this->session->set_flashdata('message', 'Sub Category Name Already Exists');
			redirect(base_url('coursecategories'), 'Location');
		} else {}
	}
	
	public function subcategoryeditAction() {
		$insert = $this->mainModel->updateSubCategories();

		if($insert==1) {
			$this->session->set_flashdata('message', 'Category Updated successfully');
			redirect(base_url('coursecategories'), 'Location');
		} else if($insert==2) {
			$this->session->set_flashdata('message', 'Failed to update the category');
			redirect(base_url('coursecategories'), 'Location');
		} else {}
	}
	
	public function selSubCategory() {
		$subcatid = $this->input->post('subcatid');
		$resultsArr = $this->mainModel->selectSubCategory($subcatid);
		echo $resultsArr[0]['sub_category_name'].'#'.$resultsArr[0]['parent_category_id'];
	}
	
	public function delSubCategoryAction() {
		$scatids = $this->uri->segment(2);		
		$delete = $this->mainModel->deletesubcategory($scatids);
		if($delete==1) {
			$this->session->set_flashdata('message', 'Sub Category Deleted successfully');
			redirect(base_url('coursecategories'), 'Location');
		} else if($delete==2) {
			$this->session->set_flashdata('message', 'Failed to delete the sub category, courses are defined under this sub category');
			redirect(base_url('coursecategories'), 'Location');
		} else {
			$this->session->set_flashdata('message', 'Failed to delete the sub category');
			redirect(base_url('coursecategories'), 'Location');
		}
	}
}