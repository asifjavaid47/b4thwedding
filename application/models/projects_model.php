<?php
class Projects_model extends CI_Model {

function addProject()
		{
			
			
			// $this->db->select('ID,skillName');
			// $this->db->from('tbl_sub_categories'); 
			// $this->db->order_by('skillName	', 'ASC');
			// $query = $this->db->get();
			// $query = $query->result();
			// return $query;
			
			$user_id 	=	$this->session->userdata('userID');
			$workType	=	$this->input->post('workType');
			if($workType=="hourly")
			{
				$fixedBudget	=	'';
				$hourlyRate		=	$this->input->post('hourlyRate');
				$hrsPerWeeks 	= 	$this->input->post('hrsPerWeeks');	
				$duration 		= 	$this->input->post('duration');	
			}else
			{
				$fixedBudget	=	$this->input->post('fixedBudget');	
				$hourlyRate		=	'';
				$hrsPerWeeks	=	'';	
				$duration		=	'';
			}
			$data = array(
				'title' 			=> $this->input->post('title'),
				'description' 		=> $this->input->post('description'),
				'mainCategoryId' 	=> $this->input->post('mainCategoryId'),			
				'skills' 			=> $this->allGetSkillID($this->input->post('skills')),			
				'states' 			=> $this->allGetStateID($this->input->post('states')),			
				'workType' 			=> $this->input->post('workType'),
				'hourlyRate' 		=> $hourlyRate,
				'fixedBudget' 		=> $fixedBudget,
				'hrsPerWeeks' 		=> $hrsPerWeeks,	
				'duration' 			=> $duration,
				'postDate' 			=> date("Y-m-d H:i:s"),
				'userID' 			=> $user_id						
			);
			
		
			
			 
			
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
		
		public function allGetSkillID($data){
		// print_r($data);
		// exit;
		$skills   =   explode(',',$data);

		unset($data);
		$r_data = '';
		foreach($skills as $skill)
		{
				$data['skillName'] =   $skill;   
				$this->db->select('ID,skillName');
				$this->db->from('tbl_sub_categories');
				$this->db->where($data);
				$query = $this->db->get();
			   if ($query->num_rows() > 0)
				{
					
				}
				else {
					 $this->db->insert('tbl_sub_categories', $data);
					
				}
				$this->db->select('ID');
				$this->db->from('tbl_sub_categories');
				$this->db->where($data);
				$query2 = $this->db->get();
				$query3 = $query2->result();
				foreach ($query3 as $row) 
							{
								$r_data .= $row->ID.',';
							}
				// print_r($query3);
				unset($data);
				 
				 
		}
		$r_data = substr_replace($r_data, "", -1);
		return $r_data;
			// exit();
			// return $row->skillID;
							
    }

    
		public function allGetStateID($data){
		// print_r($data);
		// exit;
		$states   =   explode(',',$data);

		unset($data);
		$r_data = '';
		foreach($states as $state)
		{
				$data['stateName'] =   $state;   
				$this->db->select('ID,stateName');
				$this->db->from('tbl_states');
				$this->db->where($data);
				$query = $this->db->get();
			   if ($query->num_rows() > 0)
				{
					
				}
				else {
					 $this->db->insert('tbl_states', $data);
					
				}
				$this->db->select('ID');
				$this->db->from('tbl_states');
				$this->db->where($data);
				$query2 = $this->db->get();
				$query3 = $query2->result();
				foreach ($query3 as $row) 
							{
								$r_data .= $row->ID.',';
							}
				// print_r($query3);
				unset($data);
				 
				 
		}
		$r_data = substr_replace($r_data, "", -1);
		return $r_data;
			// exit();
			// return $row->skillID;
							
    }
    
		
		public function getSkill(){
 
        $this->db->select('ID,skillName');
        $this->db->from('tbl_sub_categories'); 
		$this->db->order_by('skillName	', 'ASC');
        $query = $this->db->get();
		$query = $query->result();
        return $query;
    }
	
		public function getState(){
 
        $this->db->select('ID,stateName');
        $this->db->from('tbl_states'); 
		$this->db->order_by('stateName	', 'ASC');
        $query = $this->db->get();
		$query = $query->result();
        return $query;
    }
		
public function add_project_attachment($attach_files, $lastInsertID) {

        if ($attach_files) {
            $this->db->where(array("ID" => $lastInsertID));
            $this->db->set('attachFiles', $attach_files);
            $this->db->update('tbl_project_posts');
        }

        //return  $insert_id;
    }
public function getCategories($orderby=''){
 
        $this->db->select('ID,cName,imagePath,description');
        $this->db->where('delete' , '0');
        $this->db->from('tbl_main_categories');
		if($orderby=='')
		{
		$this->db->order_by('cName', 'ASC');
		}else
		{
			$this->db->order_by('orderNo', 'DESC');
		}
        $query = $this->db->get();
		$query = $query->result();
        return $query;
    }
public function getSliderImages(){
 
        $this->db->select('ID,cName,imagePath,description');
        $this->db->where('delete' , '0');
        $this->db->from('tbl_main_slider'); 
		$this->db->order_by('cName', 'ASC');
        $query = $this->db->get();
		$query = $query->result();
        return $query;
    }
	
public function getAllSkills(){
 
        $this->db->select('ID,skillName');
        $this->db->from('tbl_sub_categories'); 
        $this->db->where('deleted' , 0); 
		$this->db->order_by('skillName	', 'ASC');
        $query = $this->db->get();
		$query = $query->result();
        return $query;
    }
public function getAllStates(){
 
        $this->db->select('ID,stateName');
        $this->db->from('tbl_states'); 
        $this->db->where('deleted' , 0); 
		$this->db->order_by('stateName	', 'ASC');
        $query = $this->db->get();
		$query = $query->result();
        return $query;
    }
	     
 
public function allProject($catID,$options){
			$options['search']	= 	trim($this->input->post("search"));
			$limit = trim($this->input->post("limit"));
                        if(empty($limit))
                        {
                            $limit=0;
                        }
			$where				=	array();
			$search				=   (isset($options['search'])) ? $options['search']:'';
			$mainCategoryId		=   (isset($catID)) 			? $catID:'';
			$where_statement	=   ($mainCategoryId!='')		? $where[]="tbl_project_posts.mainCategoryId = $mainCategoryId" : '';
			$where_statement	=    $where[]="tbl_project_posts.runingProject != 1";
			$where_statement	=    $where[]="tbl_project_posts.cancelProject != 1";
			$where_statement	=	 $where[]="cancelProject='0' and finishProject='0'";
			$where_statement	=	($search!='')			    ? $where[]="(tbl_project_posts.title LIKE  '%".$search."%' OR tbl_project_posts.description LIKE  '%".$search."%' OR tbl_project_posts.skills LIKE  '%".$search."%')":'';
			
			$where_statement	=	(sizeof($where)>0)? "where ".implode(" and ", $where):'';
			
			$query = '';
			$query.= "SELECT tbl_project_posts.ID,tbl_project_posts.title,tbl_project_posts.description,";
			$query.="tbl_project_posts.postDate,tbl_project_posts.duration,tbl_project_posts.skills,";
			
			$query.="tbl_project_posts.workType,tbl_project_posts.fixedBudget,tbl_users.ID as userID,";
			$query.="tbl_project_posts.hourlyRate,tbl_project_posts.hrsPerWeeks,tbl_main_categories.cName "; 			 			$query.="FROM tbl_project_posts INNER JOIN tbl_users ON tbl_users.ID = tbl_project_posts.userID ";
			$query.="LEFT JOIN tbl_proposal ON tbl_proposal.projectId = tbl_project_posts.ID ";
			$query.="INNER JOIN tbl_main_categories ON tbl_main_categories.ID = tbl_project_posts.mainCategoryId ";
			$query.="$where_statement ";
			$query.= "ORDER BY  tbl_project_posts.ID DESC";
//			$query.= "ORDER BY  tbl_project_posts.ID DESC LIMIT ".$limit.",10";
//                        debug($query);
						$query = $this->db->query($query);
						 $alldata = array();
						if ($query->num_rows() > 0)
						{
						   $rows = $query->result();
						  
										 foreach ($rows as $row) {
										  
											
											$data = array(
												"ID"            	=> $row->ID,
												"title"          	=> $row->title,
												"description"       => $row->description,
												"workType"       	=> $row->workType,
												"cName"       		=> $row->cName,
												"fixedBudget"       => $row->fixedBudget,
												"hourlyRate"       	=> $row->hourlyRate,
												"lettime"   		=> $this->calculateReamaingTime($row->postDate),
												"postDate"   		=> $this->getPostDateFormat($row->postDate),
												"skills"   			=> $this->getSkillByid($row->skills),
												"propsalTotal"		=> $this->getTotalPropsal($row->ID),
												"rating"			=> $this->getRating($row->userID),
																				
											); 				                
										 
										$alldata[] = $data; 
										 
								}
							
						}
					
					return $alldata; 
       
		
    }

	
public function getAwardaduserName($ID)
	{
		
		$where = array(
		'awardedJobId' =>$ID
		);
		$this->db->select('awardedUserId');
		$this->db->from('tbl_awarded');
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows>0)
		{
		$row = $query->result_array();
		$userID	=	$row[0]['awardedUserId'];
		$this->db->select('fName');
		$where2 = array(
				'ID' 			=> $userID
			);
			
		$this->db->from('tbl_users');
		$this->db->where($where2);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->result_array();
			$title	=	$row[0]['fName'];
			return $title;
		}else
		{
			return '';
		}
		}else
		{
			return '';
		}
	
	}
	
	public function getAwardaduserPic($ID)
	{
		
		$where = array(
		'awardedJobId' =>$ID
		);
		$this->db->select('awardedUserId');
		$this->db->from('tbl_awarded');
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows>0)
		{
		$row = $query->result_array();
		$userID	=	$row[0]['awardedUserId'];
		$this->db->select('image');
		$where2 = array(
				'ID' 			=> $userID
			);
			
		$this->db->from('tbl_users');
		$this->db->where($where2);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->result_array();
			$title	=	$row[0]['image'];
			return $title;
		}else
		{
			return '';
		}
		}else
		{
			return '';
		}
	
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
	
	public function editProject($hourlyRate,$hrsPerWeeks,$fixedBudget,$duration, $where)
	{
			$data = array(
				'title' 			=> $this->input->post('title'),
				'description' 		=> $this->input->post('description'),
				'mainCategoryId' 	=> $this->input->post('mainCategoryId'),			
				'skills' 			=> $this->allGetSkillID($this->input->post('skills')),
				'states' 			=> $this->allGetStateID($this->input->post('states')),
				'workType' 			=> $this->input->post('workType'),
				'hourlyRate' 		=> $hourlyRate,
				'hrsPerWeeks' 		=> $hrsPerWeeks,
				'fixedBudget' 		=> $fixedBudget,	
				'duration' 			=> $duration,
				'cancelProject'   	=> '0',
				'finishProject'  	=> '0'
								
				);
			
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
												"workType"   	=> $rows[0]['workType'],
												"fixedBudget"   => $rows[0]['fixedBudget'],
												"mainCategoryId"  => $rows[0]['mainCategoryId'],
												"skillslist"   		=> $this->getSkillByid($rows[0]['skills']),
												"stateslist"   		=> $this->getStateByid($rows[0]['states'])
												
																				
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
				$query	=	'';
				$query.= "SELECT tbl_project_posts.ID,tbl_project_posts.title,tbl_project_posts.description,";
				$query.= "tbl_project_posts.postDate,tbl_project_posts.startingDate,tbl_project_posts.duration,tbl_project_posts.cancelProject,";
				$query.= "tbl_project_posts.runingProject,tbl_project_posts.agreement_document,";
				$query.= "tbl_project_posts.finishProject,tbl_project_posts.userID,";
				$query.= "tbl_project_posts.skills,tbl_project_posts.states,tbl_project_posts.hourlyRate,tbl_project_posts.hrsPerWeeks,";
				$query.= "tbl_project_posts.workType,tbl_project_posts.fixedBudget,tbl_project_posts.attachFiles ";
				
				$query.= "FROM tbl_project_posts ";
				$query.= "INNER JOIN tbl_users ON tbl_users.ID = tbl_project_posts.userID ";
				$query.= "INNER JOIN tbl_main_categories ON tbl_main_categories.ID = tbl_project_posts.mainCategoryId
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
												"workType"      => $rows[0]['workType'],
												"hrsPerWeeks"   => $rows[0]['hrsPerWeeks'],
												"fixedBudget"   => $rows[0]['fixedBudget'],
												"attachFiles"   => $rows[0]['attachFiles'],
												"runingProject" => $rows[0]['runingProject'],
												"agreement_document" => $rows[0]['agreement_document'],
                                                                                                "startingDate" => $rows[0]['startingDate'],
												"skills"   		=> $this->getSkillByid($rows[0]['skills']),
												"states"   		=> $this->getStateByid($rows[0]['states']),
												"awardaduserID"   	=> $this->awardaduserID($ID),
												
																				
											); 				                
										 
										$jobdata[] = $data; 
								
						}
						
					return $jobdata;
					
					
		
    }
	
