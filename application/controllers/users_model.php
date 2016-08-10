<?php

class Users_model extends CI_Model {
	
 public function __construct() {
        parent::__construct();
		$this->load->library('encrypt');

    }
	
	
function verifyLogin($userName,$password1)
 {
$password =md5($password1);
  $this->db->where("userName",$userName);
  $this->db->where("password",$password);
  $query = $this->db->get("tbl_users");
  //$query = $query->result_array();
  if($query->num_rows()>0)
  {
   
   $row = $query->result_array();   
 
 $newdata = array(
      'ID'  => $row[0]['ID'],
      'fName'   => $row[0]['fName'],
	  'lName'   => $row[0]['lName'],
      'email'   => $row[0]['email'],
	  'active'   => $row[0]['active'],
    );
	
	return ($newdata);
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
	function createFreeLanceUser()
	{
		

		$this->db->where('userName', $this->input->post('userName'));
		$query = $this->db->get('tbl_users');

        if($query->num_rows > 0){
        	echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>';
			  echo "Username already taken";	
			echo '</strong></div>';
		}else{

			$data = array(
				'fName' 	=> $this->input->post('fName'),
				'lName' 	=> $this->input->post('lName'),
				'email' 	=> $this->input->post('email'),			
				'userName' 	=> $this->input->post('userName'),
				'password' 	=> md5($this->input->post('password')),
				'userType' 	=> 'Freelancer',
				'createdDate' 	=> date('Y-m-d')					
			);
					
			$this->db->insert('tbl_users', $data);
		    return $this->db->insert_id();
		}
	      
	}//create_member
	
	
	function create_project_user()
	{

		$this->db->where('userName', $this->input->post('userName'));
		$query = $this->db->get('tbl_users');

        if($query->num_rows > 0){
        	echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>';
			  echo "Username already taken";	
			echo '</strong></div>';
		}else{

			$data = array(
				'fName' 		=> $this->input->post('fName'),
				'lName' 		=> $this->input->post('lName'),
				'email' 		=> $this->input->post('email'),			
				'userName' 		=> $this->input->post('userName'),
				'password' 		=> md5($this->input->post('password')),
				'country' 		=> $this->input->post('country'),	
				'accountType'	=> $this->input->post('accountType'),
				'hearAbout' 	=> $this->input->post('hearAbout'),
				'userType' 		=> 'Projects',
				'createdDate' 	=> date('Y-m-d')							
			);
			$this->db->insert('tbl_users', $data);
			 return $this->db->insert_id();
			
		}
	      
	}
	
	function checkUsername($username)
	{
		$this->db->where('userName', $username);
		$query = $this->db->get('tbl_users');
		 if($query->num_rows > 0){
			 return false;
			 }else
			 {
			 	return true;
			 }
	}
	
function isEmailExistAjax($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('tbl_users');
		 if($query->num_rows > 0){
			 return false;
			 }else
			 {
			 	return true;
			 }
	}
	
	
	function getCountries()
	{
		$query = $this->db->get('countries');
		return $query->result();
		
	}
function forgetUserName($email)
	{
		$this->db->select('userName');
		$this->db->where('email', $email);
		$query = $this->db->get('tbl_users');
		 if($query->num_rows > 0){
			 return $query->result_array();
			 }else
			 {
			 	return 'not_exist';
			 }
	}
function forgotPassword($email)
{
	$this->db->select('password');
	$this->db->where('email', $email);
	$query = $this->db->get('tbl_users');
		$query = $query->result();
        return $query;
}
function freelancerPublicView($user_id)
{
	// if(empty($id)) {
	 // $user_id =$this->session->userdata('userID');
	 // }
	 // else {
	 // $user_id =$id;
	 // }
	$this->db->select();
	$this->db->from('tbl_users'); 
	$this->db->where('ID',$user_id);
	$query = $this->db->get();
	return $query->result();

}

public function myTotalEarning()
{
	
	 $user_id =$this->session->userdata('userID');
		$query= "SELECT
					tbl_project_posts.title,
					tbl_project_posts.hourlyRate,
					tbl_project_posts.fixedBudget,
					tbl_paymentrequest.`status`,
					tbl_users.fName,
					tbl_proposal.myEarning,
					
					SUM( tbl_proposal.billedToClient ) AS total
					FROM
					tbl_paymentrequest
					INNER JOIN tbl_project_posts ON tbl_project_posts.ID = tbl_paymentrequest.projectID
					INNER JOIN tbl_users ON tbl_users.ID = tbl_paymentrequest.receiverID
					INNER JOIN tbl_proposal ON tbl_users.ID = tbl_proposal.userId AND tbl_project_posts.ID = tbl_proposal.projectId
					WHERE tbl_users.ID='$user_id' AND tbl_paymentrequest.`status` ='1'";
						$query = $this->db->query($query);

						if ($query->num_rows() > 0)
						{
							
							$total ='';
							   $rows = $query->result();
						 foreach ($rows as $row) {
										  
									$total = $row->total;
											
						
						}
						}
						return $total;
						// print_r($total);
						// exit;

}

function freelancerProfile()
{
	
	 $user_id =$this->session->userdata('userID');
	
	$this->db->select();
	$this->db->from('tbl_users'); 
	// $this->db->join('tbl_users_skills', 'tbl_users_skills.userID=tbl_users.ID');
	$this->db->where('ID',$user_id);
	 // $this->db->group_by('tbl_users_skills.userID'); 
	$query = $this->db->get();
	return $query->result();

	/* $user_id =$this->session->userdata('userID');
	$this->db->select('*');
	$this->db->where('ID', $user_id);
	$query = $this->db->get('tbl_users');
	 if($query->num_rows > 0){
	 	 $rows = $query->result();
						   $inboxdata = array();
						    $skillarryhold = array();
										 foreach ($rows as $row) {
										  $skillist = $row->skills;
										  $skillArray = explode(',',$skillist);
										
										  if(sizeof($skillArray)>0)
										  {
											 for($i=0;$i<sizeof($skillArray);$i++)
											 {
											  $where2 = array(
											  'ID =' => $skillArray[$i]
											);
											$this->db->select('tbl_sub_categories.skillName');
											$this->db->from('tbl_sub_categories');					
											$this->db->where($where2);
											$query2 = $this->db->get();
											if ($query2->num_rows() > '0') {
												$rows2     = $query2->result();						
												$renterArray = array();
												foreach ($rows2 as $row2)
												{						
													$renterArray[] = $row2->skillName;						    
												}
												$skillarryhold[] = $renterArray;
											}
											 }
										  }
											
											$data = array(
												"user_data"            => $rows,
												"skills"            => $skillarryhold
												
																				
											); 				                
										 
										$inboxdata[] = $data; 
										
										 
								}
								  // print_r($inboxdata);
										  // exit();
								return $inboxdata;
		 }else
		 {
			return 'not_exist';
		 } */
}



function getProfileInfo($ID)
{
	 
	$this->db->select('*');
	$this->db->from('tbl_users'); 
	$this->db->where('ID',$ID);
	$query = $this->db->get();
	return $query->result_array();
}



function addCompleteProfileData($ID)
{
	
		$userID = $ID;
		$UpdateData = array(
				'fName' 		=> $this->input->post('fName'),
				'lName' 		=> $this->input->post('lName'),
				'email' 		=> $this->input->post('email'),	
				'country' 		=> $this->input->post('country'),	
				'hourlyRate'	=> $this->input->post('hourlyRate'),
				'overview'		=> $this->input->post('overview'),
				'active'		=> 1
			);
			
		$where = array (
						'ID' => $userID
					);
          $update = $this->db->update('tbl_users' , $UpdateData , $where);
		if($update) 
			{
				
				return true;
			}
	
}

function clientPublicView($user_id)
{
	// $user_id =$this->session->userdata('userID');
	$this->db->select('tbl_users.*,count(tbl_project_posts.ID) AS totalPrjects,count(tbl_awarded.awardedJobId) As totalAwarded');
	$this->db->join('tbl_project_posts', 'tbl_users.ID = tbl_project_posts.userID','INNER');
	$this->db->join('tbl_awarded', 'tbl_project_posts.ID=tbl_awarded.awardedJobId AND tbl_users.ID = tbl_awarded.awardedClientId','LEFT');
	//$this->db->group_by('tbl_project_posts.userID'); 
	$this->db->where('tbl_users.ID', $user_id);
	$query = $this->db->get('tbl_users');
	return $query->result_array();
}
function clientProfile()
{
	$user_id =$this->session->userdata('userID');
	$this->db->select('tbl_users.*,count(tbl_project_posts.ID) AS totalPrjects,count(tbl_awarded.awardedJobId) As totalAwarded');
	$this->db->join('tbl_project_posts', 'tbl_users.ID = tbl_project_posts.userID','INNER');
	$this->db->join('tbl_awarded', 'tbl_project_posts.ID=tbl_awarded.awardedJobId AND tbl_users.ID = tbl_awarded.awardedClientId','LEFT');
	//$this->db->group_by('tbl_project_posts.userID'); 
	$this->db->where('tbl_users.ID', $user_id);
	$query = $this->db->get('tbl_users');
	return $query->result_array();
}

function getUsersSkills()
{
	$userID =$this->session->userdata('userID');
	$this->db->select('*');
	$this->db->where('userID', $userID);
	$query = $this->db->get('tbl_users_skills');
	 if($query->num_rows > 0)
	 {
		 return $query->result();
	 }
	 else
	 {
		// return 'No Skills Available';
	 }
}
function addUsersSkills()
{
		$userID =$this->session->userdata('userID');
		$SkillsName =$this->input->post('SkillsName');
			$where = array (
						'userSkill' => $SkillsName,
						'userID' => $userID
					);
		$this->db->select('*');
		$this->db->where($where);
		$query = $this->db->get('tbl_users_skills');
		 if($query->num_rows > 0)
		 {
			 return false;
		 }
		 else
		 {
			
			$data = array (
						'userSkill' => $SkillsName,
						'userID' => $userID
					);
			$insert = $this->db->insert('tbl_users_skills', $data);
			if($insert) 
			{
				
				return true;
			}
		 }
	
	
	
}

function editUsersProfile()
{
	
		$userID =$this->session->userdata('userID');
		$UpdateData = array(
				'fName' 		=> $this->input->post('fName'),
				'lName' 		=> $this->input->post('lName'),
				'email' 		=> $this->input->post('email'),	
				'country' 		=> $this->input->post('country'),	
				'hourlyRate'	=> $this->input->post('hourlyRate'),
				'overview'		=> $this->input->post('overview')						
			);
		$where = array (
						'ID' => $userID
					);
          $update = $this->db->update('tbl_users' , $UpdateData , $where);
		if($update) 
			{
				
				return true;
			}
	
}

public function deleteUserSkillAjax($skillId) {
	$where = array(
				'skillId' => $skillId
				
			);
			$this->db->where($where);
   			$this->db->delete('tbl_users_skills'); 
			return true;
		
	}

public function add_profile_image($attach_files, $lastInsertID) {

        if ($attach_files) {
            $this->db->where(array("ID" => $lastInsertID));
            $this->db->set('image', $attach_files);
            $this->db->update('tbl_users');
        }

        //return  $insert_id;
    }
function getRating()
{
	$user_id =$this->session->userdata('userID');
	$this->db->select('tbl_feedback.rating');
	$this->db->where('receiverID', $user_id);
	$query = $this->db->get('tbl_feedback');
	 if($query->num_rows > 0){
		 $row = $query->result_array();
		 $rating = $row[0]['rating'];
		 return $rating;
		 }else
		 {
			return 0;
		 }
}

function getUserRating()
{
	$userID =$this->session->userdata('userID');
	$where = array(	
	'tbl_feedback.receiverID'	=>$userID
	); 	
		
	
	$this->db->select('tbl_feedback.*, tbl_users.fName, tbl_project_posts.title, tbl_project_posts.finishProject, tbl_project_posts.cancelProject, tbl_main_categories.cName, (SELECT tbl_release_payment.amount FROM tbl_release_payment WHERE tbl_release_payment.projectID = tbl_project_posts.ID) as amount');
	$this->db->join('tbl_users', 'tbl_users.ID = tbl_feedback.receiverID','INNER');	
	$this->db->join('tbl_project_posts', 'tbl_project_posts.ID=tbl_feedback.projectID','INNER');
	$this->db->join('tbl_main_categories', 'tbl_main_categories.ID = tbl_project_posts.mainCategoryId');
	$this->db->from('tbl_feedback'); 
	$this->db->where($where);
	$query = $this->db->get();
	 if ($query->num_rows() > 0)
		{
			$row =  $query->result_array();
			return $row;
		}else
		{
			return 'no';
		}
	
}

function getUserRatingCount()
{
	$userID =$this->session->userdata('userID');
	$where = array(	
	'receiverID'	=>$userID
	); 	
		
	
	$this->db->select('COUNT(tbl_feedback.feedbackID) AS Total');
	$this->db->from('tbl_feedback'); 
	$this->db->where($where);
	$query = $this->db->get();
	 if ($query->num_rows() > 0)
		{
			$row =  $query->result_array();
			$rating = $row[0]['Total'];
			return $rating;
		}else
		{
			return 'no';
		}
	
}


function gettotalJobs()
{
	$user_id =$this->session->userdata('userID');
	$this->db->select('COUNT(tbl_awarded.awardedUserId) AS Total');
	$this->db->where('awardedUserId', $user_id);
	$query = $this->db->get('tbl_awarded');
	 if($query->num_rows > 0){
		 $row = $query->result_array();
		 $rating = $row[0]['Total'];
		 return $rating;
		 }else
		 {
			return 0;
		 }
}
	
	function gettPassword($userID)
	{
		$this->db->select('password');
		$this->db->where('ID', $userID);
		$query = $this->db->get('tbl_users');
			$query = $query->result_array();
			return $query;
	}
	
		
	function changePassword($userID,$password)
	{
			$this->db->where(array("ID" => $userID));
			$this->db->set('password',$password);
            $this->db->update('tbl_users');
	}
	
function activeUser($userID)
{
	
		
		$UpdateData = array(
				'active'		=> 1					
			);
		$where = array (
						'ID' => $userID
					);
          $update = $this->db->update('tbl_users' , $UpdateData , $where);
		
	
}
    function update_login_time($userid){
        
        $UpdateData = array(
            'last_login' => date('Y-m-d H:i:s'),
            'is_online' => 1
        );
        $where = array (
            'ID' => $userid
        );
        $update = $this->db->update('tbl_users' , $UpdateData , $where);

    }

    function update_online_status($userid , $status){
        
        $UpdateData = array(
            'is_online' => $status
        );
        $where = array (
            'ID' => $userid
        );
        $update = $this->db->update('tbl_users' , $UpdateData , $where);

    }

}

