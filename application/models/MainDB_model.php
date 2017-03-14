<?php
class MainDB_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function validateLogin() {
		$uname = $this->input->post('username');
		$pwd = md5($this->input->post('passwd'));
		
		$sql = "select * from tbl_admin_users_master where email=? and password=? and status=?";
		$query = $this->db->query($sql, array($uname,$pwd,'A'));
		$cnt = $query->num_rows();		
		
        if ($cnt == 1) {
			$row = $query->result_array();
			$uid = $row[0]['id'];
            return $uid;
        } else {
			return 0;
		}
	}
	
	public function getAdminDetails($userid) {
		$sql = "select * from tbl_admin_users_master where id=?";
		$query = $this->db->query($sql,array($userid));
        $cnt = $query->num_rows();
        if ($cnt > 0) {
            return $query->result_array();
        }
	}
	
	public function getPendingOrders($limitorders=0) {
		$sql = "select * from tbl_user_purchase_orders t1,tbl_users_master t2,tbl_user_login_accessinfo t3 where t1.userid=t3.rest_verification_key and t3.userid=t2.id and t1.order_status=? and t1.order_transaction_id!=0 order by t1.order_date_time desc";
		$query = $this->db->query($sql,array('P'));
        $cnt = $query->num_rows();
        if ($cnt > 0) {
            return $query->result_array();
        }
	}
	
	public function getConfirmOrders($limitorders=0) {
		$sql = "select * from tbl_user_purchase_orders t1,tbl_users_master t2,tbl_user_login_accessinfo t3 where t1.userid=t3.rest_verification_key and t3.userid=t2.id and t1.order_status=? and t1.order_transaction_id!=0 order by t1.order_date_time desc";
		$query = $this->db->query($sql,array('A'));
        $cnt = $query->num_rows();
        if ($cnt > 0) {
            return $query->result_array();
        }
	}
	
	public function getDispatchOrders($limitorders=0) {
		$sql = "select * from tbl_user_purchase_orders t1,tbl_users_master t2,tbl_user_login_accessinfo t3 where t1.userid=t3.rest_verification_key and t3.userid=t2.id and t1.order_status=? and t1.order_transaction_id!=0 order by t1.order_date_time desc";
		$query = $this->db->query($sql,array('D'));
        $cnt = $query->num_rows();
        if ($cnt > 0) {
            return $query->result_array();
        }
	}
	
	public function getCompletedOrders($limitorders=0) {
		//$sql = "select * from tbl_user_purchase_orders t1,tbl_users_master t2,tbl_user_login_accessinfo t3 where t1.userid=t3.rest_verification_key and t3.userid=t2.id and t1.order_status=? limit ?";
		$sql = "select * from tbl_user_purchase_orders t1,tbl_users_master t2,tbl_user_login_accessinfo t3 where t1.userid=t3.rest_verification_key and t3.userid=t2.id and t1.order_status=? order by t1.order_date_time desc";
		$query = $this->db->query($sql,array('C',$limitorders));
        $cnt = $query->num_rows();
        if ($cnt > 0) {
            return $query->result_array();
        }
	}
	
	public function getAllCourses() {
		$sql = "select * from tbl_courses t1,tbl_course_categories t2 where t1.category_id=t2.cat_id order by id asc";
		$query = $this->db->query($sql);
        $cnt = $query->num_rows();
        if ($cnt > 0) {
            return $query->result_array();
        }
	}
	
	public function selectCourseCategories() {
		$sql = "select * from tbl_course_categories order by cat_id asc";
		$query = $this->db->query($sql);
        $cnt = $query->num_rows();
        if ($cnt > 0) {
            return $query->result_array();
        }
	}
	
	public function insertCategories() {
		$category_name = $this->input->post('category_name');
		$category_ref_id = $this->input->post('category_ref_id');
		
		$check = "select * from tbl_course_categories where category_name=?";
		$querycheck = $this->db->query($check,array($category_name));
        $cntcheck = $querycheck->num_rows();
		if($cntcheck==0) {
			$sql = "insert into tbl_course_categories(category_name,category_ref_id)values(?,?)";
			$query = $this->db->query($sql,array($category_name,$category_ref_id));
			return ($this->db->affected_rows() != 1) ? 2 : 1;
		} else {
			return 0;
		}
	}
	
	public function updateCategories() {
		$category_name = $this->input->post('category_name1');
		$category_ref_id = $this->input->post('category_ref_id1');
		$category_ids = $this->input->post('category_ids');
		
		$check = "select * from tbl_course_categories where cat_id=?";
		$querycheck = $this->db->query($check,array($category_ids));
        $cntcheck = $querycheck->num_rows();
		if($cntcheck==1) {
			$sql = "update tbl_course_categories set category_name=?,category_ref_id=? where cat_id=?";
			$query = $this->db->query($sql,array($category_name,$category_ref_id,$category_ids));
			return ($this->db->affected_rows() != 1) ? 2 : 1;
		} else {
			return 0;
		}
	}
	
	public function selectCategory($catids) {
		$sql = "select * from tbl_course_categories where cat_id=?";
		$query = $this->db->query($sql,array($catids));
        $cnt = $query->num_rows();
        if ($cnt > 0) {
            return $query->result_array();
        }
	}
	
	
	public function deletecategory($catids) {
		$sqlcheck = "select * from tbl_product_sub_categories where parent_category_id=?";
		$querycheck = $this->db->query($sqlcheck,array($catids));
		$cntcheck = $querycheck->num_rows();

		if($cntcheck==0) {
			$sql = "delete from tbl_course_categories where cat_id=?";
			$query = $this->db->query($sql,array($catids));
			return ($this->db->affected_rows() != 1) ? 0 : 1;
		} else {
			return 2;
		}
	}
	
	public function selectSubCourseCategories() {
		$sql = "select * from tbl_product_sub_categories t1,tbl_course_categories t2 where t1.parent_category_id=t2.cat_id order by scid asc";
		$query = $this->db->query($sql);
        $cnt = $query->num_rows();
        if ($cnt > 0) {
            return $query->result_array();
        }
	}
	
	public function insertSubCategories() {
		$category_name = $this->input->post('category_name');
		$sub_category_name = $this->input->post('sub_category_name');
		
		$check = "select * from tbl_product_sub_categories where sub_category_name=?";
		$querycheck = $this->db->query($check,array($sub_category_name));
        $cntcheck = $querycheck->num_rows();
		if($cntcheck==0) {
			$sql = "insert into tbl_product_sub_categories(sub_category_name,parent_category_id)values(?,?)";
			$query = $this->db->query($sql,array($sub_category_name,$category_name));
			return ($this->db->affected_rows() != 1) ? 2 : 1;
		} else {
			return 0;
		}
	}
	
	public function selectSubCategory($subcatid) {
		$sql = "select * from tbl_product_sub_categories where scid=?";
		$query = $this->db->query($sql,array($subcatid));
        $cnt = $query->num_rows();
        if ($cnt > 0) {
            return $query->result_array();
        }
	}
	
	public function updateSubCategories() {
		$category_name = $this->input->post('category_name2');
		$sub_category_name = $this->input->post('sub_category_name2');
		$sub_category_ids = $this->input->post('sub_category_ids');
		
		$check = "select * from tbl_product_sub_categories where scid=?";
		$querycheck = $this->db->query($check,array($sub_category_ids));
        $cntcheck = $querycheck->num_rows();
		if($cntcheck==1) {
			$sql = "update tbl_product_sub_categories set sub_category_name=?,parent_category_id=? where scid=?";
			$query = $this->db->query($sql,array($sub_category_name,$category_name,$sub_category_ids));
			return ($this->db->affected_rows() != 1) ? 2 : 1;
		} else {
			return 0;
		}
	}
	
	public function deletesubcategory($scatids) {
		$sqlcheck = "select * from tbl_courses where sub_category_id=?";
		$querycheck = $this->db->query($sqlcheck,array($scatids));
		$cntcheck = $querycheck->num_rows();

		if($cntcheck==0) {
			$sql = "delete from tbl_product_sub_categories where scid=?";
			$query = $this->db->query($sql,array($scatids));
			return ($this->db->affected_rows() != 1) ? 0 : 1;
		} else {
			return 2;
		}
	}
	
	public function selectCourseCountries() {
		$sql = "select * from tbl_countries order by cun_id asc";
		$query = $this->db->query($sql);
        $cnt = $query->num_rows();
        if ($cnt > 0) {
            return $query->result_array();
        }
	}
	
	public function insertCountries() {
		$country_name = $this->input->post('country_name');
		$country_ref_id = $this->input->post('country_ref_id');
		
		$check = "select * from tbl_countries where country_name=?";
		$querycheck = $this->db->query($check,array($country_name));
        $cntcheck = $querycheck->num_rows();
		if($cntcheck==0) {
			$sql = "insert into tbl_countries(country_name,country_ref_id)values(?,?)";
			$query = $this->db->query($sql,array($country_name,$country_ref_id));
			return ($this->db->affected_rows() != 1) ? 2 : 1;
		} else {
			return 0;
		}
	}
	
	public function updateCountries() {		
		$country_name = $this->input->post('country_name1');
		$country_ref_id = $this->input->post('country_ref_id1');
		$country_ids = $this->input->post('country_ids');
		
		$check = "select * from tbl_countries where cun_id=?";
		$querycheck = $this->db->query($check,array($country_ids));
        $cntcheck = $querycheck->num_rows();
		if($cntcheck==1) {
			$sql = "update tbl_countries set country_name=?,country_ref_id=? where cun_id=?";
			$query = $this->db->query($sql,array($country_name,$country_ref_id,$country_ids));
			return ($this->db->affected_rows() != 1) ? 2 : 1;
		} else {
			return 0;
		}
	}
	
	public function selectCountry($catids) {
		$sql = "select * from tbl_countries where cun_id=?";
		$query = $this->db->query($sql,array($catids));
        $cnt = $query->num_rows();
        if ($cnt > 0) {
            return $query->result_array();
        }
	}	
	
	public function deletecountry($catids) {		
			$sql = "delete from tbl_countries where cun_id=?";
			$query = $this->db->query($sql,array($catids));
			return ($this->db->affected_rows() != 1) ? 0 : 1;		
	}
	
		
	public function selSubProductCategories($catid) {
		$sql = "select * from tbl_product_sub_categories t1,tbl_course_categories t2 where t1.parent_category_id=t2.cat_id and t1.parent_category_id=?";
		$query = $this->db->query($sql,array($catid));
        $cnt = $query->num_rows();
        if ($cnt > 0) {
            return $query->result_array();
        }
	}
	
	public function insertCourse($data) {
		$this->db->insert('tbl_courses', $data);
		return ($this->db->affected_rows() != 1) ? 0 : 1;
	}
	
	public function selectCourse($id) {
		$sql = "select * from tbl_courses where id=?";
		$query = $this->db->query($sql,array($id));
        $cnt = $query->num_rows();
        if ($cnt > 0) {
            return $query->result_array();
        }
	}
	
	public function selectCourseByid($id) {
		$result = $this->db->select('course_name')->from('tbl_courses')->where('id',$id)->get()->result();
		if(sizeof($result)>0){
		foreach($result as $value):
		return $value->course_name;
		endforeach;
		}
	}
	
	public function updateCourse($data,$prodid) {
		$this->db->where('id',$prodid);
		$this->db->update('tbl_courses', $data);
		return ($this->db->affected_rows() != 1) ? 0 : 1;
	}
	
	public function delCourse($cid) {
		$sql = "delete from tbl_courses_moredetails where course_id=?";
		$query = $this->db->query($sql,array($cid));
		$sql = "delete from tbl_courses where id=?";
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
	
	public function approveOrder($orid) {
		$sql2 = "update tbl_user_purchase_orders set order_status=? where orid=?";
		$query2 = $this->db->query($sql2,array('A',$orid));		
		return 1;
	}
	
	public function dsptchOrder($orid) {
		$sql2 = "update tbl_user_purchase_orders set order_status=? where orid=?";
		$query2 = $this->db->query($sql2,array('D',$orid));		
		return 1;
	}
	
	public function cmpltOrder($orid) {
		$sql2 = "update tbl_user_purchase_orders set order_status=? where orid=?";
		$query2 = $this->db->query($sql2,array('C',$orid));		
		return 1;
	}
	
	public function getLatestOrders(){
		$sql = "select t1.order_date_time,t1.order_transaction_id,t1.order_status,t2.course_name from tbl_user_purchase_orders t1 left join tbl_courses t2 on t1.product_id=t2.id where t1.order_transaction_id != 0 order by orid desc limit 0,8";
		$query = $this->db->query($sql);
		$cnt = $query->num_rows();
		if($cnt>0){
			return $query->result_array();
		}
	}

    public function getLatestProducts(){
		$sql = "select t1.id,t1.course_name,t1.course_price,t1.course_description,t2.course_image from tbl_courses t1 LEFT JOIN tbl_courses_moredetails t2 on t1.id=t2.course_id order by id desc limit 0,6";
		$query = $this->db->query($sql);
		$cnt = $query->num_rows();
		if($cnt > 0){
			return $query->result_array();
		}
	}	
}