public function getSkillByid($skillist){
		 $skillArray = explode(',',$skillist);
		$this->db->select('skillName,ID');
		$this->db->from('tbl_sub_categories');					
		$this->db->where_in('ID', $skillArray);
		$query = $this->db->get();
		$skillarryhold = array();
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
    
public function getStateByid($statelist){
    if(!empty($statelist)){
		 $stateArray = explode(',',$statelist);
		$this->db->select('stateName,ID');
		$this->db->from('tbl_states');					
		$this->db->where_in('ID', $stateArray);
		$query = $this->db->get();
		$statearryhold = array();
		if ($query->num_rows() > '0') 
		{
			$rows     = $query->result();						
			
			foreach ($rows as $row)
			{						
				$data = array(
								"stateName"     => $row->stateName,
								"ID"            => $row->ID
																				
							); 	
				$statearryhold[] = $data;						    
			}
		 
	  }
	  return $statearryhold;
    } else {
        return '';
    }
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

	$user_id =$this->session->userdata('userID');
	$where = array(

            'tbl_proposal.projectId = ' => $ID
        );

	
	$this->db->select('tbl_proposal.ID,tbl_proposal.notes,tbl_proposal.describeYourSelf,tbl_proposal.myEarning,tbl_proposal.outlineApproch,tbl_proposal.submitDate,tbl_proposal.userId,tbl_proposal.filePath,tbl_proposal.awarded,tbl_proposal.userId,tbl_users.fName,tbl_users.lName,tbl_users.country,tbl_users.hourlyRate,tbl_users.image,tbl_proposal.billedToClient');
	$this->db->from('tbl_proposal');
	$this->db->join('tbl_users', 'tbl_users.ID=tbl_proposal.userId');
	//$this->db->join('tbl_project_posts', 'tbl_project_posts.userId=tbl_users.ID');
	//$this->db->group_by('tbl_project_posts.ID'); 
	$this->db->where($where);
	$query = $this->db->get();
    // return $query->result();
	 $alldata = array();
	if ($query->num_rows() > 0) {
	$rows = $query->result();
	 foreach ($rows as $row)
	 {
	 
			
			$data = array(
						"myTotalEarning"   	=> $this->myTotalEarning($row->userId),
						"ID"          		=> $row->ID,
						"notes"             => $row->notes,
						"billedToClient"    => $row->billedToClient,
						"describeYourSelf"  => $row->describeYourSelf,
						"myEarning"       	=> $row->myEarning,
						"outlineApproch"    => $row->outlineApproch,
						"submitDate"       	=> $row->submitDate,
						"userId"       		=> $row->userId,
						"filePath"       	=> $row->filePath,
						"awarded"       	=> $row->awarded,
						"fName"       		=> $row->fName,
						"lName"       		=> $row->lName,
						"country"       	=> $row->country,
						"image"       		=> $row->image,
						"hourlyRate"       	=> $row->hourlyRate,
						"rating"      		=> $this->getRating($row->userId),
						"totalJobs"       	=> $this->getTotalAwardedjobs($row->userId)
						);
														
				
				$alldata[] = $data; 
											
						
	}
	}
	
	return $alldata;
       
}

public function getTotalAwardedjobs($userID){	
		$where = array(

            'awardedUserId = ' => $userID,
        );

        $this->db->select('COUNT(awardedId) AS count');
        $this->db->from('tbl_awarded');
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->result_array();
            return ($row[0]['count']); 
        }
		else {
			return 0;
		}
	}
