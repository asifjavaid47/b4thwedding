<?php
class Propsal_model extends CI_Model {

public function get_projectDetail($ID){
					$query = "SELECT tbl_project_posts.ID,tbl_project_posts.title,tbl_project_posts.description,tbl_project_posts.postDate,tbl_project_posts.duration,tbl_project_posts.skills,tbl_project_posts.hourlyRate,tbl_project_posts.hrsPerWeeks,tbl_project_posts.userID
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
												"userID"        => $rows[0]['userID'],
												"title"         => $rows[0]['title'],
												"description"   => $rows[0]['description'],
												"postDate"   	=> $rows[0]['postDate'],
												"duration"   	=> $rows[0]['duration'],
												"hourlyRate"   	=> $rows[0]['hourlyRate'],
												"hrsPerWeeks"   => $rows[0]['hrsPerWeeks'],
												"lettime"   	=> $this->calculateDaysBetweenDates($rows[0]['postDate']),
												"skills"   		=> $this->getSkillByid($rows[0]['skills']),
												"totaljobpost"  => $this->getTotaljobs($rows[0]['userID'])
												
																				
											); 				                
										 
										$jobdata[] = $data; 
								
						}
					return $jobdata;
					
					
		
    }
function addPropsal($data)
		{
			$insert = $this->db->insert('tbl_proposal', $data);
		   	$insert_id = $this->db->insert_id();
			$this->db->trans_complete();
			$receiverID		=	$this->input->post('projectuserid');
			$userID =$this->session->userdata('userID'); 
			$data2 = array(
			'projectID' 	=> $data['projectId'],
			'receiverID' 	=> $receiverID,
			'senderID' 		=>$userID,			
			'msgTypes' 		=> "propsal",					
			'message' 		=> "You receive new propsal for ".$this->input->post('title'),
			'sendDate'		=> date("Y-m-d H:i:s")			
		);
	
	$insert = $this->db->insert('tbl_notification', $data2);
			
			
			return $insert_id;
}

public function get_propsals($ID){	
					$query = "SELECT tbl_proposal.ID,tbl_proposal.describeYourSelf,tbl_proposal.submitDate,tbl_proposal.awarded,tbl_proposal.userId,tbl_users.skills,tbl_users.fName,tbl_users.lName,tbl_users.country,tbl_users.hourlyRate,tbl_users.mainCategory,count(tbl_project_posts.ID) as totalJobs
								FROM tbl_proposal 
								INNER JOIN tbl_users ON tbl_users.ID = tbl_proposal.userId
								LEFT JOIN tbl_project_posts ON tbl_project_posts.userID = tbl_proposal.userId
								Where tbl_proposal.projectId ='$ID'
								GROUP BY tbl_project_posts.userID
							";
						$query = $this->db->query($query);
						 $inboxdata = array();
						if ($query->num_rows() > 0)
						{
						   $rows = $query->result();
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
												"ID"            		=> $row->ID,
												"describeYourSelf"      => $row->describeYourSelf,
												"fName"      			=> $row->fName,
												"lName"      			=> $row->lName,
												"hourlyRate"      		=> $row->hourlyRate,
												"country"      			=> $row->country,
												"submitDate"      		=> $row->submitDate,
												"userId"     	 		=> $row->userId,
												"awarded"      			=> $row->awarded,
												"mainCategory"      	=> $row->mainCategory,
												"totalJobs"      		=> $row->totalJobs,
												"skills"            	=> $skillarryhold
												
																				
											); 				                
										 
										$inboxdata[] = $data; 
										
										 
								}
								
						}
					
					return $inboxdata;
		
    }
public function editPropsal($data, $where){
		$this->db->update('tbl_proposal', $data, $where);
     	return true;
	}
public function calculateDaysBetweenDates($date2)
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
public function getSkillByid($skillist){
	$skillArray = explode(',',$skillist);
	$skillarryhold = array();
	 if(sizeof($skillArray)>0)
	  {
		 for($i=0;$i<sizeof($skillArray);$i++)
		 {
		  $where = array(
		  'ID =' => $skillArray[$i]
		);
		$this->db->select('tbl_sub_categories.skillName,tbl_sub_categories.ID');
		$this->db->from('tbl_sub_categories');					
		$this->db->where($where);
		$query = $this->db->get();
		if ($query->num_rows() > '0') 
		{
			$rows     = $query->result();						
			
			foreach ($rows as $row)
				{						
					$data = array(
									"skillName"            => $row->skillName,
									"ID"            => $row->ID
																					
								); 	
				$skillarryhold[] = $data;						    
				}
			
		   }
		   
		 }
	  }
	  return $skillarryhold;
    } 
public function getTotaljobs($userID){	
		$where = array(

            'userID = ' => $userID,
        );

        $this->db->select('COUNT(ID) AS count');
        $this->db->from('tbl_project_posts');
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > '0') {
            $row = $query->result_array();
            return ($row[0]['count']); 
        }
		else {
			return 0;
		}
	}
function checkuserAlreadyPropsal($ID)
{
	$user_id =$this->session->userdata('userID');
	$where = array(

            'projectId = ' => $ID,
			'userId' =>$user_id
        );

	
	$this->db->select();
	$this->db->from('tbl_proposal');
	$this->db->where($where);
	$query = $this->db->get();
	if ($query->num_rows() > '0') {
           return $query->result_array();
        }
		else {
			return 'no';
		}
}

public function add_propsal_attachment($attach_files, $lastInsertID) {

        if ($attach_files) {
            $this->db->where(array("ID" => $lastInsertID));
            $this->db->set('filePath', $attach_files);
            $this->db->update('tbl_proposal');
        }

        //return  $insert_id;
 }
public function deletePropsaltFile($filePath, $ID) {
       
            $this->db->where(array("ID" => $ID));
            $this->db->set('filePath', $filePath);
            $this->db->update('tbl_proposal');

        //return  $insert_id;
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
	function awardUser($project_id) 
	{
			$this->db->select();
			$where = array(
					'awardedJobId' 			=> $project_id
				);
				
					// 'awardedUserId' 		=> $user_id
			$this->db->from('tbl_awarded');
			$this->db->where($where);
			$query = $this->db->get();
			
			if ($query->num_rows() > 0)
			{
				return true;
			
			}
			else
			{
				return false;
			}
	}
	function get_project_by_user_id($project_id) 
	{
			$this->db->select('userID');
			$where = array(
					'ID' 			=> $project_id
				);
				
					// 'awardedUserId' 		=> $user_id
			$this->db->from('tbl_project_posts');
			$this->db->where($where);
			$query = $this->db->get();
			
			if ($query->num_rows() > 0)
			{
				$rows = $query->result();
				foreach($rows as $row)
				{
					return $row->userID;
				}
			
			}
			else
			{
				return false;
			}
	}

	
}
	
