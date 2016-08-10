<?php
class Projects_model extends CI_Model {

function addProject()
		{
			
			$user_id =$this->session->userdata('userID');
			$data = array(
				'title' 			=> $this->input->post('title'),
				'description' 		=> $this->input->post('description'),
				'mainCategoryId' 	=> $this->input->post('mainCategoryId'),			
				'skills' 			=> $this->input->post('skills'),			
				'hours' 			=> $this->input->post('hours'),
				'hourlyRate' 		=> $this->input->post('hourlyRate'),
				'hrsPerWeeks' 		=> $this->input->post('hrsPerWeeks'),	
				'duration' 			=> $this->input->post('duration'),
				'postDate' 			=> date("Y-m-d H:i:s"),
				'userID' 			=> $user_id						
			);
			
			// print_r($data);		
// exit();	

			
			$insert = $this->db->insert('tbl_project_posts', $data);
		   	$insert_id = $this->db->insert_id();
			$this->db->trans_complete();
			
			$data2 = array(
			'projectID' 	=> $insert_id,
			'receiverID' 	=> $user_id,			
			'msgTypes' 		=> "addproject",					
			'message' 		=> "You have successfully posted the job,".$this->input->post('title'),
			'sendDate'		=> date("Y-m-d H:i:s")			
		);
	
	$insert = $this->db->insert('tbl_notification', $data2);
			return $insert_id;
		}
public function add_project_attachment($attach_files, $lastInsertID) {

        if ($attach_files) {
            $this->db->where(array("ID" => $lastInsertID));
            $this->db->set('attachFiles', $attach_files);
            $this->db->update('tbl_project_posts');
        }

        //return  $insert_id;
    }
public function getCategories(){
 
        $this->db->select('ID,cName,imagePath,description');
        $this->db->from('tbl_main_categories'); 
		$this->db->order_by('cName', 'ASC');
        $query = $this->db->get();
		$query = $query->result();
        return $query;
    }
	     
public function getSkill(){
 
        $this->db->select('ID,skillName');
        $this->db->from('tbl_sub_categories'); 
		$this->db->order_by('skillName	', 'ASC');
        $query = $this->db->get();
		$query = $query->result();
        return $query;
    } 
public function allProject(){
					$query = "SELECT tbl_project_posts.ID,tbl_project_posts.title,tbl_project_posts.description,tbl_project_posts.postDate,tbl_project_posts.duration,tbl_project_posts.skills,tbl_project_posts.hourlyRate,tbl_project_posts.hrsPerWeeks,tbl_main_categories.cName,count(tbl_proposal.ID) as propsalTotal
								FROM 
								tbl_project_posts 
								INNER JOIN tbl_users ON tbl_users.ID = tbl_project_posts.userID
								LEFT JOIN tbl_proposal ON tbl_proposal.	projectId = tbl_project_posts.ID
								INNER JOIN tbl_main_categories ON tbl_main_categories.ID = tbl_project_posts.mainCategoryId
								where cancelProject='0' and finishProject='0'
								GROUP BY tbl_proposal.projectId";
						$query = $this->db->query($query);

						if ($query->num_rows() > 0)
						{
						   $rows = $query->result();
						   $alldata = array();
										 foreach ($rows as $row) {
										  
											
											$data = array(
												"ID"            	=> $row->ID,
												"title"          	=> $row->title,
												"description"       => $row->description,
												"cName"       		=> $row->cName,
												"propsalTotal"      => $row->propsalTotal,
												"hourlyRate"       	=> $row->hourlyRate,
												"lettime"   		=> $this->calculateReamaingTime($row->postDate),
												"postDate"   		=> $this->getPostDateFormat($row->postDate),
												"skills"   			=> $this->getSkillByid($row->skills)
																				
											); 				                
										 
										$alldata[] = $data; 
										 
								}
							return $alldata;
						}
					
					
       
		
    }

	
public function my_jobs_c(){
					$user_id =$this->session->userdata('userID');

					$query = "SELECT tbl_project_posts.ID,tbl_project_posts.title,tbl_project_posts.description,tbl_project_posts.postDate,count(tbl_proposal.ID) as propsalTotal
								FROM
								tbl_project_posts 
								INNER JOIN tbl_users ON tbl_users.ID = tbl_project_posts.userID
								INNER JOIN tbl_main_categories ON tbl_main_categories.ID = tbl_project_posts.mainCategoryId
								LEFT JOIN tbl_proposal ON tbl_proposal.	projectId = tbl_project_posts.ID
								
								Where tbl_project_posts.userID =$user_id
								GROUP BY tbl_proposal.projectId
							";
						$query = $this->db->query($query);
						$jobdata = array();
						if ($query->num_rows() > 0)
						{
							$rows = $query->result();
							foreach ($rows as $row) 
							{
										$data = array(
												"ID"            => $row->ID,
												"title"         => $row->title,
												"description"   => $row->description,
												"propsalTotal"  => $row->propsalTotal,
												"postDate"   	=> $this->getPostDateFormat($row->postDate),
												"checkAwarded"  => $this->checkAwarded($row->ID)
												
																				
											); 				                
										 
										$jobdata[] = $data; 
							}
						}
						
						return $jobdata;
		
    }
public function checkAwarded($id)
	{
			$this->db->select();
		$this->db->from('tbl_awarded');
		$this->db->where('awardedJobId',$id);
		$query = $this->db->get();
		
        if ($query->num_rows() > 0)
						{
							return true;
						}
						else {
							return false;
						}
			
			
	}
	