public function myTotalEarning($idOfUser)
{
	
		$query= "SELECT
					tbl_proposal.myEarning,
					SUM( tbl_proposal.billedToClient ) AS total
					FROM
					tbl_paymentrequest
					INNER JOIN tbl_project_posts ON tbl_project_posts.ID = tbl_paymentrequest.projectID
					INNER JOIN tbl_users ON tbl_users.ID = tbl_paymentrequest.receiverID
					INNER JOIN tbl_proposal ON tbl_users.ID = tbl_proposal.userId AND tbl_project_posts.ID = tbl_proposal.projectId
					WHERE tbl_users.ID='$idOfUser' AND tbl_paymentrequest.`status` ='1'";
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
				'awardedClientId' 		=> $client_id
			);
		$where2 = array(
				'projectId' 			=> $project_id,
				'userId' 				=> $user_id
			);
			$insert = $this->db->insert('tbl_awarded', $data);
			$this->db->where($where2);
            $this->db->set('awarded', 'awarded');
			$this->db->set('awardStatus', 'pending');
            $this->db->update('tbl_proposal');
			
			
			$where3 = array(
				'ID' 			=> $project_id
			);
			$this->db->where($where3);
            $this->db->set('runingProject',1);
			$this->db->set('awardStatus','pending');
            $this->db->set('startingDate',date('Y-m-d'));
            $this->db->update('tbl_project_posts');
			
			$title	=	$this->getProjectTitle($project_id);
			$datanotification = array(
					'projectID' 	=> $project_id,
					'senderID' 		=> $client_id,			
					'receiverID' 	=> $user_id,
					'msgTypes' 		=> 'awardedJob',					
					'message' 		=> 	"Congratulations! This job".$title. "has been awarded to you, Please proceed for further action",
					'sendDate'		=>	date("Y-m-d H:i:s")			
				);
				$this->db->insert('tbl_notification', $datanotification);
			return true;
		}
	}
	
	
