<?php
class Search_model extends CI_Model {

	public function jobsSearch($search)
	{
					$query = "SELECT
								tbl_project_posts.ID
								FROM
								tbl_project_posts
								WHERE
								tbl_project_posts.title LIKE  '%".$search."%' OR
								tbl_project_posts.description LIKE  '%".$search."%' OR
								tbl_project_posts.skills LIKE  '%".$search."%'
							 ";
						$query = $this->db->query($query);

						if ($query->num_rows() > 0)
						{
							
						   $jobs = $query->result_array();
						   foreach ($jobs as $row)
							{
										
										$data = array(
											"ID"   => $this->allProject($row['ID'])
																			
										); 				                
									 
									$inboxdata[] = $data; 
									// print_r($inboxdata);
									
							}
						   return $inboxdata;
						}
		
       
		
    }
	
	public function freelancersSearch($search='',$catID='')
	{
		// print_r($catID);
		// exit();
	
					 // $query = "SELECT
								// tbl_users.ID,
								// tbl_users.fName,
								// tbl_users.lName,
								// tbl_users.country,
								// tbl_users.hourlyRate,
								// tbl_users_skills.userSkill
								// FROM
								// tbl_users_skills
									// JOIN tbl_users ON tbl_users.ID = tbl_users_skills.userID
								// WHERE
								// tbl_users_skills.userSkill LIKE '%".$search."%' OR tbl_users.fName LIKE '%".$search."%' OR tbl_users.lName LIKE '%".$search."%'
		
							 // ";
						// $query = $this->db->query($query);

						// if ($query->num_rows() > 0)
						// {
						   // $freelancers = $query->result_array();
						   // return $freelancers;
								
						// }
		 $options['search']	= 	trim($this->input->post("search"));
			$where				=	array();
			$search				=   (isset($options['search'])) ? $options['search']:'';
			$mainCategoryId		=   (isset($catID)) 			? $catID:'';
			$where_statement	=   ($mainCategoryId!='')		? $where[]="tbl_users.mainCategory = $mainCategoryId" : '';
		
			$where_statement	=	($search!='')	 ? $where[]="(tbl_users.fName LIKE  '%".$search."%' OR tbl_users.lName LIKE  '%".$search."%' OR tbl_users_skills.userSkill LIKE  '%".$search."%')":'';
	$where_statement	=	(sizeof($where)>0)					? "where ".implode(" and ", $where):'';
			$query = '';
			$query.= "SELECT tbl_users.ID,tbl_users.fName,tbl_users.lName,tbl_users.overview,tbl_users.country,tbl_users.image,tbl_users.hourlyRate,";
			$query.="tbl_users_skills.userSkill,";
			
			$query.="tbl_main_categories.cName "; 

			$query.="FROM tbl_users left JOIN tbl_users_skills ON tbl_users_skills.userID = tbl_users.ID ";
			
			$query.="left JOIN tbl_main_categories ON tbl_main_categories.ID = tbl_users.mainCategory ";
			$query.="$where_statement ";
			$query.= "GROUP BY tbl_users.ID ORDER BY  tbl_users.ID DESC";						
						$query = $this->db->query($query);
						 $alldata = array();
						if ($query->num_rows() > 0)
						{
						   $rows = $query->result();
						  
										 foreach ($rows as $row) {
										  
											
											$data = array(
												"ID"            	=> $row->ID,
												"fName"          	=> $row->fName,
												"lName"      		=> $row->lName,
												"cName"       		=> $row->cName,
												"overview"     		=> $row->overview,
												"userSkill"     => $this->getUserSkills($row->ID),
												// "userSkill"       	=> $row->userSkill,
												"country"       	=> $row->country,
												"image"       	=> $row->image,
												"hourlyRate"       	=> $row->hourlyRate,
												"totaljobs"			=> $this->getTotaljobs($row->ID),
																				
											); 				                
										 
										$alldata[] = $data; 
										 
								}
							
						}
					
					return $alldata; 
		
       
		
    }
	