	public function editProject($data, $where)
	{
			$this->db->update('tbl_project_posts', $data, $where);
			return true;
			
	}
public function getProject($ID){
		$where = array(
            'ID = ' => $ID
        );		
		$this->db->select();
		$this->db->from('tbl_project_posts');
		$this->db->where($where);
		$query = $this->db->get();
		
        if ($query->num_rows() > 0)
						{
							$rows = $query->result_array();
						   				$data = array(
												"ID"            => $rows[0]['ID'],
												"title"         => $rows[0]['title'],
												"description"   => $rows[0]['description'],
												"postDate"   	=> $rows[0]['postDate'],
												"duration"   	=> $rows[0]['duration'],
												"hourlyRate"   	=> $rows[0]['hourlyRate'],
												"hrsPerWeeks"   => $rows[0]['hrsPerWeeks'],
												"attachFiles"   => $rows[0]['attachFiles'],
												"skills"   		=> $rows[0]['skills'],
												"hours"   		=> $rows[0]['hours'],
												"mainCategoryId"   => $rows[0]['mainCategoryId'],
												"skillslist"   		=> $this->getSkillByid($rows[0]['skills'])
												
																				
											); 				                
										 
										$jobdata[] = $data; 
								
					
					return $jobdata;
						}
		
	}
public function deleteProjectFile($attach_files, $lastInsertID) {
       
            $this->db->where(array("ID" => $lastInsertID));
            $this->db->set('attachFiles', $attach_files);
            $this->db->update('tbl_project_posts');

        //return  $insert_id;
    }

public function get_project_detail($ID){
					$query = "SELECT tbl_project_posts.ID,tbl_project_posts.title,tbl_project_posts.description,tbl_project_posts.postDate,tbl_project_posts.duration,tbl_project_posts.cancelProject,tbl_project_posts.finishProject,tbl_project_posts.userID,tbl_project_posts.skills,tbl_project_posts.hourlyRate,tbl_project_posts.hrsPerWeeks
								FROM 
								tbl_project_posts 
								INNER JOIN tbl_users ON tbl_users.ID = tbl_project_posts.userID
								INNER JOIN tbl_main_categories ON tbl_main_categories.ID = tbl_project_posts.mainCategoryId
								Where tbl_project_posts.ID =$ID";
						$query = $this->db->query($query);

						if ($query->num_rows() > 0)
						{
							$rows = $query->result_array();
						   				$data = array(
												"ID"            => $rows[0]['ID'],
												"title"         => $rows[0]['title'],
												"description"   => $rows[0]['description'],
												"postDate"   	=> $rows[0]['postDate'],
												"duration"   	=> $rows[0]['duration'],												
												"userID"   		=> $rows[0]['userID'],		
												"cancelProject" => $rows[0]['cancelProject'],											
												"finishProject" => $rows[0]['finishProject'],											
												"hourlyRate"   	=> $rows[0]['hourlyRate'],
												"hrsPerWeeks"   => $rows[0]['hrsPerWeeks'],
												"skills"   		=> $this->getSkillByid($rows[0]['skills'])
												
																				
											); 				                
										 
										$jobdata[] = $data; 
								
						}
					return $jobdata;
					
					
		
    }
	
public function getSkillByid($skillist){
		 $skillArray = explode(',',$skillist);
		$this->db->select('tbl_sub_categories.skillName,tbl_sub_categories.ID');
		$this->db->from('tbl_sub_categories');					
		$this->db->where_in('ID', $skillArray);
		$query = $this->db->get();
		if ($query->num_rows() > '0') 
		{
			$rows     = $query->result();						
			
			foreach ($rows as $row)
				{						
					$data = array(
									"skillName"     => $row->skillName,
									"ID"            => $row->ID
																					
								); 	
				$skillarryhold[] = $data;						    
				}
		 
	  }
	  return $skillarryhold;
    } 
function getskillAjax($maincatID)
		{
		$this->db->select('ID,skillName');
		$this->db->where('mainCatID', $maincatID);
		$query = $this->db->get('tbl_sub_categories');
		
		 return $query->result_array();
}

function getPropsal($ID)
{
/* 	$user_id =$this->session->userdata('userID');
	$where = array(

            'projectId = ' => $ID,
			'userId' =>$user_id
        );

	
	$this->db->select('tbl_proposal.ID,tbl_proposal.describeYourSelf,tbl_proposal.outlineApproch,tbl_proposal.submitDate,tbl_users.fName,tbl_users.lName,tbl_users.country,tbl_users.hourlyRate,tbl_main_categories.cName');
	$this->db->from('tbl_proposal');
	$this->db->join('tbl_users', ' tbl_users.ID=tbl_proposal.userId');
	$this->db->join('tbl_main_categories', ' tbl_main_categories.ID=tbl_users.ID');
	$this->db->where($where);
	$query = $this->db->get();
	if ($query->num_rows() > '0') {
           return $query->result();
        }
		else {
			return 'no';
		} */
		$user_id =$this->session->userdata('userID');
	$where = array(

            'tbl_proposal.projectId = ' => $ID
        );

	
	$this->db->select('tbl_proposal.ID,tbl_proposal.describeYourSelf,tbl_proposal.myEarning,tbl_proposal.outlineApproch,tbl_proposal.submitDate,tbl_proposal.userId,tbl_proposal.awarded,tbl_users.fName,tbl_users.lName,tbl_users.country,tbl_users.hourlyRate,count(tbl_project_posts.ID) as totalJobs');
	$this->db->from('tbl_proposal');
	$this->db->join('tbl_users', 'tbl_users.ID=tbl_proposal.userId');
	//$this->db->join('tbl_main_categories', ' tbl_main_categories.ID=tbl_users.mainCategory','INNER');
	$this->db->join('tbl_project_posts', 'tbl_project_posts.userId=tbl_users.ID','LEFT');
	$this->db->group_by('tbl_project_posts.ID'); 
	$this->db->where($where);
	$query = $this->db->get();
    return $query->result();
       
}


public function calculateReamaingTime($date2)
{
	
	$cur = date('Y-m-d');
	$store =$date2;
	$diff = abs(strtotime($store. ' + 10 days') - strtotime($cur));
	
	$daydiffer='';
	$temp=$diff/86400;
	$days=floor($temp);
	$temp=24*($temp-$days); 
	$hours=floor($temp); 
	 $temp=60*($temp-$hours); 
	$minutes=floor($temp);
	 $temp=60*($temp-$minutes); 
	$seconds=floor($temp); 
	$daydiffer = "{$days}d {$hours}h"; 
	return $daydiffer;

}		
	
function getPostDateFormat($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        return "just now";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            return "one minute ago";
        }
        else{
            return "$minutes minutes ago";
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            return "an hour ago";
        }else{
            return "$hours hrs ago";
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            return "yesterday";
        }else{
            return "$days days ago";
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            return "a week ago";
        }else{
            return "$weeks weeks ago";
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            return "a month ago";
        }else{
            return "$months months ago";
        }
    }
    //Years
    else{
        if($years==1){
            return "one year ago";
        }else{
            return "$years years ago";
        }
    }
}
public function show_projects_cat_wise($ID){
		$query = "SELECT tbl_project_posts.ID,tbl_project_posts.title,tbl_project_posts.description,tbl_project_posts.postDate,tbl_project_posts.duration,tbl_project_posts.skills,tbl_project_posts.hourlyRate,tbl_project_posts.hrsPerWeeks,tbl_main_categories.cName,count(tbl_proposal.ID) as propsalTotal
								FROM 
								tbl_project_posts 
								INNER JOIN tbl_users ON tbl_users.ID = tbl_project_posts.userID
								LEFT JOIN tbl_proposal ON tbl_proposal.	projectId = tbl_project_posts.ID
								INNER JOIN tbl_main_categories ON tbl_main_categories.ID = tbl_project_posts.mainCategoryId where tbl_project_posts.mainCategoryId='$ID'
								GROUP BY tbl_proposal.projectId  ";
						$query = $this->db->query($query);
						 $alldata = array();
						if ($query->num_rows() > 0)
						{
						   $rows = $query->result();
						   $alldata = array();
										 foreach ($rows as $row) {
										  
											
											$data = array(
												"ID"            	=> $row->ID,
												"title"          	=> $row->title,
												"description"       => $row->description,
												"cName"       		=> $row->cName,
												"propsalTotal"      => $row->propsalTotal,
												"hourlyRate"       	=> $row->hourlyRate,
												"lettime"   		=> $this->calculateReamaingTime($row->postDate),
												"postDate"   		=> $this->getPostDateFormat($row->postDate),
												"skills"   			=> $this->getSkillByid($row->skills)
																				
											); 				                
										 
										$alldata[] = $data; 
										 
								}
							
						}
					
					return $alldata;
		
	}