public function approveAward($project_id , $user_id) {

	$loginID =$this->session->userdata('userID');
	
			$where2 = array(
				'ID' 			=> $project_id
			);
			$this->db->where($where2);
			$this->db->set('awardStatus','approved');
            $this->db->set('startingDate',date('Y-m-d'));
            $this->db->update('tbl_project_posts');
			
			
			$where3 = array(
				'projectId' 			=> $project_id,
				'userId' 				=> $loginID
			);
			$this->db->where($where3);
			$this->db->set('awardStatus', 'approved');
            $this->db->update('tbl_proposal');
			
			$title	=	$this->getProjectTitle($project_id);
			$datanotification = array(
					'projectID' 	=> $project_id,
					'senderID' 		=> $loginID,			
					'receiverID' 	=> $user_id,
					'msgTypes' 		=> 'awardedJob',					
					'message' 		=> 	"User Accept Award. ".$title,
					'sendDate'		=>	date("Y-m-d H:i:s")			
				);
				$this->db->insert('tbl_notification', $datanotification);
			return true;
		
	}
	
public function rejectAward($project_id , $user_id) {

	$loginID =$this->session->userdata('userID');
	
			$where2 = array(
				'ID' 			=> $project_id
			);
			$this->db->where($where2);
			$this->db->set('awardStatus','');
			$this->db->set('runingProject','');
            $this->db->set('startingDate','');
            $this->db->update('tbl_project_posts');
			
			
			$where3 = array(
				'projectId' 			=> $project_id,
				'userId' 				=> $loginID
			);
			$this->db->where($where3);
			$this->db->set('awardStatus', '');
			$this->db->set('awarded', '');
            $this->db->update('tbl_proposal');
			
			
			$this->db->where('awardedJobId', $project_id);
			$this->db->delete('tbl_awarded');
			
			$title	=	$this->getProjectTitle($project_id);
			$datanotification = array(
					'projectID' 	=> $project_id,
					'senderID' 		=> $loginID,			
					'receiverID' 	=> $user_id,
					'msgTypes' 		=> 'awardedJob',					
					'message' 		=> 	"User Reject Award. ".$title,
					'sendDate'		=>	date("Y-m-d H:i:s")			
				);
				$this->db->insert('tbl_notification', $datanotification);
			return true;
		
	}
	
