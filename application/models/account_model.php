<?php
class Account_model extends CI_Model {


	public function save_creditcard_info($data)
	{
		
			$user_id =$this->session->userdata('userID');
			
			$where = array(
				'userID = ' => $user_id,
				'accountType ='  =>'creditcard'
			);
			$this->db->select('*');
			$this->db->from('tbl_acounts_information');
			$this->db->where($where); 
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$this->db->update('tbl_acounts_information', $data, $where);
			}else
			{
			$insert = $this->db->insert('tbl_acounts_information', $data);
			}
		
	} 
	
	public function save_bank_detail($data)
	{
		
			$user_id =$this->session->userdata('userID');
			
			$where = array(
				'userID = ' => $user_id,
				'accountType ='  =>'bank'
			);
			$this->db->select('*');
			$this->db->from('tbl_acounts_information');
			$this->db->where($where); 
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$this->db->update('tbl_acounts_information', $data, $where);
			}else
			{
			$insert = $this->db->insert('tbl_acounts_information', $data);
			}
		
	}
	
	public function savepaypal_info($data)
	{
		
			$user_id =$this->session->userdata('userID');
			
			$where = array(
				'userID = ' => $user_id,
				'accountType ='  =>'paypal'
			);
			$this->db->select('*');
			$this->db->from('tbl_acounts_information');
			$this->db->where($where); 
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$this->db->update('tbl_acounts_information', $data, $where);
			}else
			{
			$insert = $this->db->insert('tbl_acounts_information', $data);
			}
		
	}  
	
	
	
	public function get_acount_info($type){
		
			$user_id =$this->session->userdata('userID');
			
			$where = array(
				'userID = ' => $user_id,
				'accountType ='  =>$type
			);
			$this->db->select('*');
			$this->db->from('tbl_acounts_information');
			$this->db->where($where); 
			$query = $this->db->get();
			
			 return $query->row_array();
			
		}
	public function getCountries()
	{
		$query = $this->db->get('countries');
		return $query->result();
		
	}
	
	
	public function addDefaultAccount()
	{
		
			$user_id =$this->session->userdata('userID');
			
			$default	=	$this->input->post('default');
			$backup		=	$this->input->post('backup');
			
			
			
			
			$unsetData = array(
					'default'  =>'',
					'backup'  =>'',
			);
			
			$this->db->update('tbl_acounts_information', $unsetData, array('userID = ' => $user_id));
			
			$where = array(
				'userID = ' => $user_id,
				'accountType ='  =>$default
			);
			$data = array(
					'default'  =>1
			);
			
				$this->db->update('tbl_acounts_information', $data, $where);
				
				
			$where1 = array(
				'userID = ' => $user_id,
				'accountType ='  =>$backup
			);
			$data1 = array(
					'backup'  =>1
			);
			$this->db->update('tbl_acounts_information', $data1, $where1);
			
			
		
	} 
	
		
}
	