public function awarded($project_id , $user_id) {

	$client_id =$this->session->userdata('userID');
		$this->db->select();
		$where = array(
				'awardedJobId' 			=> $project_id,
				'awardedUserId' 		=> $user_id
			);
			
		$this->db->from('tbl_awarded');
		$this->db->where($where);
		$query = $this->db->get();
		
        if ($query->num_rows() > 0)
		{
			return false;
			// print_r("Already Awarded");
			// exit();
		
		}
		else
		{
			$data = array(
				'awardedJobId' 			=> $project_id,
				'awardedUserId' 		=> $user_id,
				'awardedClientId' 	=> $client_id
			);
		$where2 = array(
				'projectId' 			=> $project_id,
				'userId' 		=> $user_id
			);
			$insert = $this->db->insert('tbl_awarded', $data);
			$this->db->where($where2);
            $this->db->set('awarded', 'awarded');
            $this->db->update('tbl_proposal');
			return true;
		}
	}
	
	
	
public function awardedCancel($project_id , $user_id) {
	
	
	$where = array(
				'awardedJobId' 			=> $project_id,
				'awardedUserId' 		=> $user_id
			);
		
		
			$this->db->where($where);
   			$this->db->delete('tbl_awarded'); 
			
			
			
			$where2 = array(
				'projectId' 			=> $project_id,
				'userId' 				=> $user_id
			);
		
			$this->db->where($where2);
            $this->db->set('awarded', '');
            $this->db->update('tbl_proposal');
	
			return true;
		
	}
	
	public function cancel_project($project_id) {
	
	
	$where = array(
				'ID' 			=> $project_id
				
			);
			
			$this->db->where($where);
            $this->db->set('cancelProject', '1');
            $this->db->update('tbl_project_posts');
	
			return true;
		
	}
	public function clientFinishProject($project_id) {
	
	
	$where = array(
				'ID' 			=> $project_id
				
			);
			
			$this->db->where($where);
            $this->db->set('clientFinishProject', '1');
            $this->db->update('tbl_project_posts');
	
			return true;
		
	}
	public function freelancerFinishProject($project_id) {
	
	
	$where = array(
				'ID' 			=> $project_id
				
			);
			
			$this->db->where($where);
            $this->db->set('freelancerFinishProject', '1');
            $this->db->update('tbl_project_posts');
	
			return true;
		
	}
	
	
	
