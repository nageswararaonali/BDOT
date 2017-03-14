<?php
class PagesDB_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	
	public function getAllPages() {
		$sql = "select * from tbl_content_pages order by page_title asc";
		$query = $this->db->query($sql);
        $cnt = $query->num_rows();
        if ($cnt > 0) {
            return $query->result_array();
        }
	}
		
	public function insertPage($data) {
		$this->db->insert('tbl_content_pages', $data);
		return ($this->db->affected_rows() != 1) ? 0 : 1;
	}
	
	public function selectPage($pid) {
		$sql = "select * from tbl_content_pages where cid=?";
		$query = $this->db->query($sql,array($pid));
        $cnt = $query->num_rows();
        if ($cnt > 0) {
            return $query->result_array();
        }
	}
	
	public function selectPageByid($id) {
		$result = $this->db->select('course_name')->from('tbl_courses')->where('id',$id)->get()->result();
		if(sizeof($result)>0){
		foreach($result as $value):
		return $value->course_name;
		endforeach;
		}
	}
	
	public function updatePage($data,$prodid) {
		$this->db->where('cid',$prodid);
		$this->db->update('tbl_content_pages', $data);
		return ($this->db->affected_rows() != 1) ? 0 : 1;
	}
	
	public function delPage($cid) {
		$sql = "delete from tbl_content_pages where cid=?";
		$query = $this->db->query($sql,array($cid));
		return ($this->db->affected_rows() != 1) ? 0 : 1;
	}
	
	public function getuploadedImages($id) {
		$sql = "select * from tbl_courses_moredetails where course_id=?";
		$query = $this->db->query($sql,array($id));
		$cnt = $query->num_rows();
        if ($cnt > 0) {
            return $query->result_array();
        }
	}
	
	public function getExtension($str)
	{
		$i = strrpos($str,".");
		if (!$i) { return ""; }
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}
	
	public function getImagesUploaded() {
		$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
		$courseid = $this->input->post('courseid');
		$coursecode = $this->input->post('coursecode');
		$image_type = $this->input->post('image_type');
		$uploaddir = "assets/course_images/"; //a directory inside
		if(@$_FILES['course_home_image']['name'] && $_FILES['course_home_image']['name'] != NULL){
			$img = $_FILES['course_home_image'];
		}else if(@$_FILES['course_feature_image'] && $_FILES['course_feature_image']['name'] != NULL){
			$img = $_FILES['course_feature_image'];
		}else{
			@$img = $_FILES['course_image'];
		}
		foreach ($img['name'] as $name => $value)
		{
			$filename = stripslashes($img['name'][$name]);
			$size=filesize($img[$name]);
			//get the extension of the file in a lower case format
			$ext = $this->getExtension($filename);
			$ext = strtolower($ext);
     	
		if(in_array($ext,$valid_formats))
		{
			if ($size < (MAX_SIZE*1024))
			{
				$time = time();
				$image_name=$time.'_'.$filename;
				echo "<img src='".base_url().$uploaddir.$image_name."' class='imgList'>";
				$newname=$uploaddir.$image_name;

				if (move_uploaded_file($img['tmp_name'][$name], $newname)) 
				{
					mysql_query("INSERT INTO tbl_courses_moredetails(course_id,course_image,image_type)VALUES('$courseid','$image_name','$image_type')");
				}
				else
				{
					echo '<span class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
				}
			}
			else
			{
			echo '<span class="imgList">You have exceeded the size limit!</span>';
			}       
		}
			else
			{ 
			echo '<span class="imgList">Unknown extension!</span>';
			}           
		}
	}
	
	public function getCourseImagesUploaded() {
		$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
		$courseid = $this->input->post('courseid');
		$coursecode = $this->input->post('coursecode');
		$uploaddir = "assets/course_images/"; //a directory inside
		foreach ($_FILES['photos']['name'] as $name => $value)
		{
			$filename = stripslashes($_FILES['photos']['name'][$name]);
			$size=filesize($_FILES['photos']['tmp_name'][$name]);
			//get the extension of the file in a lower case format
			$ext = $this->getExtension($filename);
			$ext = strtolower($ext);
     	
		if(in_array($ext,$valid_formats))
		{
			if ($size < (MAX_SIZE*1024))
			{
				$image_name=$coursecode.'_'.$filename;
				echo "<img src='".base_url().$uploaddir.$image_name."' class='imgList'>";
				$newname=$uploaddir.$image_name;

				if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) 
				{
					mysql_query("INSERT INTO tbl_courses_moredetails(course_id,course_image)VALUES('$courseid','$image_name')");
				}
				else
				{
					echo '<span class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
				}
			}
			else
			{
			echo '<span class="imgList">You have exceeded the size limit!</span>';
			}       
		}
			else
			{ 
			echo '<span class="imgList">Unknown extension!</span>';
			}           
		}
	}
	
	
}