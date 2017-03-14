<?php
/* 
Controller: HomeController
Implemented by: Nagarjuna
*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pagescontroller extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('PagesDB_model', 'pageModel');
		$this->load->model('MainDB_model', 'mainModel');
		
		$this->load->library('ckeditor');
	    $this->load->library('ckfinder');
	    $this->ckeditor->basePath = base_url().'assets/front_styles/js/ckeditor/';	    
		/*$this->ckeditor->config['toolbar'] = array(
                array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
                                                    );*/
        $this->ckeditor->config['toolbar'] = 'Full';
		$this->ckeditor->config['language'] = 'en'; //it
		$this->ckeditor->config['width'] = '730px';
		$this->ckeditor->config['height'] = '300px';            
		$this->ckfinder->SetupCKEditor($this->ckeditor,base_url().'assets/front_styles/js/ckfinder/'); 
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
	
	public function createPage() {
		$data = $this->global_functions();	
		
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/create_page',$data);
		$this->load->view('admin/templates/admin_footer',$data);
	}	
	
	public function pages() {
		$data = $this->global_functions();
		$data['viewpages'] = $this->pageModel->getAllPages();
		
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/pages',$data);
		$this->load->view('admin/templates/admin_footer',$data);
	}
	
	public function pageAddAction() {
		$form_data = array(
			'page_title' => $this->input->post('page_title'),
			'content' => $this->input->post('page_description')	
		);

		$insert = $this->pageModel->insertPage($form_data);
		if($insert==1) {
			$this->session->set_flashdata('message', 'Course created successfully');
			redirect(base_url('admin/pages'), 'Location');
		}
	}
	
	public function pagedetails() {
		$data = $this->global_functions();
		$pid = $this->uri->segment(3);		
		$data['vwcourse'] = $this->pageModel->selectPage($pid);
		
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/edit_page',$data);
		$this->load->view('admin/templates/admin_footer',$data);
	}
	
	public function pageEditAction() {
		$sub_cat_id = $this->input->post('sub_category_name');
		if($sub_cat_id == ''){
			$sub_cat_id = $this->input->post('old_wsub_categoryid');
		}
		$form_data = array(
			'page_title' => $this->input->post('page_title'),
			'content' => $this->input->post('page_description')
		);
		$pid = $this->input->post('pid');
		
		$update = $this->pageModel->updatePage($form_data,$pid);
		if($update==1) {
			$this->session->set_flashdata('message', 'Page updated successfully');
			redirect(base_url('admin/pages'), 'Location');
		} else {
			$this->session->set_flashdata('message', 'Page updation Failed');
			redirect(base_url('admin/pages'), 'Location');
		}
	}
	
	public function deletepage() {
		$cid = $this->uri->segment(3);
		$delete = $this->pageModel->delPage($cid);
		if($delete==1) {
			$this->session->set_flashdata('message', 'Page deleted successfully');
			redirect(base_url('admin/pages'), 'Location');
		} else {
			$this->session->set_flashdata('message', 'Page deletion Failed');
			redirect(base_url('admin/pages'), 'Location');
		}
	}
}