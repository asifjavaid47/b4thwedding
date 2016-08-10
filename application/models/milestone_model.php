<?php
class Milestone_model extends CI_Model {

    
public function getMilestone($ID){
 
        $this->db->select('*');
        $this->db->where('delete' , '0');
        $this->db->where('projectID' , $ID);
        $this->db->from('tbl_wr_projects_milestone'); 
        $this->db->order_by('milestoneupdateDate', 'DESC');
        $query = $this->db->get();
        if($query->num_rows > 0)
            return $query->result_array();
        else
            return false;
    }

    function add_milestone($userID){
	
        $milestoneID = $this->input->post('milestoneid');

        if($milestoneID){
            $insertData = array(
                'milestoneDetail' 		=> $this->input->post('milestone_desc'),
                'milestoneNotes' 		=> $this->input->post('notes'),	
                'milestoneDeliveryDate' 		=> date('Y-m-d' , strtotime($this->input->post('delivery_date'))),	
                'milestoneAmount'		=> $this->input->post('amount'),
                'edit_by'		=> $userID
            );
            $where = array (
                'milestoneID' => $milestoneID
            );
          $insert = $this->db->update('tbl_wr_projects_milestone' , $insertData , $where);
        
        } else {
            $insertData = array(
                'projectID' 		=> $this->input->post('projectid'),
                'milestoneDetail' 		=> $this->input->post('milestone_desc'),
                'milestoneNotes' 		=> $this->input->post('notes'),	
                'milestoneDeliveryDate' 		=> date('Y-m-d' , strtotime($this->input->post('delivery_date'))),	
                'milestonecreateDate'	=> date('Y-m-d H:i:s'),
                'milestoneAmount'		=> $this->input->post('amount'),
                'created_by'		=> $userID,
                'edit_by'		=> $userID,
                'milestoneStatus'		=> 0,
                'delete'		=> 0
            );
            $insert = $this->db->insert('tbl_wr_projects_milestone' , $insertData);
        }
        if($insert){
            return true;
        } else {
            return false;
        }
	
    }
    
    function approve_milestone($userID){
	
        $milestoneID = $this->input->post('milestoneid');

        if($milestoneID){
            $insertData = array(
                'approve_by' => $userID,
                'milestoneStatus'		=> 1
            );
            $where = array (
                'milestoneID' => $milestoneID
            );
          $insert = $this->db->update('tbl_wr_projects_milestone' , $insertData , $where);
            return true;
        } else {
            return false;
        }
	
    }
    
    function delete_milestone($userID){
	
        $milestoneID = $this->input->post('milestoneid');

        if($milestoneID){
            $insertData = array(
                'delete_by' => $userID,
                'delete'		=> 1
            );
            $where = array (
                'milestoneID' => $milestoneID
            );
          $insert = $this->db->update('tbl_wr_projects_milestone' , $insertData , $where);
            return true;
        } else {
            return false;
        }
	
    }

    public function add_project_agreement($attach_files, $projectID) {

        if ($attach_files) {
            $this->db->where(array("ID" => $projectID));
            $this->db->set('agreement_document', $attach_files);
            $this->db->update('tbl_project_posts');
        }

        //return  $insert_id;
    }
    