public function cancelAward($project_id , $user_id) {
	
	
	$loginID =$this->session->userdata('userID');
	
			$where2 = array(
				'ID' 			=> $project_id
			);
			$this->db->where($where2);
			$this->db->set('awardStatus','');
			$this->db->set('runingProject','');
            $this->db->set('startingDate','');
            $this->db->update('tbl_project_posts');
			
			
			$where3 = array(
				'projectId' 			=> $project_id,
				'userId' 				=> $user_id
			);
			$this->db->where($where3);
			$this->db->set('awardStatus', '');
			$this->db->set('awarded', '');
            $this->db->update('tbl_proposal');
			
			
			$this->db->where('awardedJobId', $project_id);
			$this->db->delete('tbl_awarded');
			
			$title	=	$this->getProjectTitle($project_id);
			$datanotification = array(
					'projectID' 	=> $project_id,
					'senderID' 		=> $loginID,			
					'receiverID' 	=> $user_id,
					'msgTypes' 		=> 'awardedJob',					
					'message' 		=> 	"Client Reject Award. ".$title,
					'sendDate'		=>	date("Y-m-d H:i:s")			
				);
				$this->db->insert('tbl_notification', $datanotification);
			return true;
		
	}
	
public function getProjectTitle($ID)
	{
		$this->db->select('title');
		$where = array(
				'ID' 			=> $ID
			);
			
		$this->db->from('tbl_project_posts');
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->result_array();
			$title	=	$row[0]['title'];
			return $title;
		}else
		{
			return '';
		}
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
	
	
	
