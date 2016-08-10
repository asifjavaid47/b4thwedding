<?php
class Inbox_model extends CI_Model {

public function sendMessage($projectID,$receiverID,$message)
{  
	$sender_id =$this->session->userdata('userID');  
	$msgTypes = 'message'; 
	$data = array(
		'projectID' 	=> $projectID,
		'senderID' 		=> $sender_id,			
		'receiverID' 	=> $receiverID,
		'msgTypes' 		=> $msgTypes,					
		'message' 		=> $message	,
		'sendDate'		=> date("Y-m-d H:i:s")			
	);
	$this->db->insert('tbl_notification', $data);
	$insert = $this->db->insert('tbl_messages', $data);
	$insert_id = $this->db->insert_id();
	 
	return $insert_id;
}

public function getMessage($projectID)
{  
	$where = array(
	'projectID' => $projectID
	);  
	$userID =$this->session->userdata('userID');  
	$this->db->select('tbl_messages.*,tbl_users.fName');
	$this->db->from('tbl_messages'); 
	$this->db->join('tbl_users', ' tbl_users.ID=tbl_messages.senderID');
	$this->db->where("(tbl_messages.senderID='".$userID."' OR tbl_messages.receiverID='".$userID."')", NULL, FALSE);
	$this->db->where($where);
	$this->db->order_by('tbl_messages.msgID','DESC');
	$query = $this->db->get();
	return $query->result();
	
}


public function getProjectDetail($ID){
					$query = "SELECT tbl_project_posts.ID,tbl_project_posts.title,tbl_project_posts.description,tbl_project_posts.postDate,tbl_project_posts.duration,tbl_project_posts.cancelProject,tbl_project_posts.clientFinishProject,tbl_project_posts.userID,tbl_project_posts.skills,tbl_project_posts.hourlyRate,tbl_project_posts.hrsPerWeeks,tbl_users.fName,tbl_project_posts.freelancerFinishProject
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
												"fName"         => $rows[0]['fName'],
												"description"   => $rows[0]['description'],
												"postDate"   	=> $rows[0]['postDate'],
												"duration"   	=> $rows[0]['duration'],												
												"projectPostUserID"   		=> $rows[0]['userID'],		
												"cancelProject" => $rows[0]['cancelProject'],											
												"clientFinishProject" => $rows[0]['clientFinishProject'],
												"freelancerFinishProject" => $rows[0]['freelancerFinishProject'],											

											); 				                
										 
										$jobdata[] = $data; 
								
						}
					return $jobdata;
		
    }
	
			
public function uploadMessageAttachment($attach_files, $lastInsertID) {

        if ($attach_files) {
            $this->db->where(array("msgID" => $lastInsertID));
            $this->db->set('attachFiles', $attach_files);
            $this->db->update('tbl_messages');
        }
}

function getemailReceiverInfo($userID)
	{
		$this->db->select('email,fName,lName');
		$this->db->where('ID', $userID);
		$query = $this->db->get('tbl_users');
		$row = $query->result_array();
		
		return $row;
	}

	
}
	