    public function getAwardedDetail($projectID) {

        $query =	'';
        $query .= "SELECT tbl_awarded.awardedClientId as client_id,tbl_proposal.userId as freelancer_id,";
        $query .= "tbl_proposal.estimateDilieveryDate as delivery_date,tbl_proposal.myEarning as total_amount,tbl_proposal.myEarningUpdated,tbl_proposal.myEarningUpdatedStatus,tbl_proposal.ID as proposalID,";
        $query .= "(SELECT userName FROM tbl_users WHERE tbl_users.ID = client_id) as client_name,";
        $query .= "(SELECT userName FROM tbl_users WHERE tbl_users.ID = freelancer_id) as freelancer_name,";
        $query .= "(SELECT last_login FROM tbl_users WHERE tbl_users.ID = client_id) as client_last_login,";
        $query .= "(SELECT last_login FROM tbl_users WHERE tbl_users.ID = freelancer_id) as freelancer_last_login,";
        $query .= "(SELECT is_online FROM tbl_users WHERE tbl_users.ID = client_id) as client_is_online,";
        $query .= "(SELECT is_online FROM tbl_users WHERE tbl_users.ID = freelancer_id) as freelancer_is_online";
        $query .= " FROM tbl_awarded ";
        $query .= "LEFT JOIN tbl_users ON tbl_users.ID = tbl_awarded.awardedClientId ";
        $query .= "LEFT JOIN tbl_proposal ON tbl_proposal.projectId = tbl_awarded.awardedJobId ";
        $query .= "Where tbl_awarded.awardedJobId = $projectID AND tbl_proposal.projectId = $projectID AND  (tbl_proposal.awarded = 'awarded' OR tbl_proposal.awarded = 'completed') ";
        $query = $this->db->query($query);

        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return false;
                                       
    }

    public function get_projectDetail($ID){
					$query =	'';
					$query .= "SELECT tbl_project_posts.ID,tbl_project_posts.title,tbl_project_posts.description,";
					$query .= "tbl_project_posts.postDate,tbl_project_posts.duration,tbl_project_posts.skills,";
					$query .= "tbl_project_posts.hourlyRate,tbl_project_posts.hrsPerWeeks,tbl_project_posts.userID,";
					$query.= "tbl_project_posts.workType,tbl_project_posts.fixedBudget ";
					$query .= "FROM tbl_project_posts ";
					$query .= "INNER JOIN tbl_users ON tbl_users.ID = tbl_project_posts.userID ";
					$query .= "INNER JOIN tbl_main_categories ON tbl_main_categories.ID = tbl_project_posts.mainCategoryId ";
				    $query .= "Where tbl_project_posts.ID =$ID";
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
												"workType"      => $rows[0]['workType'],
												"fixedBudget"   => $rows[0]['fixedBudget'],
												"lettime"   	=> $this->calculateDaysBetweenDates($rows[0]['postDate']),
												"skills"   		=> $this->getSkillByid($rows[0]['skills']),
												"totaljobpost"  => $this->getTotaljobs($rows[0]['userID'])
												
																				
											); 				                
										 
										$jobdata[] = $data; 
								
						}
					return $jobdata;
		
    }
    
    
    function add_comment($attachment = null){
	
        $title = $this->input->post('title');
        $description = $this->input->post('description');

            $insertData = array(
                'title'		=> $title,
                'description' 		=> $description,	
                'attachement_file'		=> $attachment,
                'created_date'		=> date('Y-m-d H:i:s')
            );
          $insert = $this->db->insert('tbl_contact_us' , $insertData);
        
        if($insert){
            return true;
        } else {
            return false;
        }
	
    }    

    function update_amount($amount){
	
        $proposalID = $this->input->post('proposal_ID');

        if($proposalID){
            $insertData = array(
                'myEarningUpdated' => $amount,
                'myEarningUpdatedStatus'		=> 0
            );
            $where = array (
                'ID' => $proposalID
            );
          $insert = $this->db->update('tbl_proposal' , $insertData , $where);
            return true;
        } else {
            return false;
        }
	
    }
    
    function update_amount_approve($amount){
	
        $proposalID = $this->input->post('proposal_ID');

        if($proposalID){
            $insertData = array(
                'myEarning' => $amount,
                'myEarningUpdated' => $amount,
                'myEarningUpdatedStatus'		=> 1
            );
            $where = array (
                'ID' => $proposalID
            );
          $insert = $this->db->update('tbl_proposal' , $insertData , $where);
            return true;
        } else {
            return false;
        }
	
    }
    
    
}
	