public function get_propsalsByuserNew($filter=''){
					$wherecondition	=	'';
					if($filter!='')
					{
						$wherecondition.=" AND tbl_proposal.archive=1 ";
					}else
					{
						$wherecondition.=" AND tbl_proposal.archive!= 1 ";
					}
	$userID =$this->session->userdata('userID');
					$query="SELECT tbl_project_posts.title,tbl_project_posts.description,tbl_project_posts.paymentRequest,tbl_project_posts.description,tbl_project_posts.postDate,tbl_project_posts.runingProject,tbl_project_posts.ID,tbl_proposal.submitDate,tbl_proposal.paymentRequest,tbl_proposal.awarded,tbl_proposal.paymentRequestDate,tbl_users.fName,tbl_users.ID AS projectUserID FROM tbl_proposal INNER JOIN tbl_project_posts ON tbl_project_posts.ID = tbl_proposal.projectId INNER JOIN tbl_users ON tbl_users.ID = tbl_project_posts.userID WHERE tbl_proposal.userId = '19' AND tbl_proposal.archive != 1 ORDER BY tbl_proposal.ID DESC";
//                                        debug($query);	
                        $query = $this->db->query($query);
                        $query->result_array();
                        $propsal = array();
    if ($query->num_rows() > 0)
            {
                $rows = $query->result_array();
                foreach ($rows as $row) {
                        $data = array(
                                        "ID"=> $row['ID'],
                                        "title"=> $row['title'],
                                        "description"=> $row['description'],
                                        "submitDate"=> $row['submitDate'],
                                        "fName"=> $row['fName'],
                                        "paymentRequest"=> $row['paymentRequest'],
                                        "awarded"=> $row['awarded'],
                                        "projectUserID"=> $row['projectUserID'],
                                        "paymentRequestDate" => $row['paymentRequestDate'],			
                                        "totalPropsal"  => $this->getTotalPropsal($row['ID']),
                                        "runingProject" => $row['runingProject'],
                                        "paymentRequest" => $row['paymentRequest'],
                                        "awardaduserImage" => $this->getAwardaduserPic($row['ID'])
                                ); 			
//                                debug($data);
                                        $propsal[] = $data; 
                }
            }
					return  $propsal;
		
    }
