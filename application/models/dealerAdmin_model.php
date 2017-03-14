<?php
/****************************************************************
* Class Name        : Admin Model 
* Description       : In this file all database actions related to Staff module will be handled.
* Author            : xxxxx
* Create Date       : 04/03/2013 (DD/MM/YYYY)
* Revision          :
* Modified by       : xxxxxx
* Modified Date     : (DD/MM/YYYY)
* Modified Reason   : xxxx xxxxxx
*****************************************************************/
class DealerAdmin_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/** Save User **/  
	public function saveDealerAdmin(){
		$data = $this->input->post();	
		//echo "<pre>";print_r($this->session->userdata);exit       
		$insert_data['first_name'] = $data['first_name'];
		$insert_data['last_name'] = $data['last_name'];
		$insert_data['phone_num'] = $data['phone'];		
		$insert_data['email'] = $data['email'];
		$insert_data['status'] = 'A';
		$insert_data['password'] = MD5($data['password']);
		$insert_data['date_created'] = date('Y-m-d H:i:s');
		$insert_data['created_by'] = $this->session->userdata['id'];		
		$this->db->insert('tbl_dealer_admins',$insert_data);
		return $this->db->insert_id();
	}	
	
	/** Update User **/  
	public function updateDealerAdmin(){
		$data = $this->input->post();	
        $insert_data['first_name'] = $data['first_name'];
		$insert_data['last_name'] = $data['last_name'];
		$insert_data['phone_num'] = $data['phone'];		
		$insert_data['email'] = $data['email'];		
		$insert_data['date_modified'] = date('Y-m-d H:i:s');
		$this->db->where('id',$data['id']);
		$this->db->update('tbl_dealer_admins',$insert_data); //echo $this->db->last_query();exit;
		
	}	
	
	 /********** All Companies ************/
        public function getDealerAdmins($sortorder,$direction)
		{
			$this->db->select(array('A.*','B.name as createdby'));
			$this->db->from('tbl_dealer_admins A');		
            $this->db->join('tbl_admin B','A.created_by = B.id','left');			
			$this->db->order_by($sortorder,$direction); 
			$query = $this->db->get();	
			if($query->num_rows()>0){
				return 	$query->result_array();
			}else{
				return array();
			}
		}
		
	/*** Get user details ****/
      public function getDealerAdminDetails($user_id)
		{
			$this->db->select(array('A.*'));
			$this->db->from('tbl_dealer_admins A');	
			$this->db->where('A.id',$user_id); 
			$query = $this->db->get();	
			if($query->num_rows()>0){
				return 	$query->row_array();
			}else{
				return array();
			}
	   }

    /**************Delete the Records of a Particular ID ***********/
	public function deleteDealerAdmin($id)
	{
		$query = $this->db->get_where('tbl_dealer_admins',array('id' => $id));
		$data = $query->row_array();
		if($data !='')
		{                        
			$this->db->where('id', $id);
			$this->db->delete('tbl_dealer_admins');
			return TRUE;
		}
		else
			return FALSE;
	}

    /*******************Change the Status for particular record in db ***************/
	public function changeStatus($id,$status)
	{
		$this->db->where('id',$id);
		$id =$this->db->update('tbl_dealer_admins',array("status"=>$status));
               // echo $this->db->last_query();exit;
		if($id)
			return $id;
	}
	
	public function checkAdminExistence($email){
		$query = $this->db->get_where('tbl_dealer_admins',array('email' => $email));
		$data = $query->row_array();
		return count($data);
	}
}