public function get_propsalsByuser(){
	$userID =$this->session->userdata('userID');	
					$query="SELECT tbl_project_posts.title,tbl_project_posts.description,tbl_users.fName,
							tbl_project_posts.ID,tbl_proposal.submitDate,tbl_proposal.paymentRequest,tbl_proposal.paymentRequestDate
							FROM tbl_proposal
							INNER JOIN tbl_project_posts ON tbl_project_posts.ID = tbl_proposal.projectId
							INNER JOIN tbl_users ON tbl_users.ID = tbl_project_posts.userID
							WHERE tbl_proposal.userId='$userID'";
					$query = $this->db->query($query);
					$query->result_array();
					$propsal = array();
					if ($query->num_rows() > 0)
						{
							$rows = $query->result_array();
							foreach ($rows as $row) {
						   				$data = array(
												"ID"     		=> $row['ID'],
												"title"         => $row['title'],
												"description"   => $row['description'],
												"submitDate"   	=> $row['submitDate'],
												"fName"   		=> $row['fName'],
												"paymentRequest" => $row['paymentRequest'],
												"paymentRequestDate" => $row['paymentRequestDate'],			
												"totalPropsal"  => $this->getTotalPropsal($row['ID'])
												
																				
											); 				                
										 
										$propsal[] = $data; 
							}
						}
					return  $propsal;
		
    }
public function getTotalPropsal($ID)
	{
		$where = array(
		'projectId' =>$ID
		);
		$this->db->select('tbl_proposal.*');
		$this->db->from('tbl_proposal');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->num_rows();
	}
	
}
	