	public function getUserSkills($userID){	
	

		$where = array(

            'userID = ' => $userID,
        );
        $this->db->select('tbl_users_skills.userSkill');
        $this->db->from('tbl_users_skills');
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > '0') {
            $rows = $query->result();
			$userSkill = '';
				 foreach ($rows as $row) {
										  
							$userSkill .= $row->userSkill.',';
								}
			$userSkill = substr_replace($userSkill, "", -1);
            return $userSkill; 
        }
		else {
			return false;
		}
	}
	public function getTotaljobs($userID){	
	

		$where = array(

            'awardedUserId = ' => $userID,
        );
        $this->db->select('COUNT(tbl_awarded.awardedId) as totaljobs');
        $this->db->from('tbl_awarded');
        $this->db->join('tbl_users' , 'tbl_users.ID = tbl_awarded.awardedUserId');
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() > '0') {
            $row = $query->result_array();
            return ($row[0]['totaljobs']); 
        }
		else {
			return 0;
		}
	}
	public function freelancersSearch_OLD($search)
	{
					// $query = "SELECT
								// tbl_users.fName,
								// tbl_users.lName,
								// tbl_users.country,
								// tbl_users.hourlyRate,
								// tbl_users_skills.userSkill
								// FROM
								// tbl_users_skills
								// INNER JOIN tbl_users ON tbl_users.ID = tbl_users_skills.userID
								// WHERE
								// tbl_users_skills.userSkill LIKE '%".$search."%'
							 // ";
							 
							 $query = "SELECT
								tbl_users.fName,
								tbl_users.lName,
								tbl_users.country,
								tbl_users.hourlyRate,
								tbl_users_skills.userSkill
								FROM
								tbl_users_skills
									JOIN tbl_users ON tbl_users.ID = tbl_users_skills.userID
								WHERE
								tbl_users_skills.userSkill LIKE '%".$search."%' OR tbl_users.fName LIKE '%".$search."%' OR tbl_users.lName LIKE '%".$search."%'
		
							 ";
						$query = $this->db->query($query);

						if ($query->num_rows() > 0)
						{
						   $freelancers = $query->result();
						   return $freelancers;
								
						}
		
       
		
    }
	public function allProject($id){
	$query1 ='';
	// print_r($id);
	// exit;
	if(empty($id)) {
					$query1 = "SELECT tbl_project_posts.ID,tbl_project_posts.title,tbl_project_posts.description,tbl_project_posts.postDate,tbl_project_posts.duration,tbl_project_posts.skills,tbl_project_posts.hourlyRate,tbl_project_posts.hrsPerWeeks,tbl_main_categories.cName,count(tbl_proposal.ID) as propsalTotal
								FROM 
								tbl_project_posts 
								INNER JOIN tbl_users ON tbl_users.ID = tbl_project_posts.userID
								LEFT JOIN tbl_proposal ON tbl_proposal.	projectId = tbl_project_posts.ID
								INNER JOIN tbl_main_categories ON tbl_main_categories.ID = tbl_project_posts.mainCategoryId
								WHERE  cancelProject='0' and finishProject='0' and 
								tbl_project_posts.ID LIKE  ''
								";
								}
								else 
								
								$query1 = "SELECT tbl_project_posts.ID,tbl_project_posts.title,tbl_project_posts.description,tbl_project_posts.postDate,tbl_project_posts.duration,tbl_project_posts.skills,tbl_project_posts.hourlyRate,tbl_project_posts.hrsPerWeeks,tbl_main_categories.cName,count(tbl_proposal.ID) as propsalTotal
								FROM 
								tbl_project_posts 
								INNER JOIN tbl_users ON tbl_users.ID = tbl_project_posts.userID
								LEFT JOIN tbl_proposal ON tbl_proposal.	projectId = tbl_project_posts.ID
								INNER JOIN tbl_main_categories ON tbl_main_categories.ID = tbl_project_posts.mainCategoryId
								WHERE  cancelProject='0' and finishProject='0' and
								tbl_project_posts.ID LIKE  '%".$id."%'
								";
								// }
						$query = $this->db->query($query1);

						if ($query->num_rows() > 0)
						{
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
												"ID"            	=> $row->ID,
												"title"          	=> $row->title,
												"description"       => $row->description,
												"cName"       		=> $row->cName,
												"propsalTotal"      => $row->propsalTotal,
												"hourlyRate"       	=> $row->hourlyRate,
												"lettime"   		=> $this->calculateReamaingTime($row->postDate),
												"postDate"   		=> $this->getPostDateFormat($row->postDate),
												"skills"            => $skillarryhold
												
																				
											); 				                
										 
										$inboxdata[] = $data; 
										
										 
								}
								
						}
					
					return $inboxdata;
       
		
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
	
}
	