public function get_propsalsByuser($filter=''){
    $filter = $this->input->post('filter');
					$wherecondition	=	'';
					if($filter == 'in-progress')
					{
						$wherecondition.=" AND tbl_proposal.awarded = 'awarded' AND tbl_proposal.archive != 1 ";
					}else if($filter == 'completed')
					{
						$wherecondition.=" AND tbl_proposal.awarded = 'completed' AND tbl_proposal.archive != 1 ";
					}else if($filter == 'archived')
					{
						$wherecondition.=" AND tbl_proposal.archive = 1 ";
					}else
					{
						$wherecondition.=" AND tbl_proposal.archive != 1 ";
					}
	$userID =$this->session->userdata('userID');
					$query="";	
					$query.="SELECT tbl_project_posts.title,tbl_project_posts.description,tbl_users.fName,";
					$query.="tbl_project_posts.ID,tbl_proposal.submitDate,tbl_proposal.paymentRequest,tbl_users.image as projectuserimage,";
					$query.="tbl_proposal.awarded,tbl_proposal.paymentRequestDate,tbl_users.ID AS projectUserID,"; 		                   $query.="tbl_awarded.awardedDate,tbl_proposal.archive,tbl_proposal.completedDate,";
					$query.="tbl_proposal.ID as propsalID,tbl_proposal.feedback,tbl_proposal.awardStatus   
							FROM tbl_proposal
							INNER JOIN tbl_project_posts ON tbl_project_posts.ID = tbl_proposal.projectId
							INNER JOIN tbl_users ON tbl_users.ID = tbl_project_posts.userID
							LEFT JOIN tbl_awarded ON tbl_awarded.awardedJobId = tbl_project_posts.ID
							WHERE tbl_proposal.userId='$userID' ".$wherecondition." ORDER BY  tbl_proposal.ID DESC";
//                                        debug($query);	
					$query = $this->db->query($query);
					$query->result_array();
					$propsal = array();
					if ($query->num_rows() > 0)
						{
							$rows = $query->result_array();
							foreach ($rows as $row) {
						   				$data = array(
												"ID"     			=> $row['ID'],
												"title"         	=> $row['title'],
												"awardStatus"       => $row['awardStatus'],
												"description"   	=> $row['description'],
												"propsalID"   		=> $row['propsalID'],
												"submitDate"   		=> $row['submitDate'],
												"completedDate"   	=> $row['completedDate'],
												"fName"   			=> $row['fName'],
												"archive"   		=> $row['archive'],
												"feedback"   		=> $row['feedback'],
												"paymentRequest" 	=> $row['paymentRequest'],
												"awarded" 			=> $row['awarded'],
												"awardedDate" 		=> $row['awardedDate'],
												"projectuserimage" 	=> $row['projectuserimage'],
												"projectUserID" 	=> $row['projectUserID'],
												"paymentRequestDate" => $row['paymentRequestDate'],			
												"totalPropsal"  => $this->getTotalPropsal($row['ID'])
												
																				
											); 				                
										 
										$propsal[] = $data; 
							}
						}
					return  $propsal;
		
    }

    
public function my_jobs_c(){
    
    $filter = $this->input->post('filter');
					$wherecondition	=	'';
					if($filter == 'in-progress')
					{
						$wherecondition.=" AND tbl_project_posts.runingProject = 1 AND tbl_project_posts.archive != 1 ";
					}else if($filter == 'completed')
					{
						$wherecondition.=" AND tbl_project_posts.runingProject = 2 AND tbl_project_posts.archive != 1 ";
					}else if($filter == 'archived')
					{
						$wherecondition.=" AND tbl_project_posts.archive = 1 ";
					}else
					{
						$wherecondition.=" AND tbl_project_posts.archive != 1 ";
					}
					$user_id =$this->session->userdata('userID');
					$query = '';
					$query.= "SELECT tbl_project_posts.ID,tbl_project_posts.userID,tbl_project_posts.title,tbl_project_posts.paymentRequest,tbl_project_posts.description,";				 					$query.= "tbl_project_posts.postDate,";
					$query.= "tbl_project_posts.runingProject, tbl_users.image as projectuserimage,";
					$query.= "tbl_project_posts.cancelProject, tbl_awarded.awardedDate, tbl_proposal.awarded,";
					$query.= "tbl_project_posts.archive,tbl_project_posts.completedDate,";
					$query.= "tbl_project_posts.feedback,tbl_project_posts.awardStatus ";
					$query.= "FROM tbl_project_posts "; 
					$query.= "INNER JOIN tbl_users ON tbl_users.ID = tbl_project_posts.userID ";
					$query.= "LEFT JOIN tbl_main_categories ON tbl_main_categories.ID = tbl_project_posts.mainCategoryId ";
					$query.= "LEFT JOIN tbl_awarded ON tbl_awarded.awardedJobId = tbl_project_posts.ID ";
					$query.= "LEFT JOIN tbl_proposal ON tbl_proposal.	projectId = tbl_project_posts.ID
								Where tbl_project_posts.userID =$user_id ".$wherecondition."";
					$query.= "ORDER BY  tbl_project_posts.ID DESC";
//                                        debug($query);
        
						$query = $this->db->query($query);
						$jobdata = array();
						if ($query->num_rows() > 0)
						{
							$rows = $query->result();
							foreach ($rows as $row) 
							{
										$data = array(
												"ID"            	=> $row->ID,
												"projectUserID"     => $row->userID,
												"awardStatus"       => $row->awardStatus,
												"title"         	=> $row->title,
												"runingProject"     => $row->runingProject,
												"cancelProject"     => $row->cancelProject,
												"completedDate"     => $row->completedDate,
												"paymentRequest" 	=> $row->paymentRequest,
												"description"   	=> $row->description,
												"archive"   		=> $row->archive,
												"feedback"   		=> $row->feedback,
												"awarded"   		=> $row->awarded,
												"propsalTotal"  	=> 	$this->getTotalPropsal($row->ID),
												"postDate"   		=> $this->getPostDateFormat($row->postDate),
												"submitDate"   		=> $row->postDate,
												"awardedDate" 		=> $row->awardedDate,
												"projectuserimage"  => $row->projectuserimage,
												"checkAwarded"  	=> $this->checkAwarded($row->ID),
												"awardaduserID"  	=> $this->awardaduserID($row->ID),
												"awardaduserName"	=> $this->getAwardaduserName($row->ID),
												"awardaduserImage"	=> $this->getAwardaduserPic($row->ID),
												
																				
											); 				                
										 
										$jobdata[] = $data; 
							}
						}
						
						return $jobdata;
		
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
	
	
	
	public function awardaduserID($ID)
	{
		$where = array(
		'awardedJobId' =>$ID
		);
		$this->db->select('awardedUserId');
		$this->db->from('tbl_awarded');
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows>0)
		{
		$row = $query->result_array();
		$userID	=	$row[0]['awardedUserId'];
		return $userID;
		}else
		{
			return '';
		}
	}
	
	public function saveNotes($ID,$notes)
	{
		$where = array(
		'ID' =>$ID
		);
		$this->db->where($where);
		$this->db->set('notes', $notes);
		$status = $this->db->update('tbl_proposal');
		if($status){
			return $status;
		}else{
			return false;
		}
		
	}
	
	public function sendJobToArchive($ID)
	{
		$where = array(
		'ID' =>$ID
		);
		$this->db->where($where);
		$this->db->set('archive',1);
		$status = $this->db->update('tbl_project_posts');
	}
	
	public function sendPropsalToArchive($ID)
	{
		$where = array(
		'ID' =>$ID
		);
		$this->db->where($where);
		$this->db->set('archive',1);
		$status = $this->db->update('tbl_proposal');
	}
	
