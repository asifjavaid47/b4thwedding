<?php
class Feedback_model extends CI_Model {

public function addFeedback($projectID,$receiverID,$data)
{  
	$user_id =$this->session->userdata('userID'); 
				$insert = $this->db->insert('tbl_feedback', $data);
				
				$this->db->select('tbl_project_posts.userID');
				$this->db->from('tbl_project_posts');
				$this->db->where('ID',$projectID);
				$query1 = $this->db->get();
				$rows = $query1->result_array();
				$projectPostUserID	=	 $rows[0]['userID'];
				
				if($projectPostUserID==$user_id)
				{
					$this->db->where(array("ID" => $projectID));
            		$this->db->set('feedback', 1);
            		$this->db->update('tbl_project_posts');
					$notificationMessage = "Client FeedBack The Project";
					
				}else
				{
					$where_statement = array(
					'projectID = ' => $projectID,
					'awarded = ' => 'completed'
					);	
					$this->db->where($where_statement);
					$this->db->set('feedback',1);
					$this->db->update('tbl_proposal');
					$notificationMessage = "User FeedBack The Project";
				}
				$datanotification = array(
					'projectID' 	=> $projectID,
					'senderID' 		=> $user_id,			
					'receiverID' 	=> $receiverID,
					'msgTypes' 		=> 'feedBack',					
					'message' 		=> $notificationMessage,
					'sendDate'		=>	date("Y-m-d H:i:s")			
				);
				$this->db->insert('tbl_notification', $datanotification);
				return true;
		
}
public function getawardedUserId($projectID)
{ 
	$where = array(
	'awardedJobId' => $projectID
	);  
	$this->db->select('tbl_awarded.awardedUserId');
	$this->db->from('tbl_awarded'); 
	$this->db->where($where);
	$query = $this->db->get();
	$row = $query->result_array();
	return $row[0]['awardedUserId'];
	
}
public function getFeedback($projectID)
{ 
	$where = array(
	'projectID' => $projectID
	); 	
		
	$userID =$this->session->userdata('userID');  
	$this->db->select('tbl_feedback.*,tbl_users.fName');
	$this->db->from('tbl_feedback'); 
	$this->db->join('tbl_users', ' tbl_users.ID=tbl_feedback.senderID');
	$this->db->where("(tbl_feedback.senderID='".$userID."' OR tbl_feedback.receiverID='".$userID."')", NULL, FALSE);
	$this->db->where($where);
	$query = $this->db->get();
	return $query->result();
	
}

public function getRatingByProjet($projectID)
{ 
	$userID =$this->session->userdata('userID');
	$where = array(
	'projectID' => $projectID,
	'senderID'	=>$userID
	); 	
		
	
	$this->db->select('tbl_feedback.*');
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



public function completeJob($projectID,$receiverID)
{  
	$user_id =$this->session->userdata('userID'); 
	
	
			$where = array(
            'projectID = ' => $projectID
        );		
		$this->db->select();
		$this->db->from('tbl_feedback');
		$this->db->where($where);
		$query = $this->db->get();
		
        if ($query->num_rows() == 0)
		{
				$where_statement = array(
            	'projectID = ' => $projectID,
				'awarded = ' => 'awarded'
        		);	
				$this->db->where($where_statement);
            	$this->db->set('awarded','completed');
				$this->db->set('completedDate',date('Y-m-d'));
            	$this->db->update('tbl_proposal');
				
				
				$this->db->select('tbl_project_posts.userID');
				$this->db->from('tbl_project_posts');
				$this->db->where('ID',$projectID);
				$query1 = $this->db->get();
				$rows = $query1->result_array();
				$projectPostUserID	=	 $rows[0]['userID'];
				
				if($projectPostUserID==$user_id)
				{
					$notificationMessage = "Client Finished The Project";
					$this->db->where(array("ID" => $projectID));
            		$this->db->set('finishProject', 1);
					$this->db->set('runingProject', 2);
					$this->db->set('completedDate',date('Y-m-d'));
            		$this->db->update('tbl_project_posts');
					
				}else
				{
					$notificationMessage = "User Finished The Project";
					
					$this->db->where(array("ID" => $projectID));
            		$this->db->set('finishProject', 1);
					$this->db->set('runingProject', 2);
					$this->db->set('completedDate',date('Y-m-d'));
            		$this->db->update('tbl_project_posts');
					
				}
				$datanotification = array(
					'projectID' 	=> $projectID,
					'senderID' 		=> $user_id,			
					'receiverID' 	=> $receiverID,
					'msgTypes' 		=> 'feedBack',					
					'message' 		=> $notificationMessage,
					'sendDate'		=>	date("Y-m-d H:i:s")			
				);
				$this->db->insert('tbl_notification', $datanotification);
				return true;	
			}else
			{
				
				return true;
			}
}

	
}
	
