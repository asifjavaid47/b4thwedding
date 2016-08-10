<?php

class Admin_model extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $user_name
    * @param string $password
    * @return void
    */
	function validate($user_name, $password)
	{
		$this->db->where('user_name', $user_name);
		$this->db->where('pass_word', $password);
		$query = $this->db->get('membership');
		
		if($query->num_rows == 1)
		{
			return $query->result_array();
		}else
		{
			return 'no';
		}		
	}

    /**
    * Serialize the session data stored in the database, 
    * store it in a new array and return it to the controller 
    * @return array
    */
	function get_db_session_data()
	{
		$query = $this->db->select('user_data')->get('ci_sessions');
		$user = array(); /* array to store the user data we fetch */
		foreach ($query->result() as $row)
		{
		    $udata = unserialize($row->user_data);
		    /* put data in array using username as key */
		    $user['user_name'] = $udata['user_name']; 
		    $user['is_logged_in'] = $udata['is_logged_in']; 
		}
		return $user;
	}
	
    /**
    * Store the new user's data into the database
    * @return boolean - check the insert
    */	
	function addSubAdmin()
	{
		

			$new_member_insert_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email_addres' => $this->input->post('email_address'),			
				'user_name' => $this->input->post('user_name'),
				'adminType' => 'subAdmin',
				'pass_word' => md5($this->input->post('password'))						
			);
			$insert = $this->db->insert('membership', $new_member_insert_data);
		    return $insert;
		
	      
	}//create_member
	
	function totalUsers(){

		$this->db->select('Count(ID) as totalUsers');
		$this->db->from('tbl_users');
		$this->db->where("(active='1' OR active='2')");
		$query = $this->db->get();
		if ($query->num_rows() > 0) 
		{
		$rows     = $query->result_array();	
			
		return $rows[0]['totalUsers'];
	  }
	}
	function totalProject(){

		$this->db->select('Count(tbl_project_posts.title) as totalProject');
		$this->db->from('tbl_project_posts');	
		$query = $this->db->get();
		if ($query->num_rows() > 0) 
		{
		$rows     = $query->result_array();	
			
		return $rows[0]['totalProject'];
	  }
	}
	function totalCancelDispute(){

		$this->db->select('Count(cancelRefndDsputeID) as totalCancelDispute');
		$this->db->from('tbl_wr_cancelrefnddsputeproject');	
		$this->db->where("(dispute='1')");
		$query = $this->db->get();
		if ($query->num_rows() > 0) 
		{
		$rows     = $query->result_array();	
			
		return $rows[0]['totalCancelDispute'];
	  }
	}
	function totalMessage(){

		$this->db->select('Count(notificationID) as totalnotification');
		$this->db->from('tbl_notification');	
		$this->db->where("(userTypes='admin')");
		$query = $this->db->get();
		if ($query->num_rows() > 0) 
		{
		$rows     = $query->result_array();	
			
		return $rows[0]['totalnotification'];
	  }
	}
	
function showAdminList()
    {	
		$this->db->select('*');
		$this->db->where("(admintype!='superAdmin')");
		$query = $this->db->get('membership');
		 if($query->num_rows > 0){
			$row = $query->result_array();
			$allrecords = array();
			foreach ($row as $rows) 
							{
			$data = array(
						"ID"            		=> $rows['id'],								
						"first_name"            => $rows['first_name'],								
						"last_name"            	=> $rows['last_name'],						
						"email_addres"          => $rows['email_addres'],							
						"user_name"            	=> $rows['user_name']						
												
					); 
					$allrecords[] = $data;	
					}
					
			 return $allrecords;			 
			 
			 }else
			 {
				return false;
			 }
    }
	
	
		function delete_sub_admin($id){

		$this->db->where("(ID ='$id' AND admintype!='superAdmin')");
		$this->db->delete('membership'); 
	}
	
function checkUsername($username)
	{
		$this->db->where('user_name', $username);
		$query = $this->db->get('membership');
		 if($query->num_rows > 0){
			 return false;
			 }else
			 {
			 	return true;
			 }
	}
	function getAdmIninfo($id)
	{
		$this->db->select('*');
		$this->db->where("(admintype!='superAdmin')");
		$this->db->where("(id='$id')");
		$query = $this->db->get('membership');
		$rows = $query->result_array();
		return $rows;
	}
	
	
	function updateSubAdmin($id)
	{
		

			$new_member_insert_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' 	=> $this->input->post('last_name'),
				'email_addres' => $this->input->post('email_address'),			
			);
			$this->db->where(array("id" => $id));
            $this->db->set($new_member_insert_data);
			if($this->input->post('password')!='')
			{
				 $this->db->set('pass_word', md5($this->input->post('password')));
			}
            $this->db->update('membership');
		
	      
	}
	
	
}