public function getRating($userID)
{ 
	$userID =$userID;
	$where = array(
	'receiverID'	=>$userID
	); 	
	
	$this->db->select('SUM(rating) AS TOTAL');
	$this->db->from('tbl_feedback'); 
	$this->db->where($where);
	$query = $this->db->get();
	 if ($query->num_rows() > 0)
		{
			
			$row 	=	$query->result_array();
			$total	=	($row[0]['TOTAL']); 
			$this->db->select('feedbackID');
			$this->db->from('tbl_feedback');
			$this->db->where($where); 
			$query2 = $this->db->get();
			$count	=	$query2->num_rows();
			if($count==0)
			{
				return 0;
			}
			return ($total/$count); 
		}else
		{
			return 0;
		}
	
}

function get_timeago( $ptime )
 {
  $estimate_time = time() - $ptime;
  if( $estimate_time < 1 )
  {
   return 'less than 1 second ago';
  }
  $condition = array( 
            12 * 30 * 24 * 60 * 60  =>  'Year',
            30 * 24 * 60 * 60       =>  'Month',
            24 * 60 * 60            =>  'Day',
            60 * 60                 =>  'Hour',
            60                      =>  'Minute',
            1                       =>  'Second'
  );
  foreach( $condition as $secs => $str )
  {
   $d = $estimate_time / $secs;
   if( $d >= 1 )
   {
    $r = round( $d );
    return 'About ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' Ago';
   }
  }
 }


    public function get_proposal_users($project_id) {

        $where2 = array(
            'projectId' => $project_id
        );
        
	$this->db->select('*');
	$this->db->from('tbl_proposal'); 
	$this->db->where($where2);
	$query = $this->db->get();
	 if ($query->num_rows() > 0){

            $rows = $query->result_array();

            foreach ($rows as $row) {

                $data = array(
                    'projectId' => $row['projectId'],
                    'userId' => $row['userId']
                ); 				                

            $alldata[] = $data; 

            }
            return $alldata;
        }else{
            return false;
        }

    }
 
}
	
