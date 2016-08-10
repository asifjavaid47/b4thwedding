<?php
class Users_list_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

    /**
    * Get category by his id
    * @param int $id 
    * @return array
    */
/*    SELECT
Count(tbl_project_posts.title)
FROM
tbl_project_posts
WHERE tbl_project_posts.userID ='20'

SELECT
COUNT(tbl_proposal.userId)
FROM
tbl_proposal
WHERE tbl_proposal.userId='20'
 */
    function show_user_list()
    {	
		$this->db->select('*');
	$this->db->where("(active='1' OR active='2')");
		$query = $this->db->get('tbl_users');
		 if($query->num_rows > 0){
			$row = $query->result_array();
			$allrecords = array();
			foreach ($row as $rows) 
							{
			$data = array(
						"ID"            => $rows['ID'],								
						"fName"            => $rows['fName'],								
						"lName"            => $rows['lName'],						
						"email"            => $rows['email'],							
						"country"            => $rows['country'],							
						"hourlyRate"            => $rows['hourlyRate'],							
						"active"            => $rows['active'],							
						"totalPostProject"            => $this->totalPostProject($rows['ID']),							
						"totalBids"            => $this->totalBids($rows['ID']),							
					); 
					$allrecords[] = $data;	
					}
					// print_r($data);
	// exit;
			 return $allrecords;			 
			 
			 }else
			 {
				return false;
			 }
    }
	
	
   
	function getProjectOfUser($userID){
			$this->db->select('*');
		$this->db->from('tbl_project_posts');					
		$this->db->where_in('userId', $userID);
		$query = $this->db->get();
		if ($query->num_rows() > 0) 
		{
			$rows = $query->result_array();							 
			return $rows;
	  }
	}
	
	function getBidsProjectOfUser($userID){
	$query = "SELECT
				tbl_project_posts.title,
				tbl_project_posts.ID
				FROM
				tbl_users
				INNER JOIN tbl_proposal ON tbl_users.ID = tbl_proposal.userId
				INNER JOIN tbl_project_posts ON tbl_project_posts.ID = tbl_proposal.projectId
				WHERE tbl_proposal.userId='$userID'";
$query = $this->db->query($query);
			// $this->db->select('*');
		// $this->db->from('tbl_proposal');					
		// $this->db->where_in('userId', $userID);
		// $query = $this->db->get();
		if ($query->num_rows() > 0) 
		{
			$rows     = $query->result_array();			
			
		 
		return $rows;
	  }
	}
   
	function totalBids($userID){
			$this->db->select('COUNT(tbl_proposal.userId) as totalBids');
		$this->db->from('tbl_proposal');					
		$this->db->where_in('userId', $userID);
		$query = $this->db->get();
		if ($query->num_rows() > 0) 
		{
			$rows     = $query->result_array();						
			
		 
		return $rows[0]['totalBids'];
	  }
	}
   
	function totalPostProject($userID){

		$this->db->select('Count(tbl_project_posts.title) as totalProject');
		$this->db->from('tbl_project_posts');					
		$this->db->where_in('userId', $userID);
		$query = $this->db->get();
		if ($query->num_rows() > 0) 
		{
		$rows     = $query->result_array();	
			
		return $rows[0]['totalProject'];
	  }
	}
	function delete_user($id){
		$data = array(
						'ID' => $id
					 );
		$this->db->where($data);
		$this->db->delete('tbl_users'); 
	}
	function active($id){
		$data = array(
						'ID' => $id
					 );
		$this->db->where($data);
		$this->db->set('active','1'); 
		$this->db->update('tbl_users'); 
	}
	function inactive($id){
		$data = array(
						'ID' => $id
					 );
		$this->db->where($data);
			$this->db->set('active','2'); 
		$this->db->update('tbl_users'); 
	}
 
}
?>